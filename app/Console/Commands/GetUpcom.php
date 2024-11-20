<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetUpcom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upcom:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data upcom';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getliststockdata/A32,AAH,AAS,ABB,ABC,ABI,ABW,ACE,ACM,ACS,ACV,AFX,AG1,AGF,AGP,AGX,AIC,ALV,AMD,AMP,AMS,ANT,APF,APL,APP,APT,ART,ASA,ATA,ATB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {
            if (date('D') != 'Sat' && date('D') != 'Sun') {

                $isRun = true;
                if(date('H') < 9 || date('H') > 15){
                    $isRun = false;
                }
                else if(date('H') >= 9 && date('H') <= 11){
                    if(date('i') > 30){
                        $isRun = false;
                    }
                }
                else if(date('H') == 12){
                    $isRun = false;
                }
                else if(date('H') >= 13 && date('H') <= 15){
                    $isRun = true;
                }
                else{
                    $isRun = false;
                }
                if($isRun){
                    $dataStockEdit = DB::table('stocks')->where('status_update','1')->pluck('stock');
                    $dataStock = Http::get($this->url);
                    if ($dataStock->successful()) {
                        $data = $dataStock->json();
                        
                        foreach ($data as $item){
                                                          if (!in_array($item['sym'], $dataStockEdit)) {

                            Redis::set('UPCOM_'.$item['sym'], json_encode($item));    
                                                          }
                        }
                    }
                }
            }
            sleep(1);
        }
    }
}

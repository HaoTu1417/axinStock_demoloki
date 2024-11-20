<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetHNX30 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hnx30:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data hnx30';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getliststockdata/BCC,BVS,CEO,DDG,DTD,DXP,HUT,IDC,L14,L18,LAS,LHC,MBS,NDN,NRC,NTP,NVB,PLC,PVC,PVS,SHS,SLS,TAR,THD,TIG,TNG,TVC,VC3,VCS,VNR';

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
                                Redis::set('HNX_'.$item['sym'], json_encode($item));    
                            }
                        }
                    }
                }
            }
            sleep(1);
        }
    }
}

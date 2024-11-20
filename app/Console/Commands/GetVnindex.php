<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetVnindex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vnindex:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data vnindex';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getlistindexdetail/10,02,11,03';
    
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
                    $dataStock = Http::get($this->url);
                    if ($dataStock->successful()) {
                        $data = $dataStock->json();
                        Redis::set('VNINDEX', json_encode($data));  
                    }
                }
            }
            sleep(1);
        }
    }
}

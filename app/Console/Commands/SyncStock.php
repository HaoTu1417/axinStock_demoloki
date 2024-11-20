<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncstock:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data hnx1';
    
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
            $keys = Redis::keys('*');
            foreach ($keys as $key){
                $exchange = explode('_', $key)[1];
                $data = json_decode(Redis::get(str_replace('stock_', '', $key)));
                if ($data === null || !is_object($data) || !property_exists($data, 'sym')) {
                    continue; // Bỏ qua nếu $data không hợp lệ hoặc không có thuộc tính 'sym'
                }
              
                    $dataStock = DB::table('stocks')->where('stock', $data->sym)->where('status_update',0)->first();
                    $dataStockCheck = DB::table('stocks')->where('stock', $data->sym)->first();
               

                if($dataStock != null){
                    DB::table('stocks')->where('stock', $data->sym)->update([
                        'c' => $data->c,
                        'f' => $data->f,
                        'r' => $data->r,
                        'ot' => $data->ot,
                        'lot' => $data->lot,
                        'changePc' => $data->changePc,
                        'avePrice' => $data->avePrice,
                        'highPrice' => $data->highPrice,
                        'lowPrice' => $data->lowPrice,
                        'lastPrice' => $data->lastPrice,
                        'g1' => $data->g1,
                        'g2' => $data->g2,
                        'g3' => $data->g3,
                        'g4' => $data->g4,
                        'g5' => $data->g5,
                        'g6' => $data->g6,
                        'update_at' => Carbon::now()
                    ]);
                }
                else if($dataStockCheck == null){
                    DB::table('stocks')->insert([
                        'stock' => $data->sym,
                        'exchange' => $exchange,
                        'stock_info' => '',
                        'mc' => $data->mc,
                        'c' => $data->c,
                        'f' => $data->f,
                        'o' => 0,
                        'r' => $data->r,
                        'ot' => $data->ot,
                        'lot' => $data->lot,
                        'changePc' => $data->changePc,
                        'avePrice' => $data->avePrice,
                        'highPrice' => $data->highPrice,
                        'lowPrice' => $data->lowPrice,
                        'lastPrice' => $data->lastPrice,
                        'g1' => $data->g1,
                        'g2' => $data->g2,
                        'g3' => $data->g3,
                        'g4' => $data->g4,
                        'g5' => $data->g5,
                        'g6' => $data->g6,
                        'update_at' => Carbon::now(),
                        'oupdate_at' => Carbon::now()
                    ]);
                }
            }
            sleep(1);
        }
    }
}

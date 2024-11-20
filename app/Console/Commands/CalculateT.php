<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CalculateT extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculatet:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate T plus';

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
                $listOrder = DB::table('stock_tplus')->where('type', 1)->where('status', 1)->whereRaw('t < 3 and date(calculate_at) < date(now())')->get();
                if ($listOrder != null && count($listOrder) > 0) {
                    foreach ($listOrder as $item) {
                        if ($item->t == 0 || $item->t == 1) {
                            DB::table('stock_tplus')->where('id', $item->id)->update([
                                't' => $item->t + 1,
                                'calculate_at' => Carbon::now()
                            ]);
                        } else if ($item->t == 2) {
                            if(date('H') == 13){
                                DB::table('stock_tplus')->where('id', $item->id)->update([
                                    't' => $item->t + 1,
                                    'calculate_at' => Carbon::now()
                                ]);
                            }
                        } 
                    }
                }
            sleep(60);
        }
    }
}

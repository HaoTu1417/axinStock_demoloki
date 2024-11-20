<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessWallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process-wallet:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process implement money for wallet';
    

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
        while(true){
            if (date('H') == 0 && date('i') >= 0 && date('i') <= 1) {
                $yesterday = Carbon::yesterday()->toDateString();
                $wallets = DB::table('wallet_profit')->whereDate('updated_at', $yesterday)->get();
                if($wallets->count() > 0){
                    $daysInYear = 365;
                    $profit = DB::table('settings')->where('setting_key','profit_wallet')->first();
                    $profitValue = $profit->setting_value;
                    $dailyProfitRate = $profitValue / $daysInYear;
    
                    foreach($wallets as $item){
                        $profitTotal = $item->profit_total;
                        $moneyDeposit = $item->deposit_money;
                        $dayTime = $item->time_day;
                        $profitToday = ($moneyDeposit + $profitTotal) * $dailyProfitRate;
                        
                        DB::table('wallet_profit')->where('id',$item->id)->update([
                            'deposit_money'=> $moneyDeposit+$profitToday,
                            'profit_total' => $profitTotal+$profitToday,
                            'created_at'   => now(),
                            'updated_at'   => now(),
                            'time_day'     => $dayTime+1
                        ]);
                    }
                }
            }
            sleep(600);
        }
    }
}

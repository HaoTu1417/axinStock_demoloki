<?php

namespace App\Console\Commands;

use App\Customer;
use Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProccessRef extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ref:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proccess ref on 00:30 AM every day';

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
            if (date('D') == 1 && date('H') == 0 && date('i') >= 0 && date('i') <= 1) {
                $listRefCustomer = DB::table('ref_customer')
                    ->whereRaw("DAY(created_at) = 1 and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())")
                    ->get();
                $percentDiscount = DB::table('settings')->where('setting_key', 'ref_percent')->first();
                $arrPercent = explode("|", $percentDiscount->setting_value);
                if ($listRefCustomer != null && count($listRefCustomer) > 0) {
                    foreach ($listRefCustomer as $itemRefCustomer) {
                        Log::info('Proccess #' . $itemRefCustomer->customer_id);
                        $customerParent = Customer::find($itemRefCustomer->customer_id);
                        $listRef = $customerParent->getDescendantIds();
                        if ($listRef != null && count($listRef) > 0) {
                            foreach ($listRef as $item) {
                                $customerRef = Customer::find($item);
                                $level = $customerRef->getLevel();
                                $totalRef = 0;
                                if ($level == 0) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[0]) / 100);
                                } else if ($level == 1) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[1]) / 100);
                                } else if ($level == 2) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[2]) / 100);
                                } else if ($level == 3) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[3]) / 100);
                                } else if ($level == 4) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[4]) / 100);
                                } else if ($level == 5) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[5]) / 100);
                                } else if ($level == 6) {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[6]) / 100);
                                } else {
                                    $totalRef = $itemRefCustomer->ref_money * (floatval($arrPercent[7]) / 100);
                                }

                                $beforeAmount = $customerRef->money;
                                $afterAmount = $customerRef->money + $totalRef;
                                DB::table('historys')->insert([
                                    'customer_id' => $item,
                                    'befores' => $beforeAmount,
                                    'money' => $totalRef,
                                    'afters' => $afterAmount,
                                    'created_at' => Carbon::now(),
                                    'note' => 'Thưởng hoa hồng tháng ' . date('MM/yyyy')
                                ]);
                                DB::table('customers')->where('id', $item)->update([
                                    'money' => $afterAmount
                                ]);
                            }
                        }
                    }
                }
            }
            sleep(60);
        }
    }
}

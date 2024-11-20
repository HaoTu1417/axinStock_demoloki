<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MatchOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matchorder:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Match order';

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
            $listOrder = DB::table('orders')->where('status',0)->get();
                if ($listOrder != null && count($listOrder) > 0) {
                    foreach ($listOrder as $item) {
                        $dateCompare = Carbon::parse($item->created_at);
                        if ($dateCompare->addHour(12)->gt(Carbon::now())) {
                            $keyStock = Redis::keys('*_' . $item->stock . '*')[0];
                            $data = json_decode(Redis::get(str_replace('stock_', '', $keyStock)));
                            if ((($data->lastPrice * 1000) <= $item->prices && $item->type == 1) || (($data->lastPrice * 1000) >= $item->prices && $item->type == 2)) {
                                DB::table('orders')->where('id', $item->id)->update(['status' => 1]);
                                DB::table('stock_tplus')->where('order_id', $item->id)->update(['status' => 1]);
                                $customerData = Customer::find($item->customer_id);
                                $totalRef = $item->fee;
                                if ($item->type == 2) {
                                    $totalSub = 0;
                                    if ($checkDebt != null) {
                                        $totalCal = DB::table('stock_tplus')
                                            ->where('customer_id', $item->customer_id)
                                            ->where('stock', $item->stock)
                                            ->where('status', 1)
                                            ->where('type', 1)
                                            ->first();
                                        $totalPrice = 0;
                                        $totalQuan = 0;
                                        if ($totalCal != null && count($totalCal) > 0) {
                                            foreach ($totalCal as $item) {
                                                $totalPrice += $item->price;
                                                $totalQuan += $item->quantity;
                                            }
                                            $totalPriceTB = round($totalPrice / $totalQuan);
                                            if ($totalPriceTB < $item->prices) {
                                                $totalSub = ($item->prices - $totalPriceTB) * $item->quantity;
                                            }
                                        }
                                    }
                                    $totalRef += $totalSub;
                                    $totalPrice = $item->quantity * $item->prices;
                                    $beforeAmount = $customerData->money;
                                    $afterAmount = $customerData->money + $totalPrice - $item->fee;
                                    DB::table('historys')->insert([
                                        'customer_id' => $item->customer_id,
                                        'befores' => $beforeAmount,
                                        'money' => $totalPrice - $item->fee,
                                        'afters' => $afterAmount,
                                        'created_at' => Carbon::now(),
                                        'note' => 'Đặt bán ' . number_format($quantity) . ' mã ' . $stockData->stock
                                    ]);
                                    if ($totalSub > 0) {
                                        DB::table('historys')->insert([
                                            'customer_id' => $customerData->id,
                                            'befores' => $afterAmount,
                                            'money' => $totalSub,
                                            'afters' => $afterAmount - ($totalSub * 0.2),
                                            'created_at' => Carbon::now(),
                                            'note' => 'Trích lãi cho khoản vay miễn lãi'
                                        ]);
                                        $afterAmount -= $totalSub * 0.2;
                                    }
                                    DB::table('customers')->where('id', $customerData->id)->update([
                                        'money' => $afterAmount
                                    ]);
                                }
                                $customerParentId = $customerData->getRoot()->id;
                                $refData = DB::table('ref_customer')->where('customer_id', $customerParentId)->whereRaw('MONTH(created_at) = MONTH(now())')->first();
                                if ($refData != null) {
                                    DB::table('ref_customer')->where('id', $refData->id)->update([
                                        'ref_money' => $refData->money + $totalRef
                                    ]);
                                } 
                                else 
                                {
                                    DB::table('ref_customer')->where('id', $refData->id)->insert([
                                        'customer_id' => $customerParentId,
                                        'ref_money' => $totalRef,
                                        'created_at' => Carbon::now()
                                    ]);
                                }
                            }
                        } 
                        else 
                        {
                            if ($item->type == 1) {
                                $totalPrice = $item->quantity * $item->prices;
                                $customerData = Customer::find($item->customer_id);
                                $beforeAmount = $customerData->money;
                                $afterAmount = $customerData->money + $totalPrice + $item->fee;
                                DB::table('historys')->insert([
                                    'customer_id' => $item->customer_id,
                                    'befores' => $beforeAmount,
                                    'money' => $totalPrice + $item->fee,
                                    'afters' => $afterAmount,
                                    'created_at' => Carbon::now(),
                                    'note' => 'Huỷ lệnh mua ' . number_format($item->quantity) . ' mã ' . $item->stock
                                ]);
                                DB::table('customers')->where('id', $customerData->id)->update([
                                    'money' => $afterAmount
                                ]);
                            }
                            DB::table('orders')->where('id', $item->id)->update(['status' => 2]);
                            DB::table('stock_tplus')->where('order_id', $item->id)->delete();
                        }
                    }
                }
            sleep(1);
        }
    }
}

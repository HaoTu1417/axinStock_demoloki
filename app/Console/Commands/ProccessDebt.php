<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProccessDebt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process_debt:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Debt';
    
    protected $arrWallet = ['Hàng ngày', 'Trải nghiệm', 'Hàng tuần', 'Hàng tháng', 'Miễn lãi', 'VIP'];

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
        // while (true) {
        $data = DB::table('customer_debt')->whereRaw('DATE_ADD(next_at, INTERVAL exp_day day) < DATE(now())')->where('status', 1)->get();
        if ($data != null && count($data) > 0) {
            foreach ($data as $item) {
                if ($item->type != 2) {
                    if ($item->is_auto == 1) {
                        $totalInterest = $item->money * $item->exp_day * ($item->percent / 100);
                        $customerData = DB::table('customers')->where('id', $item->customer_id)->first();
                        if ($totalInterest + $item->money <= $customerData->money) {
                            $beforeAmount = $customerData->money;
                            $afterAmount = $customerData->money - ($totalInterest + $item->money);
                            DB::table('historys')->insert([
                                'customer_id' => $customerData->id,
                                'befores' => $beforeAmount,
                                'money' => $totalInterest + $item->money,
                                'afters' => $afterAmount,
                                'created_at' => Carbon::now(),
                                'note' => 'Gia hạn khoản vay'
                            ]);
                            DB::table('customers')->where('id', $customerData->id)->update([
                                'money' => $afterAmount
                            ]);
                            DB::table('customer_debt')->where('id', $item->id)->update([
                                'next_at' => Carbon::now(),
                            ]);
                            $content = '';
                            $content .= '<p>Kính chào quý khách</p>';
                            $content .= '<p>Hệ thống đã gia hạn hạn khoản vay của quý khách thành công</p>';
                            $content .= '<p>Thông tin khoản vay:</p>';
                            $content .= '<p>Ký quỹ: '.$this->arrWallet[$item->type - 1].'</p>';
                            $content .= '<p>Số lần nhân: '.($item->money / $item->deposit).'</p>';
                            $content .= '<p>Số tiền cọc: '.number_format($item->deposit).'</p>';
                            $content .= '<p>Lãi xuất: '.$item->percent.'%</p>';
                            Mail::to($customerData->email)->send(new SendMail('Gia hạn khoản vay', $content));
                            DB::table('warning_debt')->insert([
                                'customer_id' => $customerData->id,
                                'created_at' => Carbon::now(),
                                'deb_id' => $item->id,
                                'content' => $content
                            ]);
                            $helper->send_tele($customerData->email.' đã gia hạn khoản vay thành công');
                        }
                        else{
                            $helper->send_tele($customerData->email.' không thể gia hạn khoản vay vì số dư không đủ');
                        }
                    } else {
                        $customerData = DB::table('customers')->where('id', $item->customer_id)->first();
                        if ($item->money + $item->deposit <= $customerData->money) {
                            $beforeAmount = $customerData->money;
                            $afterAmount = $customerData->money - $item->money + $item->deposit;
                            DB::table('historys')->insert([
                                'customer_id' => $customerData->id,
                                'befores' => $beforeAmount,
                                'money' => $item->money - $item->deposit,
                                'afters' => $afterAmount,
                                'created_at' => Carbon::now(),
                                'note' => 'Tất toán khoản vay'
                            ]);
                            DB::table('customers')->where('id', $customerData->id)->update([
                                'money' => $afterAmount
                            ]);
                            DB::table('customer_debt')->where('id', $item->id)->update([
                                'status' => 3
                            ]);
                            $content = '';
                            $content .= '<p>Kính chào quý khách</p>';
                            $content .= '<p>Hệ thống đã tất toán khoản vay của quý khách do quý khách không có nhu cầu gia hạn khoản vay</p>';
                            $content .= '<p>Thông tin khoản vay:</p>';
                            $content .= '<p>Ký quỹ: '.$this->arrWallet[$item->type - 1].'</p>';
                            $content .= '<p>Số lần nhân: '.($item->money / $item->deposit).'</p>';
                            $content .= '<p>Số tiền cọc: '.number_format($item->deposit).'</p>';
                            $content .= '<p>Lãi xuất: '.$item->percent.'%</p>';
                            Mail::to($customerData->email)->send(new SendMail('Tất toán khoản vay', $content));
                            DB::table('warning_debt')->insert([
                                'customer_id' => $customerData->id,
                                'created_at' => Carbon::now(),
                                'deb_id' => $item->id,
                                'content' => $content
                            ]);
                            $helper->send_tele($customerData->email.' đã tất toán khoản vay.');
                        }
                        else{
                            $helper->send_tele($customerData->email.' không thể tất toán khoản vay vì số dư không đủ');
                        }
                    }
                } else {
                    if (date('H') == 14 && date('i') > 30) {
                        $customerData = DB::table('customers')->where('id', $item->customer_id)->first();
                        $beforeAmount = $customerData->money;
                        $totalPaid = $beforeAmount > 10000000 ? 10000000 : $beforeAmount;
                        $afterAmount = $customerData->money - $totalPaid;
                        DB::table('historys')->insert([
                            'customer_id' => $customerData->id,
                            'befores' => $beforeAmount,
                            'money' => $totalPaid,
                            'afters' => $afterAmount,
                            'created_at' => Carbon::now(),
                            'note' => 'Trích nợ khoản vay thử nghiệm'
                        ]);
                        DB::table('customers')->where('id', $customerData->id)->update([
                            'money' => $afterAmount
                        ]);
                        DB::table('customer_debt')->where('id', $item->id)->update([
                            'status' => 3
                        ]);
                    }
                }
            }
        }
        //     sleep(60);
        // }
    }
}

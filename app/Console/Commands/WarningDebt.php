<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Helper;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class WarningDebt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warning_debt:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warning Debt';
    
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
        $helper = new Helper();
        while (true) {
            $data = DB::table('customer_debt')->whereRaw('type != 2 && type != 5')->where('status', 1)->get();
            if ($data != null && count($data) > 0) {
                foreach ($data as $item) {
                    $isSend = DB::table('warning_debt')->whereRaw('DATE(created_at) = DATE(now()) and debt_id = ?', [$item->id])->first();
                    if($isSend == null){
                        $customerData = DB::table('customers')->where('id', $item->customer_id)->first();
                        if($item->type == 1){
                            $timeExp = Carbon::parse($item->next_at)->addDays($item->exp_day);
                            if(($timeExp->diffInMinutes(Carbon::now(), true) / 60) <= 5){
                                $content = '';
                                $content .= '<p>Kính chào quý khách</p>';
                                $content .= '<p>Khoản vay của quý khách sắp đến hạn thanh toán, vui lòng kiểm tra và nạp thêm tiền để tiếp tục khoản vay. Trong trường hợp quý khách không đủ số dư, chúng tôi sẽ xử lý tài khoản theo quy định.</p>';
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
                                $helper->send_tele($customerData->email.' chuẩn bị đến hạn thanh toán khoản vay ' . $this->arrWallet[$item->type - 1] . '. Thời hạn ' . $timeExp);
                            }
                        }
                        else if($item->type == 3){
                            $timeExp = Carbon::parse($item->next_at)->addDays($item->exp_day);
                            if($timeExp->diffInDays(Carbon::now()) <= 2){
                                $content = '';
                                $content .= '<p>Kính chào quý khách</p>';
                                $content .= '<p>Khoản vay của quý khách sắp đến hạn thanh toán, vui lòng kiểm tra và nạp thêm tiền để tiếp tục khoản vay. Trong trường hợp quý khách không đủ số dư, chúng tôi sẽ xử lý tài khoản theo quy định.</p>';
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
                                $helper->send_tele($customerData->email.' chuẩn bị đến hạn thanh toán khoản vay ' . $this->arrWallet[$item->type - 1] . '. Thời hạn ' . $timeExp);
                            }
                        }
                        else{
                            $timeExp = Carbon::parse($item->next_at)->addDays($item->exp_day);
                            if($timeExp->diffInDays(Carbon::now()) <= 5){
                                $content = '';
                                $content .= '<p>Kính chào quý khách</p>';
                                $content .= '<p>Khoản vay của quý khách sắp đến hạn thanh toán, vui lòng kiểm tra và nạp thêm tiền để tiếp tục khoản vay. Trong trường hợp quý khách không đủ số dư, chúng tôi sẽ xử lý tài khoản theo quy định.</p>';
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
                                $helper->send_tele($customerData->email.' chuẩn bị đến hạn thanh toán khoản vay ' . $this->arrWallet[$item->type - 1] . '. Thời hạn ' . $timeExp);
                            }
                        }
                    }
                }
            }
            sleep(3660);
        }
    }
}

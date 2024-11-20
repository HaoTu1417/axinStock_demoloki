<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class HomeController extends BaseController
{
    public $data = [];

    public function __construct()
    {
        $this->data['logo'] = DB::table('setting_img')->where('type', 2)->where('status', 1)->first();
        $this->data['banners'] = DB::table('setting_img')->where('type', 1)->where('status', 1)->get();
        $this->data['domain'] = DB::table('settings')->where('setting_key', 'domain')->first();
        $this->data['title'] = DB::table('settings')->where('setting_key', 'title_web')->first();
        $this->data['icon'] = DB::table('setting_img')->where('type', 3)->first();

    }

    public function default()
    {
        $content = DB::table('settings')->where('setting_key', 'notification')->first();
        $this->data['data'] = $content;
        $this->data['tele'] = DB::table('settings')->where('setting_key', 'telegram')->first();
        $this->data['livechat'] = DB::table('settings')->where('setting_key', 'livechat')->first();
        $this->data['notification_run'] = DB::table('settings')->where('setting_key', 'notification_run')->first();


        // $this->data['']
        if (Auth::user()) {
            return redirect()->route('index');
        }
        return view('home.default', $this->data);

    }

    public function thongbao()
    {

        return view('home.thongbao', $this->data);

    }

    public function setlang(Request $request)
    {
        session(['googtrans' => '/vi/' . $request->lang]);
        // session(['googtrans' => '/vi/'.$request->lang]);
        // Cookie::queue('googtrans', '/vi/'.$request->lang, 525600, null, '.datasstock.com');
        // Cookie::queue('googtrans', '/vi/'.$request->lang, 525600, null, 'www.datasstock.com');
        return $this->success('');
    }

    public function getvnindex()
    {
        $data = Redis::get('VNINDEX');
        $dataReturn = json_decode($data);
        return $this->data($dataReturn);
    }

    public function debttrial(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 2)
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay trải nghiệm rồi');
        }
        $rechargeData = DB::table('transfers')->where('customer_id', Auth::user()->id)->where('status', 1)->first();
        if ($rechargeData == null) {
            return $this->error('Vui lòng nạp đủ 1.000.000đ trở lên');
        }
        if ($rechargeData->money < 1000000) {
            return $this->error('Vui lòng nạp đủ 1.000.000đ trở lên');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
       
        DB::table('customer_debt')->insert([
            'type' => 2,
            'customer_id' => $customerData->id,
            'deposit' => 0,
            'money' => 10000000,
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => 2,
            'percent' => 0,
            'is_auto' => 0,
            'note' => '',
            'status' => 1
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money + 10000000;
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'created_at' => Carbon::now(),
            'befores' => $beforeAmount,
            'money' => 10000000,
            'afters' => $afterAmount,
            'note' => 'Đăng ký khoản vay trải nghiệm',
            'note_trans' => "注册体验贷款",
        ]);
        DB::table('customers')->where('id', $customerData->id)->update(['money' => $afterAmount]);
        return $this->success('Đăng ký khoản vay trải nghiệm thành công');
    }

    public function setdefaultabcxyz()
    {
        Artisan::call('setDefaultabcxyz:run');
        return response()->json(['message' => 'complete']);
    }

    public function debtday(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 1)
            ->whereRaw('status <= 1')
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay rồi');
        }
        if ($request->percent < 2 || $request->percent > 10) {
            return $this->error('Vui lòng chọn tỷ lệ');
        }
        if (!is_numeric($request->price)) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $amount = $request->price;
        if ($amount <= 0) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($amount > $customerData->money) {
            return $this->error('Số dư không đủ để cọc');
        }
        if ($request->day > 4 || $request->day < 1) {
            return $this->error('Vui lòng chọn kỳ hạn phân bổ hợp lệ');
        }
        $percentByLevel = DB::table('levels')->where('type', 1)->where('level', $customerData->level)->first();
        if ($percentByLevel == null) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $percentApply = $this->getpercent($percentByLevel, $request->percent);
        if ($percentApply == 0) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $statusAuto = 0;
        if(Auth::user()->fee_manager > ($amount * $request->percent) || Auth::user()->money > ($amount * $request->percent)){
            $statusAuto = 1;
        }

        DB::table('customer_debt')->insert([
            'type' => 1,
            'customer_id' => $customerData->id,
            'deposit' => $amount,
            'money' => $amount * $request->percent,
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => $request->day,
            'percent' => $percentApply,
            'is_auto' => $statusAuto,
            'note' => '',
            'status' => 0
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $amount;

        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Đặt cọc khoản vay ngày',
            'note_trans'=>"贷款日押金",
        ]);

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Đăng ký khoản vay ngày thành công');
    }

    public function debtweek(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 3)
            ->whereRaw('status <= 1')
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay rồi');
        }
        if ($request->percent < 2 || $request->percent > 10) {
            return $this->error('Vui lòng chọn tỷ lệ');
        }
        if (!is_numeric($request->price)) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $amount = $request->price;
        if ($amount <= 0) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($amount > $customerData->money) {
            return $this->error('Số dư không đủ để cọc');
        }
        if ($request->week > 7 || $request->week < 1) {
            return $this->error('Vui lòng chọn kỳ hạn phân bổ hợp lệ');
        }
        $percentByLevel = DB::table('levels')->where('type', 3)->where('level', $customerData->level)->first();
        if ($percentByLevel == null) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $percentApply = $this->getpercent($percentByLevel, $request->percent);
        if ($percentApply == 0) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $statusAuto = 0;
        if(Auth::user()->fee_manager > ($amount * $request->percent) || Auth::user()->money > ($amount * $request->percent)){
            $statusAuto = 1;
        }
        DB::table('customer_debt')->insert([
            'type' => 3,
            'customer_id' => $customerData->id,
            'deposit' => $amount,
            'money' => $amount * $request->percent,
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => $request->week * 7,
            'percent' => $percentApply,
            'is_auto' => $statusAuto,
            'note' => '',
            'status' => 0
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $amount;

        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Đặt cọc khoản vay tuần',
                        'note_trans'=>"每周贷款押金",

        ]);

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Đăng ký khoản vay tuần thành công');
    }

    public function isauto(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('id', $request->id)
            ->whereRaw('status = 1')
            ->first();

        if ($checkDebt == null) {
            return $this->error('Gói vay không hợp lệ');
        }

        if ($request->type < 0 || $request->type > 1) {
            return $this->error('Yêu cầu không hợp lệ');
        }

        DB::table('customer_debt')->where('id', $checkDebt->id)->update([
            'is_auto' => $request->type
        ]);

        return $this->success('Thao tác thành công');
    }

    public function debtmonth(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 4)
            ->whereRaw('status <= 1')
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay rồi');
        }
        if ($request->percent < 2 || $request->percent > 10) {
            return $this->error('Vui lòng chọn tỷ lệ');
        }
        if (!is_numeric($request->price)) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $amount = $request->price;
        if ($amount <= 0) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($amount > $customerData->money) {
            return $this->error('Số dư không đủ để cọc');
        }
        if ($request->month > 7 || $request->month < 1) {
            return $this->error('Vui lòng chọn kỳ hạn phân bổ hợp lệ');
        }
        $percentByLevel = DB::table('levels')->where('type', 4)->where('level', $customerData->level)->first();
        if ($percentByLevel == null) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $percentApply = $this->getpercent($percentByLevel, $request->percent);
        if ($percentApply == 0) {
            return $this->error('Không có gói vay hợp lệnh');
        }
           $statusAuto = 0;
        if(Auth::user()->fee_manager > ($amount * $request->percent) || Auth::user()->money > ($amount * $request->percent)){
            $statusAuto = 1;
        }
        DB::table('customer_debt')->insert([
            'type' => 4,
            'customer_id' => $customerData->id,
            'deposit' => $amount,
            'money' => $amount * $request->percent,
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => $request->month * 30,
            'percent' => $percentApply,
            'is_auto' => $statusAuto,
            'note' => '',
            'status' => 0
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $amount;

        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Đặt cọc khoản vay tháng',
            'note_trans' => '每月贷款押金'
        ]);

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Đăng ký khoản vay tháng thành công');
    }

    public function debtfree10(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 5)
            ->whereRaw('status <= 1')
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay rồi');
        }
        if (!is_numeric($request->price)) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $amount = $request->price;
        if ($amount <= 0) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($amount > $customerData->money) {
            return $this->error('Số dư không đủ để cọc');
        }
        $percentByLevel = DB::table('levels')->where('type', 5)->where('level', $customerData->level)->first();
        if ($percentByLevel == null) {
            return $this->error('Không có gói vay hợp lệnh');
        }

        $quantityMargin = DB::table('settings')->where('setting_key', 'quantity_5')->first();

        $percentApply = $this->getpercent($percentByLevel, intval($quantityMargin->setting_value));
        if ($percentApply == 0) {
            return $this->error('Không có gói vay hợp lệnh');
        }
           $statusAuto = 0;
        if(Auth::user()->fee_manager > ($amount * $request->percent) || Auth::user()->money > ($amount * $request->percent)){
            $statusAuto = 1;
        }
        DB::table('customer_debt')->insert([
            'type' => 5,
            'customer_id' => $customerData->id,
            'deposit' => $amount,
            'money' => $amount * intval($quantityMargin->setting_value),
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => 0,
            'percent' => $percentApply,
            'is_auto' => $statusAuto,
            'note' => '',
            'status' => 0
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $amount;

        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Đặt cọc khoản vay phí giao dịch',
            "note_trans" => '贷款交易费押金'
        ]);

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Đăng ký khoản vay miễn phí giao dịch thành công');
    }

    public function debtvip(Request $request)
    {
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('type', 6)
            ->whereRaw('status <= 1')
            ->first();
        if ($checkDebt != null) {
            return $this->error('Bạn đang có khoản vay rồi');
        }
        if (!is_numeric($request->price)) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        $amount = $request->price;
        if ($amount <= 0) {
            return $this->error('Vui lòng nhập số tiền hợp lệ');
        }
        if ($request->month > 7 || $request->month < 1) {
            return $this->error('Vui lòng chọn kỳ hạn phân bổ hợp lệ');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($amount > $customerData->money) {
            return $this->error('Số dư không đủ để cọc');
        }
        $percentByLevel = DB::table('levels')->where('type', 6)->where('level', $customerData->level)->first();
        if ($percentByLevel == null) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $percentApply = $this->getpercent($percentByLevel, 12);
        if ($percentApply == 0) {
            return $this->error('Không có gói vay hợp lệnh');
        }
        $totalInterest = $amount * $request->month;
           $statusAuto = 0;
        if(Auth::user()->fee_manager > ($amount * $request->percent) || Auth::user()->money > ($amount * $request->percent)){
            $statusAuto = 1;
        }
        DB::table('customer_debt')->insert([
            'type' => 6,
            'customer_id' => $customerData->id,
            'deposit' => $amount,
            'money' => $amount * $request->percent,
            'created_at' => Carbon::now(),
            'next_at' => Carbon::now(),
            'exp_day' => $request->month * 30,
            'percent' => $percentApply,
            'is_auto' => $statusAuto,
            'note' => '',
            'status' => 0
        ]);
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $amount;

        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Đặt cọc khoản vay VIP',
            'note_trans' => 'VIP 贷款押金'
        ]);

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Đăng ký khoản vay vip thành công');
    }

    private function getpercent($list, $level)
    {
        $percent = 0;
        switch ($level) {
            case 2:
                $percent = $list->p2;
                break;
            case 3:
                $percent = $list->p3;
                break;
            case 4:
                $percent = $list->p4;
                break;
            case 5:
                $percent = $list->p5;
                break;
            case 6:
                $percent = $list->p6;
                break;
            case 7:
                $percent = $list->p7;
                break;
            case 8:
                $percent = $list->p8;
                break;
            case 9:
                $percent = $list->p9;
                break;
            case 10:
                $percent = $list->p10;
                break;
            case 12:
                $percent = $list->p12;
                break;
            default:
                break;
        }
        return $percent;
    }
    public function paydebt(Request $request)
    {
        $dataDebt = DB::table('customer_debt')
            ->where('id', $request->id)
            ->where('customer_id', Auth::user()->id)
            ->where('status', 1)
            ->first();
        if ($dataDebt == null) {
            return $this->error('Khoản nợ không tồn tại hoặc đã được thanh toán');
        }
        $customerData = DB::table('customers')->where('id', Auth::user()->id)->first();
        if ($customerData == null) {
            return $this->error('Vui lòng đăng nhập để sử dụng dịch vụ');
        }
        if ($customerData->money < $dataDebt->money - $dataDebt->deposit) {
            return $this->error('Số dư không đủ để thanh toán');
        }
        $totalReturn = $dataDebt->money - $dataDebt->deposit;
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - $totalReturn;
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'created_at' => Carbon::now(),
            'befores' => $beforeAmount,
            'money' => $totalReturn,
            'afters' => $afterAmount,
            'note' => 'Thanh toán gói vay',
            'note_trans' => '支付贷款套餐'
        ]);
        DB::table('customers')->where('id', $customerData->id)->update(['money' => $afterAmount]);
        DB::table('customer_debt')->where('id', $dataDebt->id)->update(['status' => 3]);
        return $this->success('Thanh toán gói vay thành công');
    }

    public function getLimitedRecordsWithKeyPattern($keyword, $limit = 10)
    {
        $cursor = 0; // Initial cursor value
        $keys = []; // Array to hold the keys that match
        $records = [];
        try {
            do {
                // Perform the SCAN operation with count
                $result = Redis::scan($cursor, 'match', "*{$keyword}*", 'count', $limit);
                $cursor = $result[0]; // Update the cursor
                $keys = array_merge($keys, $result[1]); // Merge the found keys into the main array
            } while ($cursor != 0); // Continue until SCAN has iterated through all keys
        } catch (\Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
        // Fetching values for each key
        foreach ($keys as $key) {
            array_push($records, Redis::get($key));
        }
        dd($records);
        return $records;
    }

    public function getstockbyexchange(Request $request)
    {
        $stockList = [];
        if (strtolower($request->exchange) == 'all') {
            $matchingKey = Redis::keys('*');
        } else {
            $matchingKey = Redis::keys('*' . $request->exchange . '_*');
        }
        $matchingValue = [];
        foreach ($matchingKey as $item) {
            if ($item != 'stock_VNINDEX' && $item != 'stock_STOCK_INFO') {
                $dataStock = json_decode(Redis::get(str_replace('stock_', '', $item)));
                if ($dataStock != null && $dataStock->lastPrice > 0 && $dataStock->lot > 0) {
                    if ($request->order == 'desc') {
                        if ($dataStock->lastPrice >= $dataStock->r) {
                            array_push($matchingValue, $dataStock);
                            array_push($stockList, explode('_', $item)[2]);
                        }
                    } else if ($request->order == 'asc') {
                        if ($dataStock->lastPrice <= $dataStock->r) {
                            array_push($matchingValue, $dataStock);
                            array_push($stockList, explode('_', $item)[2]);
                        }
                    } else {
                        array_push($matchingValue, $dataStock);
                        array_push($stockList, explode('_', $item)[2]);
                    }
                }
            }
        }

        $returnData = [];
        $queryStockInfo = json_decode(Redis::get('STOCK_INFO'));
        if (Auth::user() != null) {
            $queryStockFollow = DB::table('stock_follows')->where('customer_id', Auth::user()->id)->get();
            $dataStockFollow = collect($queryStockFollow);
        }
        $dataStockInfo = collect($queryStockInfo)->whereIn('sym', $stockList);
        $dataMatchingValue = collect($matchingValue);
        if ($request->order == 'desc') {
            $dataMatchingValue = $dataMatchingValue->sortByDesc('changePc')->take(10);
        } else if ($request->order == 'asc') {
            $dataMatchingValue = $dataMatchingValue->sortByDesc('changePc')->take(10);
        } else if ($request->order == 'volumn') {
            $dataMatchingValue = $dataMatchingValue->sortByDesc('lot')->take(10);
        } else if ($request->order == 'name') {
            $dataMatchingValue = $dataMatchingValue->sortBy('sym')->take(10);
        }

        foreach ($dataMatchingValue as $item) {
            $stockInfo = $dataStockInfo->where('sym', $item->sym)->first();
            if (Auth::user() != null) {
                $stockFollow = $dataStockFollow->where('stock', $item->sym)->first();
            }
            array_push($returnData, [
                'sym' => $item->sym,
                'name' => $stockInfo != null ? $stockInfo->stock_info : "",
                'lastPrice' => floatval($item->lastPrice) * 1000,
                'r' => floatval($item->r * 1000),
                'c' => floatval($item->r * 1000),
                'f' => floatval($item->r * 1000),
                'changePc' => floatval($item->changePc),
                'ot' => floatval($item->ot) * 1000,
                'follow' => Auth::user() != null ? ($stockFollow != null ? 1 : 0) : 0
            ]);
        }
        return $this->data($returnData);
    }

    public function getstockbyfollow()
    {
        $stockList = [];
        $returnData = [];
        $stockFollow = DB::table('stock_follows')->where('customer_id', Auth::user()->id)->select('stock', 'exchange')->get();
        $matchingValue = [];
        $queryStockInfo = json_decode(Redis::get('STOCK_INFO'));
        $dataStockInfo = collect($queryStockInfo)->whereIn('sym', $stockList);
        $dataMatchingValue = collect($matchingValue);
        if ($stockFollow != null && count($stockFollow) > 0) {
            foreach ($stockFollow as $itemCP) {
                $item = $itemCP->stock;
                $exchange = $itemCP->exchange;
                if ($item != 'stock_VNINDEX' && $item != 'stock_STOCK_INFO') {
                    $dataStock = json_decode(Redis::get($exchange . '_' . $item));
                    $stockInfo = $dataStockInfo->where('sym', $item)->first();
                    array_push($returnData, [
                        'sym' => $item,
                        'name' => $stockInfo != null ? $stockInfo->stock_info : "",
                        'lastPrice' => floatval($dataStock->lastPrice) * 1000,
                        'r' => floatval($dataStock->r * 1000),
                        'c' => floatval($dataStock->r * 1000),
                        'f' => floatval($dataStock->r * 1000),
                        'changePc' => floatval($dataStock->changePc),
                        'ot' => floatval($dataStock->ot) * 1000,
                        'follow' => 1
                    ]);
                }
            }
        }
        return $this->data($returnData);
    }

    public function getallstock(Request $request)
    {
        $matchingKey = Redis::keys('*');
        $matchingValue = [];
        $stockList = [];
        $returnData = [];
        foreach ($matchingKey as $item) {
            if ($item != 'stock_VNINDEX' && $item != 'stock_STOCK_INFO') {
                $dataStock = json_decode(Redis::get(str_replace('stock_', '', $item)));
                if (strtolower($request->key) == strtolower(substr($dataStock->sym, 0, 1))) {
                    array_push($matchingValue, $dataStock);
                    array_push($stockList, explode('_', $item)[2]);
                }
            }
        }
        $queryStockInfo = DB::table('stocks')->whereIn('stock', $stockList)->get();
        $dataStockInfo = collect($queryStockInfo);
        foreach ($matchingValue as $item) {
            $stockInfo = $dataStockInfo->where('stock', $item->sym)->first();
            array_push($returnData, [
                'sym' => $item->sym,
                'name' => $stockInfo != null ? $stockInfo->stock_info : ""
            ]);
        }
        return $this->data($returnData);
    }

    public function getstock(Request $request)
    {
         \Log::info('-------------' );
        $start = microtime(true);
        $data = json_decode(Redis::get($request->exchange . '_' . $request->stock));
        \Log::info('Get dataa: ' . (microtime(true) - $start) . ' seconds');
        $open = json_decode(Redis::get('STOCK_INFO'));
          \Log::info('Get Stockk infor: ' . (microtime(true) - $start) . ' seconds');
        $collectData = collect($open)->where('sym', $data->sym)->first()->o ?? 0;
       \Log::info('where first: ' . (microtime(true) - $start) . ' seconds');
        // \Log::info('$collectData: ' . json_encode($collectData) . ' ddd');
        // \Log::info('$data: ' . json_encode($data) . ' ddd');
        //return $this->data(Redis::get($request->exchange . '_' . $request->stock));
       // echo "<script>console.log('getstock 1');</script>";
         $result = array_merge((array) $data, ['o' => $collectData]);
        \Log::info('array_merge: ' . (microtime(true) - $start) . ' seconds');

        
        //echo "<script>console.log('getstock 2');</script>";
       
       // echo "<script>console.log('getstock 3');</script>";
       
       
        return $this->data($result);
    }

    public function index()
    {
        $content = DB::table('settings')->where('setting_key', 'notification')->first();
        $this->data['data'] = $content;
        $this->data['tele'] = DB::table('settings')->where('setting_key', 'telegram')->first();
        $this->data['livechat'] = DB::table('settings')->where('setting_key', 'livechat')->first();
        $this->data['information'] = Auth::user();
        $this->data['notification'] = DB::table('settings')->where('setting_key', 'notification')->first();
        $this->data['notification_run'] = DB::table('settings')->where('setting_key', 'notification_run')->first();

        $this->data['az'] = range('A', 'Z');
        $content = DB::table('settings')->where('setting_key', 'notification')->first();
        return view('home.index', $this->data);
    }

    public function account()
    {
        $arrWallet = ['Hàng ngày', 'Trải nghiệm', 'Hàng tuần', 'Hàng tháng', 'Miễn lãi', 'VIP'];
        $arImag = ['assets/images/dowload/icon_dayfund.png', 'assets/images/dowload/icon_freefund.png', 'assets/images/dowload/icon_weekfund.png', 'assets/images/dowload/icon_monthfund.png', 'assets/images/dowload/icon_nofeefund.png', 'assets/images/dowload/icon_vipfund.png'];
        $arStatus = ['Chờ duyệt', 'Đang hoạt động', 'Huỷ'];
        $debt = DB::table('customer_debt')->where('customer_id', Auth::user()->id)->where('status', 1)->get();
        $listDebt = [];
        $this->data['customer'] = Auth::user();
        if ($debt != null && count($debt) > 0) {
            foreach ($debt as $key => $item) {
                $expDay = "";
                if ($item->type == 1 || $item->exp_day == 2) {
                    $expDay = $item->exp_day . ' ngày';
                } else if ($item->type == 3) {
                    $expDay = ($item->exp_day / 7) . ' tuần';
                } else if ($item->type == 4 || $item->type == 6) {
                    $expDay = ($item->exp_day / 30) . ' tháng';
                } else if ($item->type == 5) {
                    $expDay = 'Miễn phí giao dịch';
                }
                array_push($listDebt, [
                    'id' => $item->id,
                    'type' => $item->type,
                    'name' => $arrWallet[$item->type - 1],
                    'image' => $arImag[$item->type - 1],
                    'deposit' => $item->deposit,
                    'money' => $item->money,
                    'created_at' => Carbon::parse($item->created_at)->format('d-m-Y'),
                    'next_at' => Carbon::parse($item->next_at)->format('d-m-Y'),
                    'exp_day' => $expDay,
                    'exp_daynum' => $item->exp_day,
                    'percent' => $item->percent,
                    'is_auto' => $item->is_auto,
                    'status_name' => $arStatus[$item->status],
                    'status' => $item->status
                ]);
            }
        }
        $this->data['wallets'] = $listDebt;
        return view('home.account', $this->data);
    }

    public function chitiet()
    {
        $this->data['history'] = DB::table('historys')->where('customer_id', Auth::user()->id)->latest()->get();
        $this->data['transfers'] = DB::table('transfers')->where('customer_id', Auth::user()->id)->latest()->get();
        $this->data['orders'] = DB::table('orders')->where('customer_id', Auth::user()->id)->latest()->get();
        $this->data['history_wallet'] = DB::table('wallet_profit_history')->where('customer_id', Auth::user()->id)->latest()->get();
        $this->data['history_debt'] = DB::table('customer_debt')->where('customer_id', Auth::user()->id)->whereRaw('(status = 0 or status = 2)')->orderByDesc('id')->get();

        return view('home.chitiet', $this->data);
    }

    public function getinfo()
    {
        $data = Customer::find(Auth::user()->id);
        return $this->success($data->money);
    }

    public function maintain()
    {
        $this->data['maintain'] = DB::table('settings')->where('setting_key', 'maintain_content')->first();
        return view('home.maintain', $this->data);
    }

    public function action(Request $request)
    {
        $this->data['information'] = Auth::user();
        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();
        $this->data['exchange'] = $stockData != null ? $stockData->exchange : '';
        $this->data['stock_info'] = $stockData != null ? $stockData->stock_info : '';

        $totalAvaiable = DB::table('stock_tplus')
            ->where('customer_id', Auth::user()->id)
            ->where('stock', $request->stock)
            ->where('status', 1)
            ->whereRaw('((type = 1 and t >= 3) or type = 2)')
            ->selectRaw('ifnull(sum(quantity),0) as quantity')
            ->first();
        $this->data['quantityAvaiable'] = $totalAvaiable->quantity;
        $dataFollow = DB::table('stock_follows')->where('stock', $request->stock)->where('customer_id', Auth::user()->id)->first();
        $this->data['follow'] = $dataFollow != null ? 1 : 0;
        $this->data['az'] = range('A', 'Z');
        $this->data['stock'] = $request->stock;
        return view('home.action', $this->data);
    }

    public function mission(Request $request)
    {

        return view('home.mission');
    }

    public function hoatdong(Request $request)
    {

        return view('home.hoatdong', $this->data);
    }
    public function agency()
    {
        $query = DB::table('stock_tplus')->where('customer_id', Auth::user()->id)->get();
        $dataStock = collect($query);
        $groupCP = $dataStock->groupBy('stock')->map(function ($group) {
            return $group->sum('quantity');
        })->all();
        $listReport = [];
        if ($groupCP != null && count($groupCP) > 0) {
            foreach ($groupCP as $key => $item) {
                $stockData = DB::table('stocks')->where('stock', $key)->first();
                $stockRedis = json_decode(Redis::get($stockData->exchange . '_' . $key));
                $tt = $dataStock->where('stock', $key)->where('type', 1)->map(function ($group) {
                    return is_null($group) ? 0 : $group->quantity * $group->price;
                })->sum();
                $tq = $dataStock->where('stock', $key)->where('type', 1)->map(function ($group) {
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $pTb = intval($tt / $tq);
                $t0 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 0)->map(function ($group) {
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $t1 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 1)->map(function ($group) {
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $t2 = $dataStock->where('stock', $key)->where('type', 1)->where('t', 2)->map(function ($group) {
                    return is_null($group) ? 0 : $group->quantity;
                })->sum();
                $a = $item - $t0 - $t1 - $t2;
                $o = 0;
                $i = 0;
                if($stockRedis!=null){
                     echo "<script>console.log('StockReids not null');</script>";
                }else{
                     echo "<script>console.log('StockReids == null');</script>";
                }
                echo "<script>console.log('stockData->exchange: ' + JSON.stringify(" . json_encode($stockData) . "));</script>";
               echo "<script>console.log('Message: " . addslashes($key) . "');</script>";
               echo "<script>console.log('Message: " . addslashes($stockData->exchange . '_' . $key) . "');</script>";
                if ($stockRedis->lastPrice > $pTb) {
                    $o = round(((($stockRedis->lastPrice * 1000) - $pTb) / $pTb) * 100, 2);
                    $i = (($stockRedis->lastPrice * 1000) - $pTb) * $a;
                } else {
                    $o = -round((($pTb - ($stockRedis->lastPrice * 1000)) / $pTb) * 100, 2);
                    $i = -($pTb - ($stockRedis->lastPrice * 1000)) * $a;
                }
                array_push($listReport, array(
                    'sym' => $key,
                    't0' => $t0,
                    't1' => $t1,
                    't2' => $t2,
                    'a' => $a,
                    't' => $item,
                    'ptb' => $pTb,
                    'ptt' => $stockRedis->lastPrice,
                    'i' => $i,
                    'o' => $o
                )
                );
            }
        }
        // dd($listReport);
        $this->data['listStock'] = $listReport;
        $this->data['page'] = 'agency';
        return view('home.agency', $this->data);
    }

    public function giftcode(Request $request)
    {
        if (empty($request->code)) {
            return $this->error('Vui lòng nhập mã đổi quà');
        }
        $data = DB::table('giftcode')->where('code', $request->code)->first();
        if ($data == null) {
            return $this->error('Mã đổi quà không tồn tại');
        }
        if ($data->quantity <= $data->quantity_used) {
            return $this->error('Mã đổi quà đã hết lượt sử dụng');
        }
        $dataUsed = DB::table('giftcode_used')->where('customer_id', Auth::user()->id)->where('code', $request->code)->first();
        if ($dataUsed != null) {
            return $this->error('Bạn đã sử dụng mã này rồi');
        }
        if ($data->exp_date < Carbon::now()) {
            return $this->error('Mã đổi quà đã hết hạn');
        }

        if ($data->is_play == 1) {
            $dataConfig = DB::table('config_transfer')->where('customer_id', Auth::user()->id)->first();

            if ($dataConfig != null) {
                DB::table('config_transfer')->where('id', $dataConfig->id)->update([
                    'recharge_money' => $dataConfig->recharge_money + $data->money
                ]);
            } else {
                DB::table('config_transfer') - insert([
                    'customer_id' => Auth::user()->id,
                    'recharge_money' => $data->money,
                    'play_money' => 0
                ]);
            }
        }

        DB::table('giftcode')->where('id', $data->id)->update(['quantity_used' => $data->quantity_used + 1]);
        $userCurrent = DB::table('customers')->where('id', Auth::user()->id)->first();
        $beforeAmount = $userCurrent->money;
        $afterAmount = $userCurrent->money + $data->money;
        DB::table('historys')->insert([
            'customer_id' => Auth::user()->id,
            'befores' => $beforeAmount,
            'money' => $data->money,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Nhận mã đổi quà',
            'note_trans' => '领取兑换码'
        ]);
        DB::table('giftcode_used')->insert([
            'customer_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'code' => $data->code,
            'money' => $data->money
        ]);
        DB::table('customers')->where('id', Auth::user()->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Sử dụng mã đổi quà thành công, nhận ' . number_format($data->money));
    }

    public function historygiftcode()
    {
        $data = DB::table('giftcode_used')->where('customer_id', Auth::user()->id)->orderByDesc('id')->select('code', 'money', 'created_at')->get();
        return $this->data([
            'total' => count($data),
            'data' => $data
        ]);
    }

    public function ref_history(Request $request)
    {
        $dataCustomer1 = Customer::find(Auth::user()->id);
        $levelCustomer = $dataCustomer1->getLevel();
        $totalCustomer1 = $dataCustomer1->getDescendantIds();
        foreach ($totalCustomer1 as $key => $item) {
            if ($item == Auth::user()->id) {
                unset($totalCustomer1[$key]);
            }
        }
        if (empty($request->uid)) {
            if ($request->level == 0) {
                $dataReport = DB::table('ref_customer')
                    ->whereRaw('DATE(created_at) = DATE(?)', [$request->date])
                    ->whereIn('customer_id', $totalCustomer1)
                    ->orderBy('level')
                    ->get();
            } else {
                $dataReport = DB::table('ref_customer')
                    ->whereRaw('DATE(created_at) = DATE(?)', [$request->date])
                    ->where('level', intval($request->level) + $levelCustomer)
                    ->whereIn('customer_id', $totalCustomer1)
                    ->orderBy('level')
                    ->get();
            }
        } else {
            if ($request->level == 0) {
                $dataReport = DB::table('ref_customer')
                    ->whereRaw('DATE(created_at) = DATE(?)', [$request->date])
                    ->whereIn('customer_id', $totalCustomer1)
                    ->where('customer_id', $request->uid)
                    ->orderBy('level')
                    ->get();
            } else {
                $dataReport = DB::table('ref_customer')
                    ->whereRaw('DATE(created_at) = DATE(?)', [$request->date])
                    ->whereIn('customer_id', $totalCustomer1)
                    ->where('customer_id', $request->uid)
                    ->where('level', intval($request->level) + $levelCustomer)
                    ->orderBy('level')
                    ->get();
            }
        }
        // dd($dataReport);
        $dataRow = [];
        foreach ($dataReport as $item) {
            if ($item->level - $levelCustomer <= 6) {
                $dataRef = DB::table('ref_history')
                    ->where('customer_id', Auth::user()->id)
                    ->where('ref_id', $item->customer_id)
                    ->whereRaw("DATE(created_at) = DATE(?)", [$request->date])
                    ->groupBy('ref_id', 'customer_id')
                    ->selectRaw('ref_id, customer_id, sum(ref_money) as total')
                    ->first();
                // dd($dataRef);
                array_push($dataRow, [
                    'id' => $item->id,
                    'customer_id' => $item->customer_id,
                    'level' => $item->level - $levelCustomer,
                    'recharge_money' => $item->recharge_money,
                    'play_money' => $item->play_money,
                    'ref_money' => $dataRef != null ? $dataRef->total : 0,
                    'created_at' => $item->created_at
                ]);
            }
        }
        return $this->data($dataRow);
    }

    public function getAllParentCategories($categoryId, &$parentCategories = [])
    {
        $category = Customer::find($categoryId);

        if ($category) {
            if ($category->ref_id) {
                $parentCategories[] = $category->ref_id;
                $this->getAllParentCategories($category->ref_id, $parentCategories);
            }
        }

        return $parentCategories;
    }

    public function report_agency(Request $request)
    {
        $totalQueryCustomer1 = Customer::find(Auth::user()->id);
        $levelCustomer = $totalQueryCustomer1->getLevel();
        $totalCustomer1 = $totalQueryCustomer1->getDescendantIds();
        foreach ($totalCustomer1 as $key => $item) {
            if ($item == Auth::user()->id) {
                unset($totalCustomer1[$key]);
            }
        }
        $dataRow = [];
        if ($request->type == 1) {
            $dataReport = DB::table('ref_customer')
                ->join('customers', 'customers.id', '=', 'ref_customer.customer_id')
                ->whereRaw('DATE(customers.created_at) = DATE(now())')
                ->whereIn('ref_customer.customer_id', $totalCustomer1)
                ->orderBy('ref_customer.level')
                ->get();
            foreach ($dataReport as $item) {
                if ($item->level - $levelCustomer <= 6) {
                    $dataRef = DB::table('ref_history')
                        ->where('customer_id', Auth::user()->id)
                        ->where('ref_id', $item->customer_id)
                        ->whereRaw("DATE(created_at) = DATE(now())")
                        ->groupBy('ref_id', 'customer_id')
                        ->selectRaw('ref_id, customer_id, sum(ref_money) as total')
                        ->first();
                    array_push($dataRow, [
                        'id' => $item->id,
                        'customer_id' => $item->customer_id,
                        'level' => $item->level - $levelCustomer,
                        'recharge_money' => $item->recharge_money,
                        'play_money' => $item->play_money,
                        'ref_money' => $dataRef != null ? $dataRef->total : 0,
                        'created_at' => $item->created_at
                    ]);
                }
            }
        } else if ($request->type == 2) {
            $dataReport = DB::table('ref_customer')
                ->join('customers', 'customers.id', '=', 'ref_customer.customer_id')
                ->whereRaw('DATE_ADD(customers.created_at, INTERVAL 1 DAY) = DATE(now())')
                ->whereIn('ref_customer.customer_id', $totalCustomer1)
                ->orderBy('ref_customer.level')
                ->get();
            foreach ($dataReport as $item) {
                if ($item->level - $levelCustomer <= 6) {
                    $dataRef = DB::table('ref_history')
                        ->where('customer_id', Auth::user()->id)
                        ->where('ref_id', $item->customer_id)
                        ->whereRaw('DATE_ADD(ref_history.created_at, INTERVAL 1 DAY) = DATE(now())')
                        ->groupBy('ref_id', 'customer_id')
                        ->selectRaw('ref_id, customer_id, sum(ref_money) as total')
                        ->first();
                    array_push($dataRow, [
                        'id' => $item->id,
                        'customer_id' => $item->customer_id,
                        'level' => $item->level - $levelCustomer,
                        'recharge_money' => $item->recharge_money,
                        'play_money' => $item->play_money,
                        'ref_money' => $dataRef != null ? $dataRef->total : 0,
                        'created_at' => $item->created_at
                    ]);
                }
            }
        } else if ($request->type == 3) {
            $dataReport = DB::table('ref_customer')
                ->join('customers', 'customers.id', '=', 'ref_customer.customer_id')
                ->whereRaw('MONTH(customers.created_at) = MONTH(now())')
                ->whereIn('ref_customer.customer_id', $totalCustomer1)
                ->orderBy('ref_customer.level')
                ->get();

            foreach ($dataReport as $item) {
                if ($item->level - $levelCustomer <= 6) {
                    $dataRef = DB::table('ref_history')
                        ->where('customer_id', Auth::user()->id)
                        ->where('ref_id', $item->customer_id)
                        ->whereRaw('MONTH(created_at) = MONTH(now())')
                        ->groupBy('ref_id', 'customer_id')
                        ->selectRaw('ref_id, customer_id, sum(ref_money) as total')
                        ->first();
                    array_push($dataRow, [
                        'id' => $item->id,
                        'customer_id' => $item->customer_id,
                        'level' => $item->level - $levelCustomer,
                        'recharge_money' => $item->recharge_money,
                        'play_money' => $item->play_money,
                        'ref_money' => $dataRef != null ? $dataRef->total : 0,
                        'created_at' => $item->created_at
                    ]);
                }
            }
        }
        return $this->data($dataRow);
    }


    public function get_gift(Request $request)
    {
        $sessionData = DB::table('room_sessions')->where('id', $request->id)->whereRaw("DATE_ADD(created_at, INTERVAL 60 SECOND) <= now()")->first();
        if ($sessionData == null) {
            return $this->data('Lỗi');
        }
        $check = DB::table('orders')
            ->where('customer_id', Auth::user()->id)
            ->where('session_id', $sessionData->id)
            ->first();

        if ($check == null) {
            return $this->error('Lỗi');
        }

        $array = ['a' => '0', 'b' => '5', 'c' => '1', 'd' => '2', 'e' => '3', 'f' => 4, 'g' => '5', 'h' => '6', 'i' => '7', 'j' => '8'];
        $query = DB::table('orders')
            ->where('customer_id', Auth::user()->id)
            ->where('session_id', $sessionData->id)
            ->selectRaw('ifnull(sum(receive), 0) as totalMoney, ifnull(sum(case when money < receive then 1 else 0 end),0) as totalWin')
            ->first();

        return $this->data([
            'status' => true,
            'session_id' => $sessionData->id,
            'totalMoney' => number_format($query->totalMoney),
            'totalWin' => $query->totalWin,
            'class' => 'Betting_C-numC-item' . $array[$sessionData->number]
        ]);
    }

    public function fbgo()
    {
        $this->data['information'] = Auth::user();
        $query = DB::select(DB::raw("
                select * from room_sessions 
                where created_at <= now() and DATE_ADD(created_at, INTERVAL 62 SECOND) >= now() 
                order by id desc limit 1
        "));

        $currentSession = collect($query)[0];
        $this->data['session_id'] = $currentSession != null ? $currentSession->id : 0;
        $this->data['session_time'] = $currentSession != null ? Carbon::parse($currentSession->created_at)->addSeconds(62)->diffInSeconds(Carbon::now()) : 0;
        return view('home.fbgo', $this->data);
    }

    public function actiondetail(Request $request)
    {
        $list = ['banner2' => 'ndkm2.png', 'banner3' => 'ndkm3.png', 'banner1' => 'ndkm4.png', 'banner5' => 'ndkm6.png'];
        $this->data['actiondetail'] = $list[$request->key];
        $this->data['key'] = $request->key;
        return view('home.actiondetail', $this->data);
    }

    public function DailyTasks()
    {
        $this->data['information'] = Auth::user();
        $reportWeek = DB::table('ref_customer')
            ->where('customer_id', Auth::user()->id)
            ->whereRaw("DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) <= DATE(created_at) and DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY) >= DATE(created_at)")
            ->selectRaw("ifnull(sum(recharge_money),0) as totalRecharge, ifnull(sum(play_money),0) as totalPlay")
            ->first();
        $this->data['reportWeek'] = $reportWeek;
        $reportDay = DB::table('ref_customer')
            ->where('customer_id', Auth::user()->id)
            ->whereRaw("DATE(NOW()) = DATE(created_at)")
            ->selectRaw("ifnull(sum(recharge_money),0) as totalRecharge, ifnull(sum(play_money),0) as totalPlay")
            ->first();
        $this->data['reportDay'] = $reportDay;
        $reportMission = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->whereRaw("DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) <= DATE(created_at) and DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY) >= DATE(created_at)")
            ->get();
        $reportMissionCollect = collect($reportMission);
        $this->data['re_day_1'] = $reportMissionCollect->where('package', 're_day_1')->first() != null ? true : false;
        $this->data['re_day_2'] = $reportMissionCollect->where('package', 're_day_2')->first() != null ? true : false;
        $this->data['re_day_3'] = $reportMissionCollect->where('package', 're_day_3')->first() != null ? true : false;
        $this->data['re_day_4'] = $reportMissionCollect->where('package', 're_day_4')->first() != null ? true : false;

        $this->data['bet_day_1'] = $reportMissionCollect->where('package', 'bet_day_1')->first() != null ? true : false;
        $this->data['bet_day_2'] = $reportMissionCollect->where('package', 'bet_day_2')->first() != null ? true : false;
        $this->data['bet_day_3'] = $reportMissionCollect->where('package', 'bet_day_3')->first() != null ? true : false;
        $this->data['bet_day_4'] = $reportMissionCollect->where('package', 'bet_day_4')->first() != null ? true : false;
        $this->data['bet_day_5'] = $reportMissionCollect->where('package', 'bet_day_5')->first() != null ? true : false;
        $this->data['bet_day_6'] = $reportMissionCollect->where('package', 'bet_day_6')->first() != null ? true : false;
        $this->data['bet_day_7'] = $reportMissionCollect->where('package', 'bet_day_7')->first() != null ? true : false;
        $this->data['bet_day_8'] = $reportMissionCollect->where('package', 'bet_day_8')->first() != null ? true : false;
        $this->data['bet_day_9'] = $reportMissionCollect->where('package', 'bet_day_9')->first() != null ? true : false;

        $this->data['re_week_1'] = $reportMissionCollect->where('package', 're_week_1')->first() != null ? true : false;
        $this->data['re_week_2'] = $reportMissionCollect->where('package', 're_week_2')->first() != null ? true : false;
        $this->data['re_week_3'] = $reportMissionCollect->where('package', 're_week_3')->first() != null ? true : false;
        $this->data['re_week_4'] = $reportMissionCollect->where('package', 're_week_4')->first() != null ? true : false;
        $this->data['re_week_5'] = $reportMissionCollect->where('package', 're_week_5')->first() != null ? true : false;

        return view('home.DailyTasks', $this->data);
    }

    public function complete(Request $request)
    {
        if ($request->package == '') {
            return $this->error('Gói không hợp lệ');
        }
        $packageList = collect($this->list_nv());
        $packageDetail = (object) $packageList->where('package', $request->package)->first();
        if ($packageDetail == null) {
            return $this->error('Gói không hợp lệ');
        }
        if (in_array($request->package, ['re_week_1', 're_week_2', 're_week_3', 're_week_4', 're_week_5'])) {

            $checkReceive = DB::table('missions')
                ->where('customer_id', Auth::user()->id)
                ->where('package', $request->package)
                ->whereRaw("DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) <= DATE(created_at) and DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY) >= DATE(created_at)")
                ->first();

            if ($checkReceive != null) {
                return $this->error('Bạn đã nhận thưởng rồi');
            }

            $report = DB::table('ref_customer')
                ->where('customer_id', Auth::user()->id)
                ->whereRaw("DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) <= DATE(created_at) and DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY) >= DATE(created_at)")
                ->selectRaw("ifnull(sum(recharge_money),0) as totalRecharge, ifnull(sum(play_money),0) as totalPlay")
                ->first();
        } else {

            $checkReceive = DB::table('missions')
                ->where('customer_id', Auth::user()->id)
                ->where('package', $request->package)
                ->whereRaw("DATE(NOW()) = DATE(created_at)")
                ->first();

            if ($checkReceive != null) {
                return $this->error('Bạn đã nhận thưởng rồi');
            }

            $report = DB::table('ref_customer')
                ->where('customer_id', Auth::user()->id)
                ->whereRaw("DATE(NOW()) = DATE(created_at)")
                ->selectRaw("ifnull(sum(recharge_money),0) as totalRecharge, ifnull(sum(play_money),0) as totalPlay")
                ->first();
        }
        $amount = 0;
        $note = '';
        if ($packageDetail->type == 1) {
            if ($packageDetail->max <= $report->totalRecharge) {
                $amount = $packageDetail->money;
                $note = 'Nhiệm vụ nạp tiền';
            }
        } else {
            if ($packageDetail->max <= $report->totalPlay) {
                $amount = $packageDetail->money;
                $note = 'Nhiệm vụ đặt cược';
            }
        }
        if ($amount > 0) {
            $userCurrent = DB::table('customers')->where('id', Auth::user()->id)->first();
            $beforeAmount = $userCurrent->money;
            $afterAmount = $userCurrent->money + $amount;
            DB::table('historys')->insert([
                'customer_id' => Auth::user()->id,
                'befores' => $beforeAmount,
                'money' => $amount,
                'afters' => $afterAmount,
                'created_at' => Carbon::now(),
                'note' => $note
            ]);
            DB::table('customers')->where('id', Auth::user()->id)->update([
                'money' => $afterAmount
            ]);
            DB::table('missions')->insert([
                'customer_id' => $userCurrent->id,
                'package' => $packageDetail->package,
                'created_at' => Carbon::now(),
                'money' => $amount
            ]);
            return $this->success("Nhận thưởng thành công");
        }
        return $this->error("Không đủ điều kiện");
    }

    private function list_nv()
    {
        $data = [];
        // Nạp ngày
        array_push($data, ['package' => 're_day_1', 'type' => 1, 'max' => 3000000, 'money' => 30000]);
        array_push($data, ['package' => 're_day_2', 'type' => 1, 'max' => 8000000, 'money' => 80000]);
        array_push($data, ['package' => 're_day_3', 'type' => 1, 'max' => 15000000, 'money' => 150000]);
        array_push($data, ['package' => 're_day_4', 'type' => 1, 'max' => 20000000, 'money' => 200000]);
        // Đặt cược ngày
        array_push($data, ['package' => 'bet_day_1', 'type' => 2, 'max' => 300000, 'money' => 3000]);
        array_push($data, ['package' => 'bet_day_2', 'type' => 2, 'max' => 1000000, 'money' => 10000]);
        array_push($data, ['package' => 'bet_day_3', 'type' => 2, 'max' => 3000000, 'money' => 25000]);
        array_push($data, ['package' => 'bet_day_4', 'type' => 2, 'max' => 10000000, 'money' => 80000]);
        array_push($data, ['package' => 'bet_day_5', 'type' => 2, 'max' => 30000000, 'money' => 150000]);
        array_push($data, ['package' => 'bet_day_6', 'type' => 2, 'max' => 50000000, 'money' => 400000]);
        array_push($data, ['package' => 'bet_day_7', 'type' => 2, 'max' => 80000000, 'money' => 600000]);
        array_push($data, ['package' => 'bet_day_8', 'type' => 2, 'max' => 150000000, 'money' => 900000]);
        array_push($data, ['package' => 'bet_day_9', 'type' => 2, 'max' => 300000000, 'money' => 2000000]);
        // Nạp tuần
        array_push($data, ['package' => 're_week_1', 'type' => 1, 'max' => 50000000, 'money' => 500000]);
        array_push($data, ['package' => 're_week_2', 'type' => 1, 'max' => 100000000, 'money' => 1000000]);
        array_push($data, ['package' => 're_week_3', 'type' => 1, 'max' => 250000000, 'money' => 2500000]);
        array_push($data, ['package' => 're_week_4', 'type' => 1, 'max' => 1000000000, 'money' => 20000000]);
        array_push($data, ['package' => 're_week_5', 'type' => 1, 'max' => 10000000000, 'money' => 300000000]);
        return $data;
    }

    public function DailyTasksRecord()
    {
        return view('home.DailyTasksRecord');
    }

    public function RedeemGift()
    {
        return view('home.RedeemGift');
    }

    public function DailySignIn()
    {
        $signInNow = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('DATE(created_at) = DATE(now())')
            ->where('package', 'sign_day')
            ->first();
        $this->data['signinnow'] = $signInNow != null ? true : false;
        $signInCount = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->where('package', 'sign_day')
            ->count();
        $this->data['count'] = $signInCount;
        $total = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->where('package', 'sign_day')
            ->selectRaw("ifnull(sum(money),0) as total")
            ->first();
        $this->data['total'] = $total->total;

        return view('home.DailySignIn', $this->data);
    }

    public function requestdaily()
    {
        $signInNow = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('DATE(created_at) = DATE(now())')
            ->where('package', 'sign_day')
            ->first();

        if ($signInNow != null) {
            return $this->error('Bạn đã điểm danh rồi');
        }

        $signInCount = DB::table('missions')
            ->where('customer_id', Auth::user()->id)
            ->where('package', 'sign_day')
            ->count();

        if ($signInCount > 7) {
            return $this->error('Không thể điểm danh sau 7 ngày');
        }
        $signGift = [0, 2333, 4333, 8333, 28333, 48333, 68333, 83333];

        DB::table('missions')->insert([
            'customer_id' => Auth::user()->id,
            'package' => 'sign_day',
            'created_at' => Carbon::now(),
            'money' => $signGift[$signInCount + 1]
        ]);

        $userCurrent = DB::table('customers')->where('id', Auth::user()->id)->first();
        $beforeAmount = $userCurrent->money;
        $afterAmount = $userCurrent->money + $signGift[$signInCount + 1];
        DB::table('historys')->insert([
            'customer_id' => Auth::user()->id,
            'befores' => $beforeAmount,
            'money' => $signGift[$signInCount + 1],
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Điểm danh nhận quà'
        ]);
        DB::table('customers')->where('id', Auth::user()->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success('Điểm danh thành công');
    }

    public function DailySignInRules()
    {
        return view('home.DailySignInRules');
    }

    public function SettingCenter()
    {
        $this->data['information'] = Auth::user();
        return view('home.SettingCenter', $this->data);
    }

    public function LoginPassword()
    {
        return view('home.LoginPassword');
    }

    public function customer()
    {
        $this->data['information'] = Auth::user();
        $this->data['tele'] = DB::table('settings')->where('setting_key', 'telegram')->first();
        $this->data['livechat'] = DB::table('settings')->where('setting_key', 'livechat')->first();
        $this->data['debt'] = DB::table('customer_debt')->where('customer_id', Auth::user()->id)->whereRaw('status <= 1')->selectRaw('sum(deposit) as total, sum(money) as debt')->first();
        $query = DB::table('stock_tplus')->where('customer_id', Auth::user()->id)->get();
            $dataStock = collect($query);
            $groupCP = $dataStock->groupBy('stock')->map(function($group){
                return $group->sum('quantity');
            })->all();
            $totalCp = 0;
            if($groupCP != null && count($groupCP) > 0){
                foreach ($groupCP as $key => $item){
                    
                    $stockData = DB::table('stocks')->where('stock', $key)->first();
                    $stockRedis = json_decode(Redis::get($stockData->exchange.'_'.$key));
                    $totalCp += $item * $stockRedis->lastPrice * 1000;
                }
            }
        $this->data['totalCp'] = $totalCp;

        
        return view('home.customer', $this->data);
    }

    public function bankAfter(Request $request)
    {
        $dataExp = DB::table('transfers')
            ->where('id', $request->id)
            ->first();
        if ($dataExp != null && Carbon::parse($dataExp->created_at)->addSeconds(1800)->diffInSeconds(Carbon::now()) <= 0 && ($dataExp->status == 0 || $dataExp->status == -1)) {
            DB::table('transfers')
                ->where('id', $dataExp->id)->update([
                        'status' => 2,
                        'note' => "Quá thời gian duyệt, vui lòng thử lại."
                    ]);
            return redirect()->route('bank');
        }

        $rechargeData = DB::table('transfers')
            ->where('id', $request->id)
            ->where('type', 1)
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('DATE_ADD(created_at, INTERVAL 30 MINUTE) > now()')
            ->whereRaw('status <= 0')
            ->first();
        $this->data['rechargeData'] = $rechargeData;
        if ($rechargeData != null) {
            $this->data['second'] = Carbon::parse($rechargeData->created_at)->addSeconds(1800)->diffInSeconds(Carbon::now());
        } else {
            return redirect()->route('bank');
        }
        $this->data['information'] = Auth::user();
        $this->data['orderId'] = $rechargeData->id;
        $this->data['bankName'] = DB::table('settings')->where('setting_key', 'bank_name')->first()->setting_value;
        $this->data['bankAccount'] = DB::table('settings')->where('setting_key', 'bank_account')->first()->setting_value;
        $this->data['bankNumber'] = DB::table('settings')->where('setting_key', 'bank_number')->first()->setting_value;
        $this->data['bankContent'] = DB::table('settings')->where('setting_key', 'bank_content')->first()->setting_value;
        return view('home.bank_after', $this->data);
    }

    public function cancel(Request $request)
    {
        $data = DB::table('transfers')
            ->where('id', $request->id)
            ->first();
        if ($data != null) {
            if ($data->status > 0) {
                return $this->success('Đơn đã được duyệt');
            } else {
                if ($request->type == 1) {
                    DB::table('transfers')->where('id', $request->id)->delete();
                    return $this->success('Huỷ đơn thành công');
                } else {
                    DB::table('transfers')->where('id', $request->id)->update(['status' => -1]);
                    return $this->success('Hoàn thành đơn thành công');
                }
            }
        }
        return $this->success('Đơn hết hạn hoặc không tồn tại');
    }

    public function support()
    {
        $this->data['livechat'] = DB::table('settings')->where('setting_key', 'livechat')->first()->setting_value;
        $this->data['telegram'] = DB::table('settings')->where('setting_key', 'telegram')->first()->setting_value;
        return view('home.support', $this->data);
    }

    public function betting(Request $request)
    {
        $query = DB::select(DB::raw("
                select * from room_sessions 
                where created_at <= now() and DATE_ADD(created_at, INTERVAL 60 SECOND) >= now() 
                order by id desc limit 1
        "));

        $currentSession = collect($query)[0];
        $this->data['image_3'] = DB::table('settings')->where('setting_key', 'image_3')->first();
        $this->data['session_id'] = $currentSession != null ? $currentSession->id : 0;
        $this->data['room_id'] = $request->room;
        $this->data['session_time'] = $currentSession != null ? Carbon::parse($currentSession->created_at)->addSeconds(180)->diffInSeconds(Carbon::now()) : 0;
        $this->data['information'] = Auth::user();
        return view('home.betting', $this->data);
    }

    public function get_session(Request $request)
    {
        if ($request->room < 0 || $request->room > 3) {
            return $this->error("Phòng không hợp lệ");
        }
        $query = DB::select(DB::raw("
                select * from room_sessions 
                where created_at <= now() and DATE_ADD(created_at, INTERVAL 62 SECOND) >= now() 
                order by id desc limit 1
        "));

        $currentSession = collect($query)[0];
        if ($currentSession == null) {
            return $this->error("Không có phiên hợp lệ");
        }
        return $this->data(
            array(
                'status' => true,
                'id' => $currentSession->id,
                'second' => Carbon::parse($currentSession->created_at)->addSeconds(62)->diffInSeconds(Carbon::now())
            )
        );
    }

    public function history_play()
    {
        $this->data['information'] = Auth::user();
        return view('home.historyplay', $this->data);
    }

    public function historyplay(Request $request)
    {
        $query = DB::select(DB::raw("
                select o.id, o.session_id, o.value, o.money, o.receive, o.status, o.created_at, rs.number, count(*) over() as total from orders o
                join room_sessions rs on rs.id = o.session_id
                where  o.customer_id = :customer_id
                order by o.id desc
                limit :offset,:limit
        "), ['customer_id' => Auth::user()->id, 'offset' => $request->offset, 'limit' => $request->limit]);

        $data = collect($query);
        $total = 0;
        $rows = [];
        if ($data != null && count($data) > 0) {
            $total = intval($data[0]->total);
            foreach ($data as $item) {
                array_push($rows, [
                    'id' => $item->id,
                    'session_id' => $item->session_id,
                    'value' => $this->get_name($item->value),
                    'type' => $item->status == 0 ? '...' : $this->get_value($item->number) . ' ' . $this->get_type($item->number) . ' ' . $this->get_product($item->number),
                    'money' => intval($item->money),
                    'receive' => intval($item->receive),
                    'vat' => intval($item->money) * 0.02,
                    'status' => $item->status,
                    'created_at' => $item->created_at
                ]);
            }
        }

        return $this->data([
            'total' => $total,
            'data' => $rows
        ]);
    }

    public function history()
    {
        $this->data['information'] = Auth::user();
        return view('home.history', $this->data);
    }

    public function historys(Request $request)
    {
        $query = DB::select(DB::raw("
                select *, count(*) over() as total from historys 
                where  customer_id = :customer_id
                order by id desc
                limit :offset,:limit
        "), ['customer_id' => Auth::user()->id, 'offset' => $request->offset, 'limit' => $request->limit]);

        $data = collect($query);
        $total = 0;
        if ($data) {
            $total = $data[0]->total;
        }
        $rows = [];
        foreach ($data as $item) {
            array_push($rows, [
                'note' => $item->note,
                'money' => ($item->befores > $item->afters ? '-' : '+') . number_format($item->money),
                'created_at' => $item->created_at
            ]);
        }
        return $this->data([
            'total' => $total,
            'data' => $rows
        ]);
    }

    public function historyorder(Request $request)
    {
        $data = [];
        if (empty($request->stock)) {
            $data = DB::table('orders')
                ->where('customer_id', Auth::user()->id)
                ->skip($request->offset)
                ->orderByDesc('id')
                ->take(10)
                ->get();
        } else {
            $data = DB::table('orders')
                ->where('customer_id', Auth::user()->id)
                ->where('stock', $request->stock)
                ->orderByDesc('id')
                ->skip($request->offset)
                ->take(10)
                ->get();
        }
        return $this->data($data);
    }

    public function historywithdrawal(Request $request)
    {
        $user = Auth::user();
        $this->data['information'] = $user;
        $this->data['type'] = $request->type;
        return view('home.historywithdrawal', $this->data);
    }

    public function historywithdrawals(Request $request)
    {
        $query = DB::select(DB::raw("
                select *, count(*) over() as total from transfers
                where  customer_id = :customer_id
                and type = :type
                order by id desc
                limit :offset,:limit()
        "), ['customer_id' => Auth::user()->id, 'type' => $request->type, 'offset' => $request->offset, 'limit' => $request->limit]);

        $data = collect($query);
        $total = 0;
        $rows = [];
        if ($data != null && count($data) > 0) {
            $total = $data[0]->total;
            foreach ($data as $item) {
                array_push($rows, [
                    'id' => $item->id,
                    'money' => number_format($item->money),
                    'status' => $item->status == 0 || $item->status == -1 ? 'Chờ duyệt' : ($item->status == 1 ? 'Thành công' : 'Huỷ'),
                    'created_at' => $item->created_at
                ]);
            }
        }

        return $this->data([
            'total' => $total,
            'data' => $rows
        ]);
    }

    public function changepassword()
    {
        $this->data['information'] = Auth::user();
        return view('home.changepassword', $this->data);
    }

    public function withdraw(Request $request)
    {
        $this->data['page'] = 'bank';
        if ($request == null || $request->type == null) {
            $this->data['type'] = 1;
        } else {
            $this->data['type'] = $request->type;
        }
        // $dataConfig = DB::table('config_transfer')->where('customer_id', Auth::user()->id)->first();

        // if ($dataConfig != null) {
        //     $this->data['money'] = $dataConfig->recharge_money > $dataConfig->play_money ? $dataConfig->recharge_money - $dataConfig->play_money : 0;
        // } else {
        //     $this->data['money'] = 0;
        // }

        $totalCount = DB::table('transfers')
            ->where('type', 2)
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('status <= 1')
            ->whereRaw('date(created_at) = date(now())')
            ->count();

        $totalSetting = DB::table('settings')->where('setting_key', 'withdraw_quantity')->first();

        $this->data['total'] = intval($totalSetting->setting_value) - $totalCount;
        
         $debt = DB::table('customer_debt')->where('customer_id', Auth::user()->id)->whereRaw('status <= 1')->selectRaw('sum(deposit) as total, sum(money) as debt')->first();
         
         $dataCustomer = Customer::find(Auth::user()->id);
         $totalMoney = $dataCustomer->money;
         
         if($debt != null){
             $totalMoney = $totalMoney - $debt->total - $debt->debt;
         }
         $this->data['totalMoney'] = $totalMoney < 0 ? 0 : $totalMoney;

        $this->data['page'] = 'withdraw';
        // $this->data['usdt'] = DB::table('settings')->where('setting_key', 'usdt')->first();
        $user = Auth::user();
        $this->data['information'] = $user;
                $this->data['bank_info'] = DB::table('customer_bank')->where('cus_id',$user->id)->get();

        return view('home.withdraw', $this->data);
    }

    public function get_product($type)
    {
        if ($type == 'b' || $type == 'g' || $type == 'h' || $type == 'i' || $type == 'j') {
            return 'Hot Trend';
        } else {
            return 'Viral';
        }
    }

    public function get_name($type)
    {
        if ($type == 'gold') {
            return 'Vàng bạc';
        } else if ($type == 'ruby') {
            return 'Lúa gạo';
        } else if ($type == 'platinum') {
            return 'Xăng dầu';
        } else if ($type == 'a') {
            return 'A';
        } else if ($type == 'b') {
            return 'B';
        } else if ($type == 'c') {
            return 'V1';
        } else if ($type == 'd') {
            return 'LG';
        } else if ($type == 'e') {
            return 'V2';
        } else if ($type == 'f') {
            return 'A1';
        } else if ($type == 'g') {
            return 'A2';
        } else if ($type == 'h') {
            return 'P';
        } else if ($type == 'i') {
            return 'D';
        } else if ($type == 'j') {
            return 'V3';
        } else if ($type == 'ring') {
            return 'Hot Trend';
        } else if ($type == 'neck') {
            return 'Viral';
        }
    }

    public function get_value($type)
    {
        if ($type == 'a') {
            return 'A';
        } else if ($type == 'b') {
            return 'B';
        } else if ($type == 'c') {
            return 'V1';
        } else if ($type == 'd') {
            return 'LG';
        } else if ($type == 'e') {
            return 'V2';
        } else if ($type == 'f') {
            return 'A1';
        } else if ($type == 'g') {
            return 'A2';
        } else if ($type == 'h') {
            return 'P';
        } else if ($type == 'i') {
            return 'D';
        } else if ($type == 'j') {
            return 'V3';
        }
    }

    public function get_type($type)
    {
        if ($type == 'c' || $type == 'e' || $type == 'h' || $type == 'j') {
            return 'Vàng Bạc';
        } else if ($type == 'd' || $type == 'f' || $type == 'g' || $type == 'i') {
            return 'Xăng Dầu';
        } else if ($type == 'a') {
            return 'Vàng bạc/Lúa gạo';
        } else if ($type == 'b') {
            return 'Xăng Dầu/Lúa gạo';
        } else {
            return 'Lúa Gạo';
        }
    }

    public function history_session(Request $request)
    {
        $query = DB::select(DB::raw("
                select *, count(*) over() as total from room_sessions 
                where  DATE_ADD(created_at, INTERVAL 62 SECOND) < now() 
                order by id desc
                limit :offset,:limit
        "), ['offset' => $request->offset, 'limit' => $request->limit]);

        $data = collect($query);
        $total = 0;
        if ($data) {
            $total = $data[0]->total;
        }
        $rows = [];
        foreach ($data as $item) {
            array_push($rows, [
                'id' => $item->id,
                'value' => $this->get_value($item->number),
                'type' => $this->get_type($item->number),
                'product' => $this->get_product($item->number)
            ]);
        }
        return $this->data([
            'total' => $total,
            'data' => $rows
        ]);
    }

    public function bank()
    {
        $this->data['bankName'] = DB::table('settings')->where('setting_key', 'bank_name')->first()->setting_value;
        $this->data['bankNumber'] = DB::table('settings')->where('setting_key', 'bank_number')->first()->setting_value;
        $this->data['bankAccount'] = DB::table('settings')->where('setting_key', 'bank_account')->first()->setting_value;
        $this->data['bank_content'] = DB::table('settings')->where('setting_key', 'bank_content')->first()->setting_value;

        $this->data['information'] = Auth::user();
        $rechargeData = DB::table('transfers')
            ->where('type', 1)
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('DATE_ADD(created_at, INTERVAL 30 MINUTE) > now()')
            ->whereRaw('status <= 0')
            ->first();
        if ($rechargeData != null) {
            $this->data['second'] = Carbon::parse($rechargeData->created_at)->addSeconds(1800)->diffInSeconds(Carbon::now());
        } else {
            $this->data['second'] = 0;
        }
        $this->data['rechargeData'] = $rechargeData;

        return view('home.bank', $this->data);
    }

    public function withdrawals(Request $request)
    {

        if (empty($request->password)) {
            return $this->error('Vui lòng xác nhận mật khẩu');
        }
        if (Auth::user()->password != md5($request->password)) {
            return $this->error('Mật khẩu đăng nhập không đúng');
        }
        if($request->bank == null){
           return $this->error('Vui lòng lựa chọn tài khoản rút tiền');
        }

        // $checkDebt = DB::table('customer_debt')
        //     ->where('customer_id', Auth::user()->id)
        //     ->where('status', 0)
        //     ->first();
        // if ($checkDebt != null) {
        //     return $this->error('Vui lòng thanh toán khoản nợ trước');
        // }
        $bank = DB::table('customer_bank')->where('id',$request->bank)->first();
        if($bank->cus_id != Auth::user()->id){
            return $this->error('Yêu cầu rút không hợp lệ');
        }

        if (!is_numeric($request->amount)) {
            return $this->error('Số tiền rút không hợp lệ');
        }

        $amount = intval($request->amount);
        if ($amount <= 0) {
            return $this->error('Số tiền rút không hợp lệ');
        }
        if ($amount < 50000) {
            return $this->error('Rút tối thiểu 50.000đ');
        }

        $userCurrent = DB::table('customers')->where('id', Auth::user()->id)->first();
        if (empty($userCurrent->bank_account) || empty($userCurrent->bank_number)) {
            return $this->error('Vui lòng cập nhật thông tin thanh toán để rút tiền');
        }
        if ($userCurrent->money < $amount) {
            return $this->error("Số dư không đủ để rút");
        }
        
        $totalMoney = $userCurrent->money;
        $debt = DB::table('customer_debt')->where('customer_id', Auth::user()->id)->whereRaw('status <= 1')->selectRaw('sum(deposit) as total, sum(money) as debt')->first();
        if($debt != null){
            $totalMoney = $totalMoney - $debt->total - $debt->debt;
        }
        if ($totalMoney < $amount) {
            return $this->error("Số dư không đủ để rút");
        }
        // if ($dataConfig != null) { 
        //     if($dataConfig->recharge_money - $dataConfig->play_money > 0){
        //         return $this->error("Cần giao dịch " + number_format($dataConfig->recharge_money - $dataConfig->play_money) + ' để rút tiền');
        //     }
        // }

        DB::table('transfers')->insert([
            'customer_id' => Auth::user()->id,
            'type' => 2,
            'note' => '',
            'money' => $request->amount,
            'created_at' => Carbon::now(),
            'status' => 0,
            'information' => $bank->bank_name . '|' . $bank->bank_account . '|' . $bank->bank_number,
            'money_type' => 1
        ]);
        $beforeAmount = $userCurrent->money;
        $afterAmount = $userCurrent->money - $amount;
        DB::table('historys')->insert([
            'customer_id' => Auth::user()->id,
            'befores' => $beforeAmount,
            'money' => $amount,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Rút tiền về tài khoản '.$bank->bank_number,
            'note_trans' => '提款至账户 ' .$bank->bank_number
        ]);
        DB::table('customers')->where('id', Auth::user()->id)->update([
            'money' => $afterAmount
        ]);
        return $this->success("Yêu cầu thành công");


    }

    public function recharges(Request $request)
    {
        $note = ($request->note);
        if (!is_numeric($request->price)) {
            return $this->error('Số tiền nạp không hợp lệ');
        }
        $amount = intval($request->price);
        if ($amount <= 0) {
            return $this->error('Số tiền nạp không hợp lệ');
        }
        if ($amount > 30000000000) {
            return $this->error('Nạp tối đa 30.000.000.000đ');
        }
        if ($amount < 10000) {
            return $this->error('Nạp tiền tối thiểu 10.000đ');
        }
        $dataCheck = DB::table('transfers')
            ->where('type', 1)
            ->where('customer_id', Auth::user()->id)
            ->whereRaw('DATE_ADD(created_at, INTERVAL 30 MINUTE) > now()')
            ->whereRaw('status <= 0')
            ->first();

        if ($dataCheck != null) {
            return $this->error('Bạn có đơn nạp chưa được duyệt');
        }
        DB::table('transfers')->insert([
            'customer_id' => Auth::user()->id,
            'type' => 1,
            'note' => '',
            'money' => $amount,
            'created_at' => Carbon::now(),
            'information' => $note,
            'status' => 0,
            'money_type' => 1
        ]);

        return $this->success("Đã gửi yêu cầu nạp");

    }

    public function bankupdate(Request $request)
    {
        if ($request->type == 1) {
            if (empty($request->bankname)) {
                return $this->error("Vui lòng chọn ngân hàng");
            }
            if (empty($request->account)) {
                return $this->error("Vui lòng nhập chủ tài khoản");
            }
            if (empty($request->number)) {
                return $this->error("Vui lòng nhập số tài khoản");
            }

            $bankExist = DB::table('customers')->where('bank_number', trim($request->number))->first();

            if ($bankExist != null) {
                return $this->error('Tài khoản ngân hàng đã tồn tại');
            }

            DB::table('customers')->where('id', Auth::user()->id)->update([
                'bank_name' => $request->bankname,
                'bank_account' => $request->account,
                'bank_number' => $request->number,
            ]);
            return $this->success("Cập nhật thành công");
        }
        if (empty($request->walletname)) {
            return $this->error("Vui lòng chọn mạng chính");
        }
        if (empty($request->walletaccount)) {
            return $this->error("Vui lòng nhập địa chỉ ví USDT");
        }
        if (empty($request->walletnumber)) {
            return $this->error("Vui lòng nhập bí danh");
        }

        $walletExist = DB::table('customers')->where('wallet_number', trim($request->walletnumber))->first();

        if ($walletExist != null) {
            return $this->error('Tài khoản ví điện tử đã tồn tại');
        }

        DB::table('customers')->where('id', Auth::user()->id)->update([
            'wallet_name' => $request->walletname,
            'wallet_account' => $request->walletaccount,
            'wallet_number' => $request->walletnumber,
        ]);
        return $this->success("Cập nhật thành công");
    }

    public function get_bonus()
    {
        $bonus = DB::table('transfers')->where('customer_id', Auth::user()->id)
            ->where('type', 1)
            ->where('status', 0)->first();
        if ($bonus != null) {
            DB::table('transfers')->where('id', $bonus->id)->update([
                'status' => 1
            ]);
        }
        return $this->success($bonus != null ? $bonus->note : '');
    }

    public function changepasswords(Request $request)
    {
        if (md5($request->old) != Auth::user()->password) {
            return $this->error("Mật khẩu hiện tại không đúng");
        }
        if ($request->old == $request->new) {
            return $this->error("Mật khẩu mới trùng với mật khẩu hiện tại");
        }
        if ($request->confirm != $request->new) {
            return $this->error("Xác nhận mật khẩu không đúng");
        }
        DB::table('customers')->where('id', Auth::user()->id)->update([
            'password' => md5($request->new)
        ]);
        session()->flush();
        Auth::logout();
        return $this->success("Đổi mật khẩu thành công");
    }

    public function follow(Request $request)
    {
        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();
        if ($stockData == null) {
            return $this->error('Mã cổ phiếu không hợp lệ');
        }
        $stockFollow = DB::table('stock_follows')->where('stock', $request->stock)->where('customer_id', Auth::user()->id)->first();
        if ($stockFollow != null) {
            return $this->error('Đã theo dõi mã cổ phiếu này rồi');
        }
        DB::table('stock_follows')->insert([
            'exchange' => $stockData->exchange,
            'stock' => $request->stock,
            'customer_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return $this->success("Theo dõi thành công");
    }

    public function buy(Request $request)
    {
        
        
        $todayDate = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now()->format('H:i:s');
    
        $dayoffRecords = DB::table('day_off')->where('day', $todayDate)->get();

        if ($dayoffRecords->count() > 0) {
            foreach ($dayoffRecords as $item) {
                $timestart = $item->from_hour;
                $timeEnd = $item->to_hour;
                $dayName = $item->name;
    
                if ($currentTime <= $timestart || $currentTime >= $timeEnd) {
                       return $this->error('Do hôm nay là '.$dayName.' nên khung giờ giao dịch được thay đổi thành mở cửa lúc: '.$timestart.' và đóng cửa lúc: '.$timeEnd);
                }
            }
        }

        if (!is_numeric($request->amount)) {
            return $this->error('Số tiền không hợp lệ');
        }

        $amount = intval($request->amount);
        if ($amount <= 0) {
            return $this->error('Số tiền không hợp lệ');
        }

        if (!is_numeric($request->quantity)) {
            return $this->error('Số lượng không hợp lệ');
        }

        $quantity = intval($request->quantity);
        if ($quantity <= 0) {
            return $this->error('Số lượng không hợp lệ');
        }

        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();

        if ($stockData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }

        $redisData = Redis::get($stockData->exchange . '_' . $stockData->stock);

        if ($redisData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }
        
 
    
    
       
    

        $stockRedis = json_decode($redisData);

        $customerData = Customer::find(Auth::user()->id);

        $fee = floatval(DB::table('settings')->where('setting_key', 'fee')->first()->setting_value);
        $totalAmount = $amount * $quantity;
        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('status', 1)
            ->where('type', 5)
            ->first();
        if ($checkDebt != null) {
            $totalFee = $totalAmount * $fee / 100;
        } else {
            $totalFee = 0;
        }

        $totalFeeF0 = Auth::user()->fee;

        if ($totalFeeF0 > 0 && $customerData->role == 0) {
            $customerF0 = Customer::find($customerData->getRoot()->id);
            $feeMoney = $totalAmount * $totalFeeF0 / 100;
            $totalFee += $feeMoney;
            $beforeAmountF0 = $customerF0->money;
            $afterAmountF0 = $customerF0->money + $feeMoney;
            DB::table('historys')->insert([
                'customer_id' => $customerF0->id,
                'befores' => $beforeAmountF0,
                'money' => $feeMoney,
                'afters' => $afterAmountF0,
                'created_at' => Carbon::now(),
                'note' => 'Nhận phí giao dịch từ cấp dưới',
                'note_trans' => '从下级收取交易费用'
            ]);
            DB::table('customers')->where('id', $customerF0->id)->update([
                'money' => $afterAmountF0
            ]);
        }

        if ($totalAmount + $totalFee > $customerData->money) {
            return $this->error('Số dư ví không đủ để giao dịch');
        }

        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money - ($totalAmount + $totalFee);

        $id = DB::table('orders')->insertGetId([
            'customer_id' => $customerData->id,
            'type' => 1,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'quantity' => $quantity,
            'prices' => $amount,
            'fee' => $totalFee,
            'status' => $amount >= $stockRedis->lastPrice * 1000 ? 1 : 0,
            'match_at' => Carbon::now()
        ]);
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $totalAmount + $totalFee,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Mua ' . number_format($quantity) . ' cổ phiếu ' . $stockData->stock, // Translated to Vietnamese
            'note_trans' => '购买 ' . number_format($quantity) . ' 股票 ' . $stockData->stock . ' ' . number_format($amount) // Bản dịch sang tiếng Trung giản thể
        ]);
        DB::table('stock_tplus')->insert([
            'order_id' => $id,
            'customer_id' => $customerData->id,
            'type' => 1,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'quantity' => $quantity,
            'price' => $amount,
            't' => 0,
            'calculate_at' => Carbon::now(),
            'status' => $amount >= $stockRedis->lastPrice * 1000 ? 1 : 0
        ]);
        if ($amount >= $stockRedis->lastPrice * 1000) {
            $customerParentId = $customerData->getRoot()->id;
            $refData = DB::table('ref_customer')->where('customer_id', $customerParentId)->whereRaw('MONTH(created_at) = MONTH(now())')->first();
            if ($refData != null) {
                DB::table('ref_customer')->where('id', $refData->id)->update([
                    'total_money' => $refData->total_money + $totalFee
                ]);
            } else {
                DB::table('ref_customer')->insert([
                    'customer_id' => $customerParentId,
                    'total_money' => $totalFee,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);

        return $this->success('Đặt lệnh thành công');
    }

    public function sell(Request $request)
    {
        
        
        $todayDate = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now()->format('H:i:s');
    
        $dayoffRecords = DB::table('day_off')->where('day', $todayDate)->get();

        if ($dayoffRecords->count() > 0) {
            foreach ($dayoffRecords as $item) {
                $timestart = $item->from_hour;
                $timeEnd = $item->to_hour;
                $dayName = $item->name;
    
                if ($currentTime <= $timestart || $currentTime >= $timeEnd) {
                       return $this->error('Do hôm nay là '.$dayName.' nên khung giờ giao dịch được thay đổi thành mở cửa lúc: '.$timestart.' và đóng cửa lúc: '.$timeEnd);
                }
            }
        }
    
        if (!is_numeric($request->amount)) {
            return $this->error('Số tiền không hợp lệ');
        }

        $amount = intval($request->amount);
        if ($amount <= 0) {
            return $this->error('Số tiền không hợp lệ');
        }

        if (!is_numeric($request->quantity)) {
            return $this->error('Số lượng không hợp lệ');
        }

        $quantity = intval($request->quantity);
        if ($quantity <= 0) {
            return $this->error('Số lượng không hợp lệ');
        }

        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();

        if ($stockData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }

        $redisData = Redis::get($stockData->exchange . '_' . $stockData->stock);

        if ($redisData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }
        

        $stockRedis = json_decode($redisData);

        $customerData = Customer::find(Auth::user()->id);

        $totalAvaiable = DB::table('stock_tplus')
            ->where('customer_id', $customerData->id)
            ->where('stock', $stockData->stock)
            ->where('status', 1)
            ->whereRaw('((type = 1 and t >= 3) or type = 2)')
            ->selectRaw('ifnull(sum(quantity),0) as quantity')
            ->first();

        if ($totalAvaiable == null) {
            return $this->error('Số lượng cổ phiếu có sẵn không đủ');
        }

        if ($totalAvaiable->quantity < $quantity) {
            return $this->error('Số lượng cổ phiếu có sẵn không đủ');
        }

        $checkDebt = DB::table('customer_debt')
            ->where('customer_id', Auth::user()->id)
            ->where('status', 1)
            ->where('type', 5)
            ->first();
        $totalSub = 0;
        if ($checkDebt != null) {
            $totalCal = DB::table('stock_tplus')
                ->where('customer_id', $customerData->id)
                ->where('stock', $stockData->stock)
                ->where('status', 1)
                ->where('type', 1)
                ->get();
            $totalPrice = 0;
            $totalQuan = 0;
            if ($totalCal != null && count($totalCal) > 0) {
                foreach ($totalCal as $item) {
                    $totalPrice += $item->price;
                    $totalQuan += $item->quantity;
                }
                $totalPriceTB = round($totalPrice / $totalQuan);
                if ($amount <= $stockRedis->lastPrice * 1000 && $totalPriceTB < $amount) {
                    $totalSub = ($amount - $totalPriceTB) * $quantity;
                }
            }
        }

        $fee = floatval(DB::table('settings')->where('setting_key', 'fee')->first()->setting_value);

        $totalAmount = $amount * $quantity;

        $totalFee = ($totalAmount * $fee) / 100;
        if ($checkDebt == null) {
            $totalFeeF0 = Auth::user()->fee;

            if ($totalFeeF0 > 0 && $customerData->role == 0) {
                $customerF0 = Customer::find($customerData->getRoot()->id);
                $feeMoney = $totalAmount * $totalFeeF0 / 100;
                $totalFee += $feeMoney;
                $beforeAmountF0 = $customerF0->money;
                $afterAmountF0 = $customerF0->money + $feeMoney;
                DB::table('historys')->insert([
                    'customer_id' => $customerF0->id,
                    'befores' => $beforeAmountF0,
                    'money' => $feeMoney,
                    'afters' => $afterAmountF0,
                    'created_at' => Carbon::now(),
                    'note' => 'Nhận phí giao dịch từ cấp dưới',
                        'note_trans' => '从下级收取交易费用' // Bản dịch sang tiếng Trung giản thể

                ]);
                DB::table('customers')->where('id', $customerF0->id)->update([
                    'money' => $afterAmountF0
                ]);
            }
        }

        $id = DB::table('orders')->insertGetId([
            'customer_id' => $customerData->id,
            'type' => 2,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'quantity' => $quantity,
            'prices' => $amount,
            'fee' => $totalFee,
            'status' => $amount <= $stockRedis->lastPrice * 1000 ? 1 : 0,
            'match_at' => Carbon::now()
        ]);



        DB::table('stock_tplus')->insert([
            'order_id' => $id,
            'customer_id' => $customerData->id,
            'price' => $amount,
            'type' => 2,
            'stock' => $stockData->stock,
            'created_at' => Carbon::now(),
            'calculate_at' => Carbon::now(),
            'quantity' => 0 - $quantity,
            't' => 1,
            'status' => $amount <= $stockRedis->lastPrice * 1000 ? 1 : 0
        ]);

        if ($amount <= $stockRedis->lastPrice * 1000) {
            $customerParentId = $customerData->getRoot()->id;
            $refData = DB::table('ref_customer')->where('customer_id', $customerParentId)->whereRaw('MONTH(created_at) = MONTH(now())')->first();
            if ($refData != null) {
                DB::table('ref_customer')->where('id', $refData->id)->update([
                    'total_money' => $refData->total_money + $totalFee + $totalSub
                ]);
            } else {
                DB::table('ref_customer')->insert([
                    'customer_id' => $customerParentId,
                    'total_money' => $totalFee + $totalSub,
                    'created_at' => Carbon::now()
                ]);
            }
            $beforeAmount = $customerData->money;
            $afterAmount = $customerData->money + ($totalAmount - $totalFee);
            DB::table('historys')->insert([
                'customer_id' => $customerData->id,
                'befores' => $beforeAmount,
                'money' => $totalAmount - $totalFee,
                'afters' => $afterAmount,
                'created_at' => Carbon::now(),
                'note' => 'Đặt bán ' . number_format($quantity) . ' CP ' . $stockData->stock,
                    'note_trans' => '卖出 ' . number_format($quantity) . ' 股票 ' . $stockData->stock // Bản dịch sang tiếng Trung giản thể

            ]);
            if ($totalSub > 0) {
                DB::table('historys')->insert([
                    'customer_id' => $customerData->id,
                    'befores' => $afterAmount,
                    'money' => $totalSub,
                    'afters' => $afterAmount - ($totalSub * 0.2),
                    'created_at' => Carbon::now(),
                    'note' => 'Trích lãi cho khoản vay miễn lãi',
                        'note_trans' => '为无息贷款提取利息' // Bản dịch sang tiếng Trung giản thể

                ]);
                $afterAmount -= $totalSub * 0.2;
            }
            DB::table('customers')->where('id', $customerData->id)->update([
                'money' => $afterAmount
            ]);
        }

        return $this->success('Đặt lệnh thành công');
    }

    public function getprofit(Request $request)
    {
        if (empty($request->stock)) {
            return error('Vui lòng nhập mã cổ phiếu');
        }
        $stockData = DB::table('stocks')->where('stock', $request->stock)->first();

        if ($stockData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }
        $redisData = Redis::get($stockData->exchange . '_' . $stockData->stock);

        if ($redisData == null) {
            return $this->error('Mã chứng khoán không hợp lệ');
        }

        $stockRedis = json_decode($redisData);

        $customerData = Customer::find(Auth::user()->id);

        $totalAvaiable = DB::table('stock_tplus')
            ->where('customer_id', $customerData->id)
            ->where('stock', $stockData->stock)
            ->where('status', 1)
            ->whereRaw('((type = 1 and t >= 3) or type = 2)')
            ->selectRaw('ifnull(sum(quantity),0) as quantity')
            ->first();

        if ($totalAvaiable == null) {
            return $this->error('Số lượng cổ phiếu có sẵn không đủ');
        }
        $totalCal = DB::table('stock_tplus')
            ->where('customer_id', $customerData->id)
            ->where('stock', $stockData->stock)
            ->where('status', 1)
            ->where('type', 1)
            ->get();
        $totalPrice = 0;
        $totalQuan = 0;
        foreach ($totalCal as $item) {
            $totalPrice += $item->price;
            $totalQuan += $item->quantity;
        }
        $totalPriceTB = round($totalPrice / $totalQuan);
        if($totalPriceTB >= $stockRedis->lastPrice * 1000){
            return $this->error('Bạn không thể rút lãi vì cổ phiếu chưa có lãi');
        }
        $totalProfit = ($stockRedis->lastPrice * 1000 - $totalPriceTB) * $totalAvaiable->quantity;
        $beforeAmount = $customerData->money;
        $afterAmount = $customerData->money + $totalProfit;
        DB::table('historys')->insert([
            'customer_id' => $customerData->id,
            'befores' => $beforeAmount,
            'money' => $totalProfit,
            'afters' => $afterAmount,
            'created_at' => Carbon::now(),
            'note' => 'Rút tiền lãi ' . number_format($totalProfit) . ' CP ' . $stockData->stock,
            'note_trans' => '提取利润 ' . number_format($totalProfit) . ' 股票 ' . $stockData->stock . ' ' . number_format($amount)// Bản dịch sang tiếng Trung giản thể

        ]);
        DB::table('customers')->where('id', $customerData->id)->update([
            'money' => $afterAmount
        ]);
        return $this->error('Rút lãi thành công');
    }

}
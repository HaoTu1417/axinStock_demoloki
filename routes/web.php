<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PartnerController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Đăng nhập
Route::get('/login', [AuthController::class, 'index'])->name('login');


Route::post('sendOtp', [AuthController::class, 'sendOtp'])->name('sendOtp');
Route::post('sendOtp2', [AuthController::class, 'sendOtp2'])->name('sendOtp2');
Route::post('resetpassword', [AuthController::class, 'resetpassword'])->name('resetpassword');

Route::get('manager/login2', [AdminController::class, 'login'])->name('login2');
Route::post('manager/logins1', [AdminController::class, 'signin'])->name('signin');
Route::post('logins', [AuthController::class, 'signin'])->name('logins');
Route::get('manager/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');

// Quên mật khẩu
Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('forgotpassword', [AuthController::class, 'forgotpassword_post'])->name('forgotpassword_post');
// Đăng ký
Route::get('register', [AuthController::class, 'signup'])->name('signup');
Route::post('registers', [AuthController::class, 'signup_post'])->name('signup_post');
//Đăng xuất
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('support', [HomeController::class, 'support'])->name('support');

Route::get('/test', [AdminController::class, 'makepass'])->name('makepass');
Route::get('/getstockbyexchange', [HomeController::class, 'getstockbyexchange'])->name('getstockbyexchange');
Route::get('/getstock', [HomeController::class, 'getstock'])->name('getstock');
Route::get('exec-order', [AuthController::class, 'exec_order'])->name('exec_order');
Route::get('/', [HomeController::class, 'default'])->name('default');
Route::get('/getvnindex', [HomeController::class, 'getvnindex'])->name('getvnindex');
Route::get('/setdefaultabcxyz', [HomeController::class, 'setdefaultabcxyz']);
Route::get('/setlang', [HomeController::class, 'setlang'])->name('setlang');
// Quan tri
Route::group(['middleware' => ['admin', 'localization'], 'prefix'  => 'manager'], function () {
    Route::get('/customer', [AdminController::class, 'customer'])->name('adminCustomer');
    Route::get('/setLocale', [AdminController::class, 'setLocale'])->name('setLocale');
    Route::get('/notireport', [AdminController::class, 'notireport'])->name('notireport');
    Route::post('/addCustomer', [AdminController::class, 'addCustomer'])->name('addCustomer');
    Route::get('/detaildebt', [AdminController::class, 'detaildebt'])->name('detaildebt');
    Route::get('/customerlist', [AdminController::class, 'customerlist'])->name('customerlist2');
    Route::get('/transfer', [AdminController::class, 'transfer'])->name('transfer');
    Route::post('/adddebt', [AdminController::class, 'adddebt'])->name('adddebt');
    Route::post('/interestStatus', [AdminController::class, 'interestStatus'])->name('interestStatus');
    Route::get('/transferlist', [AdminController::class, 'transferlist'])->name('transferlist');
    Route::get('/logincustomer', [AdminController::class, 'logincustomer'])->name('logincustomer');
    Route::post('/changeinfor', [AdminController::class, 'changeinfor'])->name('changeinfor');
    Route::post('/customerdelete', [AdminController::class, 'customerdelete'])->name('customerdelete');
    Route::post('/transferstatus', [AdminController::class, 'transferstatus'])->name('transferstatus');
    Route::get('/history', [AdminController::class, 'history'])->name('history3');
    Route::get('/historylist', [AdminController::class, 'historylist'])->name('historylist');
    
    Route::get('/stock', [AdminController::class, 'stock'])->name('stock');
    Route::get('/stockList', [AdminController::class, 'stockList'])->name('stockList');
    
    
    Route::get('/play', [AdminController::class, 'play'])->name('play2');
    Route::get('/playlist', [AdminController::class, 'playlist'])->name('playlist');
    Route::get('/session', [AdminController::class, 'session'])->name('session');
    Route::get('/ref', [AdminController::class, 'ref'])->name('ref2');
    Route::get('/reflist', [AdminController::class, 'reflist'])->name('reflist');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/settings', [AdminController::class, 'settings'])->name('settings');    
    Route::get('/sessionlist', [AdminController::class, 'sessionlist'])->name('sessionlist');
    Route::post('/changesession', [AdminController::class, 'changesession'])->name('changesession');
    Route::get('/playlistsession', [AdminController::class, 'playlistsession'])->name('playlistsession');
    Route::get('/reportsession', [AdminController::class, 'reportsession'])->name('reportsession');
    Route::get('/giftcodelist', [AdminController::class, 'giftcodelist'])->name('giftcodelist');
    Route::get('/giftcode', [AdminController::class, 'giftcode'])->name('giftcode');
    Route::post('/addoreditgiftcode', [AdminController::class, 'addoreditgiftcode'])->name('addoreditgiftcode');
    Route::get('/historygiftcode', [AdminController::class, 'historygiftcode'])->name('historygiftcode');
    Route::get('/deletegiftcode', [AdminController::class, 'deletegiftcode'])->name('deletegiftcode');
    Route::get('/refdetail', [AdminController::class, 'refdetail'])->name('refdetail');
    Route::post('/createaccount', [AdminController::class, 'createaccount'])->name('createaccount');
    Route::get('/getsession', [AdminController::class, 'getsession'])->name('getsession');
    Route::get('/getparent', [AdminController::class, 'getparent'])->name('getparent');
    Route::get('/historylogin', [AdminController::class, 'historylogin'])->name('historylogin');
    Route::get('/reportip', [AdminController::class, 'reportip'])->name('reportip');
    Route::get('/reportplay', [AdminController::class, 'reportplay'])->name('reportplay');
    Route::get('/403', [AdminController::class, 'accessdenied'])->name('accessdenied');
    Route::get('/checkpass', [AdminController::class, 'checkpass'])->name('checkpass');
    Route::post('/addcredit', [AdminController::class, 'addcredit'])->name('addcredit');
    Route::get('/getUserinfo', [AdminController::class, 'getUserinfo'])->name('getUserinfo');
    Route::get('/getUserBank', [AdminController::class, 'getUserBank'])->name('getUserBank');
    Route::post('/updateCustomer', [AdminController::class, 'updateCustomer'])->name('updateCustomer');
    Route::post('/updateReport', [AdminController::class, 'updateReport'])->name('updateReport');
    Route::get('/report', [AdminController::class, 'report'])->name('report');
    Route::get('/debtreport', [AdminController::class, 'debtreport'])->name('debtreport');
    Route::get('/getReportinfo', [AdminController::class, 'getReportinfo'])->name('getReportinfo');
    Route::get('/customerTable', [AdminController::class, 'customerTable'])->name('customerTable');
    Route::get('/paydebt', [AdminController::class, 'paydebt'])->name('paydebt2');
    Route::get('/deleteCustomer', [AdminController::class, 'deleteCustomer'])->name('deleteCustomer');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orderList', [AdminController::class, 'orderList'])->name('orderList');
    Route::get('/loan', [AdminController::class, 'loan'])->name('loan');
    Route::get('/loanList', [AdminController::class, 'loanList'])->name('loanList');
    Route::get('/notification', [AdminController::class, 'notification'])->name('notification');
    Route::get('/wallet-save', [AdminController::class, 'walletsave'])->name('walletsave');
    Route::get('/statistic', [AdminController::class, 'statistic'])->name('statistic');
    Route::get('/deleteBankCus', [AdminController::class, 'deleteBankCus'])->name('deleteBankCus');
    Route::get('/debtreportcus', [AdminController::class, 'debtreportcus'])->name('debtreportcus');

    Route::get('/interest', [AdminController::class, 'interest'])->name('interest');
    Route::get('/interestList', [AdminController::class, 'interestList'])->name('interestList');
    Route::post('/acceptdebt', [AdminController::class, 'acceptdebt'])->name('acceptdebt');
    Route::get('/banner', [AdminController::class, 'banner'])->name('banner');
    Route::post('/updateImage', [AdminController::class, 'updateImage'])->name('updateImage');
    Route::post('/addImage', [AdminController::class, 'addImage'])->name('addImage');
    Route::get('/getImageinfo', [AdminController::class, 'getImageinfo'])->name('getImageinfo');
    
    Route::get('/deleteImage', [AdminController::class, 'deleteImage'])->name('deleteImage');
    
    Route::get('/role', [AdminController::class, 'role'])->name('role');

    Route::get('/add-role', [AdminController::class, 'addrole'])->name('add-role');
    Route::post('/addrolepost', [AdminController::class, 'addrolepost'])->name('addrolepost');
    Route::get('/update-role', [AdminController::class, 'updaterole'])->name('update-role');
    Route::post('/updaterolepost', [AdminController::class, 'updaterolepost'])->name('updaterolepost');
    Route::post('/stockStatusUpdate', [AdminController::class, 'stockStatusUpdate'])->name('stockStatusUpdate');
    Route::post('/stockStatus', [AdminController::class, 'stockStatus'])->name('stockStatus');
    
        Route::post('/updateStockData', [AdminController::class, 'updateStockData'])->name('updateStockData');
        Route::post('/createNoti', [AdminController::class, 'createNoti'])->name('createNoti');



    Route::get('/employer', [AdminController::class, 'employer'])->name('employer');
    Route::get('/add-employer', [AdminController::class, 'addemployer'])->name('add-employer');

    Route::post('/addemployer', [AdminController::class, 'addPostemployer'])->name('addemployer');
    Route::post('/dayoffpost', [AdminController::class, 'dayoffpost'])->name('dayoffpost');
    Route::post('/deleteDayoff', [AdminController::class, 'deleteDayoff'])->name('deleteDayoff');
    Route::get('/edit-employer', [AdminController::class, 'editemployer'])->name('edit-employer');
    Route::get('/dayofflist', [AdminController::class, 'dayofflist'])->name('dayofflist');
    Route::get('/dayoff', [AdminController::class, 'day_off'])->name('day_off');
    Route::post('/updateemployer', [AdminController::class, 'updateemployer'])->name('updateemployer');
    Route::post('/sellStockCustomer', [AdminController::class, 'sellStockCustomer'])->name('sellStockCustomer');
    Route::get('/getUserCpInfo', [AdminController::class, 'getUserCpInfo'])->name('getUserCpInfo');
    
    Route::get('/getUserLoanInfo', [AdminController::class, 'getUserLoanInfo'])->name('getUserLoanInfo');
    Route::get('/getUserHistoryInfo', [AdminController::class, 'getUserHistoryInfo'])->name('getUserHistoryInfo');

    Route::post('/addFeeCustomer', [AdminController::class, 'addFeeCustomer'])->name('addFeeCustomer');

    Route::get('/getManagerFee2', [AdminController::class, 'getManagerFee2'])->name('getManagerFee2');
        Route::get('/getManagerFee22', [AdminController::class, 'getManagerFee22'])->name('getManagerFee22');


});
// Người dùng
Route::group(['middleware' => ['user'], 'prefix'  => ''], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');
    Route::get('customer', [HomeController::class, 'customer'])->name('customer');
    Route::get('giftcode', [HomeController::class, 'giftcode'])->name('giftcode3');
    Route::get('historygiftcode', [HomeController::class, 'historygiftcode'])->name('historygiftcode2');
    Route::get('session', [HomeController::class, 'get_session'])->name('get_session');
    Route::post('bettings', [HomeController::class, 'play'])->name('bettings');
    Route::get('changepassword', [HomeController::class, 'changepassword'])->name('changepassword');
    Route::post('changepasswords', [HomeController::class, 'changepasswords'])->name('changepasswords');
    Route::get('historyplays', [HomeController::class, 'historyplay'])->name('historyplay');
    Route::get('historyplay', [HomeController::class, 'history_play'])->name('history_play');
    Route::get('historys', [HomeController::class, 'historys'])->name('historys');
    Route::get('history', [HomeController::class, 'history'])->name('history');
    Route::get('historyrecharge', [HomeController::class, 'historyrecharge'])->name('historyrecharge');
    Route::get('recharges', [HomeController::class, 'recharges'])->name('recharges');
    Route::get('historywithdrawal', [HomeController::class, 'historywithdrawal'])->name('historywithdrawal');
    Route::get('bank', [HomeController::class, 'bank'])->name('bank');
    Route::get('getinfo', [HomeController::class, 'getinfo'])->name('getinfo');
    Route::get('feature', [HomeController::class, 'feature'])->name('feature');
    Route::get('bonus', [HomeController::class, 'get_bonus'])->name('get_bonus');
    Route::get('cancel', [HomeController::class, 'cancel'])->name('cancel');
    Route::post('bankupdate', [HomeController::class, 'bankupdate'])->name('bankupdate');
    Route::get('withdraw', [HomeController::class, 'withdraw'])->name('withdraw');
    Route::post('withdrawals', [HomeController::class, 'withdrawals'])->name('withdrawals');
    Route::post('complete', [HomeController::class, 'complete'])->name('complete');
    Route::get('history-transfer', [HomeController::class, 'historywithdrawal'])->name('historywithdrawal1');
    Route::get('history-transfers', [HomeController::class, 'historywithdrawals'])->name('historywithdrawals');
    Route::get('history-session', [HomeController::class, 'history_session'])->name('history_session');
    Route::get('/boutique/bigstore', [HomeController::class, 'fbgo'])->name('fbgo');
    Route::get('/action', [HomeController::class, 'action'])->name('action');
    Route::get('/action/actiondetail', [HomeController::class, 'actiondetail'])->name('actiondetail');
    Route::get('/DailyTasks', [HomeController::class, 'DailyTasks'])->name('DailyTasks');
    Route::get('/DailyTasks/Record', [HomeController::class, 'DailyTasksRecord'])->name('DailyTasksRecord');
    Route::get('/DailySignIn', [HomeController::class, 'DailySignIn'])->name('DailySignIn');
    Route::get('/DailySignIn/Rules', [HomeController::class, 'DailySignInRules'])->name('DailySignInRules');
    Route::get('/SettingCenter', [HomeController::class, 'SettingCenter'])->name('SettingCenter');
    Route::get('/getgift', [HomeController::class, 'get_gift'])->name('get_gift');
    Route::get('/LoginPassword', [HomeController::class, 'LoginPassword'])->name('LoginPassword');
    Route::get('/agency', [HomeController::class, 'agency'])->name('agency');
    Route::get('/agency', [HomeController::class, 'agency'])->name('agency');
    Route::get('customer', [HomeController::class, 'customer'])->name('customer');
    Route::get('bank', [HomeController::class, 'bank'])->name('bank');
    Route::get('report-agency', [HomeController::class, 'report_agency'])->name('report_agency');
    Route::get('ref-history', [HomeController::class, 'ref_history'])->name('ref_history');
    Route::get('history-play', [HomeController::class, 'historyplay'])->name('historyplay2');
    Route::get('/bank/after', [HomeController::class, 'bankAfter'])->name('bank.after');
    Route::get('/requestdaily', [HomeController::class, 'requestdaily'])->name('requestdaily');
    Route::get('/RedeemGift', [HomeController::class, 'RedeemGift'])->name('RedeemGift');
    Route::get('/maintain', [HomeController::class, 'maintain'])->name('maintain');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/mission', [HomeController::class, 'mission'])->name('mission');
    Route::get('/hoatdong', [HomeController::class, 'hoatdong'])->name('hoatdong');
    Route::get('/chitiet', [HomeController::class, 'chitiet'])->name('chitiet');
    Route::get('/thongbao', [NewController::class, 'thongbao'])->name('thongbao');
    Route::post('/buy', [HomeController::class, 'buy'])->name('buy');
    Route::post('/sell', [HomeController::class, 'sell'])->name('sell');
    Route::get('/follow', [HomeController::class, 'follow'])->name('follow');
    Route::get('/banking', [NewController::class, 'nganhang'])->name('nganhang');
    Route::get('/earn', [NewController::class, 'tichkiem'])->name('tichkiem');
    Route::get('/profit', [NewController::class, 'hoahong'])->name('hoahong');
    Route::get('/rate', [NewController::class, 'tigia'])->name('tigia');
    Route::get('/notification', [NewController::class, 'qltbao'])->name('qltbao');
    Route::get('/report', [NewController::class, 'khieunai'])->name('khieunai');
    Route::get('/historyorder', [HomeController::class, 'historyorder'])->name('historyorder');
    Route::get('/info', [NewController::class, 'info'])->name('info');
    Route::get('/changephone', [NewController::class, 'changephone'])->name('changephone');
    Route::post('/debtday', [HomeController::class, 'debtday'])->name('debtday');
    Route::post('/debtweek', [HomeController::class, 'debtweek'])->name('debtweek');
    Route::post('/debtmonth', [HomeController::class, 'debtmonth'])->name('debtmonth');
    Route::post('/debtfree10', [HomeController::class, 'debtfree10'])->name('debtfree10');
    Route::post('/debtvip', [HomeController::class, 'debtvip'])->name('debtvip');
    Route::get('/interestfree', [NewController::class, 'mienlai'])->name('mienlai');
    Route::get('/free', [NewController::class, 'mienphi'])->name('mienphi');
    Route::get('/dayin', [NewController::class, 'hangngay'])->name('hangngay');
    Route::get('/weekin', [NewController::class, 'hangtuan'])->name('hangtuan');
    Route::get('/monthin', [NewController::class, 'hangthang'])->name('hangthang');
    Route::get('/vip', [NewController::class, 'vip'])->name('vip');
    Route::get('/accountAfter', [NewController::class, 'accountAfter'])->name('accountAfter');
    Route::post('/updatePhone', [NewController::class, 'updatePhone'])->name('updatePhone');
    Route::get('/changePass', [NewController::class, 'changePass'])->name('changePass');
    Route::post('/changePassPost', [NewController::class, 'changePassPost'])->name('changePassPost');
    Route::get('/changePassBank', [NewController::class, 'changePassBank'])->name('changePassBank');
    Route::post('/changePassBankPost', [NewController::class, 'changePassBankPost'])->name('changePassBankPost');
    Route::post('/updateBankInfo', [NewController::class, 'updateBankInfo'])->name('updateBankInfo');
        Route::get('/deleteBankInfo', [NewController::class, 'deleteBankInfo'])->name('deleteBankInfo');

    
    Route::get('/kyc', [NewController::class, 'kyc'])->name('kyc');
    Route::post('/updateKyc', [NewController::class, 'kycUpdate'])->name('kyc_update');
    Route::post('/debttrial', [HomeController::class, 'debttrial'])->name('debttrial');
    Route::post('/postReport', [NewController::class, 'postReport'])->name('postReport');
    Route::post('/submitWallet', [NewController::class, 'submitWallet'])->name('submitWallet');
    Route::get('/addbank', [NewController::class, 'addbank'])->name('addbank');
    Route::post('/paydebt', [HomeController::class, 'paydebt'])->name('paydebt');
    Route::post('/isauto', [HomeController::class, 'isauto'])->name('isauto');
    Route::get('/getstockbyfollow', [HomeController::class, 'getstockbyfollow'])->name('getstockbyfollow');
});

Route::get('/getallstock', [HomeController::class, 'getallstock'])->name('getallstock');
    
Route::group(['middleware' => ['partner'], 'prefix'  => 'partner'], function () {
    Route::get('/customer', [PartnerController::class, 'customer'])->name('pannerCustomer2');
    Route::post('/addCustomer', [PartnerController::class, 'addCustomer'])->name('addCustomer2');
    Route::get('/customerlist', [PartnerController::class, 'customerlist'])->name('customerlist3');
    Route::get('/transfer', [PartnerController::class, 'transfer'])->name('transfer2');
    Route::get('/transferlist', [PartnerController::class, 'transferlist'])->name('transferlist2');
    Route::post('/changeinfor', [PartnerController::class, 'changeinfor'])->name('changeinfor2');
    Route::post('/customerdelete', [PartnerController::class, 'customerdelete'])->name('customerdelete2');
    Route::post('/transferstatus', [PartnerController::class, 'transferstatus'])->name('transferstatus2');
    Route::get('/history', [PartnerController::class, 'history'])->name('history2');
    Route::get('/historylist', [PartnerController::class, 'historylist'])->name('historylist2');
    Route::get('/play', [PartnerController::class, 'play'])->name('play');
    Route::get('/playlist', [PartnerController::class, 'playlist'])->name('playlist2');
    Route::get('/session', [PartnerController::class, 'session'])->name('session2');
    Route::get('/ref', [PartnerController::class, 'ref'])->name('ref');
    Route::get('/reflist', [PartnerController::class, 'reflist'])->name('reflist2');
    Route::get('/setting', [PartnerController::class, 'setting'])->name('setting2');
    Route::post('/settings', [PartnerController::class, 'settings'])->name('settings2');    
    Route::get('/sessionlist', [PartnerController::class, 'sessionlist'])->name('sessionlist2');
    Route::post('/changesession', [PartnerController::class, 'changesession'])->name('changesession2');
    Route::get('/playlistsession', [PartnerController::class, 'playlistsession'])->name('playlistsession2');
    Route::get('/reportsession', [PartnerController::class, 'reportsession'])->name('reportsession2');
    Route::get('/giftcodelist', [PartnerController::class, 'giftcodelist'])->name('giftcodelist2');
    Route::get('/giftcode', [PartnerController::class, 'giftcode'])->name('giftcode2');
    Route::post('/addoreditgiftcode', [PartnerController::class, 'addoreditgiftcode2'])->name('addoreditgiftcode2');
    Route::get('/historygiftcode', [PartnerController::class, 'historygiftcode'])->name('historygiftcode3');
    Route::get('/deletegiftcode', [PartnerController::class, 'deletegiftcode'])->name('deletegiftcode2');
    Route::get('/refdetail', [PartnerController::class, 'refdetail'])->name('refdetail2');
    Route::post('/createaccount', [PartnerController::class, 'createaccount'])->name('createaccount2');
    Route::get('/getsession', [PartnerController::class, 'getsession'])->name('getsession2');
    Route::get('/getparent', [PartnerController::class, 'getparent'])->name('getparent2');
    Route::get('/historylogin', [PartnerController::class, 'historylogin'])->name('historylogin2');
    Route::get('/reportip', [PartnerController::class, 'reportip'])->name('reportip2');
    Route::get('/reportplay', [PartnerController::class, 'reportplay'])->name('reportplay2');
    Route::get('/403', [PartnerController::class, 'accessdenied'])->name('accessdenied2');
    Route::get('/checkpass', [PartnerController::class, 'checkpass'])->name('checkpass2');
    Route::post('/addcredit', [PartnerController::class, 'addcredit'])->name('addcredit2');
    Route::get('/getUserinfo', [PartnerController::class, 'getUserinfo'])->name('getUserinfo2');
    
    Route::post('/updateCustomer', [PartnerController::class, 'updateCustomer'])->name('updateCustomer2');
    Route::post('/updateReport', [PartnerController::class, 'updateReport'])->name('updateReport2');
    Route::get('/report', [PartnerController::class, 'report'])->name('report2');
    Route::get('/getReportinfo', [PartnerController::class, 'getReportinfo'])->name('getReportinfo2');
    Route::get('/customerTable', [PartnerController::class, 'customerTable'])->name('customerTable2');

    Route::get('/deleteCustomer', [PartnerController::class, 'deleteCustomer'])->name('deleteCustomer2');
    Route::get('/orders', [PartnerController::class, 'orders'])->name('orders2');
    Route::get('/orderList', [PartnerController::class, 'orderList'])->name('orderList2');
 Route::get('/loan', [PartnerController::class, 'loan'])->name('loan2');
    Route::get('/loanList', [PartnerController::class, 'loanList'])->name('loanList2');
    Route::get('/notification', [PartnerController::class, 'notification'])->name('notification2');
    Route::get('/wallet-save', [PartnerController::class, 'walletsave'])->name('walletsave2');
    
    Route::get('/interest', [PartnerController::class, 'interest'])->name('interest2');
    Route::get('/interestList', [PartnerController::class, 'interestList'])->name('interestList2');

    Route::get('/banner', [PartnerController::class, 'banner'])->name('banner2');
    Route::post('/updateImage', [PartnerController::class, 'updateImage'])->name('updateImage2');
    Route::post('/addImage', [PartnerController::class, 'addImage'])->name('addImage2');
    Route::get('/getImageinfo', [PartnerController::class, 'getImageinfo'])->name('getImageinfo2');
    

    
    Route::get('/deleteImage', [PartnerController::class, 'deleteImage'])->name('deleteImage2');
});


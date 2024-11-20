<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/dailytasks.css?id=<?php echo rand(0, 9999); ?>">
    <!-- CDN Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
  <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script>
        function completeMission(package){
                $.ajax({
                    url : '/complete',
                    type:'post',
                    dataType:'json',
                    data:{
                        _token: $('#csrf').val(),
                        package: package
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            window.location.reload();
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            }
    </script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>
    <div class="container homecontainer">
        <ul>
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 75px;">Phần Thưởng Hoạt Động</li>
            <li style="float:right;" onclick="location.href='/DailyTasks/Record';"><img style="height: 25px;" src="/assets/images/lsgd.png" alt=""></li>
        </ul>

        <div class="body">
        <div class="task-banner">
            <div><img src="/assets/images/box-16e33f9d.png" alt="">
                <p>
                <div class="banner-content">
                    <div style="margin-bottom: 20px;">Phần thưởng hoạt động</div>
                    <div style="font-size: 13px;">Hoàn thành nhiệm vụ hàng ngày sẽ nhận</div>
                    <div style="font-size: 13px;">được phần quà hấp dẫn Phần thưởng hàng ngày không thể được tích lũy sang ngày hôm sau</div>
                </div>
                </p>
            </div>
        </div>

        <div class="task-panel">
            {{-- <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status new">Gói quà người mới</div><span class="headerR new state0">Chưa hoàn thành</span>
                </div>
                <div class="task-item-type">
                    <div class="type-title new">
                        <div>Gói quà dành cho người mới</div>
                    </div>
                    <div class="type-tip">0/7</div>
                </div>
                <div class="task-item-description">Sau lần nạp tiền đầu tiên, bạn có thể nhận tiền thưởng trong 7 ngày liên tiếp</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="" src="/assets/images/QiWpW5Q.png"><span>9,331.00₫</span></div>
                </div>
                <div class="btn btnNew status0">Hoàn thành</div>
            </div> --}}
            <!-- <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status week">Nhiệm vụ hàng tuần</div><span class="headerR other state1"><?= $re_week_1 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN MỖI NGÀY</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/50000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="" src="/assets/images/QiWpW5Q.png"><span>500,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 50000000 && !$re_week_1) { ?>
                <div class="btn btnOther status1" onclick="completeMission('re_week_1')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status week">Nhiệm vụ hàng tuần</div><span class="headerR other state1"><?= $re_week_2 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN MỖI NGÀY</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/100000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="" src="/assets/images/QiWpW5Q.png"><span>1,000,000.00₫</span></div>
                </div>
                <?php if($reportWeek->totalRecharge >= 100000000 && !$re_week_2) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_week_2')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status week">Nhiệm vụ hàng tuần</div><span class="headerR other state1"><?= $re_week_3 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN MỖI NGÀY</div>
                    </div>
                    <div class="type-tip"><?= $reportWeek->totalRecharge ?>/250000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>2,500,000.00₫</span></div>
                </div>
                <?php if($reportWeek->totalRecharge >= 250000000 && !$re_week_3) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_week_3')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status week">Nhiệm vụ hàng tuần</div><span class="headerR other state1"><?= $re_week_4 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN MỖI NGÀY</div>
                    </div>
                    <div class="type-tip"><?= $reportWeek->totalRecharge ?>/1000000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>20,000,000.00₫</span></div>
                </div>
                <?php if($reportWeek->totalRecharge >= 1000000000 && !$re_week_4) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_week_4')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status week">Nhiệm vụ hàng tuần</div><span class="headerR other state1"><?= $re_week_5 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN MỖI NGÀY</div>
                    </div>
                    <div class="type-tip"><?= $reportWeek->totalRecharge ?>/10000000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>300,000,000.00₫</span></div>
                </div>
                <?php if($reportWeek->totalRecharge >= 10000000000 && !$re_week_5) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_week_5')">Hoàn thành</div>
                <?php } ?>
            </div> -->
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $re_day_1 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/3000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>30,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 3000000 && !$re_day_1) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_day_1')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $re_day_2 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/8000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>80,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 8000000 && !$re_day_2) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_day_2')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $re_day_3 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/15000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>150,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 15000000 && !$re_day_3) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_day_3')">Hoàn thành</div>
                <?php } ?>
                
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $re_day_4 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType1">
                        <div>THƯỞNG NẠP TIỀN</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalRecharge ?>/20000000</div>
                </div>
                <div class="task-item-description">Nạp tiền mỗi ngày đáp ứng điều kiện số tiền bạn có thể nhận thưởng ngay</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>200,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 20000000 && !$re_day_4) {?>
                    <div class="btn btnOther status1" onclick="completeMission('re_day_4')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_1 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/300000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>3,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 300000 && !$bet_day_1) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_1')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_2 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/1000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>10,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 1000000 && !$bet_day_2) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_2')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_3 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/3000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>25,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 3000000 && !$bet_day_3) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_3')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_4 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/10000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>80,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 10000000 && !$bet_day_4) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_4')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_5 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/30000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>150,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 30000000 && !$bet_day_5) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_5')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_6 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/50000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>400,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 50000000 && !$bet_day_6) {?>
                    <div class="btn btnOther status1"  onclick="completeMission('bet_day_6')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_7 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/80000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>600,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 80000000 && !$bet_day_7) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_7')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_8 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/150000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>900,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 150000000 && !$bet_day_8) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_8')">Hoàn thành</div>
                <?php } ?>
            </div>
            <div class="task-item">
                <div class="task-item-header">
                    <div class="hearder-status day">Nhiệm vụ hàng ngày</div><span class="headerR other state1"><?= $bet_day_9 ? 'Đã hoàn thành' : 'Chưa hoàn thành' ?></span>
                </div>
                <div class="task-item-type">
                    <div class="type-title weeklyType3">
                        <div>THƯỞNG VÒNG GIAO DỊCH</div>
                    </div>
                    <div class="type-tip"><?= $reportDay->totalPlay ?>/300000000</div>
                </div>
                <div class="task-item-description">STOREVN68 DAILY BET VOLUME REWARDS</div>
                <div class="task-item-bottom">
                    <div>Tiền thưởng</div>
                    <div class="bottom-title"><img class="ar-lazyload" src="/assets/images/QiWpW5Q.png"><span>2,000,000.00₫</span></div>
                </div>
                <?php if($reportDay->totalRecharge >= 300000000 && !$bet_day_9) {?>
                    <div class="btn btnOther status1" onclick="completeMission('bet_day_9')">Hoàn thành</div>
                <?php } ?>
            </div>
        </div>
        <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
</body>




</html>
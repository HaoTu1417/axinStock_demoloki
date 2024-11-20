<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=5003">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/dailytasks.css?id=4136">
    <!-- CDN Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .dailySignIn__container-hero {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
            margin-bottom: .42667rem;
            padding: 0 .4rem .26667rem;
            background: -webkit-linear-gradient(left, #17192a 0%, #373c5e 98.67%);
            background: linear-gradient(90deg, #17192a 0%, #373c5e 98.67%);
        }

        .dailySignIn__container-hero .header_info {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            color: #fff;
            margin-bottom: 15px;
        }

        .dailySignIn__container-hero .header_info .info {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .dailySignIn__container-hero .header_info .info .sign_box {
            width: 80px;
            height: 80px;
            background: url(/assets/images/sign-bd57c83e.png) no-repeat center center;
            background-size: contain;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .dailySignIn__container-hero .header_info .info .sign_box img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .dailySignIn__container-hero .header_info .info .right_box {
            color: #adb0d4;
            margin-left: 10px;
        }

        .dailySignIn__container-hero .header_info .info .right_box .day_num {
            margin-bottom: .13333rem;
            color: #fff;
            font-size: 15px;
        }

        .dailySignIn__container-hero .header_info .info .right_box .day_num span {
            color: #11bf7a;
            font-size: 15px;
        }

        .dailySignIn__container-hero .header_info .get_amount {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 14px 0.32rem;
            height: .66667rem;
            background: #3e4365;
            color: #ebbb6f;
            font-size: 25px;
            border-radius: .66667rem;
        }

        .dailySignIn__container-hero .header_info .get_amount img {
            width: .48rem;
            height: .48rem;
            vertical-align: middle;
        }

        .dailySignIn__container-hero .header_tip {
            height: 3.33333rem;
            background: rgba(104, 108, 148, .16);
            border-radius: 0.13333rem;
            color: #8d91b8;
            padding: .26667rem;
        }

        .dailySignIn__container-hero__footer {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            margin-top: 2.53333rem;
        }

        .dailySignIn__container-hero__footer .rule {
            border: .01333rem solid #EF4770;
        }

        .dailySignIn__container-hero__footer button {
            width: 3.53333rem;
            height: .8rem;
            border-radius: .8rem;
            padding: .18667rem 0;
            color: #fff;
            font-size: .34667rem;
            line-height: .32rem;
            cursor: pointer;
            background: transparent;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .dailySignIn__container-hero__footer button img {
            width: .64rem;
            height: .64rem;
            margin-right: .10667rem;
        }

        .dailySignIn__container-hero__footer .record {
            border: .01333rem solid #11BF7A;
        }

        .dailySignIn__container-hero__footer button {
            width: 11.53333rem;
            height: 40px;
            border-radius: 1.8rem;
            padding: .18667rem 0;
            color: #fff;
            font-size: 16px;
            line-height: .32rem;
            cursor: pointer;
            background: transparent;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .dailySignIn__container-hero__footer button img {
            width: 1.64rem;
            height: 1.64rem;
            margin-right: .10667rem;
        }

        .dailySignIn__container-content {
            padding-inline: .32rem;
        }

        .dailySignIn__container-content__wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-items: center;
            gap: .2rem;
        }

        .dailySignIn__container-content__wrapper-block {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            width: 125px;
            height: 110px;
            background: url(/assets/images/Unsigned-9eb613a8.png) no-repeat;
            background-position: center;
            background-size: 96% 100%;
        }

        .dailySignIn__container-content__wrapper-block__header {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

        .dailySignIn__container-content__wrapper-block img {
            max-width: 100%;
        }

        .dailySignIn__container-content__wrapper-block__header img {
            width: 1.98667rem;
            height: .72rem;
            visibility: hidden;
        }

        .dailySignIn__container-content__wrapper-block__header span {
            position: absolute;
            top: calc(50% - -12px);
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #8d91b8;
            font-size: 18px;
            line-height: 1;
        }

        .dailySignIn__container-content__wrapper-block>span {
            color: #80849c;
            font-size: 15px;
        }

        .dailySignIn__container-content__wrapper-block:last-of-type {
            position: relative;
            width: 99%;
            grid-column: 1 / -1;
            background: url(/assets/images/day7Bg-6bd16008.png) no-repeat;
            background-position: center;
            background-size: 100% 100%;
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>img {
            position: absolute;
            left: 1.73333rem;
            width: 95px;
            height: 95px;
        }

        .dailySignIn__container-content__footer {
            width: 100%;
            height: 2.06667rem;
            margin-top: 1.45333rem;
            padding: 0 1.13333rem;
            text-align: center;
        }

        .dailySignIn__container-content__footer button {
            width: 100%;
            height: 100%;
            padding-block: .10667rem;
            color: #fff;
            font-size: 20px;
            border: none;
            border-radius: 9rem;
            color: #945b16;
            background: -webkit-linear-gradient(left, #EBBB6F 0%, #CD9047 100%);
            background: linear-gradient(90deg, #EBBB6F 0%, #CD9047 100%);
        }

        .dailySignIn__container-content__wrapper-block>img {
            width: 45px;
            height: 45px;
            margin-block: 1.18667rem .27773rem;
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>div>span:first-of-type:before {
            content: "";
            position: absolute;
            top: 50%;
            left: -0.53333rem;
            -webkit-transform: translate(-100%, -50%);
            transform: translate(-100%, -50%);
            display: block;
            width: 1.32rem;
            height: .02667rem;
            background: -webkit-linear-gradient(right, #c0c4dc 0%, rgba(192, 196, 220, 0) 100%);
            background: linear-gradient(270deg, #c0c4dc 0%, rgba(192, 196, 220, 0) 100%);
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>div>span:first-of-type:after {
            content: "";
            position: absolute;
            top: 50%;
            right: -.53333rem;
            -webkit-transform: translate(100%, -50%);
            transform: translate(100%, -50%);
            display: block;
            width: 1.32rem;
            height: .02667rem;
            background: -webkit-linear-gradient(left, #c0c4dc 0%, rgba(192, 196, 220, 0) 100%);
            background: linear-gradient(90deg, #c0c4dc 0%, rgba(192, 196, 220, 0) 100%);
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>div>span:first-of-type {
            position: relative;
            color: #80849c;
            font-size: 28px;
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>div>span:last-of-type {
            color: #80849c;
            font-size: 15px;
        }

        .dailySignIn__container-content__wrapper-block:last-of-type>div {
            position: absolute;
            top: 50%;
            right: 3.8rem;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            gap: .36rem;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
      <script src="/assets/js/toastr.min.js"></script>
      <script>
          function completeRequest(){
                  $.ajax({
                      url : '/requestdaily',
                      type:'get',
                      dataType:'json',
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
</head>

<body>
    <div class="container homecontainer">
        <ul>
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 130px;">Điểm Danh</li>
            <!-- <li style="float:right;" onclick="location.href='/DailyTasks/Record';"><img style="height: 25px;" src="/assets/images/lsgd.png" alt=""></li> -->
        </ul>

        <div class="body">
            <div class="dailySignIn__container-hero">
                <div class="header_info">
                    <div class="info">
                        <div class="sign_box"><img src="/assets/images/oNvR82H.png" alt=""></div>
                        <div class="right_box">
                            <div class="day_num">Đã liên tiếp điểm danh <span><?= $count ?></span> Ngày</div>
                            <div>Tích lũy được</div>
                        </div>
                    </div>
                    <div class="get_amount"><img src="/assets/images/coin-294b6998.png" alt=""> <?= number_format($total) ?></div>
                </div>
                <div class="header_tip">Nhận phần thưởng dựa trên số ngày đăng nhập liên tiếp</div>
                <div class="dailySignIn__container-hero__footer">
                    <button onclick="location.href='/DailySignIn/Rules';" class="rule"><img src="/assets/images/1hbIvLq.png" alt=""> Quy tắc điểm danh</button>
                    <button class="record"><img src="/assets/images/wEEkhAy.png" alt=""> Lịch sử điểm danh</button>
                </div>
            </div>
            <div class="dailySignIn__container-content">
                <div class="dailySignIn__container-content__wrapper">
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>2,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>1 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>4,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>2 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>8,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>3 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>28,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>4 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>48,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>5 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block">
                        <div class="dailySignIn__container-content__wrapper-block__header"><img class=""><span>68,333.00₫</span></div><img class="" src="/assets/images/coin-294b6998.png"><span>6 Ngày</span>
                    </div>
                    <div class="dailySignIn__container-content__wrapper-block"><img src="/assets/images/day7icon-2e216e91.png" alt="">
                        <div><span>83,333.00₫</span><span>7 Ngày</span></div>
                    </div>
                </div>
                <?php if($count < 7 && !$signinnow) { ?>
                    <div class="dailySignIn__container-content__footer"><button class="" type="button" onclick="completeRequest()">Điểm danh</button></div>
                <?php } ?>
            </div>
</body>




</html>
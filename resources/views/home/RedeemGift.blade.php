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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .redeem-container-header {
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
            width: 100%;
            height: 234px;
        }

        .navbar {
            height: 1.22667rem;
            z-index: 100;
            -webkit-box-flex: 0;
            -webkit-flex: none;
            flex: none;
        }

        .navbar-fixed {
            position: fixed;
            top: 0;
            left: 50%;
            width: 10rem;
            -webkit-transform: translateX(-50%);
            transform: translate(-50%);
            -webkit-user-select: none;
            user-select: none;
            background: #1E2034;
            z-index: 100;
        }

        .navbar__content {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            height: 40px;
        }

        .navbar__content-left {
            position: absolute;
            left: -105px;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            height: 100%;
            top: 0;
        }

        .redeem-container .navbar__content .navbar__content-center,
        .redeem-container .navbar__content .van-icon {
            color: #fff;
        }

        .navbar__content-center {
            color: #fff;
            font-size: 25px;
            line-height: 5px;
        }

        .redeem-container-header-belly {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

        .redeem-container-header-belly img {
            width: 100%;
            border: 0;
        }

        .redeem-container-content {
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
        }

        .redeem-container-receive {
            height: 200px;
            width: calc(100% - .64rem);
            background: #1E2034;
            border-radius: .26667rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            padding: .33333rem 25px;
            margin-top: .4rem;
        }

        .redeem-container-receive p {
            font-size: 15px;
            color: #adb0d4;
            padding-top: 0px;
            margin-top: 0;
            margin-bottom: 0rem;
        }

        .redeem-container-receive h4 {
            font-size: 15px;
            color: #fff;
            margin-top: .90667rem;
        }

        .redeem-container-receive input {
            width: 325px;
            height: 35px;
            background: #303454;
            border-radius: .8rem;
            border: none;
            font-size: 20px;
            color: #fff;
            padding: .29333rem .56rem;
            margin-top: .34667rem;
        }

        .redeem-container-receive button {
            width: 325px;
            height: 35px;
            line-height: .93333rem;
            text-align: center;
            background: -webkit-linear-gradient(left, #EBBB6F 0%, #CD9047 100%);
            background: linear-gradient(90deg, #EBBB6F 0%, #CD9047 100%);
            border-radius: 1.06667rem;
            font-size: 25px;
            color: #fff;
            border: none;
            margin-top: .74667rem;
        }

        .redeem-container-record {
            margin: .4rem 0 .29333rem;
            width: calc(100% - .64rem);
            padding: .34667rem .32rem;
            background: #1E2034;
            border-radius: .26667rem;
        }

        .redeem-container-record-title {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .redeem-container-record-title img {
            width: 1.64rem;
            padding-right: .13333rem;
        }

        .redeem-container-record-title span {
            font-size: 16px;
            color: #fff;
        }

        .redeem-container-record-itemsBox {
            height: 23.66667rem;
            /*overflow-y: auto;*/
            padding-top: 10px;
        }

        .infiniteScroll {
            min-height: 2.66667rem;
            border-radius: .16rem;
        }

        .infiniteScroll__loading {
            width: 100%;
            min-height: 1.4rem;
            margin-top: auto;
            padding-bottom: .4rem;
            color: #999;
            font-size: .37333rem;
            text-align: center;
        }

        .infiniteScroll__loading .empty {
            margin-top: .53333rem;
        }

        .empty__container {
            width: 100%;
            height: 100%;
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
        }

        .empty__container img {
            width: 10rem;
            height: 10.71427rem;
            margin-bottom: .24667rem;
        }

        .empty__container p {
            color: #acafc2;
            font-size: 1.34667rem;
        }
        
         .GameRecord__C-head {
            padding: 8px 0;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;

            background: #303454;

        }

        .GameRecord__C-body {
            padding: 8px 0;
            line-height: 16px;
            font-site: 16px;
            color: #fff;
            background: #1e2034;
            border-bottom: 1px solid #ccc;

        }

        .GameRecord__C-body .col {
            text-align: center;
            white-space: nowrap;
            padding: 6px 0;
        }

        .GameRecord__C-head .col {
            text-align: center;
        }

        .col--8 {
            width: 40% !important;
        }

        .GameRecord__C-foot {
            height: 60px;
            background: #1e2034;
            color: #fff;
            padding: 8px 80px;
            margin-top: 0.48rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .GameRecord__C-foot-prev {
            padding: 8px;
            background: #303454;
            border-radius: 8px;
            transform: rotate(180deg) !important;

        }

        .GameRecord__C-foot-next {
            padding: 8px;
            background: #303454;
            border-radius: 8px;


        }
        
    </style>
</head>

<body>
    <div class="container homecontainer">
        <div class="redeem-container-header">
            <div class="navbar">
                <div class="navbar-fixed" style="background: transparent;">
                    <div class="navbar__content">
                        <div class="navbar__content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i>

                        </div>
                        <div class="navbar__content-center">
                            <div class="navbar__content-title">Quà tặng</div>
                        </div>
                        <div class="navbar__content-right"></div>
                    </div>
                </div>
            </div>
            <div class="redeem-container-header-belly"><img alt="" class="" data-origin="/assets/images/RedeemGift.png" src="/assets/images/RedeemGift.png"></div>
        </div>

        <div class="body">
            <div class="redeem-container-content">
                <div class="redeem-container-receive">
                    <p>Xin chào các thành viên thân mến!</p>
                    <p>Chúng tôi có một món quà dành cho bạn</p>
                    <h4>Vui lòng nhập mã đổi quà gồm 8 chữ số bên dưới</h4>
                    <input type="text" id="txtCode" auto-complete="new-password" autocomplete="off" placeholder="Vui lòng nhập mã đổi quà">
                    <button type="button" id="btnReceiveGiftcode">Nhận</button>
                </div>
                <div class="redeem-container-record">
                    <div class="redeem-container-record-title"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAALASURBVHgB7Zq/b9NAFMe/rl0bEpoGQishotJSEKiJQEX8WmHo1M5UYmMHMfInMLF04j+gE0OZOsBaWFigE6hClAKhQiLBNA4N5Z6jgKWe7fM5zjmqP1KGyL7n93337tl+Z21i8vIeBpghDDiZANUcbAFTYzoe3zmKR7eLyFvipsYLQ2zMqDt2asxAHGIJmJ895DpDQq5ODwuPm2ROk+M0dn7WQhyE5ectDTdmLFybNt2L0//n681/x6tlA/fmjgjZ8o4jnt4vwXb2sPFtlx1z8HbzN2r1P0K2hAQssEjfup5znU4Ksl0tD7s/cp5ELq/thI4zwow+WBhxjfYTSq1FFjCa6aVVm82O/2wErgEVznuhdL07lw88x1cARUCl811IBBULP7gCaAppwYbzf01EKaNeRMYtuuuPfx53DVRY5ElE+MU7lch2OpESpVo28WTtl+uUSGHoVEATz1439x3jCrg5I1abozjtpbtIo0DpzBPADXPcu2MS+PnEFZBkvZfFL6Wzp1HVZAJUkwlQzcALkLpjOU4LW19raO+2IYNu6CgViygUxF6AgpAS8G7jA+qNn4jD9vZ3XLl0AXGRSiFd1xGXXtggpGbgzOlT7gzIphBRGImfPoSUAINF71hxFGkgK6OqkX7wbzqO0HmGbsAwerNgufYhwcetz9j89EX4/Mq5sz2p+TykUsi2wxtOXn40GkgKqRmYOHkCTquFdju8jFqmifHjJSQFVwD1KYNeK3O5w7hYOY9+4tcr5aYQNVnTRq3On22ugFfvW0gbL9b5VY8rgFrclEZpgaL/hrXceXAFkPPLrHOWFiigkdYAscK6YH6q+8lLls5B+wSB94GHKw3XgCro2kurwe8dmshOPfUxqcXdr45dJ4V3WBaE3zA10U8NqLVHDVZqu3f3yHpJd4+MKmCUIqJl30ooJhOgmr/nM8sI9ml8CgAAAABJRU5ErkJggg=="><span>Lịch sử</span></div>
                    <div class="redeem-container-record-itemsBox">
                        <div class="GameRecord__C-head">
                                    <div class="row" style="color:#fff">
                                        <div class="col col-4">Mã</div>
                                        <div class="col col-4">Thời gian</div>
                                        <div class="col col-4">Số tiền</div>
                                    </div>
                                </div>
                                <div class="list-body" id="listHistorySession" style="margin-bottom:20px;font-size: 13px;">

                                </div>
                                <div class="GameRecord__C-foot">
                                    <div class="GameRecord__C-foot-prev btnPrevHistory">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                    <div class="GameRecord__C-foot-page showTotalHistory"></div>
                                    <div class="GameRecord__C-foot-next btnNextHistory">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                </div>
                    </div>
                </div>
            </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/accounting.min.js"></script>
    <script>
            $('#btnReceiveGiftcode').click(function(){
                $.ajax({
                    url : '/giftcode',
                    type:'get',
                    data:{
                        code : $('#txtCode').val()
                    },
                    success: function(res){
                        if(res.status){
                            alert(res.message);
                            getHistory();
                        }
                        else{
                            alert(res.message);
                        }
                    }
                })
            });
    
            let offset = 0;
            let total = 0;
            getHistory();
            function getHistory() {
                $.ajax({
                    url: '/historygiftcode',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        offset: offset,
                        limit: 5
                    },
                    success: function(res) {
                        var html = '';
                        total = res.total;
                        $('.showTotalHistory').html((offset == 0 ? 1 : 1 + (offset / 5)) + '/' + Math
                            .round(res.total < 5 ? 1 : res.total / 5).toString());
                        if (res.data.length > 0) {
                            for (var i = 0; i < res.data.length; i++) {
                                html += '<div class="GameRecord__C-body"> <div class="row">';
                                html += '<div class="col col-4" style="font-size:14px;">' + res.data[i]
                                    .code + '</div>';
                                html += '<div class="col col-4">' + res.data[i].created_at + '</div>';
                                html += '<div class="col col-4">' + accounting.formatNumber(res.data[i].money) + '</div>';
                                html += '</div></div>';
                            }
                            $('#listHistorySession').html(html);
                        } else {
                            $('#listHistorySession').html('Không có lịch sử');
                        }
                    }
                });
            }

            $('.btnPrevHistory').click(function() {
                if(offset < 5) return;
                if (offset <= 5) {
                    $(this).css('background', '#303454');
                }
                else {
                    $(this).css('background','#ff650bc4');
                }
                offset -= 5;
                getHistory();
            });
            $('.btnNextHistory').css('background','#ff650bc4');
            $('.btnNextHistory').click(function() {
                if (total < 5) {
                    return;
                }
                offset += 5;
                getHistory();
                $(this).css('background', '#ff650bc4');
                $('.btnPrevHistory').css('background', '#ff650bc4');
            });
    </script>
</body>




</html>
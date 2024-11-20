<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            height: 100%;
        }

        .homecontainer {
            overflow: hidden;
            min-height: 100vh;
        }

        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .body {
            padding-top: 50px;
            width: 100%;
        }

        .content {
            padding: 0 10px;
        }

        .body {
            background-color: #161829;
            padding-bottom: 40px;
            min-height: 100vh;
        }

        .promote__cell {
            margin-top: 10px;
        }

        .container {
            position: relative;
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
            height: auto;
            color: #fff;
            border-radius: 4px;
            background-image: url(/assets/png/promotionbg-2b04e452.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .container .amount {
            font-weight: 500;
            font-size: 20px;
            line-height: 20px;
            color: #fff;
            height: 30px;
            padding-top: 20px !important;
            margin-bottom: 20px;
        }

        .container .amount_txt {
            height: 20px;
            border-radius: 0.66667rem;
            text-align: center;
            font-size: 13px !important;
            white-space: nowrap;
            padding: 0 0.33333rem;
            margin-bottom: 10px !important;
        }

        .container .tip {
            font-size: 12px;
            margin-bottom: 4px;
        }

        .container .info_content {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            width: 100%;
        }

        .container .info_content .info {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            padding-bottom: 10px;
        }

        .container .info_content .info .head {
            margin-top: 20px;
            height: 20px;
            line-height: 20px;
            color: #fff;
            font-size: 14px;
            padding-left: 40px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAJTSURBVHgB7ZjNUeswEMf/8ju8eTfSgV8FL68CnAMMw4V0AB3gDggdJBUAFQA3OJEOSAe4A+fGxwGzlg0ktrTyGvI16DfjiSf6y961dqWVAI/Hs9EofIF0L46Q4YBu+3SF5d8TfSmcdm6GCRZMKwfSfryFR5zQbeyQDvGHHLkaTo3P2Ym7CHBHt+ecjiOAkNL4/KUu46E1pNV9TPxC/v+WU8cgdqD88l1Bj27ZpwaF2Jhi4C/dJpyOQxRCFPMhxfwD2qDQ0wbbn3uPfDQYnQnZCGTyLzTTt29r0smuMHLpTEhDSBI6VQ4c7eOGujmW6UDINc6EDaurIk/iNUPqQIL2TLhGvSY00FWROnCNlgTKYViA40a6WjcJCldoyStwamvT0yhw5NKZEDlQJtoIcka2uqhcA+5cOhvyJH7GALI4nVCdMzA16LgvFrCQ03GIHeiMqeB6Rg/NRmJERvWsRdpnLcTrGL5aTof0M6Cv+A/va4SimSqjZKd8kZQEHo/Hs5k4p9GZk4cI+Ji3xXtXFIVgcSlcNJli82natTIrrjMZfobC8EWQlNvHxNSY7sZ9ar906Ywr8cwSH2Fx6H1wuh+bN0nZx4ixutoIzG2wl8OUrPhv+sJpRMcsv3V9dGzT1UegqAyXZTz0u4pQrZHXXZ3bYfya4cKmm3NAJ6xwT/pNROW7jQQv+hBtatLNj0CGQ6wK7tglr4Atxy7VEAqxOrYd7WOTbp0ccOVdYtJtjgNPmJp063QuxDqg88Cg+3EHW2uHd2DVVB1IsDqShpomOo/Hsym8AdGZ0DmslyB/AAAAAElFTkSuQmCC);
            background-size: 20px;
            margin-bottom: 10px;
            background-repeat: no-repeat;
            background-position: 10px center;
        }

        .container .info_content .info .line1,
        .container .info_content .info .line2,
        .container .info_content .info .line3 {
            color: #fff;
            font-size: 13px;
            text-align: center;
            border-right: 4px solid var(--ar-orange3);
            padding-top: 10px;
        }

        .line1>div {
            color: #fff;
            font-size: 14px;
        }

        .line2>div {
            color: #49ce9b;
            font-size: 14px;
        }

        .line3>div {
            color: #ff8616;
            font-size: 14px;
        }

        .line4>div {
            color: #fff;
            font-size: 14px;
        }

        .content .shareBtn {
            margin: 10px 5%;
            width: 90%;
            height: 40px;
            line-height: 40px;
            color: #945B16;
            border: none;
            font-size: 16px;
            font-weight: 700;
            border-radius: 99rem;
            background-image: linear-gradient(90deg, #EBBB6F 0%, #CD9047 100%);
        }

        .content .invitationCode .title {
            height: 26px;
            line-height: 26px;
            color: #cd9047;
            font-size: 16px;
            padding-left: 30px;
            background-position: left;
            background-repeat: no-repeat;
            background-size: 26px;
            background-image: url(/assets/png/invite-55e6f849.png);
        }

        .content .invitationCode .mycode {
            height: 36px;
            line-height: 36px;
            border-radius: 20px;
            padding: 0 20px 0 30px;
            background-color: #232745;
            background-position: right;
            background-repeat: no-repeat;
            background-size: 85px 36px;
            background-image: url(/assets/png/copy-r-b4a69375.svg);
            color: #cd9047;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 20px;
        }

        .content .invitationCode .mycode .copy {
            width: 20px;
            height: 20px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 20px;
            margin-right: 10px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAGjSURBVHgB7ZgxUsJAFIbfY0RnsEkjWq43CDfwCrRCEWu04CQUQq0F0sYb6A3wBqZxRoaGRgoz5Lm7iZGQxE0ya6TYrwrDLvOxef/kvQAYfgeLLrxzmLX+9FnQ2FigiZvp+zNUEZo4Jzb56PJLBnrxkJrdweztBcoIjXvtVymDwDfiCnRA4s8RE1J+s9UZ3nvydw9U+277ZxdAAd+I3vV00QGNjPvtORezD3kp8I/ylBol9nugnfC0t+uyjFAtpG7ZbpqQyI6+suTtq0BWmgoJiTR9+GuXFy9D2l1KNpd7ggrwUKTSVEgojvYfpInQd0cOi9OkFKo7TXlkFbUH2kmnKY+9S5kRUmGEVBghFUZIhRFS8b9CJHvqBMqeWidIwWjcO43aDxIPWia6i+0GrlYhji0apB+QN25Bd3tBzUI4JMRwugg2q9a65V09Jhu2WoWETLK/XqbW7G/KxBFGl9pm95iMNOURj9Ijx7Ka/tH8e7wVBQdakGmyZa/+sDhXrU7M9pNL/lIBG24kpZEwTYPZUjkGZb5sqDoQZhGm6TiVJkNVvgB2JKkSapoYKAAAAABJRU5ErkJggg==);
        }

        .promote__cell-item {
            padding: 10px 0;
            color: #fff;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }

        .promote__cell .promote__cell-item:last-child {
            border-bottom: none;
        }

        .promote__cell-item .label img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .promote__cell-item .label {
            font-weight: 300;
            font-size: 14px;
            line-height: 14px;
        }

        .container .info_content {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            width: 100%;

            overflow: hidden;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            position: relative;
            z-index: 10;
        }


        .promotionShare__container-tips {
            margin-block: 20px;
            color: #8d91b8;
            font-size: 14px;
            text-align: center;
        }

        .promotionShare__container-swiper {
            position: relative;
            background: url(/assets/png/poster-ce19704f.png) no-repeat center;
            background-size: 100% 100%;
            height: 100%;
        }

        .nav-item {
            width: 50%;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .nav-link {
            width: 100%;
            border-radius: 0 !important;
        }

        .tablist-home {
            margin-top: 0 !important;
        }

        .nav-pills {
            display: flex;
            justify-content: center;
        }

        .promotionShare__container-swiper .sContent {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
        }

        .empty__container.empty {
            padding: 40px !important;
        }

        .promotionShare__container-slogan {
            display: -webkit-box;
            /* display: -webkit-flex; */
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            margin-block: 20px;
            font-size: 14px;
        }

        .promotionShare__container-buttons {
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
            gap: 12px;
        }

        .promotionShare__container-buttons div.share {
            background: -webkit-linear-gradient(left, #EBBB6F 0%, #CD9047 100%);
            background: linear-gradient(90deg, #EBBB6F 0%, #CD9047 100%);
            padding: 8px 30%;
            border-radius: 30px;
        }

        .promotionShare__container-buttons div.cpy {
            color: #cd9047;
            border: 1px solid #CD9047;
            padding: 8px 50px;
            border-radius: 30px;
        }

        .container .info_content .info .head.u2 {
            border-left: 0.02667rem solid var(--ar-orange3);
            background-image: url(/assets/png/icon2-04b39212.png);
        }

        .searchbar-container__searchbar {
            width: 90%;
            padding: 12px;
            outline: none;
            border: none;
            margin: 0 5%;
            border-radius: 20px;
            background: #232745;
            font-size: 14px;
            color: #fff;
        }

        .searchbar-container {
            position: relative;
        }

        .class-search-icon {
            top: 25%;
            position: absolute;
            right: 10%;
            font-size: 20px;
            width: 20px;
            height: 20px;
        }

        .promotion-page .promotion-mian .promotion-mian__title {
            text-align: center;
            margin-bottom: 40px;
        }

        .promotion-page .promotion-mian .promotion-box {
            position: relative;
            padding: 8px;
            border: 1px solid rgba(208, 208, 237, .36);
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            background: #1e2034;
            margin-bottom: 32px;
        }

        .promotion-page .promotion-mian .promotion-box__titleLeft,
        .promotion-page .promotion-mian .promotion-box__titleRight {
            position: absolute;
            top: -10px;
            width: 10px;
            height: 20px;
            background-color: #303454;
            -webkit-clip-path: polygon(50% 0%, 100% 0%, 50% 50%, 100% 100%, 50% 100%, 0% 50%);
            clip-path: polygon(50% 0%, 100% 0%, 50% 50%, 100% 100%, 50% 100%, 0% 50%);
            z-index: 5;
        }

        .promotion-page .promotion-mian .promotion-box__titleLeft {
            left: calc(50% - 50px);
            -webkit-transform: translateX(-50%);
            transform: translate(-50%);
        }

        .promotion-mian {
            margin-top: 20px;
            padding: 0 16px;
        }

        .promotion-page .promotion-mian .promotion-mian__title h1 {
            margin-bottom: 4px;
            color: #cd9047;
            font-size: 22px;
            line-height: 22px;
            font-weight: 600;
        }

        .promotion-page .promotion-mian .promotion-box .promotion-title {
            position: absolute;
            top: -10px;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translate(-50%);
            width: 90px;
            height: 20px;
            color: #fff;
            font-size: 16px;
            text-align: center;
            line-height: 20px;
            background-color: #303454;
            -webkit-clip-path: polygon(7% 0%, 93% 0%, 100% 50%, 93% 100%, 7% 100%, 0% 50%);
            clip-path: polygon(7% 0%, 93% 0%, 100% 50%, 93% 100%, 7% 100%, 0% 50%);
        }

        .promotion-page .promotion-mian .promotion-box__titleRight {
            left: calc(50% + 50px);
            -webkit-transform: translateX(-50%) rotate(180deg);
            transform: translate(-50%) rotate(180deg);
        }

        .promotion-page .promotion-mian .promotion-mian__title p {
            color: #fff;
            font-size: 16px;
        }

        .promotion-txt {
            padding-top: 16px;
        }

        .promotion-page .promotion-mian .promotion-grade {
            overflow: hidden;
            margin-bottom: 20px;
        }

        .promotion-page .promotion-mian .promotion-grade-th {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            height: 42px;
            color: #fff;
            font-size: 14px;
            line-height: 42px;
            background: #303454;
            text-align: center;
        }

        .promotion-page .promotion-mian .promotion-grade-th .item {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }

        .promotion-page .promotion-mian .promotion-grade-tr {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            width: calc(100% + 0.01333rem);
            background-color: #1e2034;
            margin: 0 1px;
            color: #adb0d4;
        }

        .promotion-page .promotion-mian .promotion-grade-tr .item {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            width: 33.3%;
            height: 40px;
            padding: 2px 0;
            border: 1px solid #303454;
            font-size: 14px;
            margin-bottom: 2px;
            margin-right: 2px;
        }

        .icon-LV {
            height: 22px;
            width: 42px;
            background: url(/assets/png/lv-450d4246.png) no-repeat center center;
            background-size: cover;
            position: relative;
            text-align: center;
        }

        .icon-LV .txt {
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            font-weight: bold;
            height: 16px;
            line-height: 20px;
            width: 20px;
            background: -webkit-linear-gradient(top, #fffba9 0%, #fff670 56.13%, #ffd180 100%);
            background: linear-gradient(180deg, #fffba9 0%, #fff670 56.13%, #ffd180 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .promotion-page .promotion-mian .promotion-content_title {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list {
            width: 100%;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            overflow-y: hidden;
            overflow-x: scroll;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container-item {
            font-size: 14px;
            text-align: center;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container-item_title {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            background: #303454;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container-item_title span {
            display: block;
            width: 88px;
            min-height: 50px;
            color: #fff;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 0 10px;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container-item__content {
            background: #1e2034;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            color: #fff;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container-item__content>div {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            width: 88px;
            height: 40px;
            border-top: 4px solid #303454;
            border-left: 4px solid #303454;
            overflow: hidden;
        }

        .promotion-content {
            margin: 20px 0;
        }

        .promotion-mian {
            margin: 20px 0;
        }

        .promotion-page .promotion-mian .promotion-content .promotion-list__container {
            margin-bottom: 10px;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
        }
    </style>
</head>

<body>
    <div class="container homecontainer container-menu" style="">
        @include('home.layout.header_agency',['page'=>'agency'])
        <div class="promotionShare__container body" style="--495c4c83: bahnschrift;">
            <div class="navbar">
                <div class="navbar-fixed">
                    <div class="navbar__content">
                        <div class="navbar__content-left">
                            <div class="arrow js-back-main" style="transform: rotate(180deg) !important;position: absolute; left:10px;top:20%;">
                                <img onclick="history.back()" style="width:30px;height:30px" src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">
                            </div>
                        </div>
                        <div class="navbar__content-center">
                            <!---->
                            <div class="navbar__content-title">Lịch Sử Nhận</div>
                        </div>
                        <div class="navbar__content-right"></div>
                    </div>
                </div>
            </div>
            <div class="tablist-home">
                <ul class="nav nav-pills mb-3 ulTab" id="pills-tab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Mỗi Tuần</button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link" id="pills-yellow-tab" data-bs-toggle="pill" data-bs-target="#pills-yellow" type="button" role="tab" aria-controls="pills-yellow" aria-selected="false" tabindex="-1">Mỗi Ngày</button>
                    </li>
                    <!-- <li class="nav-item " role="presentation">
                        <button class="nav-link" id="pills-ring-tab" data-bs-toggle="pill" data-bs-target="#pills-ring" type="button" role="tab" aria-controls="pills-ring" aria-selected="false" tabindex="-1">Tháng này</button>
                    </li> -->
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                    <div class="text-center" onclick="location.href='/login'">
                        <div class="empty__container empty"><img alt="" class="" data-origin="https://fb333.com/assets/png/empty-59c9beb3.png" src="https://fb333.com/assets/png/empty-59c9beb3.png">
                            <p>Không có dữ liệu</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-yellow" role="tabpanel" aria-labelledby="pills-yellow-tab" tabindex="0">
                    <div class="text-center" onclick="location.href='/login'">
                        <div class="empty__container empty"><img alt="" class="" data-origin="https://fb333.com/assets/png/empty-59c9beb3.png" src="https://fb333.com/assets/png/empty-59c9beb3.png">
                            <p>Không có dữ liệu</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-ring" role="tabpanel" aria-labelledby="pills-ring-tab" tabindex="0">
                    <div class="text-center" onclick="location.href='/login'">
                        <div class="empty__container empty"><img alt="" class="" data-origin="https://fb333.com/assets/png/empty-59c9beb3.png" src="https://fb333.com/assets/png/empty-59c9beb3.png">
                            <p>Không có dữ liệu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $('.js-share-view-rule').click(function() {
        $('.container-rule').show();
        $('.container-main').hide();
    })
    $('.js-share-view-report').click(function() {
        $('.container-team-report').show();
        $('.container-main').hide();
    })

    $('.js-share-view-gift').click(function() {
        $('.container-gift').show();
        $('.container-main').hide();
    })

    $('.js-share-view').click(function() {
        $('.container-share').show();
        $('.container-main').hide();
    })

    $('.js-show-agency').click(function() {
        $('.container-menu').show();
        $('.container-main').hide();
    })


    $('.js-back-main').click(function() {
        $('.container-share').hide();
        $('.container-menu').hide();
        $('.container-team-report').hide();
        $('.container-gift').hide();
        $('.container-rule').hide();

        $('.container-main').show();

    })
</script>
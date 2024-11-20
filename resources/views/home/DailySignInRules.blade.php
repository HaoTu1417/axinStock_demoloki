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

        .dailySignInRules__container-hero {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            margin: 8px 9px 1.53333rem;
            color: #fff;
            border-radius: 18px;
            background: #232745;
            overflow: hidden;
            /* padding: 11px; */
            /* margin: 10px; */
        }

        .dailySignInRules__container-hero__wrapper {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
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
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .dailySignInRules__container-hero__wrapper-titlebox {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            width: 100%;
        }

        .dailySignInRules__container-hero__wrapper-title {
            width: 100%;
            height: 3.06667rem;
            padding-block: .34667rem;
            font-size: 16px;
            line-height: 1.32rem;
            text-align: center;
            background: #303454;
        }

        .dailySignInRules__container-hero__wrapper ul {
            width: 100%;
        }

        .dailySignInRules__container-hero__wrapper ul li {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            width: 100%;
        }

        .dailySignInRules__container-hero__wrapper ul li div {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            font-size: 15px;
            padding: 0.34667rem 0;
            border-bottom: 0.01333rem solid #303454;
        }

        .rule {
            width: 100%;
        }

        .rule {
            width: calc(100% - 1.64rem);
            border: 0.05333rem solid #303454;
            border-top: none;
            margin: auto;
            padding: .32rem;
            background-color: #232745;
            border-radius: 1.26667rem;
        }

        .rule .head {
            width: calc(100% + .74667rem);
            position: relative;
            left: -.37333rem;
            top: -.32rem;
            height: 2.88rem;
            line-height: 36px;
            background-image: url(/assets/images/rulehead-9a6827a9.svg);
            background-repeat: no-repeat;
            background-size: contain;
            color: #fff;
            font-family: Inter;
            font-size: 1.42667rem;
            font-style: normal;
            font-weight: 700;
            text-align: center;
        }

        .rule>div:not(.head) {
            color: #fff;
            font-size: 16px;
            line-height: 1.45333rem;
            margin-bottom: .4rem;
            padding-left: 17px;
            position: relative;
        }

        .rule>div:not(.head):before {
            content: "";
            display: block;
            position: absolute;
            left: 0;
            top: 6px;
            height: 8px;
            width: 8px;
            -webkit-box-flex: 0;
            -webkit-flex: none;
            flex: none;
            border-radius: .02667rem;
            background: #ADB0D4;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <div class="container homecontainer">
        <ul>
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 110px;">Quy Tắc Giao Dịch</li>
            <!-- <li style="float:right;" onclick="location.href='/DailyTasks/Record';"><img style="height: 25px;" src="/assets/images/lsgd.png" alt=""></li> -->
        </ul>

        <div class="body">
            <div class="dailySignInRules__container-hero">
                <div class="dailySignInRules__container-hero__wrapper">
                    <div class="dailySignInRules__container-hero__wrapper-titlebox">
                        <div class="dailySignInRules__container-hero__wrapper-title">Điểm danh liên tục</div>
                        <div class="dailySignInRules__container-hero__wrapper-title">Số tiền tích lũy</div>
                        <div class="dailySignInRules__container-hero__wrapper-title">Phần thưởng đăng nhập</div>
                    </div>
                    <ul>
                        <li>
                            <div>1</div>
                            <div>100,000.00₫</div>
                            <div>2,333.00₫</div>
                        </li>
                        <li>
                            <div>2</div>
                            <div>200,000.00₫</div>
                            <div>4,333.00₫</div>
                        </li>
                        <li>
                            <div>3</div>
                            <div>500,000.00₫</div>
                            <div>8,333.00₫</div>
                        </li>
                        <li>
                            <div>4</div>
                            <div>2,000,000.00₫</div>
                            <div>28,333.00₫</div>
                        </li>
                        <li>
                            <div>5</div>
                            <div>5,000,000.00₫</div>
                            <div>48,333.00₫</div>
                        </li>
                        <li>
                            <div>6</div>
                            <div>8,000,000.00₫</div>
                            <div>68,333.00₫</div>
                        </li>
                        <li>
                            <div>7</div>
                            <div>10,000,000.00₫</div>
                            <div>83,333.00₫</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-v-7565a95f="" class="rule">
                <div class="head">Quy tắc</div>
                <div>Số ngày đăng nhập liên tiếp càng cao, bạn càng nhận được nhiều phần thưởng, tối đa 7 ngày liên tiếp</div>
                <div>Trong quá trình tham gia vui lòng thường xuyên kiểm tra hoạt động để cập nhật sớm nhất</div>
                <div>Nhà đầu tư không có lịch sử nạp tiền không thể nhận tiền thưởng</div>
                <div>Yêu cầu tiền gửi phải được đáp ứng từ ngày đầu tiên</div>
                <div>Nền tảng có quyền giải thích cuối cùng về hoạt động này và quyền sửa đổi/chấm dứt hoạt động mà không cần thông báo trước</div>
                <div>Khi bạn gặp vấn đề, vui lòng liên hệ với dịch vụ khách hàng để được hỗ trợ xử lý vấn đề</div>
            </div>
</body>




</html>
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

        .ulSetting {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: linear-gradient(90deg, #686c94 0%, #9397bd 100%);
            border-radius: 0px 0px 65px 65px;
            height: 140px;
        }

        .userInfo__container-setting-center {
            /* width: 21.36rem; */
            background: -webkit-linear-gradient(top, #303454 4.43%, #262840 97.5%);
            background: linear-gradient(180deg, #303454 4.43%, #262840 97.5%);
            border-radius: 14px;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            padding: 1.29333rem 1.4rem;
            position: relative;
            top: -106px;
            z-index: 99;
            margin: 15px;
        }

        .userInfo__container-setting-center-header {
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

        .userInfo__container-content__avatar {
            border-width: .05333rem;
        }

        .userInfo__container-content__avatar {
            width: 3.86667rem;
            height: 3.86667rem;
            border-radius: 50%;
            margin-right: .2rem;
            overflow: hidden;
            border-color: #945b16;
            border-style: solid;
        }

        .userInfo__container-content__avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .userInfo__container-setting-center-header-edit {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
            color: #cd9047;
        }

        .userInfo__container-setting-center-header-edit span {
            font-size: 15px;
            padding-right: 1.34667rem;
        }

        .van-icon {
            font-size: .37333rem;
        }

        .userInfo__container-setting-center-content {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            font-size: .37333rem;
            color: #fff;
            padding: .62667rem 0;
        }

        .userInfo__container-setting-center-content h5 {
            color: #adb0d4;
        }

        .userInfo__container-setting-center-content div {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .userInfo__container-setting-center-content span {
            padding-right: 1.16rem;
            font-size: 15px;
        }

        .ar-1px-b:after {
            content: " ";
            position: absolute;
            left: 0;
            bottom: 0;
            right: 0;
            height: .01333rem;
            border-bottom: .01333rem solid #303454;
            color: #303454;
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
            -webkit-transform: scaleY(.5);
            transform: scaleY(.5);
        }

        .userInfo__container-setting-center-content {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            font-size: .37333rem;
            color: #fff;
            padding: .62667rem 0;
        }

        .userInfo__container-setting-center-content img {
            width: 20px;
        }

        .content {
            position: relative;
            top: -8.68rem;
            padding-top: 2.4rem;
            -webkit-padding-after: .13333rem;
            padding-block-end: 0.13333rem;
            margin: 13px;
        }

        .content .content-sub_title {
            /* margin-top: .4rem; */
        }

        .content .content-sub_title>div {
            font-size: 25px;
            color: #fff;
            font-weight: 700;
            margin-bottom: 1.26667rem;
            line-height: 0.48rem;
        }

        .content .content-sub_title>div:before {
            content: "";
            display: inline-block;
            width: 5px;
            height: 15px;
            border-radius: .05333rem;
            background: #EF4770;
            margin-right: 1.13333rem;
            vertical-align: bottom;
        }

        .phone_container {
            background: #1E2034;
            border-radius: .26667rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            padding: 0 .28rem;
            margin-bottom: .4rem;
        }

        .phone_container-item {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 6px 0;
        }

        .phone_container-item-left {
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

        .phone_container-item img {
            width: 45px;
        }

        .phone_container-item-left span {
            font-size: 15px;
            color: #fff;
            padding-left: 10px;
        }

        .phone_container-item-right {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .phone_container-item-right span {
            font-size: 15px;
            color: #adb0d4;
            padding-right: 10px;
        }

        .setting_container .setting_container_item {
            height: 1.86667rem;
            background: #1E2034;
            border-radius: .26667rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 28px .28rem;
            margin-bottom: .4rem;
        }

        .setting_container .setting_container_item div {
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

        .setting_container .setting_container_item img {
            width: 45px;
            height: auto;
        }

        .setting_container .setting_container_item span {
            font-size: 15px;
            color: #fff;
            padding: 10px;
        }

        .setting_container .setting_container_item div {
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

        .setting_container .setting_container_item h5 {
            display: inline-block;
            font-size: 15px;
            color: #29ad34;
            margin-right: .45333rem;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script>
        function coppy(content){
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(content).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Sao chép thành công');
        }
    </script>
</head>

<body>
    <div class="container homecontainer">
        <ul class="ulSetting">
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 105px;">Trung Tâm Cài Đặt</li>
            <!-- <li style="float:right;" onclick="location.href='/DailyTasks/Record';"><img style="height: 25px;" src="/assets/images/lsgd.png" alt=""></li> -->
        </ul>

        <div class="body">
            <div class="userInfo__container-setting-center" style="">
                <div class="userInfo__container-setting-center-header">
                    <div class="userInfo__container-content__avatar"><img data-img="https://fb333.com/assets/png/avatar1-2f23f3bd.png" class="" data-origin="https://fb333.com/assets/png/4-12a0d0c5.png" src="https://fb333.com/assets/png/4-12a0d0c5.png"></div>
                    <div class="userInfo__container-setting-center-header-edit"><span>Thay đổi hình đại diện</span><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                </div>
                <div class="userInfo__container-setting-center-content ar-1px-b">
                    <h5>Nickname</h5>
                    <div><span>MEMBER<?= $information->id ?></span><i style="font-size: 17px;color: #cc8f4c;" class="fa fa-chevron-right" aria-hidden="true"></i></div>
                </div>
                <div class="userInfo__container-setting-center-content">
                    <h5>UID</h5>
                    <div><span><?= $information->id ?></span><img onclick="coppy(<?= $information->id ?>)" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEmSURBVHgB7ZW/ccIwGMXfFzSAU6RXNnAmwClSO9kgG+ARGMEjMAJUKVIQNsgI7lKkiAuowKc8jExin3ycOMFR8Brp9Of7Se9OT8CJJX0TP/Ms2mzwym4EP5VKYXr7mBe9ABbXVWXmxkDjCImgGAzkgZBSuRbw5M9sNAGfIjKDl0zKfbG9fa56VkW7k8js7ikfw0Pf79kWEjc19oC252ZoTzPkhvGBmi3Pu1K2eO05u7oznxCS4ICqCiPWqD13AkJ67gQgoOdd3eDEugKugIsCNLFiUjtQv2qFcEqaWOHLLhgf09CAD2bBgm25WmFy/5KHvoEsXDHTAGwKmnSXLT5qe+4EMM8n6zVG/OpiG1x+iH+ed7X/k7/eMk3QNra9P/nl8s/zs+sXRwiAzhE8NgoAAAAASUVORK5CYII="></div>
                </div>
                <div class="userInfo__container-setting-center-content ar-1px-b">
                    <h5>Số điện thoại</h5>
                    <div><span>+84<?= $information->username ?></span><i style="font-size: 17px;color: #cc8f4c;" class="fa fa-chevron-right" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class="content setting-wrapper" style="--495c4c83: bahnschrift;">
                <div class="setting-items-wrapper">
                    <div class="content-sub_title">
                        <div>Thông tin an toàn</div>
                    </div>
                    <div class="phone_container" onclick="location.href='/LoginPassword'">
                        <div class="phone_container-item">
                            <div class="phone_container-item-left"><img src="https://fb333.com/assets/png/editPswIcon-a147593a.png"><span>Mật khẩu đăng nhập</span></div>
                            <div class="phone_container-item-right"><span>Sửa đổi</span><i style="font-size: 15px;color: #FFF;" class="fa fa-chevron-right" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="setting_container">
                        <div class="setting_container_item ar-1px-b">
                            <div><img src="https://fb333.com/assets/png/versionUpdate-25f4ca89.png"><span>Phiên bản cập nhật</span></div>
                            <div>
                                <h5>1.0.9</h5><i class="van-badge__wrapper van-icon van-icon-arrow" style="color: rgb(136, 136, 136);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>




</html>
@extends('layout.layout_auth')
@section('content')
<style>
    .modal-first {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .modal-invite {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }
</style>

<div class="container homecontainer js-container-support"
    style="background:#dfebfb;overflow:hidden;height:100vh;display:none">
    <div class="header-default" style=";background-color:#dfebfb;border:none !important">
        <a href="/" style="flex:1;height: 50px;">
            <i style="color:#333" class="icon-back bi bi-chevron-left"></i>
        </a>
    </div>
    <div class="d-flex"
        style="padding:10px;background-color:#dfebfb;justify-content:center;align-items:center;flex-direction:column">
        <span style="margin-bottom:10px;font-size:22px;font-weight:bold;color:rgb(59, 78, 126);">Trung tâm phục
            vụ</span>
        <div style="width:30px;border-bottom:3px solid rgb(59, 78, 126);"></div>
    </div>
    <div><img src="{{asset('assets/images/dowload/bg_title_customerService.png')}}" style="width:100%;"></div>
     <div
        style="background:#fff;border-top-left-radius:30px;border-top-right-radius:30px;width;100%;padding:18px;margin-top:20px;height:100vh">
        <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:20px;display:flex;justify-content:center;align-items:center;margin:10px">
            Thời gian làm việc：08:00-23:00</div>
        <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:20px;display:flex;justify-content:center;align-items:center;margin:10px">
            Ngày nghỉ：Thứ 7 - Chủ Nhật</div>
                 <div onclick="document.location.href='{{$tele->setting_value}}'"
            style="cursor:pointer;margin-top:30px;background:rgb(62, 76, 243);padding:12px;color:white;border-radius:30px;display:flex;justify-content:center;align-items:center">
            Telegram</div>
            
                 <div onclick="document.location.href='{{$livechat->setting_value}}'"
            style="cursor:pointer;margin-top:10px !important;color:#333;border:1px solid #ccc;background:#dfebfb;padding:12px;border-radius:30px;display:flex;justify-content:center;align-items:center">
            Email: {{$livechat->setting_value}} </div>
        <!--<div style="display:flex;justify-content:center;margin-top:15px"> Email ：vnflyer8@gmail.com</div>-->
    </div>
</div>

<div class="container homecontainer js-container-dowload" style="height:100vh;display:none">
    <div class="header-default" style="background-color:white">
        <div class="color:#333" style="flex:1;height: 50px;">
            <i style="color:#333" onclick="document.location.href='.'" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div style="text-align:center;flex:1;color:#333;font-size:20px;white-space:nowrap">Tải app</div>
        <div style="flex:1;justify-content:flex-end;display:flex">

        </div>
    </div>
    <div style="display:flex;">
        <img style="width:100%" src="assets/images/dowload/750x1000.png">
    </div>
    <div style="display:flex;width:100%;padding:8px;justify-content:space-between">
        <a class="btn btn-primary btn-dowload-ip" style="width:48%;color:white;"><img
                src="assets/images/dowload/iPhone.png"
                style="margin-right:5px;width:20px;height:20px">Iphone tải xuống</a>
        <a class="btn btn-black btn-dowload-ad" style="background-color:#333;color:white;width:48%"><img
                src="assets/images/dowload/Android.png"
                style="margin-right:5px;width:20px;height:20px">Tải về android</a>

    </div>
    <div class="img-show-ip" style="padding-bottom:100px;display:none">
        <img src="assets/images/dowload/test_download_iphone.png1.png2.png3.png" style="width:100%">
    </div>
    <div class="img-show-ad" style="padding-bottom:100px;display:none">
        <img src="assets/images/dowload/test_download_android.png" style="width:100%">
    </div>


</div>

<div class="container homecontainer js-container-agency" style="display:none;position:relative">
    <div class="modal-invite"
        style="display:none;align-items:center;justify-content:center;height:100vh;position:absolute;top:0;right:0;bottom:0;left:0">
        <div class="content-modal" style="position:relative;background:white;width:90%;height:350px;border-radius:8px">
            <div
                style="display:flex;justify-content:center;color:#333;font-size:20px;padding:20px;align-items:center;flex-direction:column">
                <span style="color:#333;font-size:20px">Mã giới thiệu</span>
                <img src="/assets/images/qr.png" style="margin-top:15px;width:128px;height:128px">
                <div style="margin-top:15px;color:rgb(72, 85, 244)">Mã mời của tôi: 1014</div>

                <span style="color:#333;font-size:20px">Link khuyến mại</span>
                <div style="display:flex">
                    <input maxlength="140" value="https://{{$domain->setting_value}}/partner/" step="" enterkeyhint="done" autocomplete="off"
                        type="" class="uni-input-input">
                    <button class="btn btn-primary">Copy</button>
                </div>
            </div>

            <div class="js-hide-model-invite" style="text-align: center;right:48%;
    border-radius: 50%;
    width: 39px;
    position: absolute;
    bottom: -50px;
    height: 39px;
    line-height: 39px;
    background: rgba(255, 255, 255, 0.3);">X</div>
        </div>
    </div>

    <div class="header-default" style="background-color:white">
        <div class="color:#333" style="flex:1;height: 50px;">
            <i style="color:#333" onclick="document.location.href='.'" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div style="text-align:center;flex:1;color:#333;font-size:20px;white-space:nowrap">Tuyển đại lý</div>
        <div style="flex:1;justify-content:flex-end;display:flex">

        </div>
    </div>
    <div style="display:flex;">
        <img style="width:100%    object-fit: cover;
    height: 420px;
    width: 100%;" src="assets/images/dowload/750x978.png">
    </div>
    <div
        style="display:flex;flex-direction:column;padding:28px;border-radius:12px;margin:16px;justify-content:space-between;background:#fff">
        <div class="d-flex " style="flex-direction:column;width:100%;border-radius:8px;border:1px solid #ccc">
            <div
                style="justify-content:center;align-items:center;padding:8px;background:rgb(220, 235, 255);width:100%;border-top-right-radius:8px;border-top-left-radius:8px;display:flex;">
                Mời người dùng
            </div>

            <div
                style="justify-content:center;align-items:center;padding:8px;background:#fff;width:100%;border-bottom-right-radius:8px;border-bottom-left-radius:8px;display:flex;">
                <span style="color:blue;font-size:20px;margin-right:4px">0</span> Người
            </div>
        </div>

        <div class="d-flex "
            style="flex-direction:column;width:100%;border-radius:8px;border:1px solid #ccc;margin-top:15px">
            <div
                style="justify-content:center;align-items:center;padding:8px;background:rgb(220, 235, 255);width:100%;border-top-right-radius:8px;border-top-left-radius:8px;display:flex;">
                Nhận hoa hồng
            </div>

            <div
                style="justify-content:center;align-items:center;padding:8px;background:#fff;width:100%;border-bottom-right-radius:8px;border-bottom-left-radius:8px;display:flex;">
                <span style="color:blue;font-size:20px;margin-right:4px">0</span> Người
            </div>
        </div>


        <div class="js-show-qr-invite" style="background: #3e4cf3;
    color: rgb(255, 255, 255);
    font-size: 18px;
    height: 48px;
    border-radius:12px;
    text-align:center;
    line-height:48px;
    margin-top:20px;
    width: 100%;
    box-shadow: 0px 3px 7px 0px var(--buttonshadow);
    overflow: visible;cursor:pointer;">Mời bạn kiếm hoa hồng</div>


        <div style="background: #fff;
     border:1px solid #3e4cf3;
     color:#3e4cf3;
    font-size: 18px;
    height: 48px;
    border-radius:12px;
    text-align:center;
    line-height:48px;
    margin-top:20px;
    width: 100%;
    overflow: visible;">Xem chi tiết khuyến mại</div>


    </div>
    <div
        style="margni-top:15px;display:flex;flex-direction:column;padding:28px;border-radius:12px;margin:16px;justify-content:space-between;background:#fff">
        Link quảng cáo là địa chỉ để bạn quảng cáo ra youtube, facebook, tiktok hoặc website của chính bạn.
    </div>

</div>


<div class="container homecontainer js-container-main">
    <div class="modal-first"
        style="display:none;align-items:center;justify-content:center;height:100vh;position:fixed;top:0;width:100%;max-width:450px;margin:0 auto;right:0;bottom:0;left:0">
        <div class="content-modal" style="background:white;width:90%;height:400px;border-radius:8px">
            <img src="{{asset('assets/images/dowload/hone_gg_dlaog.png')}}"
                style="width:450px;object-fit:contain;margin-left:-20px;margin-top:-35px">
            <p style="padding:8px;"><strong>{{$data->setting_value}}</strong></p>
            <div style="display:flex;justify-content:center">
                <div class="btn-understand" style="background-image: url('assets/images/dowload/btn_home_Dialog.png');
                background-repeat: no-repeat;
              background-size: contain;
              border-radius: 4px;
              text-align: center;
              display: flex;
              justify-content: center;
              cursor: pointer;
              align-items: center;
              color: rgb(255, 255, 255);
              font-size: 17px;
              padding:10px;
              
              width:200px;
              text-align:center;
              overflow: visible;">Hiểu rồi</div>
            </div>
        </div>
    </div>
    <div class="header-default" style="justify-content:space-between!important">
        <img class="logo-header" style="width:132px;height:26px" src="{{asset($logo->image)}}">
        <div>
            <img onclick="document.location.href='/login'" style="width:22px;height:22px;margin:0 5px" 
                src="assets/images/dowload/hsdl.png">
            <img onclick="document.location.href='/register'" style="width:22px;height:22px;margin:0 5px" onclick="window.location.href='/logout'"
                src="assets/images/dowload/hszc.png">
        </div>
    </div>

    <div class="homeContainer">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                @foreach($banners as $key => $banner)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
        
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                @foreach($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($banner->image) }}" class="d-block w-100">
                </div>
                @endforeach
            </div>
        
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div style="margin-top:15px;display:flex;align-items:center;background:#fff;padding:2px 8px;border-radius:8px">
            <img style="width:22px;height:22px;" src="assets/images/dowload/icon_notice.png">
                        <marquee>{{$notification_run->setting_value}}</marquee>

        </div>

        <div class="row" style="margin:20px 0">
            <div class="col col-3 js-dowload"
                style="padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/dwapp.png">
                <span style="font-size:13px">Tải app</span>
            </div>
            <div class="col col-3 js-agency"
                style="padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/zhaonadaili.png">
                <span style="font-size:13px">Đại lý</span>
            </div>
            <a href="{{route('mission')}}" class="col col-3"
                style="color:#333;text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/renwu.png">
                <span style="font-size:13px">Nhiệm vụ</span>
            </a>
            <a href="{{route('hoatdong')}}" class="col col-3"
                style="color:#333;text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/huodong.png">
                <span style="font-size:13px">Hoạt động</span>
            </a>
            <div class="col col-3"
                style="padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/wenti.png">
                <span style="font-size:13px">Hỏi đáp</span>
            </div>
            <a href="{{route('chitiet')}}" class="col col-3"
                style="color:#333;text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/zjmx2.png">
                <span style="font-size:13px">Chi tiết</span>
            </a>
            <a href="{{route('thongbao')}}" class="col col-3"
                style="color:#333;text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/gonggao.png">
                <span style="font-size:13px">Thông báo</span>
            </a>
            <div class="col col-3 js-suport"
                style="padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
                <img style="width:60px;height:60px" src="assets/images/dowload/kefu2.png">
                <span style="font-size:13px">Dịch vụ online</span>
            </div>
        </div>


        <div class="tablist-home">
            <p>Phân bổ vốn</p>
            <ul class="nav nav-pills  ulTab" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                    <button class="nav-link active " id="pill1" data-bs-toggle="pill" data-bs-target="#pill-tab-1"
                        type="button" role="tab" aria-controls="pill-tab-1" aria-selected="true">Miễn phí</button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link" id="pill2" data-bs-toggle="pill" data-bs-target="#pill-tab-2" type="button"
                        role="tab" aria-controls="pill-tab-2" aria-selected="false">Hàng ngày</button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link" id="pill3" data-bs-toggle="pill" data-bs-target="#pill-tab-3" type="button"
                        role="tab" aria-controls="pill-tab-3" aria-selected="false">Hàng tuần</button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link" id="pill4" data-bs-toggle="pill" data-bs-target="#pill-tab-4" type="button"
                        role="tab" aria-controls="pill-tab-4" aria-selected="false">Hàng tháng</button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link" id="pill5" data-bs-toggle="pill" data-bs-target="#pill-tab-5" type="button"
                        role="tab" aria-controls="pill-tab-5" aria-selected="false">Miễn lãi</button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link" id="pill6" data-bs-toggle="pill" data-bs-target="#pill-tab-6" type="button"
                        role="tab" aria-controls="pill-tab-6" aria-selected="false">Vip</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pill-tab-1" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_freefund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">Miễn phí</p>
                            <span style="text-align:center">Nền tảng miễn phí và cung cấp đòn bẩy cho bạn đến 10 lần để
                                bạn giao dịch.</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade " id="pill-tab-2" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_dayfund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">Hàng ngày</p>
                            <span style="text-align:center">Tự động gia hạn | Lãi suất thấp chỉ 0.075%</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pill-tab-3" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_weekfund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">Hàng tuần</p>
                            <span style="text-align:center">Tự động gia hạn | Lãi suất thấp chỉ 0.3%</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pill-tab-4" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_monthfund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">Hàng tháng</p>
                            <span style="text-align:center">Tự động gia hạn | Lãi suất thấp chỉ 1.05%</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pill-tab-5" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_nofeefund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">Miễn lãi</p>
                            <span style="text-align:center">Miễn phí giao dịch 10 ngày và không thể gia hạn</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pill-tab-6" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="body-tab" style="    padding: 24px;
            text-align: center;
            background: url(assets/images/dowload/img_bg_ProductArea.bc0ddccc.png) no-repeat;
            background-size: 100% 100%;">
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
                            <img style="width:48px;height:48px"
                                src="assets/images/dowload/icon_vipfund.png">
                            <p style="font-weight:bold;font-size:18px;margin-top:5px">VIP</p>
                            <span style="text-align:center">Tự động gia hạn | Lãi suất thấp chỉ 1%</span>
                            <button style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
                                ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin:20px 0">
            <ul class="nav" style="background:#3e4cf3">
                <li class="nav-item " style="border:none;font-size:18px;width:unset;background:none">
                    <a class="nav-link active" style="border:none" aria-current="page" href="#viet">Cổ phiếu việt</a>
                </li>
                <li class="nav-item" style="border:none;font-size:18px;width:unset;background:none">
                    <a class="nav-link" style="border:none" href="#my">Cổ phiếu mỹ</a>
                </li>
            </ul>

            <div class="tab-content" style="padding:0 !important;margin-top:10px">
                <div class="tab-pane fade show active" id="viet" role="tabpanel" aria-labelledby="viet-tab"
                    tabindex="0">
                    <div class="items" style="overflow:auto;width:100%;display:flex;" id="tblVnindexList">
                    </div>

                </div>
                <div class="tab-pane fade" id="my" role="tabpanel" aria-labelledby="my-tab" tabindex="0">
                    <div class="items" style="overflow:auto;width:100%;display:flex;">
                        
                    </div>
                </div>
                <div
                    style="margin-top:20px;display:flex;align-items:center;;background:#fff;padding:8px;border-radius:4px">
                    <i style="color:rgb(153, 153, 153)" class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Nhập tên cổ phiếu, mã cổ phiếu"
                        style="background:#fff;outline:none;border:none;flex:1;margin-left:10px">
                </div>

                <div style="margin-top:20px;">
                    <span>Xếp hạng cổ phiếu</span>
                    <div class="list-item-cp">
                        <div class="item-cp itemchoose active" data-exchange="ALL">
                            All
                        </div>
                        <div class="item-cp itemchoose" data-exchange="HNX">
                            HNX
                        </div>
                        <div class="item-cp itemchoose " data-exchange="HOSE">
                            HOSE
                        </div>
                        <div class="item-cp itemchoose " data-exchange="UPCOM">
                            UPCOM
                        </div>
                    </div>

                    <div class="list-item-cp list-item-cp2">
                        <div class="item-cp itemorder active" data-order="desc">
                            Tăng
                        </div>
                        <div class="item-cp itemorder" data-order="asc">
                            Giảm
                        </div>
                        <div class="item-cp itemorder" data-order="volumn">
                            Khối lượng giao dịch
                        </div>
                        <div class="item-cp  itemorder" data-order="name">
                            Cổ phiếu
                        </div>
                    </div>

                    <div class="tablle-cp" style="margin-top:10px">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th style="width:100px">Chứng khoán</th>
                                    <th>Giá mới</th>
                                    <th>Tăng</th>
                                    <th>Theo dõi</th>
                                </tr>
                            </thead>
                            <tbody id="tableStockList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
<script>

    $(document).ready(function () {
        $('.js-hide-model-invite').click(function () {
            $('.modal-invite').css('display', 'none');
        });
        $('.js-show-qr-invite').click(function () {
            // Lấy trạng thái hiện tại của modal-invite
            var modalInvite = $('.modal-invite');
            var currentDisplay = modalInvite.css('display');

            // Nếu modal-invite đang ẩn, thì hiển thị
            if (currentDisplay === 'none') {
                modalInvite.css('display', 'flex');
            } else {
                // Nếu modal-invite đang hiển thị, thì ẩn đi
                modalInvite.css('display', 'none');
            }
        });

        $('.btn-dowload-ad').click(function () {
            $('.img-show-ad').show();
            $('.img-show-ip').hide();

        });
        $('.btn-dowload-ip').click(function () {
            $('.img-show-ad').hide();
            $('.img-show-ip').show();

        });

        $('.js-suport').click(function (e) {
            $('.js-container-main').hide();
            $('.js-container-support').show();
        })

        $('.js-dowload').click(function (e) {
            $('.js-container-main').hide();
            $('.js-container-dowload').show();
        })

        $('.js-agency').click(function (e) {
            $('.js-container-main').hide();
            $('.js-container-agency').show();
        })



        $('.btn-understand').click(function (e) {
            e.preventDefault();
            hideModal();
        });

        // Function to show modal
        function showModal() {
            $('.modal-first').css('display', 'flex');
            $("body").css('overflow', 'hidden');
        }

        // Function to hide modal
        function hideModal() {
            $('.modal-first').css('display', 'none');
            $("body").css('overflow', 'unset');
        }

        // Show modal when the window loads
         $(window).on('load', function () {
            
          setTimeout(function() {
                showModal();
            }, 1200);
         
        });

        // Hide modal when clicking outside of it
        // $(document).click(function(event) {
        //     var modal = $('.content-modal');
        //     if (!modal.is(event.target) && modal.has(event.target).length === 0) {
        //         hideModal();
        //     }
        // });
        $('.itemchoose').click(function () {
            $('.itemchoose').removeClass('active');
            $(this).addClass('active');
            var exchange = $(this).data('exchange');
            var order = $('.itemorder.active').data('order');
            getStockByExchange(exchange, order);
        });
         $('.itemorder').click(function () {
            $('.itemorder').removeClass('active');
            $(this).addClass('active');
            var order = $(this).data('order');
            var exchange = $('.itemchoose.active').data('exchange');
            getStockByExchange(exchange, order);
        });
        getStockByExchange('HOSE', 'desc');
        getVnindex();
        
        setInterval(function(){
            getStockByExchange($('.itemchoose.active').data('exchange'), $('.itemorder.active').data('order'));
            getVnindex();
        }, 1500);
        
        function getVnindex(){
             $.ajax({
                url: '/getvnindex',
                type: 'get',
                success: function (res) {
                    if (res != null && res.length > 0) {
                        var html = '';
                        for (var i = 0; i < res.length; i++) {
                            var color = 'orange';
                            var character = '';
                            if(res[i].oIndex < res[i].cIndex){
                                color = 'green';
                                character = '+';
                            }
                            else if(res[i].oIndex > res[i].cIndex){
                                color = 'red';
                                character = '-';
                            }
                            var indexName = '';
                            
                            if(res[i].mc == '10'){
                                indexName = 'VN-INDEX';
                            }
                            else if(res[i].mc == '11'){
                                indexName = 'VN30-INDEX';
                            }
                            else if(res[i].mc == '02'){
                                indexName = 'HNX-INDEX';
                            }
                            else if(res[i].mc == '03'){
                                indexName = 'UPCOM-INDEX';
                            }
                            var info = res[i].ot.split('|');
                            
                            html += '<div style="white-space: nowrap;cursor:pointer;margin-right:8px;width:120px;padding:4px;background:#fff;display:flex;justify-content:center;align-items:center;flex-direction:column">';
                            html += '<span>'+indexName+'</span>';
                            html += '<span style="color:'+color+'">'+res[i].cIndex+'</span>';
                            html += '<span style="color:'+color+'">'+character+''+info[0]+' '+character+''+info[1]+'</span>';
                            html += '</div>';
                        }
                        $('#tblVnindexList').html(html);
                    }
                }
            });
        }

        function getStockByExchange(exchange, order) {
            $.ajax({
                url: '/getstockbyexchange',
                type: 'get',
                data: {
                    exchange: exchange,
                    order: order
                },
                success: function (res) {
                    $('#tableStockList').empty();
                    if (res != null && res.length > 0) {
                        var html = '';
                        for (var i = 0; i < res.length; i++) {
                            var color = 'orange';
                            if(res[i].r < res[i].lastPrice){
                                color = 'green';
                            }
                            // else if(res[i].r == res[i].f){
                            //     color = '#00CACB';
                            // }
                            // else if(res[i].r == res[i].f){
                            //     color = '#F603F7';
                            // }
                            else if(res[i].r > res[i].lastPrice){
                                color = 'red';
                            }
                            html += '<tr style="cursor:pointer">';
                            html += '<td class="first-td btnRedirectUrl" data-url="' + res[i].sym + '"><span class="ellipsis-text">' + res[i].name + '</span> <br>' + res[i].sym + '</td>';
                            html += '<td style="color:'+color+'">' + accounting.formatNumber(res[i].lastPrice) + '</td>';
                            html += '<td style="color:'+color+'">' + accounting.formatNumber(res[i].ot) + ' <br>' + res[i].changePc + '%</td>';
                            html += '<td class="columnFollow" data-name="'+res[i].sym+'">'+(res[i].follow == 1 ? '<span style="color:green">Đang theo dõi</span>' : '<a href="javascript:;" style="color:blue; text-decoration:none" class="btnFollow" data-name="'+res[i].sym+'">Theo dõi</a>')+'</td>';
                            html += '</tr>';
                        }
                        $('#tableStockList').html(html);
                        $('.btnRedirectUrl').click(function () {
                            var url = $(this).data('url');
                            window.location.href = '/action?stock=' + url;
                        });
                        $('.btnFollow').click(function(){
                           var stock =  $(this).data('name');
                          $.ajax({
                             url : '/follow',
                             type:'get',
                             data:{
                                 stock: stock
                             },
                             success: function(res){
                                 if(res.status){
                                     toastr.success(res.message);
                                     $('.columnFollow[data-name="'+stock+'"]').html('<span style="color:green">Đang theo dõi</span>');
                                 }
                                 else{
                                     toastr.error(res.message);
                                 }
                             }
                          });
                       });
                    }
                    else {
                        $('#tableStockList').html('<p style="text-align:center">Không có dữ liệu</p>');
                    }
                }
            });
        }
    });
</script>
@endsection
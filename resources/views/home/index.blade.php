@extends('layout.layout_auth')
@section('content')
<style>
    .modal-first, .modal-first2 {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .modal-invite {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }
    
</style>
<style>
    .select-item {
        font-size: 22px;
        margin-right: 10px;
        width: auto;
        cursor: pointer;
    }

    .select-item.active {
        font-weight: bold;
        border-bottom: 2px solid green;
    }

    .btn-buy.active {
        background-color: #1ba17f !important;
        color: white !important;
    }

    .btn-sell.active {
        background-color: #ef4034 !important;
        color: white !important;
    }
</style>
<style>
    .modal-first {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .filter-stock-item {
        height: 30px;
    }

    .stock-item {
        height: 30px;
        font-size: 14px;
        width: 310px;
        height: 30px;
        border-radius: 2px;
        line-height: 30px;
        text-indent: 18px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-break: break-all;
    }

    .stock-item.active {
        color: blue;
        background: rgba(62, 76, 243, .1);
    }

    .filter-stock-item.active {
        color: blue;
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
    <div><img src="assets/images/dowload/bg_title_customerService.png" style="width:100%;"></div>
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
                src="/assets/images/dowload/iPhone.png"
                style="margin-right:5px;width:20px;height:20px">Iphone tải xuống</a>
        <a class="btn btn-black btn-dowload-ad" style="background-color:#333;color:white;width:48%"><img
                src="/assets/images/dowload/Android.png"
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
        <div class="content-modal" style="position:relative;background:white;width:90%;height:240px;border-radius:8px">
            <div
                style="display:flex;justify-content:center;color:#333;font-size:20px;padding:20px;align-items:center;flex-direction:column">
                <span style="color:#333;font-size:20px">Mã giới thiệu</span>
                {!! QrCode::generate("https://". $domain->setting_value ."/register?ref_id=". Auth::user()->id) !!}
                <!--<div style="margin-top:15px;color:rgb(72, 85, 244)">Mã mời của tôi: 1014</div>-->

                <span style="color:#333;font-size:20px">Link giới thiệu</span>
                <div style="display:flex" class="js-link-invite">
                    <input maxlength="140" value="https://{{$domain->setting_value}}/register?ref_id={{Auth::user()->id}}" step="" enterkeyhint="done" autocomplete="off"
                        type="" class="uni-input-input">
                    <button class="btn btn-primary js-link-invite-coppy">Copy</button>
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
    overflow: visible; " @if(Auth::user()->role == 1) onclick="document.location.href = '/partner/customer'" @else class="js-daily" @endif>Xem chi tiết đại lý</div>


    </div>
    <div
        style="margni-top:15px;display:flex;flex-direction:column;padding:28px;border-radius:12px;margin:16px;justify-content:space-between;background:#fff">
        Link quảng cáo là địa chỉ để bạn quảng cáo ra youtube, facebook, tiktok hoặc website của chính bạn.
    </div>

</div>


<div class="container homecontainer js-container-main">
     <div class="modal-first2 homecontainer"
        style="display:none;align-items:center;margin:0 auto;justify-content:center;height:100vh;position:fixed;top:0;right:0;bottom:0;left:0">
        <div class="content-modal" style="background:white;width:90%;height:600px;border-radius:8px">
            <div class="model-header"
                style="border-top-left-radius:8x;border-top-right-radius:8x;;background-color: rgb(62, 76, 243);padding:18px; position: relative; padding-top: 12px;;display:flex;flex-direction:column;align-items:center">
                <div style="display:flex;position:relative;width:80%;justify-content:center">
                    <div style="white-space:nowrap;font-size:18px;color:white;font-weight:bold">Tìm kiếm cổ phiếu</div>
                    <span class="js-close-modal-2"
                        style="position:absolute;right:10px;font-size:13px;font-weight:bold;cursor:pointer;color:#ccc">X</span>
                </div>

                <div
                    style="margin-top:8px;padding:6px;display:flex;background-color:#fff;border-radius:4px;justify-content:flex-start;align-items:center;width:90%">
                    <i class="bi bi-search" style="color:#333"></i>
                    <input class="js-input-stock" placeholder="Nhập tên cổ phiếu/mã cổ phiếu"
                        style="border:none;outline:none;flex:1;margin-left:10px;background:#fff !important">
                </div>
            </div>
            <div class="model-body" style="display:flex;">
                <div class="filter-item"
                    style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center; overflow-y: scroll; height: 480px;">
                    <div class="filter-item"
                        style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center">
                        <?php foreach ($az as $key => $item) { ?>
                            <div class="filter-stock-item btnFindStock <?= ($key == 0 ? "active" : "") ?>"
                                data-stock="<?= $item ?>"><?= $item ?></div>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="list-item-stock" style="flex:1; overflow-y: scroll; height: 480px;" id="sltListStock">
                    </div>
            </div>
        </div>
    </div>

    <div class="modal-first"
        style="display:none;align-items:center;justify-content:center;height:100vh;position:fixed;top:0;width:100%;max-width:450px;margin:0 auto;right:0;bottom:0;left:0">
        <div class="content-modal" style="background:white;width:90%;height:400px;border-radius:8px">
            <img src="assets/images/dowload/hone_gg_dlaog.png "
                style="width:450px;object-fit:contain;margin-left:-20px;margin-top:-35px">
                <div class="content-notify" >
                    <p style="padding:8px;"><strong>{{$data->setting_value}}</strong></p>
                     <div style="display:flex;justify-content:center">
                     @if(Auth::user()->kyc_status == 2 || Auth::user()->kyc_status == 1)
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
                      @else
                           <div class="btn-show-kyc" style="background-image: url('assets/images/dowload/btn_home_Dialog.png');
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
                      @endif
            </div>
                </div>
                <div class="content-kyc mt-2" style="display:none;justify-content:center;align-items:center;flex-direction:column">
                    <img src="assets/images/dowload/certificate_front.png" style="width:150px;height:100px">
                    <p style="padding:8px;margin-bottom:5px !important"><strong>Tài khoản của bạn chưa được xác thực, vui lòng xác thực để được thực hiện các hoạt động trên ứng dụng !</strong></p>
                    <div style="dislay:flex;justify-content:space-between;width:100%">
                        <a style="width:48%" class="btn-understand btn ">Để sau</a>
                        <a href="/kyc" style="width:48%" class=" btn btn-primary">Xác thực ngay</a>

                    </div>
                </div>
           
        </div>
    </div>
     <div class="header-default" style="justify-content:space-between!important">
        <img class="logo-header" style="width:132px;height:26px" src="{{asset($logo->image)}}">
        <div>
            <img  class="js-suport" style="width:22px;height:22px;margin:0 5px" 
                src="/assets/images/dowload/hskefu.png">
            <img onclick="document.location.href='/logout'" style="width:22px;height:22px;margin:0 5px" onclick="window.location.href='/logout'"
                src="/assets/images/dowload/hsdc.png">
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
            <!--<a href="{{route('mission')}}" class="col col-3"-->
            <a href="#" class="col col-3"
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
                            <button onclick="document.location.href='/free'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                            <button onclick="document.location.href='/dayin'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                            <button onclick="document.location.href='/weekin'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                            <button onclick="document.location.href='/monthin'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                            <button onclick="document.location.href='/interestfree'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                            <button  onclick="document.location.href='/vip'" style="margin-top:10px;width:100%" class="btn btn-primary">Tạo tài khoản
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
                    class="js-search-cp"
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
                        <div class="item-cp  itemorder" data-order="follow">
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
        
         $('.js-search-cp').click(function () {
            let $js_page = $(this).closest('.homecontainer');
            $js_page.find('.modal-first2').css('display', 'flex').hide().fadeIn(400);
            $("body").css('overflow', 'hidden');
        });
          $('.btnFindStock').click(function () {
            var stockFirst = $(this).data('stock');
            getStockByKey(stockFirst);
        });
         function filterStocks() {
                var searchTerm = $(this).val().toLowerCase();
                var $modal = $(this).closest('.modal-first2');
                $modal.find('.list-item-stock .stock-item').each(function() {
                    var stockName = $(this).text().toLowerCase();
                    if (stockName.includes(searchTerm)) {
                        $(this).removeClass('d-none');
                    } else {
                        $(this).addClass('d-none');
                    }
                });
            }

            // Attach input event to the search box
            $('.js-input-stock').on('input', filterStocks);

            // Close modal event
            $('.js-close-modal-2').on('click', function() {
                $(this).closest('.modal-first2').fadeOut(400, function() {
                    $("body").css('overflow', 'auto');
                });
            });
         getStockByKey('A');
          $('.select-item').click(function () {
        // Loại bỏ class "active" khỏi tất cả các phần tử có class "select-item"
        $('.select-item').removeClass('active');

        // Thêm class "active" vào phần tử đang được click
        $(this).addClass('active');
    });
        function getStockByKey(key){
            $.ajax({
                url: '/getallstock',
                type: 'get',
                data: {
                    key: key
                },
                success: function (res) {
                    if (res != null && res.length > 0) {
                        var html = '';
                        for (var i = 0; i < res.length; i++) {
                            html += '<div class="stock-item stockRedirect" data-stock="'+res[i].sym+'">' + res[i].sym + ' - ' + res[i].name + '</div>';
                        }
                        $('.list-item-stock').html(html);
                        $('.stockRedirect').click(function(){
                            var stock = $(this).data('stock');
                            window.location.href = '/action?stock=' + stock;
                        });
                    }
                }
            })
        }

  $(document).ready(function () {
        $('.filter-stock-item').click(function () {
            // Loại bỏ class "active" khỏi tất cả các phần tử có class "filter-stock-item"
            $('.filter-stock-item').removeClass('active');

            // Thêm class "active" vào phần tử đang được click
            $(this).addClass('active');
        });
    });

        $('.btn-understand').click(function (e) {
            e.preventDefault();
            hideModal();
        });

        // Function to show modal
        function showModal() {
            
            
            
            $('.modal-first').css('display', 'flex').hide().fadeIn();;
            $("body").css('overflow', 'hidden');
        }

        // Function to hide modal
        function hideModal() {
           $('.modal-first').fadeOut(400, function() {
                $("body").css('overflow', 'unset');
            });
        }

        // Show modal when the window loads
        $(window).on('load', function () {
          setTimeout(function() {
                checkAndShowModal();
            }, 1200);
         
        });
        function checkAndShowModal() {
            const currentTime = new Date();
            const popupTime = localStorage.getItem('popup_time');
            const currentDate = currentTime.toDateString(); // Get current date string
            
            if (!popupTime) {
                // If popup_time doesn't exist, show the modal and set the current time
                showModal();
                localStorage.setItem('popup_time', currentTime.toISOString());
            } else {
                const previousPopupTime = new Date(popupTime);
                const previousDate = previousPopupTime.toDateString(); // Get previous date string
                
                if (currentDate === previousDate) {
                    // If popup_time is today, do nothing
                    return;
                } else {
                    // If popup_time is not today, show the modal and update the time
                    showModal();
                    localStorage.setItem('popup_time', currentTime.toISOString());
                }
            }
        }

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
            if(order == 'follow'){
                getStockByFollow();
            }
            else{
                getStockByExchange(exchange, order);
            }
        });
         $('.itemorder').click(function () {
            $('.itemorder').removeClass('active');
            $(this).addClass('active');
            var order = $(this).data('order');
            var exchange = $('.itemchoose.active').data('exchange');
            if(order == 'follow'){
                getStockByFollow();
            }
            else{
                getStockByExchange(exchange, order);
            }
        });
        getStockByExchange('HOSE', 'desc');
        getVnindex();
        
        setInterval(function(){
            getVnindex();
        }, 1500);
        
        setInterval(function(){
            if(('.itemorder.active').data('order') == 'follow'){
                getStockByFollow();
            }
            else{
                getStockByExchange($('.itemchoose.active').data('exchange'), $('.itemorder.active').data('order'));
            }
        }, 10000);
        
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
        $('.js-daily').click(function(){
           toastr.error("Bạn không đủ thẩm quyền đại lý.");
        })
        $('.btn-show-kyc').click(function(){
             $('.modal-first .content-notify').hide();
            $('.modal-first .content-kyc').css('display', 'flex').hide().fadeIn();
        })

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
        
        function getStockByFollow() {
            $.ajax({
                url: '/getstockbyfollow',
                type: 'get',
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
                            html += '<td class="columnFollow" data-name="'+res[i].sym+'"><span style="color:green">Đang theo dõi</span></td>';
                            html += '</tr>';
                        }
                        $('#tableStockList').html(html);
                        $('.btnRedirectUrl').click(function () {
                            var url = $(this).data('url');
                            window.location.href = '/action?stock=' + url;
                        });
                    }
                    else {
                        $('#tableStockList').html('<p style="text-align:center">Không có dữ liệu</p>');
                    }
                }
            });
        }
    });
    $(document).ready(function() {
    $('.js-link-invite-coppy').click(function() {
        // Get the input field
        var copyText = $(this).siblings('.uni-input-input');
        
        // Select the input field's text
        copyText.select();
        copyText[0].setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the input field
        document.execCommand("copy");

        // Optionally, you can provide feedback to the user that the text has been copied
        toastr.success("Coppy mã giới thiệu thành công !");
    });
});
</script>
@endsection
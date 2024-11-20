@extends('layout.layout_auth')
@section('content')
<style>
    .modal-first, .modal-first2 {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }
    .modal-invite{
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }
  .modal-langue{
       background-color: rgba(0, 0, 0, 0.6);
       z-index: 9999;
  }
  .item-language.active{
      background: #3e4cf3;
      color:white;
  }
  .item-language i{
      display:none;
      
  }
  .item-language{
      margin-bottom:15px;
  }
  .item-language.active i{
      display:block;
  }
</style>
<style>
   .fakeimg {
   height: 200px;
   background: #aaa;
   }
   .content-header{
   width: 100%;
   height: 300px;
   padding-bottom: 150px;
   background: url(assets/images/dowload//bg_my.png) 0% 0% / 100% no-repeat;
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-align: end;
   -webkit-align-items: flex-end;
   align-items: flex-end;
   border-radius: 0 0 20px 20px;
   }
   .userInfo__container-content-uid{
   width: 120px;
   background: #945b16;
   border-radius: 15px;
   padding: 2px 0;
   color: #ebbb6f;
   font-size: 12px;
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-align: center;
   -webkit-align-items: center;
   align-items: center;
   -webkit-justify-content: space-around;
   justify-content: space-around;
   line-height:12px;
   }
   .totalSavings__container{
   margin-top:-100px;
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
   -webkit-box-pack: center; 
   -webkit-justify-content: center;
   justify-content: center;
   padding: 0;
   width: 100%;
   height: auto;
   border-radius: 8px;
   background: #fff;
   }
   .totalSavings__container-header {
   width: 100%;
   padding: 18px;
   height: 100%;
   }
   .totalSavings__container-content {
   width: 100%;
   padding: 18px;
   height: 50%;
   }
   .totalSavings__container-header__title span {
   font-weight: 400;
   font-size: 14px;
   color: #333;
   }
   .totalSavings__container-header__subtitle {
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-align: center;
   -webkit-align-items: center;
   align-items: center;
   -webkit-box-pack: start;
   -webkit-justify-content: flex-start;
   justify-content: flex-start;
   width: 100%;
   margin-top: 8px;
   font-size: 14px;
   font-weight: 700;
   color: #333;
   padding-bottom:10px;
   }
   .totalSavings__container-header__subtitle .refresh{
   width: 20px;
   }
   svg{
   height: 100%;
   width: 100%;
   margin-left:10px;
   }
   .modal-invite svg{
       width:100px;
   }
   .totalSavings__container-content-item{
   padding-top:10px;
   display:flex;
   justify-content:center;
   align-items:center;
   flex-direction:column;
   flex:1;
   border-left:1px solid #dc9b4d;
   }
   .totalSavings__container-content-item:first-child{
   /* border-right:1px solid #dc9b4d; */
   border-left:0px;
   }
   .totalSavings__container-content-item img{
   width: 42px;
   height:42px;
   cursor: pointer;
   }
   .totalSavings__container-content{
   display:flex;
   justify-content:center;
   }
   .settingPanel__container {
   margin-top:20px;
   padding: 0 16px 8px;
   border-radius: 10px;
   background: #fff;
   }
   .settingPanel__container-items {
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   -webkit-flex-direction: column;
   flex-direction: column;
   color: #fff;
   padding-bottom: 0.26667rem;
   }
   .settingPanel__container-items__item{
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-pack: justify;
   -webkit-justify-content: space-between;
   justify-content: space-between;
   -webkit-box-align: center;
   -webkit-align-items: center;
   align-items: center;
   font-size: 16px;
   padding: 16px 0;
   border-bottom:1px solid #484848;
   }
   .settingPanel__container-items__title {
   display: -webkit-box;
   display: -webkit-flex;
   display: flex;
   -webkit-box-pack: start;
   -webkit-justify-content: flex-start;
   justify-content: flex-start;
   -webkit-box-align: center;
   -webkit-align-items: center;
   align-items: center;
   color:#333;
   }
   .settingPanel__container-items__title img{
   width:32px;height:32px;margin-right:10px
   }
   .row>*{
   height:unset !important;
   }
   .arrow img{
   width:32px;height:32px;
   }
   #btn-out{
   /* background-color: #686C94; */
   padding: 10px auto;
   width:100%;
   border-radius:30px;
   color:#CD9047;
   margin-top:15px;
   border: 1px solid #CD9047;
   /* background: -webkit-linear-gradient(left,#EBBB6F 0%,#CD9047 100%); */
   /* background: linear-gradient(90deg,#EBBB6F 0%,#CD9047 100%); */
   }
</style>

<div class="container homecontainer js-container-support"
    style="background:#dfebfb;overflow:hidden;height:100vh;display:none">
    <div class="header-default" style="background-color:#dfebfb;border:none !important">
        <a href="/customer" style="flex:1;height: 50px;">
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
            <i style="color:#333" onclick="document.location.href='/customer'" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div  style="text-align:center;flex:1;color:#333;font-size:20px;white-space:nowrap">Tuyển đại lý</div>
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
   <div class="modal-langue" style="display:none;align-items:center;justify-content:center;height:100vh;position:absolute;top:0;right:0;bottom:0;left:0">
          <div class="content-modal" style="position:relative;background:white;width:80%;height:400px;border-radius:8px">
                <div style="position:relative;display:flex;justify-content:center;color:#333;font-size:20px;padding:20px;align-items:center;flex-direction:column;border-bottom:1px solid #ccc;">
                    <span style="color:#333;font-size:20px;font-weight:bold">Chọn ngôn ngữ</span>
                   
                      <div class="js-hide-model-langue" style="text-align: center;right:48%;
        border-radius: 50%;
        width: 39px;
        position: absolute;
        top:10xpx;
        right:10px;
        color:#ccc;
        height: 39px;
        line-height: 39px;
        background: rgba(255, 255, 255, 0.3);">X</div>
              </div>
                <div style="padding:16px;" class="list-language">
                    <div class="d-flex item-language active" style="border-radius:10px;width:100%;padding:10px 16px;align-items:center">
                        <img src="assets/images/dowload/014507.png" style="width:30px;height:30px;margin-right:8px">
                        <div>Tiếng việt</div>
                        <i class="bi bi-check-lg" style="font-size:25px;margin-left:auto;padding-right:8px"></i>
                    </div>
                      <div class="d-flex item-language " style="border-radius:10px;width:100%;padding:10px 16px;align-items:center">
                        <img src="assets/images/dowload/047316.png" style="width:30px;height:30px;margin-right:8px">
                        <div>中文简体</div>
                        <i class="bi bi-check-lg" style="font-size:25px;margin-left:auto;padding-right:8px"></i>
                    </div>
                      <div class="d-flex item-language " style="border-radius:10px;width:100%;padding:10px 16px;align-items:center">
                        <img src="assets/images/dowload/056272.png" style="width:30px;height:30px;margin-right:8px">
                        <div>中文繁体</div>
                        <i class="bi bi-check-lg" style="font-size:25px;margin-left:auto;padding-right:8px"></i>
                    </div>
                    <button style="border-radius:20px;background-color:#3e4cf3;padding:10px;width:100%;margin-top:50px" type="button" style="width:100%" class="btn btn-primary js-hide-model-langue" id="btn-change-language">Xác nhận</button>
                </div>
                </div>
                
    </div><div class="content-header">
   <div class="header-content-body" style="display:flex;justify-content:center;align-items:center;padding: 20px;margin-top:-50px">
      <div class="avatar">
         <img onclick="document.location.href='/info'" style="width:75px;height:75px;border-radius:50%" src="https://i.imgur.com/MXNalYx.png" class="userAvatar">
      </div>
      <div style="display:flex;flex-direction:column;;margin-left:6px">
         <span onclick="document.location.href='/info'" style="color: #fff;">{{$information->username}}</span>
         @if($information->kyc_status == 0)
            <span onclick="document.location.href='/kyc'" style="color: red;">Chưa xác minh</span>
            @elseif($information->kyc_status == 1)
                        <span style="color: orange;">Chờ duyệt</span>

            @else            
            <span style="color: green;">Đã xác minh</span>

         @endif
      </div>
   </div>
   <div style="display:flex;justify-content:center;flex-direction:column;position:absolute;right:0;top:20px">
      <div class="d-flex" style="margin-bottom:20px;justify-content:flex-end">
         <img class="js-show-change-langue" src="assets/images/dowload/hslang_white.png" style="width:18px;height:18px;margin:0 8px">
         <img class="js-suport" src="assets/images/dowload/kefu.png" style="width:18px;height:18px;margin:0 8px">
      </div>
      <div class="" onclick="document.location.href='/logout'" style=";color:blue;background:linear-gradient(180deg,#fff,hsla(0,0%,100%,.5));cursor:pointer;border-bottom-left-radius:10px;;border-top-left-radius:10px;padding:4px 15px">Đăng xuất</div>
   </div>
</div>
<div style="margin-top:-150px;padding:15px;display:flex;justify-content:space-between;background:rgba(255, 255, 255, 0.2);border-radius:8px;margin-left:10px;margin-right:10px">
   <span style="color:white">Tổng tài sản</span>
   <span style="color:white;font-size:18px">{{ number_format($information->money + $totalCp + ($debt != null ? $debt->total : 0), 0, ',', '.') }} VND</span>

</div>
<div style="margin-top:8px;padding:15px;display:flex;justify-content:space-between;background:rgba(255, 255, 255, 0.2);border-radius:8px;margin-left:10px;margin-right:10px">
   <span style="color:white">Tổng Đóng băng</span>
   <span style="color:#b72323;font-size:16px">{{ number_format($debt != null ? $debt->total : 0, 0, ',', '.') }} VND</span>

</div>
<div class="body" style="padding:13px;margin-top:110px">
   <div  class="totalSavings__container">
      <div  class="totalSavings__container-header">
         <div style="width: 100%; display: flex">
             <div  class="totalSavings__container-header-box ar-1px-b" style="width: 49%">
                <div  class="totalSavings__container-header__title"><img src="assets/images/dowload/zhanghu.png" style="margin-right:10px;height:20px;width:20px"><span >Tổng tài sản CP</span></div>
                <p  class="totalSavings__container-header__subtitle">
                   <span style="font-size:18px">{{ number_format($totalCp , 0, ',', '.') }} VND</span>
                  
                </p>
             </div>
             <div  class="totalSavings__container-header-box ar-1px-b" style="width: 50%">
                <div  class="totalSavings__container-header__title"><img src="assets/images/dowload/zhanghu.png" style="margin-right:10px;height:20px;width:20px"><span >Phí quản lý</span></div>
                <p  class="totalSavings__container-header__subtitle">
                   <span style="font-size:18px">{{ number_format($information != null ? $information->fee_manager : 0, 0, ',', '.') }} VND</span>
                  
                </p>
             </div>
         </div>
         <div style="width:100%; display:flex">
             <div  class="totalSavings__container-header-box ar-1px-b" style="width: 49%">
                <div  class="totalSavings__container-header__title"><img src="assets/images/dowload/zhanghu.png" style="margin-right:10px;height:20px;width:20px"><span >Số dư</span></div>
                <p  class="totalSavings__container-header__subtitle">
                   <span style="font-size:18px">{{ number_format($information->money - ($debt != null ? $debt->total : 0), 0, ',', '.') }} VND</span>
                  
                </p>
             </div>
             <div  class="totalSavings__container-header-box ar-1px-b" style="width: 50%">
                <div  class="totalSavings__container-header__title"><img src="assets/images/dowload/zhanghu.png" style="margin-right:10px;height:20px;width:20px"><span >Tổng dư nợ hợp đồng</span></div>
                <p  class="totalSavings__container-header__subtitle">
                   <span style="font-size:18px">{{ number_format($debt != null ? $debt->debt : 0, 0, ',', '.') }} VND</span>
                  
                </p>
             </div>
         </div>
         <div class="row">
            <!--<div class="col-6" style="color">-->
            <!--   Đóng băng<br><span style="color:#333">0</span>-->
            <!--</div>-->
            <!--<div class="col-6" style="color">-->
            <!--   Chiết khấu<br><span style="color:#333">50.000</span>-->
            <!--</div>-->
            <div class="d-flex" style="justify-content:flex-startn">
               <a href="{{route('bank')}}" style="text-decoration:none;cursor:pointer;margin:8px 0;margin-right:15px;padding:8px 30px;border-radius:15px;background:linear-gradient(90deg,#3e4cf3,#4f71f9);color:white">
               <img src="assets/images/dowload/chongzhi.png" style="width:20px;height:20px;margin-right:10p"> Nạp tiền
               </a>
               <a  href="{{route('withdraw')}}" style="text-decoration:none;cursor:pointer;margin:8px 0;padding:8px 30px;border-radius:15px;background:#fff;color:#3e4cf3;border:1px solid #3e4cf3">
               <img src="assets/images/dowload/tixian.png" style="width:20px;height:20px;margin-right:10p"> Rút tiền
               </a>
            </div>
         </div>
      </div>
   </div>
   <div class="row" style="margin:20px 0;background:white;border-radius:8px;padding:8px">
        <a   href="#" class="js-agency col col-md-3" style="text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
         <img style="width:50px;height:50px" src="assets/images/dowload/tgzq.png">
         <div   style="color:#333;text-decoration:none;font-size:11px">Giới thiệu</div>
      </a>
      <a href="{{route('tichkiem')}}" class="col col-md-3" style="text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
         <img style="width:50px;height:50px" src="assets/images/dowload/mycfpm.png">
         <div style="color:#333;text-decoration:none;font-size:11px">Gửi tiết kiệm</div>
      </a>
      <a href="{{route('nganhang')}}" class="col col-md-3" style="text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
         <img style="width:50px;height:50px" src="assets/images/dowload/myyhk.png">
         <div style="color:#333;text-decoration:none;font-size:11px">Ngân hàng</div>
      </a>
      <a href="{{route('chitiet')}}" class="col col-md-3" style="text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">
         <img style="width:50px;height:50px" src="assets/images/dowload/myzjmx.png">
         <div  style="color:#333;text-decoration:none;font-size:11px">Lịch sử giao dịch</div>
      </a>
      <!--<a href="{{route('mission')}}" class="col col-md-3" style="text-decoration:none;padding:15px 0;flex-direction:column;display:flex;justify-content:center;align-items:center">-->
      <!--   <img style="width:50px;height:50px" src="assets/images/dowload/myxsrw.png">-->
      <!--   <div  style="color:#333;text-decoration:none;font-size:13px">Nhiệm vụ</div>-->
      <!--</a>-->
   </div>
   <div  class="settingPanel__container">
      <div  class="settingPanel__container-items">
          <a href="{{route('qltbao')}}"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">
            <div  class="settingPanel__container-items__title">
               <img style="height:20px;width:20px"  src="assets/images/dowload/xxgl.png">
            <div  style="color:#333;text-decoration:none;font-size:14px">Quản lý thông báo</div>
            </div>
            <div class="arrow" style="margin-left:auto">
              <i class="bi bi-chevron-right" style="font-size:18px;font-weight:bold"></i>
            </div>
         </a>
         <!--<a href="{{route('khieunai')}}"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/xznx.png">-->
         <!--   <div  style="color:#333;text-decoration:none;font-size:14px">Khiếu nại</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->
          <a href="{{route('info')}}"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">
            <div  class="settingPanel__container-items__title">
               <img style="height:20px;width:20px"  src="assets/images/dowload/zhzl.png">
            <div style="color:#333;text-decoration:none;font-size:14px">Thông tin tài khoản</div>
            </div>
            <div class="arrow" style="margin-left:auto">
               <i class="bi bi-chevron-right" style="font-size:18px;font-weight:bold"></i>
            </div>
         </a>
         <!--<a href="{{route('tigia')}}"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/huilv.png">-->
         <!--   <div  style="color:#333;text-decoration:none;font-size:14px">Tỉ giá</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->
         <!--<a href="{{route('chitiet')}}"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/zjmx.png">-->
         <!--   <div  style="color:#333;text-decoration:none;font-size:14px">Chi tiết</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->
         <!--<a href="#" class="js-agency"  class="settingPanel__container-items__item ar-1px-b" style="padding:16px 0 !important;text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/tgzq.png">-->
         <!--<div  style="color:#333;text-decoration:none;font-size:14px">Tuyển đại lý</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->
         <a href="{{route('hoahong')}}"  class="settingPanel__container-items__item ar-1px-b" style="padding:16px 0 !important;text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">
            <div  class="settingPanel__container-items__title">
               <img style="height:20px;width:20px"  src="assets/images/dowload/hbjl.png">
                <div style="color:#333;text-decoration:none;font-size:14px">Lịch sử hoa hồng và khuyến mại</div>
            </div>
            <div class="arrow" style="margin-left:auto">
               <i class="bi bi-chevron-right" style="font-size:18px;font-weight:bold"></i>
            </div>
         </a>
         <!--<a target="_blank" href="https://www.vnf8.com/Home/WebIndex"  class="settingPanel__container-items__item ar-1px-b" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/gywm.png">-->
         <!--      <div  style=";text-decoration:none;color:#333;font-size:14px">Giới thiệu</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->
         <!--<a href="#" class="js-suport settingPanel__container-items__item ar-1px-b"  style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;width:100%;border:none">-->
         <!--   <div  class="settingPanel__container-items__title">-->
         <!--      <img style="height:20px;width:20px"  src="assets/images/dowload/zxkf.png">-->
         <!--      <div  style="color:#333;text-decoration:none;font-size:14px">Dịch vụ trực tuyến</div>-->
         <!--   </div>-->
         <!--   <div class="arrow" style="margin-left:auto">-->
         <!--      <img src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">-->
         <!--   </div>-->
         <!--</a>-->

      </div>
   </div>
</div>
@endsection
@section('script')

<script>
  $('.js-daily').click(function(){
           toastr.error("Bạn không đủ thẩm quyền đại lý.");
        })
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
    });
     $(document).ready(function() {
             $('.js-hide-model-langue').click(function() {
                    $('.modal-langue').css('display', 'none');
                });
            $('.js-show-change-langue').click(function() {
                // Lấy trạng thái hiện tại của modal-invite
                var modalInvite = $('.modal-langue');
                var currentDisplay = modalInvite.css('display');
                
                // Nếu modal-invite đang ẩn, thì hiển thị
                if (currentDisplay === 'none') {
                    modalInvite.css('display', 'flex');
                } else {
                    // Nếu modal-invite đang hiển thị, thì ẩn đi
                    modalInvite.css('display', 'none');
                }
            });
        });
  $(document).ready(function() {
            $('.item-language').click(function() {
                $('.item-language').removeClass('active');
                $(this).addClass('active');
            });
        });
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

</script>
@endsection
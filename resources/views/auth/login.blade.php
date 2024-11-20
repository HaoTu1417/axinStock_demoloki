@extends('layout.layout_auth')
@section('content')
<style>
  
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
  .tabbar__container{
      display:none !important;
  }
</style>
<div class="container homecontainer" style="background-color:white">
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
                
    </div>
         <div class="header-default" style="background-color:rgb(62, 76, 244)">
            <div  class="color:#fff" style="flex:1;height: 50px;">
               <i style="color:#fff" onclick="history.back()" class="icon-back bi bi-chevron-left"></i>
            </div>
            <div style="text-align:center;flex:1;color:white;font-size:20px;white-space:nowrap">Đăng nhập</div>
            <div style="flex:1;justify-content:flex-end;display:flex">
            <img class="js-show-change-langue" src="assets/images/dowload/hslang_white.png" style="width:22px;height:22px;margin-right:12px">
        </div>
         </div>
         <div style="padding: 50px;display:flex;justify-content:center;align-items:center">
         <img src="{{asset($logo->image)}}" style="padding: 10px;
    border-radius: 8px;
    background: blue;
    width:132px;height:44px">
            </div>
         <div style="padding:20px">
         <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_account.png" style="width:22px;height:22px">
            <input type="text" id="txtUsername" placeholder="Nhập tài khoản email" >
        </div>
        <div class="mb-3 form-input mt-2">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="password" id="txtPassword" placeholder="Nhập mật khẩu" >
        </div>

        <div class="mb-3  mt-2 d-flex" style="justify-content:space-between">
                <div style="display:flex;align-items:center">
                    <input type="checkbox" name="save_pass" style="width:18px;height:18px"> <span style="margin-left:6px">Lưu mật khẩu </span>
                </div>
                <div style="display:flex;align-items:center">
                    <a href="/forgotpassword" style="text-decoration:none;color:#333">Quên mật khẩu ? </a>
                </div>
        </div>

            <div class="mt-4">
               <button type="button" style="width:100%" class="btn btn-primary" id="btnLogin">Đăng nhập</button>
           </div>
           <div class="div-btn" style="display:flex;justify-content:center">
               <a style="color:red"  onclick="location.href='/register'">Tạo tài khoản mới</a>
           </div>
         </div>

      </div>
@endsection

@section('script')

<script>

  $(document).ready(function() {
            $('.item-language').click(function() {
                $('.item-language').removeClass('active');
                $(this).addClass('active');
            });
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

    $(document).ready(function(){
        $('#btnLogin').click(function(){
            $.ajax({
                url:'/logins',
                type:'post',
                data:{
                    username: $('#txtUsername').val(),
                    password: $('#txtPassword').val(),
                    _token : $('#csrf').val()
                },
                success: function(res){
                    if(res.status){
                        toastr.success("Đăng nhập thành công");
                            window.location.href = '/';
                            
                        
                    }
                    else{
                        toastr.error(res.message);
                    }
                }
            })
        });
    });
</script>
@endsection
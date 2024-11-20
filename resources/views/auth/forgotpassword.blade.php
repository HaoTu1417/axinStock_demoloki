@extends('layout.layout_auth')
@section('content')
<style>
     .tabbar__container{
      display:none !important;
  }
</style>
<div class="container homecontainer register-container" style="background-color:white">
         <div class="header-default">
            <div  class="color:white" style="flex:1;height: 50px;">
               <i style="color:white" onclick="history.back()" class="icon-back bi bi-chevron-left"></i>
            </div>
            <div style="text-align:center;flex:1;color:#fff;font-size:20px;white-space:nowrap">Quên mật khẩu</div>
            <div style="flex:1"></div>
         </div>
         <div style="padding:20px">
    
        <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_mail.png" style="width:22px;height:22px">
            <input type="email" id="txtEmail" placeholder="Nhập email" >
        </div>
        <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="text" id="txtOtp" placeholder="Nhập mã xác nhận email" >
            <span class="js-send-otp" style="color:blue;font-size:12px;cursor:pointer">Lấy mã xác nhận</span>
        </div>
       
        <div class="mb-3 form-input mt-2">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="password" id="txtPassword" placeholder="Nhập mật khẩu" >
        </div>
        <span style="color:#999;font-size:13px;margin-bottom:10px">
        
        <div class="mb-3 form-input mt-2">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="password" id="txtRePassword" placeholder="Nhập lại mật khẩu" >
        </div>
       

       
            <div class="mt-4">
               <button type="button" style="width:100%" class="btn btn-primary" id="btnRegister">Nộp</button>
           </div>
          
         </div>

      </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
         $('.js-send-otp').click(function(){
            let $email =$('#txtEmail').val();
            if($email == ''){
                toastr.error("Vui lòng điền email");
            }else{
                 $.ajax({
                    url:'/sendOtp2',
                    type:'post',
                    data:{
                        email: $('#txtEmail').val(),
                        _token : $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            }
        });
         $('#btnRegister').click(function(){
           
            $.ajax({
                url:'/resetpassword',
                type:'post',
                data:{
                    email: $('#txtEmail').val(),
                    password: $('#txtPassword').val(),
                    repassword: $('#txtRePassword').val(),
                    otp: $('#txtOtp').val(),
                    _token : $('#csrf').val()
                },
                success: function(res){
                    if(res.status){
                        toastr.success(res.message);
                        window.location.href = '/login';
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
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
            <div style="text-align:center;flex:1;color:#fff;font-size:20px;white-space:nowrap">Đăng ký</div>
            <div style="flex:1"></div>
         </div>
         <div style="padding:20px">
         <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_account.png" style="width:22px;height:22px">
            <input type="text" id="txtUsername" placeholder="Tên người dùng (4-16 ký tự chữ cái hoặc số)" >
        </div>
        <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_mail.png" style="width:22px;height:22px">
            <input type="email" id="txtEmail" placeholder="Nhập email" >
        </div>
        <div class="mb-3 form-input">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="text" id="txtOtp" placeholder="Nhập mã xác nhận email" >
            <span class="js-send-otp" style="color:blue;font-size:12px;cursor:pointer">Lấy mã xác nhận</span>
        </div>
        <span style="color:#999;font-size:13px;margin-bottom:10px">
        Gợi ý :Không nhận được mã xác minh, Vui lòng kiểm tra trong mục thư rác Gmail của bạn.
        </span>
        <div class="mb-3 form-input mt-2">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="password" id="txtPassword" placeholder="Nhập mật khẩu" >
        </div>
        <span style="color:#999;font-size:13px;margin-bottom:10px">
            Gợi ý :Độ dài mật khẩu không được ít hơn 6 ký tự , phải chứa các ký tự số và chữ cái
        </span>
        <div class="mb-3 form-input mt-2">
            <img src="assets/images/dowload/icon_verification_code.png" style="width:22px;height:22px">
            <input type="password" id="txtRePassword" placeholder="Nhập lại mật khẩu" >
        </div>
        <div class="mb-3 form-input ">
            <img src="assets/images/dowload/icon_invitation_code.png" style="width:22px;height:22px">
        <input placeholder="Nhập mã mời (nếu có)" type="number" id="txtRefId" name="ref_id" value="{{ isset($_REQUEST['ref_id']) ? $_REQUEST['ref_id'] : '' }}" >
        </div>

        <div style="display:flex;align-items:center">
                <input  type="checkbox" style="width:30px;height:30px;margin-right:10px" class="checkbox">
                <p style="font-size:13px;margin:0">Đăng ký ngay ! bạn đã đồng ý Thỏa thuận đăng ký người dùng <span style="color:blue">《 Chính sách bảo mật 》</span> <span style="color:blue">《 Nhắc nhở rủi ro 》</span></p>
            </div>
            <div class="mt-4">
               <button type="button" style="width:100%" class="btn btn-primary" id="btnRegister">Đăng ký</button>
           </div>
           <div class="div-btn" style="display:flex;justify-content:center">
               <a style="color:red"  onclick="location.href='/login'">Đăng nhập</a>
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
                    url:'/sendOtp',
                    type:'post',
                    data:{
                        email: $('#txtEmail').val(),
                        _token : $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            // window.location.href = '/login';
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            }
        })
        $('#btnRegister').click(function(){
            if(!$('.checkbox').is(':checked')){
                toastr.error('Vui lòng đồng ý Chính sách bảo mật và nhắc nhở rủi ro');
                return;
            }
            
            $.ajax({
                url:'/registers',
                type:'post',
                data:{
                    username: $('#txtUsername').val(),
                    email: $('#txtEmail').val(),
                    password: $('#txtPassword').val(),
                    repassword: $('#txtRePassword').val(),
                    otp: $('#txtOtp').val(),
                    ref_id: $('#txtRefId').val(),
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
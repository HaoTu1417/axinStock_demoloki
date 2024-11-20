@extends('layout.layout_auth')
@section('content')

  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .header-default{
      background:#3e4cf3;
      display:flex;
      justify-content:space-between;
      height:54px;
      align-items:center;
    }
    .header-default .logo-header{
        width: 132px;
        height: 26px;
    }
    .row >*{
      height: auto;
    }
    .col{
      background: #fff !important;

    }
    .nav-link{
       display:flex;
       flex-direction: column;
       align-items:center;
       justify-content:center;
       text-align:center;
      }

      .nav-pills .nav-link, .nav-pills .show>.nav-link{
         border: 1px solid #ccc !important;
         border-radius: 4px !important;

      }
      .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        color:#333 !important;
        background: #ebedfe !important;
        border: 2px solid #3e4cf3 !important;
        border-radius: 4px !important;
        
      }
    .items{
      
    }
    @media screen and (max-width:  768px) {
      .items::-webkit-scrollbar {
          display: none;
      }  
    }

    .items::-webkit-scrollbar {
          
    } 
    .item-cp.active{
      font-weight: bold;
      color:#3e4cf3;
      background:#eceeff;
    }
    .item-cp{
      padding: 6px 16px;
      white-space: nowrap;
      background-color: #f5f5f5;
      border-radius:4px;
      color:#959595;
      width: auto;
      margin-right:10px;
      margin-bottom:10px;
      cursor: pointer;
    }
    .list-item-cp{
      margin-top:10px;
      display:flex;
      width: auto;
      overflow: auto;
    }
    .list-item-cp.list-item-cp2{

    }
    .table-custom{
      
    }
    .table-custom thead th{
      color:#959595;
      font-size:13px;
    }
    .ellipsis-text {
    display: inline-block;
    max-width: 120px; /* Giá trị tối đa của chiều rộng */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size:12px;
}
.item-payment{
   width:140px;
   border:1px solid #ccc;
   margin-right:8px;
   font-size:13px;
   border-radius:4px;
   height:auto;
   display:flex;
   align-items:center;
   justify-content:center;
   text-align: center;
   cursor: pointer;
   padding:10px 0;
}
.item-payment.active{
   border-color:#3e4cf3;
   color:#3e4cf3;
   background:#ebedfe;
}
 .bank-select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    
  </style>
</head>

    @if($information->password2 == "" || $information->password2 == null)
        <div class="container homecontainer js-container-main" style="background:#f6f6f6">
        <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Mật khẩu rút tiền</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        
        
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Nhập mật khẩu</span>
           
            <input class="js-pass-old" placeholder="nhập mật khẩu hiện tại" style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="password" class="uni-input-input">

        </div>
        
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Mật khẩu mới</span>
           
            <input class="js-pass-new" placeholder="nhập mật rút tiền " style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="6" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="password" class="uni-input-input">

        </div>
       
        
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Xác nhận mật khẩu</span>
           
            <input class="js-pass-new-confirm" placeholder="nhập lại mật khẩu rút tiền" style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="6" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="password" class="uni-input-input">

        </div>
        
        <div style="padding:15px;color:red"> Gợi ý ：Mật khẩu rút tiền chỉ có thể nhập số, phải có 6 chữ số</div>
        
       
         <div class="mt-4" style="margin-left:10px;margin-right:10px">
           <button type="button" style="width:100%" class="btn btn-primary js-change-phone">Xác nhận thay đổi</button>
       </div>
        
       
     
    
   
    </div>

    @else
            @if($bank_info->count() > 0)
           <div class="container homecontainer js-withdraw-bank" style="background:#fff">
    <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
            <div  onclick="history.back()" style="flex:1;height: 50px;">
               <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
            </div>
            <div style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Xin rút tiền</div>
            <div style="flex:1;display:flex; justify-content:flex-end">
              
            </div>
         </div>
    <div style="margin-top:20px">
         <!--<strong>Phương thức rút tiền</strong>-->
         <!--@foreach($bank_info as $item)-->
         <!--   <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">-->
         <!--   <input type="text" value="{{$item->bank_name . '|'. $item->bank_number}}"  style="color:#333;flex:1;margin-left:8px;border:none;outline:none" disabled> <i style="color:#333;font-size:18px"  class="icon-back bi bi-chevron-right"></i>-->
         <!--</div>-->
         <!--@endforeach-->
         <strong>Phương thức rút tiền</strong>
<select class="bank-select" id="bank-select">
    @foreach($bank_info as $item)
        <option name="bank_select" value="{{$item->id}}">
            {{$item->bank_name}} | {{$item->bank_number}}
        </option>
    @endforeach
</select>


         <div style="margin:10px 0;padding:10px">
            <!--Hạn mức rút tiền: 0-->
         </div>
         

         <div style="display:flex;justify-content:space-between">
            <strong>Nhập số tiền</strong>
            <div>Số dư: {{ number_format($totalMoney, 0, ',', '.') }} VND</div>
         </div>

         <div class="" style="display:flex;align-items:center;padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                  <strong style="color:red">VND</strong>  <input id="number_money" placeholder="Điền số tiền rút" type="number" style="background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none">
               </div>

               <strong>Nhập mật khẩu</strong>

               <div class="" style="display:flex;align-items:center;padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                   <input id="password" placeholder="Nhập mật khẩu" name="password" type="password" style="background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none">
               </div>
        



        

    </div>
    <div style="margin-top:30px">
    <div class="js-send-withdraw" style="    background:#3e4cf3;
            border-radius:4px;
            text-align:center;
            display:flex;
            justify-content:center;
            cursor:pointer;
            align-items:center;
            color: rgb(255, 255, 255);
            font-size: 18px;
            height: 54px;
            padding: 6px 18px;
            box-shadow: 0px 3px 7px 0px var(--buttonshadow_red);
            overflow: visible;">Xác nhận</div>
    </div>
</div>


            @else
                <div class="container homecontainer js-add-bank" style="background:#fff">
    <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
            <div  onclick="history.back()" style="flex:1;height: 50px;">
               <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
            </div>
            <div style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Thêm thẻ</div>
            <div style="flex:1;display:flex; justify-content:flex-end">
              
            </div>
         </div>
    <div style="margin-top:20px">
         <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">
            <span >Thêm thẻ ngân hàng</span>
            <span >Thẻ ngân hàng <i style="color:#333;font-size:18px"  class="icon-back bi bi-chevron-right"></i></span>
         </div>

         <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">
            <span >Tên chủ thẻ</span>
            <input   id="bank_account" type="text" placeholder="nhập tên chủ thẻ" style="text-align:end;color:#333;flex:1;margin-left:8px;border:none;outline:none">
         </div>

         <div style="background:rgb(249, 249, 249);margin:10px 0;padding:10px">
            Để tiền vốn của bạn có thể nhanh chóng sử dụng , yêu cầu bạn nhập tên đúng với tên chủ thẻ.
         </div>
         
         <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">
            <span >Vui lòng chọn tiền tệ</span>
            <span >VND <i style="color:#333;font-size:18px"  class="icon-back bi bi-chevron-right"></i></span>
         </div>
         <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">
            <span >Tên thẻ ngân hàng</span>
            <input type="text" id="bank_name" placeholder="nhập tên thẻ" style="text-align:end;color:#333;flex:1;margin-left:8px;border:none;outline:none">
         </div>


         <div style="display:flex;border-bottom:1px solid #ccc;justify-content:space-between;align-items:center;padding:8px 2px">
            <span >Số thẻ ngân hàng</span>
            <input type="text" id="bank_number" placeholder="nhập số thẻ" style="text-align:end;color:#333;flex:1;margin-left:8px;border:none;outline:none">
         </div>

        

    </div>
    <div style="margin-top:30px">
    <div class="js-update-bank" style="    background:#3e4cf3;
            border-radius:4px;
            text-align:center;
            display:flex;
            justify-content:center;
            cursor:pointer;
            align-items:center;
            color: rgb(255, 255, 255);
            font-size: 18px;
            height: 54px;
            padding: 6px 18px;
            box-shadow: 0px 3px 7px 0px var(--buttonshadow_red);
            overflow: visible;">Xác nhận</div>
    </div>
</div>

            @endif
    @endif

   
@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('.js-update-bank').click(function(){
        let $pass = $('#bank_name').val();
        let $passNew = $('#bank_number').val();
        let $repassNew  = $('#bank_account').val();
        
         if($pass == "" || $passNew == "" || $repassNew == ""){
             toastr.error("Vui lòng nhập đủ thông tin");
        }else{
             $.ajax({
                url:'/updateBankInfo',
                type:'post',
                data:{
                    bank_name: $pass,
                    bank_number: $passNew,
                    bank_account: $repassNew,
                    _token : $('#csrf').val()
                },
                success: function(res){
                    if(res.status){
                        toastr.success(res.message);
                        window.location.href = '/withdraw';
                    }
                    else{
                        toastr.error(res.message);
                    }
                }
            })
        }
    });
    $(".js-change-phone").click(function(){
        let $pass = $('.js-pass-old').val();
        let $passNew = $('.js-pass-new').val();
        let $repassNew  = $('.js-pass-new-confirm').val();
        
         if($pass == "" || $passNew == "" || $repassNew == ""){
             toastr.error("Vui lòng nhập đủ thông tin");
        }else{
             $.ajax({
                url:'/changePassBankPost',
                type:'post',
                data:{
                    pass: $pass,
                    passNew: $passNew,
                    repassNew: $repassNew,
                    _token : $('#csrf').val()
                },
                success: function(res){
                    if(res.status){
                        toastr.success(res.message);
                        window.location.href = '/withdraw';
                    }
                    else{
                        toastr.error(res.message);
                    }
                }
            })
        }
    });
</script>
<script>

    $(document).ready(function() {
    $('.js-send-withdraw').on('click', function() {
        var password = $('#password').val().trim();
        var numberMoney = $('#number_money').val().trim();
        var bank_select = $('#bank-select').val();

        if (password === '' || numberMoney === '') {
            toastr.error('Vui lòng điền đầy đủ thông tin.');
            return;
        }

        $.ajax({
            url: '/withdrawals',
            method: 'POST',
            data: {
                password: password,
                amount: numberMoney,
                bank: bank_select,
                 _token : $('#csrf').val()
            },
            success: function(res) {
                if(res.status){
                    toastr.success(res.message);
                    document.location.href='/customer';
                }else{
                    toastr.error(res.message);
                }
            },
            error: function(xhr, status, error) {
               
            }
        });
    });
});
   
</script>

@endsection


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
.item-price{
    padding:4px 12px !important;
    width: 30% !important;
}
.item-price.active{
     border-color:#3e4cf3 !important;
   color:#3e4cf3 !important;
   background:#ebedfe !important;
   border:1px solid #3e4cf3 !important;
}
    
  </style>


           <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />

<div class="container homecontainer " style="background:#fff">
    <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
            <div  onclick="history.back()" style="flex:1;height: 50px;">
               <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
            </div>
            <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Nạp tiền</div>
            <div style="flex:1;display:flex; justify-content:flex-end">
              
            </div>
         </div>
    <div style="margin-top:20px">
    <div class="tablist-home">
      <p>Phương thức nạp tiền</p>
      <!--<ul class="nav nav-pills  ulTab" id="pills-tab" role="tablist" style="justify-content:flex-start">-->
      <!--  <li class="nav-item " style="margin-right:12px" role="presentation">-->
      <!--    <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">-->
      <!--      <img src="https://vnf7.com/static/img/anfin/card.png" style="width:20px;heigth:20px">-->
      <!--      <span>Thẻ ngân hàng<span>-->
      <!--   </button>-->
      <!--  </li>-->
        <!--<li class="nav-item " style="margin-right:12px" role="presentation">-->
        <!--  <button class="nav-link" id="pills-yellow-tab" data-bs-toggle="pill" data-bs-target="#pills-yellow" type="button" role="tab" aria-controls="pills-yellow" aria-selected="false">-->
        <!--  <img src="https://vnf7.com/static/img/anfin/qr_code.png" style="width:20px;heigth:20px">-->
        <!--    <span>Ví điện tử<span>-->
        <!-- </button>-->
        <!--</li>-->
      
      <!--</ul>-->
      <div class="tab-content mt-3" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
         <!--<p>Chọn loại tiền nạp</p>-->
         <!--<div style="display:flex;">-->
         <!--      <div class="item-payment active">-->
         <!--         {{$bankName}}-->
         <!--      </div>-->
               <!--<div class="item-payment">-->
               <!--   MB-BANK - nhập khoản VND-->
               <!--</div>-->
         <!--</div>-->
         <!--<p style="margin-top:10px">Tài khoản nhận tiền</p>-->
         <div style="display:flex;flex-direction:column">
                <div class="item-data" style="padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa!important;position:relative;">
                  Ngân hàng: <strong class="js-text">{{$bankName}}</strong>  <div style="position:absolute;top:10px;right:10px;border-radius:8px;font-size:13px;cursor:pointer;border:1px solid #3e4cf3;color:#3e4cf3;padding:2px 6px;" class="js-coppy">copy</div>
               </div>
               <div class="item-data" style="padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa!important;position:relative;">
                  Số tài khoản: <strong class="js-text">{{$bankNumber}}</strong>  <div style="position:absolute;top:10px;right:10px;border-radius:8px;font-size:13px;cursor:pointer;border:1px solid #3e4cf3;color:#3e4cf3;padding:2px 6px;" class="js-coppy">copy</div>
               </div>
               <div class="item-data" style="padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa !important;position:relative;">
                  Tên tài khoản: <strong class="js-text">{{$bankAccount}}</strong>  <!--div style="position:absolute;top:10px;right:10px;border-radius:8px;font-size:13px;cursor:pointer;border:1px solid #3e4cf3;color:#3e4cf3;padding:2px 6px;" class="js-coppy">copy</div>-->
               </div>
         </div>
         <p style="margin-top:10px">Điền số tiền nạp</p>
         <div style="display:flex;flex-direction:column">
               <div class="" style="display:flex;align-items:center;padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                  <strong>VND</strong>  <input placeholder="Điền số tiền nạp" type="number" class="js-money-pay" style="background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none" >
               </div>
         </div>
         <div class="list-item-price mt-3 " style="display:flex;flex-wrap: wrap;justify-content:space-between">
            <div class="item-price " data-value="1000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  1.000.000
            </div>
            <div class="item-price " data-value="2000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  2.000.000
            </div>
            <div class="item-price " data-value="3000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  3.000.000
            </div>
            <div class="item-price " data-value="5000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  5.000.000
            </div>
            <div class="item-price " data-value="10000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  10.000.000
            </div>
            <div class="item-price " data-value="20000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  20.000.000
            </div>
            <div class="item-price " data-value="50000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  50.000.000
            </div>
            <div class="item-price " data-value="100000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  100.000.000
            </div>
            <div class="item-price " data-value="200000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  200.000.000
            </div>
         </div>


         <p style="margin-top:10px">Nội dung chuyển tiền</p>
         <div style="display:flex;flex-direction:column">
            <div class="" style="padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                    <input class="js-note" readonly="true"  placeholder="Nhập tên tài khoản của bạn" value="{{$bank_content .' '. $information->username}}" type="text" style="width:80%;background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none"  >
                     <div style="position:absolute;top:10px;right:10px;border-radius:8px;font-size:13px;cursor:pointer;border:1px solid #3e4cf3;color:#3e4cf3;padding:2px 6px;" class="js-coppy-2" data-coppy="{{$bank_content .' '. $information->username}}">copy</div>
               </div>
         </div>

            <div style="margin-top:20px;font">Từ chối trách nhiệm：</div>
            <p>Thông tin thẻ ngân hàng sẽ được thay đổi tùy từng thời điểm, vui lòng chú ý trước mỗi lần nạp tiền hãy dùng thông tin mới nhất.<br>Sao chép tên và số tài khoản, sau khi chuyển tiền thành công hãy nhấn vào yêu cầu nạp tiền</p>
        
            <div style="    background:#e76277;
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
            overflow: visible;" class="js-submit-pay">Gửi yêu cầu nạp tiền</div>
         </div>
        <div class="tab-pane fade" id="pills-yellow" role="tabpanel" aria-labelledby="pills-yellow-tab" tabindex="0">
        <p>Chọn loại tiền nạp</p>
         <div style="display:flex;">
               <div class="item-payment active">
                  QR PAY VND
               </div>
               <div class="item-payment">
                  MoMo Pay VND
               </div>
               <div class="item-payment">
                  Zalo Pay VND
               </div>
         </div>
         <p style="margin-top:10px">Tài khoản nhận tiền</p>
         <div style="display:flex;flex-direction:column">
             
         </div>
         <p style="margin-top:10px">Điền số tiền nạp</p>
         <div style="display:flex;flex-direction:column">
               <div class="" style="display:flex;align-items:center;padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                  <strong>VND</strong>  <input placeholder="Điền số tiền nạp" type="number" style="background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none" >
               </div>
         </div>
         <div class="list-item-price mt-3 " style="display:flex;flex-wrap: wrap;justify-content:space-between">
            <div class="item-price " style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  1.000.000
            </div>
            <div class="item-price " style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  1.000.000
            </div>
            <div class="item-price " style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  1.000.000
            </div>
            <div class="item-price " style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 24px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                  1.000.000
            </div>
         
         </div>


         <p style="margin-top:10px">Nội dung chuyển tiền</p>
         <div style="display:flex;flex-direction:column">
                <div  style="padding:10px 5px;color:#333;border-radius:4px;background:#f7f8fa;position:relative;">
                    <input readonly="true" class="js-note"  placeholder="Nhập tên tài khoản của bạn" value="{{$bank_content .'  '. $information->username}}" type="text" style="width:90%;background:#f7f8fa;flex:1;margin-left:10px;border:none;outline:none"  >

               </div>
         </div>

            <div style="margin-top:20px;font">Từ chối trách nhiệm：</div>
            <p>Thông tin thẻ ngân hàng sẽ được thay đổi tùy từng thời điểm, vui lòng chú ý trước mỗi lần nạp tiền hãy dùng thông tin mới nhất.<br>Sao chép tên và số tài khoản, sau khi chuyển tiền thành công hãy nhấn vào yêu cầu nạp tiền</p>
        
            <div style="    background:#e76277;
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
            overflow: visible;">Gửi yêu cầu nạp tiền</div>
         </div>
        </div>
      
      </div>
    </div>
    </div>
    <div style="margin-top:30px">
       
    </div>
  </div>
   
@endsection
@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
        $(document).ready(function() {
            $('.js-coppy-2').on('click', function() {
                const content = $(this).attr('data-coppy');
                const tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(content).select();
                document.execCommand('copy');
                tempInput.remove();
                toastr.success("Đã sao chép");
            });
        });
    </script>
<script>

        $(document).ready(function() {
            // Click event for item-price
            $('.item-price').on('click', function() {
                var value = $(this).data('value');
                
                $('.js-money-pay').val(value);
                $('.item-price').removeClass('active');
                $(this).addClass('active');
            });

            // Keyup event for js-money-pay input
            $('.js-money-pay').on('keyup', function() {
                $('.item-price').removeClass('active');
            });
        });
        
        
        $(".js-submit-pay").click(function(){
            let $this = $(this);
            let $price = $(this).closest(".tab-pane").find('.js-money-pay').val();
            let $note  =  $(this).closest(".tab-pane").find('.js-note').val();
            
            console.log($price,$note)
            
            if($price == '' || $note == ''){
                 toastr.error("Vui lòng nhập đủ cả số tiền và nội dung chuyển tiền !");
            }else{
                 $.ajax({
                        url:'/recharges',
                        type:'get',
                        data:{
                            price: $price,
                            note: $note,
                            _token : $('#csrf').val()
                        },
                        success: function(res){
                            if(res.status){
                                toastr.success(res.message);
                                window.location.href = '/';
                            }
                            else{
                                toastr.error(res.message);
                            }
                        }
                    })
            }
        })
    </script>
<script>
 $(document).ready(function() {
            $('.js-coppy').on('click', function() {
                var textElement = $(this).closest('.item-data').find('.js-text');
                var textToCopy = textElement.text();

                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(textToCopy).select();
                document.execCommand('copy');
                tempInput.remove();

                toastr.success("Đã sao chép");
            });
        });

 $('.js-back-main').click(function(){
    $('.container-history').hide();
 

    $('.container-main').show();

  })

   $('.js-history').click(function(){
      $('.container-history').show();
      $('.container-main').hide();
   })
   $('#btn-nap').click(function(){
        let $this = $(this);
        if($this.hasClass('active')){
            document.location.href="https://rotationluck.info.test/bank/after";
        }
    })
  $('.Recharge__content-paymoney__money-list__item').click(function(){
    $('.Recharge__content-paymoney__money-list__item').removeClass('active');
    let $this= $(this);
    let $value = $this.attr("data-value");
    $this.closest('.body-tab-content').find('#van-field-1-input').val($value);
    // $('#van-field-1-input').val($value);
    if(!$this.closest('.body-tab').find('#btn-nap').hasClass('active')){
      $this.closest('.body-tab').find('#btn-nap').addClass('active');
    }
    $(this).addClass('active');
  
  });
  $('.place-right').click(function(){
    let $this = $(this);
    $this.closest('.Recharge__content-paymoney__money-input').find('#van-field-1-input').val('');
    if($this.closest('.body-tab').find('#btn-nap').hasClass('active')){
      $this.closest('.body-tab').find('#btn-nap').removeClass('active');
    }
  })
</script>

@endsection

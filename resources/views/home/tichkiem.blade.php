@extends('layout.layout_auth')
@section('content')
<style>
   .modal-first{
   background-color: rgba(0, 0, 0, 0.6);
   z-index: 9999;
   }
   .modal-invite{
   background-color: rgba(0, 0, 0, 0.6);
   z-index: 9999;
   }
   .tabbar__container{
   display:none;
   }
   #menu-container{
       display:flex;
       align-items: center;
       background: linear-gradient(180deg,#d4dbfa 10%,#d4dbfa 0,#fff 60%,#fff) !important   ;
       border-top-left-radius: 15px;
       border-top-right-radius: 15px;
       border-bottom-left-radius: 0;
       border-bottom-right-radius: 0;
       display: flex;
       flex-direction: row;
       align-items: center;
       color: #000;
       text-align: center;
       font-size: 14px;
       margin-top:-20px;
   }
   .item-chi-tiet {
   padding: 8px;
   cursor: pointer;
   padding-bottom:10px;
   color:#959595;
   font-size: 16px;
   white-space: nowrap;
   }
   /* Thêm CSS để chỉnh kiểu cho phần tử được chọn */
   .item-chi-tiet.active {
   font-weight: bold;
   color: #333;
   /*border-bottom:2px solid blue;*/
   }
   .item-chi-tiet{
   flex:1;
   text-align: center;
   display:flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   }
   .item-chi-tiet img{
   margin-top:10px;
   display:none;
   }
   .item-chi-tiet.active img{
   display: block;
   }
   /* Thêm CSS để ẩn các menu mặc định khi trang tải */
   #menu1, #menu2,#menu3,#menu4,#menu5,#menu6 {
   display: none;
   }
   #menu-container::-webkit-scrollbar {
   display: none;
   }
</style>
<div class="container homecontainer js-container-support" style="background:#fff;">
   <div class="header-default" style="align-items:flex-start;background-image: url(assets/images/dowload/bg_cfpm.png);
      background-size: 100% 100%;
      background-repeat: no-repeat;height:300px;flex-direction:column;justify-content:flex-start">
      <a href="#" onclick="history.back()" style="height: 50px;">
      <i style="color:#fff"  class="icon-back bi bi-chevron-left"></i>
      </a>
      <div style="padding:10px 30px">
         <span style="color:white;font-size:30px;font-weight:bold;color:#2a58b6">Tài khoản</span><br>
         <span style="width: 212px;
            height: 38px;
            background: linear-gradient(0deg, #d59511, #fcec94);
            box-shadow: 0px 3px 0px 0px #f1e09a, 0px 2px 0px 0px rgba(252,252,251,.8);
            border-radius: 19px;
            line-height: 38px;color:white;padding:14px">Tiết kiệm lãi xuất cao</span>
      </div>
   </div>
      <div id="menu-container" style="display:flex;width:auto;overflow:auto;">
         <div class="item-chi-tiet active" data-target="menu1">
            <div>Mẹo nhỏ</div>
            <div style="height:20px">
               <img data-v-84729d66="" src="assets/images/dowload/icon_cfactive.png" class="" style="width: 36px;">
            </div>
         </div>
         <div class="item-chi-tiet" data-target="menu2">
            <div>Rút lãi</div>
            <div style="height:20px">
               <img data-v-84729d66="" src="assets/images/dowload/icon_cfactive.png" class="" style="width: 36px;">
            </div>
         </div>
         <div class="item-chi-tiet" data-target="menu3">
            <div>Lịch sử giao dịch</div>
            <div style="height:20px">
               <img data-v-84729d66="" src="assets/images/dowload/icon_cfactive.png" class="" style="width: 36px;">
            </div>
         </div>
         <div class="item-chi-tiet js-tiengui" data-target="menu4" style="display:none">
         </div>
         <div class="item-chi-tiet js-tienrut" data-target="menu5" style="display:none">
         </div>
      </div>
      <div id="menu1" class="menulist mt-1" style="padding:15px">
         <div style="background:#868ff8;padding:15px;display:flex;justify-content:space-between;color:white;border-top-right-radius:8px;border-top-left-radius:8px">
            <div style="font-size:18px;font-weight:bold">Số dư tiền tiết kiệm</div>
            <div style="font-size:18px;font-weight:bold">{{number_format($wallet->deposit_money, 0, ',', '.')}} VND</div>
         </div>
         <div style="display:flex;align-items:center;padding:18px;box-shadow:0px 1px 12px 0px rgba(62,76,243,.1)">
            <div style="display:flex;flex-direction:column;flex:1;color:#3e4cf3;justify-content:center;align-items:center"><span style="color:#3e4cf3">{{number_format($wallet->profit_total, 0, ',', '.')}} VND</span> 
               <span style="color:#333">Lãi tích lũy</span>
            </div>
            <div style="display:flex;flex-direction:column;flex:1;color:#3e4cf3;justify-content:center;align-items:center"><span style="color:#3e4cf3">{{$profit}}%</span> 
               <span style="color:#333">Lãi suất năm</span>
            </div>
         </div>
         <div style="display:flex;justify-content:space-between;align-items:center;margin-top:20px">
            <div style="background: #868ff8;
               border-radius: 18px;
               padding: 6px;
               font-size: 16px;
               width: 40%;
               text-align: center;
               color: #fff;
               margin: 18px" class="js-show-tiengui">Gửi tiền</div>
            <div class="block-time" style="display:flex;align-items:center">
               <div style="background:rgb(134, 143, 248);padding:8px;border-radius:4px;color:white">
                  00
               </div>
               <span style="font-size:20px;margin:0 5px;font-weight:bold">:</span>
               <div style="background:rgb(134, 143, 248);padding:8px;border-radius:4px;color:white">
                  00
               </div>
            </div>
            <div style="background: #868ff8;
               border-radius: 18px;
               padding: 6px;
               font-size: 16px;
               width: 40%;
               text-align: center;
               color: #fff;
               margin: 18px" class="js-show-tienrut">Rút tiền</div>
         </div>
         <div style="margin-top:10px;width:100%;display:flex;justify-content:center;color:rgb(24, 34, 107);font-size:20px;font-weight:bold">Tiền tiết kiệm Mô tả chung</div>
         <div style="background: linear-gradient(180deg, #e7ebfe 10%, #e7ebfe 20%, #fff 75%, #fff);display:flex;align-items:center;
            border: 2px solid #fcfefe;
            box-shadow: 0px 1px 12px 0px rgba(62,76,243,.1);
            border-radius: 6px;
            padding: 15px;
            margin-top: 18px;margin-top:10px">
            <div style="min-width: 30px;
               line-height: 30px;
               margin-right: 18px;
               font-size: 15px;
               text-align: center;
               background: rgb(78,83,243);
               box-shadow: 0px 2px 2px 0px rgba(78,83,243,.57);
               border-radius: 50%;
               color: #fff;">1</div>
            <span>Miễn phí áp dụng, sử dụng ngay, tính lãi hàng ngày, lãi suất hàng năm lên tới <span style="color:red">{{$profit}}%</span>
            </span>
         </div>
         <div style="background: linear-gradient(180deg, #e7ebfe 10%, #e7ebfe 20%, #fff 75%, #fff);display:flex;align-items:center;
            border: 2px solid #fcfefe;
            box-shadow: 0px 1px 12px 0px rgba(62,76,243,.1);
            border-radius: 6px;
            padding: 15px;
            margin-top: 18px;margin-top:10px">
            <div style="min-width: 30px;
               line-height: 30px;
               margin-right: 18px;
               font-size: 15px;
               text-align: center;
               background: rgb(78,83,243);
               box-shadow: 0px 2px 2px 0px rgba(78,83,243,.57);
               border-radius: 50%;
               color: #fff;">2</div>
            <span>Gửi rút 247 
            </span>
         </div>
         <div style="background: linear-gradient(180deg, #e7ebfe 10%, #e7ebfe 20%, #fff 75%, #fff);display:flex;align-items:center;
            border: 2px solid #fcfefe;
            box-shadow: 0px 1px 12px 0px rgba(62,76,243,.1);
            border-radius: 6px;
            padding: 15px;
            margin-top: 18px;margin-top:10px">
            <div style="min-width: 30px;
               line-height: 30px;
               margin-right: 18px;
               font-size: 15px;
               text-align: center;
               background: rgb(78,83,243);
               box-shadow: 0px 2px 2px 0px rgba(78,83,243,.57);
               border-radius: 50%;
               color: #fff;">3</div>
            <span>Nguyên tắc rút lãi: Rút lãi linh hoạt, tiền lãi tính theo thời gian gửi và thời điểm rút
            </span>
         </div>
      </div>
      <div id="menu2" class="menulist">
         <div style="padding:15px;">
            <span style="font-size:18px;font-weight:bold">Rút lãi</span>
            <div style="padding:4px;border-radius:8px;width:100%;background:#f7f8fa"><input style="background:#f7f8fa !important;border:none;outline:none;width:100%" placeholder="Nhập số tiền" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="number" class="uni-input-input"></div>
            <div style="margin-top:10px;padding:10px;border-radius:8px;width:100%;background:rgba(62, 76, 243, 0.06);border:1px solid rgba(62, 76, 243, 0.3);display:flex;justify-content:space-between;align-items:center">
               <div>Lãi tích lũy</div>
               <div>{{number_format($wallet->profit_total, 0, ',', '.')}} VND</div>
            </div>
            <div class="mt-4">
               <button type="button" style="width:100%" class="btn btn-primary" id="">Nộp</button>
            </div>
         </div>
      </div>
      <div id="menu3" class="menulist mt-3">
         @if($history->count() > 0 )
           <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Thời gian</th>
                        <th>Loại</th>
                        <th>Số tiền</th>
                        <th>Số dư mới</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $each)
                        <tr>
                            <td>{{ $each->created_at }}</td>
                            <td>
                                @if($each->type == 1)
                                    <span style="color:green">Gửi </span>
                                @elseif($each->type ==2)
                                    <span style="color:red">Rút </span>
                                @else
                                    <span style="color:orange">Rút lãi n</span>
                                @endif
                            </td>
                            <td>{{ number_format($each->money, 0, ',', '.') }} VND</td>
                            <td>
                                Số dư ví: <strong>{{ number_format($each->wallet_money, 0, ',', '.') }} VND</strong><br>
                                Số dư tài khoản: <strong>{{ number_format($each->cus_money, 0, ',', '.') }} VND</strong><br>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
         @else
             <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
             </div>
         @endif
      </div>
      <div id="menu4" class="menulist mt-3">
         <div style="padding:15px;">
            <span style="font-size:18px;font-weight:bold">Số tiền gửi vào</span>
            <div style="padding:4px;border-radius:8px;width:100%;background:#f7f8fa"><input style="background:#f7f8fa !important;border:none;outline:none;width:100%" id="input-send" placeholder="Nhập số tiền" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="number" class="uni-input-input"></div>
            <div style="margin-top:10px;padding:10px;border-radius:8px;width:100%;background:rgba(62, 76, 243, 0.06);border:1px solid rgba(62, 76, 243, 0.3);display:flex;justify-content:space-between;align-items:center">
               <div>Số dư tích kiệm</div>
                <div>{{number_format($wallet->deposit_money, 0, ',', '.')}} VND</div>
            </div>
            <div style="margin-top:10px;padding:10px;border-radius:8px;width:100%;background:rgba(62, 76, 243, 0.06);border:1px solid rgba(62, 76, 243, 0.3);display:flex;justify-content:space-between;align-items:center">
               <div>Số dư tài khoản</div>
                <div>{{number_format($customer->money, 0, ',', '.')}} VND</div>
            </div>
            <div class="mt-4">
               <button type="button" data-type="send" style="width:100%" class="btn btn-primary js-submit" id="">Nộp</button>
            </div>
         </div>
      </div>
      <div id="menu5" class="menulist mt-3">
         <div style="padding:15px;">
            <span style="font-size:18px;font-weight:bold">Rút tiền</span>
            <div style="padding:4px;border-radius:8px;width:100%;background:#f7f8fa"><input style="background:#f7f8fa !important;border:none;outline:none;width:100%" id="input-get" placeholder="Nhập số tiền" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="number" class="uni-input-input"></div>
            <div style="margin-top:10px;padding:10px;border-radius:8px;width:100%;background:rgba(62, 76, 243, 0.06);border:1px solid rgba(62, 76, 243, 0.3);display:flex;justify-content:space-between;align-items:center">
                <div>Số dư tích kiệm</div>
                <div>{{number_format($wallet->deposit_money, 0, ',', '.')}} VND</div>
            </div>
            <div style="margin-top:10px;padding:10px;border-radius:8px;width:100%;background:rgba(62, 76, 243, 0.06);border:1px solid rgba(62, 76, 243, 0.3);display:flex;justify-content:space-between;align-items:center">
                 <div>Số dư tài khoản</div>
                <div>{{number_format($customer->money, 0, ',', '.')}} VND</div>
            </div>
            <div class="mt-4">
               <button  type="button" data-type="get" style="width:100%" class="btn btn-primary js-submit" id="">Nộp</button>
            </div>
         </div>
      </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
       $('.js-show-tienrut').click(function(){
           $('.js-tienrut').click();
       })
       
        $('.js-show-tiengui').click(function(){
           $('.js-tiengui').click();
       })
       
       $('.js-submit').click(function(){
          let $type = $(this).attr('data-type');
          let $number = 0;
          if($type == "get"){
               $number = $('#input-get').val();
              
          } else if($type == "send"){
               $number = $('#input-send').val();
              
          }
          
          
          if($number == 0){
              toastr.error('Số tiền vui lòng lớn hơn 0');
          }else{
               $.ajax({
                    url:'/submitWallet',
                    type:'post',
                    data:{
                        type: $type,
                        number: $number,
                        _token : $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            window.location.href = '/earn';
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
          }
       });
       
       
       // Mặc định, hiển thị menu1 khi trang được tải
       $('#menu1').show();
   
       // Lắng nghe sự kiện click trên tất cả các phần tử có class item-chi-tiet
       $('.item-chi-tiet').click(function() {
           // Ẩn tất cả các menu
           $('.menulist').hide();
           // Loại bỏ class 'active' từ tất cả các phần tử item-chi-tiet
           $('.item-chi-tiet').removeClass('active');
           // Lấy id của menu được chọn từ thuộc tính data-target
           var targetId = $(this).attr('data-target');
           // Hiển thị menu được chọn
           $('#' + targetId).show();
           // Thêm class 'active' cho phần tử được chọn
           $(this).addClass('active');
           
   //         var activeItemPosition = $('.item-chi-tiet.active').position().left;
   
   // // Cuộn sang phải đến vị trí của phần tử item-chi-tiet.active
   //         $('#menu-container').animate({
   //             scrollLeft: activeItemPosition
   //         }, 500);
       });
   });
</script>
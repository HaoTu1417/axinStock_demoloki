@extends('layout.layout_auth')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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


         .list-cp{
            display:flex;
            flex-direction: column;
            width: 100%;
         }
         .item-cp{
            padding:18px;
            margin-bottom:12px;
            display:flex;
            background-color:#f6f6f6;
         }
         .item-cp img{
            width: 48px;
            height: 48px;
         }
         
.custom-select-container {
    width: 80%;
    margin-bottom: 20px;
}

.select2-container--default .select2-selection--single {
    height: 60px;
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
    background-color: white;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    padding-left: 20px;
    padding-right: 20px;
    line-height: normal;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 100%;
    right: 15px;
    display: flex;
    align-items: center;
    font-size: 25px;
    color: black;
}
.item-cp a{
    color: unset !important;
}
      </style>
   </head>
   <body>
        <div class="container homecontainer " style="background:#fff">
            <div class="header-default" style="display:flex;border-bottom:1px solid #ccc">
                <div  onclick="history.back()" style="flex:1;height: 50px;">
                    <i style="color:#fff"  class="icon-back bi bi-chevron-left"></i>
                </div>
                <div style="flex:1;color:#fff;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">
                Tạo một số giao dịch
                </div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                </div>
            </div>
            <div style="margin-top:20px;display:flex;justify-content:center;color:#ccc;flex-direction:column;align-items:center" >
                   <!-- <p>Chọn thị trường giao dịch</p>-->
                   <!--<div class="custom-select-container">-->
                   <!--     <select class="custom-select">-->
                   <!--         <option value="viet">Cổ phiếu việt</option>-->
                   <!--         <option value="my">Cổ phiếu mỹ</option>-->
                           
                   <!--     </select>-->
                   <!-- </div>-->

                    <p>Chọn loại tài khoản giao dịch</p>
                    
                    

                    <div class="list-cp list-cp-viet">
                        
                            <div class="item-cp" style="display:flex;justify-content:flex-start;align-items:center">
                            <img src="assets/images/dowload/icon_dayfund.png">
                            <a href="{{route('hangngay')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hàng ngày</p>
                                <span style="width: auto;
    white-space: normal;">
                                    Tự động gia hạn | Lãi suất thấp chỉ 0.075%
                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold;margin-left:auto"></i>
                            
                        </div>
                        
                        
                        <div class="item-cp" style="display:flex;;align-items:center">
                            <img src="assets/images/dowload/icon_freefund.png">
                            <a href="{{route('mienphi')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Miễn phí</p>
                                <span style="width: auto;
    white-space: normal;">
                                    Nền tảng miễn phí và cung cấp đòn bẩy cho bạn đến 10 lần để bạn giao dịch.
                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="margin-left:auto;font-size:18px;font-weight:bold"></i>
                            
                        </div>
                        
                     
                        
                         <div class="item-cp" style="display:flex;align-items:center">
                            <img src="assets/images/dowload/icon_weekfund.png">
                            <a href="{{route('hangtuan')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold;">Hàng tuần</p>
                                <span style="width: auto;
    white-space: normal;">
Tự động gia hạn | Lãi suất thấp chỉ 0.3%                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold;margin-left:auto"></i>
                            
                        </div>
                        
                        
                         <div class="item-cp" style="display:flex;align-items:center">
                            <img src="assets/images/dowload/icon_monthfund.png">
                            <a href="{{route('hangthang')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hàng tháng</p>
                                <span style="width: auto;
    white-space: normal;">
                                   Tự động gia hạn | Lãi suất thấp chỉ 1.05%
                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold;margin-left:auto"></i>
                            
                        </div>
                        
                        
                         <div class="item-cp" style="display:flex;align-items:center">
                            <img src="assets/images/dowload/icon_nofeefund.png">
                            <a href="{{route('mienlai')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Miễn lãi</p>
                                <span style="width: auto;
    white-space: normal;">
                                    Miễn phí giao dịch và không thể gia hạn
                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold;margin-left:auto"></i>
                            
                        </div>
                        
                        
                         <div class="item-cp" style="display:flex;align-items:center">
                            <img src="assets/images/dowload/icon_vipfund.png">
                            <a href="{{route('vip')}}" style="text-decoration:none;margin-left:8px">
                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">VIP</p>
                                <span style="width: auto;
    white-space: normal;">
                                    Tự động gia hạn | Lãi suất thấp chỉ 1%
                                </span>
                                
                            </a>
                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold;margin-left:auto"></i>
                            
                        </div>
                    </div>

                    <div class="list-cp list-cp-my" style="display:none">
    
<!--      <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="https://vnf7.com/static/img/anfin/icon_freefund.png">-->
<!--                            <a href="{{route('mienphi')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Miễn phí</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--                                    Nền tảng miễn phí và cung cấp đòn bẩy cho bạn đến 10 lần để bạn giao dịch.-->
<!--                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
                        
<!--                          <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="assets/images/dowload/icon_nofeefund.png">-->
<!--                            <a href="{{route('mienlai')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Miễn lãi</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--                                    Miễn phí giao dịch 10 ngày và không thể gia hạn-->
<!--                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
                        
                        
    
<!--                            <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="assets/images/dowload/icon_dayfund.png">-->
<!--                            <a href="{{route('hangngay')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hàng ngày</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--                                    Tự động gia hạn | Lãi suất thấp chỉ 0.075%-->
<!--                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
                        
                        
                      
                        
                     
                        
<!--                         <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="assets/images/dowload/icon_weekfund.png">-->
<!--                            <a href="{{route('hangtuan')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hàng tuần</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--Tự động gia hạn | Lãi suất thấp chỉ 0.3%                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
                        
                        
<!--                         <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="assets/images/dowload/icon_monthfund.png">-->
<!--                            <a href="{{route('hangthang')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hàng tháng</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--                                   Tự động gia hạn | Lãi suất thấp chỉ 1.05%-->
<!--                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
                        
                        
                     
                        
                        
<!--                         <div class="item-cp" style="display:flex;justify-content:space-between;align-items:center">-->
<!--                            <img src="assets/images/dowload/icon_vipfund.png">-->
<!--                            <a href="{{route('vip')}}" style="text-decoration:none;margin-left:8px">-->
<!--                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">VIP</p>-->
<!--                                <span style="width: auto;-->
<!--    white-space: normal;">-->
<!--                                    Tự động gia hạn | Lãi suất thấp chỉ 1%-->
<!--                                </span>-->
                                
<!--                            </a>-->
<!--                            <i class="bi bi-chevron-right"style="font-size:18px;font-weight:bold"></i>-->
                            
<!--                        </div>-->
<!--                    </div>-->

            </div>
        </div>
   </body>
</html>


<script>
$(document).ready(function() {
    $('.custom-select').on('change', function() {
        var value = $(this).val();
        if (value === 'viet') {
            $('.list-cp-my').hide();
            $('.list-cp-viet').show();
        } else if (value === 'my') {
            $('.list-cp-viet').hide();
            $('.list-cp-my').show();
        }
    });
});
$(document).ready(function() {
    $('.custom-select').select2({
        width: '100%',
        minimumResultsForSearch: Infinity // Ẩn thanh tìm kiếm
    });
});
</script>
@endsection
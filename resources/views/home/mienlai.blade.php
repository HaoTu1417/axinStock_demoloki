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
.item-chi-tiet {
            padding: 8px;
            cursor: pointer;
            margin-right: 10px;
            padding-bottom:10px;
            color:#959595;
            font-size: 18px;
            white-space: nowrap;
        }

        /* Thêm CSS để chỉnh kiểu cho phần tử được chọn */
        .item-chi-tiet.active {
            font-weight: bold;
            color: blue;
            border-bottom:2px solid blue;

        }

        /* Thêm CSS để ẩn các menu mặc định khi trang tải */
        #menu1, #menu2,#menu3,#menu4,#menu5,#menu6 {
            display: none;
        }
        
        #menu-container::-webkit-scrollbar {
    display: none;
}

.custom-select-container {
    width: 100%;
    margin-bottom: 20px;
    margin-top: 15px;
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



/* Ẩn thanh cuộn trong các trình duyệt không dựa trên WebKit */
#menu-container {
    overflow: -moz-scrollbars-none;
    -ms-overflow-style: none;
    scrollbar-width: none;
}
    th{
        color:#959595 !important;
        text-align: end;
    }
    .item-price{
        width: 30%;
    }
    .item-price.active{
        color:rgb(62, 76, 244) !important;
        border:1px solid rgb(62, 76, 244) !important;
        background: #ebedfe !important;
    }
  </style>
    <div class="container homecontainer " style="background:#fff">
        <div class="header-default" style="display:flex;background:rgb(62, 76, 244) !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#fff"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#fff;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Đơn tài khoản hợp đồng</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        
        <div style="margin-top:20px;padding:15px;">
            <div class="d-flex" style="margin-bottom:15px;align-items:center;padding:12px;background-color:rgb(246, 246, 255)">
                <img src="assets/images/dowload/icon_nofee01.png" style="width:50px;height:50px;margin-right:4px"> 
                <div style="flex:1">Cố định đòn bảy <span style="color:red;font-weight:bold;margin-left:4px"><?= $quantity ?> lần</span></div>
            </div>
            <div class="d-flex" style="margin-bottom:15px;align-items:center;padding:12px;background-color:rgb(246, 246, 255)">
                <img src="assets/images/dowload/icon_nofee03.png" style="width:50px;height:50px;margin-right:4px"> 
                <div style="flex:1">Lợi nhuận <span style="color:red;margin:0 4px">80%</span>tặng bạn</div> 
            </div>
        </div>
        
        <div style="margin-top:20px;padding:15px;">
            <span style="color:#333;font-size:18px">Nhập số tiền ký quỹ (VND)</span>
            <div class="list-item-price mt-3 " style="display:flex;flex-wrap: wrap;justify-content:space-between">
                <div class="item-price active" data-price="2000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      2.000.000
                </div>
                <div class="item-price " data-price="5000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      5.000.000
                </div>
                <div class="item-price " data-price="20000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      20.000.000
                </div>
                <div class="item-price " data-price="50000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      50.000.000
                </div>
                
                 <div class="item-price " data-price="100000000" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      100.000.000
                </div>
                
                <div class="item-price js-item-price-other" data-price="0" style="color:#333;margin-right:8px;text-align:center;margin-bottom:10px;padding:4px 0px;border:1px solid #ccc;border-radius:4px;cursor:pointer">
                      Khác
                </div>
            </div>
            
             <div class="js-other" style="display:none;flex-direction:column;margin-top:15px;width:100%;padding:0px 5px">
                <div class="" style="padding:10px 0;color:#333;border-radius:4px;background:#f7f8fa;position:relative">
                <input placeholder="Nhập số tiền ký quỹ" id="inputPriceOther" type="number" style="background:#f7f8fa;width:90%;margin-left:10px;border:none;outline:none">
                    
                   </div>
                   <div style="display:flex;justify-content:center;margin-top:15px;color:#ccc;">0 VND</div>
             </div>
             
             

          
            
        
              <div class="mt-4">
                   <button type="button" style="width:100%;background:rgb(62, 76, 244)" class="btn btn-primary btnCreateWallet">Bước tiếp</button>
               </div>
         </div>
    </div>
   
@endsection

@section('script')


<script>$(document).ready(function() {
    $('.js-item-price-other').on('click', function() {
        var otherContainer = $('.js-other');
        if (otherContainer.css('display') === 'none') {
            otherContainer.css('display', 'flex');
        } else {
            otherContainer.css('display', 'none');
        }
    });
      $(document).ready(function() {
            $('.item-price').on('click', function() {
                var $listItemPrice = $(this).closest('.list-item-price');
                $listItemPrice.find('.item-price').removeClass('active');
                $(this).addClass('active');
            });
        });
        
    $('.btnCreateWallet').click(function(){
        var price = $('.item-price.active').data('price');
        if(price == 0){
            price = $('#inputPriceOther').val();
        }
        $.ajax({
           url: '/debtfree10',
           type:'post',
           data:{
               price : price,
               _token: $('#csrf').val()
           },
           success: function(res){
               if(res.status){
                   toastr.success(res.message);
                   window.location.href = '/account';
               }
               else{
                   toastr.error(res.message);
               }
           }
        });
    })
    $(document).ready(function() {
    $('.custom-select').select2({
        width: '100%',
        minimumResultsForSearch: Infinity // Ẩn thanh tìm kiếm
    });
});
});</script>
@endsection

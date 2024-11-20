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
    <div class="container homecontainer "
    style="background:#e8f0fe">
    <div class="header-default" style=";background-color:#dfebfb;border:none !important">
        <a href="#" onclick="history.back()" style="flex:1;height: 50px;">
            <i style="color:#333" class="icon-back bi bi-chevron-left"></i>
        </a>
    </div>
    <div class="d-flex"
        style="padding:15px;background-color:#dfebfb;justify-content:center;align-items:flex-start;flex-direction:column">
        <span style="margin-bottom:10px;font-size:20px;font-weight:bold;color:#333;">Miễn Phí Trải Nghiệm Phân Bổ Vốn</span>
        <div style="">Tháng lợi đều thuộc về bạn</div>
    </div>
    <div
        style="margin:0 15px;background:#fff;border-radius:15px;width;100%;padding:18px;margin-top:20px">
        <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:10px;display:flex;justify-content:flex-start;align-items:center;margin:10px">
            <div style="width: 27px;
            height: 27px;
            background: linear-gradient(0deg, #8ba1fc, #6f80f6);
            border-radius: 13px;
            font-size: 14px;
            font-family: Microsoft YaHei;
            font-weight: 700;
            color: #fff;
            margin-right: 10px;display:flex;justify-content:center;align-items:center">
                1
            </div>
                Chào mừng !, <?= $information->username ?>
        </div>
        
        
         <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:10px;display:flex;justify-content:flex-start;align-items:center;margin:10px">
            <div style="width: 27px;
            height: 27px;
            background: linear-gradient(0deg, #8ba1fc, #6f80f6);
            border-radius: 13px;
            font-size: 14px;
            font-family: Microsoft YaHei;
            font-weight: 700;
            color: #fff;
            margin-right: 10px;display:flex;justify-content:center;align-items:center">
                2
            </div>
                <div style="flex:1">
                    Nạp <span style="color:red;margin:0 4px">1000000</span> VND đồng khi kết thúc số tiền gốc sẽ được trả lại
                </div>
        </div>
        
        
         <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:10px;display:flex;justify-content:flex-start;align-items:center;margin:10px">
            <div style="width: 27px;
            height: 27px;
            background: linear-gradient(0deg, #8ba1fc, #6f80f6);
            border-radius: 13px;
            font-size: 14px;
            font-family: Microsoft YaHei;
            font-weight: 700;
            color: #fff;
            margin-right: 10px;display:flex;justify-content:center;align-items:center">
                3
            </div>
                <div style="flex:1">
                    Hệ thống miễn phí cung cấp cho bạn 10 lần đòn bẩy <br>Xuất vốn  <span style="color:red;margin:0 4px">1000000</span> VND，để bạn giao dịch ，hoàn toàn miễn phí !
                </div>
        </div>
        
        
         <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:10px;display:flex;justify-content:flex-start;align-items:center;margin:10px">
            <div style="width: 27px;
            height: 27px;
            background: linear-gradient(0deg, #8ba1fc, #6f80f6);
            border-radius: 13px;
            font-size: 14px;
            font-family: Microsoft YaHei;
            font-weight: 700;
            color: #fff;
            margin-right: 10px;display:flex;justify-content:center;align-items:center">
                4
            </div>
                <div style="flex:1">
                    Tài khoản sẽ cho bạn giao dịch trong    <span style="color:red;margin:0 4px">2</span> ngày，ngày giao dịch thứ hai bán ra trước lúc đóng phiên 14:30 phút!
                </div>
        </div>
        
         <div
            style="background:rgb(246, 247, 255);padding:8px;border-radius:10px;display:flex;justify-content:flex-start;align-items:center;margin:10px">
            <div style="width: 27px;
            height: 27px;
            background: linear-gradient(0deg, #8ba1fc, #6f80f6);
            border-radius: 13px;
            font-size: 14px;
            font-family: Microsoft YaHei;
            font-weight: 700;
            color: #fff;
            margin-right: 10px;display:flex;justify-content:center;align-items:center">
                5
            </div>
                <div style="flex:1">
                    Lợi nhuận    <span style="color:red;margin:0 4px">100%</span> n tiền lãi thuộc về bạn ，Thua lỗ hệ thống chịu thiệt hại
                </div>
        </div>
        
      
    </div>
    <div style="margin:0 15px;margin-top:30px;background:#e76277;color:#fff;padding:12px;color:white;border-radius:10px;display:flex;justify-content:center;align-items:center; cursor: pointer" class="btnCreateWallet">
            Băt đầu giao dịch ngay</div>
</div>
@endsection

@section('script')

<script>
$(document).ready(function() {
    $('.js-item-price-other').on('click', function() {
        var otherContainer = $('.js-other');
        if (otherContainer.css('display') === 'none') {
            otherContainer.css('display', 'flex');
        } else {
            otherContainer.css('display', 'none');
        }
    });
    $('.btnCreateWallet').click(function(){
        var price = $('.item-price.active').data('price');
        if(price == 0){
            price = $('#inputPriceOther').val();
        }
        $.ajax({
           url: '/debttrial',
           type:'post',
           data:{
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
            $('.item-price').on('click', function() {
                var $listItemPrice = $(this).closest('.list-item-price');
                $listItemPrice.find('.item-price').removeClass('active');
                $(this).addClass('active');
            });
        });
    $(document).ready(function() {
    $('.custom-select').select2({
        width: '100%',
        minimumResultsForSearch: Infinity // Ẩn thanh tìm kiếm
    });
});
});</script>
@endsection

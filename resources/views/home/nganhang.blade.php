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
  </style>


    <div class="container homecontainer " style="background:#fff">
        <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Ngân hàng</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        
        <div style="margin-top:20px;padding:15px;">
            @if($bank->count() > 0)
            @foreach($bank as $item)
                <div class="d-flex mt-4" style="padding:12px;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);align-items:center;justify-content:space-between;width:100%">
                    <div class="">
                        <span style="font-size:20px;font-weight:bold">
                            {{$item->bank_name}}
                        </span>
                        <br>
                         <span style="font-size:16px;font-weight:400">                        {{$item->bank_account}}
    </span>
                        <br>
                        VND
                        <br>
                       @php
                            $maskedBankNumber = '********' . substr($item->bank_number, -4);
                        @endphp
                        
                        <span style="font-size:16px;font-weight:400">
                            {{ $maskedBankNumber }}
                        </span>
                    </div>
                    <div>
                        <div data-id="{{$item->id}}" class="js-delete-bank" style="cursor:pointer;padding:8px;border-radius:6px 10px;color:red;border:1px solid red">Xóa</div>
                    </div>
                </div>
                @endforeach
            @else   
            
             <div class="d-flex" style="padding:12px;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);align-items:center;justify-content:space-between;width:100%">
                Bạn chưa có thẻ nào
            </div>
            
       @endif 
        </div>
        <div class="mt-4">
            <button type="button" onclick="document.location.href='/addbank'" style="width:100%" class="btn btn-primary">Thêm thẻ</button>
       </div>

    </div>
   
@endsection

@section('script')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mặc định, hiển thị menu1 khi trang được tải
            $('#menu1').show();
            
            $('.js-delete-bank').click(function() {
                 $.ajax({
                    url:'/deleteBankInfo',
                    type:'get',
                    data:{
                        id: $(this).data('id'),
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            window.location.href = '/banking';
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            });

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
                
                var activeItemPosition = $('.item-chi-tiet.active').position().left;
        
        // Cuộn sang phải đến vị trí của phần tử item-chi-tiet.active
                $('#menu-container').animate({
                    scrollLeft: activeItemPosition
                }, 500);
            });
        });
    </script>
@endsection


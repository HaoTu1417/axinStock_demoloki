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
            flex:1;
            padding-bottom:10px;
            color:#959595;
            font-size: 18px;
            white-space: nowrap;
        }

        /* Thêm CSS để chỉnh kiểu cho phần tử được chọn */
        .item-chi-tiet.active {
            /*font-weight: bold;*/
            color: blue;
            border-bottom:1px solid blue;

        }

        /* Thêm CSS để ẩn các menu mặc định khi trang tải */
        #menu1, #menu2,#menu3,#menu4,#menu5,#menu6 {
            display: none;
        }
        
        #menu-container::-webkit-scrollbar {
    display: none;
}
#menu-container{
    display: :flex;
    justify-content: space-between;
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
    .flex-container {
    display: flex;
    flex-direction: column;
    padding-right: 10px;
}

.flex-container > span {
    max-width: 200px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
  </style>

    <div class="container homecontainer " style="background:#fff">
        <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Trung tâm tin nhắn</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  <img onclick="document.location.href='/report'" src="assets/images/dowload/icon_news_bj.png" style="width:19px;height:20px" draggable="false">
                </div>
        </div>
        
           <div id="menu-container" style="display:flex;width:auto;overflow:auto">
            <div class="item-chi-tiet active" data-target="menu1">
                <img src="assets/images/dowload/icon_gonggao.png" style="width:36px;height:36px;margin-right:10px">
                Thông báo
            </div>
            <div class="item-chi-tiet" data-target="menu2">
                <img src="assets/images/dowload/icon_zhanneixin.png"  style="width:36px;height:36px;margin-right:10px">
                Email
            </div>
            
        </div>
    
        <div id="menu1" class="menulist mt-2">
            @foreach($reports as $item)
            <div class="item-toast" style="cursor:pointer;border-bottom: 1px solid #ccc;padding: 18px 21px;">
                <div style="display: flex;
                    justify-content: space-between;
                    color: #333;
    
                    font-size: 16px;
                    ">
                    <img src="assets/images/dowload/icon_news_wdxx.png" style="width:48px;height:48px;margin-right:0px">
                    <div class="flex-container" style="display:flex;flex-direction:column">
                        <span style="font-size:18px;font-weight:500">Khiếu nại số: {{$item->id}}</span>
                        <span style="color:#959595">{{$item->title}}</span>
    
                    </div>
                    <div style="color:#bebebe;font-size:13px;white-space:nowrap;text-align:end">
                        {{$item->created_at}} <br>
                        @if($item->status == 0)
                            <span style="color:blue">Mới</span>
                        @else
                                                    <span style="color:green">Đã phản hồi</span>
@endif
                    </div>
                   
                </div>
                 <div class="show-toast" style="margin-top:15px;display:none">
                    {{$item->title}}
                    <div style="color:#bebebe;font-size:13px;white-space:nowrap">
                        {{$item->created_at}}    
                    </div>
                    <br>
                    <div style="font-size:14px"><strong>Trạng thái:</strong>
                        @if($item->status == 0)
                            <span style="color:blue">Mới</span>
                        @else
                                                    <span style="color:green">Đã phản hồi</span>
@endif
                    </div>
                    <div style="font-size:14px"><strong>Nội dung:</strong> {{$item->description}}</div>
                    <div style="font-size:14px"><strong>Phản hồi:</strong> {{$item->note}}</div>

                </div>
            </div>
            @endforeach
            
            
            
            
            
            
            
        </div>
    
        <div id="menu2" class="menulist mt-2">
             <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
        </div>
     
    
   
    </div>
   

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
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
                
                var activeItemPosition = $('.item-chi-tiet.active').position().left;
        
        // Cuộn sang phải đến vị trí của phần tử item-chi-tiet.active
                $('#menu-container').animate({
                    scrollLeft: activeItemPosition
                }, 500);
            });
        });
    </script>
    
<script>
    $(document).ready(function() {
        $(".item-toast").click(function() {
            var showToast = $(this).find(".show-toast");
            if (showToast.is(":hidden")) {
                $(".show-toast").hide(); // Ẩn tất cả các phần tử .show-toast khác nếu đang hiển thị
                showToast.show(); // Hiển thị phần tử .show-toast tương ứng
            } else {
                showToast.hide(); // Ẩn phần tử .show-toast nếu đang hiển thị
            }
        });
    });
</script>
@endsection


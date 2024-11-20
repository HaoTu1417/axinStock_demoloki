<!DOCTYPE html>
<html lang="en">

<head>
  <title>VNF7</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
</head>

<body>
    <div class="container homecontainer " style="background:#fff">
        <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Lịch sử giao dịch</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        
           <div id="menu-container" style="display:flex;width:auto;overflow:auto">
            <div class="item-chi-tiet active" data-target="menu1">
                Toàn bộ
            </div>
            <div class="item-chi-tiet" data-target="menu2">
                Nạp
            </div>
            
             <div class="item-chi-tiet" data-target="menu3">
                Rút
            </div>
            
            <!-- <div class="item-chi-tiet" data-target="menu4">-->
            <!--    Đóng bằng-->
            <!--</div>-->
            
            <!-- <div class="item-chi-tiet" data-target="menu5">-->
            <!--    Giao dịch-->
            <!--</div>-->
            
            <div class="item-chi-tiet" data-target="menu6">
                Gửi tiết kiệm
            </div>
            <div class="item-chi-tiet" data-target="menu7">
                Ký quỹ
            </div>
        </div>
    
        <div id="menu1" class="menulist mt-2">
           <table class="table">
              <thead>
                <tr>
                  <th style="text-align:center;font-size:13px" scope="col">Thời gian</th>
                  <th style="text-align:center;font-size:13px" scope="col">Phân loại</th>
                  <th style="text-align:center;font-size:13px" scope="col">Thay đổi số dư</th>
                </tr>
              </thead>
              <tbody>
                @foreach($history as $each)
                    @php
                        $difference = $each->afters - $each->befores;
                        $formattedDifference = number_format($difference, 0, ',', '.') . ' VND';
                    @endphp
                    <tr>
                        <td style="text-align:center;font-size:13px;width:100px" scope="col">{{ $each->created_at }}</td>
                        <td style="text-align:center;font-size:13px" scope="col">{{ $each->note }}</td>
                        @if($difference > 0)
                            <td style="text-align:end;font-size:13px;color:green" scope="col">
                                + {{ $formattedDifference }}
                            </td>
                        @else
                            <td style="text-align:end;font-size:12px;color:red" scope="col">
                                {{ $formattedDifference }}
                            </td>
                        @endif
                    </tr>
                @endforeach
              </tbody>
            </table>
            @if($history->count() == 0 )
            <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
            @endif
        </div>
        <div id="menu2" class="menulist">
              <table class="table">
              <thead>
                <tr>
                  <th style="text-align:center;font-size:13px" scope="col">Thời gian</th>
                  <th style="text-align:center;font-size:13px" scope="col">Số tiền nạp</th>
                  <th style="text-align:center;font-size:13px" scope="col">Trạng thái</th>
                  <!-- <th style="text-align:center;font-size:13px" scope="col">Note</th> -->

                </tr>
              </thead>
              <tbody>
                @php($demnap =0 )
                @foreach($transfers as $each)
                    @if($each->type == 1)
                    @php($demnap++)
                    <tr>
                        <td style="text-align:center;font-size:13px;width:100px" scope="col">{{ $each->created_at }}</td>
                            <td style="text-align:center;font-size:13px;color:green" scope="col">
                                {{ number_format($each->money, 0, ',', '.') . ' VND' }}
                            </td>
                        <td style="text-align:center;font-size:13px" scope="col">
                            @if($each->status == 0)
                              <span style="color:blue">Mới</span>

                            @elseif($each->status ==1)
                              <span style="color:green">Thành công</span>

                            @else
                                <span style="color:red">Hủy</span>
                            @endif
                        </td>
                        <!-- <td style="text-align:center;font-size:13px" scope="col">{{$each->note}}</td> -->
                    </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
            @if($demnap == 0 )
            <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
            @endif
        </div>
         <div id="menu3" class="menulist">
                 <table class="table">
              <thead>
                <tr>
                  <th style="text-align:center;font-size:13px" scope="col">Thời gian</th>
                  <th style="text-align:center;font-size:13px" scope="col">Số tiền rút</th>
                  <th style="text-align:center;font-size:13px" scope="col">Trạng thái</th>
                  <th style="text-align:center;font-size:13px" scope="col">Note</th>

                </tr>
              </thead>
              <tbody>
                @php($demrut =0 )
                @foreach($transfers as $each)
                    @if($each->type == 2)
                    @php($demrut++)
                    <tr>
                        <td style="text-align:center;font-size:13px;width:100px" scope="col">{{ $each->created_at }}</td>
                            <td style="text-align:start;font-size:13px;color:red" scope="col">
                                {{ number_format($each->money, 0, ',', '.') . ' VND' }}
                            </td>
                        <td style="text-align:center;font-size:13px" scope="col">
                            @if($each->status == 0)
                              <span style="color:blue">Mới</span>

                            @elseif($each->status ==1)
                              <span style="color:green">Đã duyệt</span>

                            @else
                                <span style="color:red">Hủy</span>
                            @endif
                        </td>
                        <td style="text-align:center;font-size:13px" scope="col">{{$each->note}}</td>
                    </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
            @if($demrut == 0 )
            <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
            @endif
        </div>
         <div id="menu4" class="menulist">
             <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
        </div>
         <div id="menu5" class="menulist">
              <table class="table">
              <thead>
                <tr>
                  <th style="text-align:center;font-size:13px" scope="col">Thời gian</th>
                  <th style="text-align:center;font-size:13px" scope="col">Thông tin</th>
                  <th style="text-align:center;font-size:13px" scope="col">Chi phí</th>
                  <th style="text-align:center;font-size:13px" scope="col">Trạng thái</th>

                </tr>
              </thead>
              <tbody>
                @php($demnap =0 )
                @foreach($orders as $each)
                    @if($each->type == 1)
                    @php($demnap++)
                    <tr>
                        <td style="text-align:center;font-size:13px;width:100px" scope="col">{{ $each->match_at }}</td>
                            <td style="text-align:start;font-size:13px;" scope="col">
                                -- Cố phiếu:<br> <strong style="text-align:center">{{ $each->stock }}</strong><br>
                                -- Số lượng: <br> <strong style="text-align:center">{{ $each->quantity }}</strong><br>
                               
                            </td>
                        <td style="text-align:start;font-size:13px" scope="col">
                            -- Giá trị: <br> <strong>{{ number_format($each->prices * $each->quantity, 0, ',', '.') . ' VND' }} </strong> 
                            <br>-- Phí:  <br><strong>{{ number_format($each->fee, 0, ',', '.') . ' VND' }}</strong> 
                            </td>
                        <td style="text-align:start;font-size:13px" scope="col">
                            @if($each->status == 0)
                              <span style="color:blue">chưa khớp</span>

                            @elseif($each->status ==1)
                              <span style="color:green">Đã khớp</span>
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
            @if($demnap == 0 )
            <div class="d-flex" style="justify-content:center;align-items:center;flex-direction:column;color:#959595">
                <i style="font-size:40px" class="bi bi-newspaper"></i>
                <span>Không thêm dữ liệu</span>
            </div>
            @endif
        </div>
         <div id="menu6" class="menulist">
              @if($history_wallet->count() > 0 )
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
                    @foreach($history_wallet as $each)
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
        <div id="menu7" class="menulist">
              @if($history_debt->count() > 0 )
           <table class="table table-striped table-bordered">
                <tbody>
                    @foreach($history_debt as $each)
                        <tr>
                            <td>
                                Loại hợp đồng
                                <br/>
                                Đòn bẩy
                                <br/>
                                Số tiền cọc
                                <br/>
                                Lãi xuất
                                <br/>
                                Trạng thái
                                </br/>
                                Ghi chú
                            </td>
                            <td>
                                <?php 
                                if($each->type == 1){
                                    echo 'Hàng ngày';
                                }
                                else if($each->type == 2){
                                    echo 'Miễn phí';
                                }
                                else if($each->type == 3){
                                    echo 'Hàng tuần';
                                }
                                else if($each->type == 4){
                                    echo 'Hàng tháng';
                                }
                                else if($each->type == 5){
                                    echo 'Miễn lãi';
                                }
                                else{
                                    echo 'VIP';
                                }
                                ?>
                                <br/>
                                <?= $each->money / $each->deposit ?>
                                <br/>
                                <?= number_format($each->deposit) ?>
                                <br/>
                                <?= $each->percent ?>%
                                <br/>
                                <?= $each->status == 0 ? 'Chờ duyệt' : 'Từ chối' ?>
                                <br/>
                                <?= $each->note ?>
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
   
    </div>
   
</body>

</html>


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

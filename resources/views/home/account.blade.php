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
    .list-cp{
        width: 100% !important;
        margin-top: 20px;
    }
    .item-cp{
        width: 100% !important;
        margin-right: 0px !important;
    }
    .item-cp img{
        width: 40px;
    }
  </style>

    <div class="container homecontainer"
    style="background:#dfebfb">
    <div class="header-default" style="display:flex;font-size:20px;font-weight:bold;justify-content:center;background-color:#dfebfb;border:none !important">
       Danh sách hợp đồng
    </div>
    <div class="d-flex"
        style="height:80vh;padding:15px;background-color:#dfebfb;justify-content:flex-start;align-items:flex-start;flex-direction:column">
        <a href="{{route('accountAfter')}}" style="text-decoration:none;;background: rgb(195, 209, 251);
    color: rgb(57, 63, 108);
    font-weight: 500;cursor:pointer;
    font-size: 18px;
    padding: 6px 18px;
    overflow: visible;width:100%;border-radius:30px">
            Yêu cầu hợp đồng cho bạn  <i style="float:right;color:#fff;padding:6px 6px;text-align:center;font-size:14px;border-radius:50%;background:linear-gradient(0deg,#d59511,#fcec94)"  class=" bi bi-chevron-right"></i>

        </a>
        <div style="width: 100%;
    justify-content: flex-end;
    padding: 10px 18px;
    color: green;
    display: flex;
    float: inline-end;flex-direction:column;">Phí quản lý: <?= number_format($customer['fee_manager']) ?><br><span style="color:#333;font-size:10px">(Phi quản lý là phí có thể sử dụng thay thế tiền để gia hạn hợp đồng)</span></div>
        <div class="list-cp list-cp-viet">
                        
                        <?php if($wallets != null && count($wallets) > 0){ 
                                foreach($wallets as $item) { ?>
                                    <div class="item-data" style="border: 1px solid #ccc; background-color:#fff; border-radius:8px; margin-bottom: 10px">
                                        <div class="item-cp js-item-data" style="display:flex;justify-content:space-between;align-items:center; margin: 0; background-color:#fff">
                                            <img src="<?= $item['image'] ?>">
                                            <a href="javascript:;" style="text-decoration:none;margin-left:8px; min-width:200px">
                                                <p style="margin-bottom:4px;font-size:18px;font-weight:bold">Hợp đồng: <?=  $item['name'] ?></p>
                                                <span style="width: auto;
                    white-space: normal;">
                                                    Số tiền: <?= number_format($item['money']) ?>
                                                </span>
                                                
                                            </a>
                                            <i class="bi bi-chevron-right" style="font-size:18px;font-weight:bold"></i>
                                            
                                        </div>
                                        <div class="detail-info" style="padding:8px;border-bottom:1px solid #ccc;border-radius:8px;display:none">
                                            <div class="" style="width:100%;display:flex;justify-content:space-between">
                                                <div style="background-color:#f3f6f9;padding:15px;border-radius:4px 8px;width:100%;display:flex;flex-direction:column;justify-content:space-between">
                                                    <div style="display:flex;justify-content:space-between;width:100%">
                                                        <span style="color:#333">Thời gian GD</span>
                                                        <div style="color:black;font-weight:bold"><?= $item['next_at'] ?> đên <?= \Carbon\Carbon::parse($item['next_at'])->addDays($item['exp_daynum'])->format("d-m-Y") ?></div>
                                                    </div>
                                                    <div style="display:flex;justify-content:space-between;width:100%">
                                                        <span style="color:#333">Lãi suất</span>
                                                        <div style="color:black;font-weight:bold"><?= $item['percent'] ?>%</div>
                                                    </div>
                                                    <div style="display:flex;justify-content:space-between;width:100%">
                                                        <span style="color:#333">Số tiền cọc</span>
                                                        <div style="color:black;font-weight:bold"><?= number_format($item['deposit']) ?></div>
                                                    </div>
                                                    <div style="display:flex;justify-content:space-between;width:100%">
                                                        <span style="color:#333">Số tiền vay</span>
                                                        <div style="color:black;font-weight:bold"><?= number_format($item['money']) ?></div>
                                                    </div>
                                                    <div style="display:flex;justify-content:space-between;width:100%">
                                                        <span style="color:#333">Trạng thái</span>
                                                        <div style="color:black;font-weight:bold"><?= $item['status_name'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($item['status'] == 1){ 
                                                if($item['type'] != 5 && $item['type'] != 2){ ?>
                                                    <!--<div class=" mt-2" style="width:100%">-->
                                                    <!--    <a style="width: 100%;font-size:14px" onclick="isAuto(<?= $item['id'] ?>,<?= $item['is_auto'] == 1 ? 0 : 1 ?>)" class="btn btn-<?= $item['is_auto'] == 1 ? 'danger' : 'success' ?>"><?= $item['is_auto'] == 1 ? 'Tắt gia hạn tự động' : 'Bật gia hạn tự động' ?></a>-->
                                                    <!--</div>-->
                                                <?php } ?>
                                                <div class=" mt-2" style="width:100%">
                                                    <a style="width: 100%;font-size:14px" onclick="payDebt(<?= $item['id'] ?>)" class="btn btn-danger">Thu hồi hợp đồng</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                        <?php } } ?>
                    </div>
    </div>
    
    <!--<div class="" style="padding:15px;float:end">-->
    <!--               <button type="button" style="width:100%;color:#a29595;background:#fff;border-radius:8px;border:none" class="btn btn-primary">Hiển thị hoàn thành giao dịch</button>-->
    <!--           </div>-->
   
     
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        function showModal() {
            $('.modal-first').css('display', 'flex').hide().fadeIn();
            $("body").css('overflow', 'hidden');
        }
        $('.js-item-data').on('click', function () {
            var detailInfo = $(this).closest('.item-data').find('.detail-info');
            detailInfo.slideToggle(300);
        });
        $('.js-show-detail').on('click', function () {
            var detailInfo = $(this).closest('.item-data').find('.detail-info');
            detailInfo.slideToggle(300);
        });
    });
    function isAuto(id, type){
        if(confirm('Bạn có muốn '+(type == 1 ? 'gia hạn tự động' : 'huỷ gia hạn tự động')+' hợp đồng này không?')){
                $.ajax({
                    url : '/isauto',
                    type:'post',
                    data:{
                        id : id,
                        type: type,
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            window.location.reload();
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            }
        }
    function payDebt(id){
            if(confirm('Bạn có muốn thanh toán khoản vay này không?')){
                $.ajax({
                    url : '/paydebt',
                    type:'post',
                    data:{
                        id : id,
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            toastr.success(res.message);
                            window.location.reload();
                        }
                        else{
                            toastr.error(res.message);
                        }
                    }
                })
            }
        }
</script>
@endsection

   



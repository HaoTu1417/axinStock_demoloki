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
  </style>




<div class="container homecontainer js-container-support" style="background:#fff;">
  <div class="header-default" style="align-items:flex-start;background-image: url(https://vnf7.com/static/img/anfin/bg_task.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;height:192px;flex-direction:column;justify-content:flex-start">
           <a href="#" onclick="history.back()" style="height: 50px;">
               <i style="color:#fff"  class="icon-back bi bi-chevron-left"></i>
            </a>
            <div style="padding:10px 30px">
                <span style="color:white;font-size:22px;font-weight:bold">Nhiệm vụ</span><br>
                                <span style="color:white;font-size:16px;font-weight:bold">Hoàn thành nhiệm vụ tân thủ miễn phí nhận tiền mặt</span>

            </div>
  </div>
  <div class="d-flex" style=" margin-top: -20px;
    border-top-left-radius: 36px;
    bottom: 30px;
    padding-left: 36px;
    padding: 10px;
    background-color: #fff;
    flex-direction: column;height:100vh">
    <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task01.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">01 Đã đăng ký</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+50.000 VND</span>
            </div>
            <div style="background: rgb(255, 210, 180);
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đã hoàn thành
            </div>
        </div>
    </div>
    
  
    
    <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task02.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">02 Đi xác minh</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+50.000 VND</span>
            </div>
            <a href="" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi xác minh
            </a>
        </div>
    </div>
    
     <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task04.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">03 Nạp tiền lần đầu</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+100.000 VND</span>
            </div>
            <a href="{{route('bank')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi nạp tiền
            </a>
        </div>
    </div>
    
    
     <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task05.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">04 lần đầu tạo mã giao dịch<br><span style="font-size:13px">Không bao gồm trải nghiệm miễn phí</span></div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+100.000 VND</span>
            </div>
            <a href="{{route('account')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Xin hợp đồng
            </a>
        </div>
    </div>
    
    
     <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task06.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">05 Mở rộng tiền ký quỹ lần đầu</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+100.000 VND</span>
            </div>
            <a href="{{route('account')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi thao tác
            </a>
        </div>
    </div>
    
    
     <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task07.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">06 Lần dầu bù lỗ</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+100.000 VND</span>
            </div>
            <a href="{{route('account')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi thao tác
            </a>
        </div>
    </div>
    
    
    <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task03.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">07 Liên kết thẻ rút tiền</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+50.000 VND</span>
            </div>
            <a href="{{route('account')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi thao tác
            </a>
        </div>
    </div>
    
     <div class="card card-inner" style="border:none;box-shadow:0px 3px 7px 0px rgba(224,229,239,0.7);margin-bottom:16px;width:90%;margin-left:7%;padding:10px">
        <div class="d-flex">
            <img src="https://vnf7.com/static/img/anfin/icon_novice_task08.png" style="width:48px;height:48px">
            <div style="font-size:18px;color:#333;font-weight:bold;margin-left:8px">08 Rút lợi nhuận lần đầu</div>
        </div>
        <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="d-flex" style="align-items:center">
                <img src="https://vnf7.com/static/img/anfin/star.png" style="width:28px;height:28px">
                <span style="color:orange;margin-left:5px">+50.000 VND</span>
            </div>
            <a href="{{route('withdraw')}}" style="background: rgb(243 141 73);text-decoration:none;
    color: rgb(255, 255, 255);
    font-size: 15px;
    height: 28px;
    line-height:28px;
    border-radius:8px;
    padding: 0px 9px;
    overflow: visible;">
                Đi thao tác
            </a>
        </div>
    </div>
    
   
    <div style="margin-top:16px;color:#959595;font-size:16px;width:90%;margin-left:7%;"> Gợi ý : Tiền thưởng khuyến mãi chỉ có thể được sử dụng để khấu trừ phí giao dịch.</div>
  </div> 
  
</div>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    
</script>

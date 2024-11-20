    <!-- CDN Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .navbar{
      height:50px;
      position: absolute;
     top:0;
     left: 0;
     right: 0;
     background-color: #1E2034;
     padding:0 8px;
    }
    .navbar-fixed{
    
    }
    .navbar__content{
        background-color: #1E2034;
      display:flex;
      justify-content:space-between;
      align-items:center;
      width: 100%;
      height:50px;
      position: absolute;
      right: 0;
      left: 0;
      top:0;
    }
    .navbar__content-title{
        font-size:20px;
    }
    .amount{
        display:flex;
        justify-content:center;
        flex-direction:column;
        height: 50px;
    }
    .amount p{
        font-size:12px;
        margin:0;
        margin-right:13px;
    }
    i.icon-back.bi-chevron-left{
        font-site:20px !important;
    }
    .navbar__content-right{
        /* position: absolute; */
        margin-right:10px
    }
    .navbar__content-left[data-v-9d55a7c1] {
    position: absolute;
    left: 1.32rem;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    height: 100%;
    top: 0;
    }
    .navbar__content-left .van-icon[data-v-9d55a7c1] {
        color: #fff;
        font-size: .48rem;
    }
  
    
  
</style>
@if($page == "agency")
<div class="navbar__content">
   <div class="navbar__content-left">
      <!---->
   </div>
   <div class="navbar__content-center">
      <!---->
      <div class="navbar__content-title">Đối tác</div>
   </div>
   <div class="navbar__content-right js-show-agency"><img data-v-7cf3cd57="" style="width:26px;height:26px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAWlBMVEX/WmYAAAD/WWf/Wmf/WmX/WGj/WGj/WWf/WGX/WWf/WGf/Wmf/W2b/V2X/W2n/WWj/WWX/WGf/WGf/WWP/XmX/U2z/WGj/XGb/W2j/WWf/Wmb/V2f/Wmb/WWdvLvmAAAAAHXRSTlNmALKfM0Ag32BZUS5GJl85H79wTSYNgBlM7++QgAa8nloAAAEfSURBVEjHzdNZcoMwEEXRfhEIJATYBIIzsP9tJnawGiQKNUm5yvf7HWYIB/sb0OcprKj2AO+592EHTFudgJZuWVcLwSvdM7UQcNlRQG3ipgsADS3TDPINUAIjrSoZoIv2X9fj0LqKAd6CfQegpyDHIBAfFsDYhMB4wII/i5riVgDK7zWAjJIAxQzmfQLwo1LR84lBXy/eRhcdPwZEGYNSBCg7CuiZgQVaGajm/2D+cdSLT22B+VWfNTDc9tMitQFGQH8qi58uImBwLyeSXBLZAdd0Q3ER+C3XuroQiQD3eMA3zKkUUFOQ+i8wskuyHjgS5TyoZKD2AI1kb8DgJDsBA7TpfYYlQJbat1gD9GZv3mgw8MTZ7bVx1QAGsp4ZfAM0fzA9owuXkgAAAABJRU5ErkJggg==" alt=""></div>
</div>
@elseif($page == "bank")
<div class="navbar__content">
   <div class="navbar__content-left">
      <!---->
   </div>
   <div class="navbar__content-center">
      <!---->
      <div data-v-9d55a7c1="" class="navbar__content-left" onclick="window.location.href = '/home'"><i class="fa fa-chevron-left" aria-hidden="true"></i>
      </div>
      <div class="navbar__content-title" style="margin-left:50px">Nạp tiền</div>
   </div>
   <div class="navbar__content-right" onclick="window.location.href='/history-transfer?type=1'">Lịch sử nạp</div>
</div>

@elseif($page == "withdraw")
<div class="navbar__content">
   <div class="navbar__content-left">
      <!---->
   </div>
   <div class="navbar__content-center">
      <!---->
      <!---->
      <div data-v-9d55a7c1="" class="navbar__content-left" onclick="window.location.href = '/home'"><i class="fa fa-chevron-left" aria-hidden="true"></i>
      </div>
      <div class="navbar__content-title" style="margin-left:50px">Rút tiền</div>
   </div>
   <div class="navbar__content-right" onclick="window.location.href='/history-transfer?type=2'">Lịch sử rút</div>
</div>
@endif
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

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
      color: #fff !important;
    }
  
    
  
</style>
<div  class="navbar">
   <div  class="navbar-fixed" style="background: var(--ar-black2);">
      <div  class="navbar__content">
         <div  class="navbar__content-left">
         <i onclick="window.location.href = '/customer'" style="color:#fff" class="icon-back bi bi-chevron-left"></i>
         </div>
         <div  class="navbar__content-center">
            <!---->
            <div  class="navbar__content-title" style="color:#fff">BIG STORE</div>
         </div>
         <div  class="navbar__content-right">
            <div class="amount">
               <p class="amountDisplay"><?= number_format($information->money) ?>.00đ</p>
               <p>Số dư ví</p>
            </div>
         </div>
      </div>
   </div>
</div>
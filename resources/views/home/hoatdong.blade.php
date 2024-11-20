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
    
  </style>

    <div class="container homecontainer " style="background:#fff">
        <div class="header-default" style="display:flex;background:rgb(62, 76, 244) !important;border-bottom:1px solid #ccc">
                <div  onclick="history.back()" style="flex:1;height: 50px;">
                   <i style="color:#fff"  class="icon-back bi bi-chevron-left"></i>
                </div>
                <div  style="flex:1;color:#fff;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Hoạt động</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        <div style="margin-top:20px">
            <div style="border-radius: 8px;
    height: 180px;
    margin: 15px 10px;
    background-image: url(assets/images/dowload/023724.png);
    /* background-position: center center; */
    background-size: contain;
    background-repeat: no-repeat;
}">
            </div>
            
            
              <div style="border-radius: 8px;
    height: 180px;
    margin: 15px 10px;
    background-image: url(assets/images/dowload/085425.png);
    /* background-position: center center; */
    background-size: contain;
    background-repeat: no-repeat;
}">
            </div>
            
            
            
              <div style="border-radius: 8px;
    height: 180px;
    margin: 15px 10px;
    background-image: url(assets/images/dowload/094996.png);
    /* background-position: center center; */
    background-size: contain;
    background-repeat: no-repeat;
}">
            </div>
            
            
              <div style="border-radius: 8px;
    height: 180px;
    margin: 15px 10px;
    background-image: url(assets/images/dowload/097889.png);
    /* background-position: center center; */
    background-size: contain;
    background-repeat: no-repeat;
}">
            </div>
        </div>
   
    </div>
   
@endsession

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 $('.js-back-main').click(function(){
    $('.container-history').hide();
 

    $('.container-main').show();

  })

   $('.js-history').click(function(){
      $('.container-history').show();
      $('.container-main').hide();
   })
   $('#btn-nap').click(function(){
        let $this = $(this);
        if($this.hasClass('active')){
            document.location.href="https://rotationluck.info.test/bank/after";
        }
    })
  $('.Recharge__content-paymoney__money-list__item').click(function(){
    $('.Recharge__content-paymoney__money-list__item').removeClass('active');
    let $this= $(this);
    let $value = $this.attr("data-value");
    $this.closest('.body-tab-content').find('#van-field-1-input').val($value);
    // $('#van-field-1-input').val($value);
    if(!$this.closest('.body-tab').find('#btn-nap').hasClass('active')){
      $this.closest('.body-tab').find('#btn-nap').addClass('active');
    }
    $(this).addClass('active');
  
  });
  $('.place-right').click(function(){
    let $this = $(this);
    $this.closest('.Recharge__content-paymoney__money-input').find('#van-field-1-input').val('');
    if($this.closest('.body-tab').find('#btn-nap').hasClass('active')){
      $this.closest('.body-tab').find('#btn-nap').removeClass('active');
    }
  })
</script>

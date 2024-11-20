<!DOCTYPE html>
<html lang="en">

<head>
  <title>STORE VN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/assets/css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  

  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .body{
      padding:0 14px;
      padding-top:10px;
    }
        .navbar__content-right {
            color:white;
        }
    .balanceAssets {
      
      width: 100%;
      height: 144px;
      background-image: url(/assets/png/TotalAssetsBg-90d1e866.png);
      background-repeat: no-repeat;
      background-size: 100%;
      background-position: center;
      border-radius: 16px;
      color: #adb0d4;
      padding: 14px 14px 0;
      position: relative;
  }
  .balanceAssets__header {
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    height: 18px;
  }
  .balanceAssets__main {
    height: 0.73333rem;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    margin: 0.21333rem 0.37333rem 0.37333rem 0;
    font-weight: 700;
    font-size: .64rem;
    text-shadow: 0 0.01333rem 0 rgba(0,0,0,.12);
}
.balanceAssets__header__left {
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.balanceAssets__header__left img{
    width: 16px;
    height: 16px;
    margin-right: 10px;
}
.balanceAssets__header__left{
    font-weight: 400;
    font-size: 14px;
}
.balanceAssets__main {
    height: 28px;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    margin: 20px 26px 26px 20px;
    font-weight: 700;
    font-size: 24px;
    text-shadow: 0 1px 0 rgba(0,0,0,.12);
}
.balanceAssets__main p{
  margin-bottom:0;
}
.balanceAssets__main img{
  width: 24px;
  height: 24px;
  margin-bottom:10px !important;
  margin-left:10px;
}
.nav-item{
  width: 31%;
  position: relative;
  margin-bottom:15px;
}
.nav-link{
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
  height:100px;
  width: 100%;
  padding:0;
  background-color: #1E2034;
  color:#adb0d4;
  font-weight: 300;
  font-size:14px;
}
.nav-link img{
  width: 38px;
  height: 38px;
}
.nav-link.active{
    background: linear-gradient(270deg,#CD9047 0%,#EBBB6F 100%) !important;
    color: #945b16 !important;
    font-weight: 700 !important;
}
#pills-tab{
  display:flex;
  justify-content:space-between;
  color:#151727 !important;
}
.tablist-home{
  background:#151727 !important;

}
.ulTab{
  background: #151727 !important;

}

.nav-item .gift {
    width: 32px;
    height: 32px;
    position: absolute;
    right: 5px;
    top: 0;
    background: url(/assets/png/gift-55dc786a.png) no-repeat center center;
    background-size: 32px auto;
}
.nav-item .gift span {
    margin-top:13px;
    display: block;
    color: #fff;
    font-size: 10px;
    letter-spacing: 0.5px;
    text-align: center;

}
.bank_item{
  background: #11BF7A;
    color: #fff;
    font-weight: 700;
    padding:8px;
    border-radius:8px;
}
.bank_item img{
  height:32px;
  width: 32px;
  margin-right:8px;
}
.Recharge__content-paymoney__title{
  display:flex;
  font-size:18px; 
  color:white;
  display:flex;
  align-items:center;
}
.Recharge__content-paymoney__title p{
  margin-bottom:0 !important;
}
.Recharge__content-paymoney__title img{
  height:32px;
  width: 32px;
  margin-right:8px;
}
.body-tab-content{
    background: #1E2034;
    border-radius:12px;
    margin-top: 12px;
    padding: 8px;
    margin-bottom: 12px;
}
.Recharge__content-paymoney__money-list {
  margin-top:20px;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 10px;
    justify-content: space-between;
}
.Recharge__content-paymoney__money-list__item.active{
    background: #CD9047;
    color: #fff;
}
.Recharge__content-paymoney__money-list__item span{
  margin-right:10px;
  font-weight:bold;
}
.Recharge__content-paymoney__money-list__item {
    cursor: pointer;
    margin-bottom:15px;
    width: 31%;
    height: 40px;
    color: #adb0d4;
    background-color: #232745;
    border-radius: 8px;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    position: relative;
    font-size: 14px;
}
.Recharge__content-paymoney__money-input {
    margin-top:20px;
    position: relative;
    height: 40px ;
    width: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    background: #303454;
    border-radius: 20px;
    align-items: center;
}
.Recharge__content-paymoney__money-input .place-div{
    position: absolute;
    height: 16px;
    width: 85px;
    color: #adb0d4;
    font-weight: 900;
    font-size: 14px;
    line-height: 16px;
    margin-left: 10px;
    border-right: 1px solid #ccc;
   
}
.Recharge__content-paymoney__money-input input{
  width: 200px;
  border:none;
  outline: none;
  padding:4px;
  margin-left:100px;
  background:none;
  color: #cd9047;
    font-weight: 700;
    font-size: 16px;
}
.place-right{
  position: absolute;
  right:16px;
  top:20%;
}
.place-right img{
  height:20px;
  width:20px;
  
}
.amount-input{
  display: flex;
    align-items: center;
}
#btn-nap{
  background-color: #686C94;
  padding: 10px auto;
  width:100%;
  border-radius:30px;
  margin-top:15px;
}
#btn-nap.active{
    background: -webkit-linear-gradient(left,#EBBB6F 0%,#CD9047 100%);
    background: linear-gradient(90deg,#EBBB6F 0%,#CD9047 100%);
    color:white;
}
.item-guide{
  margin-top:15px;
}
.item-guide>p{
  color:white;
  margin-left:12px;
  font-size:14px;
}
.momo{
  background-color: #9f2374 !important;
}

.navbar{
      height:50px;
      position: absolute;
     top:0;
     left: 0;
     right: 0;
     padding:0 8px;
    }
    .navbar-fixed{
    
    }
    .navbar__content{
        background: linear-gradient(90deg, rgb(23, 25, 42) 0%, rgb(55, 60, 94) 98.67%) !important;
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
        color:white;
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
        color:white;

    }
    .navbar__content-right{
        /* position: absolute; */
        margin-right:10px
    }
    .rechargeDetail__container-header {
            position: relative;
            width: 100%;
            min-height: 176px;
            padding: 30px 30px;

            text-align: center;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            flex-direction:column;
            -webkit-align-items: center;
            align-items: center;
            background: -webkit-linear-gradient(left,#17192A 0%,#373C5E 98.67%);
            background: linear-gradient(90deg,#17192A 0%,#373C5E 98.67%);
        }
        .rechargeDetail__container-header p {
            color:white;
            margin-bottom:0;
            font-size:14px;
        }

        .TimeLeft_C-time{
            margin-top:20px;
        margin-left: 0.26667rem;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        color: #333;
        font-size: .66667rem;
    }
    /* .symbol{
        background: unset !important;
        color: #cd9047 !important;
    } */


    .TimeLeft_C-time div{
        margin:0 3px;
        color:#fff;
        gradient(284deg,#cd9047 -4.68%,#fedd84 140.37%);
            background-image: linear-gradient(166deg,#cd9047 -4.68%,#fedd84 140.37%);
            box-shadow: drop-shadow(0 .01333rem 0 #745315);
            border-radius: 4px;
        ;
        font-weight: 500;
        height: 50px;
        line-height: 50px;
        width: 28px;
        font-family: Oswald;
        text-align: center;
        font-size: 48px;
    }
    .rechargeDetail__container-buttons>div{
        display:flex;
        width: 100%;
        height: 100%;
    }
    @media  (min-width: 768px){
        .rechargeDetail__container-buttons{
       
            max-width: 400px;
          
        }
    }
    .rechargeDetail__container-buttons{
        position: fixed;
            bottom: 0;
            width: 100%;
            height:60px;
            z-index: 3000;
            display:flex;
            align-items: center;
        }
        .rechargeDetail__container-buttons>div>span:first-of-type {
            color: #adb0d4;
            background: #686C94;
        }
        .rechargeDetail__container-buttons>div>span {
            height: 100%;
            width: 50%;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            font-size: 16px;
            display: grid;
            place-items: center;
        }
        .rechargeDetail__container-buttons>div>span:last-of-type {
    color: #fff;
    background: #CD9047;
}
.homecontainer{
  min-height:100vh;
}
.container-history{
    padding-top:60px;
}
  </style>
</head>

<body>
    <div class="container homecontainer container-main">
        <div class="navbar__content">
        <div  class="navbar__content-left">
            <i onclick="window.location.href = '/bank'" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div class="navbar__content-center">
            <!---->
            <div class="navbar__content-title" style="margin-left:50px">Nạp tiền</div>
        </div>
        <input type="text" value="<?= $second ?>" style="display:none" id="txtCountDownTime" />
        <div class="navbar__content-right js-history" onclick="window.location.href='/history-transfer?type=1'">Lịch sử nạp</div>
        </div>
        <div style="padding-top:50px">
            <div  class="rechargeDetail__container-header">
                <p >Vui lòng hoàn tất thanh toán trước khi thời gian kết thúc</p>
                <div class="TimeLeft_C-time">
                    <div class="t1">0</div>
                    <div class="t2">0</div>
                    <div class="symbol">:</div>
                    <div class="t3">0</div>
                    <div class="t4">0</div>
                </div>
            </div>
            </div>
            <div class="body">
            <div class="body-tab">
                <div class="body-tab-content">
                    <div  class="Recharge__content-paymoney__title">
                        <img  src="https://fb333.com/assets/png/saveWallet-150c6fb0.png" alt="">
                        <p ><?= $bankName ?></p>
                    </div>
                    <h6 style="color: #fff; margin: 10px 0 0 0; padding: 0 0 0 15px;">Họ & tên</h6>
                    <div  class="Recharge__content-paymoney__money-input" style="margin:10px; display:block; width: 96%">
                        <div  class="van-cell van-field amount-input" modelmodifiers="[object Object]">
                        <div class="van-cell__value van-field__value">
                            <div class="van-field__body">
                                <input type="tel" style="margin-left: 15px; line-height: 35px;" inputmode="numeric" id="van-field-1-input" class="van-field__control" value="<?= $bankAccount ?>" editable="false"><!----><!----><!---->
                            </div>
                        </div>
                        </div>
                        <div  class="place-right"><img  onclick="copy('<?= $bankAccount ?>')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEmSURBVHgB7ZW/ccIwGMXfFzSAU6RXNnAmwClSO9kgG+ARGMEjMAJUKVIQNsgI7lKkiAuowKc8jExin3ycOMFR8Brp9Of7Se9OT8CJJX0TP/Ms2mzwym4EP5VKYXr7mBe9ABbXVWXmxkDjCImgGAzkgZBSuRbw5M9sNAGfIjKDl0zKfbG9fa56VkW7k8js7ikfw0Pf79kWEjc19oC252ZoTzPkhvGBmi3Pu1K2eO05u7oznxCS4ICqCiPWqD13AkJ67gQgoOdd3eDEugKugIsCNLFiUjtQv2qFcEqaWOHLLhgf09CAD2bBgm25WmFy/5KHvoEsXDHTAGwKmnSXLT5qe+4EMM8n6zVG/OpiG1x+iH+ed7X/k7/eMk3QNra9P/nl8s/zs+sXRwiAzhE8NgoAAAAASUVORK5CYII=" alt=""></div>
                    </div>
                    <h6 style="color: #fff; margin: 10px 0 0 0; padding: 0 0 0 15px;">Số tài khoản</h6>
                    <div  class="Recharge__content-paymoney__money-input" style="margin:10px; display:block; width: 96%">
                        <div  class="van-cell van-field amount-input" modelmodifiers="[object Object]">
                        <div class="van-cell__value van-field__value">
                            <div class="van-field__body">
                                <input type="tel" style="margin-left: 15px; line-height: 35px;" inputmode="numeric" id="van-field-1-input" class="van-field__control" value="<?= $bankNumber ?>"  editable="false"><!----><!----><!---->
                            </div>
                        </div>
                        </div>
                        <div  class="place-right"><img  onclick="copy('<?= $bankNumber ?>')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEmSURBVHgB7ZW/ccIwGMXfFzSAU6RXNnAmwClSO9kgG+ARGMEjMAJUKVIQNsgI7lKkiAuowKc8jExin3ycOMFR8Brp9Of7Se9OT8CJJX0TP/Ms2mzwym4EP5VKYXr7mBe9ABbXVWXmxkDjCImgGAzkgZBSuRbw5M9sNAGfIjKDl0zKfbG9fa56VkW7k8js7ikfw0Pf79kWEjc19oC252ZoTzPkhvGBmi3Pu1K2eO05u7oznxCS4ICqCiPWqD13AkJ67gQgoOdd3eDEugKugIsCNLFiUjtQv2qFcEqaWOHLLhgf09CAD2bBgm25WmFy/5KHvoEsXDHTAGwKmnSXLT5qe+4EMM8n6zVG/OpiG1x+iH+ed7X/k7/eMk3QNra9P/nl8s/zs+sXRwiAzhE8NgoAAAAASUVORK5CYII=" alt=""></div>
                    </div>
                    <h6 style="color: #fff; margin: 10px 0 0 0; padding: 0 0 0 15px;">Số tiền</h6>
                    <div  class="Recharge__content-paymoney__money-input" style="margin:10px; display:block; width: 96%">
                        <div  class="van-cell van-field amount-input" modelmodifiers="[object Object]">
                        <div class="van-cell__value van-field__value">
                            <div class="van-field__body">
                                <input type="text" style="margin-left: 15px; line-height: 35px;" id="van-field-1-input" class="van-field__control" value="<?= $rechargeData != null ? intval($rechargeData->money) : 0 ?>"  editable="false"><!----><!----><!---->
                            </div>
                        </div>
                        </div>
                        <div  class="place-right"><img  onclick="copy('<?= $rechargeData != null ? intval($rechargeData->money) : 0 ?>')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEmSURBVHgB7ZW/ccIwGMXfFzSAU6RXNnAmwClSO9kgG+ARGMEjMAJUKVIQNsgI7lKkiAuowKc8jExin3ycOMFR8Brp9Of7Se9OT8CJJX0TP/Ms2mzwym4EP5VKYXr7mBe9ABbXVWXmxkDjCImgGAzkgZBSuRbw5M9sNAGfIjKDl0zKfbG9fa56VkW7k8js7ikfw0Pf79kWEjc19oC252ZoTzPkhvGBmi3Pu1K2eO05u7oznxCS4ICqCiPWqD13AkJ67gQgoOdd3eDEugKugIsCNLFiUjtQv2qFcEqaWOHLLhgf09CAD2bBgm25WmFy/5KHvoEsXDHTAGwKmnSXLT5qe+4EMM8n6zVG/OpiG1x+iH+ed7X/k7/eMk3QNra9P/nl8s/zs+sXRwiAzhE8NgoAAAAASUVORK5CYII=" alt=""></div>
                    </div>
                    <h6 style="color: #fff; margin: 10px 0 0 0; padding: 0 0 0 15px;">Nội dung chuyển khoản</h6>
                    <div  class="Recharge__content-paymoney__money-input" style="margin:10px; display:block; width: 96%">
                        <div  class="van-cell van-field amount-input" modelmodifiers="[object Object]">
                        <div class="van-cell__value van-field__value">
                            <div class="van-field__body">
                                <input type="tel" style="margin-left: 15px; line-height: 35px;" inputmode="numeric" id="van-field-1-input" class="van-field__control" value="<?= $bankContent . ' ' . $information->id ?>"  editable="false"><!----><!----><!---->
                            </div>
                        </div>
                        </div>
                        <div  class="place-right"><img onclick="copy('<?= $bankContent . ' ' . $information->id ?>')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEmSURBVHgB7ZW/ccIwGMXfFzSAU6RXNnAmwClSO9kgG+ARGMEjMAJUKVIQNsgI7lKkiAuowKc8jExin3ycOMFR8Brp9Of7Se9OT8CJJX0TP/Ms2mzwym4EP5VKYXr7mBe9ABbXVWXmxkDjCImgGAzkgZBSuRbw5M9sNAGfIjKDl0zKfbG9fa56VkW7k8js7ikfw0Pf79kWEjc19oC252ZoTzPkhvGBmi3Pu1K2eO05u7oznxCS4ICqCiPWqD13AkJ67gQgoOdd3eDEugKugIsCNLFiUjtQv2qFcEqaWOHLLhgf09CAD2bBgm25WmFy/5KHvoEsXDHTAGwKmnSXLT5qe+4EMM8n6zVG/OpiG1x+iH+ed7X/k7/eMk3QNra9P/nl8s/zs+sXRwiAzhE8NgoAAAAASUVORK5CYII=" alt=""></div>
                    </div>
                </div>
                <div class="body-tab-content">
                    <div  class="Recharge__content-paymoney__title">
                        <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAFzSURBVHgB7dlBToNAFAbgf7ALlz0C3kBiuu9KXHoDvYHlBNITQE+g3sCl3bE3ht5AjsBKu1DGR9XEmA4DWnxDfF/S0HZow8/MtMl7gBD/m2pzUp6cjuE9XVRandNLH/0pjmbLgy4fGNlOyBfHZ5V+TqHVGP3z0VFjgHwR0l1HCkYPafhYH00zYwyQJyd+pXUMfn7ToGcaqJS+pMNfLJtfMQbQwCEGwBhADT3AUEgAbhKAmwTgJgG4SQBuEoCbBOAmAbhJAG4SYMcKdGQtLX5SUNmrxnyE/VUQ3ZZwRKsAVNSdT6K7GA5qsYTUtasXX7MGoOLuDRxmXUJ097Pv731UjH3sVufeQM06A5vmhsOaZqCgh/+CdV0jzb4O/ORO9cU8A1pt1v7ee5ndWZ55YF13Zkoqs0+pzeRsCGOAIMpKmoWofk7/AzFt3Cvq2kzhGGuX8j4JZ54Ce7eG9t3Wa7X+Ck2iZeppFWjaE/QNK/AoIITY6g2Wal7a/2Vh1QAAAABJRU5ErkJggg==" alt="">
                        <p >Hướng dẫn nạp tiền</p>
                    </div>
                    <div  class="item item-guide">
                        <p >Nếu quá trình chuyển tiền hết hạn, vui lòng tạo lại lệnh nạp tiền.</p>
                        <p >Số tiền chuyển phải giống với số tiền đơn hàng của bạn đã tạo, nếu không thì tiền không thể được cập nhật thành công.</p>
                        <p >Nếu bạn chuyển nhầm số tiền đã tạo, công ty chúng tôi sẽ không chịu trách nhiệm về số tiền bị mất!</p>
                        <!---->
                        <p >Lưu ý: Không hủy lệnh nạp tiền sau khi đã chuyển tiền xong.</p>
                    </div>
                </div>
            </div>
        
        </div>
        <div  class="rechargeDetail__container-buttons">
        <div ><span class="js-comfirm-back" onclick="change(<?= $orderId ?>, 1);">Huỷ bỏ đơn hàng</span><span class="js-comfirm-pay" onclick="change(<?= $orderId ?>, 2)">Đã hoàn thành thanh toán</span></div>
        </div>
    </div>
    <div class="container homecontainer container-history" style="display:none">
        <div  class="promotionShare__container body" style="--495c4c83: bahnschrift;">
            <div   class="navbar">
                <div  class="navbar-fixed">
                    <div  class="navbar__content">
                    <div  class="navbar__content-left">
                        <div class="arrow js-back-main" style="transform: rotate(180deg) !important;position: absolute; left:10px;top:20%;">
                            <img style="width:30px;height:30px" src="https://fb333.com/assets/svg/right_arrow-dbec343b.svg" alt="">
                        </div>
                    </div>
                    <div  class="navbar__content-center">
                        <!---->
                        <div  class="navbar__content-title">Lịch sử nạp tiền</div>
                    </div>
                    <div  class="navbar__content-right"></div>
                    </div>
                </div>
            </div>
            <div class="body-content">
                <div style="margin: 10px 5%;width: 90%;display:flex; justify-content:space-between">
                    <div style="width:48%">
                    <select class="form-select" placeholder="Chọn loại hình">
                        <option value="all">Toàn bộ</option>
                        <option value="f1">Chờ thanh toán</option>
                        <option value="f1">Hoàn thành</option>
                        <option value="f1">Nạp tiền thất bại </option>

                    </select>
                    </div>
                    <div style="width:48%">
                    <input type="date"  name="date" class="form-control">
                    </input>
                    </div>
                </div>
                <div class="text-center">
                    <div class="empty__container empty">
                    <img alt="" class="" data-origin="https://fb333.com/assets/png/empty-59c9beb3.png" src="https://fb333.com/assets/png/empty-59c9beb3.png">
                    <p>Không có dữ liệu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>


<script>
    // $('.js-comfirm-pay').click(function () {
    //     confirm('Xác nhận đã thanh toán ?')
    // })
    // $('.js-comfirm-back').click(function (){
    //     confirm('Xác nhận hủy ?')

    // })
    $('.js-history').click(function(){
        $('.container-history').show();
        $('.container-main').hide();
       });
        $('.js-back-main').click(function(){
            $('.container-history').hide();
            $('.container-main').show();
    
        });
        function change(id, type){
            if(confirm('Xác nhận ' + (type == 1 ? 'huỷ' : 'hoàn thành') + ' ?')){
                $.ajax({
                     url:'/cancel',
                     type:'get',
                     dataType:'json',
                     data:{
                        id : id,
                        type : type
                     },
                     success: function(res){
                        if(res.status){
                            if(type == 1){
                                alert('Huỷ đơn thành công');
                                window.location.href= '/bank';
                            }
                            else{
                                alert('Hoàn thành đơn thành công');
                                window.location.href= '/history-transfer?type=1';
                            }
                        }
                        else{
                            alert(res.message);
                        }
                     }
                  });
            }
             
         }
         function copy(content){
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(content).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Sao chép thành công');
        }
    
        // Giảm thời gian mỗi giây
        setInterval(function(){
            let totalSecond = parseInt($('#txtCountDownTime').val());
            if(totalSecond <= 0){
                return;
            }
            let minutes = Math.floor(totalSecond / 60);
            let seconds = totalSecond % 60;
            
            $('.t1').html(Math.floor(minutes / 10));
            $('.t2').html(minutes % 10);
            $('.t3').html(Math.floor(seconds / 10));
            $('.t4').html(seconds % 10);
            
            $('#txtCountDownTime').val(totalSecond - 1);
        }, 1000);

</script>
</body>



</html>


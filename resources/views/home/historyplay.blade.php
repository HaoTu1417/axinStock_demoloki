<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <link rel="stylesheet" href="/assets/css/module.css?id=<?php echo rand(0, 9999); ?>">
    <link rel="stylesheet" href="/assets/css/betting.css?id=<?php echo rand(0, 9999); ?>">
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script src="/assets/js/accounting.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .body {
            padding: 0 10px;
        }

        .body-top {
            padding-top: 60px;

        }

        .TimeLeft_C {
            width: 100%;
            height: 96px;
            position: relative;
            background-image: url(/assets/png/diban-f3c339c5.png);
            background-repeat: no-repeat;
            background-size: contain;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            padding: 20px;
        }

        .TimeLeft_C-rule {
            position: absolute;
            bottom: 12px;
            right: 20px;
            height: 22px;
            width: 128px;
            font-size: .29333rem;
            text-align: center;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            border-radius: 0.08rem;
            background: #11BF7A;
            font-size: 12px;
            color: white;
        }

        .TimeLeft_C-rule svg {
            width: 18px;
        }

        .TimeLeft_C-l {
            color: #fff;
            display: flex;
            flex-direction: column;
        }

        .TimeLeft_C-name {
            font-size: 12px;
            color: #75fff7;
        }

        .TimeLeft_C-id {
            font-size: 13px;
        }

        .TimeLeft_C-tip {
            position: absolute;
            bottom: 0;
            left: 20px;
            font-size: 12px;
        }

        .TimeLeft_C-r {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-wrap: nowrap;

        }

        .TimeLeft_C-text {
            font-size: 12px;
            color: #75fff7;
        }

        .TimeLeft_C-time {
            margin-left: 0.26667rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            color: #333;
            font-size: .66667rem;
        }

        .symbol {
            background: unset !important;
            color: #cd9047 !important;
        }

        .TimeLeft_C-time div {
            color: #fff;
            gradient(284deg, #cd9047 -4.68%, #fedd84 140.37%);
            background-image: linear-gradient(166deg, #cd9047 -4.68%, #fedd84 140.37%);
            box-shadow: drop-shadow(0 .01333rem 0 #745315);
            border-radius: 4px;
            ;
            font-weight: 700;
            height: 32px;
            line-height: 32px;
            width: 17px;
            font-family: Oswald;
            text-align: center;
            font-size: 28px;
        }

        .Betting_C-head {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0;
        }

        .Betting_C-head-g {
            background: #cd9047;
            width: 32%;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Betting_C-head-p {
            background: #EF4770;
            width: 32%;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Betting_C-head-r {
            background: #adb0d4;
            width: 32%;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Betting_C-numC {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-top: 0.26667rem;
            padding: 0.56rem 0.29333rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            background-image: url(/assets/png/bet-e00871af.png);
            background-repeat: no-repeat;
            background-size: contain;
            padding: 10px;
        }

        @media screen and (min-width: 768px) {
            .Betting_C-numC {
                background-size: cover !important;

            }

            .TimeLeft_C {
                background-size: cover !important;

            }

        }

        .nav {
            background: none;
            display: flex;
            justify-content: space-between;
        }

        .nav-item {
            width: 32%;
            display: flex;
            justify-content: center;
            align-items: center;
            white-space: nowrap;
            background: #1e2034;
            border-radius: 10px;
            color: #9397BD;
        }

        .nav-link.active {
            color: #945b16 !important;
        }

        .nav-item button {
            width: 100%;
            padding: 10px 2px;
        }

        .Betting_C-numC>div {
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            width: 25%;
            height: 108px;
            margin-bottom: 10px;
        }

        .Betting_C-numC>div.w5 {
            width: 50%;
            height: 110px;
        }

        .Betting_C-numC>div.Betting_C-numC-item0 {
            background-image: url(/assets/png/n0-700ec4b1.png );

        }

        .Betting_C-numC>div.Betting_C-numC-item5 {
            background-image: url(/assets/png/n5-50c5e305.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item1 {
            background-image: url(/assets/png/n1-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item2 {
            background-image: url(/assets/png/n2-da417d5e.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item3 {
            background-image: url(/assets/png/n3-22ad65c0.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item7 {
            background-image: url(/assets/png/n7-7091816a.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item4 {
            background-image: url(/assets/png/n4-99a5bfa8.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item6 {
            background-image: url(/assets/png/n6-3669f956.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item8 {
            background-image: url(/assets/png/n8-e26bf092.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item9 {
            background-image: url(/assets/png/n9-a92af725.png);
        }

        .Betting_C-foot {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            margin-top: 10px;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
        }

        .Betting_C-foot>div {
            width: calc((100% - 0.21333rem)/2);
            height: 54px;
            line-height: 54px;
            background-image: url(/assets/png/btn-aab6c633.png);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: #fedd84;
        }

        .row>* {
            height: auto;
        }

        .GameRecord__C-head {
            padding: 8px 0;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;

            background: #303454;

        }

        .GameRecord__C-body {
            padding: 8px 0;
            line-height: 16px;
            font-site: 16px;
            color: #fff;
            background: #1e2034;
            border-bottom: 1px solid #ccc;

        }

        .GameRecord__C-body .col {
            text-align: center;
            /*white-space: nowrap;*/
            padding: 6px 0;
        }

        .GameRecord__C-head .col {
            text-align: center;
        }

        .col--8 {
            width: 40% !important;
        }

        .GameRecord__C-foot {
            height: 60px;
            background: #1e2034;
            color: #fff;
            padding: 8px 80px;
            margin-top: 0.48rem;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .GameRecord__C-foot-prev {
            padding: 8px;
            background: #303454;
            border-radius: 8px;
            transform: rotate(180deg) !important;

        }

        .GameRecord__C-foot-next {
            padding: 8px;
            background: #303454;
            border-radius: 8px;


        }

        .Trend__C-body1 {
            background: #1e2034;
            padding-bottom: 14px;
        }

        .Trend__C-body1-line>div:first-child {
            width: 148px;
            padding-left: 10px;
            text-align: left;
        }

        .Trend__C-body1-line {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            font-size: 13px;
            color: #686c94;
            height: 22px;
        }

        .Trend__C-body1-line+.Trend__C-body1-line {
            margin-top: 10px;

        }

        .Trend__C-body1-line.header {
            padding-top: 14px;
            height: 31px;
            padding-left: 10px;
            color: #adb0d4;
            font-size: 14px;
        }

        .Trend__C-body1-line-num {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            padding-right: 8px;
        }

        .Trend__C-body1-line.lottery .Trend__C-body1-line-num>div {
            border-radius: 50%;
            border: 0.01333rem solid #cd9047;
            color: #cd9047;
        }

        .Trend__C-body1-line-num>div {
            width: 19px;
            height: 19px;
            line-height: 19px;
            font-size: 14px;
            color: #9397bd;
            text-align: center;
        }

        .Trend__C-body1-line {
            margin-top: 12px;
        }

        .Trend__C-body2 {
            background: #1e2034;
            padding-bottom: 14px;
        }

        .Trend__C-body2-Num>div {
            width: 19px;
            height: 19px;
            line-height: 19px;
            font-size: 11px;
            color: #9397bd;
            text-align: center;
        }

        .Trend__C-body2>div {
            height: 54px;
            padding: 18px 10px;
            border-top: 4px solid #303454;
        }

        .Trend__C-body2-Num {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Trend__C-body2-Num>div {
            width: 16px;
            height: 16px;
            line-height: 16px;
            color: #9397bd;
            text-align: center;
            border-radius: 50%;

        }


        .Trend__C-body2-Num {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            position: relative;
            height: 18px;
        }

        .Trend__C-body2 .line-canvas {
            position: absolute;
            top: 50%;
            left: 0;
            height: 54px;
            width: calc(100% - 24px);
            z-index: 9;
        }

        .Trend__C-body2-Num-item {
            border: 1px solid #bbbbbb;
            color: #bbb;
            margin-right: 6px;
        }

        .Trend__C-body2-Num-BS.isB {
            background-image: url(/assets/png/ringIcon-520625f3.png);
        }

        .Trend__C-body2-Num-BS {
            width: 16px;
            height: 16px;
            margin-left: 12px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url(/assets/png/necklace-47e42f83.png);
        }

        .Trend__C-body2-Num-item.action {
            position: relative;
            z-index: 10;
            border: none;
            color: #fff;
            background: #cd9047;
        }
        .MyGameRecordList_C-item[data-v-55005ad8] {
        height: 60px;
        padding: .37333rem 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center
    }
    
    .MyGameRecordList_C-item+div[data-v-55005ad8] {
        border-top: .01333rem solid var(--ar-gray3)
    }
    
    .MyGameRecordList_C-item-l[data-v-55005ad8] {
        height: 40px;
        width: 40px;
        border-radius: 10px;
        color: #fff;
        font-size: 13px;
        margin-right: 12px;
        -webkit-box-flex: 0;
        -webkit-flex: none;
        flex: none;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        text-align: center
    }
    
    .MyGameRecordList_C-item-l-red[data-v-55005ad8],.MyGameRecordList_C-item-l-2[data-v-55005ad8],.MyGameRecordList_C-item-l-4[data-v-55005ad8],.MyGameRecordList_C-item-l-6[data-v-55005ad8],.MyGameRecordList_C-item-l-8[data-v-55005ad8] {
        background-color: var(--ar-gray1)
    }
    
    .MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
        background-color: var(--ar-red1)
    }
    
    .MyGameRecordList_C-item-l-green[data-v-55005ad8],.MyGameRecordList_C-item-l-1[data-v-55005ad8],.MyGameRecordList_C-item-l-3[data-v-55005ad8],.MyGameRecordList_C-item-l-7[data-v-55005ad8],.MyGameRecordList_C-item-l-9[data-v-55005ad8] {
        background-color: var(--ar-orange1)
    }
    
    .MyGameRecordList_C-item-l-0[data-v-55005ad8],.MyGameRecordList_C-item-l-5[data-v-55005ad8] {
        background-color: var(--ar-red1)
    }
    
    .MyGameRecordList_C-item-l-red[data-v-55005ad8],.MyGameRecordList_C-item-l-green[data-v-55005ad8],.MyGameRecordList_C-item-l-small[data-v-55005ad8],.MyGameRecordList_C-item-l-big[data-v-55005ad8],.MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
        font-size: 13px
    }
    
    .MyGameRecordList_C-item-l-small[data-v-55005ad8],.MyGameRecordList_C-item-l-big[data-v-55005ad8] {
        background: var(--ar-bodybg);
        border: .01333rem solid var(--ar-orange1)
    }
    
    .MyGameRecordList_C-item-m[data-v-55005ad8] {
        -webkit-box-flex: 0;
        -webkit-flex: none;
        flex: none
    }
    
    .MyGameRecordList_C-item-m-top[data-v-55005ad8] {
        height: 25px;
        line-height: 25px;
        font-size: 16px;
        color: var(--ar-white);
        margin-bottom: .24rem
    }
    
    .MyGameRecordList_C-item-m-bottom[data-v-55005ad8] {
        font-size: 13px;
        color: var(--ar-gray4)
    }
    
    .MyGameRecordList_C-item-r.red div[data-v-55005ad8]{
            color: #ef4770 !important;
            border-color: #ef4770 !important;
        }
    
    .MyGameRecordList_C-item-r[data-v-55005ad8] {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        flex: 1;
        font-weight: 500;
        font-size: 13px;
        height: 40px;
        color: var(--ar-red1);
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: end;
        -webkit-align-items: flex-end;
        align-items: flex-end;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        flex-direction: column
    }
    
    .MyGameRecordList_C-item-r span[data-v-55005ad8] {
        word-wrap: break-word;
        word-break: break-all
    }
    
    .MyGameRecordList_C-item-r div[data-v-55005ad8] {
        color: #fff;
        border: .01333rem solid #fff;
        border-radius: .13333rem;
        height: 20px;
        line-height: 20px;
        font-size: 13px;
        padding: 0 .48rem;
        margin-bottom: .08rem
    }
    
    .MyGameRecordList_C-item-r.success[data-v-55005ad8] {
        color: var(--ar-green1)
    }
    
    .MyGameRecordList_C-item-r.success div[data-v-55005ad8] {
        color: var(--ar-green1);
        border-color: var(--ar-green1)
    }
    
    .MyGameRecordList_C-inlineB[data-v-55005ad8] {
        display: inline-block
    }
    
    .MyGameRecordList_C-inlineB+div[data-v-55005ad8] {
        margin-left: .21333rem
    }
    .MyGameRecordList_C-item-l-20{
        background: #30cd4a;
    }
    .MyGameRecordList_C-item-l-red[data-v-55005ad8],.MyGameRecordList_C-item-l-2[data-v-55005ad8],.MyGameRecordList_C-item-l-4[data-v-55005ad8],.MyGameRecordList_C-item-l-6[data-v-55005ad8],.MyGameRecordList_C-item-l-8[data-v-55005ad8] {
       background: var(--ar-bodybg); border: 0.01333rem solid var(--ar-orange1); }
    
    .MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
        background-color: var(--ar-red1)
    }
    
    .MyGameRecordList_C-item-l-green[data-v-55005ad8],.MyGameRecordList_C-item-l-1[data-v-55005ad8],.MyGameRecordList_C-item-l-3[data-v-55005ad8],.MyGameRecordList_C-item-l-7[data-v-55005ad8],.MyGameRecordList_C-item-l-9[data-v-55005ad8] {
        background-color: #ffeb00;
        color:black;
    }
    
    .MyGameRecordList_C-item-l-0[data-v-55005ad8],.MyGameRecordList_C-item-l-5[data-v-55005ad8] {
        background-color: #f94b4b;
    }
    
    .MyGameRecordList_C-item-l-red[data-v-55005ad8],.MyGameRecordList_C-item-l-green[data-v-55005ad8],.MyGameRecordList_C-item-l-small[data-v-55005ad8],.MyGameRecordList_C-item-l-big[data-v-55005ad8],.MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
        font-size: 13px
    }
    
    .MyGameRecordList_C-item-l-small[data-v-55005ad8],.MyGameRecordList_C-item-l-big[data-v-55005ad8] {
        background: var(--ar-bodybg);
        border: .01333rem solid var(--ar-orange1)
    }
    .MyGameRecordList_C-detail[data-v-55005ad8] {
        width: calc(100% + .61333rem);
        position: relative;
        left: -.32rem;
        padding: .29333rem .32rem;
        border-radius: var(--ar-btn-br);
        border: .01333rem solid var(--ar-gray3);
        color: var(--ar-gray1)
    }
    
    .MyGameRecordList_C-detail-text[data-v-55005ad8] {
        font-size: 15px;
        padding-bottom: 5px;
        margin-bottom: 10px;
        border-bottom: .01333rem solid var(--ar-gray3)
    }
    
    .MyGameRecordList_C-detail-line .orderNum[data-v-55005ad8] {
        color: var(--ar-white)
    }
    
    .MyGameRecordList_C-detail-line .gold[data-v-55005ad8] {
        color: var(--ar-orange1)
    }
    
    .MyGameRecordList_C-detail-line .red[data-v-55005ad8] {
        color: var(--ar-red1)
    }
    
    .MyGameRecordList_C-detail-line .green[data-v-55005ad8] {
        color: var(--ar-green1)
    }
    
    .MyGameRecordList_C-detail-line .time[data-v-55005ad8] {
        color: var(--ar-gray5)
    }
    
    .MyGameRecordList_C-detail-line[data-v-55005ad8] {
        height: auto;
        line-height: 15px;
        font-size:15px;
        border-radius: .13333rem;
        margin-bottom: 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap
    }
    
    .MyGameRecordList_C-detail-line>div[data-v-55005ad8] {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center
    }
    
    .MyGameRecordList_C-detail-line img[data-v-55005ad8] {
        width: 20px;
        height: 20px;
        margin-left: .06667rem
    }
    
    .MyGameRecordList_C-detail-line .orderNum[data-v-55005ad8] {
        color: var(--ar-white)
    }
    
    .MyGameRecordList_C-detail-line .gold[data-v-55005ad8] {
        color: var(--ar-orange1)
    }
    
    .MyGameRecordList_C-detail-line .red[data-v-55005ad8] {
        color: var(--ar-red1)
    }
    
    .MyGameRecordList_C-detail-line .green[data-v-55005ad8] {
        color: var(--ar-green1)
    }
    
    .MyGameRecordList_C-detail-line .time[data-v-55005ad8] {
        color: var(--ar-gray5)
    }
    
    .MyGameRecordList_C-detail-line .numList[data-v-55005ad8] {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        height: 100%
    }
    
    .MyGameRecordList_C-detail-line .numList>div[data-v-55005ad8] {
        height: 30px;
        width: 30px;
        text-align: center;
        line-height: .48rem;
        border-radius: 50%;
        border: .01333rem solid #000;
        font-size: 13px;
        color: #000
    }
    
    .MyGameRecordList_C-detail-line .numList>div+div[data-v-55005ad8] {
        margin: .08rem
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div[data-v-55005ad8] {
        height: 30px;
        width: 30px;
        background-repeat: no-repeat;
        background-size: .48rem;
        background-position: center
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n1[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAVFBMVEUAAAD8LC33KCz7LC38Ky3/KjD7LCz7Ky37LCz6Ki36Kiv/ICD6Kyz6LS36Kir7LC3/4An7Qij/yg37Nyv+kRn+nRb/1Qv/vhD8Tib9cB/8cB/9bx/AUpg9AAAAD3RSTlMA3yDvnxDPj5BgMBCQYGAfSH+0AAABW0lEQVRYw+3Z3Y6CMBCG4ZG2IALb1v4geP/3ucuBESU7pvQzYsJ7AU+GYGgz0r2mk6XQyYlS1g0tKyoe45PFE9dUOrNKPYx30NkdZkOe/jyAeFrMB5qxmTyMqGiq0rCqySs0sOmhJRJsiZRGJhTVGtoPSSwoqcSCJQksKEiD28Ed/BLQjaGPxsQ+XB0AtD6ae8Fmgs6bp3wWaM9m0dmuBy+TtxQvLJg4Hz8jD7qbtxTdKtCbf/NrQGuY7AowcKBPB53hii4ZHAzbkAwGHgzJYM+DfTIYeTAmg+ZFnwdfPfLnXwr8ZzPy4DUZdJEFXTKoPfvEW/h8sR/YbRwBzCG1lWOUOeiRVxGXe1kKMy16i7jODbfr3Oi2eeHcwR18OwhfEcCXGPg1S4cFa1ICCiqiFvrE71j30RHnHWlKYVem+KUufu2MX4xD3sxR0WOFzNBEW9AyVa/9+6ObTfcLwUBuLj3VhY4AAAAASUVORK5CYII=)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n2[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAXVBMVEUAAAD3KCz/Jyz8Ky37LC38LS38Ky37LCz7Ky36Kiz7LCz6Kiv7LS36Kyz6LS37LC3////8Rkf/5eX9lZb/8vL+y8v8YWH8U1T+sLD9iIn9fHz7OTr+vb39o6P9lpbz0uDzAAAAD3RSTlMAIBCf79/fz49gkDDvkGD7qm4iAAABdElEQVRYw+3Y246EIAyA4QqO6JwKonga9/0fc1eTXaWTvRjaS/4H+FJpSAxwpJ7a3PHj7kY3Ct4r6jumpwvCqRqZ1Soa74LsLqchb4fHEW9kPrEZ1eFxRbWDNYpV7x+Mgm0frSXBB4BC0jJ7Pw2JYKmgIdzY2a12ThMb8sWutb/5JFCDId7RlAIaKPHUy54bUg4R8NRgo0ZMKALXGOzYYG/jnDQYuOCLgAMX/JI+wyC8ZXqIjgnSm+KRD9K7zAfRrd3O9QF54NESJj87RCZIy2AGM5jBDGYwgxmUBN3sp7CIgaG3W93q+GD889wSERjeIXJBZ8/1fHC0UYENdjHoueBg415cMBCw54KOgtJnuEpveYjAkrcVupMSDCY0/XtTDGjZu6zhiUnN7c5140IfglSJaQ2T9/OCJAXwQMG0/HPfT1c57wpbqpLyKgV7RSXkFX/PzpWId4M9OiN/PhDZzFVBXKEZWvko4D3VaFMmYEY/1aF8A9TAbYCraT+BAAAAAElFTkSuQmCC)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n3[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAclBMVEUAAAD8LC33KCz7LC38Ky3/KjD7LCz7Ky37LCz6Ki36Kiv/ICD6Kyz6LS37LC76Kir7LC3////7OTr+o6P8YWH/2Nj/8vL+sLD+ysv9e3z+vb3/5eX8U1T7R0f7Rkf+y8v9lZb+5eX9iIn9bm/8Rkf9lpZkFInVAAAAEHRSTlMA3yDvnxDPj5BgMBCQYM9gejwRGQAAAcdJREFUWMPt2E1zozAMgGEV25A0SVf+AAcIJGm7//8vLptOa4tOD7V0yEz73rg8o8RgBkNqd9BPCr+detLbHXyuahSWpyug7Rpk1hgy3gOye8iGfEweR3yk88nNuEseVzQ3sEGxGliqULBqATXSXkNwxeAewGCeu3R26dgXgsrAFrPCwr0VC6f8Q37xi021ZaCGOl1Mo826FIE1qHQRbV7nSkAFmBot6RlLysCTpUUuGFbgkT2hNOhWoOeCeKZgYIOBeCOyQXojzgKga5PXIwNM/X1f4RPKgDj3w3nwAZEN0n7BnwcGf7W2jZMQ6PzH/uP4IH0eWycAerJH8sHJkgIbjBT0bLCl4MgG7ar7A6/Ua9mgp2Bkg4GC8/3d2KtH7x43h6U5LlNefbjfDfYX/MGgC+EkCPZHu9TFSQZ0N+5GvoiArU31AqCnn5lscLKkCxt8pmDHBgdLe+WC5xUYZCekoCpbZFpaZgV1CRi+/LKuQXP/RHpnazgUgafui5f1FowqEvskHjHLAOyxqHl84zpyGqM5x33hMgyxd5hXwdIGxdrA/4zskan8oa78sbP8wbjIymwM0CrN0NS+gs+Zra5VAVbrQzbdP73gh5I0//e6AAAAAElFTkSuQmCC)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n4[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAXVBMVEUAAAD8LC33KCz/Jyz7LC38Ky37LCz7Kyz7Ky36Kiz6Kiv6LS37LC3/4An/yg37Nyv8Qij+sxL9WyP9ex39hhv+nBb/1Qv9kRn/vhD9cB/9bx/+yg38Tib+qBT+kRkVbCiZAAAADHRSTlMA3yAQ75/PkI9gMGCdesX1AAAB7ElEQVRYw+2Z3ZKDIAyFadGqbUTw36p9/8fccbtdDBboatYrz/WZLwHMECLT4rfwEsCfFVzChLOlznEA6xWeDRyPYaNijtI7wWadZkleNW8L8Yrzo8uRTzwa4nMfYyBT/L1gINS06JASGDHGgVIBZwmQKmEhLTBkF1rghQWAlDdt36o7+JUVY9+rRhqbyLBpTJ8SXmRe/1grjERAKdJflW5eqZ1CWoFtOlPu4nVzp8JA7NISLqBA1jsCLhP0p5hjp3oPzFKsxg5sDGuGgCgsimuVMqwDNTB/C5SGa7QDq4+WDD12Ob7tAjuF5ZRL7JKOsquRtbAAM6E9nlIpUOjMAoRhFrgCLfcu1vbSAynMj9BfzGIADMTq1BTzkYNXspqiqyIDC1A7tcWjTMJCDDbpAB7AA3gAD+AOwH2ugKxQ00VWST8tb6ZLV92dwEF8dM2jjk64eux1F/0AH7UihYtXeluRZU9VO85GCmQtLUDt8qXYYafw9Nj+XRwNq9ynJR6IgfTPClBrHz7tXk8zUBaXJ8V2v+ctyOpVJjl41L2Cj7iizBGBfKi+HwttciBV27dmNx6QDzHoxyw3WmDCeEAK5IxFtCumH/eRphiRj0yph7rUY+d/G4yTnEzEGdZ5Sw0G0ZktxZO1vz9us+y+AN1cKa1UzOLHAAAAAElFTkSuQmCC)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n5[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAclBMVEUAAAD7LC38Ky38LS38Ky37LCz3KDD3KCj/ICj/MDD7Ky36Kiz7LCz6Kiv6Kyz6LS37LC3////7OTr8YWH+y8v+o6P7R0f/8vL+sLD9e3z/2Nj/5eX8U1T+vb39lZb9iIn9lpb+5eX8Rkf+r7D9bm/8bm9teF1RAAAAEHRSTlMA75/f388gIBAQj2CQMJBgYmGJvgAAAj9JREFUWMPtmdly6jAMhpUU0oSwON6zsfScvv8rFmhLLLciAfuC6fDdwfzzITuRQQEG8k06T9jNJPO0zOEnr4uE3U/6Cph8wQJZFKi8FxbMi1PkavCFGFe4vng15sgXZPzcxwWLxuK8YBaR06JThnkTgrNJ8E50DLMGKHBma6ojsh7XCXlKtlajtimgRCFTfWH5SHX9d7J9d98v0Yr/VwPNdWHjRIXbgzAfXui2cthe8+3dpHFWMwfnSLCVFyPRTg5/dgJOrMWxHS2scdKwAUfYVZh/tLD3om+/CoWXkrRQelFBVDhZ2E8Sci+laKHyohwJqYUIWijotQAZaxmbuok1FhI3oiZt/n5bRgl5433qpDtRckLotpTsaBfuU7PH74Ofq3vZK8EmIJSUdseZLwzlKfwjQqEOVdVYHUnI1eX84eFC3I8NDxfis0+FC7V3SAYLLRaqYGGDhW2wsPJ4POEB+5pgocJCGywUWKgf78b2Wu8RD4cj2h6rPCjxuAfsU/jnhN30aVSIbkyolTm3WD2uq+Upaay+JqwN/llKw+V30ryTQjyN0kb/q6amhLqdfFIpPGYSQlsh7ppG2X3T6O45jbrChJ2JNY0mw0OMONPoHFIUC55GU9g4sRumUUPsTQlF4jTosNlmbBo1v1+8AmDtvt63N0+j6P5PASDDuVpJO3Ea3fa9rXGDZnBkyaKxhBPFLJZvlsOZbBbJl10eO8+i+FZwIZvFrA+iXJllDpgsDbAl6wx+kpf3/v2xcar7AALyjDX9myo+AAAAAElFTkSuQmCC)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div.n6[data-v-55005ad8] {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAY1BMVEUAAAD8LC33KCz/Jyz7LC37Kyz8Kyz7LCz6Kiz6Kiv6Ky36LS37LC77LC3////8Rkf/5eX7OTr/8vL/2Nj+ysv9iIn9e3z+vb3+o6P8YWH+sLD+y8v9sLD9lpb9lZb9bm/8U1S+nO6IAAAADXRSTlMA3yAQ75Cfz2AwoGDPjyTqnwAAAkhJREFUWMPtmNFysyAQhWlFY5uugIKaRNO+/1P+JpnfBTc7TuPO9MZz+TkcDyizCwqVHYsvDb+W/irKTFG95xpeV/GuUmU5bFSeJfHeYLPeopAf6LfF8YPkE8qYod9Wx8c65iCm/D5hENRt0gWAaMQMJKUzVYKoSlWAqAp1AFEdlAbUz7Wx1rcGFnJXP/FAeegm3sdcq+hxXz1kAyQKdfXQleG9Q6jQr7k/pCMH5OeYj8gbh4bxOFRIxqF65G3MO2r4XcWq51eaKpGZuU34iRh26cCQBqcR25R7YvjgdA5Nyi0ToF4amooZWC3EvKgyWw3tiqGrUnlmYMNMuSJreGE+yhlZ8ieOax+lZX6PU8pP8HxKLRqmq0y3SkcD0ogWqKGx8UqhXMStAdSFcDRER9zsyOdl9AmHfn6/gdgQ1d5eWp/ndUJeT9wTfjrfeQtADDGOWYAV7pZcwVbthrvhbrgb7oZ/Y2gcUK2XBq5I+VvRGWgx8rQYzUWqYouUabAJjOX8fz6YhPekLLOF3gM85dYBqlkp9JZpRYaYd8jHtClba5bmKFyzZFLeMu0cjTgw7VyQ7LExAMqJt8Qrhs1WQ6iZKQv12PjVeu6jMAFU/HvQP5U/mrl0St/EEDoakEa8Ig8k+AvH2wEpf7ylm70OkGhkeLDPDuAaUKa/WNsFBwuZMHE/Ut5OvBl/IqTlLzE+QVSFOoKoSpVpkFSmVC47Y/nrPtGIufiVqfSlrvi1s/zFOErs6h5DbtmDOsd4qKz8POgXzA7FMUr3DxtiRX+L28y5AAAAAElFTkSuQmCC)
    }
    
    .MyGameRecordList_C-detail-line .numList>div>div+div[data-v-55005ad8] {
        margin-left: .10667rem
    }
    
    .MyGameRecordList_C-detail-line .line1[data-v-55005ad8] {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        width: 100%;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap
    }
    
    .MyGameRecordList_C-detail-line .line1 .num[data-v-55005ad8] {
        margin-left: .08rem;
        height: .48rem;
        width: .48rem;
        text-align: center;
        line-height: .48rem;
        border-radius: 50%;
        border: .01333rem solid #000;
        font-size: .32rem;
        color: #000
    }
    
    .MyGameRecordList_C-detail-line .line1 .btn[data-v-55005ad8] {
        height: .53333rem;
        line-height: .53333rem;
        border-radius: .08rem;
        padding: 0 .26667rem;
        font-size: .32rem;
        margin: .05333rem .10667rem;
        background-color: #ccc
    }
    
    .MyGameRecordList_C-detail-line .line1 .btn.actionViolet[data-v-55005ad8] {
        color: #fff;
        background-color: #eb43dd
    }
    
    .MyGameRecordList_C-detail-line .line1 .btn.actionRed[data-v-55005ad8] {
        color: #fff;
        background-color: #fb4e4e
    }
    
    .MyGameRecordList_C-detail-line .line1 .btn.actionGreen[data-v-55005ad8] {
        color: #fff;
        background-color: #5cba47
    }
    
    .MyGameRecordList_C-detail-line .line1 .btn.actionRedGreen[data-v-55005ad8] {
        color: #fff;
        background-color: #fb4e4e;
        background-image: -webkit-linear-gradient(left,#fb4e4e 35%,#5cba47 65%);
        background-image: linear-gradient(90deg,#fb4e4e 35%,#5cba47 65%)
    }
    </style>
</head>

<body>
    <div class="container homecontainer">
        @include('home.layout.header_3')
        <div class="body">
            <div class="body-top">
                <div>
                    <div class="GameRecord__C-foot">
                        <div class="GameRecord__C-foot-prev btnPrevHistory">
                            <i class=" bi bi-chevron-right"></i>

                        </div>
                        <div class="GameRecord__C-foot-page showTotalHistory"></div>
                        <div class="GameRecord__C-foot-next btnNextHistory">
                            <i class=" bi bi-chevron-right"></i>

                        </div>
                    </div>
                    <div class="MyGameRecordList_C" id="listHistorySessionPlay">
                                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    <script>
        $(document).ready(function() {
            var offset = 0;
            var total = 0;
            function getHistoryPlay() {
                $.ajax({
                    url: '/history-play',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        offset: offset,
                        limit: 20
                    },
                    success: function(res) {
                        var html = '';
                        total = res.total;
                        $('.showTotalHistory').html((offset == 0 ? 1 : 1 + (offset / 20)) + '/' + Math
                            .round(res.total / 20).toString());
                        if (res.data.length > 0) {
                            for (var i = 0; i < res.data.length; i++) {
                               var className = "";
                                if(res.data[i].value == 'Hot trend' || res.data[i].value == 'Viral'){
                                    className = 'MyGameRecordList_C-item-l-big';
                                }
                                else if(res.data[i].value == 'Vàng bạc' ){
                                   className = 'MyGameRecordList_C-item-l-1 ';
                                }
                                else if(res.data[i].value == 'V1' || res.data[i].value == 'V2' || res.data[i].value == 'P' || res.data[i].value == 'V3'){
                                    className = 'MyGameRecordList_C-item-l-1 fontsize20';
                                }
                                else if(res.data[i].value == 'Xăng dầu' ){
                                   className = 'MyGameRecordList_C-item-l-5 ';
                                }
                                else if( res.data[i].value == 'LG' || res.data[i].value == 'A1' || res.data[i].value == 'A2' || res.data[i].value == 'D'){
                                    className = 'MyGameRecordList_C-item-l-5 fontsize20';
                                }
                                else if( res.data[i].value == "Lúa gạo")
                                {
                                    className = 'MyGameRecordList_C-item-l-20 ' ;
                                }
                                else if(res.data[i].value == 'A' || res.data[i].value == 'B' )
                                {
                                    className = 'MyGameRecordList_C-item-l-20 fontsize20' ;
                                }
                                else{
                                    className = 'MyGameRecordList_C-item-l-6';
                                }
                                html += '<div data-v-55005ad8="" class="MyGameRecordList_C-item" data-row="'+res.data[i].id+'">';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-l '+className+'">'+res.data[i].value+'</div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-m">';
                                html += '        <div data-v-55005ad8="" class="MyGameRecordList_C-item-m-top">' + res.data[i].session_id + '</div>';
                                html += '        <div data-v-55005ad8="" class="MyGameRecordList_C-item-m-bottom">' + res.data[i].created_at + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-r '+(res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'success'))+'">';
                                html += '        <div data-v-55005ad8="">'+(res.data[i].status == 0 ? 'Chờ kết quả' : (res.data[i].status == 2 ? 'Thất bại' : 'Thành công'))+'</div><span data-v-55005ad8="">'+(res.data[i].status == 0 ? '...' : (res.data[i].status == 2 ?  '-' + accounting.formatNumber(res.data[i].money - res.data[i].vat) +'.00₫' : '+' + accounting.formatNumber(res.data[i].receive) + '.00₫'))+'</span>';
                                html += '    </div>';
                                html += '</div>';
                                
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail" style="display:none" data-row="'+res.data[i].id+'">';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-text">Chi tiết</div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Mã đơn hàng <div data-v-55005ad8=""><span';
                                html += '                data-v-55005ad8="" class="orderNum">WG'+res.data[i].id+'</span><img data-v-55005ad8=""';
                                html += '                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAhFBMVEUAAABRUVFQUFBRUVFRUVFRUVFRUVFRUVFQUFBRUVFQUFBRUVFQUFBQUFBRUVFRUVFSUlJSUlJRUVFQUFBSUlJRUVFRUVFRUVFRUVFRUVFRUVFQUFBRUVFRUVFRUVFRUVFQUFBRUVFRUVFRUVFQUFBQUFBQUFBSUlJYWFhJSUlQUFBRUVGJ3MxyAAAAK3RSTlMAv0B6VerZrqiblYmCaGJIOiQdFg/79vDl39TKxbq0oY9zblxONC4pCQTPqkRvegAAAWZJREFUeNrtz0duw0AQAEGSzjnnnIP+/z8ffJOBgRfgiCts9Qca1UmSNGZDP0FDN37DbIJAQH4DAQGJAwEBiQMBAYlbTsjQLWcgtQVSWyC1BVJbILUFUlsgtdUQZJiyMSGzKRsTclbwBQEpgJwXfEFACiAXBV8QkALIWsEXBKRFyGXBF2QKSD/k1WdCruYhXV4gTUHWQUBAQsg1CEgO5BukMsgNCEgO5BYEJAfSg4CAhJA7EJAcyD0ISA5kAwQEJIRsgoCAhJAHEJAcyBYICEgI2QYBAQkhjyAgOZAdEBCQELILAgISQlZAQEDagDyBgORAnkFAciB7ICAgIWQfBAQkhLyAgORAVkEWC+nnWlbI30Bqh7yCgORADkBAQMIGEBCQNiCHICAgYW8gIDmQdxCQHMgHCEgO5AgEBCTsGKRySGog/+ik4AsC0iLktOALAtIi5LPgCwJS0FfBFwSkpH7COkmSMvoBUQl8xsUGEfcAAAAASUVORK5CYII=">';
                                html += '        </div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Kỳ trao đổi <div data-v-55005ad8="">'+res.data[i].session_id+'</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Số tiền chọn mã <div data-v-55005ad8="" class="gold">'+accounting.formatNumber(res.data[i].money)+'.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Số tiền sau thuế <div data-v-55005ad8="" class="gold">'+accounting.formatNumber(res.data[i].money - res.data[i].vat)+'.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Thuế <div data-v-55005ad8="">'+accounting.formatNumber(res.data[i].vat)+'.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Mã sản phẩm <div data-v-55005ad8="">'+res.data[i].type+'</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Chọn <div data-v-55005ad8="">'+res.data[i].value+'</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Tình trạng <div data-v-55005ad8="" class="'+(res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'green'))+'">'+(res.data[i].status == 0 ? 'Chờ kết quả' : (res.data[i].status == 2 ? 'Thất bại' : 'Thành công'))+'</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Kết quả <div data-v-55005ad8="" class="'+(res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'green'))+'">'+(res.data[i].status == 0 ? '...' : (res.data[i].status == 2 ? '-' + accounting.formatNumber(res.data[i].money - res.data[i].vat) + '.00₫' : '+' + accounting.formatNumber(res.data[i].receive) + '.00₫'))+'</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Thời gian tạo <div data-v-55005ad8="" class="time">'+res.data[i].created_at+'</div>';
                                html += '    </div>';
                                html += '</div>';
                            }
                            $('#listHistorySessionPlay').html(html);
                            $('.MyGameRecordList_C-item').click(function(){
                                var row = $(this).data('row');
                                if($('.MyGameRecordList_C-detail[data-row="'+row+'"]').css('display') == 'none'){
                                    $('.MyGameRecordList_C-detail[data-row="'+row+'"]').css('display', 'block');
                                }
                                else{
                                    $('.MyGameRecordList_C-detail[data-row="'+row+'"]').css('display', 'none');
                                }
                            });
                        } else {
                            $('#listHistorySessionPlay').html('Không có lịch sử');
                        }
                    }
                });
            }

            $('.btnPrevHistory').click(function() {
                if(offset < 20) return;
                if (offset <= 20) {
                    $(this).css('background', '#303454');
                }
                else {
                    $(this).css('background','#ff650bc4');
                }
                offset -= 20;
                getHistoryPlay();
            });
            $('.btnNextHistory').css('background','#ff650bc4');
            $('.btnNextHistory').click(function() {
                if (offset > total) {
                    return;
                }
                offset += 20;
                getHistoryPlay();
                $(this).css('background', '#ff650bc4');
                $('.btnPrevHistory').css('background', '#ff650bc4');
            });

            getHistoryPlay();

        });
    </script>
</body>

</html>

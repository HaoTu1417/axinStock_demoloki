<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=6500">
    <link rel="stylesheet" href="/assets/css/module.css?id=7613">
    <link rel="stylesheet" href="/assets/css/betting.css?id=<?php echo rand(0, 9999); ?>">
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            background-image: url(/assets/images/ba.png);
            background-repeat: no-repeat;
            background-size: cover;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            padding: 20px;
        }

        @media only screen and (max-width: 756px) {
            .TimeLeft_C {
                width: 100%;
                height: 100px !important;
                position: relative;
                background-image: url(/assets/images/ba.png);
                background-repeat: no-repeat;
                background-size: cover;
                display: -webkit-box;
                display: -webkit-flex;
                display: flex;
                padding: 20px;
            }
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
            background-image: linear-gradient(166deg, #000 -4.68%, #fedd84 140.37%);
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
            background: #ffeb00;
            width: 32%;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Betting_C-head-p {
            background: #30cd4a;
            width: 32%;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Betting_C-head-r {
            background: #f94b4b;
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
            background-size: cover !important;
        }

        @media screen and (min-width: 768px) {
            .Betting_C-numC {
                background-size: cover !important;
            }

            .TimeLeft_C {
                background-size: cover !important;

            }

        }

        @media (min-width: 576px) {
            .Betting__Popup {
                max-width: 540px;
            }

            .TimeLeft__C-PreSale {
                max-width: 540px;
            }
        }

        @media screen and (min-width: 768px) {
            .Betting__Popup {
                max-width: 400px;
            }

            .TimeLeft__C-PreSale {
                max-width: 400px;
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

        .lineElement {
            padding: 0 !important;
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
            background-image: url(/assets/images/n0-700ec4b1.png);

        }

        .Betting_C-numC>div.Betting_C-numC-item5 {
            background-image: url(/assets/images/n1-700ec4b1.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item1 {
            background-image: url(/assets/images/n1-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item2 {
            background-image: url(/assets/images/n5-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item3 {
            background-image: url(/assets/images/n2-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item7 {
            background-image: url(/assets/images/n3-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item4 {
            background-image: url(/assets/images/n6-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item6 {
            background-image: url(/assets/images/n7-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item8 {
            background-image: url(/assets/images/n8-49fe9ced.png);
        }

        .Betting_C-numC>div.Betting_C-numC-item9 {
            background-image: url(/assets/images/n444-49fe9ced.png);
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
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: #fedd84;
        }

        .Betting_C-footA {
            background-image: url(/assets/images/1_1arabic_8743894.png);
        }

        .Betting_C-footB {
            background-image: url(/assets/images/2_2arabic_8743894.png);
        }


        .Betting_right {
            width: calc((100% - 0.21333rem)/2);
            height: 54px;
            line-height: 54px;
            background-image: url(/assets/images/1arabic_8743894.png);
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
            white-space: nowrap;
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
            width: 23px;
            height: 22px;
            line-height: 20px;
            font-size: 13px;
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

        .MyGameRecordList_C-item-r.red div[data-v-55005ad8] {
            color: #ef4770 !important;
            border-color: #ef4770 !important;
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
            background-image: url(/assets/images/V.png);
        }

        .Trend__C-body2-Num-BS {
            width: 16px;
            height: 16px;
            margin-left: 12px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url(/assets/images/H.png);
        }

        .Trend__C-body2-Num-item.action {
            position: relative;
            z-index: 10;
            border: none;
            color: #fff;
            background: #cd9047;
        }
    </style>
</head>

<body>
    <input type="text" id="isMobile" hidden value="<?= preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$_SERVER['HTTP_USER_AGENT'])||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4)) ? 'true' : 'false' ?>" />
    <div class="container homecontainer">
        <style>
            .navbar {
                height: 50px;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                background-color: #1E2034;
                padding: 0 8px;
            }

            .navbar-fixed {}

            .navbar__content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: 50px;
                position: absolute;
                right: 0;
                left: 0;
                top: 0;
            }

            .navbar__content-title {
                font-size: 20px;
            }

            .amount {
                display: flex;
                justify-content: center;
                flex-direction: column;
                height: 50px;
            }

            .amount p {
                font-size: 12px;
                margin: 0;
                margin-right: 13px;
            }

            i.icon-back.bi-chevron-left {
                font-site: 20px !important;
            }

            .nav-pills .nav-link.active,
            .nav-pills .show>.nav-link {
                color: #fff !important;
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

            .MyGameRecordList_C-item-l-20 {
                background: #30cd4a;
            }

            .MyGameRecordList_C-item-l-red[data-v-55005ad8],
            .MyGameRecordList_C-item-l-2[data-v-55005ad8],
            .MyGameRecordList_C-item-l-4[data-v-55005ad8],
            .MyGameRecordList_C-item-l-6[data-v-55005ad8],
            .MyGameRecordList_C-item-l-8[data-v-55005ad8] {
                background: var(--ar-bodybg);
                border: 0.01333rem solid var(--ar-orange1);
            }

            .MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
                background-color: var(--ar-red1)
            }

            .MyGameRecordList_C-item-l-green[data-v-55005ad8],
            .MyGameRecordList_C-item-l-1[data-v-55005ad8],
            .MyGameRecordList_C-item-l-3[data-v-55005ad8],
            .MyGameRecordList_C-item-l-7[data-v-55005ad8],
            .MyGameRecordList_C-item-l-9[data-v-55005ad8] {
                background-color: #ffeb00;
                color: black;
            }

            .MyGameRecordList_C-item-l-0[data-v-55005ad8],
            .MyGameRecordList_C-item-l-5[data-v-55005ad8] {
                background-color: #f94b4b;
            }

            .MyGameRecordList_C-item-l-red[data-v-55005ad8],
            .MyGameRecordList_C-item-l-green[data-v-55005ad8],
            .MyGameRecordList_C-item-l-small[data-v-55005ad8],
            .MyGameRecordList_C-item-l-big[data-v-55005ad8],
            .MyGameRecordList_C-item-l-violet[data-v-55005ad8] {
                font-size: 13px
            }

            .MyGameRecordList_C-item-l-small[data-v-55005ad8],
            .MyGameRecordList_C-item-l-big[data-v-55005ad8] {
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

            .MyGameRecordList_C-detail-line[data-v-55005ad8] {
                height: auto;
                line-height: 15px;
                font-size: 15px;
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

            .fontsize20 {
                font-size: 20px !important;
            }

            .white {
                color: #fff !important;
            }

            .MyGameRecordList_C-detail-line .line1 .btn.actionRedGreen[data-v-55005ad8] {
                color: #fff;
                background-color: #fb4e4e;
                background-image: -webkit-linear-gradient(left, #fb4e4e 35%, #5cba47 65%);
                background-image: linear-gradient(90deg, #fb4e4e 35%, #5cba47 65%)
            }
        </style>
        <div class="navbar">
            <div class="navbar-fixed" style="background: var(--ar-black2);">
                <div class="navbar__content">
                    <div class="navbar__content-left">
                        <i onclick="window.location.href = '/home'" style="color:#fff" class="icon-back bi bi-chevron-left"></i>
                    </div>
                    <div class="navbar__content-center">
                        <!---->
                        <div class="navbar__content-title" style="color:#fff">BIG STORE</div>
                    </div>
                    <div class="navbar__content-right">
                        <div class="amount">
                            <p class="amountDisplay">
                                <?= number_format($information->money) ?>.00đ
                            </p>
                            <p>Số dư ví</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="body-top">
                <div class="TimeLeft_C">
                    <div class="TimeLeft_C-rule">
                        <span><i style="padding-right:5px;" class="fa fa-book" aria-hidden="true"></i></span>
                        <span id="btnHDSD">Hướng Dẫn</span>
                    </div>
                    <div class="TimeLeft_C-l">
                        <div class="TimeLeft_C-name" style="color: #000; font-weight:bold">Big Store Kỳ Trao Đổi</div>
                        <div class="TimeLeft_C-id" style="font-size: 22px; font-weight:bold" id="sessionIdShow">
                            <?= $session_id ?>
                        </div>
                    </div>
                    <div class="TimeLeft_C-r">
                        <div class="TimeLeft_C-text" style="color: #000; font-weight:bold">Thời gian còn lại</div>
                        <div class="TimeLeft_C-time">
                            <div class="t1">0</div>
                            <div class="t2">0</div>
                            <div class="symbol" style="color: #000 !important;">:</div>
                            <div class="t3">0</div>
                            <div class="t4">0</div>
                        </div>
                    </div>
                    <p class="TimeLeft_C-tip"  style="color: #fff">Chọn Mã</p>

                </div>
                <div class="Betting_C-head ">
                    <div class="Betting_C-head-g bettingChoose" style="cursor: pointer;" data-pic=""
                        data-name="Vàng Bạc" data-value="gold">Vàng Bạc
                    </div>
                    <div class="Betting_C-head-p bettingChoose" style="cursor: pointer;" data-pic="" data-name="Lúa Gạo"
                        data-value="ruby">Lúa Gạo</div>
                    <div class="Betting_C-head-r bettingChoose" style="cursor: pointer;" data-pic=""
                        data-name="Xăng Dầu" data-value="platinum">Xăng Dầu</div>
                </div>

                <div class="body-center">
                    <div class="Betting_C-numC">
                        <div class="active Betting_C-numC-item0 w5 bettingChoose" data-pic="pic0" data-value="a"></div>
                        <div class="Betting_C-numC-item5 w5 bettingChoose" data-pic="pic5" data-value="b"></div>
                        <div class="Betting_C-numC-item1 bettingChoose" data-pic="pic1" data-value="c"></div>
                        <div class="Betting_C-numC-item2 bettingChoose" data-pic="pic2" data-value="d"></div>
                        <div class="Betting_C-numC-item3 bettingChoose" data-pic="pic3" data-value="e"></div>
                        <div class="Betting_C-numC-item4 bettingChoose" data-pic="pic4" data-value="f"></div>
                        <div class="Betting_C-numC-item6 bettingChoose" data-pic="pic6" data-value="g"></div>
                        <div class="Betting_C-numC-item7 bettingChoose" data-pic="pic7" data-value="h"></div>
                        <div class="Betting_C-numC-item8 bettingChoose" data-pic="pic8" data-value="i"></div>
                        <div class="Betting_C-numC-item9 bettingChoose" data-pic="pic9" data-value="j"></div>
                    </div>

                    <div class="Betting_C-foot">
                        <div class="Betting_C-footB bettingChoose" data-pic="" data-name="Hot Trend" data-value="ring">
                            Hot Trend</div>
                        <div class="Betting_C-footA bettingChoose" data-pic="" data-name="Viral" data-value="neck">Viral
                        </div>
                    </div>
                </div>

                <div>
                    <div class="tablist-home">
                        <ul class="nav nav-pills mb-3 ulTab" id="pills-tab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                    aria-selected="true" style="font-size: 14px;" onclick="hideLineLoad()">Lịch Sử Chọn Mã</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-yellow-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-yellow" type="button" role="tab" aria-controls="pills-yellow"
                                    aria-selected="false" style="font-size: 14px;" onclick="creatlineLoad();">Biểu
                                    Đồ</button>
                            </li>
                            <li class="nav-item " role="presentation">
                                <button class="nav-link" id="pills-ring-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-ring" type="button" role="tab" aria-controls="pills-ring"
                                    aria-selected="false" style="font-size: 14px;" onclick="hideLineLoad()">Lịch Sử Của Tôi</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                                aria-labelledby="pills-all-tab" tabindex="0">
                                <div class="GameRecord__C-head">
                                    <div class="row" style="color:#fff">
                                        <div class="col col-3">Kỳ trao đổi</div>
                                        <div class="col col-2">
                                            <!---->
                                        </div>
                                        <div class="col col-3">Loại hình</div>
                                        <div class="col col-4">sản phẩm</div>
                                    </div>
                                </div>
                                <div class="list-body" id="listHistorySession"
                                    style="margin-bottom:20px;font-size: 13px;">

                                </div>
                                <div class="GameRecord__C-foot">
                                    <div class="GameRecord__C-foot-prev btnPrevHistory">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                    <div class="GameRecord__C-foot-page showTotalHistory"></div>
                                    <div class="GameRecord__C-foot-next btnNextHistory">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="pills-yellow" role="tabpanel"
                                aria-labelledby="pills-yellow-tab" tabindex="0">
                                <div class="GameRecord__C-head">
                                    <div class="row" style="color:#fff">
                                        <div class="col col-6">Kỳ trao đổi</div>

                                        <div class="col col-6">Loại hình</div>
                                    </div>
                                </div>

                                <div class="Trend__C-body1">
                                    <div class="Trend__C-body1-line header">Hỗ trợ chọn mã (100 kỳ trao đổi trước đây )
                                    </div>
                                    <div class="Trend__C-body1-line lottery">
                                        <div>Mã sản phẩm</div>
                                        <div class="Trend__C-body1-line-num">
                                            <div>A</div>
                                            <div>B</div>
                                            <div>V1</div>
                                            <div>LG</div>
                                            <div>V2</div>
                                            <div>A1</div>
                                            <div>A2</div>
                                            <div>P</div>
                                            <div>D</div>
                                            <div>V3</div>
                                        </div>
                                    </div>
                                    <div class="Trend__C-body1-line">
                                        <div>Số kỳ chưa trao đổi</div>
                                        <div class="Trend__C-body1-line-num">
                                            <div>1</div>
                                            <div>3</div>
                                            <div>13</div>
                                            <div>24</div>
                                            <div>0</div>
                                            <div>7</div>
                                            <div>6</div>
                                            <div>9</div>
                                            <div>2</div>
                                            <div>4</div>
                                        </div>
                                    </div>
                                    <div class="Trend__C-body1-line">
                                        <div>Bình quân số kỳ</div>
                                        <div class="Trend__C-body1-line-num">
                                            <div>13</div>
                                            <div>9</div>
                                            <div>8</div>
                                            <div>10</div>
                                            <div>13</div>
                                            <div>13</div>
                                            <div>11</div>
                                            <div>6</div>
                                            <div>6</div>
                                            <div>6</div>
                                        </div>
                                    </div>
                                    <div class="Trend__C-body1-line">
                                        <div>Tần số xuất hiện</div>
                                        <div class="Trend__C-body1-line-num">
                                            <div>9</div>
                                            <div>9</div>
                                            <div>10</div>
                                            <div>10</div>
                                            <div>9</div>
                                            <div>6</div>
                                            <div>9</div>
                                            <div>12</div>
                                            <div>14</div>
                                            <div>12</div>
                                        </div>
                                    </div>
                                    <div class="Trend__C-body1-line">
                                        <div>Số kỳ liên tiếp tối đa</div>
                                        <div class="Trend__C-body1-line-num">
                                            <div>3</div>
                                            <div>1</div>
                                            <div>1</div>
                                            <div>2</div>
                                            <div>2</div>
                                            <div>1</div>
                                            <div>3</div>
                                            <div>1</div>
                                            <div>3</div>
                                            <div>1</div>
                                        </div>
                                    </div>
                                </div>


                                <div style="margin-bottom:20px" class="Trend__C-body2" id="historySoiCau">

                                </div>


                                <div class="GameRecord__C-foot">
                                    <div class="GameRecord__C-foot-prev btnPrevHistorySoiCau">
                                        <i class="bi bi-chevron-right"></i>

                                    </div>
                                    <div class="GameRecord__C-foot-page showTotalHistorySoiCau"></div>
                                    <div class="GameRecord__C-foot-next btnNextHistorySoiCau">
                                        <i class="bi bi-chevron-right"></i>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-ring" role="tabpanel" aria-labelledby="pills-ring-tab"
                                tabindex="0">
                                <div data-v-138cfa8d="" class="MyGameRecord__C-head">
                                    <div data-v-138cfa8d="" style="color: #fff; text-align: right;"
                                        class="MyGameRecord__C-head-moreB"
                                        onclick="window.location.href = '/historyplay'">Lịch sử >></div>
                                </div>
                                <div class="MyGameRecordList_C" id="listHistorySessionPlay">

                                </div>
                                <div class="GameRecord__C-foot">
                                    <div class="GameRecord__C-foot-prev btnPrevHistoryPlay">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                    <div class="GameRecord__C-foot-page showTotalHistoryPlay"></div>
                                    <div class="GameRecord__C-foot-next btnNextHistoryPlay">
                                        <i class=" bi bi-chevron-right"></i>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="van-overlay vanoverlayOpenCountDown" data-v-cbb9ef13="" style="z-index: 2011; display: none;"><!---->
    </div>
    <div role="dialog" tabindex="0" id="popupOpenCountDown" class="van-popup van-popup--round van-popup--center"
        data-v-fe0f96b7="" style="z-index: 2011; width: 60%; background-color: transparent; display:none">
        <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale"
            style="background: transparent; color: #fff; margin: auto; padding: 15px; border-radius: 15px;">
            <div style="display:flex">
                <div style="width: 50%; padding: 10px; text-align:center">
                    <div style="background: #cd9047; border-radius: 10px">
                        <span style="font-size: 110px; font-weight: bold; color: #fff" id="txtCountDownPopUp">0</span>
                    </div>
                </div>
                <div style="width: 50%; padding: 10px; text-align:center;">
                    <div style="background: #cd9047; border-radius: 10px">
                        <span style="font-size: 110px; font-weight: bold; color: #fff" id="txtCountDownPopUp2">0</span>
                    </div>
                </div>
            </div>
        </div><!---->
    </div>

    <div class="van-overlay vanoverlayNotification" data-v-cbb9ef13="" style="z-index: 2010; display: none;"><!---->
    </div>
    <div role="dialog" tabindex="0" id="popupOpenNotification" class="van-popup van-popup--round van-popup--center"
        data-v-fe0f96b7=""
        style="z-index: 2010; width: 100%; width: 350px; height: 300px; padding: 20px; background-color: transparent; background-image: url('/assets/images/win1.png'); background-size: 100%; display:none">
        <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale"
            style="background: transparent; color: #fff; margin: auto; padding: 15px; border-radius: 15px;">
            <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale-body">
                <div data-v-fe0f96b7="" style="padding-top: 165px; margin-bottom: 20px">
                    <h6 id="txtXemchitiet" style="text-align:center; color: #fff"
                        onclick="window.location.href='/historyplay'">Xem chi tiết >></h4>
                </div>
                <img id="btnCloseNotification" style="position: absolute; left: 45%; bottom: 0px; height: 30px;"
                    src="https://fb333.com/assets/png/clean-a69ecd66.png" alt="">
            </div>
        </div><!---->
    </div>
    <div class="van-overlay vanoverlayHDSD" data-v-cbb9ef13="" style="z-index: 2001; display: none;"><!----></div>
    <div role="dialog" tabindex="0" id="popupHDSD" class="van-popup van-popup--round van-popup--center"
        data-v-fe0f96b7="" style="z-index: 2001; width: 100%; background: transparent; display:none">
        <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale"
            style="background: #1E2034; color: #fff; margin: auto; padding: 15px; border-radius: 15px;">
            <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale-head" style="    padding: 10px 0;
    text-align: center;
    border-bottom: 1px solid;">Cách Chọn Mã</div>
            <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale-body">
                <div data-v-fe0f96b7="">
                    <p class="p0" style="margin-bottom:0pt; margin-top:15px; ">
                        <font>QUY TẮC CHỌN MÃ Big-Store</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>* Quy định Big-Store</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>(1) Trong 1 kỳ chọn mã không được phép chọn cùng lúc HotTrend và Viral, Vàng Bạc và Xăng
                            Dầu
                        </font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>(2) Trong 1 kỳ chọn mã không được phép chọn 7 chữ cái trở lên</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>(3) Nếu phát hiện vi phạm lệnh rút tiền sẽ bị hủy bỏ</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font><br></font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>GIẢI THƯỞNG</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>Một phút mở thưởng một lần, 50 giây để chọn mã, 10 giây còn lại tạm ngưng chọn mã để chờ mở
                            kết quả. Giải thưởng sẽ được mở cả ngày. Tổng số lượt mở thưởng mỗi ngày là 1440 lượt. Nếu
                            bạn thực hiện một giao dịch mua là 5000, sẽ có khoản khấu trừ là 100, do đó khoản đầu tư
                            thực tế của bạn là 4900.
                        </font>
                    </p>
                    <!--<p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">-->
                    <!--    <font>Nếu bạn thực hiện một giao dịch mua là 5000, sẽ có khoản khấu trừ là 100, do đó khoản cược-->
                    <!--        thực tế của bạn là 4900.</font>-->
                    <!--</p>-->
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>1. Chọn mã chữ Vàng Bạc: Nếu kết quả hiển thị chữ Vàng Bạc trùng hình ảnh "V1, V2, P, V3"
                            bạn sẽ nhận được (4900*2)=9800.
                        </font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>*Nếu chọn mã chữ Vàng Bạc kết quả hiển thị chữ Vàng Bạc trùng với chữ cái A (ký hiệu hình
                            ảnh Vàng Bạc/Lúa Gạo) bạn sẽ nhận được ( 4900* 1.5)=7350.</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>2. Chọn mã chữ Xăng Dầu: Nếu kết quả hiển thị chữ Xăng Dầu trùng hình ảnh "LG, A1, A2, D "
                            bạn sẽ nhận được (4900*2)=9800.</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>*Nếu chọn mã chữ Xăng Dầu kết quả hiển thị chữ Xăng Dầu trùng với chữ cái B (ký hiệu hình
                            ảnh Xăng Dầu/Lúa Gạo) bạn sẽ nhận được (4900*1.5)
                        </font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>3. Chọn mã chữ Lúa Gạo: Nếu kết quả hiển thị chữ Lúa Gạo trùng với chữ cái A (ký hiệu hình
                            ảnh Vàng/Lúa Gạo) hoặc trùng với chữ cái B (ký hiệu hình ảnh Xăng Dầu/Lúa Gạo), bạn sẽ nhận
                            được (4900*4.5)=22050</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>4. Chọn mã chữ cái: A, B, V1, LG, V2, A1, A2, P, D, V3 nếu kết quả mở ra chữ cái giống với
                            chữ cái bạn đã chọn bạn sẽ nhận được (4900*9)=44100
                        </font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>5. Chọn mã chữ HotTrend: Nếu kết quả hiển thị chữ cái "B, A2, P, D, V3" bạn sẽ nhận được
                            (4900*2)=9800.</font>
                    </p>
                    <p class="p0" style="margin-bottom:0pt; margin-top:0pt; ">
                        <font>6. Chọn mã chữ Viral: Nếu kết quả hiển thị chữ cái "A, V1, LG, V2, A1" (4900*2)=9800.
                        </font>
                    </p>
                </div>
            </div>
            <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale-foot">
                <div data-v-fe0f96b7="" class="TimeLeft__C-PreSale-foot-btn" id="btnCloseHDSD" style="text-align: center;
    background: #CD9047;
    border-radius: 10px;
    padding: 10px;
    margin-top: 20px;
    cursor: pointer;">Đóng</div>
            </div>
        </div><!---->
    </div>
    <div class="van-overlay vanoverlayBetting" data-v-cbb9ef13="" style="z-index: 2004; display: none;"><!----></div>
    <div role="dialog" tabindex="0" id="popupBetting" class="van-popup van-popup--round van-popup--bottom"
        data-v-cbb9ef13="" style="z-index: 2004; width:100%; background:transparent; display: none;">
        <div data-v-cbb9ef13="" class="Betting__Popup" style="margin: auto;">
            <div data-v-cbb9ef13="" class="Betting__Popup-head">
                <div data-v-cbb9ef13="" class="Betting__Popup-head-selectName">
                    <div data-v-cbb9ef13="">Chọn</div>
                    <div data-v-cbb9ef13="" id="showPictureChoose" class=""></div>
                </div>
            </div>
            <input type="text" value="" id="txtProductChoose" style="display:none" />
            <div data-v-cbb9ef13="" class="Betting__Popup-body">
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line">Số tiền <div data-v-cbb9ef13=""
                        class="Betting__Popup-body-line-list">
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseAmount active"
                            data-amount="1000">1000</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseAmount"
                            data-amount="10000">10000</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseAmount"
                            data-amount="100000">100000</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseAmount"
                            data-amount="1000000">1000000</div>
                    </div>
                </div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line flex" style="height:auto">Số lượng
                    <div data-v-cbb9ef13="" class="Betting__Popup-body-line-btnL" style="padding-top: 10px;">
                        <div data-v-cbb9ef13="" class="Betting__Popup-btn subtract active" style="cursor: pointer;">
                        </div>
                        <div data-v-cbb9ef13="" class="van-cell van-field Betting__Popup-input"
                            modelmodifiers="[object Object]"><!----><!---->
                            <div class="van-cell__value van-field__value">
                                <div class="van-field__body"><input type="text" inputmode="numeric"
                                        id="van-field-1-input" value="1"
                                        class="van-field__control"><!----><!----><!----></div><!----><!---->
                            </div><!----><!---->
                        </div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-btn plus" style="cursor: pointer;"></div>
                    </div>
                </div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line">
                    <div data-v-cbb9ef13=""></div>
                    <div data-v-cbb9ef13="" class="Betting__Popup-body-line-list">
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity active"
                            data-quantity="1"> X1</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity"
                            data-quantity="5"> X5</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity"
                            data-quantity="10"> X10</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity"
                            data-quantity="20"> X20</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity"
                            data-quantity="50"> X50</div>
                        <div data-v-cbb9ef13="" class="Betting__Popup-body-line-item btnChooseQuantity"
                            data-quantity="100"> X100</div>
                    </div>
                </div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line bread">Số lượng <span data-v-cbb9ef13=""
                        class="red btnShowQuantity">1</span></div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line bread">Số dư ví <span data-v-cbb9ef13=""
                        class="white amountDisplay">0</span></div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line bread">Số tiền chọn mã <span data-v-cbb9ef13=""
                        class="gold btnShowAmount"></span></div>
                <div data-v-cbb9ef13="" class="Betting__Popup-body-line"><span data-v-cbb9ef13=""
                        class="Betting__Popup-agree active">Tôi đồng ý</span><span data-v-cbb9ef13=""
                        class="Betting__Popup-preSaleShow">Quy tắc bán trước</span></div>
            </div>
            <div data-v-cbb9ef13="" class="Betting__Popup-foot">
                <div data-v-cbb9ef13="" class="Betting__Popup-foot-c" style="cursor: pointer;">Hủy bỏ</div>
                <div data-v-cbb9ef13="" class="Betting__Popup-foot-s btnSubmitAmount" style="cursor: pointer;"></div>
            </div>
        </div><!---->
    </div>
    <input type="text" hidden id="txtValueCountDown" value="<?= $session_time ?>" />
    <input type="text" hidden id="txtSessionId" value="<?= $session_id ?>" />
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />

    <audio id="audio" src="/assets/audio/moc_cam.mp3"></audio>
    <!--<audio id="audio2" src="/assets/audio/moc_cam.mp3"></audio>-->

    <script>
        $(document).ready(function () {
            const t1 = $('.t1');
            const t2 = $('.t2');
            const t3 = $('.t3');
            const t4 = $('.t4');
            $('.Betting__Popup-foot-c').click(function () {
                $('#popupBetting').css('display', 'none');
                $('.vanoverlayBetting').css('display', 'none');
                $('#van-field-1-input').val('1');
                $('.btnChooseQuantity[data-quantity="1"]').trigger('click');
                $('.btnChooseAmount[data-amount="1000"]').trigger('click');
            });

            calculate();

            $('#btnHDSD').click(function () {
                $('#popupHDSD').css('display', 'block');
                $('.vanoverlayHDSD').css('display', 'block');
            });

            $('#btnCloseHDSD').click(function () {
                $('#popupHDSD').css('display', 'none');
                $('.vanoverlayHDSD').css('display', 'none');
            });
            
            $('#van-field-1-input').keyup(function(){
                calculate();
            });

            $('.subtract').click(function () {
                var quantity = parseInt($('#van-field-1-input').val());
                if (quantity <= 1) {
                    return;
                } else {
                    $('#van-field-1-input').val(quantity - 1);
                }
                calculate();
            });

            $('.bettingChoose').click(function () {
                var className = $(this).data('pic');
                if (className != '') {
                    $('#showPictureChoose').removeClass();
                    $('#showPictureChoose').html('');
                    $('#showPictureChoose').addClass('pic ' + className);
                } else {
                    var name = $(this).data('name');
                    $('#showPictureChoose').removeClass();
                    $('#showPictureChoose').html(name);
                }
                $('#popupBetting').css('display', 'block');
                $('.vanoverlayBetting').css('display', 'block');
                var value = $(this).data('value');
                $('#txtProductChoose').val(value);
            });

            $('.plus').click(function () {
                var quantity = parseInt($('#van-field-1-input').val());
                $('#van-field-1-input').val(quantity + 1);
                calculate();
            });

            $('.btnChooseAmount').click(function () {
                $('.btnChooseAmount').removeClass('active');
                $(this).addClass('active');
                calculate();
            });

            $('.btnChooseQuantity').click(function () {
                $('.btnChooseQuantity').removeClass('active');
                $(this).addClass('active');
                $('#van-field-1-input').val($(this).data('quantity'));
                calculate();
            });

            function calculate() {
                $('.btnShowAmount').html(accounting.formatNumber($('.btnChooseAmount.active').data('amount')));
                $('.btnShowQuantity').html($('#van-field-1-input').val());
                $('.btnSubmitAmount').html('Tổng tiền ' + accounting.formatNumber($('.btnChooseAmount.active').data(
                    'amount') * $('#van-field-1-input').val()))
            }


            setInterval(function () {
                countDownTime();
            }, 1000);


            function countDownTime() {
                let timer = parseInt($('#txtValueCountDown').val());

                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;


                if (timer <= 10) {
                    if ($('#popupOpenCountDown').css('display') == 'none') {
                        $('.vanoverlayOpenCountDown').show();
                        $('#popupOpenCountDown').show();
                    }

                    if (timer <= 0) {
                        $('.vanoverlayOpenCountDown').hide();
                        $('#popupOpenCountDown').hide();
                        // document.getElementById("audio2").play();
                    }
                    else {
                        document.getElementById("audio").play();
                        $('#txtCountDownPopUp').html(Math.floor(seconds / 10));
                        $('#txtCountDownPopUp2').html(seconds % 10);
                    }
                }
                if (timer < 0) {
                    getSession();
                    getHistorySoiCau();
                    getHistory();
                    getGift($('#txtSessionId').val());
                    getHistoryPlay();
                    return;
                }
                getinfo();
                $('.t2').text(minutes);
                $('.t3').html(Math.floor(seconds / 10));
                $('.t4').html(seconds % 10);
                $('#txtValueCountDown').val(timer - 1);
            }

            function getSession() {
                $.ajax({
                    url: '/session',
                    type: 'get',
                    data: {
                        _token: $('#csrf').val()
                    },
                    success: function (res) {
                        if (res.status) {
                            if (res.second > 0 && res.id > 0) {
                                $('#txtValueCountDown').val(res.second);
                                $('#txtSessionId').val(res.id);
                                $('#sessionIdShow').html(res.id);
                            }
                        }
                    }
                })
            }
            let offset = 0;
            let total = 0;

            let offsetSoiCau = 0;
            let totalSoiCau = 0;

            let offsetHistory = 0;
            let totalHistory = 0;

            function getHistory() {
                $.ajax({
                    url: '/history-session',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        offset: offset,
                        limit: 5
                    },
                    success: function (res) {
                        var html = '';
                        total = res.total;
                        $('.showTotalHistory').html((offset == 0 ? 1 : 1 + (offset / 5)) + '/' + Math
                            .round(res.total / 5).toString());
                        if (res.data.length > 0) {
                            for (var i = 0; i < res.data.length; i++) {
                                html += '<div class="GameRecord__C-body"> <div class="row">';
                                html += '<div class="col col-3" style="font-size:14px;">' + res.data[i]
                                    .id + '</div>';
                                html +=
                                    '<div class="col col-2" style="font-weight:bold">' +
                                    res.data[i].value + '</div>';
                                html += '<div class="col col-3">' + res.data[i].type + '</div>';
                                html += '<div class="col col-4">' + res.data[i].product + '</div>';
                                html += '</div></div>';
                            }
                            $('#listHistorySession').html(html);
                        } else {
                            $('#listHistorySession').html('Không có lịch sử');
                        }
                    }
                });
            }

            $('.btnPrevHistory').click(function () {
                if (offset < 5) return;
                if (offset <= 5) {
                    $(this).css('background', '#303454');
                }
                else {
                    $(this).css('background', '#ff650bc4');
                }
                offset -= 5;
                getHistory();
            });
            $('.btnNextHistory').css('background', '#ff650bc4');
            $('.btnNextHistory').click(function () {
                if (offset > total) {
                    return;
                }
                offset += 5;
                getHistory();
                $(this).css('background', '#ff650bc4');
                $('.btnPrevHistory').css('background', '#ff650bc4');
            });

            function getHistorySoiCau() {
                $.ajax({
                    url: '/history-session',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        offset: offsetSoiCau,
                        limit: 5
                    },
                    success: function (res) {
                        var html = '';
                        totalSoiCau = res.total;
                        $('.showTotalHistorySoiCau').html((offsetSoiCau == 0 ? 1 : 1 + (offsetSoiCau / 5)) + '/' + Math
                            .round(res.total / 5).toString());
                        if (res.data.length > 0) {
                            for (var i = 0; i < res.data.length; i++) {
                                html += '<div number="1" colour="green" rowid="0">';
                                html += '<div class="row">';
                                html += '<div class="col col-4">';
                                html += '<div class="Trend__C-body2-IssueNumber" style="color:#fff">' + res.data[i].id + '</div>';
                                html += '</div>';
                                html += '<div class="col col-8">';
                                html += '<div class="Trend__C-body2-Num">';
                                html += '<canvas canvas="" id="myCanvas0" class="line-canvas"></canvas>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'A' ? 'action' : '') + '" id="' + (res.data[i].value == 'A' ? 'action' + i : '') + '">A</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'B' ? 'action' : '') + '" id="' + (res.data[i].value == 'B' ? 'action' + i : '') + '">B</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'V1' ? 'action ' : '') + '" id="' + (res.data[i].value == 'V1' ? 'action' + i : '') + '">V1</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'LG' ? 'action ' : '') + '" id="' + (res.data[i].value == 'LG' ? 'action' + i : '') + '">LG</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'V2' ? 'action ' : '') + '" id="' + (res.data[i].value == 'V2' ? 'action' + i : '') + '">V2</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'A1' ? 'action ' : '') + '" id="' + (res.data[i].value == 'A1' ? 'action' + i : '') + '">A1</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'A2' ? 'action ' : '') + '" id="' + (res.data[i].value == 'A2' ? 'action' + i : '') + '">A2</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'P' ? 'action ' : '') + '" id="' + (res.data[i].value == 'P' ? 'action' + i : '') + '">P</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'D' ? 'action ' : '') + '" id="' + (res.data[i].value == 'D' ? 'action' + i : '') + '">D</div>';
                                html += '<div class="Trend__C-body2-Num-item ' + (res.data[i].value == 'V3' ? 'action ' : '') + '" id="' + (res.data[i].value == 'V3' ? 'action' + i : '') + '">V3</div>';
                                html += '<div class="Trend__C-body2-Num-BS ' + (res.data[i].value == 'A' ? 'isB' : '') + (res.data[i].value == 'V1' ? 'isB' : '') + (res.data[i].value == 'LG' ? 'isB' : '') + (res.data[i].value == 'V2' ? 'isB' : '') + (res.data[i].value == 'A1' ? 'isB' : '') + '"></div>';
                                html += '</div> </div> </div>  </div>';
                            }
                            $('#historySoiCau').html(html);
                            creatlineLoad();

                        } else {
                            $('#historySoiCau').html('Không có lịch sử');
                        }
                    }
                });

            }

            $('.btnPrevHistorySoiCau').click(function () {
                if (offsetSoiCau < 5) return;
                if (offsetSoiCau <= 5) {
                    $(this).css('background', '#303454');
                }
                else {
                    $(this).css('backgorund', '#ff650bc4');
                }
                offsetSoiCau -= 5;
                getHistorySoiCau();
            });
            $('.btnNextHistorySoiCau').css('background', '#ff650bc4');
            $('.btnNextHistorySoiCau').click(function () {
                if (offsetSoiCau > totalSoiCau) {
                    return;
                }
                offsetSoiCau += 5;
                $(this).css('background', '#ff650bc4');
                $('.btnPrevHistorySoiCau').css('background', '#ff650bc4');
                getHistorySoiCau();
            });

            function getHistoryPlay() {
                $.ajax({
                    url: '/history-play',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        offset: offsetHistory,
                        limit: 5
                    },
                    success: function (res) {
                        console.log(res);
                        var html = '';
                        totalHistory = res.total;
                        $('.showTotalHistoryPlay').html((offsetHistory == 0 ? 1 : 1 + (offsetHistory / 5)) + '/' + Math.round(res.total / 5).toString());
                        if (res.data.length > 0) {
                            for (var i = 0; i < res.data.length; i++) {
                                var className = "";
                                if (res.data[i].value == 'Hot trend' || res.data[i].value == 'Viral') {
                                    className = 'MyGameRecordList_C-item-l-big';
                                }
                                else if (res.data[i].value == 'Vàng bạc') {
                                    className = 'MyGameRecordList_C-item-l-1 ';
                                }
                                else if (res.data[i].value == 'V1' || res.data[i].value == 'V2' || res.data[i].value == 'P' || res.data[i].value == 'V3') {
                                    className = 'MyGameRecordList_C-item-l-1 fontsize20';
                                }
                                else if (res.data[i].value == 'Xăng dầu') {
                                    className = 'MyGameRecordList_C-item-l-5 ';
                                }
                                else if (res.data[i].value == 'LG' || res.data[i].value == 'A1' || res.data[i].value == 'A2' || res.data[i].value == 'D') {
                                    className = 'MyGameRecordList_C-item-l-5 fontsize20';
                                }
                                else if (res.data[i].value == "Lúa gạo") {
                                    className = 'MyGameRecordList_C-item-l-20 ';
                                }
                                else if (res.data[i].value == 'A' || res.data[i].value == 'B') {
                                    className = 'MyGameRecordList_C-item-l-20 fontsize20';
                                }
                                else {
                                    className = 'MyGameRecordList_C-item-l-6';
                                }
                                html += '<div data-v-55005ad8="" class="MyGameRecordList_C-item" data-row="' + res.data[i].id + '">';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-l ' + className + '">' + res.data[i].value + '</div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-m">';
                                html += '        <div data-v-55005ad8="" class="MyGameRecordList_C-item-m-top">' + res.data[i].session_id + '</div>';
                                html += '        <div data-v-55005ad8="" class="MyGameRecordList_C-item-m-bottom">' + res.data[i].created_at + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-item-r ' + (res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'success')) + '">';
                                html += '        <div data-v-55005ad8=""class="' + (res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'success')) + '">' + (res.data[i].status == 0 ? 'Chờ kết quả' : (res.data[i].status == 2 ? 'Thất bại' : 'Thành công')) + '</div><span data-v-55005ad8="">' + (res.data[i].status == 0 ? '...' : (res.data[i].status == 2 ? '-' + accounting.formatNumber(res.data[i].money - res.data[i].vat) + '.00₫' : '+' + accounting.formatNumber(res.data[i].receive) + '.00₫')) + '</span>';
                                html += '    </div>';
                                html += '</div>';

                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail" style="display:none" data-row="' + res.data[i].id + '">';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-text">Chi tiết</div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Mã đơn hàng <div data-v-55005ad8=""><span';
                                html += '                data-v-55005ad8="" class="orderNum">WG' + res.data[i].id + '</span><img data-v-55005ad8=""';
                                html += '                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAhFBMVEUAAABRUVFQUFBRUVFRUVFRUVFRUVFRUVFQUFBRUVFQUFBRUVFQUFBQUFBRUVFRUVFSUlJSUlJRUVFQUFBSUlJRUVFRUVFRUVFRUVFRUVFRUVFQUFBRUVFRUVFRUVFRUVFQUFBRUVFRUVFRUVFQUFBQUFBQUFBSUlJYWFhJSUlQUFBRUVGJ3MxyAAAAK3RSTlMAv0B6VerZrqiblYmCaGJIOiQdFg/79vDl39TKxbq0oY9zblxONC4pCQTPqkRvegAAAWZJREFUeNrtz0duw0AQAEGSzjnnnIP+/z8ffJOBgRfgiCts9Qca1UmSNGZDP0FDN37DbIJAQH4DAQGJAwEBiQMBAYlbTsjQLWcgtQVSWyC1BVJbILUFUlsgtdUQZJiyMSGzKRsTclbwBQEpgJwXfEFACiAXBV8QkALIWsEXBKRFyGXBF2QKSD/k1WdCruYhXV4gTUHWQUBAQsg1CEgO5BukMsgNCEgO5BYEJAfSg4CAhJA7EJAcyD0ISA5kAwQEJIRsgoCAhJAHEJAcyBYICEgI2QYBAQkhjyAgOZAdEBCQELILAgISQlZAQEDagDyBgORAnkFAciB7ICAgIWQfBAQkhLyAgORAVkEWC+nnWlbI30Bqh7yCgORADkBAQMIGEBCQNiCHICAgYW8gIDmQdxCQHMgHCEgO5AgEBCTsGKRySGog/+ik4AsC0iLktOALAtIi5LPgCwJS0FfBFwSkpH7COkmSMvoBUQl8xsUGEfcAAAAASUVORK5CYII=">';
                                html += '        </div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Kỳ trao đổi <div data-v-55005ad8="">' + res.data[i].session_id + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Số tiền chọn mã <div data-v-55005ad8="" class="gold">' + accounting.formatNumber(res.data[i].money) + '.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Số tiền sau thuế <div data-v-55005ad8="" class="gold">' + accounting.formatNumber(res.data[i].money - res.data[i].vat) + '.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Thuế <div data-v-55005ad8="">' + accounting.formatNumber(res.data[i].vat) + '.00₫</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Mã sản phẩm <div data-v-55005ad8="">' + res.data[i].type + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Chọn <div data-v-55005ad8="">' + res.data[i].value + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Tình trạng <div data-v-55005ad8="" class="' + (res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'green')) + '">' + (res.data[i].status == 0 ? 'Chờ kết quả' : (res.data[i].status == 2 ? 'Thất bại' : 'Thành công')) + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Kết quả <div data-v-55005ad8="" class="' + (res.data[i].status == 0 ? 'white' : (res.data[i].status == 2 ? 'red' : 'green')) + '">' + (res.data[i].status == 0 ? '...' : (res.data[i].status == 2 ? '-' + accounting.formatNumber(res.data[i].money - res.data[i].vat) + '.00₫' : '+' + accounting.formatNumber(res.data[i].receive) + '.00₫')) + '</div>';
                                html += '    </div>';
                                html += '    <div data-v-55005ad8="" class="MyGameRecordList_C-detail-line">Thời gian tạo <div data-v-55005ad8="" class="time">' + res.data[i].created_at + '</div>';
                                html += '    </div>';
                                html += '</div>';
                            }
                            $('#listHistorySessionPlay').html(html);
                            $('.MyGameRecordList_C-item').click(function () {
                                var row = $(this).data('row');
                                if ($('.MyGameRecordList_C-detail[data-row="' + row + '"]').css('display') == 'none') {
                                    $('.MyGameRecordList_C-detail[data-row="' + row + '"]').css('display', 'block');
                                }
                                else {
                                    $('.MyGameRecordList_C-detail[data-row="' + row + '"]').css('display', 'none');
                                }
                            });
                        } else {
                            $('#listHistorySessionPlay').html('Không có lịch sử');
                        }
                    }
                });
            }
            $('.btnNextHistoryPlay').css('background', '#ff650bc4');
            $('.btnPrevHistoryPlay').click(function () {
                if (offsetHistory < 5) return;
                if (offsetHistory <= 5) {
                    $(this).css('background', '#303454');
                }
                else {
                    $(this).css('background', '#ff650bc4');
                }
                offsetHistory -= 5;
                getHistoryPlay();
            });
            $('.btnNextHisyoryPlay').css('background', '#ff650bc4');
            $('.btnNextHistoryPlay').click(function () {
                if (offsetHistory > totalHistory) {
                    return;
                }
                offsetHistory += 5;
                $(this).css('background', '#ff650bc4');
                $('.btnPrevHistoryPlay').css('background', '#ff650bc4');
                getHistoryPlay();
            });

            getHistoryPlay();
            getHistory();
            getHistorySoiCau();

            $('#btnCloseNotification').click(function () {
                $('.vanoverlayNotification').hide();
                $('#popupOpenNotification').hide();
            });

            function getGift(sessionId) {
                $('#txtBettingPictureShow').removeClass();
                $.ajax({
                    url: '/getgift',
                    type: 'get',
                    data: {
                        id: sessionId,
                    },
                    success: function (res) {
                        if (res.status) {
                            if (res.totalWin == 0) {
                                $('#txtXemchitiet').css('color', '#000');
                                var imageUrl = '/assets/images/lose1.png';
                                $('#popupOpenNotification').css('background-image', 'url(' + imageUrl + ')');
                            }
                            else {
                                $('#txtXemchitiet').css('color', '#fff');
                                var imageUrl = '/assets/images/win1.png';
                                $('#popupOpenNotification').css('background-image', 'url(' + imageUrl + ')');
                            }
                            $('.vanoverlayNotification').show();
                            $('#popupOpenNotification').show();
                            setTimeout(function () {
                                $('.vanoverlayNotification').hide();
                                $('#popupOpenNotification').hide();
                            }, 3000);
                        }
                    }
                })
            }
            function getinfo(){
                $.ajax({
                    url: '/getinfo',
                    type: 'get',
                    success: function(res){
                        $('.amountDisplay').html(accounting.formatNumber(res.message) +'.00đ');
                    }
                });
            }
            $('.btnSubmitAmount').click(function () {
                $.ajax({
                    url: '/bettings',
                    type: 'post',
                    data: {
                        _token: $('#csrf').val(),
                        amount: parseInt($('.btnChooseAmount.active').data('amount')) * parseInt($(
                            '#van-field-1-input').val()),
                        value: $('#txtProductChoose').val()
                    },
                    beforeSend: function () {
                        $('.btnSubmitAmount').prop('disabled', true);
                    },
                    success: function (res) {
                        $('.btnSubmitAmount').prop('disabled', false);
                        $('#popupBetting').css('display', 'none');
                        $('.vanoverlayBetting').css('display', 'none');
                        $('#van-field-1-input').val('1');
                        $('.btnChooseQuantity[data-quantity="1"]').trigger('click');
                        $('.btnChooseAmount[data-amount="1000"]').trigger('click');
                        offsetHistory = 0;
                        getHistoryPlay();
                        if (res.status) {
                            toastr.success('Chọn mã thành công');
                            $('.amountDisplay').html(accounting.formatNumber(es.message) +'.00đ');
                        } else {
                            toastr.error(res.message);
                        }
                    }
                })
            });

        });

        function createLineElement(x, y, length, angle) {
            var line = document.createElement("div");
            line.className = "lineElement";
            var styles = 'border: 1px solid #cd9047;'
                + 'width: ' + length + 'px;'
                + 'height: 0px;'
                + '-moz-transform: rotate(' + angle + 'rad);'
                + '-webkit-transform: rotate(' + angle + 'rad);'
                + '-o-transform: rotate(' + angle + 'rad);'
                + '-ms-transform: rotate(' + angle + 'rad);'
                + 'position: absolute;'
                + 'top: ' + y + 'px;'
                + 'left: ' + x + 'px;';
            line.setAttribute('style', styles);
            return line;
        }
        function createLine(x1, y1, x2, y2) {
            var a = x1 - x2,
                b = y1 - y2,
                c = Math.sqrt(a * a + b * b);

            var sx = (x1 + x2) / 2,
                sy = (y1 + y2) / 2;

            var x = sx - c / 2,
                y = sy;

            var alpha = Math.PI - Math.atan2(-b, a);

            return createLineElement(x, y, c, alpha);
        }
        function hideLineLoad(){
            $('.lineElement').hide();
        }
        function creatlineLoad() {
            document.querySelectorAll('.lineElement').forEach(e => e.remove());
            var b1 = document.getElementById('action0').getBoundingClientRect();
            var b2 = document.getElementById('action1').getBoundingClientRect();
            var b3 = document.getElementById('action2').getBoundingClientRect();
            var b4 = document.getElementById('action3').getBoundingClientRect();
            var b5 = document.getElementById('action4').getBoundingClientRect();
            
            var b1Left = b1.left;
            var b2Left = b2.left;
            var b3Left = b3.left;
            var b4Left = b4.left;
            var b5Left = b5.left;
            
            
            // Draw some lines
            document.body.appendChild(
                createLine(
                    b1Left + (b1.width / 2),
                    1032 + (b2.height / 2),
                    b2Left + (b2.width / 2),
                    1086 + (b2.height / 2)
                )
            );

            // Draw some lines
            document.body.appendChild(
                createLine(
                    b2Left + (b2.width / 2),
                    1086 + (b2.height / 2),
                    b3Left + (b3.width / 2),
                    1140 + (b3.height / 2)
                )
            );


            // Draw some lines
            document.body.appendChild(
                createLine(
                    b3Left + (b3.width / 2),
                    1140 + (b3.height / 2),
                    b4Left + (b4.width / 2),
                    1194 + (b4.height / 2)
                )
            );

            // Draw some lines
            document.body.appendChild(
                createLine(
                    b4Left + (b4.width / 2),
                    1194 + (b4.height / 2),
                    b5Left + (b5.width / 2),
                    1248 + (b5.height / 2)
                )
            );
            $('.lineElement').show();
        }
    </script>
</body>

</html>
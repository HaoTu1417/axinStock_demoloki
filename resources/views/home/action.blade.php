@extends('layout.layout_auth')
@section('content')
<style>
    .select-item {
        font-size: 22px;
        margin-right: 10px;
        width: auto;
        cursor: pointer;
    }

    .select-item.active {
        font-weight: bold;
        border-bottom: 2px solid green;
    }

    .btn-buy.active {
        background-color: #1ba17f !important;
        color: white !important;
    }

    .btn-sell.active {
        background-color: #ef4034 !important;
        color: white !important;
    }
</style>
<style>
    .modal-first {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .filter-stock-item {
        height: 30px;
    }

    .stock-item {
        height: 30px;
        font-size: 14px;
        width: 310px;
        height: 30px;
        border-radius: 2px;
        line-height: 30px;
        text-indent: 18px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-break: break-all;
    }

    .stock-item.active {
        color: blue;
        background: rgba(62, 76, 243, .1);
    }

    .filter-stock-item.active {
        color: blue;
    }
    .single-line {
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #959595; /* Màu chữ */
        }
</style>




<div class="container homecontainer js-container-main">
    <div class="modal-first"
        style="display:none;align-items:center;justify-content:center;height:100vh;position:absolute;top:0;right:0;bottom:0;left:0">
        <div class="content-modal" style="background:white;width:90%;height:600px;border-radius:8px">
            <div class="model-header"
                style="border-top-left-radius:8x;border-top-right-radius:8x;;background-color: rgb(62, 76, 243);padding:18px; position: relative; padding-top: 12px;;display:flex;flex-direction:column;align-items:center">
                <div style="display:flex;position:relative;width:80%;justify-content:center">
                    <div style="white-space:nowrap;font-size:18px;color:white;font-weight:bold">Tìm kiếm cổ phiếu</div>
                    <span class="js-close-modal"
                        style="position:absolute;right:10px;font-size:13px;font-weight:bold;cursor:pointer;color:#ccc">X</span>
                </div>

                <div
                    style="margin-top:8px;padding:6px;display:flex;background-color:#fff;border-radius:4px;justify-content:flex-start;align-items:center;width:90%">
                    <i class="bi bi-search" style="color:#333"></i>
                    <input class="js-input-stock" placeholder="Nhập tên cổ phiếu/mã cổ phiếu"
                        style="border:none;outline:none;flex:1;margin-left:10px;background:#fff !important">
                </div>
            </div>
            <div class="model-body" style="display:flex;">
                <div class="filter-item"
                    style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center; overflow-y: scroll; height: 480px;">
                    <div class="filter-item"
                        style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center">
                        <?php foreach ($az as $key => $item) { ?>
                            <div class="filter-stock-item btnFindStock <?= ($key == 0 ? "active" : "") ?>"
                                data-stock="<?= $item ?>"><?= $item ?></div>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="list-item-stock" style="flex:1; overflow-y: scroll; height: 480px;" id="sltListStock">
                    </div>
            </div>
        </div>
    </div>
    <div class="header-default">
        <img class="logo-header" style="width:132px;height:26px" src="{{asset($logo->image)}}">
    </div>

    <div class="row" style="margin:15px 0;padding:0 10px">
        <div
            style="margin-top:8px;margin-bottom:8px;padding:6px;display:flex;background-color:#fff;border-radius:4px;justify-content:flex-start;align-items:center;width:100%">
            <i class="bi bi-search" style="color:#333"></i>
            <input class="js-search-cp" placeholder="Nhập tên cổ phiếu/mã cổ phiếu"
                style="border:none;outline:none;flex:1;margin-left:10px;background:#fff !important">
        </div>
        
        <!--<div class="col-4" style="display:flex;flex-direction:column;justify-content:center">-->
        <!--    <span>Giá mới</span>-->
        <!--    <span class="lastPrice"></span>-->
        <!--</div>-->
        <!--<div class="col-4" style="display:flex;flex-direction:column;justify-content:center">-->
        <!--    <span>Số dư tăng giảm</span>-->
        <!--    <span class="changePc"></span>-->
        <!--</div>-->
        <!--<div class="col-4" style="display:flex;flex-direction:column;justify-content:center">-->
        <!--    <span>Biến động giá</span>-->
        <!--    <span class="ot"></span>-->
        <!--</div>-->
        <div class="col-10" style="display:flex;flex-direction:column;justify-content:center">
            <span class="js-search-cp" style="display:flex;align-items:center;font-size:18px;font-weight:700;color:blue"><span style="font-size:24px"
                    class="stockName"></span> </span>
            <span style="color:#959595" class="single-line"><?= $stock_info ?></span>
        </div>
         <div class="col-2" style="padding:0 !important">
             <?php if ($follow == 0) { ?>
            <img class="btnFollow"  data-name="<?= $stock ?>" src="assets/images/dowload/icon_trade_addOptionalStocks.png"
                style="width:19px;height:20px">
            <?php } ?>
            <img class="js-trade" src="assets/images/dowload/icon_market_jszb.png"
                style="width:19px;height:20px">

        </div>
        <div class="col-6" style="position:relative;margin:10px 0;display:flex;flex-direction:column;justify-content:center">
            <div style="display:flex;justify-content:center"> <span style="color:blue;font-size:30px" class="lastPrice"></span></div>  
            <div style="font-size:14px;position:absolute;display:flex;flex-direction:column;top:0; right:-10px;justify-content:space-between;align-items:flex-start">
                <span class="ot"></span> 
                <span class="changePc"></span>
            </div>

        </div>
        <div class="col-6" style="display:flex;flex-direction:column;justify-content:center">
            <span style="text-align:center">Khối lượng</span>
            <span  style="text-align:center" class="lot"></span>
        </div>
       
        <div class="col-4">
            <div>Giá trần  <br/><span id="ceiling" style="color:purple"></span></div>
        </div>
        <div class="col-4">
            <div>Giá tc <br/> <span style="color:orange" class="r"></span></div>
        </div>
         <div class="col-4">
            <div>Giá sàn  <br/><span id="floor" style="color:#0083ff"></span></div>
        </div>
        
        <div class="col-6 mt-2" style="display:flex;justify-content:space-between">
            <span style="font-size:13px">Mở cửa/TB</span>
            <span style="font-size:13px"><span class="o"></span>/<span class="tb"></span></span>
        </div>

        <div class="col-6 mt-2" style="display:flex;justify-content:space-between">
            <span style="font-size:13px;">Cao/Thấp</span>
            <span style="font-size:13px"><span class="highPrice"></span>/<span class="lowPrice"></span></span>
        </div>
       
    </div>

    <div style="display:flex;justify-content:flex-end;padding:0 10px" class="block-his">
        <div style="flex:1;display:flex;flex-direction:column;padding:10px;">
            <div class="item-his row" id="buy1Click">
                <div class="col-6" style="text-align:end;color:#999" id="buy1Quantity"></div>
                <div class="col-6" style="color:green;background:rgb(245, 254, 250)" id="buy1Price"></div>

            </div>
            <div class="item-his row" id="buy2Click">
                <div class="col-6" style="text-align:end;color:#999" id="buy2Quantity"></div>
                <div class="col-6" style="color:green;background:rgb(245, 254, 250)" id="buy2Price"></div>

            </div>
            <div class="item-his row" id="buy3Click">
                <div class="col-6" style="text-align:end;color:#999" id="buy3Quantity"></div>
                <div class="col-6" style="color:green;background:rgb(245, 254, 250)" id="buy3Price"></div>

            </div>
        </div>
        <div style="flex:1;display:flex;flex-direction:column;;padding:10px;">
            <div class="item-his row" id="sell1Click">
                <div class="col-6" style="color:red;background:rgb(253, 245, 247)" id="sell1Price"></div>
                <div class="col-6" style="text-align:end;color:#999" id="sell1Quantity"></div>

            </div>
            <div class="item-his row" id="sell2Click">
                <div class="col-6" style="color:red;background:rgb(253, 245, 247)" id="sell2Price"></div>
                <div class="col-6" style="text-align:end;color:#999" id="sell2Quantity"></div>

            </div>
            <div class="item-his row" id="sell3Click">
                <div class="col-6" style="color:red;background:rgb(253, 245, 247)" id="sell3Price"></div>
                <div class="col-6" style="text-align:end;color:#999" id="sell3Quantity"></div>

            </div>
        </div>
        
        
    </div>
    
    <div class="row" style="margin:15px 0;padding:0 10px">

        <div class="col-12 mt-2" style="padding:0px;display:flex;justify-content:space-between">
            <span style="color:green">Mua</span>
            <span style="color:red">Bán</span>
        </div>
        <div class="mt-1" style="padding:0px;width:100%;display:flex;align-items:center">
            <div id="percentBuy" style="background:green;width:50%;color:white;padding:0px 6px">
                
            </div>
            <div id="percentSell" style="background:red;width:50%;color:white;padding:0px 6px">
                
            </div>
        </div>
    </div>
    
    
    <!-- <div style="display:flex;justify-content:flex-end;margin-top:10px;padding:0 10px;align-items:center">-->
    <!--     <div class="col-4" style="display:flex;align-items:center;font-weight:bold;">Tài khoản</div>-->
    <!--     <div class="col-8" style="display:flex">-->
    <!--          <select style="flex: 1;border-radius:4px;outline:none; height: 40px; font-weight: bold; background: #f3f5f7; color: #333;">-->
    <!--        <option value="">00000106</option>-->
    <!--        <option value="">00000107</option>-->
    <!--    </select>-->
    <!--    </div>-->
    <!--</div>-->
    
 
    


    <div style="font-weight:bold;display:flex;justify-content:flex-start;margin-top:15px;padding:0 10px">
        Đặt lệnh:
    </div>
    <div style="display:flex;justify-content:flex-end;;padding:0 10px">
        <button class="btn js-btn btn-choose btn-buy active"
            style="flex:1;color:#a1a3a4;font-weight:bold;background:#f3f5f7;height:40px" data-type="1">Mua</button>
        <button class="btn js-btn btn-choose  btn-sell"
            style="flex:1;color:#a1a3a4;font-weight:bold;background:#f3f5f7;height:40px" data-type="2">Bán</button>
         <select id="checkedNationalPrice" style="flex: 1;border-radius:4px;outline:none; height: 40px; font-weight: bold; background: #f3f5f7; color: #333;">
            <option value="1">Thường</option>
            <option value="2">Đặt</option>
        </select>
    </div>
    
    

    
 
     <div style="display:flex;justify-content:flex-end;margin-top:10px;padding:0 10px;align-items:center">
         <div class="col-3" style="display:flex;align-items:center;font-weight:bold;">Giá:</div>
         <div class="col-9">
            <div style="display:flex; justify-content:center;align-item:center;background:rgb(242, 242, 242);">
                <i class="fa-solid fa-minus" style="margin-top: 8px;font-size:22px;cursor:pointer;padding:4px;"></i>
                <input name="" id="priceNows" style="position: relative;
                    display: block;
                    background: none;
                    color: inherit;
                    opacity: 1;
                    font: inherit;
                    line-height: inherit;
                    letter-spacing: inherit;
                    text-align: inherit;
                    text-indent: inherit;
                    text-transform: inherit;
                    text-shadow: inherit;border:none;outline:none;width:200px;padding-left:28%;line-height:30px;">
                <i class="fa-solid fa-plus" style="margin-top: 8px;font-size:20px;cursor:pointer;padding:4px;"></i>
            </div>
        </div>
    </div>
    
    <div style="display:flex;justify-content:flex-end;margin-top:10px;padding:0 10px;align-items:center">
         <div class="col-3" style="display:flex;align-items:center;font-weight:bold;">Khối lượng:</div>
         <div class="col-9">
             <div style="display:flex; justify-content:center;align-item:center;background:rgb(242, 242, 242);">
                <i class="fa-solid fa-minus" style="margin-top: 8px;font-size:22px;cursor:pointer;padding:4px;"></i>
                <input name="" id="quantity" value="100" style="position: relative;
                    display: block;
                    background: none;
                    color: inherit;
                    opacity: 1;
                    font: inherit;
                    line-height: inherit;
                    letter-spacing: inherit;
                    text-align: inherit;
                    text-indent: inherit;
                    text-transform: inherit;
                    text-shadow: inherit;border:none;outline:none;width:200px;padding-left:28%;line-height:30px;">
                <i class="fa-solid fa-plus" style="margin-top: 8px;font-size:20px;cursor:pointer;padding:4px;"></i>
            </div>
        </div>
    </div>
    
     <div style="display:flex;justify-content:flex-end;margin-top:10px;padding:0 10px;align-items:center">
         <div class="col-6" style="display:flex;align-items:center;font-weight:bold;">K.L Khả dụng:</div>
         <div class="col-6" style="text-align:end;padding-right:15px;font-size:18px">
             <?= number_format($quantityAvaiable) ?>
        </div>
    </div>
    
    
    <!-- <div style="display:flex;justify-content:flex-end;margin-top:10px;padding:0 10px;align-items:center">-->
    <!--     <div class="col-4" style="display:flex;align-items:center;font-weight:bold;">Lệnh điều kiện</div>-->
    <!--     <div class="col-8" style="display:flex">-->
    <!--          <select style="flex: 1;border-radius:4px;outline:none; height: 40px; font-weight: bold; background: #f3f5f7; color: #333;">-->
    <!--        <option value="">normal</option>-->
    <!--        <option value="">00000107</option>-->
    <!--    </select>-->
    <!--    </div>-->
    <!--</div>-->



    <div class="row" style="display:flex;margin-top:15px;padding:0 10px">
        
        
        <div class="mt-3 custom-select-container">
            <?php if ($information != null) { ?>
                    <button type="button" id="btnTransaction" style="width:100%" class="btn js-btn-re btn-buy active">Giao
                        dịch</button>
            <?php } else { ?>
                <button onclick="window.location.href = 'login';" type="button" style="width:100%"
                    class="btn js-btn-re btn-buy active">Đăng nhập</button>
            <?php } ?>
        </div>

    </div>
</div>
<input type="text" id="exchange" hidden value="<?= $exchange ?>" />
<input type="text" id="stock" hidden value="<?= $stock ?>" />
<input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
<div class="container homecontainer js-container-trade" style="display:none;position:relative">
    <div class="modal-first"
        style="display:none;align-items:center;justify-content:center;height:100vh;position:absolute;top:0;right:0;bottom:0;left:0">
        <div class="content-modal" style="background:white;width:90%;height:600px;border-radius:8px">
            <div class="model-header"
                style="border-top-left-radius:8x;border-top-right-radius:8x;;background-color: rgb(62, 76, 243);padding:18px; position: relative; padding-top: 12px;;display:flex;flex-direction:column;align-items:center">
                <div style="display:flex;position:relative;width:80%;justify-content:center">
                    <div style="white-space:nowrap;font-size:18px;color:white;font-weight:bold">Tìm kiếm cổ phiếu</div>
                    <span class="js-close-modal"
                        style="position:absolute;right:10px;font-size:13px;font-weight:bold;cursor:pointer;color:#ccc">X</span>
                </div>

                <div
                    style="margin-top:8px;padding:6px;display:flex;background-color:#fff;border-radius:4px;justify-content:flex-start;align-items:center;width:90%">
                    <i class="bi bi-search" style="color:#333"></i>
                    <input class="js-input-stock" placeholder="Nhập tên cổ phiếu/mã cổ phiếu"
                        style="border:none;outline:none;flex:1;margin-left:10px;background:#fff !important">
                </div>
            </div>
            <div class="model-body" style="display:flex;">
                <div class="filter-item"
                    style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center; overflow-y: scroll; height: 480px;">
                    <div class="filter-item"
                        style="width:40px;background:#f7f7f7;color:#adadad;display:flex;flex-direction:column;align-items:center">
                        <?php foreach ($az as $key => $item) { ?>
                            <div class="filter-stock-item btnFindStock <?= ($key == 0 ? "active" : "") ?>"
                                data-stock="<?= $item ?>"><?= $item ?></div>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="list-item-stock" style="flex:1; overflow-y: scroll; height: 480px;" id="sltListStock">
                    </div>
            </div>
        </div>
    </div>
    <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
        <div class="js-back-main" style="flex:1;height: 50px;">
            <i style="color:#333" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div class="stockName"
            style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">
        </div>
        <div style="flex:1;display:flex; justify-content:flex-end">
            <img style="margin:0 6px;width:18px;height:18px" class="js-search-cp"
                src="assets/images/dowload/icon_search_kline.png" draggable="false">
            <!--<img style="margin:0 6px;width:18px;height:18px" src="assets/images/dowload/icon_news_plsc.png" draggable="false">-->
        </div>
    </div>
    <div style="margin-top:20px">
        <div class="row">
            <div class="col-4" style="display:flex;flex-direction:column;justify-content:center">
                <span style="font-size:25px;color:green" class="lastPrice"></span>
                <div class="changePc changePcChart"
                    style="text-align:center;display:flex;flex-direction:column;justify-content:center;color:green;background:rgba(0, 124, 50, 0.1)">
                </div>
                <div class="ot"
                    style="text-align:center;display:flex;flex-direction:column;justify-content:center;color:green">
                </div>
            </div>
            <div class="col-8" style="display:flex;flex-direction:column;justify-content:center">
                <div class="row">
                    <div class="col-6" style="display:flex;justify-content:space-between"><span
                            style="font-size:14px;color:#7f7f7f">Giá mở</span> <span class="o"></span></div>
                    <div class="col-6" style="display:flex;justify-content:space-between"><span
                            style="font-size:14px;color:#7f7f7f">Cao</span> <span class="highPrice"></span></div>

                </div>
                <div class="row">
                    <div class="col-6" style="display:flex;justify-content:space-between"><span
                            style="font-size:14px;color:#7f7f7f">Giá tham chiếu</span> <span class="r" style="color:orange"></span></div>
                    <div class="col-6" style="display:flex;justify-content:space-between"><span
                            style="font-size:14px;color:#7f7f7f">Thấp</span> <span class="lowPrice"></span></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <span style="font-size:14px;color:#7f7f7f">Khối lượng</span> 
                    </div>
                    <div class="col-8">
                        <span class="lot"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:30px">
        <!--<div class="row" style="margin:0;display:flex;border-bottom:1px solid #ccc;padding-bottom:10px">-->
        <!--    <div class="select-item active">Ngày</div>-->
        <!--    <div class="select-item">Tuần</div>-->
        <!--    <div class="select-item">Tháng</div>-->

        <!--</div>-->
        <iframe id="iframe_chart" src="https://www.cophieu68.vn/chart/chart.php?id=<?= $stock ?>"
            style="width:100%; height: 600px"></iframe>
    </div>

    <div style="position:absolute;bottom:0;width:100%;height:50px;display:flex;justify-content:space-between">
        <div>
            <a class="btn btnShowTransaction" data-type="1"
                style="background-color:#1ba17f;color:white;width:100px">Mua</a>
            <a class="btn btnShowTransaction" data-type="2"
                style="background-color:#e76277;color:white;width:100px">Bán</a>
        </div>
        <?php if ($follow == 0) { ?>
            <a class="btn btnFollow" data-name="<?= $stock ?>" style="background-color:#fff;width: 108px;
        height: 39px;
        background: #fff;
        border: 1px solid #3e4cf3;
        border-radius: 3px;
        font-size: 15px;
        font-family: PingFang SC;
        font-weight: 700;
        color: #3e4cf3;">Theo dõi</a>
        <?php } ?>
    </div>
</div>

@endsection

@section('script')
<script>
        $(document).ready(function() {
             $('.custom-select').select2({
                width: '100%',
                minimumResultsForSearch: Infinity // Ẩn thanh tìm kiếm
            });
            // Function to filter stock items
            function filterStocks() {
                var searchTerm = $(this).val().toLowerCase();
                var $modal = $(this).closest('.modal-first');
                $modal.find('.list-item-stock .stock-item').each(function() {
                    var stockName = $(this).text().toLowerCase();
                    if (stockName.includes(searchTerm)) {
                        $(this).removeClass('d-none');
                    } else {
                        $(this).addClass('d-none');
                    }
                });
            }

            // Attach input event to the search box
            $('.js-input-stock').on('input', filterStocks);

            // Close modal event
            $('.js-close-modal').on('click', function() {
                $(this).closest('.modal-first').fadeOut(400, function() {
                    $("body").css('overflow', 'auto');
                });
            });
        });
    

    $(document).ready(function (){
        console.log("on websocket");
        // WebSocket Initialization
        const socket = new WebSocket('ws://localhost:3020');

        // On WebSocket Connection Opened
        socket.addEventListener('open', (event) => {
        console.log('WebSocket connection established.');
        //appendMessage('WebSocket connection established.');
        });

        // On Receiving a Message from the Server
        socket.addEventListener('message', (event) => {
        console.log('Message received from server:', event.data);
        const res = JSON.parse(event.data);
         if (res != null && res.sym !=null && res.sym == symbol) {
                    var color = 'orange';
                    var symbol = '';
                    var background = 'rgba(239, 83, 79, 0.1)';
                    if (res.lastPrice > res.r) {
                        color = 'green';
                        symbol = '+';
                        background = 'rgba(0, 124, 50, 0.1)';
                    }
                    else if (res.lastPrice < res.r) {
                        color = 'red';
                        symbol = '-';
                    }
                    $('.stockName').html(res.sym);
                    $('.lastPrice').html(accounting.formatNumber(res.lastPrice * 1000));
                    $('.lastPrice').css('color', color);
                    $('.changePc').html(symbol + '' + accounting.formatNumber(parseFloat(res.ot) * 1000));
                    $('.changePcChart').css('background', background);
                    $('.changePc').css('color', color);
                    $('.ot').html(symbol + '' + res.changePc + '%');
                    $('.ot').css('color', color);
                    var color2 = 'orange';
                    if(parseFloat(res.highPrice) > res.r){
                        color2 = 'green';
                    }
                    else if(parseFloat(res.highPrice) < res.r){
                        color2 = 'red';
                    }
                    var color3 = 'orange';
                    if(parseFloat(res.lowPrice) > res.r){
                        color3 = 'green';
                    }
                    else if(parseFloat(res.lowPrice) < res.r){
                        color3 = 'red';
                    }
                    var color4 = 'orange';
                    if(parseFloat(res.o) > res.r){
                        color4 = 'green';
                    }
                    else if(parseFloat(res.o) < res.r){
                        color4 = 'red';
                    }
                    $('.o').html(accounting.formatNumber(parseFloat(res.o) * 1000));
                    $('.o').css('color', color4);
                    $('.highPrice').html(accounting.formatNumber(parseFloat(res.highPrice) * 1000));
                    $('.highPrice').css('color', color2);
                    $('.lowPrice').html(accounting.formatNumber(parseFloat(res.lowPrice) * 1000));
                    $('.lowPrice').css('color', color3);
                    var g1 = res.g1.split('|');
                    $('#buy1Click').data('price', parseFloat(g1[0]) * 1000);
                    $('#buy1Price').html(accounting.formatNumber(parseFloat(g1[0]) * 1000));
                    $('#buy1Quantity').html(accounting.formatNumber(parseFloat(g1[1]) * 10));
                    var g2 = res.g2.split('|');
                    $('#buy2Click').data('price', parseFloat(g2[0]) * 1000);
                    $('#buy2Price').html(accounting.formatNumber(parseFloat(g2[0]) * 1000));
                    $('#buy2Quantity').html(accounting.formatNumber(parseFloat(g2[1]) * 10));
                    var g3 = res.g3.split('|');
                    $('#buy3Click').data('price', parseFloat(g3[0]) * 1000);
                    $('#buy3Price').html(accounting.formatNumber(parseFloat(g3[0]) * 1000));
                    $('#buy3Quantity').html(accounting.formatNumber(parseFloat(g3[1]) * 10));
                    var g4 = res.g4.split('|');
                    $('#sell1Click').data('price', parseFloat(g4[0]) * 1000);
                    $('#sell1Price').html(accounting.formatNumber(parseFloat(g4[0]) * 1000));
                    $('#sell1Quantity').html(accounting.formatNumber(parseFloat(g4[1]) * 10));
                    var g5 = res.g5.split('|');
                    $('#sell2Click').data('price', parseFloat(g5[0]) * 1000);
                    $('#sell2Price').html(accounting.formatNumber(parseFloat(g5[0]) * 1000));
                    $('#sell2Quantity').html(accounting.formatNumber(parseFloat(g5[1]) * 10));
                    var g6 = res.g6.split('|');
                    $('#sell3Click').data('price', parseFloat(g6[0]) * 1000);
                    $('#sell3Price').html(accounting.formatNumber(parseFloat(g6[0]) * 1000));
                    $('#sell3Quantity').html(accounting.formatNumber(parseFloat(g6[1]) * 10));
                    $('#floor').html(accounting.formatNumber(res.f * 1000));
                    $('#ceiling').html(accounting.formatNumber(res.c * 1000));
                    $('.tb').html(accounting.formatNumber(res.avePrice * 1000));
                    $('#btnShowPriceF').data('price', res.f * 1000);
                    $('#btnShowPriceC').data('price', res.c * 1000);
                    if($('#checkedNationalPrice').val() == 1){
                        $('#priceNows').val(res.lastPrice * 1000);
                    }
                    var totalBuy = parseFloat(g1[1] * 10) + parseFloat(g2[1] * 10) + parseFloat(g3[1] * 10);
                    var totalSell = parseFloat(g4[1] * 10) + parseFloat(g5[1] * 10) + parseFloat(g6[1] * 10);
                    var percentBuy = Math.floor((totalBuy * 100) / (totalBuy + totalSell));
                    var percentSell = 100 - percentBuy;
                    $('#percentBuy').html(percentBuy + '%');
                    $('#percentBuy').css('width', percentBuy +'%');
                    $('#percentSell').html(percentSell + '%');
                    $('#percentSell').css('width', percentSell +'%');
                    $('.r').html(accounting.formatNumber(res.r * 1000));
                    $('.lot').html(accounting.formatNumber(parseFloat(res.lot) * 10));
                    
                    $('#buy1Click, #buy2Click, #buy3Click, #sell1Click, #sell2Click, #sell3Click, #btnShowPriceF, #btnShowPriceC').click(function(){
                        var price = $(this).data('price');
                        $('#priceNows').val(price);
                    });
                    
                }
        //appendMessage(`Server: ${event.data}`);
        });

        // On WebSocket Error
        socket.addEventListener('error', (event) => {
        console.error('WebSocket error:', event);
        //appendMessage('WebSocket error occurred.');
        });

        // On WebSocket Closed
        socket.addEventListener('close', (event) => {
        console.log('WebSocket connection closed.');
        appendMessage('WebSocket connection closed.');
        });
    })


    $(document).ready(function () {
        $('.filter-stock-item').click(function () {
            // Loại bỏ class "active" khỏi tất cả các phần tử có class "filter-stock-item"
            $('.filter-stock-item').removeClass('active');

            // Thêm class "active" vào phần tử đang được click
            $(this).addClass('active');
        });
    });
    $(document).ready(function () {
        $('.stock-item').click(function () {
            // Loại bỏ class "active" khỏi tất cả các phần tử có class "filter-stock-item"
            $('.stock-item').removeClass('active');

            // Thêm class "active" vào phần tử đang được click
            $(this).addClass('active');
        });
    });
    $('.js-close-modal').click(function () {
        $(this).closest('.modal-first').fadeOut(400, function() {
                    $("body").css('overflow', 'auto');
                });
    });

    $('.js-search-cp').click(function () {
        let $js_page = $(this).closest('.homecontainer');
        $js_page.find('.modal-first').css('display', 'flex').hide().fadeIn(400);
        $("body").css('overflow', 'hidden');
    });

    $('.select-item').click(function () {
        // Loại bỏ class "active" khỏi tất cả các phần tử có class "select-item"
        $('.select-item').removeClass('active');

        // Thêm class "active" vào phần tử đang được click
        $(this).addClass('active');
    });
    $('.js-btn').click(function () {
        $('.js-btn').removeClass('active');


        $(this).addClass('active');
        if ($(this).hasClass('btn-sell')) {
            $('.js-btn-re').removeClass('btn-buy');
            $('.js-btn-re').addClass('btn-sell');
        } else if ($(this).hasClass('btn-buy')) {
            $('.js-btn-re').removeClass('btn-sell');
            $('.js-btn-re').addClass('btn-buy');
        }
    });

    $('.js-back-main').click(function () {
        $('.js-container-trade').hide();
        $('.tabbar__container').show();
        $('.js-container-main').show();

    })

    $('.js-trade').click(function () {
        $('.tabbar__container').hide();

        $('.js-container-trade').show();
        $('.js-container-main').hide();
    });
    getStock($('#exchange').val(), $('#stock').val());

    $('.btnChooseAll').click(function () {
        var quantity = $(this).data('quantity');
        $('#quantity').val(quantity);
    });

    $('.btnShowTransaction').click(function () {
        var type = $(this).data('type');
        $('.btn-choose[data-type="' + type + '"]').trigger('click');
        $('.js-container-trade').hide();
        $('.js-container-main').show();
    });
    
    function reloadIframe() {
        var iframe = document.getElementById('iframe_chart');
        iframe.src = iframe.src; // Assigning the same URL again reloads the iframe
    }

    // setInterval(function(){
    //     if(currentRequest <5){
    //         currentRequest+=1;
    //         getStock($('#exchange').val(), $('#stock').val());
    //     }
    //     // reloadIframe();
    // }, 1000);

    let currentRequest = 0;
    function getStock(exchange, stock) {
        $.ajax({
            url: '/getstock',
            type: 'get',
            data: {
                exchange: exchange,
                stock: stock
            },
            success: function (res) {
                currentRequest-=1;
                if (res != null) {
                    var color = 'orange';
                    var symbol = '';
                    var background = 'rgba(239, 83, 79, 0.1)';
                    if (res.lastPrice > res.r) {
                        color = 'green';
                        symbol = '+';
                        background = 'rgba(0, 124, 50, 0.1)';
                    }
                    else if (res.lastPrice < res.r) {
                        color = 'red';
                        symbol = '-';
                    }
                    $('.stockName').html(res.sym);
                    $('.lastPrice').html(accounting.formatNumber(res.lastPrice * 1000));
                    $('.lastPrice').css('color', color);
                    $('.changePc').html(symbol + '' + accounting.formatNumber(parseFloat(res.ot) * 1000));
                    $('.changePcChart').css('background', background);
                    $('.changePc').css('color', color);
                    $('.ot').html(symbol + '' + res.changePc + '%');
                    $('.ot').css('color', color);
                    var color2 = 'orange';
                    if(parseFloat(res.highPrice) > res.r){
                        color2 = 'green';
                    }
                    else if(parseFloat(res.highPrice) < res.r){
                        color2 = 'red';
                    }
                    var color3 = 'orange';
                    if(parseFloat(res.lowPrice) > res.r){
                        color3 = 'green';
                    }
                    else if(parseFloat(res.lowPrice) < res.r){
                        color3 = 'red';
                    }
                    var color4 = 'orange';
                    if(parseFloat(res.o) > res.r){
                        color4 = 'green';
                    }
                    else if(parseFloat(res.o) < res.r){
                        color4 = 'red';
                    }
                    $('.o').html(accounting.formatNumber(parseFloat(res.o) * 1000));
                    $('.o').css('color', color4);
                    $('.highPrice').html(accounting.formatNumber(parseFloat(res.highPrice) * 1000));
                    $('.highPrice').css('color', color2);
                    $('.lowPrice').html(accounting.formatNumber(parseFloat(res.lowPrice) * 1000));
                    $('.lowPrice').css('color', color3);
                    var g1 = res.g1.split('|');
                    $('#buy1Click').data('price', parseFloat(g1[0]) * 1000);
                    $('#buy1Price').html(accounting.formatNumber(parseFloat(g1[0]) * 1000));
                    $('#buy1Quantity').html(accounting.formatNumber(parseFloat(g1[1]) * 10));
                    var g2 = res.g2.split('|');
                    $('#buy2Click').data('price', parseFloat(g2[0]) * 1000);
                    $('#buy2Price').html(accounting.formatNumber(parseFloat(g2[0]) * 1000));
                    $('#buy2Quantity').html(accounting.formatNumber(parseFloat(g2[1]) * 10));
                    var g3 = res.g3.split('|');
                    $('#buy3Click').data('price', parseFloat(g3[0]) * 1000);
                    $('#buy3Price').html(accounting.formatNumber(parseFloat(g3[0]) * 1000));
                    $('#buy3Quantity').html(accounting.formatNumber(parseFloat(g3[1]) * 10));
                    var g4 = res.g4.split('|');
                    $('#sell1Click').data('price', parseFloat(g4[0]) * 1000);
                    $('#sell1Price').html(accounting.formatNumber(parseFloat(g4[0]) * 1000));
                    $('#sell1Quantity').html(accounting.formatNumber(parseFloat(g4[1]) * 10));
                    var g5 = res.g5.split('|');
                    $('#sell2Click').data('price', parseFloat(g5[0]) * 1000);
                    $('#sell2Price').html(accounting.formatNumber(parseFloat(g5[0]) * 1000));
                    $('#sell2Quantity').html(accounting.formatNumber(parseFloat(g5[1]) * 10));
                    var g6 = res.g6.split('|');
                    $('#sell3Click').data('price', parseFloat(g6[0]) * 1000);
                    $('#sell3Price').html(accounting.formatNumber(parseFloat(g6[0]) * 1000));
                    $('#sell3Quantity').html(accounting.formatNumber(parseFloat(g6[1]) * 10));
                    $('#floor').html(accounting.formatNumber(res.f * 1000));
                    $('#ceiling').html(accounting.formatNumber(res.c * 1000));
                    $('.tb').html(accounting.formatNumber(res.avePrice * 1000));
                    $('#btnShowPriceF').data('price', res.f * 1000);
                    $('#btnShowPriceC').data('price', res.c * 1000);
                    if($('#checkedNationalPrice').val() == 1){
                        $('#priceNows').val(res.lastPrice * 1000);
                    }
                    var totalBuy = parseFloat(g1[1] * 10) + parseFloat(g2[1] * 10) + parseFloat(g3[1] * 10);
                    var totalSell = parseFloat(g4[1] * 10) + parseFloat(g5[1] * 10) + parseFloat(g6[1] * 10);
                    var percentBuy = Math.floor((totalBuy * 100) / (totalBuy + totalSell));
                    var percentSell = 100 - percentBuy;
                    $('#percentBuy').html(percentBuy + '%');
                    $('#percentBuy').css('width', percentBuy +'%');
                    $('#percentSell').html(percentSell + '%');
                    $('#percentSell').css('width', percentSell +'%');
                    $('.r').html(accounting.formatNumber(res.r * 1000));
                    $('.lot').html(accounting.formatNumber(parseFloat(res.lot) * 10));
                    
                    $('#buy1Click, #buy2Click, #buy3Click, #sell1Click, #sell2Click, #sell3Click, #btnShowPriceF, #btnShowPriceC').click(function(){
                        var price = $(this).data('price');
                        $('#priceNows').val(price);
                    });
                    
                }
            }
        })
    }
    $(document).ready(function () {
        $('.btnFollow').click(function () {
            var stock = $(this).data('name');
            $.ajax({
                url: '/follow',
                type: 'get',
                data: {
                    stock: stock
                },
                success: function (res) {
                    if (res.status) {
                        toastr.success(res.message);
                        $(this).hide();
                    }
                    else {
                        toastr.error(res.message);
                    }
                }
            });
        });

        $('.btnFindStock').click(function () {
            var stockFirst = $(this).data('stock');
            getStockByKey(stockFirst);
        });
        getStockByKey('A');
        function getStockByKey(key){
            $.ajax({
                url: '/getallstock',
                type: 'get',
                data: {
                    key: key
                },
                success: function (res) {
                    if (res != null && res.length > 0) {
                        var html = '';
                        for (var i = 0; i < res.length; i++) {
                            html += '<div class="stock-item stockRedirect" data-stock="'+res[i].sym+'">' + res[i].sym + ' - ' + res[i].name + '</div>';
                        }
                        $('.list-item-stock').html(html);
                        $('.stockRedirect').click(function(){
                            var stock = $(this).data('stock');
                            window.location.href = '/action?stock=' + stock;
                        });
                    }
                }
            })
        }

        $('#btnTransaction').click(function () {
            var type = $('.btn-choose.active').data('type');
            if (type == 1) {
                $.ajax({
                    url: '/buy',
                    type: 'post',
                    data: {
                        stock: $('#stock').val(),
                        amount: $('#priceNows').val(),
                        quantity: $('#quantity').val(),
                        _token: $('#csrf').val()
                    },
                    success: function (res) {
                        if (res.status) {
                            toastr.success(res.message);
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                        else {
                            toastr.error(res.message);
                        }
                    }
                })
            }
            else {
                $.ajax({
                    url: '/sell',
                    type: 'post',
                    data: {
                        stock: $('#stock').val(),
                        amount: $('#priceNows').val(),
                        quantity: $('#quantity').val(),
                        _token: $('#csrf').val()
                    },
                    success: function (res) {
                        if (res.status) {
                            toastr.success(res.message);
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                        else {
                            toastr.error(res.message);
                        }
                    }
                })
            }
        });

        // Thêm sự kiện khi nhấn nút giảm
        $('.fa-minus').click(function () {
            // Lấy giá trị hiện tại của input
            var currentValue = parseFloat($(this).closest('div').find('input').val());
            // Trừ đi 10
            var newValue = currentValue - 50;
            // Cập nhật giá trị mới vào input
            $(this).closest('div').find('input').val(newValue);
        });

        // Thêm sự kiện khi nhấn nút tăng
        $('.fa-plus').click(function () {
            // Lấy giá trị hiện tại của input
            var currentValue = parseFloat($(this).closest('div').find('input').val());
            // Cộng thêm 10
            var newValue = currentValue + 50;
            // Cập nhật giá trị mới vào input
            $(this).closest('div').find('input').val(newValue);
        });
    });

    $('#menu_overtop').css('display', 'none');

</script>
@endsection
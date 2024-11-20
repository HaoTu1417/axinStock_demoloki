@extends('layout.layout_auth')
@section('content')

<style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }

    .homecontainer {
        background-color: #fff;
    }

    .header-default {
        background: #3e4cf3;
        display: flex;
        justify-content: center;
        height: 54px;
        align-items: center;
    }

    .header-default .logo-header {
        width: 132px;
        height: 26px;
    }

    .row>* {
        height: auto;
    }

    .col {
        background: #fff !important;

    }
    
    .badge-warning{
        background-color: orange;
    }

    a.nav-link.active {
        color: #fff !important;
        /* background: #fff !important; */
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        border: none !important;
        background: none !important;
        color: #fff !important;

    }

    .nav.nav-pills {
        margin-bottom: 20px;
        !important;
    }

    .nav-item {
        background: none !important;

    }

    .nav-link {
        color: #ccc !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;

    }

    .nav-pills .show>.nav-link {
        color: #ccc !important;

    }

    .items {}

    @media screen and (max-width: 768px) {
        .items::-webkit-scrollbar {
            display: none;
        }
    }

    .items::-webkit-scrollbar {}

    .item-cp.active {
        font-weight: bold;
        color: #3e4cf3;
        background: #eceeff;
    }

    .item-cp {
        padding: 6px 16px;
        white-space: nowrap;
        background-color: #f5f5f5;
        border-radius: 4px;
        color: #959595;
        width: auto;
        margin-right: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .list-item-cp {
        margin-top: 10px;
        display: flex;
        width: auto;
        overflow: auto;
    }

    .list-item-cp.list-item-cp2 {}

    .table-custom {}

    .table-custom thead th {
        color: #959595;
        font-size: 13px;
    }

    .ellipsis-text {
        display: inline-block;
        max-width: 120px;
        /* Giá trị tối đa của chiều rộng */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
    }

    .item-his .col-4 {
        margin: 5px 0;
    }

    .btn-buy.active {
        background: #1ba17f !important;
        color: white !important;
    }

    .btn-sell.active {
        background: #ef4034 !important;
        color: white !important;
    }

    .block-his {
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    th {
        font-size: 12px;
        color: #959595 !important;
    }


    .nav-item {
        opacity: 0.7 !important;
    }

    .nav-item.active {
        opacity: 1 !important;
    }

    .nav-item.active .js-icon-active {
        display: block;
    }

    .js-icon-active {
        display: none;
    }

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

    .badge-success {
        color: #fff;
        background-color: #28a745;
    }

    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 77%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
    }

    .badge-danger {
        color: #fff;
        background-color: #dc3545;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .table-row {
        display: flex;
        width: 100%;
        padding: 8px 0;

    }

    .table-header {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
    }

    .table-header {
        font-weight: bold;
    }

    .table-cell {
        flex: 1;
        padding: 8px;
        text-align: left;
    }
</style>

<div class="container homecontainer js-container-main">

    <div class="header-default" style="height:180px !important">
        <img class="logo-header" style="margin-top:-80px;width:132px;height:26px" src="{{asset($logo->image)}}">

    </div>

    <div class="tablist-home" style="border-radius:20px;margin-top:-15px;padding-top:30px">
        <ul class="nav ulTab" id="pills-tab" role="tablist" style="margin-top:-100px;padding-left: 95px;">
            <li style="position:relative" class="nav-item active" role="presentation">
                <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                    type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                    <img src="assets/images/dowload/icon_entrust_position.png"
                        style="width:20px;height:20px">
                    <span style="margin-top:4px;font-size:16px;">Vị thế<span>
                </button>
                <div class="js-icon-active" style="position:absolute;bottom:-6px;color:white;right:45%"><i
                        class="bi bi-caret-up-fill"></i></div>
            </li>
            <li style="position:relative" class="nav-item " role="presentation">
                <button class="nav-link" id="pills-ring-tab" data-bs-toggle="pill" data-bs-target="#pills-ring"
                    type="button" role="tab" aria-controls="pills-ring" aria-selected="false" tabindex="-1">
                    <img src="assets/images/dowload/icon_entrust_entrust.png"
                        style="width:20px;height:20px">
                    <span style="margin-top:4px;font-size:16px;">Lịch sử khớp lệnh<span>
                </button>
                <div class="js-icon-active" style="position:absolute;bottom:-6px;color:white;right:45%"><i
                        class="bi bi-caret-up-fill"></i></div>

            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent" ;
            style="border-top-right-radius:8px;border-top-left-radius:8px;">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                tabindex="0">
                <div class="table-container">
                    <div class="table-header">
                        <div class="table-cell">Mã CP</div>
                        <div class="table-cell">Giá vốn</div>
                        <div class="table-cell">Giá TT</div>
                        <div class="table-cell">KL</div>
                        <div class="table-cell">Lỗ/Lãi</div>
                    </div>
                    <?php if ($listStock != null && count($listStock) > 0) {
                        foreach ($listStock as $item) { ?>
                            <div class="item-data mt-3">
                                <div class="table-row">
                                    <div class="table-cell"
                                        style="color:<?= $item['o'] > 0 ? 'green' : ($item['o'] == 0 ? 'orange' : 'red') ?>">
                                        <?= $item['sym'] ?> <i
                                            class="bi bi-caret-<?= $item['o'] > 0 ? 'up' : 'down' ?> js-show-detail"
                                            style="margin-left:4px"></i></div>
                                    <div class="table-cell"><?= $item['ptb'] / 1000 ?></div>
                                    <div class="table-cell"><?= $item['ptt'] ?></div>
                                    <div class="table-cell"><?= number_format($item['t']) ?></div>
                                    <div class="table-cell"><span
                                            class="badge badge-<?= $item['o'] > 0 ? 'success' : ($item['o'] == 0 ? 'warning' : 'danger') ?>"><?= $item['o'] > 0 ? '+' : '' ?><?= $item['o'] ?>%</span>
                                    </div>
                                </div>
                                <div class="detail-info"
                                    style="padding:10px;border-bottom:1px solid #ccc;border-radius:8px;display:none">
                                    <div class=""
                                        style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;display:flex;justify-content:space-between">
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>Tổng vốn</span>
                                            <span
                                                style="font-weight:bold"><?= number_format($item['t'] * $item['ptb']) ?></span>
                                        </div>
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>Giá thị trường</span>
                                            <span
                                                style="font-weight:bold"><?= number_format($item['t'] * $item['ptt'] * 1000) ?></span>
                                        </div>
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>Lãi / Lỗ</span>
                                            <span
                                                style="font-weight:bold;color:<?= $item['i'] > 0 ? 'green' : ($item['i'] == 0 ? 'orange' : 'red') ?>"><?= number_format($item['i']) ?></span>
                                        </div>
                                    </div>
                                    <div class=" mt-3" style="width:100%;display:flex;justify-content:space-between">
                                        <div
                                            style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:48%;">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span style="color:#333">Tổng KL</span>
                                                <div style="color:black;font-weight:bold"><?= number_format($item['t']) ?></div>
                                            </div>
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span style="color:#333">KL khả dụng</span>
                                                <div style="color:black;font-weight:bold"><?= number_format($item['a']) ?></div>
                                            </div>
                                        </div>

                                        <div style="width:48%;display:flex;flex-direction:column;justify-content:space-between">
                                            <!-- <div style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:100%;">
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">KL khác</span>
                                                    <div style="color:black;font-weight:bold">0</div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">CPCT/Thưởng</span>
                                                    <div style="color:black;font-weight:bold">0</div>
                                                </div>

                                            </div> -->

                                            <div
                                                style="margin-top:8px;background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:100%">
                                                <div style="font-weight:bold">KL mua chờ về</div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">KL T0</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t0']) ?>
                                                    </div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">KL T1</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t1']) ?>
                                                    </div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">KL T2</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t2']) ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mt-3" style="width:100%;display:flex;justify-content:space-between">
                                        <a style="width:30%;font-size:14px" class="btn btn-success"
                                            onclick="window.location.href='/action?stock=<?= $item['sym'] ?>'">Mua</a>
                                        <a style="width:30%;font-size:14px" class="btn btn-danger"
                                            onclick="window.location.href='/action?stock=<?= $item['sym'] ?>'">Bán</a>

                                        <a style="width:30%;font-size:14px" class="btn btn-primary"
                                            onclick="window.location.href='/action?stock=<?= $item['sym'] ?>'">Thông tin mã</a>

                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>

                </div>
            </div>
            <div class="tab-pane fade" id="pills-yellow" role="tabpanel" aria-labelledby="pills-yellow-tab"
                tabindex="0">

            </div>
            <div class="tab-pane fade" id="pills-ring" role="tabpanel" aria-labelledby="pills-ring-tab" tabindex="0">

                <div
                    style="margin-top:8px;padding:6px;display:flex;background-color:#fff;border-radius:4px;justify-content:flex-start;align-items:center;width:90%">
                    <i class="bi bi-search" style="color:#333"></i>
                    <input class="js-search-his" id="txtSearchStock" placeholder="Nhập tên cổ phiếu/mã cổ phiếu"
                        style="border:none;outline:none;flex:1;margin-left:10px;background:#fff !important">
                </div>
                <div class="table-container">
                    <div class="table-header">
                        <div class="table-cell" style="flex:3 !important;text-align:center">Mã CP</div>
                        <div class="table-cell" style="flex:2 !important;text-align:center">Giá </div>
                        <div class="table-cell" style="flex:2 !important;text-align:center">Số lượng</div>
                        <div class="table-cell" style="flex:2 !important;text-align:center">Loại</div>
                    </div>
                    <div id="listHistory">
                    
                    </div>
                    <p style="text-align:center; margin-top: 20px"><a href="javascript:;" id="txtReadmore">Xem thêm</a></p>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-necklace" role="tabpanel" aria-labelledby="pills-necklace-tab"
                tabindex="0">

            </div>
        </div>
    </div>

</div>





@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
    $(document).ready(function () {
        let offset = 0;
        $('.nav-item').click(function () {
            $('.nav-item').removeClass('active');

            $(this).addClass('active');
        });
        function getHistory(action) {
            $.ajax({
                url: '/historyorder',
                type: 'get',
                data: {
                    stock: $('#txtSearchStock').val(),
                    offset : offset
                },
                success: function (res) {
                    if(action == 0){
                        $('#listHistory').empty();   
                    }
                    if (res != null && res.length > 0) {
                        var html = '';
                        for (var i = 0; i < res.length; i++) {
                            html += '<div class="item-data mt-3" style="border-radius:8px;border:1px solid #ccc">';
                            html += '<div class="table-row js-item-data">';
                                html += '<div class="table-cell" style="flex:3 !important;text-align:center">'+res[i].stock+'<br><span class="badge badge-'+(res[i].status == 0 ? 'warning' : (res[i].status == 1 ? 'success' : 'danger'))+'">'+(res[i].status == 0 ? 'Chờ khớp' : (res[i].status == 1 ? 'Khớp' : 'Huỷ'))+'</span></div>';
                                html += '<div class="table-cell" style="flex:2 !important;text-align:center">'+accounting.formatNumber(res[i].prices)+'</div>';
                                html += '<div class="table-cell" style="flex:2 !important;text-align:center">'+accounting.formatNumber(res[i].quantity)+'</div>';
                                html += '<div class="table-cell" style="flex:2 !important;text-align:center">';
                                    html += '<span style="color:'+(res[i].type == 1 ? 'green' : 'red')+';font-weight:bold">'+(res[i].type == 1 ? 'Mua' : 'Bán')+'</span>';
                                html += '</div>';
                            html += '</div>';
                           html += ' <div class="detail-info" style="padding:0px 8px;padding-bottom:8px;border-bottom:1px solid #ccc;border-radius:8px;display:none">';
                                html += '<div class="" style="width:100%;display:flex;justify-content:space-between">';
                            html += '<div style="background-color:#f3f6f9;padding:15px;border-radius:4px 8px;width:100%;display:flex;flex-direction:column;justify-content:space-between">';
                            html += '<div style="display:flex;justify-content:space-between;width:100%">';
                            html += '<span style="color:#333">Thời gian đặt</span>';
                            html += ' <div style="color:black;font-weight:bold">'+res[i].created_at.split(' ')[1]+'</div>';
                            html += '</div>';
                            html += ' <div style="display:flex;justify-content:space-between;width:100%">';
                            html += '<span style="color:#333">Thời gian khớp</span>';
                            html += '<div style="color:black;font-weight:bold">'+ (res[i].status == 0 ? '...' : res[i].match_at.split(' ')[1]) +'</div>';
                            html += '</div>';
                            html += '<div style="display:flex;justify-content:space-between;width:100%">';
                            html += '<span style="color:#333">Khối lượng khớp</span>';
                            html += '<div style="color:black;font-weight:bold">'+accounting.formatNumber(res[i].quantity)+'</div>';
                            html += '</div>';
                            html += '<div style="display:flex;justify-content:space-between;width:100%">';
                            html += '<span style="color:#333">Giá khớp trung bình</span>';
                            html += '<div style="color:black;font-weight:bold">'+accounting.formatNumber(res[i].prices)+'</div>';
                            html += '</div></div></div></div></div>';
                            html += ' </div>';
                        }
                        if(action == 0){
                            $('#listHistory').html(html);
                        }
                        else{
                            $('#listHistory').append(html);
                        }
                        $('.js-item-data').on('click', function () {
                            var detailInfo = $(this).closest('.item-data').find('.detail-info');
                            detailInfo.slideToggle(300);
                        });
                        $('.js-show-detail').on('click', function () {
                            var detailInfo = $(this).closest('.item-data').find('.detail-info');
                            detailInfo.slideToggle(300);
                        });
                        if(res.length < 10){
                            $('#txtReadmore').hide();
                        }
                    }
                    else{
                        $('#txtReadmore').hide();
                    }
                }
            })
        }
        $('#txtReadmore').click(function(){
            offset = offset + 10;
            getHistory(1);
        });
        $('#txtSearchStock').change(function(){
            offset = 0;
            getHistory(0);
        });
        getHistory(0);
    });
</script>
@endsection
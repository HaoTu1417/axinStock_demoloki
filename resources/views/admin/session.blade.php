@extends('layout.layout_admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
    <div class="row">
        <!--@include('admin.sidebar')-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Danh sách phiên đặt cược
                        <b class="t1 text-danger">0</b>
                        <b class="t2 text-danger">0</b>
                        <b class="text-danger">:</b>
                        <b class="t3 text-danger">0</b>
                        <b class="t4 text-danger">0</b>
                        <button type="button" class="btn btn-primary float-end" id="btnShowReport">Thống kê</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tblSessionList">
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Vàng bạc
                            </h4>
                            <h4  class="card-title" id="totalPricesGold"></span>
                        </div>
                        <div class="card-body">
                                    <table class="table table-bordered" id="tblGold">
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Xăng dầu
                            </h4>
                            <h4  class="card-title" id="totalPricesOil"></span>
                        </div>
                        <div class="card-body">
                                    <table class="table table-bordered" id="tblOil">
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Hottrend
                            </h4>
                            <h4  class="card-title" id="totalPricesHottrend"></span>
                        </div>
                        <div class="card-body">
                                    <table class="table table-bordered" id="tblHottrend">
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Viral
                            </h4>
                            <h4  class="card-title" id="totalPricesViral"></span>
                        </div>
                        <div class="card-body">
                                    <table class="table table-bordered" id="tblViral">
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Lúa gạo
                            </h4>
                            <h4  class="card-title" id="totalPricesRice"></span>
                        </div>
                        <div class="card-body">
                                    <table class="table table-bordered" id="tblRice">
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                Khác
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="tblReportPlayList">
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    <div id="modaulShowUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Chỉnh sửa phiên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">Số phiên</label>
                        <input type="text" class="form-control" id="txtSessionId" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Kết quả</label>
                        <select class="form-select" id="txtNumber">
                            <option value="c">V1 - Vàng Bạc - Viral</option>
                            <option value="e">V2 - Vàng Bạc - Viral</option>
                            <option value="h">P - Vàng Bạc - HotTrend</option>
                            <option value="j">V3 - Vàng Bạc - HotTrend</option>
                            <option value="d">LG - Xăng Dầu - Viral</option>
                            <option value="f">A1 - Xăng Dầu - Viral</option>
                            <option value="g">A2 - Xăng Dầu - HotTrend</option>
                            <option value="i">D - Xăng Dầu - HotTrend</option>
                            <option value="a">A - Lúa gạo - Viral</option>
                            <option value="b">B - Lúa gạo - HotTrend</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary " id="btnChangeUserInfor">Lưu thông tin</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="modaulShowReport" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Thống kê</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="date" class="form-control" id="txtDate" value="<?= date('Y-m-d') ?>" />
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" id="txtTotal" disabled/>
                        </div>
                    </div>
                    <table class="table table-bordered" id="tblReportList">
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <input type="text" id="txtCountDownTime" hidden value="<?= $session_time ?>" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            const t1 = $('.t1');
            const t2 = $('.t2');
            const t3 = $('.t3');
            const t4 = $('.t4');
            list();
            listGold();
            listPlatinum();
            listRuby();
            listHottrend();
            listViral();
            reportList();
            
            setInterval(function(){
                list();
                listGold();
                listPlatinum();
                listRuby();
                listHottrend();
                listViral();
                reportList();
            }, 5000);
            
            $('#btnShowReport').click(function(){
                reportlist();
                $('#modaulShowReport').modal('show');
            });
            $('#txtDate').change(function(){
               reportlist();
                $('#modaulShowReport').modal('show'); 
            });
            function reportlist() {
                $.ajax({
                    url: '/manager/reportplay',
                    type: 'get',
                    data:{
                      date  : $('#txtDate').val()
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#txtTotal').val('Tổng lãi/lỗ: ' + accounting.formatMoney(res[0].total, "đ", 0, ".", ",", "%v%s"));
                        }
                        $('#tblReportList').bootstrapTable('destroy');
                        $('#tblReportList').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'session_id',
                                    title: 'Phiên',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'totalPlay',
                                    title: 'Tổng cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'totalWin',
                                    title: 'Tổng khách thắng',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'totalPlay',
                                    title: 'Lãi lỗ',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(row.totalPlay - row.totalWin, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }

            function list() {
                $.ajax({
                    url: '/manager/sessionlist',
                    type: 'get',
                    success: function(res) {
                        $('#tblSessionList').bootstrapTable('destroy');
                        $('#tblSessionList').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [{
                                    field: 'Id',
                                    title: 'chức năng',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return '<a href="javascript:;" class="btn btn-primary btn-sm me-1 btnDetail">Cập nhật</a>';
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            $('#txtHiddenId').val(r.id);
                                            $('#txtSessionId').val(r.id);
                                            $('#txtNumber').val(r.number);
                                            $('#modaulShowUser').modal('show');
                                        }
                                    }
                                },
                                {
                                    field: 'id',
                                    title: 'Phiên',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'name',
                                    title: 'Kết quả dự kiến',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'created_at',
                                    title: 'Thời gian',
                                    align: 'center',
                                    valign: 'middle'
                                },
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            
            function listPlay() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPrices').html('Tổng cược: ' + accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPrices').html('Tổng cược: 0');
                        }
                        $('#tblSessionPlayList').bootstrapTable('destroy');
                        $('#tblSessionPlayList').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [{
                                    field: 'customer_id',
                                    title: 'UID',
                                    align: 'center',
                                    valign: 'middle'
                                }, {
                                    field: 'username',
                                    title: 'Khách hàng',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'money',
                                    title: 'Số tiền',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'value',
                                    title: 'Đặt cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 'gold'){
                                            return 'Vàng bạc';                                            
                                        }
                                        else if(value == 'platinum'){
                                            return 'Lúa gạo';                                            
                                        }
                                        else if(value == 'ruby'){
                                            return 'Xăng dầu';                                            
                                        }
                                        else if(value == 'a'){
                                            return 'A';                                            
                                        }
                                        else if(value == 'b'){
                                            return 'B';                                            
                                        }
                                        else if(value == 'c'){
                                            return 'V1';                                            
                                        }
                                        else if(value == 'd'){
                                            return 'LG';                                            
                                        }
                                        else if(value == 'e'){
                                            return 'V2';                                            
                                        }
                                        else if(value == 'f'){
                                            return 'A1';                                            
                                        }
                                        else if(value == 'g'){
                                            return 'A2';                                            
                                        }
                                        else if(value == 'h'){
                                            return 'P';                                            
                                        }
                                        else if(value == 'i'){
                                            return 'D';                                            
                                        }
                                        else if(value == 'j'){
                                            return 'V3';                                            
                                        }
                                        else if(value == 'ring'){
                                            return 'HotTrend';                                            
                                        }
                                        else if(value == 'neck'){
                                            return 'Viral';                                            
                                        }
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: 'Thời gian',
                                    align: 'center',
                                    valign: 'middle'
                                },
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            
            function listGold() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    data:{
                      value : 'gold'  
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPricesGold').html(accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPricesGold').html('0');
                        }
                        $('#tblGold').bootstrapTable('destroy');
                        $('#tblGold').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var html = '';
                                        html += 'UID: ' + row.customer_id + '<br/>';
                                        html += 'Khách hàng: ' + row.username + '<br/>';
                                        html += 'Số tiền: ' + accounting.formatMoney(row.money, "đ", 0, ".", ",", "%v%s") + '<br/>';
                                        html += 'Thời gian: ' + row.created_at + '<br/>';
                                        return html;
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            function listPlatinum() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    data:{
                      value : 'platinum'  
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPricesOil').html(accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPricesOil').html('0');
                        }
                        $('#tblOil').bootstrapTable('destroy');
                        $('#tblOil').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var html = '';
                                        html += 'UID: ' + row.customer_id + '<br/>';
                                        html += 'Khách hàng: ' + row.username + '<br/>';
                                        html += 'Số tiền: ' + accounting.formatMoney(row.money, "đ", 0, ".", ",", "%v%s") + '<br/>';
                                        html += 'Thời gian: ' + row.created_at + '<br/>';
                                        return html;
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            function listRuby() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    data:{
                      value : 'ruby'  
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPricesRice').html(accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPricesRice').html('0');
                        }
                        $('#tblRice').bootstrapTable('destroy');
                        $('#tblRice').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var html = '';
                                        html += 'UID: ' + row.customer_id + '<br/>'; 
                                        html += 'Khách hàng: ' + row.username + '<br/>';
                                        html += 'Số tiền: ' + accounting.formatMoney(row.money, "đ", 0, ".", ",", "%v%s") + '<br/>';
                                        html += 'Thời gian: ' + row.created_at + '<br/>';
                                        return html;
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            function listHottrend() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    data:{
                      value : 'ring'  
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPricesHottrend').html(accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPricesHottrend').html('0');
                        }
                        $('#tblHottrend').bootstrapTable('destroy');
                        $('#tblHottrend').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var html = '';
                                        html += 'UID: ' + row.customer_id + '<br/>';
                                        html += 'Khách hàng: ' + row.username + '<br/>';
                                        html += 'Số tiền: ' + accounting.formatMoney(row.money, "đ", 0, ".", ",", "%v%s") + '<br/>';
                                        html += 'Thời gian: ' + row.created_at + '<br/>';
                                        return html;
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            function listViral() {
                $.ajax({
                    url: '/manager/playlistsession',
                    type: 'get',
                    data:{
                      value : 'neck'  
                    },
                    success: function(res) {
                        if(res != null && res.length > 0){
                            $('#totalPricesViral').html(accounting.formatMoney(res[0].totalMoney, "", 0, ".", ",", "%v%s"));
                        }
                        else{
                            $('#totalPricesViral').html('0');
                        }
                        $('#tblViral').bootstrapTable('destroy');
                        $('#tblViral').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var html = '';
                                        html += 'UID: ' + row.customer_id + '<br/>';
                                        html += 'Khách hàng: ' + row.username + '<br/>';
                                        html += 'Số tiền: ' + accounting.formatMoney(row.money, "đ", 0, ".", ",", "%v%s") + '<br/>';
                                        html += 'Thời gian: ' + row.created_at + '<br/>';
                                        return html;
                                    }
                                }
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            
            function reportList() {
                $.ajax({
                    url: '/manager/reportsession',
                    type: 'get',
                    success: function(res) {
                        $('#tblReportPlayList').bootstrapTable('destroy');
                        $('#tblReportPlayList').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'value',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 'gold'){
                                            return 'Vàng bạc';                                            
                                        }
                                        else if(value == 'platinum'){
                                            return 'Lúa gạo';                                            
                                        }
                                        else if(value == 'ruby'){
                                            return 'Xăng dầu';                                            
                                        }
                                        else if(value == 'a'){
                                            return 'A';                                            
                                        }
                                        else if(value == 'b'){
                                            return 'B';                                            
                                        }
                                        else if(value == 'c'){
                                            return 'V1';                                            
                                        }
                                        else if(value == 'd'){
                                            return 'LG';                                            
                                        }
                                        else if(value == 'e'){
                                            return 'V2';                                            
                                        }
                                        else if(value == 'f'){
                                            return 'A1';                                            
                                        }
                                        else if(value == 'g'){
                                            return 'A2';                                            
                                        }
                                        else if(value == 'h'){
                                            return 'P';                                            
                                        }
                                        else if(value == 'i'){
                                            return 'D';                                            
                                        }
                                        else if(value == 'j'){
                                            return 'V3';                                            
                                        }
                                        else if(value == 'ring'){
                                            return 'HotTrend';                                            
                                        }
                                        else if(value == 'neck'){
                                            return 'Viral';                                            
                                        }
                                    }
                                },
                                {
                                    field: 'total',
                                    title: '',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
            
            setInterval(function () {
                countDownTime();
            }, 1000);


            function countDownTime() {
                let timer = parseInt($('#txtCountDownTime').val());

                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;

                if (timer <= 0) {
                    getSession();
                    return;
                }

                $('.t2').text(minutes);
                $('.t3').html(Math.floor(seconds / 10));
                $('.t4').html(seconds % 10);
                $('#txtCountDownTime').val(timer - 1);
            }

            function getSession() {
                $.ajax({
                    url: '/manager/getsession',
                    type: 'get',
                    success: function (res) {
                        if (res.status) {
                            if (res.message > 0) {
                                $('#txtCountDownTime').val(res.message);
                            }
                        }
                    }
                })
            }

            $('#btnChangeUserInfor').click(function(){
                $.ajax({
                    url: '/manager/changesession',
                    type:'post',
                    data:{
                        id: $('#txtHiddenId').val(),
                        number: $('#txtNumber').val(),
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            $('#modaulShowUser').modal('hide');
                            list();
                        }
                        else{
                            alert(res.message);
                        }
                    }
                })
            }); 
        })
    </script>
@endsection

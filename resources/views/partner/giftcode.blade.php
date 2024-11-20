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
                        Danh sách giftcode
                        
                    </h4>
                </div>
                <div class="card-body">
                    <button type="button" id="btnCreateGiftcode" class="btn btn-primary">Thêm mới</button>
                    <table class="table table-bordered" id="tblGiftcodeList">
                    </table>
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
                    <h5 class="modal-title" id="myModalLabel">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">Mã giftcode</label>
                        <input type="text" class="form-control" id="txtGiftcode" />
                        <small class="text-danger">Để trống hệ thống tự tạo mã giftcode</small>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Giá trị</label>
                        <input type="text" class="form-control" id="txtMoney" />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Hạn sử dụng</label>
                        <input type="date" class="form-control" id="txtExpDate" />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Tổng số</label>
                        <input type="text" class="form-control" id="txtQuantity" />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Cần đặt cược</label>
                        <select class="form-select" id="txtIsPlay">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" id="txtStatus">
                            <option value="0">Tắt</option>
                            <option value="1">Bật</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnChangeUserInfor">Lưu thông tin</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="modaulShowHistory" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lịch sử sử dụng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="tblGiftcodeUsedList">
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            list();
            $('#btnCreateGiftcode').click(function(){
                $('#txtHiddenId').val('');
                $('#txtGiftcode').val('');
                $('#txtMoney').val('');
                $('#txtExpDate').val('');
                $('#txtQuantity').val('');
                $('#myModalLabel').html('Thêm mới giftcode');
                $('#modaulShowUser').modal('show');
            });

            function list() {
                $.ajax({
                    url: '/manager/giftcodelist',
                    type: 'get',
                    success: function(res) {
                        $('#tblGiftcodeList').bootstrapTable('destroy');
                        $('#tblGiftcodeList').bootstrapTable({
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
                                        return '<a href="javascript:;" class="btn btn-primary btn-sm me-1 btnDetail">Cập nhật</a> <a href="javascript:;" class="btn btn-success btn-sm me-1 btnShowHistory">Lịch sử SD</a> <a href="javascript:;" class="btn btn-danger btn-sm me-1 btnDelete">Xoá</a>';
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            $('#txtHiddenId').val(r.id);
                                            $('#txtGiftcode').val(r.code);
                                            $('#txtMoney').val(r.money);
                                            $('#txtExpDate').val(r.exp_date);
                                            $('#txtQuantity').val(r.quantity);
                                            $('#txtStatus').val(r.status);
                                            $('#txtIsPlay').val(r.is_play);
                                            $('#myModalLabel').html('Cập nhật giftcode');
                                            $('#modaulShowUser').modal('show');
                                        },
                                        'click .btnDelete': function(e,v,r,i){
                                            if(confirm('Xoá giftcode này?')){
                                                $.ajax({
                                                    url: '/manager/deletegiftcode',
                                                    type:'get',
                                                    data:{
                                                        id: r.id
                                                    },
                                                    success: function(res){
                                                        if(res.status){
                                                            list();
                                                            alert(res.message);
                                                        }
                                                        else{
                                                            alert(res.message);
                                                        }
                                                    }
                                                })
                                            }
                                        },
                                        'click .btnShowHistory': function(e, v, r, i) {
                                            $.ajax({
                                                url: '/manager/historygiftcode',
                                                type:'get',
                                                data:{
                                                    code : r.code
                                                },
                                                success: function(res){
                                                    $('#tblGiftcodeUsedList').bootstrapTable('destroy');
                                                    $('#tblGiftcodeUsedList').bootstrapTable({
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
                                                                field: 'customer_id',
                                                                title: 'UID',
                                                                align: 'center',
                                                                valign: 'middle'
                                                            },
                                                            {
                                                                field: 'username',
                                                                title: 'Khách hàng',
                                                                align: 'center',
                                                                valign: 'middle'
                                                            },
                                                            {
                                                                field: 'money',
                                                                title: 'Giá trị',
                                                                align: 'center',
                                                                valign: 'middle',
                                                                formatter: function(value, row, index) {
                                                                    return accounting.formatMoney(value, "đ", 0,
                                                                        ".", ",", "%v%s");
                                                                }
                                                            },
                                                            {
                                                                field: 'created_at',
                                                                title: 'Ngày sử dụng',
                                                                align: 'center',
                                                                valign: 'middle'
                                                            },
                                                            {
                                                                field: 'code',
                                                                title: 'Mã quà tặng',
                                                                align: 'center',
                                                                valign: 'middle'
                                                            }
                                                        ],
                                                        onLoadSuccess: function(data) {
                            
                                                        }
                                                    })
                                                }
                                            });
                                            $('#modaulShowHistory').modal('show');
                                        }
                                    }
                                }, {
                                    field: 'code',
                                    title: 'Mã Gifcode',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'money',
                                    title: 'Giá trị',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'exp_date',
                                    title: 'Hạn sử dụng',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'quantity',
                                    title: 'Tổng số',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'quantity_used',
                                    title: 'Đã sử dụng',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'is_play',
                                    title: 'Cần đặt cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 0){
                                            return '<span class="badge bg-danger">Không</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-success">Có</span>';
                                        }
                                    }
                                },
                                {
                                    field: 'status',
                                    title: 'Trạng thái',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 0){
                                            return '<span class="badge bg-danger">Tắt</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-success">Bật</span>';
                                        }
                                    }
                                },
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }

            $('#btnChangeUserInfor').click(function(){
                $.ajax({
                    url: '/manager/addoreditgiftcode',
                    type:'post',
                    data:{
                        id: $('#txtHiddenId').val(),
                        status: $('#txtStatus').val(),
                        exp_date: $('#txtExpDate').val(),
                        money: $('#txtMoney').val(),
                        quantity: $('#txtQuantity').val(),
                        code: $('#txtGiftcode').val(),
                        is_play: $('#txtIsPlay').val(),
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

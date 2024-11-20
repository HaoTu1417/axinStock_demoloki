@extends('layout.layout_panner')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Danh sách <?= $type == 1 ? 'nạp tiền' : 'rút tiền' ?>
                        <span id="totalPrices" class="float-end"></span>
                        <span id="totalCustomer" class="float-end me-2"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tblTransferList">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="type" hidden value="<?= $type ?>" />
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    <div id="modaulShowUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Chỉnh sửa thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">Khách hàng</label>
                        <input type="text" class="form-control" id="txtUsername" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Số tiền</label>
                        <input type="text" class="form-control" id="txtMoney" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" id="sltStatus">
                            <option value="0">Đang xử lý</option>
                            <option value="1">Thành công</option>
                            <option value="2">Huỷ</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Lý do</label>
                        <input type="text" class="form-control" id="txtNote" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnChangeUserInfor">Lưu thông tin</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.min.js" integrity="sha512-LLsvn7RXQa0J/E40ChF/6YAf2V9PJuLGG1VeuZhMlWp+2yAKj98A1Q1lsChkM9niWqY0gCkvHvpzqQOFEfpxIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            console.log(1);
            list();

            function list() {
                $.ajax({
                    url: '/manager/transferlist',
                    type: 'get',
                    data:{
                        type : $('#type').val()
                    },
                    success: function(res) {
                        console.log(res);
                        if(res.data != null && res.data.length > 0){
                            $('#totalPrices').html('Tổng tiền: ' + accounting.formatMoney(res.data[0].total, "", 0, ".", ",", "%v%s"));
                            if($('#type').val() == 1){
                                $('#totalCustomer').html('Tổng người nạp: ' + accounting.formatMoney(res.total, "", 0, ".", ",", "%v%s"));
                            }
                        }
                        $('#tblTransferList').bootstrapTable('destroy');
                        $('#tblTransferList').bootstrapTable({
                            method: 'get',
                            data: res.data,
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
                                        if(row.status <= 0){
                                            return '<a href="javascript:;" class="btn btn-primary btn-sm me-1 btnDetail">Cập nhật</a>';
                                        }
                                        else{
                                            return '';
                                        }
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            $('#txtHiddenId').val(r.id);
                                            $('#txtUsername').val(r.email);
                                            $('#txtMoney').val(r.money);
                                            $('#modaulShowUser').modal('show');
                                        }
                                    }
                                }, {
                                    field: 'id',
                                    title: 'ID giao dịch',
                                    align: 'center',
                                    valign: 'middle'
                                },
                              
                                {
                                    field: 'email',
                                    title: 'Khách hàng',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value;
                                    }
                                },
                                {
                                    field: 'money',
                                    title: 'Số tiền',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: 'Ngày tạo',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'information',
                                    title: 'Tài khoản chuyển',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(value == ''){
                                            return '';
                                        }
                                        else{
                                            var info = value.split('|');
                                            if(info[1] == null){
                                                info[1] = '';
                                            }
                                            if(info[2] == null){
                                                info[2] = '';
                                            }
                                            return info[0] + "<br>" + info[1] + "<br>" + info[2];
                                        }
                                    }
                                },
                                {
                                    field: 'note',
                                    title: 'Nội dung',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'status',
                                    title: 'Trạng thái',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 0 || value == -1){
                                            return '<span class="badge bg-info">Đang xử lý</span>';
                                        }
                                        else if(value == 1){
                                            return '<span class="badge bg-success">Thành công</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-danger">Huỷ</span>';
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
        
            setInterval(function(){
                list();
            }, 300000);
        
            $('#btnChangeUserInfor').click(function(){
                $.ajax({
                    url: '/manager/transferstatus',
                    type:'post',
                    data:{
                        id: $('#txtHiddenId').val(),
                        status: $('#sltStatus').val(),
                        note: $('#txtNote').val(),
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

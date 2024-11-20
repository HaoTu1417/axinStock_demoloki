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
                        Danh sách lãi xuất
                     
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tblTransferList">
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
                    <h5 class="modal-title" id="myModalLabel">Chỉnh sửa thông tin lãi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">Cấp độ</label>
                        <input type="text" class="form-control" id="txtlv" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Loại ví</label>
                        <input type="text" class="form-control" id="txttype" readonly />
                    </div>
                    <div class=" row">
                        @for($i = 2; $i<=12;$i++)
                            @if($i != 11)
                            <div class="form-group mb-2 col-6">
                                <label class="form-label">{{$i}} lần lãi</label>
                                <input type="number" class="form-control" id="txtp{{$i}}" />
                            </div>
                            @endif
                        @endfor
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
            list();

            function list() {
                $.ajax({
                    url: '/partner/interestList',
                    type: 'get',
                    data:{
                    },
                    success: function(res) {
                        console.log(res);
                       
                        $('#tblTransferList').bootstrapTable('destroy');
                        $('#tblTransferList').bootstrapTable({
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
                                    field: 'level',
                                    title: 'Cấp độ',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'type',
                                    title: 'Loại ví',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'p2',
                                    title: 'tỉ lệ lãi 2',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p3',
                                    title: 'tỉ lệ lãi 3',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p4',
                                    title: 'tỉ lệ lãi 4',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p5',
                                    title: 'tỉ lệ lãi 5',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p6',
                                    title: 'tỉ lệ lãi 6',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                }, {
                                    field: 'p7',
                                    title: 'tỉ lệ lãi 7',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                }, {
                                    field: 'p8',
                                    title: 'tỉ lệ lãi 8',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p9',
                                    title: 'tỉ lệ lãi 9',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p10',
                                    title: 'tỉ lệ lãi 10',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                               
                                 {
                                    field: 'p12',
                                    title: 'tỉ lệ lãi 12',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
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
                    url: '/manager/interestStatus',
                    type:'post',
                    data:{
                        id: $('#txtHiddenId').val(),
                        p2: $('#txtp2').val(),
                        p3: $('#txtp3').val(),
                        p4: $('#txtp4').val(),
                        p5: $('#txtp5').val(),
                        p6: $('#txtp6').val(),
                        p7: $('#txtp7').val(),
                        p8: $('#txtp8').val(),
                        p9: $('#txtp9').val(),
                        p10: $('#txtp10').val(),
                        p12: $('#txtp12').val(),
                        
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

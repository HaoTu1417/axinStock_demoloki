@extends('layout.layout_admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
@endsection
@section('main_content')
    <div class="row">
        <!--@include('admin.sidebar')-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Danh sách hoa hồng
                        <span id="totalPrices" class="float-end"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="date" class="form-control" id="txtDateChoose" value="<?= date('Y-m-d',strtotime("-1 days")) ?>" />
                        </div>
                    </div>
                    
                    <table class="table table-bordered" id="tblTransferList">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modalShowParent" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Danh sách tài khoản cấp trên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="tblTransferListParent">
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
            
            function parent(id){
                $.ajax({
                    url: '/manager/getparent',
                    type: 'get',
                    data:{
                      customer_id : id  
                    },
                    success: function(res) {
                        $('#tblTransferListParent').bootstrapTable('destroy');
                        $('#tblTransferListParent').bootstrapTable({
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
                                    field: 'id',
                                    title: 'ID',
                                    align: 'center',
                                    valign: 'middle',
                                }, 
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
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return '+84' + value;
                                    }
                                },
                                {
                                        field: 'block_ref',
                                        title: 'Đóng băng',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return value == 1 ? '<b class="text-danger">Có</b>' : '<b class="text-success">Không</b>';
                                        }
                                    },
                                {
                                    field: 'level',
                                    title: 'Cấp bậc',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return 'F' + parseInt(value);
                                    }
                                },
                                {
                                    field: 'totalF',
                                    title: 'Số lượng cấp dưới',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'recharge_money',
                                    title: 'Tổng nạp',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'play_money',
                                    title: 'Tổng cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'ref_money',
                                    title: 'Hoa hồng',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: 'Ngày thống kê',
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
            
            $('#txtDateChoose').change(function(){
               list(); 
            });
            
            function list() {
                $.ajax({
                    url: '/manager/reflist',
                    type: 'get',
                    data:{
                      date : $('#txtDateChoose').val()  
                    },
                    success: function(res) {
                        $('#totalPrices').html('Tổng số người: ' + res.total);
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
                            detailView: true,
                            detailFormatter: function (index, row, element) {
                                 $(element).html("<table class='tblOrderDetail'></table>");
                                 $('.tblOrderDetail').bootstrapTable({
                                     url: "/manager/refdetail",
                                     method: 'get',
                                     queryParams: function (p) {
                                         return {
                                             id: row.customer_id
                                         }
                                     },
                                     sidePagination: "server",
                                     limit: 10,
                                     pageSize: 10,
                                     pageList: [10, 20, 50, 100],
                                     columns: [{
                                        field: 'id',
                                        title: 'ID',
                                        align: 'center',
                                        valign: 'middle',
                                    }, 
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
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return '+84' + value;
                                        }
                                    },
                                    {
                                        field: 'block_ref',
                                        title: 'Đóng băng',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return value == '1' ? '<b class="text-danger">Có</b>' : '<b class="text-success">Không</b>';
                                        }
                                    },
                                    {
                                        field: 'level',
                                        title: 'Cấp bậc',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return 'F' + parseInt(value);
                                        }
                                    },
                                    {
                                        field: 'recharge_money',
                                        title: 'Tổng nạp',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                        }
                                    },
                                    {
                                        field: 'play_money',
                                        title: 'Tổng cược',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                        }
                                    },
                                    {
                                        field: 'ref_money',
                                        title: 'Hoa hồng',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                        }
                                    },
                                    {
                                        field: 'created_at',
                                        title: 'Ngày thống kê',
                                        align: 'center',
                                        valign: 'middle'
                                    },
                                ],
                                 });
                            },
                            columns: [{
                                        field: 'id',
                                        title: '',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index){
                                            return '<a href="javascript:;" class="btnShowParent btn btn-sm btn-primary">Cấp trên</a>';
                                        },
                                        events:{
                                            'click .btnShowParent': function(e, v, r, i){
                                                parent(r.customer_id);
                                                $('#modalShowParent').modal('show');
                                            }
                                        }
                                    },
                                {
                                    field: 'id',
                                    title: 'ID',
                                    align: 'center',
                                    valign: 'middle',
                                }, 
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
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return '+84' + value;
                                    }
                                },
                                {
                                        field: 'block_ref',
                                        title: 'Đóng băng',
                                        align: 'center',
                                        valign: 'middle',
                                        formatter: function(value, row, index) {
                                            return value == 1 ? '<b class="text-danger">Có</b>' : '<b class="text-success">Không</b>';
                                        }
                                    },
                                {
                                    field: 'level',
                                    title: 'Cấp bậc',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return 'F' + parseInt(value);
                                    }
                                },
                                {
                                    field: 'totalF',
                                    title: 'Số lượng cấp dưới',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'recharge_money',
                                    title: 'Tổng nạp',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'play_money',
                                    title: 'Tổng cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'ref_money',
                                    title: 'Hoa hồng',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: 'Ngày thống kê',
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
        })
    </script>
@endsection

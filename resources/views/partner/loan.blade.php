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
                        Quản lý khoản vay
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
@endsection
@section('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.min.js" integrity="sha512-LLsvn7RXQa0J/E40ChF/6YAf2V9PJuLGG1VeuZhMlWp+2yAKj98A1Q1lsChkM9niWqY0gCkvHvpzqQOFEfpxIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            list();
            console.log(1);
            
            setInterval(function(){
                list();
            }, 300000);
            
            function list() {
                $.ajax({
                    url: '/partner/loanList',
                    type: 'get',
                    data: {
                      
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
                            columns: [{
                                    field: 'id',
                                    title: 'ID',
                                    align: 'center',
                                    valign: 'middle',
                                },
                                // {
                                //     field: 'customer_id',
                                //     title: 'UID',
                                //     align: 'center',
                                //     valign: 'middle'
                                // },
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
                                    field: 'deposit',
                                    title: 'Số tiền cọc',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'money',
                                    title: 'Số tiền Vay',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'exp_day',
                                    title: 'Hạn trả ',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return value + " ngày";
                                    }
                                },
                                 {
                                    field: 'percent',
                                    title: 'Lãi xuất',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return   value+"%";
                                    }
                                },
                                {
                                    field: 'totalday',
                                    title: 'Số ngày đã vay ',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                  {
                                    field: 'interest',
                                    title: 'Số tiền lãi phải trả',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                
                                 {
                                    field: 'status',
                                    title: 'Trạng thái',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                        if(value == 1){
                                            return '<span class="badge bg-success">Đã trả</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-warning">Đang vay</span>';
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
        })
    </script>
@endsection
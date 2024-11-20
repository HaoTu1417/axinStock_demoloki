@extends('layout.layout_admin')
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
                        @lang(108)
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>@lang(33)</label>
                            <select class="form-select" id="sltStatus">
                                <option value="-1">@lang(137)</option>
                                <option value="0">@lang(114)</option>
                                <option value="1">@lang(113)</option>
                                <option value="2">@lang(227)</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="btnExportExcel">@lang(293):</label><br>
                            <button id="btnExportExcel" class="btn btn-success" onclick="exportExcel()">@lang(293)</button>
                        </div>
                    </div>
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
         function exportExcel() {
    var tableData = $('#tblTransferList').bootstrapTable('getData');
    
     var cleanedData = tableData.map(function(row) {
        return {
                        'ID': row['id'],
                        '@lang(88)': row['email'],
                        '@lang(109)': row['type'] == 1 ? '@lang(242)' : '@lang(243)',
                        '@lang(110)': row['stock'],
                        '@lang(111)': row['quantity'],
                        '@lang(89)': row['prices'],
                        '@lang(112)': row['fee'],
                        '@lang(33)': row['status'] == 0 ? '@lang(114)' : (row['status'] == 1 ? '@lang(113)' : '@lang(95)'),
                        '@lang(115)': row['match_at'],
                    };
    });
              
                // Tạo một đối tượng Workbook mới
                var wb = XLSX.utils.book_new();

                // Định nghĩa các cột và tiêu đề tùy chỉnh
                var ws = XLSX.utils.json_to_sheet(cleanedData, {
                    header: [
                        'ID',
                        '@lang(88)',
                        '@lang(109)',
                        '@lang(110)',
                        '@lang(111)',
                        '@lang(89)',
                        '@lang(112)',
                        '@lang(33)',
                        '@lang(115)'
                    ]
                });

                // Thêm sheet vào Workbook
                XLSX.utils.book_append_sheet(wb, ws, 'transferlist');

                // Tạo file Excel và tải xuống
                XLSX.writeFile(wb, 'orderlist.xlsx');
            }

        $(document).ready(function() {
            list();
            console.log(1);
            
            setInterval(function(){
                list();
            }, 300000);
            $('#sltStatus').change(function(){
                 list();
            });
            
            function list() {
                $.ajax({
                    url: '/manager/orderList',
                    type: 'get',
                    data: {
                      status: $('#sltStatus').val()
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
                                    title: '@lang(88)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value;
                                    }
                                },
                                {
                                    field: 'type',
                                    title: '@lang(109)',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                        if(value == 1){
                                            return '<span class="badge bg-success">'+ '@lang(242)' +'</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-danger">'+ '@lang(243)' +'</span>';
                                        }
                                    }
                                },
                                {
                                    field: 'stock',
                                    title: '@lang(110)',
                                    align: 'center',
                                    valign: 'middle',
                                },
                                 {
                                    field: 'quantity',
                                    title: '@lang(111)',
                                    align: 'center',
                                    valign: 'middle',
                                },
                                  {
                                    field: 'prices',
                                    title: '@lang(89)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'fee',
                                    title: '@lang(112)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'status',
                                    title: '@lang(33)',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                        if(value == 0){
                                            return '<span class="badge bg-info">'+ '@lang(114)' +'</span>';
                                        }else if(value == 1)
                                            return '<span class="badge bg-success">'+'@lang(113)'+'</span>';
                                        else{
                                           return '<span class="badge bg-danger">'+'@lang(95)'+'</span>';
                                        }
                                    }
                                },
                                {
                                    field: 'match_at',
                                    title: '@lang(115)',
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

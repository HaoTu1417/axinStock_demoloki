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
                        @lang('106')
                    </h4>
                </div>
                <div class="card-body">
                      <div style="margin-left:20px">
                            <label for="btnExportExcel">@lang(293):</label><br>
                            <button id="btnExportExcel" class="btn btn-success" onclick="exportExcel()">@lang(293)</button>
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
                        '@lang(104)': row['befores'],
                        '@lang(89)': row['money'],
                        '@lang(105)': row['afters'],
                        '@lang(90)': row['created_at'],
                        '@lang(92)': row['note_trans']
                    };
    });
              
                // Tạo một đối tượng Workbook mới
                var wb = XLSX.utils.book_new();

                // Định nghĩa các cột và tiêu đề tùy chỉnh
                var ws = XLSX.utils.json_to_sheet(cleanedData, {
                    header: [
                       'ID',
                        '@lang(88)',
                        '@lang(104)',
                        '@lang(89)',
                        '@lang(105)',
                        '@lang(90)',
                        '@lang(92)'
                    ]
                });

                // Thêm sheet vào Workbook
                XLSX.utils.book_append_sheet(wb, ws, 'transferlist');

                // Tạo file Excel và tải xuống
                XLSX.writeFile(wb, 'historylist.xlsx');
            }
        $(document).ready(function() {
            list();
            console.log(1);
            
            setInterval(function(){
                list();
            }, 300000);
            
            function list() {
                let language = '{{session("language")}}';
                if(language == "cn"){
                                    $.ajax({
                    url: '/manager/historylist',
                    type: 'get',
                    data: {
                        type: $('#type').val()
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
                                    field: 'befores',
                                    title: '@lang(104)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'money',
                                    title: '@lang(89)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return (row.befores > row.afters ? '-' : '+') + accounting.formatMoney(value, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'afters',
                                    title: '@lang(105)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: '@lang(90)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                    {
                                    field: <?= session('language') == 'vi' ? "'note'" : "'note_trans'" ?>,
                                    title: '@lang(92)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });

                }else{
                     $.ajax({
                    url: '/manager/historylist',
                    type: 'get',
                    data: {
                        type: $('#type').val()
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
                                    field: 'befores',
                                    title: '@lang(104)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'money',
                                    title: '@lang(89)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(row.afters - row.befores, "", 0,
                                                ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'afters',
                                    title: '@lang(105)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'created_at',
                                    title: '@lang(90)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'note',
                                    title: '@lang(92)',
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
            }
        })
    </script>
@endsection

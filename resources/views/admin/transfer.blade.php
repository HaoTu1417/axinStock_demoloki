@extends('layout.layout_admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
@php
    $role_group = auth()->guard('admins')->user()->role_group;
    $config = json_decode(DB::table('role')->where('id',$role_group)->first()->config,true);
    $configTrafer = $config['transfer']['update'];
@endphp
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @if($type == 1)
                                @lang(99) 
                        @else
                                @lang(100)
                        @endif
                        <span id="totalPrices" class="float-end"></span>
                        <span id="totalCustomer" class="float-end me-2"></span>
                    </h4>
                </div>
                
                <div class="card-body">
                    <div style="display:flex">
                        <div style="">
                            <label for="statusSelect">@lang(47):</label>
                            <select class="form-control" style="width:200px" id="statusSelect">
                                <option value="">@lang(137)</option>
                                <option value="0" <?= ($_REQUEST['status'] ?? '') == '0' ? 'selected' : '' ?>>@lang(94)</option>
                                <option value="1" <?= ($_REQUEST['status'] ?? '') == '1' ? 'selected' : '' ?>>@lang(93)</option>
                                <option value="2" <?= ($_REQUEST['status'] ?? '') == '2' ? 'selected' : '' ?>>@lang(95)</option>
                            </select>
                        </div>
                        <div style="margin-left:20px">
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
    <form method="get" id="form-filter-data" action='/manager/transfer'>
        <input type="text" id="type" name="type" hidden value="<?= $type ?>" />
        <input type="text" id="status" name="status" hidden value="{{$_REQUEST['status'] ?? ''}}">
    </form>
   

    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    <div id="modaulShowUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">@lang(96)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(88)</label>
                        <input type="text" class="form-control" id="txtUsername" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(89)</label>
                        <input type="text" class="form-control" id="txtMoney" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(33)</label>
                        <select class="form-select" id="sltStatus">
                            <option value="0">@lang(94)</option>
                            <option value="1">@lang(93)</option>
                            <option value="2">@lang(95)</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(92)</label>
                        <input type="text" class="form-control" id="txtNote" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(95)</button>
                    <button type="button" class="btn btn-primary" id="btnChangeUserInfor">@lang(126)</button>
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
    // JavaScript to handle onchange event of statusSelect
    document.getElementById('statusSelect').addEventListener('change', function() {
        // Get the selected value
        var selectedStatus = this.value;

        // Update the value of the hidden input 'status'
        document.getElementById('status').value = selectedStatus;

        // Submit the form 'form-filter-data'
        document.getElementById('form-filter-data').submit();
    });
</script>
    <script>
    function exportExcel() {
    var tableData = $('#tblTransferList').bootstrapTable('getData');
    
     var cleanedData = tableData.map(function(row) {
        return {
            'ID': row['id'],
            '@lang(88)': row['email'],
            '@lang(89)': row['money'],
            '@lang(90)': row['created_at'],
            '@lang(91)': row['information'],
            '@lang(92)': row['note'],
            '@lang(33)': row['status'],
            // '@lang(187)': row['@lang(187)'],
        };
    });
              
                // Tạo một đối tượng Workbook mới
                var wb = XLSX.utils.book_new();

                // Định nghĩa các cột và tiêu đề tùy chỉnh
                var ws = XLSX.utils.json_to_sheet(cleanedData, {
                    header: [
                        'ID',
                        '@lang(88)',
                        '@lang(89)',
                        '@lang(90)',
                        '@lang(91)',
                        '@lang(92)',
                        '@lang(33)',
                    ]
                });

                // Thêm sheet vào Workbook
                XLSX.utils.book_append_sheet(wb, ws, 'transferlist');

                // Tạo file Excel và tải xuống
                XLSX.writeFile(wb, 'transferlist.xlsx');
            }

        $(document).ready(function() {
            console.log(1);
            list();
            var update = '{{$configTrafer}}';

            function list() {
                $.ajax({
                    url: '/manager/transferlist',
                    type: 'get',
                    data:{
                        type : $('#type').val(),
                        status: $('#status').val()
                    },
                    success: function(res) {
                        console.log(res);
                        if(res.data != null && res.data.length > 0){
                            $('#totalPrices').html('@lang("253"): ' + accounting.formatMoney(res.data[0].total, "", 0, ".", ",", "%v%s"));
                            if($('#type').val() == 1){
                                $('#totalCustomer').html('@lang("254"): ' + accounting.formatMoney(res.total, "", 0, ".", ",", "%v%s"));
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
                            columns: [
                                {
                                    field: 'id',
                                    title: '@lang(87)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                              
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
                                    field: 'money',
                                    title: '@lang(89)',
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
                                    field: 'information',
                                    title: '@lang(91)',
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
                                    title: '@lang(92)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'status',
                                    title: '@lang(33)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 0 || value == -1){
                                            return '<span class="badge bg-info">'+'@lang(94)'+'</span>';
                                        }
                                        else if(value == 1){
                                            return '<span class="badge bg-success">'+'@lang(93)'+'</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-danger">'+'@lang(95)'+'</span>';
                                        }
                                    }
                                },
                                 {
                                    field: 'Id',
                                    title: '@lang(187)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(update == 1){
                                            if(row.status <= 0){
                                                return '<a href="javascript:;" class="btnDetail"><i class="ri-pencil-fill align-bottom text-muted"></i></a>';
                                            }
                                            else{
                                                return '';
                                            }
                                        }else{
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

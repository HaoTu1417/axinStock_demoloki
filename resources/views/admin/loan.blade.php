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
$configLoan = $config['loan']['update'];
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    @lang(142)
                </h4>
            </div>
            <div class="card-body">
               <div style="display:flex;">
                    <div style="">
                                       <label for="statusSelect">@lang(33):</label>
                                       <select class="form-control" style="width:200px" id="statusSelect">
                <option value="">@lang(137)</option>
                <option value="2" <?= ($_REQUEST['type'] ?? '') == '2' ? 'selected' : '' ?>>@lang(51)</option>
                <option value="1" <?= ($_REQUEST['type'] ?? '') == '1' ? 'selected' : '' ?>>@lang(52)</option>
                <option value="3" <?= ($_REQUEST['type'] ?? '') == '3' ? 'selected' : '' ?>>@lang(53)</option>
                    <option value="4" <?= ($_REQUEST['type'] ?? '') == '4' ? 'selected' : '' ?>>@lang(54)</option>
                <option value="5" <?= ($_REQUEST['type'] ?? '') == '5' ? 'selected' : '' ?>>@lang(55)</option>
                <option value="6" <?= ($_REQUEST['type'] ?? '') == '6' ? 'selected' : '' ?>>@lang(56)</option>
            
            
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
<form method="get" id="form-filter-data" action='/manager/loan'>
    <input type="text" id="type" name="type" hidden value="{{$_REQUEST['type'] ?? ''}}">
    <input type="text" id="status" name="status" hidden value="{{$_REQUEST['status'] ?? ''}}">
</form>
<input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
<div id="modaulShowUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
    aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">@lang(148)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden class="form-control" id="txtHiddenId" />
                <div class="form-group mb-2">
                    <label class="form-label">@lang(158)</label>
                    <input type="text" class="form-control" id="txtType" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(48)</label>
                    <input type="text" class="form-control" id="txtDeposit" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(225)</label>
                    <input type="text" class="form-control" id="txtExpDay" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(49)</label>
                    <input type="text" class="form-control" id="txtMoney" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(50)</label>
                    <input type="text" class="form-control" id="txtPercent" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(150)</label>
                    <input type="text" class="form-control" id="txtCreatedAt" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(151)</label>
                    <input type="text" class="form-control" id="txtNextAt" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(152)</label>
                    <input type="text" class="form-control" id="txtExpAt" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(153)</label>
                    <select class="form-select" id="sltisAuto">
                        <option value="0">@lang(154)</option>
                        <option value="1">@lang(155)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(33)</label>
                    <select class="form-select" id="sltStatus">
                        <option value="0">@lang(36)</option>
                        <option value="1">@lang(226)</option>
                        <option value="2">@lang(227)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(92)</label>
                    <input type="text" class="form-control" id="txtNote" />
                </div>
            </div>
            <div class="modal-footer" id="footerEdit">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(98)</button>
                <button type="button" class="btn btn-primary" id="btnChangeUserInfor">@lang(226)</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modaulShowAdd" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
    aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">@lang(271)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden class="form-control" id="txtHiddenIdAdd" />
                <div class="form-group mb-2">
                    <label class="form-label">@lang(158)</label>
                    <input type="text" class="form-control" id="txtTypeAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(48)</label>
                    <input type="text" class="form-control" id="txtDepositAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(225)</label>
                    <input type="text" class="form-control" id="txtExpDayAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(49)</label>
                    <input type="text" class="form-control" id="txtMoneyAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(50)</label>
                    <input type="text" class="form-control" id="txtPercentAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(150)</label>
                    <input type="text" class="form-control" id="txtCreatedAtAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(151)</label>
                    <input type="text" class="form-control" id="txtNextAtAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(152)</label>
                    <input type="text" class="form-control" id="txtExpAtAdd" readonly />
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(153)</label>
                    <select class="form-select" id="sltisAutoAdd" disabled>
                        <option value="0">@lang(154)</option>
                        <option value="1">@lang(155)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(33)</label>
                    <select class="form-select" id="sltStatusAdd" disabled>
                        <option value="0">@lang(36)</option>
                        <option value="1">@lang(226)</option>
                        <option value="2">@lang(227)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">@lang(273)</label>
                    <input type="text" class="form-control" id="txtAmountAdd" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(98)</button>
                <button type="button" class="btn btn-primary" id="btnChangeUserInforAdd">@lang(226)</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.min.js"
    integrity="sha512-LLsvn7RXQa0J/E40ChF/6YAf2V9PJuLGG1VeuZhMlWp+2yAKj98A1Q1lsChkM9niWqY0gCkvHvpzqQOFEfpxIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
    integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
    // JavaScript to handle onchange event of statusSelect
    document.getElementById('statusSelect').addEventListener('change', function() {
        // Get the selected value
        var selectedStatus = this.value;

        // Update the value of the hidden input 'status'
        document.getElementById('type').value = selectedStatus;

        // Submit the form 'form-filter-data'
        document.getElementById('form-filter-data').submit();
    });
</script>
<script>
  function exportExcel() {
    // Lấy dữ liệu hiện tại từ bootstrapTable
    var tableData = $('#tblTransferList').bootstrapTable('getData');

    // Loại bỏ các thuộc tính header mặc định từ dữ liệu
    var cleanedData = tableData.map(function(row) {
        return {
            'ID': row['ID'],
            '@lang(88)': row['email'],
            '@lang(48)': row['deposit'],
            '@lang(49)': row['money'],
            '@lang(143)': row['exp_day'],
            '@lang(50)': row['percent'],
            '@lang(158)': row['type'],
            '@lang(33)': row['status'],
            '@lang(46)': row['created_at'],
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
            '@lang(48)',
            '@lang(49)',
            '@lang(143)',
            '@lang(50)',
            '@lang(158)',
            '@lang(33)',
            '@lang(46)',
        ]
    });

    // Thêm sheet vào Workbook
    XLSX.utils.book_append_sheet(wb, ws, 'LoanList');

    // Tạo file Excel và tải xuống
    XLSX.writeFile(wb, 'LoanList.xlsx');
}
    $(document).ready(function () {
        list();
        console.log(1);

        $('#btnChangeUserInfor').click(function () {
            $.ajax({
                url: '/manager/acceptdebt',
                type: 'post',
                data: {
                    _token: $('#csrf').val(),
                    id: $('#txtHiddenId').val(),
                    note: $('#txtNote').val(),
                    is_auto: $('#sltisAuto').val(),
                    status: $('#sltStatus').val()
                },
                success: function (res) {
                    if (res.status) {
                        $('#modaulShowUser').modal('hide');
                        alert(res.message);
                        list();
                    }
                    else {
                        alert(res.message);
                    }
                }
            })
        });
        
        $('#btnChangeUserInforAdd').click(function () {
            $.ajax({
                url: '/manager/adddebt',
                type: 'post',
                data: {
                    _token: $('#csrf').val(),
                    id: $('#txtHiddenIdAdd').val(),
                    amount: $('#txtAmountAdd').val()
                },
                success: function (res) {
                        alert(res.message);
                        document.location.reload();
                    if (res.status) {
                        // $('#modaulShowAdd').modal('hide');
                        // list();
                    }
                    else {
                        alert(res.message);
                    }
                }
            })
        });

        var update = '{{$configLoan}}';

        setInterval(function () {
            list();
        }, 300000);
       

        function list() {
            $.ajax({
                url: '/manager/loanList',
                type: 'get',
                data: {
                    status: '{{$_REQUEST["status"]}}',
                    type: $("#type").val()

                },
                success: function (res) {
                    $('#tblTransferList').bootstrapTable('destroy');
                    $('#tblTransferList').bootstrapTable({
                        method: 'get',
                        data: res,
                        queryParams: function (p) {
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
                                formatter: function (value, row, index) {
                                    return value;
                                }
                            },

                            {
                                field: 'deposit',
                                title: '@lang(48)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    return accounting.formatMoney(value, "", 0,
                                        ".", ",", "%v%s");
                                }
                            },
                            {
                                field: 'money',
                                title: '@lang(49)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    return accounting.formatMoney(value, "", 0,
                                        ".", ",", "%v%s");
                                }
                            },
                            {
                                field: 'exp_day',
                                title: '@lang(143)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    return value + " ngày";
                                }
                            },
                            {
                                field: 'percent',
                                title: '@lang(50)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    return value + "%";
                                }
                            },
                            {
                                field: 'type',
                                title: '@lang(158)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    if (value == 1) {
                                        return '<span class="badge bg-primary">'+'@lang(52)'+'</span>';
                                    }
                                    else if (value == 2) {
                                        return '<span class="badge bg-success">'+'@lang(51)'+'</span>';
                                    }
                                    else if (value == 3) {
                                        return '<span class="badge" style="background:#b47dfc">'+'@lang(53)'+'</span>';
                                    } else if (value == 4) {
                                        return '<span class="badge bg-warning">@lang(54)</span>';
                                    } else if (value == 5) {
                                        return '<span class="badge" style="background:#ff5629">'+'@lang(55)'+'</span>';
                                    }
                                    else {
                                        return '<span class="badge " style="background:#646e8f">'+'@lang(56)'+'</span>';
                                    }
                                }
                            },

                            {
                                field: 'status',
                                title: '@lang(33)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    if (value == 0) {
                                        return '<span class="badge bg-primary">'+'@lang(36)'+'</span>';
                                    }
                                    else if (value == 1) {
                                        return '<span class="badge bg-success">'+'@lang(146)'+'</span>';
                                    }
                                    else if (value == 2) {
                                        return '<span class="badge bg-danger">'+'@lang(95)'+'</span>';
                                    }
                                    else {
                                        return '<span class="badge bg-info">'+'@lang(147)'+'</span>';
                                    }
                                }
                            },


                            {
                                field: 'created_at',
                                title: '@lang(46)',
                                align: 'center',
                                valign: 'middle'
                            },
                            
                            {
                                field: 'Id',
                                title: '@lang(187)',
                                align: 'center',
                                valign: 'middle',
                                formatter: function (value, row, index) {
                                    var html = '';
                                    html += '<a href="javascript:;" class=" btnDetailView me-1" data-toggle="tooltip" title="Chi tiết hợp đồng"><i class="ri-eye-line align-bottom text-muted"></i></a>';
                                    if (update == 1) {
                                        if (row.status == 0) {
                                            html += '<a href="javascript:;" class=" btnDetail me-1" data-toggle="tooltip" title="Duyệt hợp đồng"><i class="ri-pencil-fill align-bottom text-muted"></i></a>';
                                        }
                                        else if(row.status == 1){
                                            html += '<a href="javascript:;" class=" btnPayDebt me-1" data-toggle="tooltip" title="Thu hồi hợp đồng"><i class="ri-arrow-go-forward-line align-bottom text-muted"></i></a>';
                                            if(row.type != 2){
                                                html += '<a href="javascript:;" class=" btnAddDebt me-1" data-toggle="tooltip" title="Thêm tiền cọc"><i class="ri-wallet-2-line align-bottom text-muted"></i></a>';
                                            }
                                        }
                                    } else {
                                        html = ""
                                    }
                                    return html;
                                },
                                events: {
                                    'click .btnDetail': function (e, v, r, i) {
                                        $('#footerEdit').show();
                                        var type = '';
                                        if (r.type == 1) {
                                            type = '@lang(52)';
                                        }
                                        else if (r.type == 2) {
                                            type = '@lang(51)';
                                        }
                                        else if (r.type == 3) {
                                            type = '@lang(53)';
                                        } else if (r.type == 4) {
                                            type = '@lang(54)';
                                        } else if (r.type == 5) {
                                            type = '@lang(55)';
                                        }
                                        else {
                                            type = '@lang(56)';
                                        }
                                        $('#txtHiddenId').val(r.id);
                                        $('#txtType').val(type);
                                        $('#txtExpDay').val(r.money/r.deposit);
                                        $('#txtDeposit').val(accounting.formatMoney(r.deposit, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtMoney').val(accounting.formatMoney(r.money, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtPercent').val(r.percent + '%');
                                        $('#txtCreatedAt').val(r.created_at);
                                        $('#txtNextAt').val(r.next_at);
                                        $('#txtExpAt').val(r.exp_at);
                                        $('#sltisAuto').val(r.is_auto);
                                        $('#sltStatus').val(r.status);
                                        $('#txtNote').val(r.note);
                                        $('#modaulShowUser').modal('show');

                                    },
                                    'click .btnDetailView': function (e, v, r, i) {
                                        $('#footerEdit').hide();
                                        var type = '';
                                        if (r.type == 1) {
                                            type = '@lang(52)';
                                        }
                                        else if (r.type == 2) {
                                            type = '@lang(51)';
                                        }
                                        else if (r.type == 3) {
                                            type = '@lang(53)';
                                        } else if (r.type == 4) {
                                            type = '@lang(54)';
                                        } else if (r.type == 5) {
                                            type = '@lang(55)';
                                        }
                                        else {
                                            type = '@lang(56)';
                                        }
                                        $('#txtHiddenId').val(r.id);
                                        $('#txtType').val(type);
                                        $('#txtExpDay').val(r.money/r.deposit);
                                        $('#txtDeposit').val(accounting.formatMoney(r.deposit, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtMoney').val(accounting.formatMoney(r.money, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtPercent').val(r.percent + '%');
                                        $('#txtCreatedAt').val(r.created_at);
                                        $('#txtNextAt').val(r.next_at);
                                        $('#txtExpAt').val(r.exp_at);
                                        $('#sltisAuto').val(r.is_auto);
                                        $('#sltStatus').val(r.status);
                                        $('#txtNote').val(r.note);
                                        $('#modaulShowUser').modal('show');

                                    },
                                    'click .btnAddDebt': function(e, v, r, i){
                                        var type = '';
                                        if (r.type == 1) {
                                            type = '@lang(52)';
                                        }
                                        else if (r.type == 2) {
                                            type = '@lang(51)';
                                        }
                                        else if (r.type == 3) {
                                            type = '@lang(53)';
                                        } else if (r.type == 4) {
                                            type = '@lang(54)';
                                        } else if (r.type == 5) {
                                            type = '@lang(55)';
                                        }
                                        else {
                                            type = '@lang(56)';
                                        }
                                        $('#txtHiddenIdAdd').val(r.id);
                                        $('#txtTypeAdd').val(type);
                                        $('#txtExpDayAdd').val(r.money/r.deposit);
                                        $('#txtDepositAdd').val(accounting.formatMoney(r.deposit, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtMoneyAdd').val(accounting.formatMoney(r.money, "", 0,
                                            ".", ",", "%v%s"));
                                        $('#txtPercentAdd').val(r.percent + '%');
                                        $('#txtCreatedAtAdd').val(r.created_at);
                                        $('#txtNextAtAdd').val(r.next_at);
                                        $('#txtExpAtAdd').val(r.exp_at);
                                        $('#sltisAutoAdd').val(r.is_auto);
                                        $('#sltStatusAdd').val(r.status);
                                        $('#txtNoteAdd').val(r.note);
                                        $('#modaulShowAdd').modal('show');
                                    },
                                    'click .btnPayDebt': function(e, v, r, i){
                                        if(confirm('Bạn có muốn thanh toán hợp dồng này không?')){
                                            $.ajax({
                                                url: '/manager/paydebt',
                                                type:'get',
                                                data:{
                                                    id: r.id
                                                },
                                                success: function(res){
                                                    if(res.status){
                                                        toastr.success(res.message);
                                                        list();
                                                    }
                                                    else{
                                                        toastr.error(res.message);
                                                    }
                                                }
                                            })
                                        }
                                    }
                                }
                            },

                        ],
                        onLoadSuccess: function (data) {

                        }
                    })
                }
            });
        }
    })
</script>
@endsection
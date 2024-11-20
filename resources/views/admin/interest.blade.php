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
    $configInterest = $config['interest']['update'];
@endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @lang(172)
                     
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
                    <h5 class="modal-title" id="myModalLabel">@lang(96)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(157)</label>
                        <input type="text" class="form-control" id="txtlv" readonly />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(158)</label>
                        <input type="text" class="form-control" id="txttype" readonly />
                    </div>
                    <div class=" row">
                        @for($i = 2; $i<=12;$i++)
                            @if($i != 11)
                            <div class="form-group mb-2 col-6">
                                <label class="form-label">{{$i}} @lang(224)</label>
                                <input type="number" class="form-control" id="txtp{{$i}}" />
                            </div>
                            @endif
                        @endfor
                         <div class="form-group mb-2 col-6">
                            <label class="form-label">15 @lang(224)</label>
                            <input type="number" class="form-control" id="txtp15" />
                        </div>
                         <div class="form-group mb-2 col-6">
                            <label class="form-label">20 @lang(224)</label>
                            <input type="number" class="form-control" id="txtp20" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(127)</button>
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
        $(document).ready(function() {
            list();
            var update = '{{$configInterest}}';

            function list() {
                $.ajax({
                    url: '/manager/interestList',
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
                                    title: '@lang(78)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'type',
                                    title: '@lang(158)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        var type = '';
                                        if (value == 1) {
                                            type = '@lang(52)';
                                        }
                                        else if (value == 2) {
                                            type = '@lang(51)';
                                        }
                                        else if (value == 3) {
                                            type = '@lang(53)';
                                        } else if (value == 4) {
                                            type = '@lang(54)';
                                        } else if (value == 5) {
                                            type = '@lang(55)';
                                        }
                                        else {
                                            type = '@lang(56)';
                                        }
                                        return type;
                                    }
                                },
                                {
                                    field: 'p2',
                                    title: '@lang(159)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p3',
                                    title: '@lang(160)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p4',
                                    title: '@lang(161)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p5',
                                    title: '@lang(162)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p6',
                                    title: '@lang(163)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                }, {
                                    field: 'p7',
                                    title: '@lang(164)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                }, {
                                    field: 'p8',
                                    title: '@lang(165)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p9',
                                    title: '@lang(166)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p10',
                                    title: '@lang(167)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value + "%";
                                    }
                                },
                               
                                 {
                                    field: 'p12',
                                    title: '@lang(168)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(row.type != 6){
                                            return '-';
                                        }
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p15',
                                    title: '@lang(169)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(row.type != 6){
                                            return '-';
                                        }
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'p20',
                                    title: '@lang(170)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(row.type != 6){
                                            return '-';
                                        }
                                        return  value + "%";
                                    }
                                },
                                 {
                                    field: 'Id',
                                    title: 'action',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        if(update == 1){
                                        // if(row.status <= 0){
                                            return '<a href="javascript:;" class=" me-1 btnDetail"><i class="ri-pencil-fill align-bottom text-muted"></i></a>';
                                        }else{
                                            return '';
                                        }
                                        // else{
                                            // return '';
                                        // }
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            $('#txtHiddenId').val(r.id);
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
                                            $('#txtlv').val("'@lang(157)' " + r.level);
                                            $('#txttype').val(type);
                                            $('#txtp2').val(r.p2);
                                            $('#txtp3').val(r.p3);
                                            $('#txtp4').val(r.p4);
                                            $('#txtp5').val(r.p5);
                                            $('#txtp6').val(r.p6);
                                            $('#txtp7').val(r.p7);
                                            $('#txtp8').val(r.p8);
                                            $('#txtp9').val(r.p9);
                                            $('#txtp10').val(r.p10);
                                            $('#txtp12').val(r.p12);
                                            $('#txtp15').val(r.p15);
                                            $('#txtp20').val(r.p20);
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
                        p15: $('#txtp15').val(),
                        p20: $('#txtp20').val(),

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

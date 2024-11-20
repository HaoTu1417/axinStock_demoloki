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
    $configTrafer = $config['transfer']['read'];
@endphp
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @lang(270) 
                    </h4>
                </div>
                <div class="col-sm-auto ms-3 mt-2">
                    <div class="hstack gap-2">

                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#modal_create"><i class="ri-add-line align-bottom me-1"></i>@lang(278)</button>
                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tblTransferList">
                    </table>
                </div>
            </div>
        </div>
    </div>
    
     <div id="modal_create" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">@lang(263)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create-time" method="post" action="{{route('dayoffpost')}}">
                    <div class="modal-body">
                        @csrf
                        <input type="text" hidden class="form-control" name="id" id="" />

                        <div class="form-group mb-2">
                            <label class="form-label">@lang(264)</label>
                            <input type="text" class="form-control" name="name" id="" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">@lang(265)</label>
                            <input type="date" class="form-control" name="day" id=""  />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">@lang(266)</label>
                            <input type="time" class="form-control" name="from_hour" id=""  />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">@lang(267)</label>
                            <input type="time" class="form-control" name="to_hour" id=""  />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">@lang(268)</label>
                            <select name="is_holiday" class="form-select" id="">
                                <option value="1">@lang(155)</option>
                                <option value="0">@lang(154)</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(126)</button>-->
                    <button type="button" class="btn btn-primary" id="btnCreateUserInfor">@lang(269)</button>
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
                    <h5 class="modal-title" id="myModalLabel">@lang(263)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(264)</label>
                        <input type="text" class="form-control" id="txtName"  />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(265)</label>
                        <input type="date" class="form-control" id="txtDay"  />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(266)</label>
                        <input type="time" class="form-control" id="txtFromHour"  />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(267)</label>
                        <input type="time" class="form-control" id="txtToHour"  />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">@lang(268)</label>
                        <select class="form-select" id="txtIsHoliday">
                            <option value="1">@lang(155)</option>
                            <option value="0">@lang(154)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(126)</button>
                    <button type="button" class="btn btn-primary" id="btnChangeUserInfor">@lang(269)</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
        <div id="modaulDelete" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
               
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtDeleteId" />
                    <h3>@lang(274)</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(95)</button>
                    <button type="button" class="btn btn-primary" id="btn-delete">@lang(269)</button>
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
                    url: '/manager/dayofflist',
                    type: 'get',
                    success: function(res) {
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
                                    field: 'name',
                                    title: '@lang(275)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value;
                                    }
                                },
                                {
                                    field: 'day',
                                    title: '@lang(46)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'is_holiday',
                                    title: '@lang(279)',
                                    align: 'center',
                                    valign: 'middle',
                                      formatter: function(value, row, index) {
                                       
                                            if(value == 1){
                                                                                            return '@lang(155)';

                                            }else{
                                                                                            return '@lang(154)';

                                            }

                                        
                                    },
                                },
                                {
                                    field: 'from_hour',
                                    title: '@lang(276)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'to_hour',
                                    title: '@lang(277)',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                 {
                                    field: 'Id',
                                    title: '@lang(187)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                       
                                          
                                            return '<a href="javascript:;" class="btnDetail"><i class="ri-pencil-fill align-bottom text-muted"></i></a> <a href="javascript:;" class="btnDelete"><i class="ri-delete-bin-fill  text-muted align-bottom text-muted"></i></a>';
                                           
                                        
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            $('#txtHiddenId').val(r.id);
                                            $('#txtName').val(r.name);
                                            $('#txtDay').val(r.day);
                                            $('#txtFromHour').val(r.from_hour);
                                            $('#txtToHour').val(r.to_hour);
                                            $('#txtIsHoliday').val(r.is_holiday);
                                            $('#modaulShowUser').modal('show');
                                        },
                                         'click .btnDelete': function(e, v, r, i) {
                                            $('#txtDeleteId').val(r.id);
                                            $('#modaulDelete').modal('show');
                                        },
                                        
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
            
           $('#btnCreateUserInfor').click(function() {
            $.ajax({
                url: '/manager/dayoffpost',
                type: 'post',
                data: $('#form-create-time').serialize(),
                success: function(res) {
                    if(res.status) {
                        $('#modal_create').modal('hide');
                        list();
                        // window.location.reload();
                    } else {
                        alert(res.message);
                    }
                }
            });
        });
         $('#btn-delete').click(function(){
                $.ajax({
                    url: '/manager/deleteDayoff',
                    type:'post',
                    data:{
                        id: $('#txtDeleteId').val(),
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            alert(res.message);
                            $('#modaulDelete').modal('hide');
                            list();
                        }
                        else{
                            alert(res.message);
                        }
                    }
                })
            }); 
            $('#btnChangeUserInfor').click(function(){
                $.ajax({
                    url: '/manager/dayoffpost',
                    type:'post',
                    data:{
                        id: $('#txtHiddenId').val(),
                        name: $('#txtName').val(),
                        is_holiday: $('#txtIsHoliday').val(),
                        day: $('#txtDay').val(),
                        from_hour: $('#txtFromHour').val(),
                        to_hour: $('#txtToHour').val(),
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            alert(res.message);
                            $('#modaulShowUser').modal('hide');
                            list();
                            // window.location.reload();
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

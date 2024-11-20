@extends('layout.layout_admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
    <div class="row">
        <!--@include('admin.sidebar')-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Danh sách đặt cược
                        <span id="totalPrices" class="float-end"></span>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <table class="table table-bordered" id="tblPlayList">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            list();
            

            function list() {
                $.ajax({
                    url: '/manager/playlist',
                    type: 'get',
                    success: function(res) {
                        
                        $('#tblPlayList').bootstrapTable('destroy');
                        $('#tblPlayList').bootstrapTable({
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
                                    valign: 'middle'
                                },
                                {
                                    field: 'session_id',
                                    title: 'Phiên',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'customer_id',
                                    title: 'UID',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                {
                                    field: 'email',
                                    title: 'Khách hàng',
                                    align: 'center',
                                    valign: 'middle',
                                   
                                },
                                {
                                    field: 'money',
                                    title: 'Số tiền',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'receive',
                                    title: 'Nhận được',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return accounting.formatMoney(value, "đ", 0,
                                            ".", ",", "%v%s");
                                    }
                                },
                                {
                                    field: 'value',
                                    title: 'Đặt cược',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 'gold'){
                                            return 'Vàng bạc';                                            
                                        }
                                        else if(value == 'platinum'){
                                            return 'Lúa gạo';                                            
                                        }
                                        else if(value == 'ruby'){
                                            return 'Xăng dầu';                                            
                                        }
                                        else if(value == 'a'){
                                            return 'A';                                            
                                        }
                                        else if(value == 'b'){
                                            return 'B';                                            
                                        }
                                        else if(value == 'c'){
                                            return 'V1';                                            
                                        }
                                        else if(value == 'd'){
                                            return 'LG';                                            
                                        }
                                        else if(value == 'e'){
                                            return 'V2';                                            
                                        }
                                        else if(value == 'f'){
                                            return 'A1';                                            
                                        }
                                        else if(value == 'g'){
                                            return 'A2';                                            
                                        }
                                        else if(value == 'h'){
                                            return 'P';                                            
                                        }
                                        else if(value == 'i'){
                                            return 'D';                                            
                                        }
                                        else if(value == 'j'){
                                            return 'V3';                                            
                                        }
                                        else if(value == 'ring'){
                                            return 'HotTrend';                                            
                                        }
                                        else if(value == 'neck'){
                                            return 'Viral';                                            
                                        }
                                    }
                                },
                                {
                                    field: 'status',
                                    title: 'Trạng thái',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index){
                                        if(value == 0){
                                            return '<span class="badge bg-info">Đang xử lý</span>';
                                        }
                                        else if(value == 1){
                                            return '<span class="badge bg-success">Thắng</span>';
                                        }
                                        else{
                                            return '<span class="badge bg-danger">Thua</span>';
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
            };
            
        })
    </script>
@endsection

@extends('layout.layout_admin')
@section('style')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .wordWrap{
            word-wrap: break-word;
            min-width: 100px;
            max-width: 350px;
        }
    </style>
    <style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }

    .homecontainer {
        background-color: #fff;
    }

    .header-default {
        background: #3e4cf3;
        display: flex;
        justify-content: center;
        height: 54px;
        align-items: center;
    }

    #modal_cp .header-default .logo-header {
        width: 132px;
        height: 26px;
    }

    #modal_cp.row>* {
        height: auto;
    }

    #modal_cp .col {
        background: #fff !important;

    }

    #modal_cp a.nav-link.active {
        color: #fff !important;
        /* background: #fff !important; */
    }

    #modal_cp .nav-pills .nav-link.active,
    #modal_cp .nav-pills .show>.nav-link {
        border: none !important;
        background: none !important;
        color: #fff !important;

    }

    #modal_cp.nav.nav-pills {
        margin-bottom: 20px;
        !important;
    }

    #modal_cp .nav-item {
        background: none !important;

    }

    #modal_cp .nav-link {
        color: #ccc !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;

    }

    #modal_cp .nav-pills .show>.nav-link {
        color: #ccc !important;

    }

    #modal_cp .items {}

    @media screen and (max-width: 768px) {
        .items::-webkit-scrollbar {
            display: none;
        }
    }

    #modal_cp .items::-webkit-scrollbar {}

    #modal_cp .item-cp.active {
        font-weight: bold;
        color: #3e4cf3;
        background: #eceeff;
    }

    #modal_cp .item-cp {
        padding: 6px 16px;
        white-space: nowrap;
        background-color: #f5f5f5;
        border-radius: 4px;
        color: #959595;
        width: auto;
        margin-right: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    #modal_cp .list-item-cp {
        margin-top: 10px;
        display: flex;
        width: auto;
        overflow: auto;
    }

    #modal_cp .list-item-cp.list-item-cp2 {}

    #modal_cp .table-custom {}

    #modal_cp .table-custom thead th {
        color: #959595;
        font-size: 13px;
    }

    .ellipsis-text {
        display: inline-block;
        max-width: 120px;
        /* Giá trị tối đa của chiều rộng */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
    }

    .item-his .col-4 {
        margin: 5px 0;
    }

    .btn-buy.active {
        background: #1ba17f !important;
        color: white !important;
    }

    .btn-sell.active {
        background: #ef4034 !important;
        color: white !important;
    }

    .block-his {
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    th {
        font-size: 12px;
        color: #959595 !important;
    }


    #modal_cp .nav-item {
        opacity: 0.7 !important;
    }

    #modal_cp .nav-item.active {
        opacity: 1 !important;
    }

    #modal_cp .nav-item.active .js-icon-active {
        display: block;
    }

    #modal_cp .js-icon-active {
        display: none;
    }

    #modal_cp .select-item {
        font-size: 22px;
        margin-right: 10px;
        width: auto;
        cursor: pointer;
    }

    #modal_cp .select-item.active {
        font-weight: bold;
        border-bottom: 2px solid green;
    }

    .badge-success {
        color: #fff;
        background-color: #28a745;
    }

    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 77%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
    }

    .badge-danger {
        color: #fff;
        background-color: #dc3545;
    }

    .modal-data-view .table-container {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

   .modal-data-view .table-row {
        display: flex;
        width: 100%;
        padding: 8px 0;

    }

   .modal-data-view .table-header {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
    }

    .modal-data-view .table-header {
        font-weight: bold;
    }

   .modal-data-view .table-cell {
        flex: 1;
        padding: 8px;
        text-align: left;
    }
</style>
@endsection
@section('main_content')
@php
    $role_group = auth()->guard('admins')->user()->role_group;
    $config = json_decode(DB::table('role')->where('id',$role_group)->first()->config,true);
@endphp

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Customer</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                                        <li class="breadcrumb-item active">Customer</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="leadsList">
                                <div class="card-header border-0">

                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm-8" style="display:flex;align-items-center">
                                            <div class="search-box" style="width:300px">
                                                <input  id="txtsearch" value="" type="text" class="form-control search" placeholder="Tìm kiếm">
                                                <!--<i class="ri-search-line search-icon"></i>-->
                                            </div>
                                            
                                            <div class="search-box ms-2" style="width:300px">
                                                <select class="form-select" id="sltStatusSearch">
                                                    <option value="-1">@lang(137)</option>
                                                    <option value="0">@lang(34)</option>
                                                    <option value="1">@lang(36)</option>
                                                    <option value="2">@lang(35)</option>
                                                </select>
                                                <!--<i class="ri-search-line search-icon"></i>-->
                                            </div>
                                            <!--<button class="btn btn-primary js-search"><i class="ri-search-line search-icon"></i></button>-->
                                        </div>
                                        @if($config['customer']['add'] == 1)
                                        <div class="col-sm-auto ms-auto">
                                            <div class="hstack gap-2">

                                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#modal_create"><i class="ri-add-line align-bottom me-1"></i> @lang('196')</button>
                                                
                                                                 <div style="margin-left:20px">
                                                <!--<label for="btnExportExcel">@lang(293):</label><br>-->
                                                <button id="btnExportExcel" class="btn btn-success" onclick="exportExcel()">@lang(293)</button>
                                            </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="js-append">
                                        @include('admin.include.customer_table')
                                    </div>

                                    <div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width:700px">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                               <form id="form-create-customer" class="tablelist-form" autocomplete="off">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="username-field" class="form-label">@lang('28')</label>
                                                                    <input name="username" type="text" id="username-field" class="form-control" placeholder="@lang('28')" >
                                                                    <div class="invalid-feedback">Vui lòng điền username</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="email-field" class="form-label">@lang('30')</label>
                                                                    <input name="email" type="text" id="email-field" class="form-control" placeholder="@lang('30')" >
                                                                    <div class="invalid-feedback">Vui lòng điền email</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="phone-field" class="form-label">@lang('29')</label>
                                                                    <input name="phone" type="text" id="phone-field" class="form-control" placeholder="@lang('29')" >
                                                                    <div class="invalid-feedback">Vui lòng điền sdt</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="password-field" class="form-label">@lang(72)</label>
                                                                    <input type="password" name="password" type="text" id="password-field" class="form-control" placeholder="@lang(72)" >
                                                                    <div class="invalid-feedback">Vui lòng điền password</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="repassword-field" class="form-label">@lang(72)</label>
                                                                    <input type="password" name="repassword" type="text" id="repassword-field" class="form-control" placeholder="@lang(72)" >
                                                                    <div class="invalid-feedback">Vui lòng nhập lại password</div>
                                                                </div>
                                                            </div>
                                                             <div class="col-lg-4">
                                                               <div>
                                                                  <label for="role-field" class="form-label">@lang('21')</label>
                                                                  <select name="role" class="form-control" id="role-field">
                                                                        <option value="0">
                                                                            @lang('223')
                                                                        </option>
                                                                         <option value="1">
                                                                            @lang('79')
                                                                        </option>
                                                                  </select>
                                                               </div>
                                                               </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">@lang('212') </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal-->
                                    
                                    <div class="modal fade modal-data-view" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width:1000px">
                                          <div class="modal-content">
                                             <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home" role="tab" aria-selected="true">
                                                            @lang(71)
                                                        </a>
                                                    </li>
                                                        <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-manager2" role="tab" aria-selected="false" tabindex="-1">
                                                            Thay đổi số dư
                                                        </a>
                                                    </li>
                                                      <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-manager" role="tab" aria-selected="false" tabindex="-1">
                                                            Phí quản lý
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-bank" role="tab" aria-selected="false" tabindex="-1">
                                                            @lang(281)
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false" tabindex="-1">
                                                            @lang(42)
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-messages" role="tab" aria-selected="false" tabindex="-1">
                                                            @lang(41)
                                                        </a>
                                                    </li>
                                                      <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-history" role="tab" aria-selected="false" tabindex="-1">
                                                            @lang(6)
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#base-justified-debt" role="tab" aria-selected="false" tabindex="-1">
                                                            @lang(297)
                                                        </a>
                                                    </li>
                                                   
                                                </ul>
                                                <div class="tab-content  text-muted">
                                                    <div class="tab-pane active show" id="base-justified-home" role="tabpanel">
                                                        <div id="updateCustomerForm"></div>
                                                    </div>
                                                     <div class="tab-pane" id="base-justified-bank" role="tabpanel">
                                                        <div id="showbank"></div>
                                                    </div>
                                                    <div class="tab-pane" id="base-justified-product" role="tabpanel">
                                                        <div id="showCP"></div>
                                                    </div>
                                                    <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                                        <div id="showHD"></div>
                                                    </div>
                                                     <div class="tab-pane" id="base-justified-history" role="tabpanel">
                                                        <div id="showHT"></div>
                                                    </div>
                                                    <div class="tab-pane" id="base-justified-debt" role="tabpanel">
                                                        <div id="showDebt">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <input type="text" id="txtCustomerReportId" hidden />
                                                                    <select class="form-select" id="sltReportDebt">
                                                                        <option value="0">@lang(298)</option>
                                                                        <option value="1">@lang(299)</option>
                                                                        <option value="2">@lang(300)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-body px-0">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>@lang(52)</th>
                                                                            <th>@lang(53)</th>
                                                                            <th>@lang(54)</th>
                                                                            <th>@lang(56)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tBodyReportDebt">
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="tab-pane" id="base-justified-manager" role="tabpanel">
                                                        <div id="showManager">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                         <div class="tab-pane" id="base-justified-manager2" role="tabpanel">
                                                        <div id="showManager2">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4 class="fs-semibold">Bạn có chắc chắn muốn xóa không ?</h4>
                                                        <p class="text-muted fs-14 mb-4 pt-1">Xóa toàn bộ thông tin về khách hàng.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">

                                                            <button class="btn btn-link link-success fw-medium text-decoration-none material-shadow-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                            <a class="btn btn-danger" href="" id="js-delete-record">Yes, Delete It!!</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->



                                </div>
                            </div>

                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
<div id="modaulShowCTHD" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        
    <script>
    
      $(document).on('click', '#btnExportExcel', function () {
            let $table = $("#customerTable");
            let data = [];
            let headers = [];

            // Lấy headers từ bảng
            $table.find('thead th').each(function (index, th) {
                headers.push($(th).text().trim());
            });

            // Lấy dữ liệu từ bảng
            $table.find('tbody tr').each(function (index, tr) {
                let rowData = {};
                $(tr).find('td').each(function (i, td) {
                    rowData[headers[i]] = $(td).text().trim();
                });
                data.push(rowData);
            });

            // Tạo một đối tượng Workbook mới
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.json_to_sheet(data, { header: headers });

            // Thêm sheet vào Workbook
            XLSX.utils.book_append_sheet(wb, ws, 'CustomerList');

            // Tạo file Excel và tải xuống
            XLSX.writeFile(wb, 'CustomerList.xlsx');
        });
        $(document).on('click','.nav-item',function () {
            $('.nav-item').removeClass('active');

            $(this).addClass('active');
        });
        
          $(document).on('click','.js-show-detail',function () {
             var detailInfo = $(this).closest('.item-data').find('.detail-info');
                            detailInfo.slideToggle(300);
                        });
        
        
        
        $(document).ready(function() {
           $('#txtsearch').keyup(function(event) {
                
                    let txt = $(this).val();
                     $.ajax({// Replace with your actual URL to fetch user data
                    url: 'customerTable',
                    type: 'GET',
                    data: { s: txt, status : $('#sltStatusSearch').val() },
                    success: function(res) {


                        // Insert the new content into the modal
                        $('.js-append').html(res);
        

                      
                    },
                  
                });
                
            });
            $('#sltReportDebt').change(function(){
                $.ajax({
                    url : '/manager/debtreportcus',
                    type:'get',
                    data:{
                        type: $(this).val(),
                        customer_id: $('#txtCustomerReportId').val()
                    },
                    success: function(res){
                        var html = '<tr><td>'+res.t1+'</td><td>'+res.t2+'</td><td>'+res.t3+'</td><td>'+res.t4+'</td></tr>';
                        $('#tBodyReportDebt').html(html);
                    }
                })
            });
            $('#sltStatusSearch').change(function(event) {
                
                    let status = $(this).val();
                     $.ajax({// Replace with your actual URL to fetch user data
                    url: 'customerTable',
                    type: 'GET',
                    data: { s: $('#txtsearch').val(), status : status },
                    success: function(res) {


                        // Insert the new content into the modal
                        $('.js-append').html(res);
        

                      
                    },
                  
                });
                
            });
           $(document).on('click', '.js-remove-item', function(){
                    let $url = $(this).data('url');
                    console.log( $(document).find('.js-delete-record'));
                    $(document).find('#js-delete-record').attr('href', $url);
                });
                

                  $(document).on('click','.js-show-modal-loan',function() {
                var userId = $(this).data('id');
                
                
            });
            
            $(document).on('click','.edit-item-btn',function() {
                var userId = $(this).data('id');
        
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserinfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#updateCustomerForm').empty();

                        // Insert the new content into the modal
                        $('#updateCustomerForm').html(res);
                       
                        $('#modal_update').modal('show');
                    },
                  
                });
                 $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserBank',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showbank').empty();

                        // Insert the new content into the modal
                        $('#showbank').html(res);
                       
                    },
                  
                });
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserCpInfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showCP').empty();

                        // Insert the new content into the modal
                        $('#showCP').html(res);
                       
                      
                    },
                  
                });
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserLoanInfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showHD').empty();

                        // Insert the new content into the modal
                        $('#showHD').html(res);
                       
                      
                    },
                  
                });
                $('#txtCustomerReportId').val(userId);
                $.ajax({
                    url : '/manager/debtreportcus',
                    type:'get',
                    data:{
                        type: $('#sltReportDebt').val(),
                        customer_id: userId
                    },
                    success: function(res){
                        var html = '<tr><td>'+res.t1+'</td><td>'+res.t2+'</td><td>'+res.t3+'</td><td>'+res.t4+'</td></tr>';
                        $('#tBodyReportDebt').html(html);
                    }
                })
                 $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserHistoryInfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showHT').empty();

                        // Insert the new content into the modal
                        $('#showHT').html(res);
                       
                      
                    },
                  
                });
                
                 $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getManagerFee2',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showManager').empty();

                        // Insert the new content into the modal
                        $('#showManager').html(res);
                       
                      
                    },
                  
                });
                
                
                  $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getManagerFee22',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#showManager2').empty();

                        // Insert the new content into the modal
                        $('#showManager2').html(res);
                       
                      
                    },
                  
                });

            });

            $(document).on('change','#fee-manager-money-field',function() {
                var currentFee = parseFloat($(document).find('#fee-manager-now-field').val()) || 0;
                var money = parseFloat($(this).val()) || 0;
                
                var status = $(document).find('#fee-manager-status-field').val();

                var newFee;
                
        
                if (status == '1') {
                    newFee = currentFee + money;
                } else if (status == '2') {
                    newFee = currentFee - money;
                } else {
                    newFee = currentFee;
                }
                console.log(money,currentFee,newFee)

                console.log(newFee);
        
                $(document).find('#fee-manager-after-field').val(newFee);
            });
        
            $(document).on('change','#fee-manager-status-field',function() {
                $(document).find('#fee-manager-money-field').trigger('change');
            });

            $(document).on('click', '.btnShowDetailHD', function(){
                let id = $(this).data('id');
                $.ajax({// Replace with your actual URL to fetch user data
                    url: '/manager/detaildebt',
                    type: 'get',
                    data: { 
                        id: id
                    },
                    success: function(r) {
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
                        $('#txtDeposit').val(accounting.formatMoney(r.deposit, "", 0, ".", ",", "%v%s"));
                        $('#txtMoney').val(accounting.formatMoney(r.money, "", 0, ".", ",", "%v%s"));
                        $('#txtPercent').val(r.percent + '%');
                        $('#txtCreatedAt').val(r.created_at);
                        $('#txtNextAt').val(r.next_at);
                        $('#txtExpAt').val(r.exp_at);
                        $('#sltisAuto').val(r.is_auto);
                        $('#sltStatus').val(r.status);
                        $('#txtNote').val(r.note);
                        $('#modaulShowCTHD').modal('show');
                        
                    },
                  
                });
            });
            
              $(document).on('click','.js-sell-stock-cus',function() {
                let customerid = $(this).data('customer');
                let _token = $(this).find('input').val();
                let stock = $(this).data('stock');
                let amount = $(this).data('a') * 1000;
                let quantity = $(this).data('q');
                
                if(quantity == 0){
                    alert("Đã bán hết mã cổ phiếu này của khách !");
                    return
                }
                console.log(customerid,_token,stock,amount,quantity);
                
                $.ajax({// Replace with your actual URL to fetch user data
                    url: '/manager/sellStockCustomer',
                    type: 'POST',
                    data: { 
                        id: customerid,
                        _token: _token,
                        stock: stock,
                        amount: amount,
                        quantity: quantity
                    },
                    success: function(res) {
                        alert(res.message);
                        document.location.reload();
                        
                    },
                  
                });
            });
            
            
            
            $(document).on('click','.login-item-btn',function() {
                var userId = $(this).data('id');
        
                $.ajax({// Replace with your actual URL to fetch user data
                    url: '/manager/logincustomer',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        if(res.status){
                            window.open('https://app.datasstock.com');
                        }
                        else{
                            alert(res.message);
                        }
                      
                    },
                  
                });
            });
            $(document).on('click',".js-delete-bank-account", function(e) {
                 e.preventDefault(); 

                var confirmation = confirm('Are you sure you want to delete this bank account?');
                if (confirmation) {
                var id = $(this).data('id');
                     $.ajax({
                        url: '/manager/deleteBankCus', 
                        type: 'get',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            
                                alert('Bank updated successfully!');
                                $('#modal_update').modal('hide');
    
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating customer data:', error);
                        }
                    });
                }
            });
            
            $(document).on('submit', '#form-update-customer', function(e) {
                e.preventDefault(); // Prevent the default form submission
        
                var formData = $(this).serialize(); // Serialize the form data
        
                $.ajax({
                    url: '/manager/updateCustomer', // Replace with your actual URL to update customer data
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        
                            alert('Customer updated successfully!');
                            $('#modal_update').modal('hide');
                            document.location.reload();

                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating customer data:', error);
                    }
                });
            });
        });
    </script>

    <script>
    
        $(document).ready(function() {
            
             $(document).on('click','#form-add-fee-btn1', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/manager/addFeeCustomer',
                    type: 'POST',
                    data: $(document).find('#form-add-fee').serialize(),
                    success: function(res) {
                        if(res.status){
                            alert(res.message);
                            $('#modal_update').modal('hide');
                            // document.reload();
                        }else{
                            alert(res.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                    }
                });
             
            });
            
              $(document).on('click','#form-add-fee-btn2', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/manager/addFeeCustomer',
                    type: 'POST',
                    data: $(document).find('#form-add-fee2').serialize(),
                    success: function(res) {
                        if(res.status){
                            alert(res.message);
                            $('#modal_update').modal('hide');
                            // document.reload();
                        }else{
                            alert(res.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                    }
                });
             
            });
            
           $(document).ready(function() {
    $('#form-create-customer').on('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        let formData = $(this).serializeArray();

        formData.forEach(function(item) {
            if (!item.value) {
                isValid = false;
                $('#' + item.name + '-field').addClass('is-invalid');
            } else {
                $('#' + item.name + '-field').removeClass('is-invalid');
            }
        });

        if ($('#password-field').val() !== $('#repassword-field').val()) {
            isValid = false;
            $('#repassword-field').addClass('is-invalid');
            alert('Mật khẩu không khớp!');
        } else {
            $('#repassword-field').removeClass('is-invalid');
        }

        if (isValid) {
            $.ajax({
                url: '/manager/addCustomer',
                type: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    if(res.status){
                        alert(res.message);
                        document.reload();
                    }else{
                        alert(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra, vui lòng thử lại');
                }
            });
        } else {
            // alert('Vui lòng điền đủ thông tin');
        }
    });
    
    
    
});




        })
    </script>
@endsection

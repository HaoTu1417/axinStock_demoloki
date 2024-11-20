@extends('layout.layout_admin')
@section('style')
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
@endsection
@section('main_content')

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Add Role</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                                        <li class="breadcrumb-item active">Add Role</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    </div>
                    <!-- end page title -->

                <form method="post" action="{{route('updaterolepost')}}">
                    @csrf
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <div class="d-flex mt-3 mb-4" style="width:300px">
                        <input required="true" type="text" name="name" value="{{$data->name}}" placeholder="Tên loại quyền" class="form-control">
                    </div>

                  <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                           <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#statistic" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Thống kê hệ thống <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">1 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="statistic" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem thống kê</span> 
                                                <input type="checkbox" name="statistic_read" @if($data->config['statistic']['read'] == 1) checked @endif >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#customer" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý khách hàng <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">7 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="customer" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="customer_read" @if($data->config['customer']['read'] == 1) checked @endif >
                                            </div>
                                           
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Thêm khách hàng</span> 
                                                <input type="checkbox" name="customer_add" @if($data->config['customer']['add'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                                  <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Sửa khách hàng</span> 
                                                <input type="checkbox" name="customer_update" @if($data->config['customer']['update'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                                  <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xóa khách hàng</span> 
                                                <input type="checkbox" name="customer_delete" @if($data->config['customer']['delete'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                                
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Quản lý hợp đồng</span> 
                                                <input type="checkbox"  name="customer_loan"  @if($data->config['customer']['loan'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Quản lý cổ phiếu</span> 
                                                <input type="checkbox" name="customer_cp"  @if($data->config['customer']['cp'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Đăng nhập khách</span> 
                                                <input type="checkbox" name="customer_login"  @if($data->config['customer']['login'] == 1) checked @endif >
                                            </div>
            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#transfer" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý nạp rút <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">2 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="transfer" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="transfer_read"  @if($data->config['transfer']['read'] == 1) checked @endif>
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Cập nhật</span> 
                                                <input type="checkbox" name="transfer_update"  @if($data->config['transfer']['update'] == 1) checked @endif >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý mua bán <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">1 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="order" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="order_read" @if($data->config['order']['read'] == 1) checked @endif >
                                            </div>
                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý khiếu nại <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">2 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="report" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="report_read" @if($data->config['report']['read'] == 1) checked @endif >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Trả lời</span> 
                                                <input type="checkbox" name="report_update" @if($data->config['report']['update'] == 1) checked @endif >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#loan" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý hợp đồng <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">2 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="loan" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="loan_read"  @if($data->config['loan']['read'] == 1) checked @endif >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Cập nhật hợp đồng</span> 
                                                <input type="checkbox" name="loan_update"  @if($data->config['loan']['update'] == 1) checked @endif >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#interest" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý lãi xuất vay <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">2 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="interest" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="interest_read" @if($data->config['interest']['read'] == 1) checked @endif >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Cập nhật lãi xuất</span> 
                                                <input type="checkbox" name="interest_update"  @if($data->config['interest']['update'] == 1)  checked @endif>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#wallet" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Quản lý gửi tích kiệm <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">2 quyền</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse show" id="wallet" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">Xem danh sách</span> 
                                                <input type="checkbox" name="wallet_read"  @if($data->config['wallet']['read'] == 1)  checked @endif >
                                            </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      
                          
                           
                    </div>
                    
                    <button class="btn btn-success mt-4">Cập nhật quyền</button>
                     </form>

@endsection
@section('scripts')



        
  
@endsection

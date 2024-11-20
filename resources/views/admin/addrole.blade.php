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

                <form method="post" action="{{route('addrolepost')}}">
                    @csrf
                    <div class="d-flex mt-3 mb-4" style="width:300px">
                        <input required="true" type="text" name="name" placeholder="Tên loại quyền" class="form-control">
                    </div>

                  <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                           <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#statistic" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('0') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('213')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="statistic" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('194')</span> 
                                                <input type="checkbox" name="statistic_read" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#customer" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('19') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('219')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="customer" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="customer_read" >
                                            </div>
                                           
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('196')</span> 
                                                <input type="checkbox" name="customer_add" >
                                            </div>
            
                                    </div>
                                </div>
                                  <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('197')</span> 
                                                <input type="checkbox" name="customer_update" >
                                            </div>
            
                                    </div>
                                </div>
                                  <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('198')</span> 
                                                <input type="checkbox" name="customer_delete" >
                                            </div>
            
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('199')</span> 
                                                <input type="checkbox" name="customer_loan" >
                                            </div>
            
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('200')</span> 
                                                <input type="checkbox" name="customer_cp" >
                                            </div>
            
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('201')</span> 
                                                <input type="checkbox" name="customer_login" >
                                            </div>
            
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#transfer" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('2') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('214')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="transfer" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="transfer_read" >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('126')</span> 
                                                <input type="checkbox" name="transfer_update" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('5') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('213')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="order" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="order_read" >
                                            </div>
                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="col">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('116') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('214')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="report" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="report_read" >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('203')</span> 
                                                <input type="checkbox" name="report_update" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#loan" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('199') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('214')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="loan" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="loan_read" >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('204')</span> 
                                                <input type="checkbox" name="loan_update" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#interest" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('12') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('214')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="interest" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="interest_read" >
                                            </div>
                                        
                                    </div>
                                </div>
                                 <div class="card mb-1">
                                    <div class="card-body">
                                         
                                             <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('205')</span> 
                                                <input type="checkbox" name="interest_update" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="col mt-4">
                            <div class="card">
                                <a class="card-body bg-danger-subtle collapsed" data-bs-toggle="collapse" href="#wallet" role="button" aria-expanded="false" aria-controls="leadDiscovered">
                                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">@lang('13') <i class="ri-arrow-down-line"></i></h5>
                                    <p class="text-muted mb-0"><span class="fw-medium">@lang('214')</span></p>
                                </a>
                            </div>
                            <!--end card-->
                            <div class="collapse" id="wallet" style="">
                                <div class="card mb-1">
                                    <div class="card-body">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span class="fs-14 mb-1" style="white-space:nowrap">@lang('195')</span> 
                                                <input type="checkbox" name="wallet_read" >
                                            </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      
                          
                           
                    </div>
                    
                    <button class="btn btn-success mt-4">@lang('207')</button>
                     </form>

@endsection
@section('scripts')



        
  
@endsection

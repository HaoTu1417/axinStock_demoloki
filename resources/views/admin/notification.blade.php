@extends('layout.layout_admin')
@section('style')
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"-->
    <!--    integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="-->
    <!--    crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <style>
        .wordWrap{
            word-wrap: break-word;
            min-width: 100px;
            max-width: 350px;
        }
        .select2-container{
            z-index: 2000 !important;
        }
        .select2-selection__choice__display{
            color: #333 !important;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('main_content')

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Notification</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                                        <li class="breadcrumb-item active">Notification</li>
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
                                        <div class="col-sm-3">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" placeholder="Search for...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto ms-auto">
                                            <div class="hstack gap-2">

                                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#modal_create"><i class="ri-add-line align-bottom me-1"></i> Thêm thông báo mới</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-card">
                                            @if(count($data) > 0 )
                                            <table class="table align-middle" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                       
                                                        <th class="">#</th>
                                                        <th class="">Tiêu đề thông báo</th>
                                                        <th class="">Chi tiết thông báo</th>
                                                        <th class="" >Người nhận</th>
                                                        <th class="" >Loại thông báo</th>
                                                        <th class="" >Trạng thái</th>
                                                        <th class="" >Thời gian</th>
                                                       
                                                        <th class="" >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td >{{$value->title}}</td>
                                                        <td>
                                                            <div class="d-flex  flex-column">
                                                                <div class="flex-grow-1 ms-2 name">{{$value->description}}</div>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            @if($value->type == 1)
                                                            "Tất cả"
                                                            @else
                                                            {{$value->username}}<br>({{$value->email}})
                                                            @endif
                                                            </td>
                                                        <td class="date">
                                                            @if($value->type == 1 )
                                                                <span style="color:green">Tất cả</span>
                                                            @else
                                                             <span style="color:orange">Đơn lẻ</span>
                                                            @endif
                                                        </td>
                                                        <td class="date">
                                                            @if($value->status == 1 )
                                                                <span style="color:blue">Hiển thị</span>
                                                            @else
                                                             <span style="color:red">Ẩn</span>
                                                            @endif
                                                        </td>
                                                      
                                                       
                                                     
                                                        <td class="date">{{$value->created_at}}</td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                              
                                                               
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a class="edit-item-btn js-show-modal-update" data-id="{{$value->id}}" ><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                </li>
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                                    <a class="remove-item-btn js-remove-item" data-url="{{route('deleteCustomer',['id'=>$value->id])}}" data-bs-toggle="modal" href="#deleteRecordModal">
                                                                        <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            @else
                                            <div class="noresult" >
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ leads We did not find any leads for you search.</p>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div style="margin-top:15px"></div>
                                         @if(count($data) > 0 )
                                        {{ $data->links() }}
                                        @endif
                                    </div>

                                    <div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                               <form id="form-create-customer" class="tablelist-form" autocomplete="off">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="title-field" class="form-label">Tiêu đề thông báo</label>
                                                                    <input name="title" type="text" id="title-field" class="form-control" placeholder="Vui lòng điền tiêu đề thông báo" >
                                                                    <div class="invalid-feedback">Vui lòng điền tiêu đê thông báo</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="note-field" class="form-label">Nội dung thông báo</label>
                                                                    <textarea name="description" id="note-field" class="form-control" placeholder="Vui lòng điền nội dung thông báo" rows="4"></textarea>
                                                                    <div class="invalid-feedback">Vui lòng điền nội dung thông báo</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                               <div>
                                                                  <label for="description-field" class="form-label">Loại thông báo</label>
                                                                  <select name="notification_type" id="description-field" class="form-control">
                                                                     <option value="1">Tất cả</option>
                                                                     <option value="2">Đơn lẻ</option>
                                                                  </select>
                                                                  <div class="invalid-feedback">Vui lòng chọn loại thông báo</div>
                                                               </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-12" style="display:none" id='customers-field'>
                                                                <div>
                                                                    <label for="notification-status-field" class="form-label">Người nhận thông báo</label>
                                                                    <select name="customers[]" multiple="" class="form-control select2" id="customers_data">
                                                                        @foreach($customers as $item)
                                                                            <option value="{{$item->id}}">{{$item->email}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">Vui lòng chọn trạng thái thông báo</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-success" id="add-btn">Thêm </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal-->
                                    
                                    <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                             <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                             </div>
                                             <div class="modal-body">
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
                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                    <!--end row-->

@endsection
@section('scripts')




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        
        $(document).ready(function() {
           $('#customers_data').select2({
                placeholder: "Choose customer",
                allowClear: true
            });
        });
        $(document).on('change','#description-field',function(){
            let $this = $(this);
            let $type = $this.val();
            if($type == 2){
                $('#customers-field').show();
            }else{
                 $('#customers-field').hide();
            }

        })
    
          $('#add-btn').click(function(e){
              e.preventDefault()
                $.ajax({
                    url: '/manager/createNoti',
                    type:'post',
                    data:{
                        title: $('#title-field').val(),
                        note: $('#note-field').val(),
                        type: $('#description-field').val(),
                        customer: $('#customers_data').val(),
                        _token: $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status){
                            $('#modal_create').modal('hide');
                        }
                        else{
                            alert(res.message);
                        }
                    }
                })
            }); 
    </script>
@endsection

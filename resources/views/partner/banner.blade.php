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
                                          
                                        </div>
                                        <div class="col-sm-auto ms-auto">
                                            <div class="hstack gap-2">

                                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#modal_create"><i class="ri-add-line align-bottom me-1"></i> Thêm Ảnh</button>
                                                
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
                                                        <th class="">Ảnh</th>
                                                        <th class="" >Loại</th>
                                                        <!--<th class="" >Thông tin Bank</th>-->
                                                        <th class="" >Trạng thái</th>
                                                        <th class="" >Thời gian</th>
                                                        <th class="" >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td >{{$value->id}}</td>
                                                        <td>
                                                            <img src="{{asset($value->image)}}" style="background-color:black;width:400px;max-height:200px;object-fit:contain">
                                                        </td>
                                                        <td >
                                                            @if($value->type == 1)
                                                                <span style="color:green">Banner</span>
                                                            @elseif($value->type==2)
                                                                <span style="color:orange">Logo</span>
                                                            @else
                                                                <span style="color:blue">Icon</span>
                                                            @endif
                                                        </td>
                                                         <td >
                                                            @if($value->status == 1)
                                                                <span style="color:green">Hiện</span>
                                                            @else
                                                                <span style="color:red">Ẩn</span>
                                                            @endif
                                                        </td>
                                                       
                                                     
                                                        <td class="date">{{$value->updated_at}}</td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                              
                                                               
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a class="edit-item-btn js-show-modal-update" data-id="{{$value->id}}" ><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                </li>
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                                    <a class="remove-item-btn js-remove-item" data-url="{{route('deleteImage',['id'=>$value->id])}}" data-bs-toggle="modal" href="#deleteRecordModal">
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
                                        <div class="modal-dialog modal-dialog-centered" style="max-width:900px">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                                 <form id="form-create-customer" class="tablelist-form" autocomplete="off" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="image-field" class="form-label">Ảnh</label>
                                                                    <input name="image" type="file" id="image-field" class="form-control" accept="image/*" >
                                                                    <div class="invalid-feedback">Vui lòng upload ảnh</div>
                                                                </div>
                                                                 <div class="mt-3">
                                                                    <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 400px; height: auto;">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="type-field" class="form-label">Type</label>
                                                                    <select name="type" id="type-field" class="form-control">
                                                                        <option value="1">Banner</option>
                                                                        <option value="2">Logo</option>
                                                                        <option value="3">Icon</option>

                                                                    </select>
                                                                    <div class="invalid-feedback">Vui lòng chọn loại</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="status-field" class="form-label">Status</label>
                                                                    <select name="status" id="status-field" class="form-control">
                                                                        <option value="1">Hiện</option>
                                                                        <option value="0">Ẩn</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">Vui lòng chọn trạng thái</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Thêm</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal-->
                                    
                                    <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width:70%">
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
                                                        <p class="text-muted fs-14 mb-4 pt-1">Xóa hoàn toàn hình ảnh.</p>
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

@endsection
@section('scripts')



    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
    document.getElementById('image-field').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.getElementById('image-preview');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
        
    <script>
    $(document).on('change', '#form-update-image #image-field', function(e) {
    // Lấy đối tượng file được chọn
    var file = e.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Cập nhật hình ảnh xem trước
            $('#form-update-image #image-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
});
        $(document).ready(function() {
            $('.js-search').click(function(){
                let txt = $('#txtsearch').val();
                document.location.href="/manager/customer?s=" + txt;
            })
           $(document).on('click', '.js-remove-item', function(){
                    let $url = $(this).data('url');
                    console.log( $(document).find('.js-delete-record'));
                    $(document).find('#js-delete-record').attr('href', $url);
                });
            $('.edit-item-btn').click(function() {
                var userId = $(this).data('id');
        
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getImageinfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#modal_update .modal-body').empty();

                        // Insert the new content into the modal
                        $('#modal_update .modal-body').html(res);
        
                        // Show the modal
                        $('#modal_update').modal('show');
                       
                      
                    },
                  
                });
            });
            
            $(document).on('submit', '#form-update-image', function(e) {
                e.preventDefault(); // Prevent the default form submission
            
                var formData = new FormData(this); // Create a FormData object from the form
            
                $.ajax({
                    url: '/manager/updateImage', // Replace with your actual URL to update customer data
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tell jQuery not to set content type
                    processData: false, // Tell jQuery not to process the data
                    success: function(response) {
                        if (response.status) {
                            alert('Image updated successfully!');
                            $('#modal_update').modal('hide');
                            location.reload(); // Reload the page to reflect the changes
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ', error);
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            
           $(document).ready(function() {
            $('#form-create-customer').on('submit', function(e) {
                e.preventDefault();
            
                let isValid = true;
            
                // Kiểm tra các trường input và hiển thị thông báo lỗi nếu cần thiết
                $('#form-create-customer input, #form-create-customer select').each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });
            
                if (isValid) {
                    let formData = new FormData(this);  // Sử dụng FormData để bao gồm cả file upload
            
                    $.ajax({
                        url: '/manager/addImage',
                        type: 'POST',
                        data: formData,
                        contentType: false,  // Không đặt content type vì nó sẽ được thiết lập tự động
                        processData: false,  // Không xử lý dữ liệu vì FormData sẽ xử lý
                        success: function(res) {
                            if(res.status){
                                alert(res.message);
                                location.reload();  // Sử dụng location.reload() thay vì document.reload()
                            } else {
                                alert(res.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Có lỗi xảy ra, vui lòng thử lại');
                        }
                    });
                } else {
                    alert('Vui lòng điền đủ thông tin');
                }
            });
        });

        })
    </script>
@endsection

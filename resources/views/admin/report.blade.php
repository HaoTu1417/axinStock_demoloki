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
@php
    $role_group = auth()->guard('admins')->user()->role_group;
    $config = json_decode(DB::table('role')->where('id',$role_group)->first()->config,true);
@endphp

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Report</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                                        <li class="breadcrumb-item active">Report</li>
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
                                                        <th class="" >@lang(118)</th>
                                                        <!--<th class="">UID</th>-->
                                                        <th class="">@lang(119)</th>
                                                        <th class="" >@lang(120)</th>
                                                        <th class="" >@lang(121)</th>
                                                        <th class="" >@lang(33)</th>
                                                        <th class="" >@lang(124)</th>
                                                                                                                        @if($config['report']['update'] == 1)

                                                        <th class="" >@lang(187)</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$value->created_at}}</td>
                                                        <!--<td>-->
                                                        <!--    <div class="d-flex  flex-column">-->
                                                        <!--        <div class="flex-grow-1 ms-2 name"><strong>{{$value->customer_id}}</strong></div>-->
                                                        <!--    </div>-->
                                                        <!--</td>-->
                                                        <td >
                                                             <div class="d-flex  flex-column">
                                                                <div class="flex-grow-1 ms-2 name"><strong>{{$value->title}}</strong></div>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                             <div class="d-flex  flex-column">
                                                                       {{$value->description}}                                                 
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <a href="{{asset('assets/images/report/'.$value->img)}}" data-lightbox="image-gallery" data-title="Khiếu nại">
                                                                <img class="js-image-show" src="{{asset('assets/images/report/'.$value->img)}}" style="width:200px;height:150px; object-fit:cover;">                                            
                                                            </a>
                                                        </td>
                                                        <td>
                                                             <div class="d-flex  flex-column">
                                                              
                                                                @if($value->status == 0)
                                                                    <span style="color:blue">@lang(123)</span>
                                                                @elseif($value->status == 1)
                                                                          <span style="color:green">@lang(122)</span>
                                                                   
                                                                @endif
                                                            </div>
                                                        </td>
                                                     
                                                        <td class="date">{{$value->note}}</td>
                                                                @if($config['report']['update'] == 1)
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                              
                                                                @if($value->status == 0)
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a class="edit-item-btn js-show-modal-update" data-id="{{$value->id}}" ><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </td>
                                                                @endif
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
                                    <!--<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">-->
                                    <!--    <div class="modal-dialog modal-dialog-centered">-->
                                    <!--        <div class="modal-content">-->
                                    <!--            <div class="modal-header">-->
                                    <!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>-->
                                    <!--            </div>-->
                                    <!--            <div class="modal-body p-5 text-center">-->
                                    <!--                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>-->
                                    <!--                <div class="mt-4 text-center">-->
                                    <!--                    <h4 class="fs-semibold">Bạn có chắc chắn muốn xóa không ?</h4>-->
                                    <!--                    <p class="text-muted fs-14 mb-4 pt-1">Xóa toàn bộ thông tin về khách hàng.</p>-->
                                    <!--                    <div class="hstack gap-2 justify-content-center remove">-->

                                    <!--                        <button class="btn btn-link link-success fw-medium text-decoration-none material-shadow-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>-->
                                    <!--                        <a class="btn btn-danger" href="" id="js-delete-record">Yes, Delete It!!</a>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
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
        $(document).ready(function() {
           $(document).on('click', '.js-remove-item', function(){
                    let $url = $(this).data('url');
                    console.log( $(document).find('.js-delete-record'));
                    $(document).find('#js-delete-record').attr('href', $url);
                });
            $('.edit-item-btn').click(function() {
                var userId = $(this).data('id');
        
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getReportinfo',
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
            
            $(document).on('submit', '#form-update-customer', function(e) {
                e.preventDefault(); // Prevent the default form submission
        
                var formData = $(this).serialize(); // Serialize the form data
        
                $.ajax({
                    url: '/manager/updateReport', // Replace with your actual URL to update customer data
                    type: 'POST',
                    data: formData,
                    success: function(res) {
                            if(res.status){
                                alert(res.message);
                                $('#modal_update').modal('hide');
                                document.location.reload();
                            
                            }else{
                                alert(res.message);
                            }

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
            
           $(document).ready(function() {
 
});

        })
    </script>
@endsection

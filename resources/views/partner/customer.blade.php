@extends('layout.layout_panner')
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
                                            <div class="search-box" style="width:300px">
                                                <input  id="txtsearch" value="" type="text" class="form-control search" placeholder="Tìm kiếm">
                                                <!--<i class="ri-search-line search-icon"></i>-->
                                            </div>
                                            <!--<button class="btn btn-primary js-search"><i class="ri-search-line search-icon"></i></button>-->
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="js-append">
                                        @include('partner.include.customer_table')
                                    </div>

                                    <!--end modal-->
                                    
                                    <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width:800px">
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
           $('#txtsearch').keyup(function(event) {
                
                    let txt = $(this).val();
                     $.ajax({// Replace with your actual URL to fetch user data
                    url: 'customerTable',
                    type: 'GET',
                    data: { s: txt },
                    success: function(res) {


                        // Insert the new content into the modal
                        $('.js-append').html(res);
        

                      
                    },
                  
                });
                
            });
            
             $(document).on('submit', '#form-update-customer', function(e) {
                e.preventDefault(); // Prevent the default form submission
        
                var formData = $(this).serialize(); // Serialize the form data
        
                $.ajax({
                    url: '/partner/updateCustomer', // Replace with your actual URL to update customer data
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
         
            $(document).on('click','.edit-item-btn',function() {
                var userId = $(this).data('id');
        
                $.ajax({// Replace with your actual URL to fetch user data
                    url: 'getUserinfo',
                    type: 'GET',
                    data: { id: userId },
                    success: function(res) {

                        $('#modal_update .modal-body').empty();

                        // Insert the new content into the modal
                        $('#modal_update .modal-body').html(res);
        
                        // Show the modal
                        $('#modal_update').modal('show');
                        // $('#update-btn').prop('disabled', true);
                      
                    },
                  
                });
            });
            
          
        });
    </script>


@endsection

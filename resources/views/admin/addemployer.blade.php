
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
                                <h4 class="mb-sm-0">@lang('211')</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                                        <li class="breadcrumb-item active">@lang('211')</li>
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

                    <div class="row">
                      
                       
<form action="{{route('addemployer')}}" method="post" class="row g-3" style="display:flex;flex-direction:column">
    @csrf
    <div class="col-md-4">
        <label for="fullnameInput" class="form-label">@lang(211)</label>
        <input name="username"  required="true" type="text" class="form-control" id="fullnameInput" placeholder="Enter your name">
    </div>
    <div class="col-md-4">
        <label for="inputPassword4" class="form-label">@lang(258)</label>
        <input name="password"  required="true" type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
    <div class="col-md-4">
        <label for="repassword" class="form-label">@lang(258)</label>
        <input required="true" name="repassword"   type="password" class="form-control" id="repassword" placeholder="Password">
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">@lang('208')/label>
        <select name="role" required="true" id="inputState" class="form-select">
            <option selected>Choose...</option>
            @foreach($role as $item)
                            <option value="{{$item->id}}" >{{$item->name}}</option>

            @endforeach
        </select>
    </div>
    <div class="col-4">
        <div class="text-end">
            <button type="submit" class="btn btn-primary">@lang('212')</button>
        </div>
    </div>
</form>
                    </div>
                    <!--end row-->

@endsection
@section('scripts')



        
  
@endsection


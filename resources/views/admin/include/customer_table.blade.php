@php
    $role_group = auth()->guard('admins')->user()->role_group;
    $config = json_decode(DB::table('role')->where('id',$role_group)->first()->config,true);
@endphp
<div class="table-responsive table-card ">
                                            @if(count($data) > 0 )
                                            <table class="table align-middle" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                       
                                                        <th class="">Username</th>
                                                        <th class="" >@lang(21)</th>
                                                        <th class="">@lang(71)</th>
                                                        <th class="" >@lang(78)</th>
                                                        <!--<th class="" >Thông tin Bank</th>-->
                                                        <th class="" >@lang(179)</th>
                                                        <th class="" >@lang(25)</th>
                                                        <th class="" >@lang(26)</th>
                                                        @if($config['customer']['update'] == 1 || $config['customer']['delete'] == 1)

                                                        <th class="" >@lang(187)</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td >{{$value->username}}</td>
                                                        <td >
                                                            @if($value->role == 0)
                                                                @lang(28)
                                                            @else
                                                                @lang(79)
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex  flex-column">
                                                                <div class="flex-grow-1 ms-2 name">ID: <strong>{{$value->id}}</strong></div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(29): <strong>{{$value->phone}}</strong></div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(30):  <strong>{{$value->email}}</strong></div>
                                                            </div>
                                                        </td>
                                                        <td ><strong>{{$value->level}}</strong></td>
                                                        <!--<td >-->
                                                        <!--     <div class="d-flex  flex-column">-->
                                                        <!--        <div class="flex-grow-1 ms-2 name">BankName: <strong>{{$value->bank_name}}</strong></div>-->
                                                        <!--        <div class="flex-grow-1 ms-2 name">BankAccount:  <strong>{{$value->bank_account}}</strong></div>-->
                                                        <!--        <div class="flex-grow-1 ms-2 name">BankNumber:  <strong>{{$value->bank_number}}</strong></div>-->
                                                        <!--    </div>-->
                                                        <!--</td>-->
                                                        <td class="">
                                                             <div class="d-flex  flex-column">
                                                                <div class="flex-grow-1 ms-2 name">
                                                                    Tổng giá trị tài sản: <span style="color:red"><strong>{{ number_format($value->totalValue, 0, ',', '.') }}</strong> VND</span> 
                                                                </div>   
                                                                <div class="flex-grow-1 ms-2 name">
                                                                    @lang(31): <strong>{{ number_format($value->money, 0, ',', '.') }}</strong> VND
                                                                </div>   
                                                                <div class="flex-grow-1 ms-2 name">Phí quản lý: <span style="color:blue"><strong>{{ number_format($value->fee_manager, 0, ',', '.') }}</strong> VND</span>
                                                                </div> 

                                                                <div class="flex-grow-1 ms-2 name">Tổng giá trị CP: <span style="color:#9370db"><strong>{{ number_format($value->totalCp, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(32): <span style="color:orange"><strong>{{ number_format($value->dongbang, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(291): <span style="color:red"><strong>{{ number_format($value->tongvay, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(292): <span style="color:green"><strong>{{ number_format($value->money - $value->tongvay + $value->dongbang > 0 ? $value->money - $value->tongvay : 0 , 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(291): <span style="color:red"><strong>{{ number_format($value->tongvay, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(301): <span style="color:violet"><strong>{{ number_format($value->recharge, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(302): <span style="color:orange"><strong>{{ number_format($value->withdraw, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2 name">@lang(303): <span style="color:black"><strong>{{ number_format($value->revenus, 0, ',', '.') }}</strong> VND</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                             <div class="d-flex  flex-column">
                                                                @php
                                                                    $type = Lang::get(38);
                                                                    if($value->kyc_type == 2){
                                                                        $type = Lang::get(39);
                                                                    }
                                                                    if($value->kyc_type == 3){
                                                                        $type = Lang::get(40);
                                                                    }
                                                                @endphp
                                                                @if($value->kyc_status == 0)
                                                                    <div class="flex-grow-1 ms-2 name">@lang(33): <span style="color:blue">@lang(34)</span></div>
                                                                @elseif($value->kyc_status == 1)
                                                                    <div class="flex-grow-1 ms-2 name">@lang(33): <span style="color:orange">@lang(36)</span></div>
                                                                    <div class="flex-grow-1 ms-2 name">@lang(36): <strong>{{$type}}</strong></div>
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt trước</a>-->
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt sau</a>-->
                                                                @elseif($value->kyc_status == 2)
                                                                    <div class="flex-grow-1 ms-2 name">@lang(33): <span style="color:green">@lang(35)</span></div>
                                                                    <div class="flex-grow-1 ms-2 name">@lang(35): <strong>{{$type}}</strong></div>
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt trước</a>-->
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt sau</a>-->

                                                                    
                                                                @endif
                                                            </div>
                                                        </td>
                                                     
                                                        <td class="date">{{$value->last_login}}</td>
                                                        <td style="">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown " type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end " style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 30px);" data-popper-placement="bottom-end">
                                                                    @if($config['customer']['login'] == 1)
                                                                    <li><a href="#!" data-id="{{$value->id}}" class="dropdown-item login-item-btn "><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    @lang(43)</a></li>
                                                                    @endif
                                                                    @if($config['customer']['update'] == 1)
                                                                    <li><a data-id="{{$value->id}}" class="dropdown-item edit-item-btn  js-show-modal-update"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> @lang(44)</a>
                                                                    </li>
                                                                    @endif
                                                                    @if($config['customer']['delete'] == 1)
                                                                    <li>
                                                                        <a class="dropdown-item remove-item-btn remove-item-btn js-remove-item" data-url="{{route('deleteCustomer',['id'=>$value->id])}}" data-bs-toggle="modal" href="#deleteRecordModal">
                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> @lang(45)
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                    
                                                                    
                                                                </ul>
                                                            </div>
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
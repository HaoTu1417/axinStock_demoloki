<div class="table-responsive table-card ">
                                            @if(count($data) > 0 )
                                            <table class="table align-middle" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                       
                                                        <th class="">Username</th>
                                                        <th class="" >Loại người dùng</th>
                                                        <th class="">Thông tin liên hệ</th>
                                                        <th class="" >Level lãi xuất</th>
                                                        <th class="" >Tỉ lệ phí</th>
                                                        <!--<th class="" >Thông tin Bank</th>-->
                                                        <th class="" >Số dư ví</th>
                                                        <th class="" >Trạng thái Kyc</th>
                                                        <th class="" >Đăng nhập lần cuối</th>
                                                        <th class="" >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td >{{$value->username}}</td>
                                                        <td >
                                                            @if($value->role == 0)
                                                                Người chơi
                                                            @else
                                                                Đại lý
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex  flex-column">
                                                                <div class="flex-grow-1 ms-2 name">Phone: <strong>{{$value->phone}}</strong></div>
                                                                <div class="flex-grow-1 ms-2 name">Email:  <strong>{{$value->email}}</strong></div>
                                                            </div>
                                                        </td>
                                                        <td ><strong>{{$value->level}}</strong></td>
                                                        <td ><strong>{{$value->fee}}</strong></td>

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
                                                                    Số dư: <strong>{{ number_format($value->money, 0, ',', '.') }}</strong> VND
                                                                </div>                                                            
                                                            </div>
                                                        </td>
                                                        <td>
                                                             <div class="d-flex  flex-column">
                                                                @php
                                                                    $type = "Căn cước";
                                                                    if($value->kyc_type == 2){
                                                                        $type = "Bằng lái xe";
                                                                    }
                                                                    if($value->kyc_type == 3){
                                                                        $type = "Hộ chiếu";
                                                                    }
                                                                @endphp
                                                                @if($value->kyc_status == 0)
                                                                    <div class="flex-grow-1 ms-2 name">Trạng thái: <span style="color:blue">Chưa xác minh</span></div>
                                                                @elseif($value->kyc_status == 1)
                                                                    <div class="flex-grow-1 ms-2 name">Trạng thái: <span style="color:orange">Chờ duyệt</span></div>
                                                                    <div class="flex-grow-1 ms-2 name">Loại: <strong>{{$type}}</strong></div>
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt trước</a>-->
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt sau</a>-->
                                                                @elseif($value->kyc_status == 2)
                                                                    <div class="flex-grow-1 ms-2 name">Trạng thái: <span style="color:green">Đã xác minh</span></div>
                                                                    <div class="flex-grow-1 ms-2 name">Loại: <strong>{{$type}}</strong></div>
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt trước</a>-->
                                                                    <!--<a target="_blank" style="margin-left:8px" class="flex-grow-1 ms-2 name" href="">Ảnh mặt sau</a>-->

                                                                    
                                                                @endif
                                                            </div>
                                                        </td>
                                                     
                                                        <td class="date">{{$value->last_login}}</td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                              
                                                               
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a class="edit-item-btn js-show-modal-update" data-id="{{$value->id}}" ><i class="ri-pencil-fill align-bottom text-muted"></i></a>
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
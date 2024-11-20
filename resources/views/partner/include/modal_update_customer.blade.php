
            <form id="form-update-customer" class="tablelist-form" autocomplete="off">
               @csrf
               <input type="hidden" name="id" value="{{$data->id}}">
               <div class="row g-3">
                  <div class="col-12 " style="font-weight:bold;font-size:20px">Thông tin cá nhân</div>
                  <div class="col-lg-4">
                     <div>
                        <label for="username-field" class="form-label">Username</label>
                        <input disabled="true" name="" readonly="true" type="text" id="username-field" class="form-control" value="{{$data->username}}" placeholder="Vui lòng điền username" >
                        <div class="invalid-feedback">Vui lòng điền username</div>
                     </div>
                  </div>
               
                  <div class="col-lg-4">
                     <div>
                        <label for="email-field" class="form-label">Email</label>
                        <input disabled="true" readonly="true" name="email" type="text" id="email-field" class="form-control" value="{{$data->email}}" placeholder="Vui lòng điền email" >
                        <div class="invalid-feedback">Vui lòng điền email</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="phone-field" class="form-label">Phone</label>
                        <input disabled="true" readonly="true" name="phone" type="text" id="phone-field" class="form-control" value="{{$data->phone}}" placeholder="Vui lòng điền sdt" >
                        <div class="invalid-feedback">Vui lòng điền sdt</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="password-field" class="form-label">Password</label>
                        <input disabled="true" readonly="true" type="password" name="password" type="text" id="password-field" value="" class="form-control" placeholder="Điền password" >
                        <div class="invalid-feedback">Vui lòng điền password</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="password2-field" class="form-label">Mật khẩu rút tiền</label>
                        <input disabled="true" readonly="true" type="password" name="password2" type="text" id="password2-field" value="" class="form-control" placeholder="Điền mật khẩu rút tiền" >
                        <div class="invalid-feedback">Vui lòng điền password2</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="money-field" class="form-label">Money</label>
                        <input disabled="true" readonly="true"  name="money" type="number" id="money-field"  value="{{$data->money}}" class="form-control" placeholder="Số dư ví" >
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="bank_name-field" class="form-label">Bank Name</label>
                        <input disabled="true" readonly="true"  name="bank_name" type="text" id="bank_name-field" value="{{$data->bank_name}}" class="form-control" placeholder="Tên ngân hàng" >
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="bank_account-field" class="form-label">Bank Account</label>
                        <input disabled="true"  readonly="true" name="bank_account" type="text" id="bank_account-field" value="{{$data->bank_account}}" class="form-control" placeholder="Tên tài khoản ngân hàng" >
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="bank_number-field" class="form-label">Bank Number</label>
                        <input disabled="true" readonly="true"  name="bank_number" type="text" id="bank_number-field" value="{{$data->bank_number}}" class="form-control" placeholder="Số tài khoản ngân hàng" >
                     </div>
                  </div>
                  <div class="col-12 mt-5" style="font-weight:bold;font-size:20px">Thông tin cấu hình</div>
                     <div class="col-lg-4">
                       <div>
                          <label for="level-field" class="form-label">Level lãi xuất</label>
                          <select disabled="true" readonly="true" name="level" class="form-control" id="level-field">
                             @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" @if($data->level == $i) selected @endif>
                                   Level {{ $i }}
                                </option>
                             @endfor
                          </select>
                       </div>
                    </div>
                     <div class="col-lg-4">
                       <div>
                          <label for="role-field" class="form-label">Loại khách hàng</label>
                          <select disabled="true" readonly="true" name="role" class="form-control" id="role-field">
                                <option value="1" @if($data->role == 0) selected @endif>
                                    Khách chơi
                                </option>
                                <option value="2" @if($data->role == 1) selected @endif>
                                    Đại lý
                                </option>
                          </select>
                        </div>
                      </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="status-field" class="form-label">Trạng thái tài khoản</label>
                        <select disabled="true" readonly="true" name="status" class="form-control" id="status-field">
                        <option value="1" @if($data->status == 1) selected @endif>
                        Hoạt động
                        </option>
                        <option value="2" @if($data->status == 2) selected @endif>
                        Bị chặn
                        </option>
                        </select>
                     </div>
                  </div>
                
                  <div class="col-lg-4">
                     <div>
                        <label for="kyc_status-field" class="form-label">Trạng thái Kyc</label>
                        <select disabled="true" readonly="true" name="kyc_status" class="form-control" id="kyc_status-field">
                        <option value="0"  @if($data->kyc_status == 0) selected @endif>
                        Chưa xác thực
                        </option>
                        <option value="1" @if($data->kyc_status == 1) selected @endif>
                        Đang chờ duyệt
                        </option>
                        <option value="2" @if($data->kyc_status == 2) selected @endif>
                        Đã xác thực
                        </option>
                        </select>
                     </div>
                  </div>
                   <div class="col-lg-4">
                     <div>
                        <label for="fee-" class="form-label">Tỉ lệ phí</label>
                        <input  type="number" name="fee" id="fee-" value="{{$data->fee}}" class="form-control" placeholder="phí" >
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div>
                        <label for="kyc-info" class="form-label">Thông tin KYC</label>
                        <div id="kyc-info">
                           Loại giấy tờ: 
                           @if($data->kyc_type == 1) <strong>Căn cước</strong>  @endif
                           @if($data->kyc_type == 2) <strong>Bằng lái xe</strong>  @endif
                           @if($data->kyc_type == 3) <strong>Hộ chiếu</strong>  @endif
                           <br>
                           ID: <strong>{{$data->kyc_id}}</strong>
                           <div class="col-lg-12" style="display:flex;justify-content: space-betwwen;
                              width: 100%;" >
                              <a  href="{{asset('assets/images/kyc/'.$data->kyc_img_front)}}" data-lightbox="image-gallery" data-title="Mặt trước" style="width:49%;margin-right:20px;dislay:flex;200px;border:1px solid #ccc;border-radius:8px">
                                 <img class="js-image-show" src="{{asset('assets/images/kyc/'.$data->kyc_img_front)}}" style="width:100%;height:180px;object-fit:contain">
                              </a>
                               <a href="{{asset('assets/images/kyc/'.$data->kyc_img_back)}}" data-lightbox="image-gallery" data-title="Mặt sau" style="width:49%;dislay:flex;200px;border:1px solid #ccc;border-radius:8px">
                                 <img class="js-image-show" src="{{asset('assets/images/kyc/'.$data->kyc_img_back)}}" style="width:100%;height:180px;object-fit:contain">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                 <div class="modal-footer" style="padding:0 !important; margin-top:20px">
                     <div class="hstack gap-2 justify-content-end">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-success" id="update-btn">Cập nhật </button>
                     </div>
                 </form>
            </div>

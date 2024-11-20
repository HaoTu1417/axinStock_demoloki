
            <form id="form-update-customer" class="tablelist-form" autocomplete="off">
               @csrf
               <input type="hidden" name="id" value="{{$data->id}}">
               <div class="row g-3">
                  <div class="col-12 " style="font-weight:bold;font-size:20px">Thông tin IP</div>
                   <div class="col-lg-4">
                     <div>
                        <label for="username-field" class="form-label">Đăng nhập lần cuối</label>
                        <input name="" readonly="true" type="text" id="username-field" class="form-control" value="{{$data->last_login->created_at}}" placeholder="Vui lòng điền username" >
                     </div>
                  </div>
                   <div class="col-lg-4">
                     <div>
                        <label for="username-field" class="form-label">Địa chỉ IP</label>
                        <input name="" readonly="true" type="text" id="username-field" class="form-control" value="{{$data->last_login->ip}}" placeholder="Vui lòng điền username" >
                     </div>
                  </div>
                 <div class="col-lg-4">
    <div>
        <label for="username-field" class="form-label">Thông tin Agent</label>
        <textarea name="" readonly id="username-field" class="form-control" rows="3">{{$data->last_login->use_agent}}</textarea>
    </div>
</div>
                
               
                  <div class="col-12 " style="font-weight:bold;font-size:20px">@lang(71)</div>
                  <div class="col-lg-4">
                     <div>
                        <label for="username-field" class="form-label">Username</label>
                        <input name="" readonly="true" type="text" id="username-field" class="form-control" value="{{$data->username}}" placeholder="Vui lòng điền username" >
                        <div class="invalid-feedback">Vui lòng điền username</div>
                     </div>
                  </div>
               
                  <div class="col-lg-4">
                     <div>
                        <label for="email-field" class="form-label">@lang(30)</label>
                        <input readonly="true" name="email" type="text" id="email-field" class="form-control" value="{{$data->email}}" placeholder="Vui lòng điền email" >
                        <div class="invalid-feedback">Vui lòng điền email</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="phone-field" class="form-label">@lang(29)</label>
                        <input name="phone" type="text" id="phone-field" class="form-control" value="{{$data->phone}}" placeholder="Vui lòng điền sdt" >
                        <div class="invalid-feedback">Vui lòng điền sdt</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="password-field" class="form-label">@lang(72)</label>
                        <input type="password" name="password" type="text" id="password-field" value="" class="form-control" placeholder="@lang(72)" >
                        <div class="invalid-feedback">Vui lòng điền password</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="password2-field" class="form-label">@lang(73)</label>
                        <input type="password" name="password2" type="text" id="password2-field" value="" class="form-control" placeholder="@lang(73)" >
                        <div class="invalid-feedback">Vui lòng điền password2</div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="money-field" class="form-label">@lang(89)</label>
                        <input  name="money" type="number" id="money-field"  value="{{$data->money}}" class="form-control" placeholder="Số dư ví" >
                     </div>
                  </div>
                  <!--<div class="col-lg-4">-->
                  <!--   <div>-->
                  <!--      <label for="bank_name-field" class="form-label">@lang(74)</label>-->
                  <!--      <input  name="bank_name" type="text" id="bank_name-field" value="{{$data->bank_name}}" class="form-control" placeholder="Tên ngân hàng" >-->
                  <!--   </div>-->
                  <!--</div>-->
                  <!--<div class="col-lg-4">-->
                  <!--   <div>-->
                  <!--      <label for="bank_account-field" class="form-label">@lang(75)</label>-->
                  <!--      <input  name="bank_account" type="text" id="bank_account-field" value="{{$data->bank_account}}" class="form-control" placeholder="Tên tài khoản ngân hàng" >-->
                  <!--   </div>-->
                  <!--</div>-->
                  <!--<div class="col-lg-4">-->
                  <!--   <div>-->
                  <!--      <label for="bank_number-field" class="form-label">@lang(76)</label>-->
                  <!--      <input  name="bank_number" type="text" id="bank_number-field" value="{{$data->bank_number}}" class="form-control" placeholder="Số tài khoản ngân hàng" >-->
                  <!--   </div>-->
                  <!--</div>-->
                  <div class="col-12 mt-5" style="font-weight:bold;font-size:20px">@lang(77)</div>
                     <div class="col-lg-4">
                       <div>
                          <label for="level-field" class="form-label">@lang(78)</label>
                          <select name="level" class="form-control" id="level-field">
                             @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" @if($data->level == $i) selected @endif>
                                   @lang(78) {{ $i }}
                                </option>
                             @endfor
                          </select>
                       </div>
                    </div>
                     <div class="col-lg-4">
                       <div>
                          <label for="role-field" class="form-label">@lang(21)</label>
                          <select name="role" class="form-control" id="role-field">
                                <option value="0" @if($data->role == 0) selected @endif>
                                    @lang(88)
                                </option>
                                <option value="1" @if($data->role == 1) selected @endif>
                                    @lang(79)
                                </option>
                          </select>
                        </div>
                      </div>
                  <div class="col-lg-4">
                     <div>
                        <label for="status-field" class="form-label">@lang(80)</label>
                        <select name="status" class="form-control" id="status-field">
                        <option value="1" @if($data->status == 1) selected @endif>
                        @lang(81)
                        </option>
                        <option value="2" @if($data->status == 2) selected @endif>
                        @lang(82)
                        </option>
                        </select>
                     </div>
                  </div>
                
                  <div class="col-lg-4">
                     <div>
                        <label for="kyc_status-field" class="form-label">@lang(25)</label>
                        <select name="kyc_status" class="form-control" id="kyc_status-field">
                        <option value="0"  @if($data->kyc_status == 0) selected @endif>
                        @lang(34)
                        </option>
                        <option value="1" @if($data->kyc_status == 1) selected @endif>
                        @lang(36)
                        </option>
                        <option value="2" @if($data->kyc_status == 2) selected @endif>
                        @lang(35)
                        </option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div>
                        <label for="kyc-info" class="form-label">@lang(83)</label>
                        <div id="kyc-info">
                           @lang(37): 
                           @if($data->kyc_type == 1) <strong>@lang(38)</strong>  @endif
                           @if($data->kyc_type == 2) <strong>@lang(39)</strong>  @endif
                           @if($data->kyc_type == 3) <strong>@lang(40)</strong>  @endif
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
                         <button type="submit" class="btn btn-success" id="update-btn">@lang(126) </button>
                     </div>
                 </form>
            </div>

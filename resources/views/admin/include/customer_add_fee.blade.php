
            <form @if($type==1) id="form-add-fee2" @else id="form-add-fee" @endif class="tablelist-form" autocomplete="off">
               @csrf
               <input type="hidden" name="id" value="{{$data->id}}">
               <div class="row g-3" style="display:flex;justify-content:center;align-items:center;flex-direction:column">

                  <div class="col-lg-4">
                     <div>
                        <label for="fee-manager-now-field" class="form-label">@if($type ==1) Số dư @else Phí quản lý @endif hiện tại</label>
                        <input name="" id="fee-manager-now-field" readonly="true" type="text" class="form-control"    value="{{ $type == 0 ? $data->fee_manager : $data->money }}"  >
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div>
                        <label for="fee-manager-status-field" class="form-label">@lang(80)</label>
                        <select name="status" class="form-control" id="fee-manager-status-field">
                            <option value="1" >
                            Cộng tiền
                            </option>
                            <option value="2" >
                            Trừ tiền
                            </option>
                        </select>
                     </div>
                  </div>
               
                    <input type="hidden" id="type_process_transfer" name="type" value="{{$type}}">
                  <div class="col-lg-4">
                     <div>
                        <label for="fee-manager-money-field" class="form-label">Số tiền @if($type == 1)  dư @else phí quản lý @endif</label>
                        <input  name="money" type="number" id="fee-manager-money-field"  value="0" class="form-control" placeholder="Số tiền phí quản lý" >
                     </div>
                  </div>
                  
                   <div class="col-lg-4">
                     <div>
                        <label for="fee-manager-note-field" class="form-label">Ghi chú</label>
                        <input  name="note" type="text" id="fee-manager-note-field"  value="" class="form-control" placeholder="Ghi chú" >
                     </div>
                  </div>
                  @if($type ==0)
                   <div class="col-lg-4">
                     <div>
                        <label for="fee-manager-after-field" class="form-label">@if($type ==1) Số dư @else Phí quản lý @endif sau cập nhật</label>
                        <input name="" id="fee-manager-after-field" readonly="true" type="text" class="form-control"     value="{{ $type == 0 ? $data->fee_manager : $data->money }}"  >
                     </div>
                  </div>
                    @endif
               </div>
                 <div class="modal-footer" style="padding:0 !important; margin-top:20px">
                     <div class="hstack gap-2 justify-content-end">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                         @if($type==1)  <button type="button" class="btn btn-success" id="form-add-fee-btn2">@lang(126) </button> @else  <button type="button" class="btn btn-success" id="form-add-fee-btn1">@lang(126) </button> @endif
                        
                     </div>
                 </form>

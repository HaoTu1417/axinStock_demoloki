
            <form id="form-update-bank" class="tablelist-form" autocomplete="off">
                   @if($data->count() > 0)
                  <div class="col-12 mb-3" style="font-weight:bold;font-size:20px">@lang(281)</div>
               <div class="g-3" style="display:flex;justify-content:flex-start;flex-wrap:wrap">
                  @foreach($data as $key => $item)
                  <div class="mt-3 p-2 " style="margin-right:2%;border:1px solid #ccc;border-radius:8px;width:30%;position:relative">
                      <input type="hidden" name="cus_id" value="{{$item->cus_id}}">
                      <div class="d-flex">
                         <div>
                            <label for="username-field" class="form-label">@lang(74) {{$key +1}}</label>
                            <input readonly="true" name="bank_name"  type="text" class="form-control" value="{{$item->bank_name}}" placeholder="">
                         </div>
                      </div>
                   
                       <div class="d-flex mt-2">
                         <div>
                            <label for="username-field" class="form-label">@lang(76)</label>
                            <input readonly="true" name="bank_number"  type="text" class="form-control" value="{{$item->bank_number}}" placeholder="">
                         </div>
                      </div>
                      <div class="d-flex mt-2">
                         <div>
                            <label for="username-field" class="form-label">@lang(75)</label>
                            <input readonly="true" name="bank_account"  type="text" class="form-control" value="{{$item->bank_account}}" placeholder="">
                         </div>
                      </div>
                      <div class="js-delete-bank-account" data-id="{{$item->id}}" style="position: absolute;
    top: 5px;
    font-size: 11px;
    right: 5px;
    padding: 2px 4px;
    color: red;
    border: 1px solid #f00;
    border-radius: 4px;cursor:pointer">@lang(282)</div>
                  </div>
                  @endforeach
               </div>
               @else
                    <div class="col-12 " style="display:flex;justify-content:center;font-size:16px">Chưa có thông tin thẻ ngân hàng</div>
               @endif
               
                 </form>
            </div>

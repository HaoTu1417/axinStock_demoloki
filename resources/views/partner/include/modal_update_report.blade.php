
            <form id="form-update-customer" class="tablelist-form" autocomplete="off">
               @csrf
               <input type="hidden" name="id" value="{{$data->id}}">
               <div class="row g-3">
                  <div class="col-lg-12">
                     <div>
                        <label for="title-field" class="form-label">Tiêu đề</label>
                        <input name="" readonly="true" type="text" id="title-field" class="form-control" value="{{$data->title}}" placeholder="Vui lòng điền title" >
                     </div>
                  </div>
                  
                  <div class="col-lg-12">
                     <div>
                        <label for="description-field" class="form-label">Nội dung</label>
                        <textarea style="height: 150px;" name="" readonly="true" type="text" id="description-field" class="form-control" placeholder="Vui lòng điền title" >{{$data->description}}</textarea>
                     </div>
                  </div>
                  
                  
                  <div class="col-lg-12">
                     <div>
                        <label for="note-field" class="form-label">Nội dung phản hồi</label>
                        <textarea style="height: 150px;" name="note"  type="text" id="note-field" class="form-control" value="" placeholder="Vui lòng điền nội dung phản hồi" ></textarea>
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

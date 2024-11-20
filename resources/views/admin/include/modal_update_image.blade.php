<form id="form-update-image" class="tablelist-form" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$data->id}}">
    @csrf
    <div class="row g-3">
        <div class="col-lg-12">
            <div>
                <label for="image-field" class="form-label">@lang(188)</label>
                <input name="image" type="file" id="image-field" class="form-control" accept="image/*">
                <div class="invalid-feedback">Vui lòng upload ảnh</div>
            </div>
            <div class="mt-3">
                <img id="image-preview" src="{{ asset($data->image) }}" alt="Image Preview" style="max-width: 400px; height: auto;">
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label for="type-field" class="form-label">Type</label>
                <select name="type" id="type-field" class="form-control">
                    <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>@lang(190)</option>
                    <option value="2" {{ $data->type == 2 ? 'selected' : '' }}>@lang(191)</option>
                    <option value="3" {{ $data->type == 3 ? 'selected' : '' }}>@lang(192)</option>
                </select>
                <div class="invalid-feedback">Vui lòng chọn loại</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label for="status-field" class="form-label">Status</label>
                <select name="status" id="status-field" class="form-control">
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>@lang(140)</option>
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>@lang(141)</option>
                </select>
                <div class="invalid-feedback">Vui lòng chọn trạng thái</div>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="padding:0 !important; margin-top:20px">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(127)</button>
            <button type="submit" class="btn btn-success" id="update-btn">@lang(126)</button>
        </div>
    </div>
</form>
@extends('layout.layout_panner')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Cài đặt
                        <span id="totalPrices" class="float-end"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="/manager/settings">
                        @csrf
                        <div class="row border-bottom " >
                            <div class="mb-3" style="font-size:25px;font-weight:bold">Hệ thống</div>
                            <?php if($systemt != null && count($systemt) > 0) {
                                foreach ($systemt as $item) { ?>
                                    <div class="col-md-4">
                                        
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><?= $item->setting_display ?></label>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <?php if($item->setting_key == 'notification' || $item->setting_key == 'maintain_content' || $item->setting_key == 'notification_run') { ?>
                                            <textarea  class="form-control" rows="5" name="<?= $item->setting_key ?>"><?= $item->setting_value ?></textarea>
                                        <?php } else if($item->setting_key == 'maintain_status'){ ?>
                                            <select class="form-select" name="<?= $item->setting_key ?>">
                                                <option value="on" <?= $item->setting_value == "on" ? "selected" : "" ?>>Bật</option>
                                                <option value="off" <?= $item->setting_value == "off" ? "selected" : "" ?>>Tắt</option>
                                            </select>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="<?= $item->setting_key ?>" value="<?= $item->setting_value ?>" />
                                        <?php } ?>
                                    </div>
                                    </div>
                            <?php    }
                            }
                            ?>
                        </div>
                        
                        <div class="row border-bottom mt-3" >
                            <div class="mb-3" style="font-size:25px;font-weight:bold">Ngân hàng</div>
                            <?php if($bank != null && count($bank) > 0) {
                                foreach ($bank as $item) { ?>
                                    <div class="col-md-4">
                                        
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><?= $item->setting_display ?></label>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <?php if($item->setting_key == 'notification' || $item->setting_key == 'maintain_content') { ?>
                                            <textarea  class="form-control" rows="5" name="<?= $item->setting_key ?>"><?= $item->setting_value ?></textarea>
                                        <?php } else if($item->setting_key == 'maintain_status'){ ?>
                                            <select class="form-select" name="<?= $item->setting_key ?>">
                                                <option value="on" <?= $item->setting_value == "on" ? "selected" : "" ?>>Bật</option>
                                                <option value="off" <?= $item->setting_value == "off" ? "selected" : "" ?>>Tắt</option>
                                            </select>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="<?= $item->setting_key ?>" value="<?= $item->setting_value ?>" />
                                        <?php } ?>
                                    </div>
                                    </div>
                            <?php    }
                            }
                            ?>
                        </div>
                        
                        <div class="row border-bottom mt-3" >
                            <div class="mb-3" style="font-size:25px;font-weight:bold">Giới hạn, lãi , phí mua bán</div>
                            <?php if($limit != null && count($limit) > 0) {
                                foreach ($limit as $item) { ?>
                                    <div class="col-md-4">
                                        
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><?= $item->setting_display ?></label>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <?php if($item->setting_key == 'notification' || $item->setting_key == 'maintain_content') { ?>
                                            <textarea  class="form-control" rows="5" name="<?= $item->setting_key ?>"><?= $item->setting_value ?></textarea>
                                        <?php } else if($item->setting_key == 'maintain_status'){ ?>
                                            <select class="form-select" name="<?= $item->setting_key ?>">
                                                <option value="on" <?= $item->setting_value == "on" ? "selected" : "" ?>>Bật</option>
                                                <option value="off" <?= $item->setting_value == "off" ? "selected" : "" ?>>Tắt</option>
                                            </select>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="<?= $item->setting_key ?>" value="<?= $item->setting_value ?>" />
                                        <?php } ?>
                                    </div>
                                    </div>
                            <?php    }
                            }
                            ?>
                        </div>
                        
                        <div class="row border-bottom mt-3" >
                            <div class="mb-3" style="font-size:25px;font-weight:bold">Tỉ giá</div>
                            <?php if($tigia != null && count($tigia) > 0) {
                                foreach ($tigia as $item) { ?>
                                    <div class="col-md-4">
                                        
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><?= $item->setting_display ?></label>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <?php if($item->setting_key == 'notification' || $item->setting_key == 'maintain_content') { ?>
                                            <textarea  class="form-control" rows="5" name="<?= $item->setting_key ?>"><?= $item->setting_value ?></textarea>
                                        <?php } else if($item->setting_key == 'maintain_status'){ ?>
                                            <select class="form-select" name="<?= $item->setting_key ?>">
                                                <option value="on" <?= $item->setting_value == "on" ? "selected" : "" ?>>Bật</option>
                                                <option value="off" <?= $item->setting_value == "off" ? "selected" : "" ?>>Tắt</option>
                                            </select>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="<?= $item->setting_key ?>" value="<?= $item->setting_value ?>" />
                                        <?php } ?>
                                    </div>
                                    </div>
                            <?php    }
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

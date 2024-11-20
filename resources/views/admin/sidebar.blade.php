<div class="col-lg-2">
    <div class="card">
        <div class="card-body p-4 text-center">
            <div class="mx-auto avatar-md mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="img-fluid rounded-circle">
            </div>
            <h5 class="card-title mb-1">{{ $customer_data->username }}</h5>
        </div>
        <div class="card-footer text-center">
            <a href="/dang-xuat" class="text-danger">Đăng xuất</a>
        </div>
    </div>
    <div class="card ribbon-box border mb-lg-3">
        <div class="card-body">
            <div class="ribbon ribbon-primary round-shape fs-14">CHỨC NĂNG</div>
            <div class="ribbon-content mt-5 text-muted">
                <button type="button" onclick="window.location.href='/manager/customer'; return false;" class="btn w-100 btn-danger mb-3">
                    <i class="bx bx-user-check me-2"></i>
                    Khách hàng
                </button>
                <button type="button" onclick="window.location.href='/manager/play'; return false;" class="btn w-100 btn-warning mb-3">
                    <i class="bx bx-play-circle me-2"></i>
                    Đặt cược
                </button>
                <button type="button" onclick="window.location.href='/manager/session'; return false;" class="btn w-100 btn-default mb-3">
                    <i class="bx bx-list-ul me-2"></i>
                    Phiên đặt cược
                </button>
                <button type="button" onclick="window.location.href='/manager/transfer?type=1'; return false;" class="btn w-100 btn-info mb-3">
                    <i class="bx bx-credit-card me-2"></i>
                    Nạp tiền
                </button>
                <button type="button" onclick="window.location.href='/manager/transfer?type=2'; return false;" class="btn w-100 btn-dark mb-3">
                    <i class="bx bx-wallet-alt me-2"></i>
                    Rút tiền
                </button>
                 <button type="button" onclick="window.location.href='/manager/ref'; return false;" class="btn w-100 btn-dark mb-3">
                    <i class="bx bx-wallet-alt me-2"></i>
                    Hoa hồng
                </button>
                 <button type="button" onclick="window.location.href='/manager/giftcode'; return false;" class="btn w-100 btn-dark mb-3">
                    <i class="bx bx-wallet-alt me-2"></i>
                    Giftcode
                </button>
                <button type="button" onclick="window.location.href='/manager/history'; return false;" class="btn w-100 btn-success mb-3">
                    <i class="bx bx-history me-2"></i>
                    Lịch sử G.D
                </button>
                <button type="button" onclick="window.location.href='/manager/setting'; return false;" class="btn w-100 btn-primary mb-3">
                    <i class="bx bx-cog me-2"></i>
                    Cài đặt
                </button>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORE VN</title>
    <link rel="stylesheet" href="assets/css/style-auth.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
</head>

<body>
    <div id="__nuxt" data-v-app="">
        <div class="min-h-screen bg-gray-100">
            <div class="relative isolate mx-auto w-full max-w-lg bg-white text-primary-700 shadow-lg">
                <div class="relative isolate z-20 min-h-screen pb-40">
                    <div class="space-y-4">
                        <div class="relative isolate bg-primary-500 py-3 text-center text-white" onclick="window.history.back();"><svg data-v-bd832875=""
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img"
                                class="icon absolute left-4 top-1/2 isolate -translate-y-1/2 cursor-pointer"
                                width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z">
                                </path>
                            </svg> Đổi Mật Khẩu</div>
                        <div class="px-4">
                            <form class="space-y-5">
                                <div class="flex flex-col text-sm">
                                    <label for="txtOldPassword">Mật khẩu cũ:</label>
                                    <input type="password" id="txtOldPassword"
                                        class="main-input remove-arrow mt-2 !py-2"><!---->
                                    <img onclick="showOldPassword()" style="position: absolute;  right: 15px; height: 25px; bottom: 10px" data-v-246b99b3="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII=" class="eye">
                                </div>
                                <div class="flex flex-col text-sm">
                                    <label for="txtNewPassword">Mật khẩu mới:</label>
                                    <input type="password" id="txtNewPassword"
                                        class="main-input remove-arrow mt-2 !py-2"><!---->
                                    <img onclick="showNewPassword()" style="position: absolute;  right: 15px; height: 25px; bottom: 10px" data-v-246b99b3="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII=" class="eye">
                                </div>
                                <div class="flex flex-col text-sm">
                                    <label for="txtConfirmPassword">Nhập lại mật khẩu mới:</label>
                                    <input type="password" id="txtConfirmPassword"
                                        class="main-input remove-arrow mt-2 !py-2"><!---->
                                    <img onclick="showConfirmassword()" style="position: absolute;  right: 15px; height: 25px; bottom: 10px" data-v-246b99b3="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII=" class="eye">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" id="btnChangePassword" class="relative rounded-xl border-2 border-white bg-gradient-to-l from-primary-300 to-primary-500 px-4 py-2 text-sm font-medium text-white focus:outline-0">
                                        Xác nhận </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="fixed inset-x-0 bottom-0 z-30 flex items-center justify-center shadow-lg">
                        <div class="mx-auto size-full max-w-lg border-t bg-white text-gray-500">
                            <div
                                class="flex items-center justify-between border-b border-white/20 px-3 py-1 text-[13px]">
                                <div> Số điểm tài khoản: <span><?= number_format($information->money) ?></span></div>
                                <div> Mã thành viên: <span><?= $information->id ?></span></div>
                            </div>
                            <div class="flex"><button onclick="window.location.href ='/';" class="flex w-full flex-col items-center justify-center py-2"><svg
                                data-v-bd832875="" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                class="icon text-[20px]" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 21q-.825 0-1.412-.587T4 19v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21zm2-8.45q0 1.65.95 3.2t2.575 2.1q.125.05.237.063t.238.012q.125 0 .238-.012t.237-.063q1.625-.55 2.575-2.1t.95-3.2v-1.625q0-.425-.225-.788t-.6-.562l-2.5-1.25q-.325-.15-.675-.15t-.675.15l-2.5 1.25q-.375.2-.6.563T8 10.925z">
                                </path>
                            </svg><span class="text-sm">Home</span></button><button  onclick="window.location.href ='/feature?room=2';"
                            class="flex w-full flex-col items-center justify-center py-2"><svg
                                data-v-bd832875="" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                class="icon text-[20px]" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M450 128a46 46 0 0 0-44.11 59l-71.37 71.36a45.88 45.88 0 0 0-29 0l-52.91-52.91a46 46 0 1 0-89.12 0L75 293.88A46.08 46.08 0 1 0 106.11 325l87.37-87.36a45.85 45.85 0 0 0 29 0l52.92 52.92a46 46 0 1 0 89.12 0L437 218.12A46 46 0 1 0 450 128">
                                </path>
                            </svg><span class="text-sm">Xu hướng</span></button><button onclick="window.location.href ='/customer';"
                            class="flex w-full flex-col items-center justify-center py-2"><svg
                                data-v-bd832875="" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                class="icon text-[20px]" width="1em" height="1em" viewBox="0 0 24 24">
                                <circle cx="12" cy="6" r="4" fill="currentColor"></circle>
                                <ellipse cx="12" cy="17" fill="currentColor" rx="7" ry="4"></ellipse>
                            </svg><span class="text-sm">Cá Nhân</span></button><button  onclick="window.location.href ='/support';"
                            class="flex w-full flex-col items-center justify-center py-2"><svg
                                data-v-bd832875="" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                class="icon text-[20px]" width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z">
                                    </path>
                                    <path fill="currentColor"
                                        d="M13.5 3a8.5 8.5 0 0 1 0 17H13v.99A1.01 1.01 0 0 1 11.989 22c-2.46-.002-4.952-.823-6.843-2.504C3.238 17.798 2.002 15.275 2 12.009V11.5A8.5 8.5 0 0 1 10.5 3zm-5 7a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m7 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3">
                                    </path>
                                </g>
                            </svg><span class="text-sm">CSKH</span></button></div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none" id="modalShowBonus" class="fixed inset-0 isolate z-50 flex items-center justify-center bg-black/20 p-4 text-primary-500"><a
            class="absolute inset-0 z-10"></a>
        <div class="relative isolate z-20 w-full overflow-hidden rounded-lg bg-white text-white" style="min-height: 50vh; background-color:#f76c8a; background-image: url(https://rotationluck.info/public/assets/images/lon.png)">
            <div class="relative z-20 space-y-4">
                <div class=" space-y-2 overflow-y-auto px-4" style="margin-top:10%">
                    <div class="cursor-pointer items-center space-x-4 rounded-lg px-4 py-2 hover:bg-gray-100">
                        <h4 style="font-size: 24px; width: 100%; text-align:center; padding-bottom: 20px">Thông báo</h4>
                        <div class="text-lg text-center" id="txtBonusMoney">
                        </div>
                    </div>
                    <div class="cursor-pointer items-center space-x-4 rounded-lg px-4 py-2 hover:bg-gray-100">
                        <div class="flex justify-center text-sm font-medium">
                            <button type="button" onclick="$('#modalShowBonus').css('display', 'none');" style="background-color: #F76C8A;" class="relative rounded-xl border-2 border-white bg-white from-primary-300 to-primary-500 px-4 py-2 text-sm font-medium text-white focus:outline-0">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    <script>
        $(document).ready(function() {
            $('#btnChangePassword').click(function() {
                $.ajax({
                    url: '/changepasswords',
                    type: 'post',
                    data: {
                        _token: $('#csrf').val(),
                        old: $('#txtOldPassword').val(),
                        new: $('#txtNewPassword').val(),
                        confirm: $('#txtConfirmPassword').val()
                    },
                    beforeSend: function() {
                        $('#btnChangePassword').prop('disabled', true);
                    },
                    success: function(res) {
                        $('#btnChangePassword').prop('disabled', false);
                        if (res.status) {
                            toastr.success(res.message);
                            window.location.href = '/login';
                        } else {
                            toastr.error(res.message);
                        }
                    }
                })
            })
            function getBonus(){
                $.ajax({
                    url: '/bonus',
                    type:'get',
                    data: {
                        _token : $('#csrf').val()
                    },
                    success: function(res){
                        if(res.status && res.message != ''){
                            $('#txtBonusMoney').html(res.message);
                            $('#modalShowBonus').css('display', 'block');
                        }
                    }
                })
            }
            setInterval(function(){
                getBonus();
            }, 5000);
            
        });
            function showOldPassword(){
            var x = document.getElementById("txtOldPassword");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            };
            function showNewPassword(){
            var x = document.getElementById("txtNewPassword");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            };
            function showConfirmPassword(){
            var x = document.getElementById("txtConfirmPassword");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            };
    </script>
</body>

</html>

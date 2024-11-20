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
                    <div>
                        <div class="bg-primary-300 px-4 pb-6 pt-3 text-white">
                            <div class="flex items-center gap-x-3"><button onclick="window.history.back();"><svg data-v-bd832875=""
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="icon" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z">
                                        </path>
                                    </svg></button>
                                <div class="font-semibold"> ID: <?= $information->id ?></div>
                                <div class="ml-auto mr-3 flex flex-col items-center gap-y-1">
                                    <div class="text-sm font-semibold"> Number <span
                                            id="sessionIdShow"><?= ($session_id + 1000) ?></span></div>
                                    <div class="flex items-center justify-center gap-x-2">
                                        <div
                                            class="flex size-6 items-center justify-center rounded bg-white text-sm font-semibold text-primary-400">
                                            0</div>
                                        <div class="flex size-6 items-center justify-center rounded bg-white text-sm font-semibold text-primary-400"
                                            id="txtMinuteCountDown">
                                            0</div>
                                        <div class="flex size-6 items-center justify-center rounded bg-white text-sm font-semibold text-primary-400"
                                            id="txtSecondCountDown">
                                            0</div>
                                    </div>
                                </div><button type="button" id="btnOpenShowInformation"><svg data-v-bd832875="" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        class="icon" width="25px" height="25px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8q0 .425.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22">
                                        </path>
                                    </svg></button>
                            </div><!---->
                        </div>
                        <div class="flex justify-center gap-x-6 border-b py-2 shadow"><a aria-current="page"
                                href="/betting?room=1"
                                class="router-link-active router-link-exact-active inline-block rounded-full font-semibold px-4 py-2.5 text-sm">PHÒNG
                                1</a>
                            <a aria-current="page" href="/betting?room=2"
                                class="router-link-active router-link-exact-active inline-block rounded-full font-semibold bg-primary-500 text-white px-4 py-2.5 text-sm">PHÒNG
                                2</a>
                            <a aria-current="page" href="/betting?room=3"
                                class="router-link-active router-link-exact-active inline-block rounded-full font-semibold px-4 py-2.5 text-sm">PHÒNG
                                3</a>
                        </div>
                        <div class="py-4">
                            <div class="relative isolate">
                                <div class="z-10 flex items-center justify-between border-l-4 border-blue-600 py-3">
                                    <div class="ml-3 text-sm text-blue-600"> Số 1 - 9 </div><svg onclick="window.location.reload()" data-v-bd832875=""
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="icon mr-3 text-gray-600" width="20px"
                                        height="20px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5.53 17.506q-.978-1.143-1.504-2.558Q3.5 13.533 3.5 12q0-3.615 2.663-6.058Q8.827 3.5 12.5 3.5V2l3.673 2.75L12.5 7.5V6Q9.86 6 7.93 7.718Q6 9.437 6 12q0 1.13.399 2.15q.4 1.02 1.13 1.846zM11.5 22l-3.673-2.75L11.5 16.5V18q2.64 0 4.57-1.718Q18 14.563 18 12q0-1.13-.399-2.16q-.4-1.028-1.13-1.855l1.998-1.51q.98 1.142 1.505 2.558q.526 1.415.526 2.967q0 3.615-2.663 6.058Q15.173 20.5 11.5 20.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="absolute left-1/2 top-1/2 z-20 -translate-x-1/2 -translate-y-1/2"><button
                                        class="main-button !py-2 !text-xs"> C.Ngàn </button></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-0.5 px-2">
                            <div class="flex cursor-pointer flex-col items-center rounded bg-green-50 py-2 btnChoose" data-id="0">
                                <div class="text-sm">NHẬP</div>
                            </div>
                            <div class="flex cursor-pointer flex-col items-center rounded bg-green-50 py-2 btnChoose" data-id="1">
                                <div class="text-sm">XUẤT</div>
                            </div>
                            <div class="flex cursor-pointer flex-col items-center rounded bg-green-50 py-2 btnChoose" data-id="2">
                                <div class="text-sm">UP</div>
                            </div>
                            <div class="flex cursor-pointer flex-col items-center rounded bg-green-50 py-2 btnChoose" data-id="3">
                                <div class="text-sm">DOWN</div>
                            </div>
                        </div>
                        <?php if($room_id == 2){ ?>
                            <div class="mt-3 px-2"><img src="<?= $image_3->setting_value ?>" alt="" class="w-full"></div>
                        <?php } else { ?>
                            <div class="mt-3 grid grid-cols-3 gap-2 px-2"><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">1</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">2</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">3</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">4</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">5</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">6</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">7</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">8</div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm">9</div></div><div></div><div class="flex cursor-pointer flex-col items-center rounded border border-primary-100 py-2"><div class="text-sm"> 9 </div></div></div>
                        <?php } ?>
                        
                    </div>
                    <div class="fixed inset-x-0 bottom-0 z-30 flex items-center justify-center shadow-lg">
                        <div class="mx-auto size-full max-w-lg border-t bg-white text-gray-500">
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
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden id="txtValueCountDown" value="<?= $session_time ?>" />
    <input type="text" hidden id="txtSessionId" value="<?= $session_id ?>" />
    <input type="text" hidden id="txtRoomId" value="<?= $room_id ?>" />
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    
    <div id="bettingInformationDiv" style="display:none" class="fixed inset-x-0 bottom-14 z-40 flex items-center justify-center">
        <div class="mx-auto size-full max-w-lg space-y-5 border-t bg-primary-100 p-4 text-gray-500">
            <div class="flex justify-evenly">
                <div class="cursor-pointer rounded px-3 text-center text-sm bg-white btnPriceBetting" data-price="100000">100K</div>
                <div class="cursor-pointer rounded px-3 text-center text-sm bg-white btnPriceBetting" data-price="500000">500K</div>
                <div class="cursor-pointer rounded px-3 text-center text-sm bg-white btnPriceBetting" data-price="1000000">1M</div>
                <div class="cursor-pointer rounded px-3 text-center text-sm bg-white btnPriceBetting" data-price="10000000">10M</div>
                <div class="cursor-pointer rounded px-3 text-center text-sm bg-white btnPriceBetting" data-price="20000000">20M</div>
            </div>
            <div class="flex items-center justify-between"><button class="flex items-center"><svg data-v-bd832875=""
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="icon" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z">
                        </path>
                    </svg><span class="text-sm" style="cursor: pointer;" id="btnCloseBettingInformation"> Đóng cửa </span></button>
                    <input type="number" id="txtAmountBetting" class="main-input remove-arrow !w-36 !py-1 text-center text-sm"><button
                    class="main-button !py-1 text-sm" type="button" id="btnBetting"> Xác nhận </button></div>
            <div class="flex justify-between">
                <div class="text-sm font-semibold"> Number: <?= $session_id ?></div>
                <div class="text-sm font-semibold"> Số dư: <span class="amountDisplay"><?= number_format($information->money) ?></span></div>
            </div>
        </div>
    </div>
    <div id="bettingShowInformation" style="display:none" class="fixed inset-0 isolate z-50 flex items-center justify-center bg-black/20 p-4 text-primary-600"><a
                class="absolute inset-0 z-10"></a>
            <div class="relative isolate z-20 w-full overflow-hidden rounded-lg bg-white">
                <div class="relative z-20 space-y-4">
                    <div class="bg-primary-600 px-4 py-2 font-medium text-white"> Quy Định </div>
                    <div class="space-y-2 px-4 text-sm text-black">
                        <p class="font-medium">* Để đảm bảo Web được hoạt động lâu dài cũng như bắt buộc duy trì các
                            hoạt động đóng thuế cho Doanh Nghiệp, đối với Quý khách hàng nhận được phần Quà ngẫu nhiên
                            may mắn từ Web, Khi rút tiền Quy đổi cần thực hiện đóng Thuế duy trì theo hạn mức rút tiền
                            như sau:</p>
                        <p class="font-medium"> * Hạn mức rút tiền Quy đổi tài khoản dưới 200 triệu tương ứng 15 % Thuế
                            Web duy trì </p>
                        <p class="font-medium"> * Hạn mức rút tiền Quy đổi tài khoản dưới 500 triệu tương ứng 20 % Thuế
                            Web duy trì </p>
                        <p class="font-medium"> * Hạn mức rút tiền Quy đổi tài khoản trên 500 triệu tương ứng 30 % Thuế
                            Web duy trì </p>
                        <p class="font-medium"> Lưu ý: Những hành vi trốn thuế Web, gian lận khi nộp thuế là hành vi vi
                            phạm chính sách thuế doanh nghiệp của nhà nước thông qua việc chủ thể không hoàn thành hoặc
                            hoàn thành không đầy đủ nghĩa vụ thuế Web. Vi phạm hành chính và hình sự theo quy định pháp
                            luật hiện hành </p>
                    </div>
                    <div class="flex justify-center gap-x-3 pb-4"><button type="button" id="btnCloseShowInformation"
                            class="rounded-full bg-primary-400 px-3 py-2 text-sm font-medium uppercase text-white"> Xác
                            nhận </button></div>
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
    </div>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                countDownTime();
            }, 1000);

            function countDownTime() {
                let timer = parseInt($('#txtValueCountDown').val());
                if (timer < 0) {
                    getSession();
                    return;
                }
                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;

                seconds = seconds < 10 ? "0" + seconds : seconds;

                $('#txtMinuteCountDown').html(minutes);
                $('#txtSecondCountDown').html(seconds);
                $('#txtValueCountDown').val(timer - 1);
            }

            function getSession() {
                $.ajax({
                    url: '/session',
                    type: 'get',
                    data: {
                        _token: $('#csrf').val(),
                        room: $('#txtRoomId').val(),
                    },
                    success: function(res) {
                        if (res.status) {
                            if (res.second > 0 && res.id > 0) {
                                $('#txtValueCountDown').val(res.second);
                                $('#txtSessionId').val(res.id);
                                $('#sessionIdShow').html(res.id);
                            }
                        }
                    }
                })
            }
            $('#btnBetting').click(function() {
                $.ajax({
                    url: '/bettings',
                    type: 'post',
                    data: {
                        _token: $('#csrf').val(),
                        amount: $('#txtAmountBetting').val(),
                        room: $('#txtRoomId').val(),
                        value: $('.btnChoose.active').data('id')
                    },
                    beforeSend: function() {
                        $('#btnBetting').prop('disabled', true);
                    },
                    success: function(res) {
                        $('#btnBetting').prop('disabled', false);
                        if (res.status) {
                            toastr.success('Đặt cược thành công');
                            $('#bettingInformationDiv').css('display', 'none');
                            $('.amountDisplay').html(res.message);
                        } else {
                            toastr.error(res.message);
                        }
                    }
                })
            });
            $('#btnCloseBettingInformation').click(function(){
                if($('#bettingInformationDiv').css('display') == "block"){
                    $('#bettingInformationDiv').css('display', 'none');
                }
            });
            
            $('#btnCloseShowInformation').click(function(){
                if($('#bettingShowInformation').css('display') == "block"){
                    $('#bettingShowInformation').css('display', 'none');
                }
            });
            
            $('#btnOpenShowInformation').click(function(){
                if($('#bettingShowInformation').css('display') == "none"){
                    $('#bettingShowInformation').css('display', 'block');
                }
            });
            
            $('.btnPriceBetting').click(function(){
                $('#txtAmountBetting').val($(this).data('price'));
            });
            $('.btnChoose').click(function() {
                $('.btnChoose').removeClass('active');
                $(this).addClass('active');
                if($('#bettingInformationDiv').css('display') == "none"){
                    $('#bettingInformationDiv').css('display', 'block');
                }
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
    </script>
</body>

</html>

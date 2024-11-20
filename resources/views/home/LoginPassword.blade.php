<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=5003">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/dailytasks.css?id=4136">
    <!-- CDN Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .LoginP-container-form {
            position: relative;
            margin-top: 1.33333rem;
            overflow: hidden;
            margin: 20px;
        }

        .LoginP-container-form .passwordInput__container {
            margin-bottom: 1.2rem;
        }

        .passwordInput__container-input {
            position: relative;
            gap: .24rem;
            border-bottom: .01333rem solid #686C94;
        }

        .passwordInput__container-label,
        .passwordInput__container-input {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 0 .02667rem;
        }

        .passwordInput__container-input input {
            width: 99%;
            height: 2.17333rem;
            font-size: 15px;
            border: none;
            border-radius: 0.26667rem;
            background: transparent;
            outline: none;
            color: #fff;
            background: url(/assets/images/password-d9d393e6.png) no-repeat left center;
            background-size: 1.64rem 1.64rem;
            padding: 0.36rem 0.34667rem 0.36rem 1.8rem;
        }

        .passwordInput__container-input img {
            position: absolute;
            top: 50%;
            right: .4rem;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 1.53333rem;
            height: auto;
        }

        .LoginP-container-button {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            width: 100%;
            margin-top: 1.77333rem;
        }

        .LoginP-container-button button {
            width: 12.73333rem;
            height: 2.06667rem;
            color: #945b16;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .05333rem;
            border-radius: 3.06667rem;
            border: none;
            background: -webkit-linear-gradient(left, #EBBB6F 0%, #CD9047 100%);
            background: linear-gradient(90deg, #EBBB6F 0%, #CD9047 100%);
        }
    </style>
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script>
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
        function changePassword() {
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
                    if (res.status) {
                        toastr.success(res.message);
                        window.location.reload();
                    } else {
                        toastr.error(res.message);
                    }
                }
            })
        }
    </script>
</head>

<body>
    <div class="container homecontainer">
        <ul>
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 110px;">Thay Đổi Mật Khẩu</li>
            <!-- <li style="float:right;" onclick="location.href='/DailyTasks/Record';"><img style="height: 25px;" src="/assets/images/lsgd.png" alt=""></li> -->
        </ul>

        <div class="body">
            <div class="LoginP-container-form">
                <div class="passwordInput__container">
                    <div class="passwordInput__container-input"><input type="password"
                            placeholder="Vui lòng nhập Mật khẩu hiện tại" maxlength="32" id="txtOldPassword" autocomplete="new-password"
                            aria-autocomplete="list"><img onclick="showOldPassword()"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII="
                            class="eye"></div>
                </div>
                <div class="passwordInput__container">
                    <div class="passwordInput__container-input"><input type="password"
                            placeholder="Vui lòng nhập Mật khẩu mới" id="txtNewPassword" maxlength="15" autocomplete="new-password"><img onclick="showNewPassword()"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII="
                            class="eye"></div>
                </div>
                <div class="passwordInput__container mgb48">
                    <div class="passwordInput__container-input"><input type="password"
                            placeholder="Vui lòng nhập Xác nhận mật khẩu mới" id="txtConfirmPassword" maxlength="15"
                            autocomplete="new-password"><img onclick="showConfirmPassword()"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAP1BMVEUAAADExMTExMTDw8PExMTFxcXFxcXExMS/v7/FxcXFxcXExMTExMTDw8PExMTFxcXFxcXExMTPz8+/v7/ExMTkagEbAAAAFHRSTlMAIO/ff29fvxDfMD/PoI+fr1AQMBwdwB4AAAFQSURBVDjL5ZJbkoQgDEXDI4iAqN3sf61DIEFHqmvmv/OhEE5ycwvgm0Il+z9uLQU/HJ0OrTvD4IqdoZdbdOHQh+sczphlSmKlvZu4uPZG2bkqfnDRzFlKL/FKuM9cig+/OoLCmcs8Au7ZqUDcG4IW00OGE2Fh040D/G1baeFO8mDo07gmpdUAa5djVGQPgej3OFtuwqZX7U3o1C0RmjevL+/rWLZqVzqnyV0bc70atgVJInPUaR/ip5TkATrmIBYBd3Gq6pGSVWpc18mPY9jYGKk0jgeP0nCjPxtDTgpnZXDkjGy0kgv3AK+4FG6opMmQXJVwob8wK0/jgCu8qWS+c/oU7hJumUqyrl2MOdDLzd85maVs/p6iQScOMnG1HcYXANlBwsriH9zWua2NZ4zmR8l+Jy6Ycotk/czJfQU8kqmRdgwwhU9y7X+F3yx8VfwAZv4b1F/KTEQAAAAASUVORK5CYII="
                            class="eye"></div>
                </div>
                <div class="LoginP-container-button"><button type="button" onclick="changePassword();">Lưu thay đổi</button></div>
            </div>
            <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
</body>




</html>

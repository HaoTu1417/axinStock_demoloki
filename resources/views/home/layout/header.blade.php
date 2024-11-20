<style>
    .navbar{
      height:50px;
      position: absolute;
     top:0;
     left: 0;
     right: 0;
     background-color: #1E2034;
     padding:0 8px;
    }
    .navbar-fixed{
    
    }
    .navbar__content{
      display:flex;
      justify-content:space-between;
      align-items:center;
        width: 100%;
    }
    .navbar__content-left img{
        width: 180px;
    }
    .navbar__content-right {
        position: absolute;
        right: 10px;
    }
    .bottom{
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        padding-top: 0.2rem;
        margin-left: 10px;
    }
    .avatar-bg{
        position: absolute;
        width: 46px;
        height: 46px;
        object-fit: cover;
        left: -26px;
        top: 0;
        background: url(/assets/png/user_avatar-a8797282.png) no-repeat center/cover;
        padding: 4px;
        overflow: hidden;
        border-radius: 50%;
    }
    .navbar-brand{
        color: white;
        text-decoration: none;
        white-space: nowrap;
        font-size:12px;
        margin:0;
        margin-left:16px;
        padding:0;
    }
    .navbar__content-right img{
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    .navbar__content-right .info{
        position: relative;
        width: 152px;
        height: 45px;
        color: #bdbdd2;
        padding: 0.12rem 0 0.12rem 0.58667rem;
        background: url(/assets/png/user_bg-62ff29b9.png) no-repeat center/cover;
    }
    .navbar__content-center img{
        /* width: 60px; */

    }
    .bottom span{
        font-size:12px;
        margin:0 6px;
        font-weight: bold;
    }
    .navbar__content-right .info svg{
        height:14px;
        margin-bottom:4px;
        margin-left:-8px;
    }
</style>
<link rel="stylesheet" href="assets/css/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script>
          function copy(content){
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(content).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Sao chép thành công');
        }
      </script>
<div class="navbar navbar-expand-lg navbar-light ">
    <div class="navbar-fixed">
        <div class="navbar__content">
            <div class="navbar__content-left"><img style="height: 40px;width:80px;" src="/assets/images/LOGO.png" alt=""></div>
           
            <div class="navbar__content-right">
                <div class="info">
                    <p class="navbar-brand">MEMBER<?= $information->id ?></p>
                    <div class="bottom">
                        <span class="uid">UID</span> | <span><?= $information->id ?></span>
                        <span onclick="copy('<?= $information->id ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M6.5 7.04197V4.73242C6.5 3.95577 7.1296 3.32617 7.90625 3.32617H20.0938C20.8704 3.32617 21.5 3.95577 21.5 4.73242V16.9199C21.5 17.6966 20.8704 18.3262 20.0938 18.3262H17.7582" stroke="#8E98B9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.0938 7.32617H3.90625C3.1296 7.32617 2.5 7.95577 2.5 8.73242V20.9199C2.5 21.6966 3.1296 22.3262 3.90625 22.3262H16.0938C16.8704 22.3262 17.5 21.6966 17.5 20.9199V8.73242C17.5 7.95577 16.8704 7.32617 16.0938 7.32617Z" stroke="#8E98B9" stroke-width="2" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="avatar-bg"><img alt="" class="img-fluid" data-origin="https://fb333.com/assets/png/4-12a0d0c5.png" src="https://fb333.com/assets/png/4-12a0d0c5.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
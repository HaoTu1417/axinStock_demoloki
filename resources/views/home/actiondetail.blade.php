<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/dailytasks.css?id=<?php echo rand(0, 9999); ?>">
    <link rel="stylesheet" href="/assets/css/action.css?id=<?php echo rand(0, 9999); ?>">
    <!-- CDN Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<style>
    .navbar {
        height: 50px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background-color: #1E2034;
        padding: 0 8px;
    }

    .navbar-fixed {}

    .navbar__content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .navbar__content-left {
        color: #FFF;
        margin-left: 10px;
    }

    .navbar__content-center {
        color: #fff;
        font-size: 25px;
        line-height: .48rem;
    }

    .navbar__content-title {
        margin-left: 100px;
        margin-top: -16px;
    }
</style>

<body>
    <div class="container homecontainer">
        <ul>
            <li class="content-left" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            <li style="padding-left: 110px;">Chi Tiết Hoạt Động</li>
        </ul>

        <div class="body">
            <div class="active-container" style="--495c4c83: bahnschrift;"><img class="banner" src="/assets/images/<?= $key ?>.png">
                <div class="active-box">
                    <div class="title"></div>
                    <div>
                        <p><img src="/assets/images/<?= $actiondetail ?>" style="width: 526px;"><br></p>
                    </div>
                </div>
            </div>
</body>




</html>
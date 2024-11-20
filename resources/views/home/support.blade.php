<!DOCTYPE html>
<html lang="en">

<head>
    <title>STORE VN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>
    <div class="container homecontainer_login">
        <div class="text-white" style="height: 50px;">
            <i onclick="history.back()" class="icon-back bi bi-chevron-left"></i>
        </div>
        <div class="text-center text-white">
            <img style="max-height: 190px;" src="https://i.imgur.com/zbZ9m8N.png" alt="">
            <h3 style="margin-top: 15px;">CSKH</h3>
        </div>
        <!--<div style="margin:30px; background: #303454;padding: 10px;" onclick="window.location.href = '<?= $livechat ?>'">-->
        <!--    <div style="float: right; margin: 8px;">-->
        <!--        <i class="text-white bi bi-chevron-right"></i>-->
        <!--    </div>-->
        <!--    <div class="text-white" style="display:flex;">-->
        <!--        <img style="height: 40px;" src="https://i.imgur.com/mTicnaF.png" alt="">-->
        <!--        <p style="margin: 7px;">LIVE CHAT</p>-->
        <!--    </div>-->
        <!--</div>-->

        <div style="margin:30px; background: #303454;padding: 10px;" onclick="window.location.href = '<?= $telegram ?>'">
            <div style="float: right; margin: 8px;">
                <i class="text-white bi bi-chevron-right"></i>
            </div>
            <div class="text-white" style="display:flex;">
                <img style="height: 40px;" src="https://i.imgur.com/mTicnaF.png" alt="">
                <p style="margin: 7px;">TELEGRAM</p>
            </div>
        </div>
    </div>
</body>

</html>

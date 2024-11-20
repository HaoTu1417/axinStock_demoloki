<!DOCTYPE html>
<html lang="vi">
<head>
    <title>{{$title->setting_value}}</title>
    <link rel="shortcut icon" type="image/png" href="{{$icon->image}}"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.min.js"></script>
    <style>
    @keyframes loadingA {
  0 {
    height: 15px;
  }
  50% {
    height: 35px;
  }
  100% {
    height: 15px;
  }
}

@keyframes loadingB {
  0 {
    width: 15px;
  }
  50% {
    width: 35px;
  }
  100% {
    width: 15px;
  }
}

@keyframes loadingC {
  0 {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(0, 15px);
  }
  100% {
    transform: translate(0, 0);
  }
}

@keyframes loadingD {
  0 {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(180deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loadingE {
  0 {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loadingF {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes loadingG {
  0% {
    transform: translate(0, 0) rotate(0deg);
  }
  50% {
    transform: translate(70px, 0) rotate(360deg);
  }
  100% {
    transform: translate(0, 0) rotate(0deg);
  }
}

@keyframes loadingH {
  0% {
    width: 15px;
  }
  50% {
    width: 35px;
    padding: 4px;
  }
  100% {
    width: 15px;
  }
}

@keyframes loadingI {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes bounce {
  0%,
  100% {
    transform: scale(0);
  }
  50% {
    transform: scale(1);
  }
}

@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 25px;
  }
}
        .VIpgJd-ZVi9od-ORHb-OEVmcd {
            display: none !important;
        } 
        body {
            top: 0px !important; 
        }
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
        .header-default {
            background: rgb(62, 76, 244);
            display: flex;
            justify-content: center;
            height: 54px;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }
        .header-default .logo-header {
            width: 132px;
            height: 26px;
        }
        .row > * {
            height: auto;
        }
        .col {
            background: #fff !important;
        }
        a.nav-link.active {
            color: #fff !important;
        }
        .items {
        }
        @media screen and (max-width: 768px) {
            .items::-webkit-scrollbar {
                display: none;
            }
        }
        .items::-webkit-scrollbar {
        } 
        .item-cp.active {
            font-weight: bold;
            color: #3e4cf3;
            background: #eceeff;
        }
        .item-cp {
            padding: 6px 16px;
            white-space: nowrap;
            background-color: #f5f5f5;
            border-radius: 4px;
            color: #959595;
            width: auto;
            margin-right: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .list-item-cp {
            margin-top: 10px;
            display: flex;
            width: auto;
            overflow: auto;
        }
        .list-item-cp.list-item-cp2 {
        }
        .table-custom {
        }
        .table-custom thead th {
            color: #959595;
            font-size: 13px;
        }
        .ellipsis-text {
            display: inline-block;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 12px;
        }
        input {
            padding: 6px;
            color: rgb(192, 196, 204);
            background: #f4f5f7 !important;
            outline: none !important;
            border: none !important;
            font-size: 16px !important;
        }
        .form-input {
            display: flex !important;
            align-items: center !important;
            background: #f4f5f7;
            padding: 6px;
            border-radius: 8px;
        }
        .form-input img {
            margin-right: 10px;
        }
        .form-input input {
            flex: 1;
        }

        /* Loading spinner */
       
        .loading-spinner {
            display: none;
            background: #fff;
            position: fixed;
            top: 50%;
            left: 50%;
            height: 100vh;
            max-width: 500px;
            width: 100%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            display:flex;
            align-items: center;
            justify-content: center;
        }
          @media screen and (max-width: 768px) {
           .loading-spinner {
           width: 100%!important;
        }
        }
        .load-wrapp {
          float: left;
          width: 100px;
          height: 100px;
          margin: 0 10px 10px 0;
          padding: 20px 20px 20px;
          border-radius: 5px;
          text-align: center;
          background-color: transparent;
        }
        
        .load-wrapp p {
          padding: 0 0 20px;
        }
        .load-wrapp:last-child {
          margin-right: 0;
        }
        
        .line {
          display: inline-block;
          width: 10px;
          height: 10px;
          border-radius: 5px;
          background-color: #0d6efd;
        }
        
        .ring-1 {
          width: 10px;
          height: 10px;
          margin: 0 auto;
          padding: 10px;
          border: 7px dashed #4b9cdb;
          border-radius: 100%;
        }
        
        .ring-2 {
          position: relative;
          width: 45px;
          height: 45px;
          margin: 0 auto;
          border: 4px solid #4b9cdb;
          border-radius: 100%;
        }
        
        .ball-holder {
          position: absolute;
          width: 12px;
          height: 45px;
          left: 17px;
          top: 0px;
        }
        
        .ball {
          position: absolute;
          top: -11px;
          left: 0;
          width: 16px;
          height: 16px;
          border-radius: 100%;
          background: #4282b3;
        }
        
        .letter-holder {
          padding: 16px;
        }
        
        .letter {
          float: left;
          font-size: 14px;
          color: #777;
        }
        
        .square {
          width: 12px;
          height: 12px;
          border-radius: 4px;
          background-color: #4b9cdb;
        }
        
        .spinner {
          position: relative;
          width: 45px;
          height: 45px;
          margin: 0 auto;
        }
        
        .bubble-1,
        .bubble-2 {
          position: absolute;
          top: 0;
          width: 25px;
          height: 25px;
          border-radius: 100%;
          background-color: #4b9cdb;
        }
        
        .bubble-2 {
          top: auto;
          bottom: 0;
        }
        
        .bar {
          float: left;
          width: 15px;
          height: 6px;
          border-radius: 2px;
          background-color: rgb(62, 76, 244);
        }
        
        .load-3 .line:nth-last-child(1) {
          animation: loadingC 0.7s 0.1s linear infinite;
        }
        .load-3 .line:nth-last-child(2) {
          animation: loadingC 0.7s 0.2s linear infinite;
        }
        .load-3 .line:nth-last-child(3) {
          animation: loadingC 0.7s 0.3s linear infinite;
        }
        
        .load-1 .line:nth-last-child(1) {
          animation: loadingA 1.5s 1s infinite;
        }
        .load-1 .line:nth-last-child(2) {
          animation: loadingA 1.6s 0.5s infinite;
        }
        .load-1 .line:nth-last-child(3) {
          animation: loadingA 1.7s 0s infinite;
        }


        .loading-spinner .spinner-border {
            width: 3rem;
            height: 3rem;
        }
    </style>
    <script>
        function displaySelectedImage(event, elementId) {
            const selectedImage = document.getElementById(elementId);
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        selectedImage.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                } else {
                    toastr.error("Vui lòng chọn đúng định dạng ảnh");
                }
            }
        }
        
        $(document).ready(function() {
            // Show the loading spinner
            $('.loading-spinner').show();

            // Hide the loading spinner after 1 second and fade out
            setTimeout(function() {
                $('.loading-spinner').fadeOut(1000, function() {
                    $(this).remove();
                });
            }, 1000);
        });
    </script>
</head>
<body>
    <!-- Loading spinner -->
    <div class="loading-spinner">
       <div class="load-wrapp">
          <div class="load-1">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
        </div>
    </div>

    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
    @yield('content')
    @include('home.layout.footer')

    @yield('script')
</body>
</html>

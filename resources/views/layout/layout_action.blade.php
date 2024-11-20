<!DOCTYPE html>
<html lang="en">

<head>
  <title>vnf7</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css?id=<?php echo rand(0, 9999); ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .homecontainer{
      background-color:#fff;
    }
    .header-default{
      background:#3e4cf3;
      display:flex;
      justify-content:center;
      height:54px;
      align-items:center;
    }
    .header-default .logo-header{
        width: 132px;
        height: 26px;
    }
    .row >*{
      height: auto;
    }
    .col{
      background: #fff !important;

    }
    a.nav-link.active{
      color:#fff !important;
    }
    .items{
      
    }
    @media screen and (max-width:  768px) {
      .items::-webkit-scrollbar {
          display: none;
      }  
    }

    .items::-webkit-scrollbar {
          
    } 
    .item-cp.active{
      font-weight: bold;
      color:#3e4cf3;
      background:#eceeff;
    }
    .item-cp{
      padding: 6px 16px;
      white-space: nowrap;
      background-color: #f5f5f5;
      border-radius:4px;
      color:#959595;
      width: auto;
      margin-right:10px;
      margin-bottom:10px;
      cursor: pointer;
    }
    .list-item-cp{
      margin-top:10px;
      display:flex;
      width: auto;
      overflow: auto;
    }
    .list-item-cp.list-item-cp2{

    }
    .table-custom{
      
    }
    .table-custom thead th{
      color:#959595;
      font-size:13px;
    }
    .ellipsis-text {
    display: inline-block;
    max-width: 120px; /* Giá trị tối đa của chiều rộng */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size:12px;
}

.item-his .col-4{
  margin:5px 0;
}
.btn-buy.active{
  background:#1ba17f !important;
  color:white !important;
}
.btn-sell.active{
  background:#ef4034 !important;
  color:white !important;
}
.block-his{
  border:1px solid #ccc;
  border-radius:4px;
}    
  </style>
</head>

<body>
  <div class="container homecontainer">

    @yield('content')
  </div>
</body>
</html>
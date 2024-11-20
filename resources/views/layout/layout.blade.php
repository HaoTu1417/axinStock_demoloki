<!DOCTYPE html>
<html lang="en">

<head>
  <title>STORE VN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css?id=<?php echo rand(0, 9999); ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>

<body>
<div class="container homecontainer">

  <div class="text-white text-center bg-darkBody">
    <p class="p-trangchu">Trang chủ</p>
  </div>

  <div class="homeContainer">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/assets/png/banner1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/assets/png/banner1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/assets/png/banner1.png" class="d-block w-100">
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <div class="tablist-home">
      <ul class="nav nav-pills mb-3 ulTab" id="pills-tab" role="tablist">
        <li class="nav-item w-25" role="presentation">
          <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Toàn Bộ</button>
        </li>
        <li class="nav-item w-25" role="presentation">
          <button class="nav-link" id="pills-yellow-tab" data-bs-toggle="pill" data-bs-target="#pills-yellow" type="button" role="tab" aria-controls="pills-yellow" aria-selected="false">Vàng</button>
        </li>
        <li class="nav-item w-25" role="presentation">
          <button class="nav-link" id="pills-ring-tab" data-bs-toggle="pill" data-bs-target="#pills-ring" type="button" role="tab" aria-controls="pills-ring" aria-selected="false">Nhẫn</button>
        </li>
        <li class="nav-item w-25" role="presentation">
          <button class="nav-link" id="pills-necklace-tab" data-bs-toggle="pill" data-bs-target="#pills-necklace" type="button" role="tab" aria-controls="pills-necklace" aria-selected="false">Vòng Cổ</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
          <div class="text-center" onclick="location.href='/login'">
            <div class="row g-2">
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/1-550acb24.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bộ trang sức cưới Vàng trắng 10K đính đá ECZ PNJ Trầu cau 00373-04069</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">34.644.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/2-4e418ff5.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá ECZ PNJ Trầu Cau XMXMY009666</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">5.621.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/3-427a0ac8.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng 24K PNJ Trầu Cau 0000Y002848</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">26.661.397đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/4-83ee93e6.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 24K PNJ Trầu Cau 0000Y002594</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">12.948.848đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/5-7dc6bd5a.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai cưới Vàng 18K đính đá ECZ PNJ Trầu Cau XMXMY006013</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">16.483.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/7-8ebd38d5.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBMXY000023</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">30.451.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/6-934a240b.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng Trắng 10K đính đá ECZ PNJ Trầu Cau XMXMW000469</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">13.019.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/8-00bbd392.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBXMY001202</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">14.411.000đ</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/11-1a9c49a4.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng 10K PNJ 0000Y002530</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">4.534.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/22-3094208e.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng 10K PNJ 0000Y002619</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">2.354.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/33-9bf4b27b.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng Trắng 10K đính đá ECZ PNJ XMXMW002237</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">4.749.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/44-57b4f205.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Dây cổ Vàng Trắng 10K đính đá ECZ PNJ XMXMW000348</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">8.443.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/55-549f6e41.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng Trắng 10K đính đá ECZ PNJ XMXMW002351</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">6.340.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/66-3bbb73f7.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng trắng 10K đính đá ECZ PNJ XM00W001327</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">3.209.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/77-ac36a59b.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Kim cương Vàng Trắng 14K PNJ DD00W001819</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">5.905.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/88-2d3ce1fa.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay Kim cương Vàng Trắng 14K PNJ DD00W000490</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">6.939.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-yellow" role="tabpanel" aria-labelledby="pills-yellow-tab" tabindex="0">
          <div class="text-center" onclick="location.href='/login'">
            <div class="row g-2">
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/3-427a0ac8.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng 24K PNJ Trầu Cau 0000Y002848</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">26.661.397đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/1-550acb24.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bộ trang sức cưới Vàng trắng 10K đính đá ECZ PNJ Trầu cau 00373-04069</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">34.644.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/2-4e418ff5.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá ECZ PNJ Trầu Cau XMXMY009666</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">5.621.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/4-83ee93e6.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 24K PNJ Trầu Cau 0000Y002594</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">12.948.848đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/5-7dc6bd5a.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai cưới Vàng 18K đính đá ECZ PNJ Trầu Cau XMXMY006013</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">16.483.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/7-8ebd38d5.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBMXY000023</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">30.451.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/6-934a240b.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Lắc tay cưới Vàng Trắng 10K đính đá ECZ PNJ Trầu Cau XMXMW000469</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">13.019.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/8-00bbd392.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBXMY001202</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">14.411.000đ</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/11-1a9c49a4.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng 10K PNJ 0000Y002530</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">4.534.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/22-3094208e.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng 10K PNJ 0000Y002619</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">2.354.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/33-9bf4b27b.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng Trắng 10K đính đá ECZ PNJ XMXMW002237</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">4.749.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/44-57b4f205.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Dây cổ Vàng Trắng 10K đính đá ECZ PNJ XMXMW000348</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">8.443.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/55-549f6e41.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Bông tai Vàng Trắng 10K đính đá ECZ PNJ XMXMW002351</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">6.340.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/66-3bbb73f7.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng trắng 10K đính đá ECZ PNJ XM00W001327</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">3.209.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-ring" role="tabpanel" aria-labelledby="pills-ring-tab" tabindex="0">
          <div class="text-center" onclick="location.href='/login'">
            <div class="row g-2">
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/2-4e418ff5.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá ECZ PNJ Trầu Cau XMXMY009666</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">5.621.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/4-83ee93e6.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 24K PNJ Trầu Cau 0000Y002594</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">12.948.848đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/8-00bbd392.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBXMY001202</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">14.411.000đ</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/11-1a9c49a4.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng 10K PNJ 0000Y002530</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">4.534.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/66-3bbb73f7.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Nhẫn Vàng trắng 10K đính đá ECZ PNJ XM00W001327</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">3.209.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-necklace" role="tabpanel" aria-labelledby="pills-necklace-tab" tabindex="0">
          <div class="text-center" onclick="location.href='/login'">
            <div class="row g-2">
              <div class="col-6">
                <div class="p-3 bg-product">
                  <img class="img-product" src="/assets/png/44-57b4f205.png" alt="">
                </div>
                <div class="bg-title-product">
                  <p class="text-white">Dây cổ Vàng Trắng 10K đính đá ECZ PNJ XMXMW000348</p>
                  <div class="row g-2">
                    <div class="col-6">
                      <p class="text-686c94">1000+mọi người mua</p>
                    </div>
                    <div class="col-6">
                      <p class="text-cd9047">8.443.000đ</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
<div  class="tabbar__container" style="--495c4c83: bahnschrift;">
   <div  class="tabbar__container-item active">
      <svg  width="48" height="48" viewBox="0 0 46 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M5 19.8426C5 17.8398 5.99934 15.969 7.66407 14.8555L21.1641 5.82526C23.183 4.47477 25.817 4.47477 27.8359 5.82525L41.3359 14.8555C43.0007 15.969 44 17.8398 44 19.8426V41.0274C44 42.132 43.1046 43.0274 42 43.0274H27.5262C26.4216 43.0274 25.5262 42.132 25.5262 41.0274V31.1904C25.5262 30.0858 24.6308 29.1904 23.5262 29.1904H17.263C16.1585 29.1904 15.263 30.0858 15.263 31.1904V41.0274C15.263 42.132 14.3676 43.0274 13.263 43.0274H7C5.89543 43.0274 5 42.132 5 41.0274V19.8426ZM32.5065 24.1595C33.6111 24.1595 34.5065 23.264 34.5065 22.1595V21.1285C34.5065 20.024 33.6111 19.1285 32.5065 19.1285H27.5263C26.4217 19.1285 25.5263 20.024 25.5263 21.1285V22.1595C25.5263 23.264 26.4217 24.1595 27.5263 24.1595H32.5065Z" fill="url(#paint0_linear_44_1985)"></path>
         <defs>
            <linearGradient id="paint0_linear_44_1985" x1="5" y1="12.9999" x2="47.2778" y2="26.2177" gradientUnits="userSpaceOnUse">
               <stop stop-color="#FEDD84"></stop>
               <stop offset="1" stop-color="#CD9047"></stop>
            </linearGradient>
         </defs>
      </svg>
      <span >Trung tâm mua sắm</span>
   </div>
   <div  class="tabbar__container-item">
      <svg  width="48" height="48" viewBox="0 0 46 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
         <path d="M16.7565 36.3825C17.283 36.3825 17.7817 36.4775 18.2528 36.6677C18.7158 36.8529 19.1388 37.1224 19.4994 37.4619C19.8598 37.8016 20.1368 38.2021 20.3306 38.6635C20.5247 39.1254 20.6216 39.6143 20.6216 40.1303C20.6216 40.6461 20.5247 41.1352 20.3306 41.5966C20.1366 42.0584 19.8596 42.4589 19.4994 42.7982C19.1393 43.1375 18.7236 43.4094 18.2527 43.6129C17.7817 43.8168 17.2831 43.9184 16.7565 43.9184C16.2025 43.9184 15.6969 43.8168 15.2396 43.6129C14.7865 43.412 14.3719 43.1364 14.0137 42.7982C13.6534 42.4589 13.3764 42.0583 13.1826 41.5966C12.9885 41.135 12.8916 40.6461 12.8916 40.1303C12.8916 39.6143 12.9885 39.1252 13.1826 38.6635C13.3707 38.2104 13.6539 37.801 14.0137 37.4619C14.3692 37.1258 14.7848 36.8566 15.2396 36.6677C15.6969 36.4775 16.2025 36.3825 16.7565 36.3825ZM34.0452 36.4642C34.5716 36.4642 35.0772 36.559 35.5619 36.7487C36.0467 36.939 36.4623 37.2039 36.8086 37.5432C37.1549 37.8829 37.4319 38.2836 37.6399 38.745C37.8478 39.2069 37.9515 39.6952 37.9515 40.2112C37.9515 40.7278 37.8477 41.2162 37.6399 41.6779C37.4319 42.1394 37.1549 42.5402 36.8086 42.8799C36.4622 43.219 36.0466 43.4907 35.5618 43.6946C35.077 43.8981 34.5716 44 34.0452 44C33.5187 44 33.0198 43.8981 32.5489 43.6946C32.0779 43.4907 31.6692 43.219 31.323 42.8799C30.9768 42.5402 30.6996 42.1393 30.4919 41.6779C30.284 41.2161 30.1803 40.7278 30.1803 40.2111C30.1803 39.6952 30.284 39.2067 30.4919 38.745C30.6997 38.2835 30.9768 37.8829 31.323 37.5432C31.6692 37.2039 32.078 36.939 32.5489 36.7487C33.0199 36.559 33.5189 36.4642 34.0452 36.4642ZM41.027 10.988C41.8031 10.988 42.4055 11.0898 42.8348 11.2936C43.2643 11.4973 43.5692 11.7486 43.7493 12.0473C43.9292 12.3461 44.0125 12.6652 43.9985 13.0047C43.9849 13.3443 43.9362 13.636 43.853 13.8805C43.7699 14.1249 40.9022 25.7109 40.736 26.2269C40.3758 27.3131 39.9186 28.067 39.3644 28.4877C38.8104 28.9086 38.1315 29.119 37.328 29.119H15.68L16.3034 31.4493H37.0788C38.4088 31.4493 39.105 32.0068 39.0737 33.1193C39.0455 34.118 37.8961 34.6146 37.1202 34.6146H15.3435C14.7896 34.6146 14.3255 34.4926 13.9514 34.2478C13.5774 34.0035 13.2657 33.6844 13.0163 33.2908C12.763 32.8886 12.5606 32.4577 12.4137 32.0075C12.2613 31.5458 12.1437 31.1116 12.0604 30.7042C12.0328 30.5409 11.9565 30.1472 11.8319 29.5226C11.7072 28.8981 11.5548 28.1173 11.3747 27.1804L10.7722 24.0438C10.5493 22.883 10.3276 21.7221 10.1071 20.5609C9.58067 17.818 8.8147 12.0911 8.14981 8.72357H5.03274C4.61724 8.72357 4.27077 8.62171 3.99372 8.41801C3.72009 8.21805 3.48741 7.96929 3.30786 7.68478C3.07478 7.31543 3.11022 7.33612 3.06071 7.10247C2.99153 6.77671 3.00037 6.81159 3.00037 6.53974C3.00037 5.99672 3.18743 5.88253 3.56135 5.52952C3.93528 5.17651 4.44091 5 5.07826 5H9.27567C9.82987 5 10.2732 5.08131 10.6057 5.24431C10.9381 5.40746 11.2014 5.61102 11.3953 5.85533C11.5892 6.09974 11.7278 6.35775 11.811 6.62941C11.8939 6.90092 11.9635 7.13188 12.0188 7.32174C12.0742 7.53914 12.1296 7.8447 12.1851 8.23832C12.2415 8.63878 12.297 9.03938 12.3514 9.44011C12.4388 9.95535 12.5219 10.4713 12.6006 10.9879H41.027V10.988Z" fill="#9397BD"></path>
      </svg>
      <span >giỏ hàng</span>
   </div>
   <div  class="tabbar__container-item">
      <svg  width="48" height="48" viewBox="0 0 46 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
         <path d="M24 22C28.9706 22 33 17.9706 33 13C33 8.02943 28.9706 4 24 4C19.0294 4 15 8.02943 15 13C15 17.9706 19.0294 22 24 22Z" stroke="#9397BD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
         <path d="M7 35C7 30.0294 11.0294 26 16 26H32C36.9706 26 41 30.0294 41 35C41 39.9706 36.9706 44 32 44H16C11.0294 44 7 39.9706 7 35Z" stroke="#9397BD" stroke-width="2"></path>
      </svg>
      <span >Tôi</span>
   </div>
</div>
</html>

<div  class="tabbar__container" style="--495c4c83: bahnschrift;">
   <a href="{{route('index')}}" data-v-fdd12757="" class="tabbar__container-item ">
      @if(Route::currentRouteName() == 'index') 
         <img src="assets/images/dowload/home2.png">
         <span style="color:blue" data-v-fdd12757="">Trang </span>
      @else
         <img src="assets/images/dowload/home.png">
         <span data-v-fdd12757="">Trang </span>
      @endif
   </a>
   <a href="/action?stock=AAA" data-v-fdd12757="" class="tabbar__container-item">
      @if(Route::currentRouteName() == 'action') 
         <img src="assets/images/dowload/jiaoyi2.png">
         <span style="color:blue" data-v-fdd12757="">Giao Dịch </span>
      @else
         <img src="assets/images/dowload/jiaoyi.png">
         <span data-v-fdd12757="">Giao Dịch</span>
      @endif
   </a>
   <a href="{{route('agency')}}" data-v-fdd12757="" class="tabbar__container-item">
      @if(Route::currentRouteName() == 'agency') 
         <img src="assets/images/dowload/weituo2.png">
         <span style="color:blue" data-v-fdd12757="">Danh Mục </span>
      @else
         <img src="assets/images/dowload/weituo.png">
         <span data-v-fdd12757="">Danh Mục </span>
      @endif
      
   </a>
   <a href="{{route('account')}}" data-v-fdd12757="" class="tabbar__container-item ">
      @if(Route::currentRouteName() == 'account') 
         <img src="assets/images/dowload/zhanghu2.png">
         <span style="color:blue" data-v-fdd12757="">Tài Khoản </span>
      @else
      <img src="assets/images/dowload/zhanghu.png">
         <span data-v-fdd12757="">Tài Khoản</span>
      @endif

   </a>
   <a href="{{route('customer')}}" data-v-fdd12757="" class="tabbar__container-item">
      @if(Route::currentRouteName() == 'customer') 
         <img src="assets/images/dowload/my2.png">
         <span style="color:blue" data-v-fdd12757="">Tôi </span>
      @else
         <img src="assets/images/dowload/my.png">
         <span data-v-fdd12757="">Tôi</span>
      @endif
      
   </a>
</div>
@extends('layout.layout_auth')
@section('content')

  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .header-default{
      background:#3e4cf3;
      display:flex;
      justify-content:space-between;
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
    .nav-link{
       display:flex;
       flex-direction: column;
       align-items:center;
       justify-content:center;
       text-align:center;
      }

      .nav-pills .nav-link, .nav-pills .show>.nav-link{
         border: 1px solid #ccc !important;
         border-radius: 4px !important;

      }
      .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        color:#333 !important;
        background: #ebedfe !important;
        border: 2px solid #3e4cf3 !important;
        border-radius: 4px !important;
        
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
.item-payment{
   width:140px;
   border:1px solid #ccc;
   margin-right:8px;
   font-size:13px;
   border-radius:4px;
   height:auto;
   display:flex;
   align-items:center;
   justify-content:center;
   text-align: center;
   cursor: pointer;
   padding:10px 0;
}
.item-payment.active{
   border-color:#3e4cf3;
   color:#3e4cf3;
   background:#ebedfe;
}
.item-chi-tiet {
            padding: 8px;
            cursor: pointer;
            margin-right: 10px;
            padding-bottom:10px;
            color:#959595;
            font-size: 18px;
            white-space: nowrap;
        }

        /* Thêm CSS để chỉnh kiểu cho phần tử được chọn */
        .item-chi-tiet.active {
            font-weight: bold;
            color: blue;
            border-bottom:2px solid blue;

        }

        /* Thêm CSS để ẩn các menu mặc định khi trang tải */
        #menu1, #menu2,#menu3,#menu4,#menu5,#menu6 {
            display: none;
        }
        
        #menu-container::-webkit-scrollbar {
    display: none;
}



/* Ẩn thanh cuộn trong các trình duyệt không dựa trên WebKit */
#menu-container {
    overflow: -moz-scrollbars-none;
    -ms-overflow-style: none;
    scrollbar-width: none;
}
    th{
        color:#959595 !important;
        text-align: end;
    }
  </style>

    
    
    <div class="container homecontainer js-container-main" style="background:#f6f6f6">
        <div class="header-default" style="display:flex;background:#fff !important;border-bottom:1px solid #ccc">
               <a href="#" onclick="history.back()"  style="text-decoration:none;flex:1;height: 50px;">
                   <i style="color:#333"  class="icon-back bi bi-chevron-left"></i>
                </a>
                <div  style="flex:1;color:#333;display:flex;justify-content:center;align-items:center;font-size:20px;white-space:nowrap">Xác minh danh tính</div>
                <div style="flex:1;display:flex; justify-content:flex-end">
                  
                </div>
        </div>
        <div style="margin:10px 15px;color:black">Vui lòng điền đầy đủ thông tin cá nhân</div>
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Tên</span>
           
            <input class="js-name" placeholder="Vui lòng điền tên của bạn" style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="140" step="0.000000000000000001"  autocomplete="off"  class="uni-input-input">

        </div>
        
         <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Loại giấy tờ</span>
           <select name="kyc_type" class="form-control w-50 js-kyc-type">
               <?php if($kyclist != null && count($kyclist) > 0){
                   foreach ($kyclist as $item){ ?>
                       <option value="<?= $item ?>">
                           <?= $item == "1" ? "Căn cước công dân" : ($item =="2" ? "Bằng lái xe" : "Hộ chiếu") ?>
                       </option>
               <?php    }
               }
               ?>
           </select>
           

        </div>
        
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>Số điện thoại 
                <select class="js-phone-zone" name="zone" style="border:none;outline:none">
                    <option value="84">+84</option>
                    <option value="1">+1</option>
               </select>
            </span>
           
            <input class="js-phone" value="{{Auth::user()->phone ?? ""}}" placeholder="vui lòng nhập sđt" style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off" type="text" class="uni-input-input">

        </div>
        
        <div style="padding:15px;margin:10px;background-color:#fff;display:flex;justify-content:space-between">
           <span>ID Giấy tờ</span>
           
            <input class="js-id" placeholder="Vui lòng điền id căn cước" style="background-color:white !important;border:none;outline:none;padding:0 !important" maxlength="140" step="0.000000000000000001" enterkeyhint="done" pattern="[0-9]*" autocomplete="off"  class="uni-input-input">

        </div>
        
       <div style="margin:10px 15px;color:black">Tải lên mặt trước giấy tờ</div>
<div>
    <div class="mb-4 d-flex justify-content-center">
        <img id="selectedImage1" src="assets/images/dowload/certificate_front.png"
        alt="example placeholder" style="width: 300px;max-height:200px;object-fit:contain" />
    </div>
    <div class="d-flex justify-content-center">
        <div data-mdb-ripple-init class="btn btn-primary btn-rounded" style="padding:4px !important">
            <label class="form-label text-white m-1"  for="customFile1">chọn ảnh</label>
            <input name="image-front" type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage1')" />
        </div>
    </div>
</div>

<div style="margin:10px 15px;color:black">Tải lên mặt sau giấy tờ</div>
<div>
    <div class="mb-4 d-flex justify-content-center">
        <img id="selectedImage2" src="assets/images/dowload/certificate_front.png"
        alt="example placeholder" style="width: 300px;max-height:200px;object-fit:contain" />
    </div>
    <div class="d-flex justify-content-center">
        <div data-mdb-ripple-init class="btn btn-primary btn-rounded" style="padding:4px !important">
            <label class="form-label text-white m-1 " for="customFile2">chọn ảnh</label>
            <input  name="image-back" type="file" class="form-control d-none" id="customFile2" onchange="displaySelectedImage(event, 'selectedImage2')" />
        </div>
    </div>
</div>
       
         <div class="mt-4" style="margin-left:10px;margin-right:10px">
           <button type="button" style="width:100%" class="btn btn-primary js-change-kyc">Xác nhận thay đổi</button>
       </div>
        
       
     
    
   
    </div>
   
@endsection
@section('script')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


$(".js-change-kyc").click(function(){
    let $name = $('.js-name').val();
    let $zone = $('.js-phone-zone').val();
    let $phone = $('.js-phone').val();
    let $id = $('.js-id').val();
    let $imageFront = $('#customFile1').val();
    let $imageBack = $('#customFile2').val();

    if($name === "" || $zone === "" || $phone === "" || $id === "" || $imageFront === "" || $imageBack === ""){
        toastr.error("Vui lòng nhập đủ thông tin và tải lên cả hai mặt giấy tờ.");
    } else {
        let formData = new FormData();
        formData.append('name', $name);
        formData.append('zone', $zone);
        formData.append('phone', $phone);
        formData.append('id', $id);
        formData.append('image_front', $('#customFile1')[0].files[0]);
        formData.append('image_back', $('#customFile2')[0].files[0]);
        formData.append('kyc_type',$('.js-kyc-type').val());
        formData.append('_token', $('#csrf').val());

        $.ajax({
            url: '/updateKyc',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status){
                    toastr.success(res.message);
                    window.location.href = '/info';
                } else {
                    toastr.error(res.message);
                }
            },
            error: function(){
                toastr.error("Có lỗi xảy ra, vui lòng thử lại.");
            }
        });
    }
});

</script>


  @endsection

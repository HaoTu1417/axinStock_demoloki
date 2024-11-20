@extends('layout.layout_panner')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
   integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
   .wordWrap{
   word-wrap: break-word;
   min-width: 100px;
   max-width: 350px;
   }
   .js-item-his.active{
       display:block !important;
   }
</style>
@endsection
@section('main_content')
<div class="row">
   <div class="col-lg-12">
      <div>
         <div id="teamlist">
            <div class="team-list row list-view-filter" id="team-member-list">
               @foreach($wallets as $each)
                <div class="col">
                  <div class="card team-box">
                     <div class="card-body p-4 item-his">
                        <div class="row align-items-center team-row">
                           
                           <div class="col-lg-4 col">
                              <div class="team-profile-img">
                                 <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0" style="background-color:{{$each->color}};color:white;display:flex;align-items:center;justify-content:center">{{$each->n}}</div>
                                 <div class="team-content">
                                    <a class="member-name" data-bs-toggle="offcanvas" href="#member-overview" aria-controls="member-overview">
                                       <h5 class="fs-16 mb-1">{{$each->customer->username}}</h5>
                                    </a>
                                    <p class="text-muted member-designation mb-0">{{$each->customer->email}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-2 col">
                              <div class="row text-muted text-center">
                                 <div class="col-12 border-end border-end-dashed">
                                    <h5 class="mb-1 projects-num">{{$each->time_day}}</h5>
                                    <p class="text-muted mb-0">Số ngày đã gửi</p>
                                 </div>
                                 
                              </div>
                           </div>
                           <div class="col-lg-4 col">
                              <div class="row text-muted text-center">
                                 <div class="col-6 border-end border-end-dashed">
                                    <h5 class="mb-1 projects-num">{{number_format($each->deposit_money, 0, ',', '.')}}</h5>
                                    <p class="text-muted mb-0">Số tiền trong ví</p>
                                 </div>
                                 <div class="col-6">
                                    <h5 class="mb-1 projects-num">{{number_format($each->profit_total, 0, ',', '.')}}</h5>
                                    <p class="text-muted mb-0">Tổng số tiền lãi</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-2 col">
                              <div class="text-end">                               
                              <a href="#" class="js-show-his btn btn-light view-btn">Xem lịch sử</a>                            
                              </div>
                           </div>
                        </div>
                        <div class="row align-items-center team-row js-item-his" style="display:none;max-height:400px;overflow:auto;">
                            <table class="table table-striped table-bordered" style="border-radius:8px;margin-top:20px">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>Loại</th>
                                        <th>Số tiền</th>
                                        <th>Số dư mới</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($each->historys as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if($item->type == 1)
                                                    <span style="color:green">Nạp </span>
                                                @elseif($item->type ==2)
                                                    <span style="color:red">Rút </span>
                                                @else
                                                    <span style="color:orange">Rút lãi n</span>
                                                @endif
                                            </td>
                                            <td>{{ number_format($item->money, 0, ',', '.') }} VND</td>
                                            <td>
                                                Số dư ví: <strong>{{ number_format($item->wallet_money, 0, ',', '.') }} VND</strong><br>
                                                Số dư tài khoản: <strong>{{ number_format($item->cus_money, 0, ',', '.') }} VND</strong><br>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
              @if(count($wallets) > 0 )
                {{ $wallets->links() }}
             @endif
         </div>
                       @if(count($wallets) == 0 )

         <div class="py-4 mt-4 text-center" id="noresult" style="display: none;">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
            <h5 class="mt-4">Sorry! No Result Found</h5>
         </div>
         @endif
       
      </div>
   </div>
   <!-- end col -->
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-show-his').on('click', function(e) {
                e.preventDefault();
                
                var closestItemHis = $(this).closest('.item-his');
                
                closestItemHis.find('.js-item-his').toggleClass('active');
            });
        });
    </script>
@endsection
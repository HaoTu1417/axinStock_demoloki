@extends('layout.layout_admin')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
    integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .wordWrap {
        word-wrap: break-word;
        min-width: 100px;
        max-width: 350px;
    }
</style>
@endsection
@section('main_content')
<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-6 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(229)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-shield-user-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$customer}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(230) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-file-user-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$kyc_new}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(231) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-5-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$online}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->


                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(79) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-home-8-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$ref}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(232)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-percent-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="">{{$fee}}</span>%</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(294)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-money-dollar-circle-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="">{{number_format($totalHD)}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->

            </div><!-- end card body -->

        </div><!-- end card -->
        <div class="row">
    
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-6 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(233) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-wallet-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$pay}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(234) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-safe-2-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$withdraw}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(235) </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-briefcase-4-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$loan}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->


                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(236)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-error-warning-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$report}}</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(237)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class=" ri-refund-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span>{{$wallet}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">@lang(295)</h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-money-dollar-circle-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="">{{number_format($totalDebt)}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

            </div><!-- end card body -->

        </div><!-- end card -->
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title mb-0 flex-grow-1">@lang(297)</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <select class="form-select" id="sltReportDebt">
                            <option value="0">@lang(298)</option>
                            <option value="1">@lang(299)</option>
                            <option value="2">@lang(300)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>@lang(52)</th>
                            <th>@lang(53)</th>
                            <th>@lang(54)</th>
                            <th>@lang(56)</th>
                        </tr>
                    </thead>
                    <tbody id="tBodyReportDebt">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">@lang(238)</h4>
                </div>
                <div class="card-body">
                    <canvas id="bar" class="chartjs-chart"
                        data-colors="[&quot;--vz-primary-rgb, 0.8&quot;, &quot;--vz-primary-rgb, 0.9&quot;]" width="485"
                        height="242"
                        style="display: block; box-sizing: border-box; height: 282px; width: 485px;"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
    </div><!-- end col -->
</div>

<div class="row">
    <div class="col-xl-6 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">@lang(239)</p>
                    </div>
                    <div class="flex-shrink-0">
                        @if($payGrowthRate >= 0 )
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +{{$payGrowthRate}} %
                        </h5>
                        @else
                        <h5 class="text-danger fs-14 mb-0">
                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i> {{$payGrowthRate}} %
                        </h5>
                        @endif
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="text-success">{{number_format($totalPayDay, 0, ',', '.')}}</span></h4>
                        <!--<a href="/manager/transfer?type=1" class="text-decoration-underline">Xem lịch sử</a>-->
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class=" bg-success-subtle rounded fs-3">
                            <i class="bx bx-dollar-circle text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">@lang(240)</p>
                    </div>
                    <div class="flex-shrink-0">
                        @if($withdrawGrowthRate >= 0 )
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +{{$withdrawGrowthRate}} %
                        </h5>
                        @else
                        <h5 class="text-danger fs-14 mb-0">
                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i> {{$withdrawGrowthRate}} %
                        </h5>
                        @endif
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                class="text-danger">{{number_format($totalWithdrawDay, 0, ',', '.')}}</span></h4>
                        <!--<a href="/manager/transfer?type=2" class="text-decoration-underline">Xem lịch sử</a>-->
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="bg-primary-subtle rounded fs-3">
                            <i class="bx bx-dollar-circle text-danger"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->



</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">@lang(241)</h4>
            </div>
            <div class="card-body">
                <canvas id="lineChart" class="chartjs-chart"
                    data-colors="[&quot;--vz-primary-rgb, 0.2&quot;, &quot;--vz-primary&quot;, &quot;--vz-success-rgb, 0.2&quot;, &quot;--vz-success&quot;]"
                    width="485" height="242"
                    style="display: block; box-sizing: border-box; height: 242px; width: 485px;"></canvas>
            </div>
        </div>
    </div> <!-- end col -->


</div>
<input type="text" value="@lang('244')" id="txtLuongDangKy" hidden />
<input type="text" value="@lang('245')" id="txtNaptien" hidden />
<input type="text" value="@lang('246')" id="txtRutTien" hidden />
@endsection
@section('scripts')





<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
    integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate last 30 days



    let $labelLIne = {!! json_encode($labelLine)!!};

    let $datalinePay = {!! json_encode($payData)!!};

    let $withdrawData = {!! json_encode($withdrawData)!!};

    let $labelBar = {!! json_encode($LabelBar)!!};

    let $customerBar = {!! json_encode($customerBar)!!};


    console.log($labelBar, $customerBar);
    $('#sltReportDebt').change(function(){
        var type = $(this).val();
        report(type);
    })
    report(0);
    
    function report(type){
        $.ajax({
            url : '/manager/debtreport',
            type:'get',
            data:{
                type: type
            },
            success: function(res){
                var html = '<tr><td>'+res.t1+'</td><td>'+res.t2+'</td><td>'+res.t3+'</td><td>'+res.t4+'</td></tr>';
                $('#tBodyReportDebt').html(html);
            }
        })
    }


    // Line Chart for deposit/withdrawal
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: $labelLIne,
            datasets: [
                {
                    label: $('#txtNaptien').val(),
                    data: $datalinePay,
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: $('#txtRutTien').val(),
                    data: $withdrawData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                tooltip: {
                    enabled: true
                }
            },
            hover: {
                mode: 'index',
                intersect: false,
                onHover: function (event, chartElement) {
                    event.native.target.style.cursor = chartElement[0] ? 'pointer' : 'default';
                }
            }
        }
    });

    // Bar Chart for new registrations
    const ctxBar = document.getElementById('bar').getContext('2d');
    const barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: $labelBar,
            datasets: [{
                label: $('#txtLuongDangKy').val(),
                data: $customerBar,
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1,
                hoverBackgroundColor: 'rgba(0, 123, 255, 0.7)',
                hoverBorderColor: 'rgba(0, 123, 255, 1)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    enabled: true
                }
            },
            hover: {
                onHover: function (event, chartElement) {
                    event.native.target.style.cursor = chartElement[0] ? 'pointer' : 'default';
                }
            }
        }
    });
        });

</script>


@endsection
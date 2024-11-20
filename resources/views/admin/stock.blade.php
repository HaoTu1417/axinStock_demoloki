@extends('layout.layout_admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.css"
        integrity="sha512-CcTkIsZd9q6wsVUGBewW5P1uXFcuI6mAsjEn+T+TJKLebXneMQPj1GpwU9O/dkajlHJj/40UBugBAcWN+eFo+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @lang(108)
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>@lang(33)</label>
                            <select class="form-select" id="sltStatus">
                                <option value="0">Hoạt động</option>
                                <option value="-1">Dừng hoạt động</option>
                            </select>
                        </div>
                      
                    </div>
                    <table class="table table-bordered" id="tblTransferList">
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div id="modaulShowUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog" style="max-width:700px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Chỉnh sửa cổ phiếu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden class="form-control" id="txtHiddenId" />
                    
                    <div class="form-group mb-2 row">
                        <div class="col-6">
                            <label class="form-label">Mã cổ phiếu</label>
                            <input type="text" class="form-control" id="txtStock" readonly />
                        </div>
                         <div class="col-6">
                            <label class="form-label">Mã Sàn</label>
                            <input type="text" class="form-control" id="txtExchange" readonly />
                        </div>
                    </div>
                     <div class="form-group mb-2 row">
                        <div class="col-4">
                            <label class="form-label">Giá trần</label>
                            <input type="text" class="form-control" id="txtC"  />
                        </div>
                         <div class="col-4">
                            <label class="form-label">Giá sàn</label>
                            <input type="text" class="form-control" id="txtF"  />
                        </div>
                          <div class="col-4">
                            <label class="form-label">Giá tc</label>
                            <input type="text" class="form-control" id="txtR"  />
                        </div>
                     
                    </div>
                       <div class="form-group mb-2 row">
                         <div class="col-4">
                            <label class="form-label">Giá Mở cửa</label>
                            <input type="text" class="form-control" id="txtO"  />
                        </div>
                         <div class="col-4">
                            <label class="form-label">Giá Ot</label>
                            <input type="text" class="form-control" id="txtOt"  />
                        </div>
                          <div class="col-4">
                            <label class="form-label">Khối lượng</label>
                            <input type="text" class="form-control" id="txtLot"  />
                        </div>
                     
                    </div>
                        <div class="form-group mb-2 row">
                         <div class="col-12 mb-2">
                            <label class="form-label">Giá Hiện tại</label>
                            <input type="text" class="form-control" id="txtLastPrice"  />
                        </div>
                         <div class="col-3">
                            <label class="form-label">Giá Trung bình</label>
                            <input type="text" class="form-control" id="txtAvePrice"  />
                        </div>
                         <div class="col-3">
                            <label class="form-label">Thay đổi</label>
                            <input type="text" class="form-control" id="txtChangePc"  />
                        </div>
                         <div class="col-3">
                            <label class="form-label">Giá cao nhất</label>
                            <input type="text" class="form-control" id="txtHighPrice"  />
                        </div>
                          <div class="col-3">
                            <label class="form-label">Giá thấp nhất</label>
                            <input type="text" class="form-control" id="txtLowPrice"  />
                        </div>
                        
                     
                    </div>
                    
                      
                   
                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang(95)</button>
                    <button type="button" class="btn btn-primary" id="btnChangeUserInfor">@lang(126)</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <input type="text" id="csrf" hidden value="{{ csrf_token() }}" />
@endsection
@section('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.min.js" integrity="sha512-LLsvn7RXQa0J/E40ChF/6YAf2V9PJuLGG1VeuZhMlWp+2yAKj98A1Q1lsChkM9niWqY0gCkvHvpzqQOFEfpxIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"
        integrity="sha512-lsdhisF0ecOfmcKWuClZj9aIMVQe8x8FuoFT2PGqNmoObSYQ2p304H4vSL45ZAX6+fLDCqtepKYzGl+kP+L9EQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function toggleStatus(button) {
            if (button.classList.contains('btn-primary')) {
                let id = button.getAttribute('data-id');
                 $.ajax({
                    url: '/manager/stockStatus',
                    type: 'post',
                    data: {
                                            _token: $('#csrf').val(),
                        status: 1,
                      id: id
                    },
                    success: function(res) {
                        alert('Update success');
                          button.classList.remove('btn-primary');
                button.classList.add('btn-danger');
                button.textContent = 'Dừng hoạt động';
                    }
                  });
       
            } else {
                 let id = button.getAttribute('data-id');
                  $.ajax({
                    url: '/manager/stockStatus',
                    type: 'post',
                    data: {
                                            _token: $('#csrf').val(),
                        status: 0,
                      id: id
                    },
                    success: function(res) {
                        alert('Update success');
                         button.classList.remove('btn-danger');
                button.classList.add('btn-primary');
                button.textContent = 'Hoạt động';
                    }
                  });
      
            }
        }
       function toggleAdjustmentStatus(button) {
            if (button.classList.contains('btn-primary')) {
                let id = button.getAttribute('data-id');
                  $.ajax({
                    url: '/manager/stockStatusUpdate',
                    type: 'post',
                    data: {
                                            _token: $('#csrf').val(),
                        status: 1,
                      id: id
                    },
                    success: function(res) {
                        alert('Update success');
                        button.classList.remove('btn-primary');
                        button.classList.add('btn-warning');
                        button.textContent = 'Can thiệp';
                    }
                  });
              
            } else {
                 let id = button.getAttribute('data-id');
                  $.ajax({
                    url: '/manager/stockStatusUpdate',
                    type: 'post',
                    data: {
                                            _token: $('#csrf').val(),
 status: 0,
                      id: id
                    },
                    success: function(res) {
                        alert('Update success');
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-primary');
                        button.textContent = 'Tự động';
                    }
                  });
              
            }
        }

        $(document).ready(function() {
            list();
            console.log(1);
            
            setInterval(function(){
                list();
            }, 300000);
            $('#sltStatus').change(function(){
                 list();
            });
              $('#btnChangeUserInfor').click(function () {
    // Lấy các giá trị từ các trường input
    let id = $('#txtHiddenId').val();
    let stock = $('#txtStock').val();
    let exchange = $('#txtExchange').val();
    let c = $('#txtC').val();
    let f = $('#txtF').val();
    let r = $('#txtR').val();
    let o = $('#txtO').val();
    let ot = $('#txtOt').val();
    let lot = $('#txtLot').val();
    let avePrice = $('#txtAvePrice').val();
    let changePc = $('#txtChangePc').val();
    let highPrice = $('#txtHighPrice').val();
    let lowPrice = $('#txtLowPrice').val();
    let lastPrice = $('#txtLastPrice').val();

    // Kiểm tra xem tất cả các giá trị có phải là số hay không
    if (
        !$.isNumeric(id) ||
        !$.isNumeric(c) ||
        !$.isNumeric(f) ||
        !$.isNumeric(lastPrice) ||
        !$.isNumeric(r) ||
        !$.isNumeric(o) ||
        !$.isNumeric(ot) ||
        !$.isNumeric(lot) ||
        !$.isNumeric(avePrice) ||
        !$.isNumeric(changePc) ||
        !$.isNumeric(highPrice) ||
        !$.isNumeric(lowPrice)
    ) {
        alert('Tất cả các giá trị phải là số!');
        return; // Dừng lại nếu có giá trị không phải số
    }

    // Gửi yêu cầu AJAX nếu tất cả các giá trị đều là số
    $.ajax({
        url: '/manager/updateStockData',
        type: 'post',
        data: {
            _token: $('#csrf').val(),
            id: id,
            stock: stock,
            exchange: exchange,
            c: c,
            f: f,
            r: r,
            o: o,
            ot: ot,
            lot: lot,
            avePrice: avePrice,
            changePc: changePc,
            highPrice: highPrice,
            lowPrice: lowPrice,
            lastPrice: lastPrice,
        },
        success: function (res) {
            if (res.status) {
                $('#modaulShowUser').modal('hide');
                alert(res.message);
                list();
            } else {
                alert(res.message);
            }
        }
    });
});
            
            function list() {
                $.ajax({
                    url: '/manager/stockList',
                    type: 'get',
                    data: {
                      status: $('#sltStatus').val()
                    },
                    success: function(res) {
                        console.log(res);
                        $('#tblTransferList').bootstrapTable('destroy');
                        $('#tblTransferList').bootstrapTable({
                            method: 'get',
                            data: res,
                            queryParams: function(p) {
                                return {
                                    limit: p.limit,
                                    offset: p.offset,
                                };
                            },
                            striped: true,
                            sidePagination: 'client',
                            pagination: true,
                            paginationVAlign: 'bottom',
                            limit: 10,
                            pageSize: 10,
                            pageList: [10, 50, 100, 200, 500],
                            search: true,
                            showRefresh: false,
                            minimumCountColumns: 2,
                            columns: [
                                {
                                    field: 'id',
                                    title: '#',
                                    align: 'center',
                                    valign: 'middle',
                                },
                                {
                                    field: 'exchange',
                                    title: 'Sàn',
                                    align: 'center',
                                    valign: 'middle',
                                },
                                // {
                                //     field: 'customer_id',
                                //     title: 'UID',
                                //     align: 'center',
                                //     valign: 'middle'
                                // },
                                {
                                    field: 'stock',
                                    title: 'Tên cổ phiếu',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                        return  value;
                                    }
                                },
                                {
                                    field: 'mc',
                                    title: 'Thông số',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                        //  console.log(row.mc);
                                            return 'Giá trần: <span class="badge bg-success"> '+ row.c +'</span><br>'
                                            + 'Giá sàn: <span class="badge bg-success"> '+ row.f +'</span><br>'
                                            + 'Giá tc: <span class="badge bg-success"> '+ row.r +'</span><br>'
                                            + 'Giá mở cửa: <span class="badge bg-success">'+ row.o +'</span><br>'
                                            + 'Giá ot: <span class="badge bg-success"> '+ row.ot +'</span><br>'
                                            + 'Khối lượng: <span class="badge bg-success"> '+ accounting.formatNumber(row.lot) +'</span><br>'
                                    
                                      
                                    }
                                },
                                     {
                                    field: 'c',
                                    title: 'Biến động',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                     
                                            return 'Giá trung bình: <span class="badge bg-info"> '+ row.avePrice +'</span><br>'
                                            + 'Thay đổi: <span class="badge bg-info"> '+ row.changePc +'</span><br>'
                                            + 'Giá cao nhất: <span class="badge bg-info"> '+ row.highPrice +'</span><br>'
                                            + 'Giá thấp nhất: <span class="badge bg-info">'+ row.lowPrice +'</span><br>'
                                            + 'Giá hiện tại: <span class="badge bg-info">'+ row.lastPrice +'</span><br>';

                                      
                                    }
                                },
                                     {
                                    field: 'status',
                                    title: 'Trang thái',
                                    align: 'center',
                                    valign: 'middle',
                                     formatter: function(value, row, index){
                                         let string = '';
                                            if (value == 0) {
                                                string += `
                                                    Trạng thái giao dịch: 
                                                    <button data-id="${row.id}" class="btn btn-primary mb-2" onclick="toggleStatus(this)">Hoạt động</button><br>
                                                `;
                                            } else {
                                                string += `
                                                    Trạng thái giao dịch: 
                                                    <button data-id="${row.id}" class="btn btn-danger mb-2" onclick="toggleStatus(this)">Dừng hoạt động</button><br>
                                                `;
                                            }
                                            
                                           if (row.status_update == 0) {
                                                string += `
                                                    Trạng thái điều chỉnh: 
                                                    <button data-id="${row.id}" class="btn btn-primary" id="status_update_${row.id}" onclick="toggleAdjustmentStatus(this)">Tự động</button><br>
                                                `;
                                            } else {
                                                string += `
                                                    Trạng thái điều chỉnh: 
                                                    <button data-id="${row.id}" class="btn btn-warning " id="status_update_${row.id}" onclick="toggleAdjustmentStatus(this)">Can thiệp</button><br>
                                                `;
                                            }
                                          return string;
                                      
                                    }
                                },
                               
                                {
                                    field: 'update_at',
                                    title: 'Cập nhật',
                                    align: 'center',
                                    valign: 'middle'
                                },
                                   {
                                    field: 'Id',
                                    title: '@lang(187)',
                                    align: 'center',
                                    valign: 'middle',
                                    formatter: function(value, row, index) {
                                         let html ='';
                                         
                                        html += '<a href="javascript:;" class="btnDetail"><i class="ri-pencil-fill align-bottom text-muted"></i></a>';
                                        
                                      
                                            return html;
                                           
                                      
                                    },
                                    events: {
                                        'click .btnDetail': function(e, v, r, i) {
                                            let $statusUpdate = $(`#status_update_${r.id}`);
                                            if($statusUpdate.hasClass('btn-primary')){
                                                alert('Yêu cầu cập nhật trạng thái can thiệp');
                                            }else{
                                                $('#txtHiddenId').val(r.id);
                                                $('#txtStock').val(r.stock);
                                                $('#txtExchange').val(r.exchange);
                                                $('#txtC').val(r.c);
                                                $('#txtF').val(r.f);
                                                $('#txtR').val(r.r);
                                                $('#txtO').val(r.o);
                                                $('#txtOt').val(r.ot);
                                                $('#txtLot').val(r.lot);
                                                $('#txtAvePrice').val(r.avePrice);
                                                $('#txtChangePc').val(r.changePc);
                                                $('#txtHighPrice').val(r.highPrice);
                                                $('#txtLowPrice').val(r.lowPrice);
                                                $('#txtLastPrice').val(r.lastPrice);

                                                $('#modaulShowUser').modal('show');
                                            
                                            }
                                        }
                                        
                                    }
                                },
                               
                            ],
                            onLoadSuccess: function(data) {

                            }
                        })
                    }
                });
            }
        })
        
       
    </script>
@endsection


                <div class="table-container">
                    <div class="table-header">
                        <div class="table-cell">@lang(46)</div>
                        <div class="table-cell">@lang(47)</div>
                        <div class="table-cell">@lang(48)</div>
                        <div class="table-cell">@lang(49)</div>
                        <div class="table-cell">@lang(50)</div>
                        <div class="table-cell"></div>
                    </div>
                   <?php if ($data != null && count($data) > 0) {
                        foreach ($data as $item) { ?>
                         
                            <div class="item-data mt-3" style="border-radius:8px; border:1px solid #ccc">
                                <div class="table-row">
                                    <div class="table-cell">{{ $item['created_at']}}</div>
                                    <div class="table-cell">{!! $item['type_html'] !!}</div> 
                                    <div class="table-cell" style="color:orange">{{ number_format($item['deposit'], 0, ',', '.') }} VND</div>
                                    <div class="table-cell">{{ number_format($item['money'], 0, ',', '.') }} VND</div>
                                    <div class="table-cell">{{ $item['percent'] }}%</div>
                                    <div class="table-cell"><a href="javascript:;" class="btnShowDetailHD" data-id="{{ $item['id'] }}">@lang(280)</a></div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                

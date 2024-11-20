
                <div class="table-container">
                    <div class="table-header">
                        <div class="table-cell">@lang(57)</div>
                        <div class="table-cell">@lang(58)</div>
                        <div class="table-cell">@lang(59)</div>
                        <div class="table-cell">@lang(60)</div>
                        <div class="table-cell">Tổng vốn</div>
                        <div class="table-cell">@lang(61)</div>
                        <div class="table-cell">Lãi lỗ</div>

                    </div>
                    <?php if ($listStock != null && count($listStock) > 0) {
                        foreach ($listStock as $item) { ?>
                            <div class="item-data mt-3 js-show-detail" style="border-radius:8px; border:1px solid #ccc">
                                <div class="table-row">
                                    <div class="table-cell"
                                        style="color:<?= $item['o'] > 0 ? 'green' : ($item['o'] == 0 ? 'orange' : 'red') ?>">
                                        <?= $item['sym'] ?> <i
                                            class="bi bi-caret-<?= $item['o'] > 0 ? 'up' : 'down' ?> "
                                            style="margin-left:4px"></i></div>
                                    
                                    <div class="table-cell"><?= $item['ptb'] / 1000 ?></div>
                                    <div class="table-cell"><?= $item['ptt'] ?></div>
                                    <div class="table-cell"><?= number_format($item['t']) ?></div>
                                     <div class="table-cell">
                                            <span
                                                style="font-weight:bold"><?= number_format($item['t'] * $item['ptb']) ?></span>
                                        </div>
                                    <div class="table-cell"><span
                                            class="badge badge-<?= $item['o'] > 0 ? 'success' : ($item['o'] == 0 ? 'warning' : 'danger') ?>"><?= $item['o'] > 0 ? '+' : '' ?><?= $item['o'] ?>%</span>
                                            
                                    
                                    </div>
                                     <div class="table-cell">
                                            <span
                                                style="font-weight:bold;color:<?= $item['i'] > 0 ? 'green' : ($item['i'] == 0 ? 'orange' : 'red') ?>"><?= number_format($item['i']) ?></span>
                                        </div>       
                                </div>
                                <div class="detail-info"
                                    style="padding:10px;display:none">
                                    <div class=""
                                        style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;display:flex;justify-content:space-between">
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>@lang(62)</span>
                                            <span
                                                style="font-weight:bold"><?= number_format($item['t'] * $item['ptb']) ?></span>
                                        </div>
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>@lang(63)</span>
                                            <span
                                                style="font-weight:bold"><?= number_format($item['t'] * $item['ptt'] * 1000) ?></span>
                                        </div>
                                        <div class=""
                                            style="width:32%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                                            <span>@lang(64)</span>
                                            <span
                                                style="font-weight:bold;color:<?= $item['i'] > 0 ? 'green' : ($item['i'] == 0 ? 'orange' : 'red') ?>"><?= number_format($item['i']) ?></span>
                                        </div>
                                    </div>
                                    <div class=" mt-3" style="width:100%;display:flex;justify-content:space-between">
                                        <div
                                            style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:48%;">
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span style="color:#333">@lang(65)</span>
                                                <div style="color:black;font-weight:bold"><?= number_format($item['t']) ?></div>
                                            </div>
                                            <div style="display:flex;justify-content:space-between;width:100%">
                                                <span style="color:#333">@lang(66)</span>
                                                <div style="color:black;font-weight:bold"><?= number_format($item['a']) ?></div>
                                            </div>
                                        </div>

                                        <div style="width:48%;display:flex;flex-direction:column;justify-content:space-between">
                                            <!-- <div style="background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:100%;">
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">KL khác</span>
                                                    <div style="color:black;font-weight:bold">0</div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">CPCT/Thưởng</span>
                                                    <div style="color:black;font-weight:bold">0</div>
                                                </div>

                                            </div> -->

                                            <div
                                                style="margin-top:8px;background-color:#f3f6f9;padding:8px;border-radius:4px 8px;width:100%">
                                                <div style="font-weight:bold">@lang(67)</div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">@lang(68)</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t0']) ?>
                                                    </div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">@lang(69)</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t1']) ?>
                                                    </div>
                                                </div>
                                                <div style="display:flex;justify-content:space-between;width:100%">
                                                    <span style="color:#333">@lang(70)</span>
                                                    <div style="color:black;font-weight:bold"><?= number_format($item['t2']) ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                        
                                        <a style="width:100%;font-size:14px" class="mt-3 btn btn-danger js-sell-stock-cus"
                                            data-customer="{{$customer_id}}" data-q="{{$item['a']}}" data-a="{{$item['ptt']}}" data-stock="<?= $item['sym'] ?>">
                                            @lang(261)
                                            @csrf
                                            </a>

                                    <!--</div>-->
                                </div>
                            </div>
                        <?php }
                    } ?>

                </div>
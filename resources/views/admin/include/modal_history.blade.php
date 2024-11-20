<ul class="nav nav-tabs" id="historyTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1-content" type="button" role="tab" aria-controls="tab1-content" aria-selected="true">Giao dịch số dư</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2-content" type="button" role="tab" aria-controls="tab2-content" aria-selected="false">Giao dịch phí quản lý</button>
    </li>
</ul>

<!-- Tab Content Container -->
<div class="tab-content" id="historyTabContent">
    <!-- Tab 1 Content -->
    <div class="tab-pane fade show active" id="tab1-content" role="tabpanel" aria-labelledby="tab1-tab">
        <div class="table-container">
            <div class="table-header">
                <div class="table-cell">@lang(104)</div>
                <div class="table-cell">@lang(89)</div>
                <div class="table-cell">@lang(105)</div>
                <div class="table-cell">@lang(90)</div>
                <div class="table-cell">@lang(92)</div>
            </div>
            <div style="max-height:600px; overflow:auto">
                @if($data != null && count($data) > 0)
                    @foreach($data as $item) <!-- Filter data for Tab 1 -->
                    @if($item->type != 1 )
                        <div class="item-data mt-3" style="border-radius:8px; border:1px solid #ccc">
                            <div class="table-row">
                                <div class="table-cell" style="color:blue">{{ number_format($item->befores, 0, ',', '.') }} VND</div>
                                <div class="table-cell" style="color:orange">{{ $item->befores > $item->afters ? '-' : '+' }} {{ number_format($item->money, 0, ',', '.') }} VND</div>
                                <div class="table-cell" style="color:green">{{ number_format($item->afters, 0, ',', '.') }} VND</div>
                                <div class="table-cell">{{ $item->created_at }}</div>
                                <div class="table-cell">{{session('language') == 'vi' ? $item->note : $item->note_trans}}</div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Tab 2 Content -->
    <div class="tab-pane fade" id="tab2-content" role="tabpanel" aria-labelledby="tab2-tab">
        <div class="table-container">
            <div class="table-header">
                <div class="table-cell">@lang(104)</div>
                <div class="table-cell">@lang(89)</div>
                <div class="table-cell">@lang(105)</div>
                <div class="table-cell">@lang(90)</div>
                <div class="table-cell">@lang(92)</div>
            </div>
            <div style="max-height:600px; overflow:auto">
                @if($data != null && count($data) > 0)
                    @foreach($data as $item) <!-- Filter data for Tab 2 -->
                    @if($item->type == 1 )

                        <div class="item-data mt-3" style="border-radius:8px; border:1px solid #ccc">
                            <div class="table-row">
                                <div class="table-cell" style="color:blue">{{ number_format($item->befores, 0, ',', '.') }} VND</div>
                                <div class="table-cell" style="color:orange">{{ $item->befores > $item->afters ? '-' : '+' }} {{ number_format($item->money, 0, ',', '.') }} VND</div>
                                <div class="table-cell" style="color:green">{{ number_format($item->afters, 0, ',', '.') }} VND</div>
                                <div class="table-cell">{{ $item->created_at }}</div>
                                <div class="table-cell">{{session('language') == 'vi' ? $item->note : $item->note_trans}}</div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
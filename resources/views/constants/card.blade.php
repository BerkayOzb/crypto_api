@php
    $coins = App\Models\Coin::latest()->get();
@endphp
<div class="row">
    @foreach ($coins as $coin)
        <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-header d-flex">
                    <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">{{ $coin->name }}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="media align-items-center px-3 px-md-4 mb-3 mb-md-4">
                        <div class="media-body">
                            <h4 class="h3 lh-1 mb-2">{{ $coin->volume }} $</h4>
                            <p class="small text-muted mb-0">
                                {{ $coin->price }} <span
                                    class="text-success mx-1">+{{ $coin->percent_change_24h }}%</span> 24h
                            </p>
                        </div>
                    </div>

                    <div class="js-area-chart chart--points-invisible chart--labels-hidden position-relative"
                        data-series='[
                                        [
                                        {"meta":"Items","value":"{{ $coin->volume }}"},
                                        {"meta":"Items","value":"{{ $coin->percent_change_24h }}"},
                                        {"meta":"Items","value":"470"},
                                        {"meta":"Items","value":"580"},
                                        {"meta":"Items","value":"380"},
                                        {"meta":"Items","value":"600"},
                                        {"meta":"Items","value":"707"},
                                        {"meta":"Items","value":"400"},
                                        {"meta":"Items","value":"301"},
                                        {"meta":"Items","value":"530"},
                                        {"meta":"Items","value":"600"},
                                        {"meta":"Items","value":"403"},
                                        {"meta":"Items","value":"550"},
                                        {"meta":"Items","value":"400"},
                                        {"meta":"Items","value":"300"},
                                        {"meta":"Items","value":"700"},
                                        {"meta":"Items","value":"630"}
                                        ]
                                    ]'
                        data-height="115" data-high="1000" data-chart-padding='{"top": 5}' data-is-hide-area="true"
                        data-line-colors='["#8069f2"]' data-line-dasharrays='[0,0]' data-line-width='["2px","2px"]'
                        data-is-line-smooth='[false]' data-fill-opacity="1" data-fill-colors='["#8069f2"]'
                        data-stroke-dash-array-axis-y="4" data-is-show-tooltips="true"
                        data-tooltip-custom-class="chart-tooltip chart-tooltip--sections-blocked chart-tooltip__meta--text-muted small text-white text-nowrap p-2"
                        data-tooltip-currency="In Stock " data-is-show-points="true"
                        data-point-custom-class='chart__point--donut chart__point--border-xs border-primary rounded-circle'
                        data-point-dimensions='{"width":15,"height":15}'></div>
                </div>
                <div>
                    <!-- Widget -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                            <i class="gd-bar-chart icon-text d-inline-block text-primary"></i>
                        </div>
                        <div>
                            <h4 class="lh-1 mb-1">75%</h4>
                            <h6 class="mb-0">Conversion Rate</h6>
                        </div>
                        <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                    </div>
                    <!-- End Widget -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    @endforeach
</div>

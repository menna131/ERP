@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('translation.website.sidebar.Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- 1) cash card card-mode --}}
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode m-0">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title text-sm-">{{ __('translation.dashboard.cash') }}</h3>
                            <h3 class="card-title">880,000
                                <small>{{ __('translation.website.crud.EGP') }}</small>
                            </h3>
                        </div>
                        <hr class="m-0" />
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info"
                                    href="#pablo">{{ __('translation.dashboard.See your wallet') }}...</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2) debt card card-mode --}}
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode m-0">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">{{ __('translation.dashboard.debts') }}</h3>
                            <h3 class="card-title">880,000
                                <small>{{ __('translation.website.crud.EGP') }}</small>
                            </h3>
                        </div>
                        <hr class="m-0" />
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info"
                                    href="#pablo">{{ __('translation.dashboard.See all installments') }}...</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3) installments card card-mode --}}
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode m-0">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">{{ __('translation.dashboard.installments') }}</h3>
                            <h3 class="card-title">880,000
                                <small>{{ __('translation.website.crud.EGP') }}</small>
                            </h3>
                        </div>
                        <hr class="m-0" />
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info"
                                    href="#pablo">{{ __('translation.dashboard.See all installments') }}...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode card-chart mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                <h4 class="font-weight-bold">{{ __('translation.dashboard.Sales') }}</h4>
                            </div>
                        </div>
                        <div class="card_body p-3">
                            <div class="card-header card-header-primary">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="col-12 p-0">
                        <div class="card card-mode card-chart mb-1">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <div>
                                        <div>
                                            {{ __('translation.dashboard.pre-sales trans') }}: <strong
                                                class="font-weight-bold">8
                                                {{ __('translation.dashboard.invoices') }}</strong>
                                        </div>
                                        <div>
                                            {{ __('translation.dashboard.total sales price') }}: <strong
                                                class="font-weight-bold">900
                                                {{ __('translation.website.crud.EGP') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats-dashboard">
                                    <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                    <a class="text-info"
                                        href="#pablo">{{ __('translation.dashboard.see all sales') }}...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12  p-0">
                        <div class="card card-mode card-chart mt-3">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <div>
                                        <div>
                                            {{ __('translation.dashboard.pre-purchases trans') }}: <strong
                                                class="font-weight-bold">8
                                                {{ __('translation.website.sidebar.Purchases') }}</strong>
                                        </div>
                                        <div>
                                            {{ __('translation.dashboard.total purchases price') }}: <strong
                                                class="font-weight-bold">900
                                                {{ __('translation.website.crud.EGP') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats-dashboard">
                                    <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                    <a class="text-info"
                                        href="#pablo">{{ __('translation.dashboard.see all purchases') }}...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode card-chart mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                <h4 class="font-weight-bold">{{ __('translation.website.sidebar.Purchases') }}</h4>
                            </div>
                        </div>
                        <div class="card_body p-3">
                            <div class="card-header card-header-primary">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 h-25 m-0">
                    <div class="card card-mode card-chart m-0">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="font-weight-bold">{{ __('translation.products.Stock') }}</h4>
                            </div>
                            <div class="card-body p-0 w-100 d-flex justify-content-between">
                                <div class="p-3">
                                    <div class="mb-3">
                                        {{ __('translation.dashboard.total number of products') }}: <strong
                                            class="font-weight-bold">8
                                            {{ __('translation.dashboard.products') }}</strong>
                                    </div>
                                    <div>
                                        {{ __('translation.dashboard.total price of products') }}: <strong
                                            class="font-weight-bold">888
                                            {{ __('translation.website.crud.EGP') }}</strong>
                                    </div>
                                </div>
                                <div class="w-50">
                                    <table class="table table-hover">
                                        <thead class="text-info">
                                            <th class="text-center">#</th>
                                            <th>{{ __('translation.products.Product Name') }}</th>
                                            <th>{{ __('translation.products.Total Stock') }}</th>
                                        </thead>
                                        <tbody>
                                            {{-- note1 --}}
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>مرآة</td>
                                                <td>1000 قطعة</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info" href="#pablo">{{ __('translation.dashboard.see stock') }}...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 h-25 m-0">
                    <div class="card card-mode m-0">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">{{ __('translation.dashboard.expenses') }}</h3>
                            <h3 class="card-title">880,000
                                <small>{{ __('translation.website.crud.EGP') }}</small>
                            </h3>
                        </div>
                        <hr class="m-0" />
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info"
                                    href="#pablo">{{ __('translation.dashboard.See all expenses') }}...</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-mode mt-2">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">{{ __('translation.dashboard.Partners') }}</h3>
                            <h3 class="card-title">880,000
                                <small>{{ __('translation.dashboard.Partner') }}</small>
                            </h3>
                        </div>
                        <hr class="m-0" />
                        <div class="card-footer">
                            <div class="stats-dashboard">
                                <i class="fa fa-credit-card-alt text-info mr-2"></i>
                                <a class="text-info"
                                    href="#pablo">{{ __('translation.dashboard.See all partners') }}...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush

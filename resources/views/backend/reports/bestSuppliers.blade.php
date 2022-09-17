@extends('layouts.app', ['activePage' => 'bestSuppliers', 'titlePage' => __('translation.website.sidebar.bestSuppliers')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-mode">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card-header card-header-text card-header-info">
                                <div class="card-text">
                                    <h4 class="card-title ">{{__('translation.website.sidebar.bestSuppliers')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-mode  mb-3 " >
                        <div class="card-body ">
                           @include('layouts.includes.filter',['every'=>true,'from'=>true,'status'=>true,'to'=>true])
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('translation.reports.Month')}}</th>
                                        <th class="text-center">{{__('translation.reports.Supplier')}}</th>
                                        <th>{{__('translation.reports.phone')}}</th>
                                        <th>{{__('translation.reports.Total Purchases')}}</th>
                                        <th>{{__('translation.reports.Installment Purchases Ratio %')}}</th>
                                        <th>{{__('translation.reports.Cash Purchases Ratio %')}}</th>
                                        <th>{{__('translation.reports.Total Payments')}}</th>
                                        <th>{{__('translation.reports.Total debits')}}</th>
                                        <th>{{__('translation.reports.total amounts')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">ree</td>
                                        <td class="text-center">هيونداى</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                        <td>130 جنيه</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">ree</td>
                                        <td class="text-center">هيونداى</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                        <td>130 جنيه</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

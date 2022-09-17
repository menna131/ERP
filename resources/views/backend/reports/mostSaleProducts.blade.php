@extends('layouts.app', ['activePage' => 'mostSaleProducts', 'titlePage' => __('translation.website.sidebar.Most Sold Products')])

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
                                    <h4 class="card-title ">{{__('translation.website.sidebar.Most Sold Products')}}</h4>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('translation.reports.Month')}}</th>
                                        <th class="text-center">{{__('translation.reports.Product Name')}}</th>
                                        <th>{{__('translation.reports.Supplier')}}</th>
                                        <th>{{__('translation.reports.Sold Quantity')}}</th>
                                        <th>{{__('translation.website.crud.Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">ree</td>
                                        <td class="text-center">هيونداى</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>

                                        <td class="td-actions">
                                            <div class="d-flex justify-content-space-between">
                                                <a title="{{__('translation.reports.Show Top Five Products')}}" rel="tooltip" class="btn btn-info" style="margin: 0 2px 0 0;" href="{{route('products.show',2)}}">
                                                    <i class="fa fa-eye text-white" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
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

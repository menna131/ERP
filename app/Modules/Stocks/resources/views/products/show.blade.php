@extends('layouts.app', ['activePage' => 'editProduct', 'titlePage' => __('translation.products.Show Product')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title ">مرآة</h4>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="font-weight: 900;">{{__('translation.products.id')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Product Name')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Brand')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Category')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Primary Purchase Price')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Primary Sale Price')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Total Stock')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> كفة مرآة فيرنا يمين 2018</td>
                                                    <td>اكسسوارات</td>
                                                    <td>19 جنيه</td>
                                                    <td>19 جنيه</td>
                                                    <td>1900</td>
                                                    <td>1900</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title ">{{ __('translation.products.Suppliers') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="font-weight: 900;" class="text-center">{{ __('translation.website.crud.Number') }}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Supplier')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Supplier Number')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Purchase Price')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Sales Price')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Code')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Made In')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Stock')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Description')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.website.crud.Actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>اسمه</td>
                                                    <td> كفة مرآة فيرنا يمين 2018</td>
                                                    <td>اكسسوارات</td>
                                                    <td>19 جنيه</td>
                                                    <td>19 جنيه</td>
                                                    <td>1900</td>
                                                    <td>1900</td>
                                                    <td>كلاام كتيير</td>
                                                    <td  class="td-actions">
                                                        <a title="{{__('translation.website.crud.Show')}}"  rel="tooltip" class="btn btn-info" style="margin: 0 2px 0 0;" href="{{route('products.history',2)}}">
                                                            <i class="fa fa-history" aria-hidden="true"></i>
                                                        </a>
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
    </div>
@endsection

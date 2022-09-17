@extends('layouts.app', ['activePage' => 'showSales', 'titlePage' => __('translation.website.sidebar.Show Sale Details')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Client Information') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="font-weight: 900;">{{ __('translation.clients.ID') }}</th>
                                        <th style="font-weight: 900;">{{ __('translation.clients.Name') }}</th>
                                        <th style="font-weight: 900;" >{{ __('translation.clients.Nickname') }}</th>
                                        <th style="font-weight: 900;">{{ __('translation.clients.Phone') }}</th>
                                        <th style="font-weight: 900;">{{ __('translation.clients.Address') }}</th>
                                        <th style="font-weight: 900;">{{ __('translation.clients.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2</td>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>2013</td>
                                        <td>&euro; 99,225</td>
                                        <td class="td-actions">
                                            <a class="btn btn-info" rel="tooltip" title="{{ __('translation.title.Edit Client') }}"  href="{{ route('clients.edit', 5) }}"
                                                style="color:white;"> <i class="material-icons">edit</i> </a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Products') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('translation.website.crud.Number') }}</th>
                                        <th> {{__('translation.products.Product Name')}}</th>
                                        <th>{{__('translation.products.Supplier')}}</th>
                                        <th>{{__('translation.products.Qty')}}</th>
                                        <th>{{__('translation.products.Brand')}}</th>
                                        <th>{{__('translation.products.Category')}}</th>
                                        <th>{{__('translation.products.Purchase Price')}}</th>
                                        <th>{{__('translation.sales.Sale Price')}}</th>
                                        <th>{{__('translation.sales.Sale After Price')}}</th>
                                        <th>{{__('translation.website.crud.Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><a href="{{ route('products.show',5) }}">مرآة</a></td>
                                        <td><a href="{{ route('suppliers.edit',5) }}"> esmooo </a></td>
                                        <td>هيونداى</td>
                                        <td>اكسسوارات</td>
                                        <td>130 جنيه</td>
                                        <td>800 حنيه</td>
                                        <td>800 حنيه</td>

                                        <td>1000 قطعة</td>
                                        <td class="td-actions">
                                            <div class="d-flex justify-content-space-between">
                                                <a title="{{__('translation.website.crud.update')}}"  rel="tooltip" class="btn btn-info" style="margin: 0 2px 0 0;" href="{{route('products.edit',2)}}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a title="{{__('translation.website.crud.Show')}}"  rel="tooltip" class="btn btn-info" style="margin: 0 2px 0 0;" href="{{route('products.show',2)}}">
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

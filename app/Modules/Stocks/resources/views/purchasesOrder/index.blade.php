@extends('layouts.app', ['activePage' => 'allPurchasesOrder', 'titlePage' => __('translation.website.sidebar.all Purchases Order')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title ">{{ __('translation.website.sidebar.all Purchases Order') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{ route('purchasesOrder.create') }}" class="btn btn-round btn-primary mb-3"
                                        style="color:white;">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        {{ __('translation.website.crud.create') }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class=""><br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('translation.purchase.id') }}</th>
                                            <th>{{ __('translation.purchase.Creation date') }}</th>
                                            <th>{{ __('translation.purchase.Order date') }}</th>
                                            <th>{{ __('translation.purchase.supplier') }}</th>
                                            <th>{{ __('translation.purchase.product') }}</th>
                                            <th>{{ __('translation.purchase.quantity') }}</th>
                                            <th>{{ __('translation.purchase.type') }}</th>
                                            <th>{{ __('translation.purchase.total cost') }}</th>
                                            <th>{{ __('translation.purchase.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May</td>
                                            <td>reem</td>
                                            <td>car</td>
                                            <td>55</td>
                                            <td>Cash</td>
                                            <td>550,99</td>
                                            <td class="td-actions" style="padding: 5px">
                                                <a class="btn btn-info" rel="tooltip"
                                                    title="{{ __('translation.pricelists.Edit') }}"
                                                    href="{{ route('priceLists.edit', 5) }}" style="color:white; ">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" rel="tooltip"
                                                    title="{{ __('translation.pricelists.Delete') }}"
                                                    onclick="if(confirm('Are You Sure?')) {document.getElementById('delete-1').submit();} else {return false;}"
                                                    href="javascript:void(0)"><i class="material-icons">close</i></a>
                                                <form method="post" action="{{ route('priceLists.destroy', 5) }}"
                                                    style="display:none; " id="delete-1">
                                                    @csrf
                                                    @method('delete')
                                                </form>
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



    </div>
    </div>
    </div>
@endsection

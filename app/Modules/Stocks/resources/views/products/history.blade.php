@extends('layouts.app', ['activePage' => 'productHistory', 'titlePage' => __('translation.products.Product History')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title ">مرآة</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="font-weight: 900;">{{ __('translation.website.crud.Number') }}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Stock Before Transaction')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Statement')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Incoming')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Outgoing')}}</th>
                                                    <th style="font-weight: 900;">{{__('translation.products.Stock After Transaction')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>فاتورة</td>
                                                    <td>رقم</td>
                                                    <td>او رقم</td>
                                                    <td>الباقى</td>
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
@endsection

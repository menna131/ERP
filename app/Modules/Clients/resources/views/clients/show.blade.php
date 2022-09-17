@extends('layouts.app',
[
    'activePage' => 'show-clients',
    'titlePage' => __('translation.website.sidebar.Show clients Details')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Basic Information') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr text-center>
                                        <th class="font-weight-bold text-center">{{ __('translation.clients.ID') }}</th>
                                        <th class="font-weight-bold text-center">{{ __('translation.clients.Name') }}</th>
                                        <th class="font-weight-bold text-center" >{{ __('translation.clients.Nickname') }}</th>
                                        <th class="font-weight-bold text-center">{{ __('translation.clients.Phone') }}</th>
                                        <th class="font-weight-bold text-center">{{ __('translation.clients.Address') }}</th>
                                        <th class="font-weight-bold text-center">{{ __('translation.clients.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td> {{$client->id}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->nickname}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>{{$client->address}}</td>
                                        <td><a class='btn btn-info btn-sm' rel='tooltip' title="{{__('translation.title.Edit Client')}}"
                                            href="{{route('clients.edit', $client->slug)}}"><i class='material-icons'>edit</i></a></td>
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
                                <h4 class="card-title">{{ __('translation.website.sidebar.Sales') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{__('translation.sales.ID')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Type')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Total')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Order Date')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Recieve Date')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Discount')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Status')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> كفة مرآة فيرنا يمين 2018</td>
                                        <td>اكسسوارات</td>
                                        <td>19 جنيه</td>
                                        <td>19 جنيه</td>

                                        <td>1-2-2020</td>
                                        <td>25-5-2020</td>
                                        <td>on</td>
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
                                <h4 class="card-title">{{ __('translation.website.sidebar.Installment') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="data-table-basic">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{__('translation.sales.ID')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Type')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Total')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Order Date')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Recieve Date')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Discount')}}</th>
                                        <th class="font-weight-bold">{{__('translation.sales.Status')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> dddd</td>
                                        <td>اكسسوارات</td>
                                        <td>19 جنيه</td>
                                        <td>19 جنيه</td>

                                        <td>1-2-2020</td>
                                        <td>25-5-2020</td>
                                        <td>on</td>
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
                                <h4 class="card-title">{{ __('translation.website.sidebar.Client Wallet') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a class="btn btn-info" rel="tooltip"  title="{{ __('translation.title.show Transactions') }}"  href="{{ route('show.client.wallet.trans',$client->wallet->slug) }}"><i class="material-icons">visibility</i></a>
                                    <a class="btn btn-info" rel="tooltip"  title="{{ __('translation.title.Add Transaction') }}" href="{{ route('create.wallet.trans',$client->wallet->slug ) }}"
                               > <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">

                                                <i class="material-icons">
                                                    account_balance_wallet
                                                </i>
                                            </div>
                                            <p class="card-category">{{__('translation.wallet.Total Balance')}}</p>
                                            <h3 class="card-title">{{ $client->wallet->total_value}}
                                                <small>EGP</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">store</i>
                                            </div>
                                            <p class="card-category">{{ __('translation.wallet.Number Of Transactions') }}</p>
                                            <h3 class="card-title">{{ $client->wallet->number_of_transaction}}

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">paid</i>
                                            </div>
                                            <p class="card-category">{{__('translation.wallet.Total Paied')}}</p>
                                            <h3 class="card-title">{{ $client->wallet->total_paid}}
                                                <small>EGP</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">info_outline</i>
                                            </div>
                                            <p class="card-category">{{ __('translation.wallet.Pending')}}</p>
                                            <h3 class="card-title">{{ $client->wallet->total_pending}}
                                                <small>EGP</small>
                                            </h3>
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


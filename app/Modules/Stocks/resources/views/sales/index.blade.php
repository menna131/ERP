@extends('layouts.app', ['activePage' => 'allSales', 'titlePage' => __('translation.website.sidebar.All Sales')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                              <div class="card-text">
                                <h4 class="card-title">{{__('translation.website.sidebar.All Sales')}}</h4>
                              </div>
                            </div>
                            <div class="card-body">

                                <a href="{{ route('sales.create') }}" rel="tooltip" title="{{ __('translation.title.create client') }}" class="btn btn-primary btn-round mb-3"  style="color:white; float:{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"> <i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('translation.website.crud.create')}}</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('translation.sales.ID') }}</th>
                                            <th>{{ __('translation.clients.Name') }}</th>
                                            <th>{{ __('translation.sales.Order Date') }}</th>
                                            <th>{{ __('translation.sales.Total') }}</th>
                                            <th>{{ __('translation.sales.Type') }}</th>
                                            <th>{{ __('translation.sales.Recieve Date') }}</th>
                                            <th>{{ __('translation.sales.Discount') }}</th>
                                            <th>{{ __('translation.sales.Create Status') }}</th>
                                            <th>{{ __('translation.sales.Status') }}</th>
                                            <th>{{ __('translation.sales.Note') }}</th>
                                            <th>{{ __('translation.website.crud.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td class="text-center">2</td>
                                            <td><a href="{{ route('clients.edit',5) }}">Andrew Mike</a></td>
                                            <td>Develop</td>
                                            <td>Develop</td>
                                            <td>Develop</td>
                                            <td>Develop</td>
                                            <td>Develop</td>
                                            <td>2013</td>
                                            <td>2013</td>
                                            <td >&euro; 99,225</td>
                                            <td class="td-actions">

                                                <a class="btn btn-info" rel="tooltip" title="{{ __('translation.title.Show Sales') }}"  href="{{ route('sales.show',5) }}" style="color:white;" ><i class="material-icons">visibility</i></a>
                                                <a class="btn btn-info" rel="tooltip" title="{{ __('translation.title.Edit Sales') }}" href="{{ route('sales.edit',5) }}"  style="color:white;" >  <i class="material-icons">edit</i> </a>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush

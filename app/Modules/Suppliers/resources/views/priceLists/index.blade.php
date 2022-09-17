@extends('layouts.app', ['activePage' => 'allpricelists', 'titlePage' => __('translation.website.sidebar.All PriceLists')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title ">{{ __('translation.website.sidebar.All Price Lists') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{ route('priceLists.create') }}" class="btn btn-round btn-primary mb-3"
                                        style="color:white;">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        {{ __('translation.website.crud.create') }}
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive-sm">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('translation.pricelists.Supplier Name') }}</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>{{ __('translation.pricelists.Actions') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>Andrew Mike</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="td-actions">
                                                <a class="btn btn-info" rel="tooltip" href="#"
                                                    title="{{ __('translation.pricelists.Show Price List') }}"
                                                    style="color:white;"><i class="material-icons">visibility</i></a>

                                                <a class="btn btn-info" rel="tooltip"
                                                    title="{{ __('translation.pricelists.Edit') }}"
                                                    href="{{ route('priceLists.edit', 5) }}" style="color:white;"> <i
                                                        class="material-icons">edit</i> </a>
                                                <a class="btn btn-danger" rel="tooltip"
                                                    title="{{ __('translation.pricelists.Delete') }}"
                                                    onclick="if(confirm('Are You Sure?')) {document.getElementById('delete-1').submit();} else {return false;}"
                                                    href="javascript:void(0)"><i class="material-icons">close</i></a>
                                                <form method="post" action="{{ route('priceLists.destroy', 5) }}"
                                                    style="display:none;" id="delete-1">
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
@endsection

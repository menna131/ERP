@extends('layouts.app', ['activePage' => 'allPartners', 'titlePage' => __('translation.website.sidebar.All Partners')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-mode">
                    <div class="card-header card-header-text card-header-primary">
                        <div class="card-text">
                            <h4 class="card-title " >{{ __('translation.website.sidebar.All Partners') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="{{ route('partners.create') }}" class="btn btn-round btn-primary mb-3" style="color:white;">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    {{__('translation.website.crud.create')}}
                                </a>
                            </div>
                        </div>




                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('translation.dividendIncome.Partners') }}</th>
                                        <th>{{ __('translation.dividendIncome.Capital') }}</th>
                                        <th>{{ __('translation.dividendIncome.Status') }}</th>
                                        <th></th>
                                        <th>{{ __('translation.pricelists.Actions') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Andrew Mike</td>
                                        <td>25000</td>
                                        <td>Active</td>
                                        <td></td>


                                        <td class="td-actions">



                                            <a class="btn btn-info" rel="tooltip" title="{{__('translation.pricelists.Edit')}}" href="{{ route('partners.edit', 5) }}" style="color:white;"> <i class="material-icons">edit</i> </a>
                                            <a class="btn btn-danger" rel="tooltip" title="{{__('translation.pricelists.Delete')}}" onclick="if(confirm('Are You Sure?')) {document.getElementById('delete-1').submit();} else {return false;}" href="javascript:void(0)"><i class="material-icons">close</i></a>
                                            <form method="post" action="{{ route('partners.destroy', 5) }}" style="display:none;" id="delete-1">
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

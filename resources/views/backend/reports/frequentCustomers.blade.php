@extends('layouts.app', ['activePage' => 'frquentcustomers', 'titlePage' => __('translation.website.sidebar.frquent customers')])

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
                                    <h4 class="card-title ">{{__('translation.website.sidebar.frquent customers')}}</h4>
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
                            <table class="table text-center ">
                                <thead>
                                    <tr>
                                        <th >{{__('translation.reports.customers who bought once')}}</th>
                                        <th >{{__('translation.reports.customers who bought twice')}}</th>
                                        <th>{{__('translation.reports.customers who bought more than twice')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td >ree</td>
                                        <td >هيونداى</td>
                                        <td >اكسسوارات</td>
                                    </tr>
                                    <tr >
                                        <td >ree</td>
                                        <td >هيونداى</td>
                                        <td > اكسسوارات</td>
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

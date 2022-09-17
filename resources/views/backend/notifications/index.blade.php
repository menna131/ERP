@extends('layouts.app', ['activePage' => 'allnotifications', 'titlePage' => __('translation.website.sidebar.All Notifications')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                              <div class="card-text">
                                <h4 class="card-title">{{__('translation.website.sidebar.All Notifications')}}</h4>
                              </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                             <th>{{ __('translation.notifications.ID') }}</th>
                                            <th>{{ __('translation.notifications.Title') }}</th>
                                            <th>{{ __('translation.notifications.Content') }}</th>
                                            <th>{{ __('translation.notifications.Date') }}</th>
                                            <th>{{ __('translation.notifications.Read') }}</th>

                                            <th>{{ __('translation.website.crud.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>1</td>
                                            <td>title aho</td>
                                            <td>body aho</td>
                                            <td>12-5-2021</td>
                                            <td >l2 aw ah</td>
                                            <td class="td-actions">
                                                <a class="btn btn-danger"rel="tooltip"  title="{{ __('translation.title.Delete Notification') }}" onclick="if(confirm('Are You Sure?')) {document.getElementById('delete-1').submit();} else {return false;}" href="javascript:void(0)"><i class="material-icons">close</i></a>
                                                <form  method="post" action="{{ route('clients.destroy',5) }}" style="display:none;" id="delete-1">
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
@endsection

@extends('layouts.app', ['activePage' => 'showRole', 'titlePage' => __('translation.website.sidebar.Show Role')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Show Role') }}</h4>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="m-5">
                                    <div class="row">
                                        <div class="col form-group m-4">
                                            <div class="row">
                                                <table class="table w-50 table-bordered table-striped">
                                                    <thead>
                                                        <th class="text-center">{{ __('translation.users.Role') }}</th>
                                                        <th>{{ __('translation.permissions.Name') }}</th>
                                                    </thead>
                                                    <tbody>
                                                        <td rowspan="100" class="text-center">{{ $role->name }}</td>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($permissions as $permission)
                                                            @if ($i == 0)
                                                                <td>{{ $permission->name }}</td>
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                            @else
                                                                <tr>
                                                                    <td>{{ $permission->name }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('roles.index') }}" class="btn btn-info">{{ __('back to all roles') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app', ['activePage' => 'createRole', 'titlePage' => __('translation.website.sidebar.Create Role')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                </div>
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Create Role') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{route('roles.store')}}">
                                    @csrf
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col form-group m-4">
                                            <p class="font-weight-bold"  for="name">
                                                {{ __('translation.roles.Name') }}</p>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="row mt-5 ml-2 mb-5">
                                        <div class="col-12 mt-3 mb-3">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="all">
                                                <label class="custom-control-label font-weight-bold" for="all">All</label>
                                            </div>
                                        </div>
                                        @foreach ($permissions as $permission)

                                        <div class="col-3">

                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input selects" name="permission_id[]" value="{{ $permission->id }}"
                                                        id="Show_{{ $permission->id }}">
                                                    <label class="custom-control-label" for="Show_{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row pl-3 pb-2">
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-info" name="redirect" value="table">{{ __('translation.website.crud.create') }}</button>
                                            <button type="submit" class="btn btn-info" name="redirect" value="back">{{ __('translation.website.crud.Create & New') }}</button>
                                        </div>
                                        <div class="col-lg-2 offset-6">
                                            <input type="reset" class="btn btn-danger ml-5" value="{{ __('translation.website.crud.Cancel') }}">
                                        </div>
                                    </div>
                                </form>
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
        $('#all').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                // the checkbox is checked
                $('.selects').attr('checked', 'checked');
            } else {
                // the checkbox is now no longer checked
                $('.selects').removeAttr('checked');
            }
        });
    </script>
@endpush

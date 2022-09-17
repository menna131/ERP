@extends('layouts.app', ['activePage' => 'editPermission', 'titlePage' => __('translation.website.sidebar.Edit Permission')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Edit Permission') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('permissions.update', $permission->slug) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col form-group m-4">
                                            <p class="font-weight-bold" for="name">
                                                {{ __('translation.permissions.Name') }}</p>
                                            <input type="text" value="{{ $permission->name }}" name="name" class="form-control" id="name" placeholder="Enter Name">
                                            @if($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-info" name="redirect" value="table">{{ __('translation.website.crud.update') }}</button>
                                            <button type="submit" class="btn btn-info" name="redirect" value="back">{{ __('translation.website.crud.Update & Return') }}</button>
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
    </div>
    </div>
@endsection

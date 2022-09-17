@extends('layouts.app', ['activePage' => 'createPermission','titlePage' => __('translation.website.sidebar.Create Permission')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-mode">
                    <div class="card-header card-header-text card-header-primary">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('translation.website.sidebar.Create Permission') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="m-5">
                            <form method="POST" action="{{ route('permissions.store') }}">
                                @csrf

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif

                                <div class="row">
                                    <div class="col-12 form-group m-4">
                                        <p class="font-weight-bold" for="name">
                                            {{ __('translation.permissions.Name') }}</p>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                    </div>
                                    <br>
                                    <div class="col-12 form-check m-4">
                                        <label class="text-dark " for="flexCheckChecked" style="font-weight: bold">
                                            Crud Operation
                                          </label>
                                        <input class="form-check" type="checkbox" id="flexCheckChecked" name="crud" value ="crud">

                                      </div>
                                </div>

                                <div class="row mt-5">
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

@extends('layouts.app', ['activePage' => 'createCategory', 'titlePage' => __('translation.website.sidebar.Create Category')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title ">{{ __('translation.website.sidebar.Create Category') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" row">
                                        <div class="col-6 form-group">
                                            <p class="font-weight-bold text-black" for="inputAddress">
                                                {{ __('translation.categories.Category Name') }}</p>
                                            <input type="text" name="name" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>

                                        <div class=" col-6 mb-5 form-group form-file-upload form-file-multiple">
                                            <p class="font-weight-bold" for="inputAddress">
                                                {{ __('translation.categories.Category Image') }}</p>
                                            <input type="file"  name="media" class="inputFileHidden">
                                            <div class="input-group">
                                                <input type="text" class="form-control inputFileVisible"
                                                    placeholder="{{ __('translation.website.crud.Select Image') }}" >

                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                                        <i class="material-icons">photo_camera</i>
                                                    </button>
                                                </span>
                                            </div>
                                            @error('media')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @include('crudButtons.create-buttons')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        /* font-size: 15px; */

    </style>
@endpush

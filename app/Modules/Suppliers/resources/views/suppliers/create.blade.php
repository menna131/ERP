@extends('layouts.app', [
    'activePage' => 'createsupplier',
    'titlePage' => __('translation.website.sidebar.create suppliers')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.create suppliers') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body m-4">
                            <form method="POST" action="{{ route('suppliers.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row ml-2">
                                    <div class="col-4 form-group ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Name') }}</p>
                                        <input type="text" name="name" class="form-control " id="inputAddress"
                                            placeholder="1234 Main St" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-4 form-group ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Nickname') }}</p>
                                        <input type="text" name="nickname" class="form-control " id="inputAddress"
                                            placeholder="1234 Main St" value="{{ old('name') }}">
                                        @error('nickname')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-4">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Phone') }}</p>
                                        <input type="text" name="phone" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row ml-2 mb-5">
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Address') }}</p>
                                        <input type="text" name="address" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St" value="{{ old('address') }}">
                                        @error('address')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class=" col-6 form-group form-file-upload form-file-multiple">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Price Lists') }}</p>
                                        <input type="file" multiple="multiple" name="media[]" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible"
                                                placeholder="Multiple Files" multiple>

                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary" title="upload media">
                                                    <i class="material-icons">layers</i>
                                                </button>
                                            </span>
                                        </div>
                                        @error('media')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                        @error('media.*')
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
    </div>
@endsection

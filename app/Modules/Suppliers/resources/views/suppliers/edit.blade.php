@extends('layouts.app', ['activePage' => 'edit-suppliers', 'titlePage' => __('translation.website.sidebar.Edit Supplier')])

@section('content')
    @livewireStyles
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Edit Supplier') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <form method="POST" action="{{ route('suppliers.update', $supplier->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col form-group m-4 ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Name') }}</p>
                                        <input type="text" name="name" class="form-control " id="inputAddress"
                                            placeholder="1234 Main St" value="{{ $supplier->name }}">
                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Nickname') }}</p>
                                        <input type="text" name="nickname" class="form-control " id="inputAddress"
                                            placeholder="1234 Main St" value="{{ $supplier->nickname }}">
                                        @error('nickname')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col form-group m-4 ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Phone') }}</p>
                                        <input type="text" name="phone" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St" value="{{ $supplier->phone }}">
                                        @error('phone')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row ml-2">
                                    <div class="col-6 form-group ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Address') }}</p>
                                        <input type="text" name="address" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St" value="{{ $supplier->address }}">
                                        @error('address')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class=" col-6 form-group form-file-upload form-file-multiple ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Price Lists') }}</p>
                                        <input type="file" multiple="" name="media[]" class="inputFileHidden">

                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible"
                                                placeholder="Multiple Files" multiple>

                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary">
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
                                <div class="row ml-3 my-3">
                                    <div class="col-12 h4 ">{{ __('translation.suppliers.Price List') }}</div>

                                    @livewire('media.delete-supplier-media',['model_id'=>$supplier->id ])

                                </div>
                               @include('crudButtons.update-buttons')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
@endsection

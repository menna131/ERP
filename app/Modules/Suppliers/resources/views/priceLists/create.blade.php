@extends('layouts.app', ['activePage' => 'createpricelist', 'titlePage' => __('translation.website.sidebar.Create New Price List')])

@section('content')
    @livewireStyles
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Create New Price List') }}
                                </h4>
                            </div>
                            <div class="card-text">
                                <h4 class="card-title">{{ $supplier->name }}
                                </h4>
                            </div>
                        </div>
                        @if (session()->has('Success'))
                        <div class="alert alert-success">{{ session()->get('Success') }}</div>
                    @endif
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('suppliers.pricelists.store',$supplier->slug) }}" enctype="multipart/form-data">
                                    @csrf
                               
                                    @livewire('create-pricelist', ['supplier_id' => $supplier->id])

                                    <div class=" col-12 form-group form-file-upload form-file-multiple  mb-5">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.suppliers.Price Lists') }}</p>
                                        <input type="file" multiple="multiple" name="media[]" class="inputFileHidden">
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
                                    @include('crudButtons.create-buttons')
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @livewireScripts
@endsection


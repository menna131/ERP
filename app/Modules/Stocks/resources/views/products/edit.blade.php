@extends('layouts.app', ['activePage' => 'editProduct', 'titlePage' => __('translation.products.Edit Product')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title ">{{ __('translation.products.Edit Product') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('products.update', 1) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <p for="name">{{ __('translation.products.Product Name') }}</p>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <p for="desc">{{ __('translation.products.Write a description for this product') }}
                                        </p>
                                        <textarea class="col-lg-12 col-s-2 textarea" name="desc" id="desc" cols="127"
                                            rows="5"
                                            class=""></textarea>
                                    </div>
                                    <div class="form-group mb-5 form-file-upload form-file-multiple">
                                            <input type="file" multiple="photo" class="inputFileHidden">
                                            <div class="input-group">
                                                <input type="text" class="form-control inputFileVisible" placeholder="{{ __('translation.products.Product Photo(s)') }}" multiple>
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-info">
                                                        <i class="material-icons">layers</i>
                                                    </button>
                                                </span>
                                            </div>
                                    </div>

                                          @include('crudButtons.update-buttons')

                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

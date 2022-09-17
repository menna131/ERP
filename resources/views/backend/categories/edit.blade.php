@extends('layouts.app', ['activePage' => 'editCategory', 'titlePage' => __('translation.categories.Edit Category')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title ">{{__('translation.categories.Edit Category')}}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('categories.update',$category->slug) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class=" row">
                                        <div class="col-6 form-group">
                                            <p class="font-weight-bold text-black" for="inputAddress">
                                                {{ __('translation.categories.Category Name') }}</p>
                                            <input type="text" name="name" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ $category->name }}">
                                            @error('name')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>

                                        <div class=" col-6 form-group form-file-upload form-file-multiple">
                                            <p class="font-weight-bold" for="inputAddress">
                                                {{ __('translation.categories.Category Image') }}</p>
                                            <input type="file"  name="media" class="inputFileHidden">
                                            <div class="input-group">
                                                <input type="text" class="form-control inputFileVisible"
                                                placeholder="{{ __('translation.website.crud.Select Image') }}">

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
                                    <div class="row ml-3 my-3">

                                        @livewire('media.delete-category-media',['model_id'=>$category->id ])
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

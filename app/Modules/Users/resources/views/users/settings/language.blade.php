@extends('layouts.app', ['activePage' => 'translation.website info.Preffered Langauge', 'titlePage' =>
__('translation.website info.Preffered Langauge')])

@section('content')
    <div class="content w-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card card-mode w-100">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website info.Preffered Langauge') }}</h4>
                            </div>
                        </div>
                        <div class="card-body m-4">
                            <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 form-group ">
                                        <p class="font-weight-bold" for="preferred_language">
                                            {{ __('translation.website info.Preffered Langauge') }}
                                        </p>
                                        <select id='preferred_language' class="form-group form-control item_dropdown"
                                            name="preferred_language">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <option value="{{ $localeCode }}">{{ $properties['native'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('preferred_language')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group ">
                                        <p class="font-weight-bold" for="preferred_theme">
                                            {{ __('translation.website info.Preffered Theme') }}
                                        </p>
                                        <select id='preferred_theme' class="form-group form-control item_dropdown"
                                            name="preferred_theme">
                                            <option name="preferred_theme" value='0'>
                                                {{ __('translation.website info.System Default') }}</option>
                                            <option name="preferred_theme" value='1'>
                                                {{ __('translation.website info.Light') }}</option>
                                            <option name="preferred_theme" value='2'>
                                                {{ __('translation.website info.Dark') }}</option>
                                        </select>
                                        @error('preferred_theme')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold" for="name">
                                            {{ __('translation.website info.Website Name') }}</p>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Your Company's Name">
                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold" for="phone">
                                            {{ __('translation.website info.tel') }}</p>
                                        <input type="number" name="phone" class="form-control" id="phone"
                                            placeholder="Enter Your Company's Mobile">
                                        @error('phone')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group form-file-upload form-file-multiple m-4">
                                        <img src="{{ asset('images/upload.jpg') }}" id="image-preview"
                                            style="height: 70px; width: 70px; border-radius: 50%;">
                                        <input type="file" id="image" name="image" multiple="multiple"
                                            class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" disabled class="form-control inputFileVisible"
                                                placeholder="Single File">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                    <i class="material-icons">attach_file</i>
                                                </button>
                                            </span>
                                        </div>
                                        <small class="text-danger small-text">Image's width <= 150 pixels and height
                                                <=130</small>
                                                phone
                                                @error('image')
                                                    <div class="alert alert-danger"> {{ $message }} </div>
                                                @enderror
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-info" name="redirect"
                                            value="table">{{ __('translation.website.crud.create') }}</button>
                                    </div>
                                    <div class="col-lg-2 offset-6">
                                        <input type="reset" class="btn btn-danger ml-5"
                                            value="{{ __('translation.website.crud.Cancel') }}">
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
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".item_dropdown").select2();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endpush

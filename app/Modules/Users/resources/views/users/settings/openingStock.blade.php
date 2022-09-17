@extends('layouts.app', ['activePage' => 'translation.website info.oppening stock',
'titlePage' => __('translation.website info.oppening stock')])

@section('content')
    <div class="content w-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card card-mode w-100">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website info.oppening stock') }}</h4>
                            </div>
                        </div>
                        <div class="card-body m-4">
                            <form method="POST" action="{{ route('opening.stock.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                    </div>
                                    <div class=" col-12 form-group form-file-upload form-file-multiple">
                                        <p class="font-weight-bold" for="inputAddress">
                                            Excel File</p>
                                        <input type="file" name="media" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible"
                                                placeholder="Excel File">

                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                    <i class="material-icons">layers</i>
                                                </button>
                                            </span>
                                        </div>
                                        {{-- <div class="text-dark" role="alert">
                                            <strong> Download Excel Template And Fill It With Data Then Upload it
                                                again</strong>
                                        </div> --}}
                                        @if ($errors->any())
                                            <div class="text-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary" name="redirect"
                                            value="table">{{ __('translation.website.crud.create') }}</button>
                                    </div>
                                    <div class="col-lg-2 ">
                                        <input type="submit" class="btn btn-danger ml-5"
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
@endsection

@extends('layouts.app', ['activePage' => 'createclient',
'titlePage' => __('translation.website.sidebar.create client')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.create client') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="row ml-2 justify-content-around">
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Name') }}</p>
                                        <input type="text" name="name" class="form-control" id="inputAddress"
                                            placeholder="" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group ">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Nickname') }}</p>
                                            <input type="text" name="nickname" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ old('nickname') }}">
                                                @error('nickname')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                               @enderror
                                    </div>
                                </div>
                                <div class="row ml-2 justify-content-around">

                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Phone') }}</p>
                                            <input type="text" name="phone" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ old('phone') }}">
                                                @error('phone')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                    </div>

                                    <div class="col-6 form-group mb-5">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Address') }}</p>
                                            <input type="text" name="address" class="form-control"id="inputAddress"
                                             placeholder="" value="{{ old('address') }}">
                                            @error('address')
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

@endsection

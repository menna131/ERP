@extends('layouts.app', ['activePage' => 'edit-clients', 'titlePage' => __('translation.website.sidebar.Edit Client')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Edit Client') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body m-4">
                            <form method="POST" action="{{ route('clients.update', $client->slug) }}"
                                >
                                @csrf
                                @method('PUT')
                                <div class="row ml-2 justify-content-around">
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Name') }}</label>
                                            <input type="text" name="name" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ $client->name }}">
                                            @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Nickname') }}</label>
                                            <input type="text" name="nickname" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ $client->nickname }}">
                                            @error('nickname')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row ml-2 justify-content-around">
                                    <div class="col-6 form-group">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Phone') }}</label>
                                            <input type="text" name="phone" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ $client->phone }}">
                                            @error('phone')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <p class="font-weight-bold text-black" for="inputAddress">
                                            {{ __('translation.clients.Address') }}</label>
                                            <input type="text" name="address" class="form-control" id="inputAddress"
                                                placeholder="" value="{{ $client->address }}">
                                            @error('address')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-info " name="redirect"
                                                value="table">{{ __('translation.website.crud.update') }}</button>
                                            <button type="submit" class="btn btn-info " name="redirect"
                                                value="back">{{ __('translation.website.crud.Update & Return') }}</button>
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

@extends('layouts.app', ['activePage' => 'createUser', 'titlePage' => __('translation.website.sidebar.Add New User')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Create User') }}</h4>
                            </div>
                        </div>
                        <div class="card-body m-4">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="name">
                                            {{ __('translation.users.Name') }}</p>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                        @if($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif
                                    </div>
    
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="email">
                                            {{ __('translation.users.Email') }}</p>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                        @if($errors->has('email')) <p class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                                    </div>
    
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="phone">
                                            {{ __('translation.users.Phone') }}</p>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                                        @if($errors->has('phone')) <p class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="password">
                                            {{ __('translation.users.Password') }}</p>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                        @if($errors->has('password')) <p class="alert alert-danger">{{ $errors->first('password') }}</p> @endif
                                    </div>
    
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="confirm_password">
                                            {{ __('translation.users.Confirm Password') }}</p>
                                        <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Confirm Password">
                                        @if($errors->has('password_confirmation')) <p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p> @endif
                                    </div>
    
                                    <div class="col form-group m-4">
                                        <p class="font-weight-bold" for="role">
                                            {{ __('translation.users.Role') }}</label>
                                            <select class="form-group form-control item_dropdown" name="role" id="role">
                                                @foreach ($roles as $role)
                                                    <option name="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('role')) <p class="alert alert-danger">{{ $errors->first('role') }}</p> @endif
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-info" name="redirect" value="table">{{ __('translation.website.crud.create') }}</button>
                                        <button type="submit" class="btn btn-info" name="redirect" value="back">{{ __('translation.website.crud.Create & New') }}</button>
                                    </div>
                                    <div class="col-lg-2 offset-6">
                                        <input type="reset" class="btn btn-danger ml-5" value="{{ __('translation.website.crud.Cancel') }}">
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
    $(document).ready(function(){
      $(".item_dropdown").select2();
    });
  </script>
@endpush
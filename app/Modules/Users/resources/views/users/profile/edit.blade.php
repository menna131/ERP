@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('translation.profile.User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card  card-mode">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                  <h4 class="card-title">{{ __('translation.profile.Edit Basic Information') }}</h4>
              </div>
          </div>
            <div class="card-body">
              @if (session('status'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif
              <form method="post" action="{{ route('profile.update', auth()->user()->slug) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="name">{{ __('translation.profile.Name') }}</p>
                    <input class="form-control" name="name" id="name" type="text" placeholder="{{ __('translation.profile.Name') }}" value="{{ $user->name }}" required />
                    @if($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif
                  </div>
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="phone">{{ __('translation.profile.Phone') }}</p>
                    <input class="form-control" name="phone" id="phone" type="phone" placeholder="{{ __('translation.profile.Phone') }}" value="{{ $user->phone }}" required />
                    @if($errors->has('phone')) <p class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif
                  </div>
                </div>
                <div class="col-6 form-group m-2">
                  <p class="font-weight-bold" for="role">
                      {{ __('translation.users.Role') }}</label>
                      <select class="form-group form-control p-1 item_dropdown" name="role" id="role">
                          @foreach ($allRoles as $allRole)
                             <option {{ ($allRole->name == $user->role ? 'selected':'') }} value="{{ $allRole->id }}">{{ $allRole->name }}</option> 
                          @endforeach
                      </select>
                      @if($errors->has('role')) <p class="alert alert-danger">{{ $errors->first('role') }}</p> @endif
                </div>
                <div class="row mt-5">
                  <div class="col-lg-4">
                      <button type="submit" class="btn btn-info">{{ __('translation.website.crud.update') }}</button>
                  </div>
                  <div class="col-lg-2 offset-6">
                      <input type="reset" class="btn btn-danger ml-5" value="{{ __('translation.website.crud.Cancel') }}">
                  </div>
                </div>
              </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card  card-mode">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                  <h4 class="card-title">{{ __('translation.profile.Edit Email') }}</h4>
              </div>
          </div>
            <div class="card-body">
              <form method="post" action="{{ route('profile.email', auth()->user()->slug) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="email">{{ __('translation.profile.Email') }}</p>
                    <input value="{{ $user->email }}" class="form-control" name="email" id="email" type="email" placeholder="{{ __('translation.profile.Email') }}" required />
                    @if($errors->has('email')) <p class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                    @if (session()->has('message'))
                      <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                      </div>
                    @endif
                  </div>
                </div>  
                <div class="row mt-5">
                  <div class="col-lg-4">
                      <button type="submit" class="btn btn-info">{{ __('translation.website.crud.update') }}</button>
                  </div>
                  <div class="col-lg-2 offset-6">
                      <input type="reset" class="btn btn-danger ml-5" value="{{ __('translation.website.crud.Cancel') }}">
                  </div>
                </div>
              </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card  card-mode">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                  <h4 class="card-title">{{ __('translation.profile.Edit Password') }}</h4>
              </div>
          </div>
            <div class="card-body">
              <form method="post" action="{{ route('profile.password', auth()->user()->slug) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="old_password">{{ __('translation.profile.Old Password') }}</p>
                    <input class="form-control" name="old_password" id="old_password" type="password" placeholder="{{ __('translation.profile.Old Password') }}" required />
                    @if($errors->has('old_password')) <p class="alert alert-danger">{{ $errors->first('old_password') }}</p> @endif
                  </div>
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="password">{{ __('translation.profile.New Password') }}</p>
                    <input class="form-control" name="password" id="password" type="password" placeholder="{{ __('translation.profile.New Password') }}" required />
                    @if($errors->has('password')) <p class="alert alert-danger">{{ $errors->first('password') }}</p> @endif
                  </div>
                  <div class="col form-group m-4">
                    <p class="font-weight-bold" for="password_confirmation">{{ __('translation.profile.Confirm New Password') }}</p>
                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="{{ __('translation.profile.Confirm New Password') }}" required />
                    @if($errors->has('password_confirmation')) <p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p> @endif
                  </div>
                </div>  
                <div class="row mt-5">
                  <div class="col-lg-4">
                      <button type="submit" class="btn btn-info">{{ __('translation.website.crud.update') }}</button>
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
@endsection
@push('js')
  <script>
    $(document).ready(function(){
      $(".item_dropdown").select2();
    });
  </script>
@endpush
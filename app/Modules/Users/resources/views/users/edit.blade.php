@extends('layouts.app', ['activePage' => 'edit-users', 'titlePage' => __('translation.website.sidebar.Edit User')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-mode">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('translation.website.sidebar.Edit User') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->slug) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col form-group m-4">
                                    <p class="font-weight-bold" for="name">
                                        {{ __('translation.users.Name') }}</p>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name" placeholder="{{ __('translation.users.Name') }}">
                                    @if($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif
                                </div>

                                <div class="col form-group m-4">
                                    <p class="font-weight-bold" for="email">
                                        {{ __('translation.users.Email') }}</p>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="{{ __('translation.users.Email') }}">
                                    @if($errors->has('email')) <p class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                                </div>

                                <div class="col form-group m-4">
                                    <p class="font-weight-bold" for="phone">
                                        {{ __('translation.users.Phone') }}</p>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="__('translation.users.Phone')">
                                    @if($errors->has('phone')) <p class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group m-4">
                                    <p class="font-weight-bold" for="role">
                                        {{ __('translation.users.Role') }}</label>
                                        <select class="form-group form-control p-1 item_dropdown" name="role" id="role">
                                            @foreach ($allRoles as $allRole)
                                               <option {{ ($allRole->name == $role ? 'selected':'') }} value="{{ $allRole->id }}">{{ $allRole->name }}</option> 
                                            @endforeach
                                        </select>
                                        @if($errors->has('role')) <p class="alert alert-danger">{{ $errors->first('role') }}</p> @endif
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-info" name="redirect" value="table">{{ __('translation.website.crud.update') }}</button>
                                    <button type="submit" class="btn btn-info" name="redirect" value="back">{{ __('translation.website.crud.Update & Return') }}</button>
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
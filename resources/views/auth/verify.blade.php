@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage' => __('Material Dashboard')])

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card card-mode">
                  <div class="card-header card-header-text card-header-primary">
                      <div class="card-text">
                          <h4 class="card-title">{{ __('Verify Your Email Address') }}</h4>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="m-5">
                        <p class="card-description text-center"></p>
                        <p>
                          @if (session('resent'))
                              <div class="alert alert-success" role="alert">
                                  {{ __('A fresh verification link has been sent to your email address.') }}
                              </div>
                          @endif
                          
                          {{ __('Before proceeding, please check your email for a verification link.') }}
                          
                          @if (Route::has('verification.resend'))
                              {{ __('If you did not receive the email') }},  
                              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                  @csrf
                                  <button type="submit" class="btn btn-link text-primary p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                              </form>
                          @endif
                        </p>  
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

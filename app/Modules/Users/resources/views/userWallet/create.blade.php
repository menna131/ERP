





@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'createUserWallet', 'titlePage' => __('translation.title.create My Wallet')])

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card card-mode">
                  <div class="card-header card-header-text card-header-primary">
                      <div class="card-text">
                        <h4 class="card-title">{{ __('translation.title.create My Wallet') }}</h4>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="m-5">
                        <p class="card-description text-center"></p>
                        <p>
                         
                          <form method="POST" action="{{ route('user.wallet.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col form-group mt-4">
                                    <p class="font-weight-bold" for="total_value">
                                        {{ __('translation.wallet.Total Balance') }}</p>
                                    <input type="number" step="0.01" name="total_value" class="form-control"
                                        id="total_value" placeholder="Enter Your Starting Capital">
                                    @if ($errors->has('total_value')) <p class="alert alert-danger">{{ $errors->first('total_value') }}</p> @endif
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-info" name="redirect"
                                        value="table">{{ __('translation.website.crud.create') }}</button>
                                </div>
                                <div class="col-lg-2 offset-3">
                                    <input type="reset" class="btn btn-danger ml-5"
                                        value="{{ __('translation.website.crud.Cancel') }}">
                                </div>
                            </div>
                        </form>
                        </p>  
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
    </script>
@endpush


@extends('layouts.app', ['activePage' => 'createclientWalletTransaction', 'titlePage' =>
__('translation.website.sidebar.Create Transaction')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('translation.website.sidebar.Create Transaction') }}</h4>
                                </div>
                                @include('messages.print-message')
                            </div>
                            <div class="card-body"> {{ __('translation.walletTransaction.Date') }}
                                 <form action="{{ route('store.wallet.trans',$clientwallet->slug) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                    <div  class="row">
                                        <div class="form-group col-6">
                                            <p class="font-weight-bold" for="inputAddress">
                                               </p>
                                            <input type="date" name="date" class="form-control inputbackgroundDark" id="date" required
                                                placeholder="{{ __('translation.walletTransaction.Date Placeholder') }}">
                                        </div>

                                        <div class="form-group  col-6 mb-5">
                                            <p class="font-weight-bold" for="inputAddress">
                                                {{ __('translation.walletTransaction.Amount') }}</p>
                                            <input type="number" name="amount" class="form-control inputbackgroundDark" id="amount" required
                                                placeholder="{{ __('translation.walletTransaction.Amount Placeholder') }}">
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
    </div>
@endsection





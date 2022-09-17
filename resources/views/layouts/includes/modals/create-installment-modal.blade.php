<!-- Modal Installment -->
{{-- <div class="container-fluid d-none" id="payment-content" style="margin:0px; padding:0px;"> --}}
    <div class="modal fade" id="installment_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-mode">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Installment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="">
                            <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group m-2 row flex">
                                        <div class="col-5 m-2">
                                            <p class="font-weight-bold"  for="inputAddress">
                                                {{ __('Installment period') }}</p>
                                            <input type="number" name="install-period-months" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Months" value="{{ old('install-period-months') }}">
                                            <input type="number" name="install-period-weeks" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Weeks" value="{{ old('install-period-weeks') }}">
                                            <input type="number" name="install-period-days" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Days" value="{{ old('install-period-days') }}">
                                        </div>
                                        <div class="col-5 m-2">
                                            <p class="font-weight-bold"   for="inputAddress">
                                                {{ __('Installment per') }}: </p>
                                            <input type="number" name="per-month" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Months" value="{{ old('per-month') }}">
                                            <input type="number" name="per-week" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Weeks" value="{{ old('per-week') }}">
                                            <input type="number" name="per-day" class="form-control d-inline" id="inputAddress" required
                                                placeholder="Days" value="{{ old('per-day') }}">
                                        </div>
                                        <div class="col-5 m-2">
                                            <p class="font-weight-bold"   for="inputAddress">
                                                {{ __('Down Payment') }}</p>
                                            <input type="text" name="down-payment" class="form-control" id="inputAddress" required
                                                placeholder=" " value="{{ old('down-payment') }}">
                                        </div>
                                        <div class="col-5 m-2">
                                            <p class="font-weight-bold" for="inputAddress">
                                                {{ __('Start Date') }}</p>
                                            <input type="date" name="start-date" class="form-control" id="inputAddress" required
                                                placeholder=" " value="{{ old('start-date') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-action modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

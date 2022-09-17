<!-- ModalClient -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-mode">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">{{ __('translation.clients.Add Client') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div id="store-client-message" class="text-success text-center">
                    </div>
                    <div class="row ml-2 justify-content-around">
                        <div class="col-6 form-group">
                            <p class="font-weight-bold text-black" for="name-client">
                                {{ __('translation.clients.Name') }}</p>
                            <input type="text" name="name" class="form-control" id="name-client" placeholder=""
                                value="{{ old('name') }}">
                            <div id="name-error" class="text-danger client-error" name=>
                            </div>
                        </div>
                        <div class="col-6 form-group ">
                            <p class="font-weight-bold text-black" for="inputAddress2">
                                {{ __('translation.clients.Nickname') }}</p>
                            <input type="text" name="nickname" class="form-control" id="inputAddress2"
                                placeholder="" value="{{ old('nickname') }}">
                            <div id="nickname-error" class="text-danger client-error">
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 justify-content-around">

                        <div class="col-6 form-group">
                            <p class="font-weight-bold text-black" for="inputAddress">
                                {{ __('translation.clients.Phone') }}</p>
                            <input type="text" name="phone" class="form-control" id="inputAddress" placeholder=""
                                value="{{ old('phone') }}">
                            <div id="phone-error" class="text-danger client-error">
                            </div>
                        </div>
                        <div class="col-6 form-group mb-5">
                            <p class="font-weight-bold text-black" for="inputAddress">
                                {{ __('translation.clients.Address') }}</p>
                            <input type="text" name="address" class="form-control" id="inputAddress"
                                placeholder="" value="{{ old('address') }}">
                            <div id="address-error" class="text-danger client-error">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="create-client" onclick="addClient()"> Add
                        Contact </button>
                </form>
            </div>
        </div>
    </div>
</div>

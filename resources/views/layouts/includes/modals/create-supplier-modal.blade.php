 <!-- supplier Modal-->
 <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel"
 aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-mode">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">{{ __('translation.suppliers.Add Supplier') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form enctype="multipart/form-data">
                        <div id="store-supplier-message" class="text-success text-center">

                        </div>
                        <br>
                        <div class="container">
                            <br>
                            <div class="row ">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierName" class="font-weight-bold">{{ __('translation.suppliers.Supplier Name') }}</label>
                                        <input type="text" id="supplierName" class="form-control" required name="name"
                                        {{-- placeholder="{{ __('translation.suppliers.Supplier Name') }}" --}}
                                        >
                                        <div id="name-error" class="text-danger supplier-error">

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierNickname" class="font-weight-bold">{{ __('translation.suppliers.Supplier Nickname') }}</label>
                                        <input type="text" id="supplierNickname" class="form-control" required name="nickname"
                                        {{-- placeholder="{{ __('translation.suppliers.Supplier Nickname') }}" --}}
                                        >
                                        <div id="nickname-error" class="text-danger supplier-error">

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierAddress" class="font-weight-bold">{{ __('translation.suppliers.Supplier Address') }}</label>
                                        <input type="text" id="supplierAddress" class="form-control" required name="address"
                                        {{-- placeholder="{{ __('translation.suppliers.Supplier Address') }}" --}}
                                        >
                                        <div id="address-error" class="text-danger supplier-error">

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierPhone" class="font-weight-bold"
                                            >{{ __('translation.suppliers.Supplier Phone') }}</label>
                                            <input type="text" id="supplierPhone" class="form-control" required name="phone"
                                            {{-- placeholder="{{ __('translation.suppliers.Supplier Phone') }}" --}}
                                            >
                                            <div id="phone-error" class="text-danger supplier-error">

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-file-upload form-file-multiple" style="margin: 20px;">
                            <p class="font-weight-bold"  for="inputAddress">
                                {{ __('translation.suppliers.Price Lists') }}</p>
                            <input type="file" multiple="" class="inputFileHidden">
                            <div class="input-group">
                                <input type="text" name="media" class="form-control inputFileVisible"
                                    placeholder="Multiple Files" multiple>
                                    <div id="media-error" class="text-danger supplier-error">

                                    </div>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                        <i class="material-icons">layers</i>
                                    </button>
                                </span>
                            </div>
                        </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="create-client" onclick="addSupplier()"> Add
                        Contact </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
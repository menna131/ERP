<div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-mode">
                    <div class="card-header card-header-text card-header-primary">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('translation.suppliers.Add Supplier') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>

                        <div class="container">
                            <br>
                            <div class="row ">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierName" class="font-weight-bold"
                                            >{{ __('translation.suppliers.Supplier Name') }}</label>
                                        <input type="text" id="supplierName" class="form-control" required
                                            placeholder="{{ __('translation.suppliers.Supplier Name') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierPhone" class="font-weight-bold"
                                            >{{ __('translation.suppliers.Supplier Phone') }}</label>
                                        <input type="text" id="supplierPhone" class="form-control" required
                                            placeholder="{{ __('translation.suppliers.Supplier Phone') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="supplierEmail" class="font-weight-bold"
                                           >{{ __('translation.suppliers.Email') }}</label>
                                        <input type="text" id="supplierEmail" class="form-control "
                                            placeholder="{{ __('translation.suppliers.Email') }}">
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
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                        <i class="material-icons">layers</i>
                                    </button>
                                </span>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

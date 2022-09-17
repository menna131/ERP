<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form>
                <div class="d-flex justify-content-between">
                    <div class="form-group m-4 w-50">
                        <p class="font-weight-bold"  for="inputAddress">{{ __("translation.clients.Name") }}</p>
                        <input type="text" name="name" class="form-control" id="inputAddress" required
                            placeholder="1234 Main St">
                    </div>
                    <div class="form-group m-4 w-50" >
                        <p class="font-weight-bold"
                            for="inputAddress">{{ __("translation.clients.Nickname") }}</label>
                        <input type="text" name="" class="form-control" id="inputAddress" required
                            placeholder="Enter Your Nickname">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group m-4 w-50" >
                        <p class="font-weight-bold"
                            for="inputAddress">{{ __("translation.clients.Phone") }}</label>
                        <input type="phone" name="phone" class="form-control" id="inputAddress" required
                            placeholder="1234 Main St">
                    </div>

                    <div class="form-group m-4 w-50" >
                        <p class="font-weight-bold"
                            for="inputAddress">{{ __("translation.clients.Email") }}</label>
                        <input type="text" name="password" class="form-control" style="" id="inputAddress" required
                            placeholder="1234 Mainsssssss St">
                            {{-- <input type="phone" name="phone" class="form-control" id="inputAddress" required
                            placeholder="1234 Main St"> --}}

                    </div>

                </div>

                <div class="form-group m-4" >
                    <p class="font-weight-bold"
                        for="inputAddress">{{ __("translation.clients.Address") }}</label>
                    <input type="phone" name="phone" class="form-control" id="inputAddress" required
                        placeholder="1234 Main St">
                </div>
            </form>
        </div>
    </div>
</div>


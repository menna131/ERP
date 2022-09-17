<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form class="">

                <div class="form-group m-2 row flex">
                    <div class="col-5 m-2">
                        <p class="font-weight-bold"  for="inputAddress">
                            {{ __('Installment period') }}</p>
                        <input type="number" name="install-period" class="form-control d-inline" id="inputAddress" required
                            placeholder="Months">
                        <input type="number" name="install-period" class="form-control d-inline" id="inputAddress" required
                            placeholder="Weeks">
                        <input type="number" name="install-period" class="form-control d-inline" id="inputAddress" required
                            placeholder="Days">
                    </div>

                    <div class="col-5 m-2">
                        <p class="font-weight-bold"   for="inputAddress">
                            {{ __('Installment per') }}: </p>
                        <input type="number" name="per" class="form-control d-inline" id="inputAddress" required
                            placeholder="Months">
                        <input type="number" name="per" class="form-control d-inline" id="inputAddress" required
                            placeholder="Weeks">
                        <input type="number" name="per" class="form-control d-inline" id="inputAddress" required
                            placeholder="Days">


                    </div>
                    <div class="col-5 m-2">
                        <p class="font-weight-bold"   for="inputAddress">
                            {{ __('Down Payment') }}</p>
                        <input type="text" name="down-payment" class="form-control" id="inputAddress" required
                            placeholder=" ">
                    </div>
                    <div class="col-5 m-2">
                        <p class="font-weight-bold" for="inputAddress">
                            {{ __('Start Date') }}</p>
                        <input type="date" name="start-date" class="form-control" id="inputAddress" required
                            placeholder=" ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





 <form>
    <div class="container border rounded ">
        <div class="row">
            @if($from)

                <div class="col form-group">
                    <p style="margin: 0px;"  class="font-dark-bold"  for="inputAddressx">
                        {{ __('translation.reports.From') }}</p>
                    <input type="date" name="date" class="form-control form-control-mode " id="inputAddressx"
                        required placeholder="please choose transaction date">
                </div>

            @endif
            @if($to)

                <div class="col form-group">
                    <p style="margin: 0px;" class="font-weight-bold"  for="inputAddress">
                        {{ __('translation.reports.to') }}</p>
                    <input type="date" name="date" class="form-control form-control-mode" id="inputAddress"
                        required placeholder="please choose transaction date">
                </div>

            @endif
            @if($status)

                <div class="col form-group">
                    <p style="margin: 0px;" class="font-weight-bold"
                        for="status">{{ __('translation.reports.Status') }}</p>
                    <select style="margin: 0px;" class="form-control form-control-mode" id='status'>
                        <option value='0'>Select Transaction</option>
                        <option value='1'>Transaction 1</option>
                        <option value='2'>Sonarika Bhadoria</option>
                        <option value='3'>Anil Singh</option>
                        <option value='4'>Vishal Sahu</option>
                        <option value='5'>Mayank Patidar</option>
                        <option value='6'>Vijay Mourya</option>
                        <option value='7'>Rakesh sahu</option>
                        <option value='8'>Madonna Mikhail</option>
                        <option value='9'>Glal Husseiny</option>
                        <option value='10'>Menna Glal</option>
                        <option value='11'>Reem</option>
                    </select>
                </div>

            @endif
            @if($every)

                <div class="col form-group">
                    <p style="margin: 0px;" class="font-weight-bold"
                        for="every">{{ __('translation.reports.Every') }}</p>
                    <select style="margin: 0px;" class="form-control form-control-mode" id='every'>
                        <option value='0'>Day</option>
                        <option value='1'>Week</option>
                        <option value='2'> Month</option>
                        <option value='3'>Year</option>
                        <option value='4'>Quarter</option>
                    </select>
                </div>

            @endif

        </div>
        <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-warning"
                style="margin: 10px;">{{ __('translation.reports.Filter') }}</button>
            <button type="reset" class="btn btn-outline-warning"
                style="margin: 10px;">{{ __('translation.reports.Reset') }}</button>
        </div>
    </div>
</form>

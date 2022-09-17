<!-- Button trigger modal -->
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" >


                <div class="form-group">
                  <label for="nameInput">Name</label>
                  <input type="text" class="form-control">
                  @error('name')
                    <span class="alert alert-danger">{{$message}}</span>
                  @enderror
                </div>



                  @if (session()->has('message'))
                  <span class="text-danger">
                    {{ session('message') }}
                  </span>
                  @endif
                  <br>

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick=""> Add Contact </button>
              </form>
        </div>

      </div>
    </div>
  </div>

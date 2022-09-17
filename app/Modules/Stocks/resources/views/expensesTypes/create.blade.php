@extends('layouts.app', ['activePage' => 'createexpensetype', 'titlePage' => __('translation.website.sidebar.Create New Expense Type')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-mode">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">{{ __('translation.website.sidebar.Create New Expense Type') }}</h4>
            </div>
          </div>
          @include('messages.print-crud-message')
          <div class="card-body">
            <div class="m-5">
                <form method="POST" action="{{ route('expensesTypes.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="form-group" style="margin: 20px;">
                  <p class="font-weight-bold"  for="inputAddress">{{ __('translation.expenses types.Expense Type Name') }}</p>
                  <input type="text" name="type" class="form-control" id="type" required>
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
</div>
</div>
@endsection

@extends('layouts.app', ['activePage' => 'editexpensetype', 'titlePage' => __('translation.website.sidebar.Edit Expense
Type')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Edit Expense Type') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('expensesTypes.update', $expenseType->slug) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-5" style="margin: 20px; ">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.expenses types.Expense Type Name') }}</p>
                                        <input type="text" name="type" class="form-control" id="type"
                                            value="{{ $expenseType->type }}" required>
                                        @error('type')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    @include('crudButtons.update-buttons')
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection

@extends('layouts.app', ['activePage' => 'addExpense', 'titlePage' => __('translation.website.sidebar.Create New Expense')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Create New Expense') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="m-5">
                            <div class="card-body">
                                <form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 form-group ">
                                            <p style="margin:0px;" class="font-weight-bold" for="inputAddress">
                                                {{ __('translation.expenses.Value') }}</p>
                                            <input type="number" name="value" class="form-control" id="value"
                                            value="{{ old('value') }}" required>
                                            @error('value')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>

                                        <div class="col-6 form-group">
                                            <p class="font-weight-bold" for="inputAddress">
                                                {{ __('translation.expenses.Date') }}</label>
                                                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
                                                @error('date')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="font-weight-bold" for="inputAddress">
                                            {{ __('translation.expenses.Expense Type') }}</label>
                                            <br>
                                            <select class="form-control form-group" name="expense_Type_id" style="width: 100%">
                                                <option value=""></option>
                                                @foreach($expenseTypes as $expensesType)
                                                <option value={{$expensesType->id}}>{{$expensesType->type}}</option>
                                                @endforeach

                                            </select>
                                            @error('expensesType')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
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

@endsection

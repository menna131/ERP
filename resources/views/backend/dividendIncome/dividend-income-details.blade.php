@extends('layouts.app', ['activePage' => 'dividendIncomeDetails', 'titlePage' =>  __('translation.website.sidebar.Dividend Income Details')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-mode">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">{{  __('translation.website.sidebar.Dividend Income Details') }}</h4>
            </div>
          </div>
          <div class="m-2">
            <div class="card-body">

                <table class="table table-bordered  rounded">
                    <thead class="">
                        <tr>
                            <th>{{__('translation.dividendIncome.Partners')}}</th>
                            <th>{{__('translation.dividendIncome.Capital')}}</th>
                            <th>{{__('translation.dividendIncome.Percentage In Money')}}</th>
                            <th>{{__('translation.dividendIncome.Percentage In Effort')}}</th>
                            <th>{{__('translation.dividendIncome.Profit In Money')}}</th>
                            <th>{{__('translation.dividendIncome.Profit In Effort')}}</th>
                            <th>{{__('translation.dividendIncome.Total Profit')}}</th>
                            <th>{{__('translation.dividendIncome.Capital After Profit')}}</th>
                            <th>{{__('translation.dividendIncome.Total Withdraw')}}</th>
                            <th>{{__('translation.website.crud.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td >Galal</td>
                            <td>25000</td>
                            <td >20%</td>
                            <td>25%</td>
                            <td >1500 EGP</td>
                            <td>2000 EGP</td>
                            <td >3500 EGP</td>
                            <td>28500 EGP</td>
                            <td >0 EGP</td>
                            <td class="td-actions">
                                    <a class="btn btn-info" rel="tooltip" title="{{__('translation.expenses.Show')}}"
                                    href="#"
                                    style="color:white;"> <i class="material-icons">visibility</i></a>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

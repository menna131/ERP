@extends('layouts.app', ['activePage' => 'dividendIncome', 'titlePage' =>  __('translation.website.sidebar.Dividend Income')])

@section('content')



<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-mode">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title">{{  __('translation.website.sidebar.Dividend Income') }}</h4>
            </div>
          </div>
          <div class="m-5">
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.reports.Month') }}</th>
                            <th>{{ __('translation.dividendIncome.Capital') }}</th>
                            <th>{{ __('translation.dividendIncome.Profit') }}</th>
                            <th>{{ __('translation.dividendIncome.Capital After Profit') }}</th>
                            <th>{{ __('translation.dividendIncome.Status') }}</th>
                            <th>{{ __('translation.expenses types.Actions') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >5/2020</td>
                            <td>100000 EGP</td>
                            <td>25000 EGP</td>
                            <td>125000 EGP</td>
                            <td>Done</td>
                            <td class="td-actions">
                                <a class="text-danger" rel="tooltip" title="{{__('translation.expenses.Edit')}}"
                                    href="{{ route('dividend-income-details', 5) }}" data-toggle="modal" data-target="#exampleModalLong"
                                    style="color:white;"><span class="material-icons">error_outline</span>
                                </i>
                                  </a>
                                {{-- <a class="btn btn-info" rel="tooltip" title="{{__('translation.expenses.Show')}}"
                                    href="#"
                                    style="color:white;"> <i class="material-icons">visibility</i></a> --}}
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
{{-- modal body  --}}

@include('layouts.includes.modal',
        ['modalSize'=>"modal-lg",
        'modalTitleColor'=>"h2 text-primary",
        'modalTitle'=>__('translation.website.sidebar.Dividend Income')." : <span class='font-weight-bold'>  25000 ".__('translation.website.crud.EGP'),
        // 'modalBody'=>"<h1>Your First Modal Body Is Here</h1>",
        // 'modalActions'=>"<button class='btn btn-primary'>Confirm</button>"
        ])
<div class="container d-none" id="modal-content">
    <form action="{{route('dividend-income-details',2)}}}" method="get">
    <div class="row">
        {{-- <div class="col-12">

           <h1 class="h3 text-center text-dark"> Profit : <span class="font-weight-bold">  25000 EGP </span></h1>
        </div> --}}
        <div class="col-6">
            <div class="card card-mode">
                <div class="card-header card-header-text card-header-primary mx-auto text-center">
                  <div class="card-text">
                    <h4 class="card-title">{{__('translation.dividendIncome.Money')}} : <span class="font-weight-bold"> 12500 {{__('translation.website.crud.EGP')}}</span></h4>
                  </div>
                </div>
                <div class="m-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-check form-check-radio">
                            {{-- <label class="form-check-label" id="Fixed"> --}}
                                <label id="Fixed" for="FixedPercentage"> {{__('translation.dividendIncome.FIxed Percentage')}} </label>
                                <input id="FixedPercentage"  type="radio"  name="exampleRadios"  value="option1" >

                                {{-- <span class="circle">
                                    <span class="check"></span>
                                </span> --}}
                            {{-- </label> --}}
                          </div>
                          <div class="form-check form-check-radio">
                              {{-- <label class="form-check-label" id="Customized"> --}}
                                  <label id="Customized" for="CustomizedPercentage"> {{__('translation.dividendIncome.Customized Percentage')}} </label>
                                  <input id="CustomizedPercentage"  type="radio" name="exampleRadios"  value="option2">

                                  {{-- <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label> --}}
                          </div>
                        </div>
                        <div class="col-6">
                          <div id="hiddenForm" class="d-none">
                            <div class="form-group">
                                <p for="partner11"> Galal </p>
                                <input type="text" class="form-control" name="percentage" id="partner11">
                            </div>
                            <div class="form-group">
                                <p for="partner22"> Menna </p>
                                <input type="text" class="form-control" name="percentage" id="partner22">
                            </div>
                            <div class="form-group">
                                <p for="partner33"> Maddona </p>
                                <input type="text" class="form-control" name="percentage" id="partner33">
                            </div>
                            <div class="form-group">
                                <p for="partner44"> Reem </p>
                                <input type="text" class="form-control" name="percentage" id="partner44">
                            </div>
                        </div>
                        </div>
                      </div>

                  </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-mode">
                <div class="card-header card-header-text card-header-primary  mx-auto text-center">
                  <div class="card-text  ">
                    <h4 class="card-title">{{__('translation.dividendIncome.Effort')}} : <span class="font-weight-bold"> 12500 {{__('translation.website.crud.EGP')}}</span></h4>
                  </div>
                </div>
                <div class="m-3">
                  <div class="card-body">

                    <div class="form-group ">
                        <p for="partner1"> Galal </p>
                        <input type="text" class="form-control" name="percentage" id="partner1">
                    </div>
                    <div class="form-group">
                        <p for="partner2"> Menna </p>
                        <input type="text" class="form-control" name="percentage" id="partner2">
                    </div>
                    <div class="form-group">
                        <p for="partner3"> Maddona </p>
                        <input type="text" class="form-control" name="percentage" id="partner3">
                    </div>
                    <div class="form-group">
                        <p for="partner4"> Reem </p>
                        <input type="text" class="form-control" name="percentage" id="partner4">
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col-2">
                <button class='btn btn-primary'>{{__('translation.website.crud.Confirm')}}</button>

            </div>
            <div class=" offset-8 col-2">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('translation.website.crud.Close')}}</button>

            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('js')
<script>

    var form = document.getElementById('modal-content');
    document.getElementById('modal-body').innerHTML= form.innerHTML;

    $('#Customized,#CustomizedPercentage').click(function(){
        $('#hiddenForm').removeClass("d-none");
    });
    $('#Fixed,#FixedPercentage').click(function(){
        $('#hiddenForm').addClass("d-none");
    });
</script>
<script>


</script>
@endpush



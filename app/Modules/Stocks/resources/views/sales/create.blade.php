@extends('layouts.app', ['activePage' => 'addSale', 'titlePage' => __('translation.website.sidebar.Add Sale')])
@push('css')
<!-- bootstrap -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<!-- fontAwsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
<!-- myStyle -->
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}" type="text/css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- select2 -->
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush
@section('content')
    @include('layouts.includes.modals.create-client-modal')
    @include('layouts.includes.modals.create-installment-modal')


    <div class="content">
        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Add Sale') }}</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="m-5">
                                <form enctype="multipart/form-data" method="post" action="{{ route('show.req') }}">
                                    @csrf




                                    {{-- <select class="selectpicker" data-live-search="true">
                                        <option data-tokens="case1">network</option>
                                        <option data-tokens="case2">web development</option>
                                        <option data-tokens="case3">design art</option>
                                      </select> --}}

                                    <div class="usersale mb-5 row p-4">
                                        <div class="form-group col-sm-12 col-md-6 col-ld-5 ">
                                            <p class="font-weight-bold mb-0" for="inputAddress">
                                                {{ __('translation.clients.Name') }}</p>
                                            <select class="select-client client_dropdown w-50 px-2 custom-select"
                                                name="client-name" data-live-search="true">

                                                <option value="0">{{ __('Select client') }}</option>
                                                @if (isset($clients))
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"> {{ $client->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('client-name')
                                                <div class="alert alert-danger">
                                                @foreach($message as $key => $value)
                                                    @if($key == 'client-name.required' )
                                                        {{ $value }}
                                                    @endif
                                                @endforeach
                                                </div>
                                            @enderror



                                            <a href="" data-toggle="modal" data-target="#addCustomerModal"
                                                class="text-primary ml-3 link"><i class="fa fa-plus"
                                                    aria-hidden="true"></i>
                                                    {{ __('translation.clients.Add Client') }}</a>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-3 w-50">
                                            <p class="font-weight-bold d-inline" for="inputAddress">
                                                {{ __('translation.sales.Invoice Number') }} :</p>
                                            <p class="d-inline">5</p>
                                            <br>
                                            <p class="font-weight-bold d-inline" for="inputAddress">
                                                {{ __('translation.sales.Order Date') }} :</p>
                                            <input class="form-control form-select d-inline" type="date" name="sale-date" id="today">
                                            {{-- <input type="text" placeholder="MM/DD/YYYY" onfocus="(this.type='date')"> --}}
                                            @error('sale-date')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        $temp_supplier = '3';
                                    @endphp

                                    <div class="container">
                                        <div class="row">
                                            <div id="divTable" class="col-sm-10 col-md-12 col-lg-12">
                                                <div id="product-form">
                                                    <div id="general-error" class="text-danger font-weight-bold">

                                                    </div>

                                                    <table class="table" id="Table" width="100%">
                                                        <thead>
                                                            <tr class="font-weight-bold">
                                                                <th class="">#</th>
                                                                <th style="width:20%">{{ __('translation.sales.Items') }}</th>
                                                                <th style="width:20%">{{ __('translation.sales.Supplier') }}</th>
                                                                <th>{{ __('translation.sales.QTY') }}</th>
                                                                <th>{{ __('translation.sales.Price') }}</th>
                                                                <th>{{ __('translation.sales.Total') }}</th>
                                                                <th colspan="">{{ __('translation.sales.Actions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody" name="tbody">

                                                            {{-- -------------------------------------------------------------- --}}

                                                            <tr class="data position-relative">
                                                                <td scope="row" class="th-btn-custom-remove">
                                                                    <button class="btn-custom-remove" type="button"
                                                                        id="delbut[1]" onclick="delRow(this)"
                                                                        title="{{ __('translation.website.crud.Delete Row') }}">
                                                                        <i class=" custom-remove-icon fas fa-trash-alt"></i>
                                                                    </button>
                                                                    <span id="span-count">1</span>


                                                                </td>
                                                                <td class="form-group selectBox">
                                                                    {{-- <select class="form-select product m-2" id="all-product-immediately" name="data[0]product"> --}}
                                                                    <select
                                                                        class="product form-select product item_dropdown my-3 px-2 select-custom custom-select"
                                                                        number="0" id="product0" name="data[0][product]"
                                                                        onchange="getSuppliers(this)"
                                                                        placeholder=
                                                                        >
                                                                        <option value="0" disabled selected>
                                                                            {{ __('translation.sales.choose a product') }}
                                                                        </option>

                                                                        @foreach ($products as $product)
                                                                            <option value="{{ $product->id }}">
                                                                                {{ $product->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div id="data.0.product"
                                                                        class="text-danger font-weight-bold">

                                                                    </div>
                                                                </td>

                                                                <td class="form-group selectBox">
                                                                    <select
                                                                        class="form-control supplier_dropdown form-select supplier my-2 px-2"
                                                                        id="supplier0" data="0" name="data[0][supplier]">
                                                                        <option value="0" disabled selected
                                                                            style="background-color: transparent">
                                                                            {{ __('translation.sales.avaliable supplier') }}
                                                                        </option>

                                                                    </select>
                                                                    <div id="data.0.supplier"
                                                                        class="text-danger font-weight-bold">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control quantity" type="number"
                                                                        id="quantity0" name="data[0][quantity]" quantity="0"
                                                                        onkeyup="calcTotalFromQuantity(this)" />
                                                                    <div id="data.0.quantity"
                                                                        class="text-danger font-weight-bold">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control price" type="number"
                                                                        id="price0" name="data[0][price]" price="0"
                                                                        onkeyup="calcTotalFromPrice(this)" />
                                                                    <div id="data.0.price"
                                                                        class="text-danger font-weight-bold">
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <input class="form-control total-price" id="total0"
                                                                        total="0" type="number" name="data[0][total]" readonly
                                                                        style="background-color: transparent" />
                                                                    <div id="data.0.total"
                                                                        class="text-danger font-weight-bold">
                                                                    </div>
                                                                </td>


                                                                <td>
                                                                    <div type="button" class="btn btn-primary"
                                                                        style="color:white;" id="addbut"
                                                                        title="{{ __('translation.website.crud.Add Row') }}"
                                                                        onclick="appendRow()" />
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                    <div>
                                                                </td>



                                                            </tr>
                                                        </tbody>

                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="usersale mt-5 row">
                                        <div class="form-group col-sm-12 col-md-5 col-lg-5 m-4">
                                            <p class="font-weight-bold form-group" for="inputAddress">
                                                {{ __('translation.sales.Payment Type') }}</p>
                                            <select id="payment_drop"

                                                class="payment_dropdown border border-dark rounded w-50 custom-select"
                                                name="payment">

                                                <option value="0">{{ __('translation.sales.Payment Type') }}</option>
                                                <option value="cash">Cash</option>
                                                <option value="install">Install</option>
                                            </select>
                                            @error('payment')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <p class="form-group" for="inputAddress">
                                                {{ __('translation.sales.Note') }}</p>
                                            <textarea name="note" rows="5" cols="30" class=" border border-dark rounded w-50 backgroundcolor"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-5 col-lg-5 m-4 text-right py-3">
                                            <div class="form-inline">
                                                <p class="font-weight-bold d-inline m-3" for="inputAddress">
                                                    {{ __('translation.sales.Total') }} : </p>
                                                <input class="form-control" type="number" name="sum-of-total" readonly
                                                    style="background-color: transparent" />
                                            </div>

                                            <div class="form-inline">
                                                <p class="font-weight-bold d-inline m-3" for="inputAddress">
                                                    {{ __('translation.sales.Discount') }} : </p>
                                                <input type="text"
                                                    class="form-control border border-dark rounded text-right w-25 backgroundcolor"
                                                    placeholder="  %  " name="discount-percentage"
                                                    onkeyup="totalAfterDiscount()">
                                                - <input type="text"
                                                    class="form-control border border-dark rounded text-right w-25 backgroundcolor"
                                                    placeholder="  LE  " name="discount-LE"
                                                    readonly style="background-color: transparent" />
                                            </div>

                                            <div class="form-inline">
                                                <p class="font-weight-bold d-inline px-3" for="inputAddress">
                                                    {{ __('translation.sales.Final Total') }} :</p>
                                                <input type="text" name="total-after-discount" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    {{-- @include('crudButtons.create-buttons') --}}
                                    <button class="btn btn-primary" id="create-product" >
                                        Create Invoice
                                    </button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

   <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <!-- My Ajax Files -->
   <script src="{{ asset('js/sale/addClient.js') }}" url="{{ route('store.client') }}"></script>
   <script src="{{ asset('js/sale/getSupplier.js') }}" url="{{ route('get.suppliers.options') }}"></script>

    <!-- My ScriptFile -->
    <script src="{{ asset('js/sale/createSaleScript.js') }}"></script>

@endpush


@extends('layouts.app', ['activePage' => 'addPurchase', 'titlePage' => __('translation.website.sidebar.add Purchase')])
@push('css')
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <!-- myStyle -->
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}" type="text/css">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush


@section('content')
    @livewireStyles
    @include('layouts.includes.modals.create-supplier-modal')
    @include('layouts.includes.modals.create-installment-modal')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.add Purchase') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form>
                                    <div class="container">
                                        <div class="row justify-content-between">
                                            <div class="form-group col-4" style="margin: 20px;">
                                                <select style="width: 50%"
                                                    class="supplier_dropdown select-supplier w-50 px-2 custom-select "
                                                    name="supplier-name">
                                                    <option value="0" selected>
                                                        {{ __('translation.purchase.select supplier') }}
                                                    </option>
                                                    @if (isset($suppliers))
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"> {{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div onclick="" data-toggle="modal" style="display: inline; cursor:pointer;"
                                                    data-target="#addSupplierModal" class=" ml-3 "><i
                                                        class="fa fa-plus" aria-hidden="true"></i>
                                                    {{ __('translation.purchase.new supplier') }}
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <p class="font-weight-bold" style="display:inline;" for="inputAddress">
                                                    {{ __('translation.purchase.Invoice Number') }} :</p>
                                                <p style="display:inline;">5</p>
                                                <br>
                                                <p class="font-weight-bold " style=" display:inline;" for="inputAddress">
                                                    {{ __('translation.purchase.Order Date') }} :</p>
                                                    <input class="form-control form-select d-inline" type="date" name="purchase-date" id="today">
                                                    {{-- <input type="text" placeholder="MM/DD/YYYY" onfocus="(this.type='date')"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
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
                                                                <th style="width:20%">{{ __('translation.sales.Items') }}
                                                                </th>
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
                                                                        class="form-select product item_dropdown my-3 px-2 select-custom custom-select"
                                                                        number="0" id="product0" name="data[0][product]">
                                                                        <option value="0" readonly>
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
                                                    <button class="btn btn-primary" id="create-product"> Create Products
                                                    </button>
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
                                                    placeholder="  LE  " name="discount-LE" onkeyup="totalAfterDiscountLe()"
                                                    readonly style="background-color: transparent" />
                                            </div>

                                            <div class="form-inline">
                                                <p class="font-weight-bold d-inline px-3" for="inputAddress">
                                                    {{ __('translation.sales.Final Total') }} :</p>
                                                <input type="text" name="total-after-discount" class="form-control">
                                            </div>

                                        </div>
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
    @livewireScripts
    {{-- payment modal  body --}}
    <div class="container-fluid d-none" id="payment-content" style="margin:0px; padding:0px;">
        @include('layouts.includes.modals.create-installment-modal')
    </div>
    {{-- create tran modal action --}}
    <div class=" d-none" id="create-modal-action">
        <button class='btn btn-primary'>Save Changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
@endsection
@push('js')

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- AjaxLink -->
    <!-- My AjaxFile -->
    <script src="{{ asset('js/purchases/addSupplier.js') }}" url="{{ route('store.supplier') }}"></script>
    <!-- My ScriptFile -->
    <script src="{{ asset('js/purchases/createPurchasesScript.js') }}"></script>


@endpush

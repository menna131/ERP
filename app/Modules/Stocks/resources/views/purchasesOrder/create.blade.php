@extends('layouts.app', ['activePage' => 'addpurchaseOrder', 'titlePage' => __('translation.website.sidebar.add pre Purchase')])

@section('content')
    @livewireStyles
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.add pre Purchase') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form>
                                    <div class="container">
                                        <div class="row justify-content-between">
                                            <div class="form-group col-4" style="margin: 20px;">
                                                <select style="width: 50%" class="supplier_dropdown" name="supplier-name">
                                                    <option value="0"> {{ __('translation.purchase.select supplier') }}
                                                    </option>
                                                    <option value="1">supplier 1 1</option>
                                                    <option value="2">supplier 2</option>
                                                </select>
                                                <div onclick="getCreateSupBodyModal()" data-toggle="modal"
                                                    style="display: inline; cursor:pointer;" data-target="#exampleModalLong"
                                                    class=" ml-3 "><i class="fa fa-plus" aria-hidden="true"></i>
                                                    {{ __('translation.purchase.new supplier') }}
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <p class="font-weight-bold" style="display:inline;"
                                                    for="inputAddress">
                                                    {{ __('translation.purchase.Invoice Number') }} :</p>
                                                <p style="display:inline;">5</p>
                                                <br>
                                                <p class="font-weight-bold " style=" display:inline;"
                                                    for="inputAddress">
                                                    {{ __('translation.purchase.current date') }} :</p>
                                                <input
                                                    style="display: inline;border-radius: 4px; border: #ccc solid 1px;"
                                                    type="date" name="" id="">
                                                    <br>
                                                    <p class="font-weight-bold  " style=" display:inline;"
                                                    for="inputAddress">
                                                    {{ __('translation.purchase.Order Date') }} :</p> &nbsp; &nbsp;
                                                <input
                                                    style="margin-top: 2px; display: inline ;border-radius: 4px;border: #ccc solid 1px;"
                                                    type="date" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <livewire:all-purchases />
                                    <div class="usersale mt-5">
                                        {{-- d-flex justify-content-between col-sm-12 --}}
                                        <div class="form-group col-sm-2 col-md-5 col-lg-5 m-4">
                                            <p class="font-weight-bold form-group" for="inputAddress">
                                                {{ __('translation.sales.Payment Type') }}</p>
                                            <select onclick="payment()" id="payment_drop"
                                                class="payment_dropdown border border-dark rounded w-50" name="payment">
                                                <option value='0'>Select payment Type</option>
                                                <option value="cash">Cash</option>
                                                <option value="install">Install</option>
                                            </select>
                                            <p class="form-group" for="inputAddress">
                                                {{ __('translation.sales.Note') }}</p>
                                            <textarea name="note" rows="5" cols="27"
                                                class=" border border-dark rounded w-50"></textarea>
                                        </div>
                                        <div class="form-group col-sm-2 col-md-5 col-lg-5 m-4 text-right">
                                            <div>
                                                <p class="font-weight-bold d-inline" for="inputAddress">
                                                    {{ __('translation.sales.Discount') }} :</p>
                                                <input type="text" class="border border-dark rounded text-right w-25"
                                                    placeholder="  %  ">
                                                - <input type="text" class="border border-dark rounded text-right w-25"
                                                    placeholder="  LE  ">
                                            </div>
                                            <br>
                                            <p class="font-weight-bold d-inline" for="inputAddress">
                                                {{ __('translation.sales.Total') }} :</p>
                                            <input type="text" name="" class="border border-dark rounded ml-4 w-50">
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
    @include('layouts.includes.modal',
    ['modalSize'=>"modal-lg",
    'modalTitleColor'=>"",
    'modalTitle'=>"first modal",
    ])

    {{-- dynamic Modals --}}
    {{-- add supplier modal  body --}}
    <div class="container-fluid d-none" id="create-supplier-content" style="margin:0px; padding:0px;">
        <livewire:modals.add-supplier />
    </div>
    {{-- add product modal  body --}}
    <div class="container-fluid d-none" id="create-product-content" style="margin:0px; padding:0px;">
        <livewire:modals.addproduct />
    </div>
    {{-- create tran modal action --}}
    <div class=" d-none" id="create-modal-action">
        <button class='btn btn-primary'>Save Changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>


@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".supplier_dropdown").select2();
        });
        $(document).ready(function() {
            $(".payment_dropdown").select2();
        });


        function getCreateSupBodyModal() {
            var form_s = document.getElementById('create-supplier-content');
            document.getElementById('modal-body').innerHTML = form_s.innerHTML;
            var showAction = document.getElementById('create-modal-action');
            document.getElementById('modal-action').innerHTML = showAction.innerHTML;
        }

        function getCreateProductBodyModal() {
            var form_p = document.getElementById('create-product-content');
            document.getElementById('modal-body').innerHTML = form_p.innerHTML;
            var showAction = document.getElementById('create-modal-action');
            document.getElementById('modal-action').innerHTML = showAction.innerHTML;
        }
    </script>
@endpush

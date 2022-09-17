@extends('layouts.app', ['activePage' => 'allInstallments', 'titlePage' => __('translation.website.sidebar.all
Installments')])

@section('content')
    @livewireStyles
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <br>
                        <div class="card-header card-header-tabs card-header-info" style="padding: 5px;">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs outline-primary" data-tabs="tabs">
                                        <li class="nav-item " style="width: 50%; text-align:center;">
                                            <a class="nav-link active" href="#install1" data-toggle="tab">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                {{ __('translation.installments.all Installments elly leya') }}
                                            </a>
                                        </li>
                                        <li onclick="getLivewire()" class="nav-item" style="width: 50%; text-align:center;">
                                            <a class="nav-link" href="#install2" data-toggle="tab">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                {{ __('translation.installments.all Installments elly 3laya') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="install1">
                                    <br>
                                    <br>

                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('translation.installments.id') }}</th>
                                                <th>{{ __('translation.installments.Client name') }}</th>
                                                <th>{{ __('translation.installments.period') }}</th>
                                                <th>{{ __('translation.installments.start date') }}</th>
                                                <th>{{ __('translation.installments.Total invoice value') }}</th>
                                                <th>{{ __('translation.installments.Total number of installments') }}</th>
                                                <th>{{ __('translation.installments.number of installments paid') }}</th>
                                                <th>{{ __('translation.installments.Number of installments left') }}</th>
                                                <th>{{ __('translation.installments.actions') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>3</td>
                                                <td>Andrew Mike</td>
                                                <td>6 months</td>
                                                <td>may 2021</td>
                                                <td>50,000 EG</td>
                                                <td>6 installs</td>
                                                <td>2 installs</td>
                                                <td>4 installs</td>


                                                <td class="td-actions">
                                                    <div onclick="getShowBodyModal()" data-toggle="modal"
                                                        data-target="#exampleModalLong" class="btn btn-info" rel="tooltip"
                                                        title="{{ __('translation.installments.show trans') }}"
                                                        style="color:white;"><i class="material-icons">visibility</i></div>
                                                    &nbsp;&nbsp;

                                                    <div onclick="getCreatBodyModal()" data-toggle="modal"
                                                        data-target="#exampleModalLong" rel="tooltip"
                                                        title="{{ __('translation.installments.add trans') }}"
                                                        class="btn btn-primary" style="color:white;"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="install2">
                                    <livewire:installments-table />
                                </div>
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
    'modalTitle'=>"",
    ])

    {{-- show trans modal  body --}}
    <div class="container-fluid d-none" id="show-modal2-content" style="margin:0px; padding:0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.installments.show Transactions') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <br>
                            <fieldset disabled>
                                <div class="container">
                                    <br>
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="text-center"
                                                    for="disabledTextInput">{{ __('translation.installments.Client name') }}</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="Reem">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label
                                                    for="disabledTextInput">{{ __('translation.installments.Total number of installments') }}</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder=" 6 installs ">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label
                                                    for="disabledTextInput">{{ __('translation.installments.number of installments paid') }}</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="2 installs paid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <div class="table-responsive-sm">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:15%">{{ __('translation.installments.installment Number') }}
                                            </th>
                                            <th>{{ __('translation.installments.installment date') }}</th>
                                            <th>{{ __('translation.installments.real payment date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>11 May 2021</td>
                                            <td>11 May 2021</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>11 June 2021</td>
                                            <td>13 June 2021</td>
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
    {{-- show tran modal action --}}
    <div class=" d-none" id="show-modal-action">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <br>
    </div>
    {{-- create trans modal  body --}}
    <div class="container-fluid d-none" id="creat-modal2-content" style="margin:0px; padding:0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Create Transaction') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <fieldset disabled>
                                    <div class="container">
                                        <br>
                                        <div class="row ">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.Client name') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Reem">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.period') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="in 6 months">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.transcation Type') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="{{ __('translation.installments.in installments') }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group" style="margin: 20px;">
                                    <p class="font-weight-bold"  for="inputAddress">
                                        {{ __('translation.installments.operation date') }}</label>
                                        <input type="date" name="date" class="form-control" id="inputAddress" required
                                            placeholder="please choose transaction date">
                                </div>
                                <div class="form-group" style="margin: 20px;">
                                    <p class="font-weight-bold"  for="inputAddress">
                                        {{ __('translation.installments.transaction amount') }}</label>
                                        <input type="number" name="amount" class="form-control" id="inputAddress" required
                                            placeholder="please enter transaction amount ">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- create tran modal action --}}
        <div class=" d-none" id="create-modal-action">
            <button class='btn btn-primary'>Save Changes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <br>
        </div>
        {{-- show trans modal livewire  body --}}
        <div class="container-fluid d-none" id="show-modal-content" style="margin:0px; padding:0px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('translation.installments.show Transactions') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <br>
                                <fieldset disabled>
                                    <div class="container">
                                        <br>
                                        <div class="row ">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.Supplier name') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Reem">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.Total number of installments') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder=" 6 installs ">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="disabledTextInput">{{ __('translation.installments.number of installments paid') }}</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="2 installs paid">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <br>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:15%">{{ __('translation.installments.installment Number') }}
                                            </th>
                                            <th>{{ __('translation.installments.installment date') }}</th>
                                            <th>{{ __('translation.installments.real payment date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>11 May 2021</td>
                                            <td>11 May 2021</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>11 June 2021</td>
                                            <td>13 June 2021</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- create trans modal livewire body --}}
        <div class="container-fluid d-none" id="creat-modal-content" style="margin:0px; padding:0px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('translation.website.sidebar.Create Transaction') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <fieldset disabled>
                                        <div class="container">
                                            <br>
                                            <div class="row ">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            for="disabledTextInput">{{ __('translation.installments.Supplier name') }}</label>
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="Reem">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            for="disabledTextInput">{{ __('translation.installments.period') }}</label>
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="in 6 months">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            for="disabledTextInput">{{ __('translation.installments.transcation Type') }}</label>
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ __('translation.installments.in installments') }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group" style="margin: 20px;">
                                        <p class="font-weight-bold"  for="inputAddress">
                                            {{ __('translation.installments.operation date') }}</label>
                                            <input type="date" name="date" class="form-control" id="inputAddress" required
                                                placeholder="please choose transaction date">
                                    </div>
                                    <div class="form-group" style="margin: 20px;">
                                        <p class="font-weight-bold"  for="inputAddress">
                                            {{ __('translation.installments.transaction amount') }}</label>
                                            <input type="number" name="amount" class="form-control" id="inputAddress"
                                                required placeholder="please enter transaction amount ">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection



    @push('js')
        <script>
            function getLivewire() {
                Livewire.emit('installLivewire')
            }

            function getShowBodyModal() {
                var formShow2 = document.getElementById('show-modal2-content');
                document.getElementById('modal-body').innerHTML = formShow2.innerHTML;
                var showAction = document.getElementById('show-modal-action');
                document.getElementById('modal-action').innerHTML = showAction.innerHTML;
            }

            function getCreatBodyModal() {
                var formCreate2 = document.getElementById('creat-modal2-content');
                document.getElementById('modal-body').innerHTML = formCreate2.innerHTML;
                var createAction = document.getElementById('create-modal-action');
                document.getElementById('modal-action').innerHTML = createAction.innerHTML;
            }

            function getShowBodyModalLivewire() {
                var formShow = document.getElementById('show-modal-content');
                document.getElementById('modal-body').innerHTML = formShow.innerHTML;
                var showAction = document.getElementById('show-modal-action');
                document.getElementById('modal-action').innerHTML = showAction.innerHTML;
            }

            function getCreatBodyModalLivewire() {
                var formCreate = document.getElementById('creat-modal-content');
                document.getElementById('modal-body').innerHTML = formCreate.innerHTML;
                var createAction = document.getElementById('create-modal-action');
                document.getElementById('modal-action').innerHTML = createAction.innerHTML;
            }
        </script>

    @endpush

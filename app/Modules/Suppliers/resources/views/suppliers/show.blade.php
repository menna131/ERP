@extends('layouts.app', ['activePage' => 'show-suppliers', 'titlePage' => __('translation.website.sidebar.Show Supplier Details')])
@push('css')
    <link rel="stylesheet" href="{{ url('material/css/1.10.25/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('material/css/buttons/1.6.2/css/buttons.dataTables.min.css') }}">
    @livewireStyles

@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Basic Information') }}</h4>
                            </div>
                        </div>
                        @include('messages.print-crud-message')
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.ID') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.Name') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.Nickname') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.Phone') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.Address') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.suppliers.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td> {{$supplier->id}}</td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->nickname}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td><a class='btn btn-info btn-sm' rel='tooltip' title="{{__('translation.title.Edit Supplier')}}"
                                            href="{{route('suppliers.edit', $supplier->slug)}}"><i class='material-icons'>edit</i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Supplier Products') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{ __('translation.products.id') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.products.Product Name') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.products.Brand') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.products.Category') }}</th>
                                        <th class="font-weight-bold">
                                            {{ __('translation.products.Primary Purchase Price') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.products.Primary Sale Price') }}
                                        </th>
                                        <th class="font-weight-bold">{{ __('translation.products.Total Stock') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> كفة مرآة فيرنا يمين 2018</td>
                                        <td>اكسسوارات</td>
                                        <td>19 جنيه</td>
                                        <td>19 جنيه</td>
                                        <td>1900</td>
                                        <td>1900</td>
                                        <td>19 جنيه</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Price List') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="text-right ml-auto mb-5">
                            <a class='btn btn-primary btn-sm text-right' rel='tooltip' title='{{__('translation.title.add in price list')}}'
                            href='{{route('suppliers.pricelists.create',$supplier->slug)}}'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>
                           </div>
                            <table class="table" id="data-table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{ __('translation.pricelists.ID') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.pricelists.Name') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.pricelists.Price') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.pricelists.Made in') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.pricelists.Notes') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.website.crud.Actions') }}</th>
                                    </tr>
                                </thead>
                            </table>
                            <form method='post' class='d-inline' action="{{ route('suppliers.pricelists.destroy',['supplier'=>$supplier->slug,'pricelist'=>5]) }}" id='delete'>
                                @csrf
                                @method('DELETE')
                            </form>
                            <div>
                                @livewire('media.delete-supplier-media',['model_id'=>$supplier->id])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Purchases') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{ __('translation.purchase.ID') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.purchase.Type') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.purchase.Total') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.purchase.Purchase Date') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.purchase.Recieve Date') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.purchase.Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> كفة مرآة فيرنا يمين 2018</td>
                                        <td>اكسسوارات</td>
                                        <td>19 جنيه</td>
                                        <td>1-2-2020</td>
                                        <td>25-5-2020</td>
                                        <td>on</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Installment') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">{{ __('translation.sales.ID') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Type') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Total') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Order Date') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Recieve Date') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Discount') }}</th>
                                        <th class="font-weight-bold">{{ __('translation.sales.Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> كفة مرآة فيرنا يمين 2018</td>
                                        <td>اكسسوارات</td>
                                        <td>19 جنيه</td>
                                        <td>19 جنيه</td>
                                        <td>1-2-2020</td>
                                        <td>25-5-2020</td>
                                        <td>on</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Supplier Wallet') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a class="btn btn-info" rel="tooltip"
                                        title="{{ __('translation.title.show Transactions') }}"
                                        href="{{ route('show.supplier.wallet.trans',$supplier->wallet->slug)}}"><i
                                            class="material-icons">visibility</i></a>
                                    <a class="btn btn-info" rel="tooltip"
                                        title="{{ __('translation.title.Add Transaction') }}"
                                        href="{{route('create.supplier.wallet.trans',$supplier->wallet->slug) }}"> <i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">

                                                <i class="material-icons">
                                                    account_balance_wallet
                                                </i>
                                            </div>
                                            <p class="card-category">{{ __('translation.wallet.Total Balance') }}</p>
                                            <h3 class="card-title">{{ $supplier->wallet->total_value }}
                                                <small>EGP</small>
                                            </h3>
                                        </div>>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">store</i>
                                            </div>
                                            <p class="card-category">
                                                {{ __('translation.wallet.Number Of Transactions') }}</p>
                                            <h3 class="card-title">{{ $supplier->wallet->number_of_transaction }}

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">paid</i>
                                            </div>
                                            <p class="card-category">{{ __('translation.wallet.Total Paied') }}</p>
                                            <h3 class="card-title">{{ $supplier->wallet->total_paid }}
                                                <small>EGP</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">info_outline</i>
                                            </div>
                                            <p class="card-category">{{ __('translation.wallet.Pending') }}</p>
                                            <h3 class="card-title">{{ $supplier->wallet->total_pending }}
                                                <small>EGP</small>
                                            </h3>
                                        </div>
                                    </div>
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


@push('js')
@livewireScripts
    <!-- jQuery -->
    <script src="{{url('material/js/code.jquery.com/jquery.js')}}"></script>
    <!-- DataTables -->
    <script src="{{url('material/js/1.10.25/js/jquery.dataTables.min.js')}}"></script>
    {{-- Button extension --}}
    {{-- Buttons for export excel / csv--}}
    <script src="{{url('material/js/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('material/js/buttons/1.5.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('material/js/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
    {{-- Button for PDF export--}}
    {{-- <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
        <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script> --}}
    <script type="text/javascript" src="{{ url('material/js/datatable/pdfMake/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('material/js/datatable/pdfMake/vfs_fonts.js') }}"></script>
    {{-- Button for print--}}
    <script src="{{url('material/js/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
    {{-- Button column visability--}}
    <script src="{{url('material/js/buttons/1.5.2/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "{{ __('translation.website.datatable.All') }}"]
                ],
                dom: 'lBfrtip',
                language: {
                    url: '{{ url('material/js/datatable/' . app()->getLocale() . '-datatable.json') }}',
                },
                ajax: '{!! route('priceList.data',$supplier->id) !!}',
                lengthChange: true,
                // pageLength: 10,
                // lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'price',
                        name: 'price',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'made_in',
                        name: 'made_in',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'notes',
                        name: 'notes',
                        orderable: true,
                        searchable: true
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                buttons: [{
                        extend: 'collection',
                        text: '{{ __('translation.website.datatable.Options') }}', // Label
                        className: '', // class name
                        buttons: [{
                                extend: 'excelHtml5', // Export to excel button
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible' // Only visible columns available for export
                                }
                            },
                            {
                                extend: 'csvHtml5', // Export to CSV button
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible' // Only visible columns available for export
                                }
                            },
                            {
                                extend: 'pdfHtml5', // Export to PDF button
                                orientation: 'landscape',
                                pageSize: 'A4',
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible', // Only visible columns available for export
                                    orthogonal: "myExport",
                                },
                                customize: function(doc) {
                                    pdfMake.fonts = {
                                        DroidKufi: {
                                            normal: 'DroidKufi-Regular.ttf',
                                            bold: 'DroidKufi-Regular.ttf',
                                            italics: 'DroidKufi-Regular.ttf',
                                            bolditalics: 'DroidKufi-Regular.ttf'
                                        }
                                    };
                                    doc.defaultStyle.font = 'DroidKufi';
                                    doc.styles.tableBodyEven.alignment = "center";
                                    doc.styles.tableBodyEven.direction = "rtl";
                                    doc.styles.tableBodyOdd.alignment = "center";
                                    doc.styles.tableBodyOdd.direction = "rtl";
                                    doc.styles.tableHeader.alignment = "center";
                                    doc.styles.tableHeader.direction = "rtl";
                                    // console.log(doc);
                                    // i stopped into rtl in pdf and english and rtl in print errors
                                }

                            },
                            {
                                extend: 'print', // Print button
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible' // Only visible columns available for export
                                },
                                customize: function(win) {
                                    $(win.document.body).find('th').addClass('display').css(
                                        'text-align', 'center');
                                    $(win.document.body).find('table').addClass('display').css(
                                        'font-size', '16px');
                                    $(win.document.body).find('table').addClass('display').css(
                                        'text-align', 'center');
                                    $(win.document.body).find('tr:nth-child(odd) td').each(
                                        function(index) {
                                            $(this).css('background-color', '#D0D0D0');
                                        });
                                    $(win.document.body).find('h1').css('text-align', 'center');

                                }
                            }
                        ]
                    },

                    {
                        extend: 'colvis', // Manage column visibity
                        className: '', // class name
                        text: '{{ __('translation.website.datatable.Columns') }}' // Label
                    }
                ],
                columnDefs: [{
                    targets: '_all',
                    targets: "hiddenCols",
                    visible: false,
                    render: function(data, type, row) {
                        if (type = 'myExport') {
                            return data.split(' ').reverse().join(' ');
                        }
                        return data;
                    }
                }],
                initComplete: function(settings, json) {
                    $('.delete-button').on('click', function() {
                        if (confirm('Are You Sure')) {
                            // get slug from button
                            let slug = $(this).attr('data');
                            // get action from form
                            let action = $('#delete').attr('action');
                            // convert action into array
                            let actionArray = action.split('/');
                            // get last index of array to replace it with current slug
                            let lastIndex = actionArray.length - 1;
                            actionArray[lastIndex] = slug;
                            // reverse array to string again
                            action = actionArray.join('/');
                            // pass new action to form
                            $('#delete').attr('action', action);
                            // submit form
                            $('#delete').submit();
                        } else {
                            return false;
                        }

                    });
                },
                "createdRow": function(row, data, dataIndex) {
                    //    $(row).children(":first").html(dataIndex+1);
                },
            });
        });
    </script>
@endpush

@extends('layouts.app', ['activePage' => 'allUserTransactions', 'titlePage' => __('translation.website.sidebar.All Transactions')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card card-mode">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('translation.website.sidebar.All Transactions') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-mode  mb-3 " >
                                    <div class="card-body ">
                                        @include('layouts.includes.filter',['every'=>true,'from'=>true,'status'=>true,'to'=>true])
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right mt-5">
                                    <table class="table" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('translation.walletTransaction.ID') }}</th>
                                                <th>{{ __('translation.users.Name') }}</th>
                                                <th>{{ __('translation.wallet.Total Balance') }}</th>
                                                <th>{{ __('translation.wallet.Number Of +') }}</th>
                                                <th>{{ __('translation.wallet.Total Paied') }}</th>
                                                <th>{{ __('translation.wallet.Pending') }}</th>
                                                <th>{{ __('translation.walletTransaction.Actions') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
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
    <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
    <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
    {{-- Button for print--}}
    <script src="{{url('material/js/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
    {{-- Button column visability--}}
    <script src="{{url('material/js/buttons/1.5.2/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange:true,
                pageLength:10,
                lengthMenu:[[10,25,50,-1],[10,25,50,"{{ __('translation.website.datatable.All') }}"]],

                dom:'lBfrtip',
                language: {
                    url:'{{ url('material/js/datatable/'.app()->getLocale().'-datatable.json') }}',
                },
                ajax: '{!! route('userwalletTrans.data') !!}',

                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'user_wallet_id',
                        name: 'user_wallet_id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'reason',
                        name: 'reason',
                        orderable: true,
                        searchable: true
                    },

                    {
                        data: 'transaction_date',
                        name: 'transaction_date',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'user_wallet_transactionable_type',
                        name: 'user_wallet_transactionable_type',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'user_wallet_transactionable_id',
                        name: 'user_wallet_transactionable_id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'transaction_status',
                        name: 'transaction_status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        orderable: true,
                        searchable: true
                    }

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
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible' // Only visible columns available for export
                                }
                            },
                            {
                                extend: 'print', // Print button
                                className: '', // class name
                                exportOptions: {
                                    columns: ':visible' // Only visible columns available for export
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
                "initComplete": function(settings, json) {
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
            });
        });
    </script>
@endpush

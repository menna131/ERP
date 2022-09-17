@extends('layouts.app', ['activePage' => 'all-users', 'titlePage' => __('translation.website.sidebar.All Users')])
@push('css')
    <link rel="stylesheet" href="{{ url('material/css/1.10.25/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('material/css/buttons/1.6.2/css/buttons.dataTables.min.css') }}">
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.All Users') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12 text-right">
                                <a href="{{ route('users.create') }}" rel="tooltip"
                                    title="{{ __('translation.title.create User') }}" class="btn btn-primary btn-round mb-3"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i>
                                    {{ __('translation.website.crud.create') }}</a>
                            </div>
                            <table class="table" id="data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('translation.users.ID') }}</th>
                                        <th>{{ __('translation.users.Name') }}</th>
                                        <th>{{ __('translation.users.Email') }}</th>
                                        <th>{{ __('translation.users.Phone') }}</th>
                                        {{-- <th>{{ __('translation.users.Slug') }}</th> --}}
                                        <th>{{ __('translation.users.Role') }}</th>
                                        <th>{{ __('translation.users.Actions') }}</th>
                                    </tr>
                                </thead>
                            </table>
                            <form method='post' class='d-inline' action="{{route('users.destroy',1)}}" id='delete'>
                                @csrf
                                @method('DELETE')
                            </form>
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
     {{-- <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
     <script src="{{url('material/js/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script> --}}
     <script type="text/javascript" src="{{url('material/js/datatable/pdfMake/pdfmake.min.js')}}"></script>
     <script type="text/javascript" src="{{url('material/js/datatable/pdfMake/vfs_fonts.js')}}"></script>
     {{-- Button for print--}}
     <script src="{{url('material/js/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
     {{-- Button column visability--}}
     <script src="{{url('material/js/buttons/1.5.2/js/buttons.colVis.min.js')}}"></script>
    <script>

        $(document).ready(function(){
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
                ajax: '{!! route('user.data') !!}',
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
                        data: 'email',
                        name: 'email',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'slug',
                        name: 'slug',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                buttons: [{
                        extend: 'collection',
                        text: 'Options', // Label
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
                        text: 'Columns' // Label
                    }
                ],
                "initComplete": function(settings, json) {
                    $('.delete-button').on('click',function(){
                        if(confirm('Are You Sure')){
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
                        $('#delete').attr('action',action);
                        // submit form
                        $('#delete').submit();
                        }else{
                            return false;
                        }

                    });
                }
            });
        });
    </script>
@endpush

@extends('layouts.app', ['activePage' => 'editRole', 'titlePage' => __('translation.website.sidebar.Edit Role')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-mode">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('translation.website.sidebar.Edit Role') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-5">
                                <form method="POST" action="{{ route('roles.update', $role->slug) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col form-group m-4">
                                            <p class="font-weight-bold" for="name">
                                                {{ __('translation.roles.Name') }}</p>
                                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="name" placeholder="Enter Name">
                                            @if($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif
                                        </div>
                                    </div>
                                    <div class="row mt-5 ml-2 mb-5">
                                        <div class="col-12 mt-3 mb-3">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="all">
                                                <label class="custom-control-label font-weight-bold" for="all">All</label>
                                            </div>
                                        </div>
                                       @foreach ($allPermissions as $allPermission)
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                        @php
                                                            foreach ($permissions as $permission) {
                                                                if($allPermission->name == $permission->name){
                                                                    echo "checked";
                                                                }
                                                            }
                                                        @endphp
                                                    class="custom-control-input selects" name="permission_id[]" value="{{ $allPermission->id }}" id="Show_{{ $allPermission->id }}">
                                                    <label  class="custom-control-label" for="Show_{{ $allPermission->id }}">{{ $allPermission->name }}</label>
                                                </div>
                                                @if($errors->has('permission_id')) <p class="alert alert-danger">{{ $errors->first('permission_id') }}</p> @endif
                                            </div>
                                       @endforeach
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-info" name="redirect" value="table">{{ __('translation.website.crud.update') }}</button>
                                            <button type="submit" class="btn btn-info" name="redirect" value="back">{{ __('translation.website.crud.Update & Return') }}</button>
                                        </div>
                                        <div class="col-lg-2 offset-6">
                                            <input type="reset" class="btn btn-danger ml-5" value="{{ __('translation.website.crud.Cancel') }}">
                                        </div>
                                    </div>
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
    <script>
        $('#all').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                // the checkbox is checked
                $('.selects').attr('checked', 'checked');
            } else {
                // the checkbox is now no longer checked
                $('.selects').removeAttr('checked');
            }
        });
        // check if all checkboxes are selected
        var checks = document.getElementsByClassName('selects');
        var is_checked = false;
        let count =0;
        let total_permissions_num = <?php echo(count($allPermissions)) ?>;
        for(var x = 0; x < checks.length; x++) {
            if(checks[x].checked) {
                count ++;
            }
        }
        if(count == total_permissions_num){
            $('#all').attr('checked', 'checked');
        }
    </script>
@endpush

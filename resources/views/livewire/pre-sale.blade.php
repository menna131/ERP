{{-- <div class="table-responsive-sm"> --}}
{{-- <div class="table-responsive"> --}}
    <table  class="table text-center table-bordered" >
        {{-- col-sm-12 col-md-12 col-lg-12 --}}
        <thead>
            <tr>
                <th># {{-- session()->get('radio_value') --}}</th>
                <th class="w-25">{{ __('translation.sales.Items') }}</th>
                <th class="w-25">{{ __('translation.sales.Supplier') }}</th>
                <th >{{ __('translation.sales.QTY') }}</th>
                <th>{{ __('translation.sales.Price') }}</th>
                <th>{{ __('translation.sales.Amount') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tr as $key=>$value)
            {!!  $value !!}
            @endforeach
            <tr>
                <td colspane=7>
                    <div wire:click="addTr({{$x}})" class="btn btn-outline-warning">{{ __('translation.sales.add row') }}</div>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $(".item_dropdown").select2();
        });
    </script>
{{-- </div> --}}

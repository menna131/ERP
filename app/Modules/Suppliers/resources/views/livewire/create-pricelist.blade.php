<div>
    <table class=" table text-center table-bordered ">
        <thead>


            <tr>
                <th>#</th>
                <th >{{ __('translation.purchase.product') }}</th>
                <th >{{ __('translation.pricelists.Made in') }}</th>
                <th >{{ __('translation.pricelists.Price') }}</th>
                <th>{{ __('translation.pricelists.Notes') }}</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tr as $key => $value)
                {!! $value !!}
            @endforeach
        </tbody>
    </table>

    <button  wire:click.prevent="addTr({{$x}})"  wire:loading.attr="disabled" class="btn btn-outline-info">
        {{-- wire:loading.class="bg-info" --}}
        {{ __('translation.purchase.add row') }}
    </button>
    <div wire:loading.block class="alert alert-success w-100 text-center">
        processing ...
    </div>


</div>

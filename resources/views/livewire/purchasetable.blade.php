<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <table class="table text-center">
        <thead>

            <tr>
                <th>#</th>
                <th>{{ __('translation.purchase.date') }}</th>
                <th>{{ __('translation.purchase.product') }}</th>
                <th>{{ __('translation.purchase.quantity') }}</th>
                <th>{{ __('translation.purchase.type') }}</th>
                <th>{{ __('translation.purchase.total cost') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($tr as $key=>$value) --}}
            {!!  $value !!}
            {{-- @endforeach --}}
            <tr><td  colspane=5> <div wire:click="test"  class="btn btn-outline-warning"
               >{{ __('translation.purchase.add row') }}</div></td></tr>

        </tbody>
    </table>
</div>

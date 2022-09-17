<div>
    {{-- The best athlete wants his opponent at his best. --}}
<br>
<br>
<div class="table-responsive-sm">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>{{ __('translation.installments.id') }}</th>
                <th>{{ __('translation.installments.Supplier name') }}</th>
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
            {!! $table !!}
        </tbody>
    </table>
</div> 
</div>





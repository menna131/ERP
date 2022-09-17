<?php //var_dump($suppliers_names); ?><?php //var_dump($products); ?><?php //var_dump($testing); ?><?php //var_dump($ids); ?>
<?php //var_dump($suppliers_id); ?><?php //var_dump($invoice_row); ?>
@extends('livewire.parent-livewire')
<div>
    <div class="p-2">
        <form id="form" wire:submit.prevent="save">
            <div class="form-group selectBox">
                <label for="product">{{ __('translation.sales.choose a product') }}: </label>
                <select id="product" wire:model.defer="invoice_row.product" class="form-control inline_selectBox item_dropdown0" name="product">
                    <option value="" readonly>Choose</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->slug }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('invoice_row.product')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group selectBox">
                <label for="supplier">{{ __('translation.sales.choose a supplier') }}: </label>
                <select id="supplier" wire:model.defer="invoice_row.supplier"  class="form-control inline_selectBox item_dropdown" name="supplier">
                    <option value="" readonly>Choose</option>
                    @foreach ($suppliers_names as $supplier)
                        <option  value="{{ $supplier->slug }}">
                            {{ $supplier->name }}&nbsp&nbsp&nbsp
                            ||&nbsp {{ __('translation.products.Primary Purchase Price') }}
                            :&nbsp{{ $initialPrices_forSelectedProduct[0]->primary_purchase_price }}&nbsp&nbsp&nbsp
                            ||&nbsp {{ __('translation.products.Primary Sale Price') }}
                            :&nbsp{{ $initialPrices_forSelectedProduct[0]->primary_sale_price }}</option>
                    @endforeach
                </select>
                @error('invoice_row.supplier')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="quantity">{{ __('translation.sales.choose product quantity') }}: </label>
                    <input id="quantity" name="quantity" wire:model.defer="invoice_row.quantity" class="form-control no-border inline_input">
                    @error('invoice_row.quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div  class="col-6">
                    <label for="price">{{ __('translation.sales.choose product price') }}: </label>
                    <input id="price" value=""  name="price" wire:model.defer="invoice_row.price" class="form-control no-border inline_input">
                    @error('invoice_row.price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button type="submit" wire:model.defer="invoice_row.buttonStatusCheck" class="btn btn-info addToInvoiceButton">{{ __('translation.sales.add to invoice') }}</button>
        </form>
    </div>
    <table class="table text-center table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th class="w-25">{{ __('translation.sales.Items') }}</th>
                <th class="w-25">{{ __('translation.sales.Supplier') }}</th>
                <th>{{ __('translation.sales.QTY') }}</th>
                <th>{{ __('translation.sales.Price') }}</th>
                <th>{{ __('translation.sales.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                {!! $row !!}
            @endforeach
        </tbody>
    </table>
    </div>

</div>

{{-- $(document).ready(function(){
    $('.item_dropdown0').select2();
    $('.item_dropdown').select2();
}); --}}
{{-- $('.item_dropdown0').select2({
    dropdownParent: $('.selectBox')
});
$('.item_dropdown').select2({
    dropdownParent: $('.selectBox')
}); --}}

{{-- // Do this before you initialize any of your modals
$.fn.modal.Constructor.prototype.enforceFocus = function() {}; --}}


{{-- window.livewire.on('select',()=>{
    initTicketTypesDrop();
}); --}}

{{-- window.livewire.on('updateForm', ()=>{
    var u = <?php //echo( (isset($form_update_values['price'])) ? $id : ''); ?>;
    console.log(u);
}); --}}

{{-- $('.update_button').click(function(){
   alert('mmmmm');
}); //not triggered by dom --}}

{{-- window.livewire.on('updateForm', data =>{
    alert(id);
}); --}}



{{-- $id=$ahaa['id'];
alert($ahaa['names_all'][$id]['quantity']); --}}
@push('livewire-scripts')
    <script>
        $(document).ready(function(){
            window.initTicketTypesDrop=()=>{
                $('.item_dropdown0').select2({
                    placeholder: 'Select product',
                    allowClear: true,
                });
                $('.item_dropdown').select2({
                    placeholder: 'Select supplier',
                    allowClear: true,
                });
            }
            initTicketTypesDrop();
        });
        $('.item_dropdown0').select2().on('change', function(){
            @this.set('invoice_row.product', $('#product').val());
            @this.set('productSelected',  $('#product').val());
        });
        $('.item_dropdown').select2().on('change', function(){
            @this.set('invoice_row.supplier', $(this).val());
        });
        window.livewire.on('select',()=>{
            initTicketTypesDrop();
        });

        window.livewire.on('updateForm', ($form_updated_values, $invoice_row) =>{
            console.log($form_updated_values['product']);
            $('#product').val($form_updated_values['product']);
            $('#supplier').val($form_updated_values['supplier']);
            $('#quantity').val($form_updated_values['quantity']);
            $('#price').val($form_updated_values['price']);
            $('.addToInvoiceButton').attr('name','{{ __('translation.website.crud.update') }}')
            .html('{{ __('translation.website.crud.update') }}')
            .css({'margin-left':'780px'});
            $invoice_row['buttonStatusCheck'] = 'update';
        });

    </script>
@endpush

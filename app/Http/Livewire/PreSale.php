<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PreSale extends Component
{
    public $message =[];
    public $x = 1;
    public $tr = [
        ' <tr>
                <td class="text-center">
                    <span style="cursor:pointer;" wire:click="removeTr(0)"  class=" text-danger material-icons">delete</span>
                </td>
                <td>
                    <select class="form-control" name="payment">
                        <option value="0">Items</option>
                        <option value="cash">Cash</option>
                        <option value="install">Install</option>
                    </select>
                </td>
                <td>
                <div class="form-group mb-0" style="margin: 20px;">
                    <a href="#" data-toggle="modal" data-target="#add_supplier" class="text-primary supplier_id_selected link">Choose Supplier</a>
                </div>
                </td>
                <td>
                    <input class="form-control" wire:model="message.qty0" type="number" name="" id="">
                </td>

                <td>
                    <input class="form-control" wire:model="message.price0" type="text" name="" id="">
                </td>
                <td>
                    <input class="form-control" wire:model="message.amount0" type="text" name="" id="">
                </td>

    </tr>',
    ];

    public function addTr($newId){
            $newTr =
            '<tr>
                <td>
                    <span style="cursor:pointer;" wire:click="removeTr('.$newId.')" class=" text-danger material-icons">delete</span>
                </td>
                <td>
                <select class="form-control item_dropdown" name="payment">
                        <option value="0">Select item</option>
                        <option value="1">item 1 </option>
                        <option value="2">item 2</option>
                </select>
                </td>
                <td>
                <div class="form-group mb-0" style="margin: 20px;">
                    <a href="#" data-toggle="modal" data-target="#add_supplier" class="text-primary link">Choose Supplier</a>
                </div>
                </td>
            </td>
            <td>
                <input class="form-control" wire:model="message.qty'.$newId.'" type="number" name="" id="">
            </td>

            <td>
                <input class="form-control" wire:model="message.price'.$newId.'" type="text" name="" id="">
            </td>
            <td>
                <input class="form-control" wire:model="message.amount'.$newId.'" type="text" name="" id="">
            </td>
        </tr>';
    array_push($this->tr ,$newTr);
    $this->x++;
}

    public function removeTr($id){
        // dd($id);
        // dd($this->tr);
        if(count($this->tr) > 1){
            unset($this->tr[$id]);
        }
        unset($this->message['qty'.$id]);
        unset($this->message['price'.$id]);
        unset($this->message['amount'.$id]);
    }

    public function render()
    {
        return view('livewire.pre-sale');
    }
}

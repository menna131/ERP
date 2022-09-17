<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePricelist extends Component
{

    public $data = [];
    public $supplier_id;
    public $x = 1;
    public $tr = [];


    public function mount($supplier_id)
    {
        $this->supplier_id = $supplier_id;

        $this->tr = [
            '<tr  class="text-center">

                    <td   class="text-center"><span style="cursor:pointer;" wire:click="removeTr(0)"  class=" text-danger material-icons">
                        delete
                        </span></td>
                    <td  class="text-center"><input class="form-control"  wire:model.defer="data.name0  type="text" name="pricelist[0][name]"
                            ></td>
                    <td   class="text-center"><input class="form-control" wire:model.defer="data.madein0"  type="text" name="pricelist[0][made_in]"
                            ></td>
                    <td   class="text-center"><input class="form-control" wire:model.defer="data.price0" type="number" name="pricelist[0][price]"
                            ></td>
                    <td  class="text-center"><input class="form-control" wire:model.defer="data.note0"  type="text" name="pricelist[0][notes]"
                           ></td>
                    <td  class="text-center"><input class="form-control" type="hidden" value="' . $this->supplier_id . '"  type="number" name="pricelist[0][supplier_id]"
                           ></td>

                </tr>',
        ];
    }


    public function addTr($newId)
    {
        $newTr =
            '<tr>

        <td ><span style="cursor:pointer;" wire:click="removeTr(' . $newId . ')" class=" text-danger material-icons">
            delete
            </span></td>

        <td><input class="form-control"   wire:model.defer="data.name' . $newId . '"  type="text" name="pricelist[' . $newId . '][name]"
                ></td>
        <td><input class="form-control" wire:model.defer="data.madein' . $newId . '"  type="text" name="pricelist[' . $newId . '][made_in]"
                ></td>
        <td><input class="form-control" wire:model.defer="data.price' . $newId . '" type="number" name="pricelist[' . $newId . '][price]"
                 ></td>
        <td><input class="form-control" wire:model.defer="data.note' . $newId . '" type="text" name="pricelist[' . $newId . '][notes]"
                 ></td>
        <td  class="text-center"><input class="form-control" type="hidden" value="' . $this->supplier_id . '"  type="number" name="pricelist[' . $newId . '][supplier_id]"
            ></td>

        </tr>';
        array_push($this->tr, $newTr);
        $this->x++;
    }

    public function removeTr($id)
    {

        if (count($this->tr) > 1) {
            unset($this->tr[$id]);
        }
        unset($this->data['name' . $id]);
        unset($this->data['madein' . $id]);
        unset($this->data['price' . $id]);
        unset($this->data['note' . $id]);
    }

    public function render()
    {
        return view('Suppliers::livewire.create-pricelist',[
            'tr'=>$this->tr,
            'x'=>$this->x
        ]);
    }
}

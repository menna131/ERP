<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AllPurchases extends Component
{
    // public $name;
    public $message =[];
    public $x = 1;
    public $tr = [
        '<tr  class="text-center">
                <td width="10%"  class="text-center"><span style="cursor:pointer;" wire:click="removeTr(0)"  class=" text-danger material-icons">
                    delete
                    </span></td>
                <td width="50%" class="text-center">
                <div  class="container">
                    <div class="row">
                      <div class=" col" style="padding:0px;" >
                        <select width="60%"  class="form-control supplier_dropdown" name="supplier-name">
                            <option value="0">select</option>
                            <option value="1">product 1</option>
                            <option value="2">product 2</option>
                        </select>
                        <div onclick="getCreateProductBodyModal()" data-toggle="modal" style="display: inline; cursor:pointer;"
                            data-target="#exampleModalLong" class="text-primary " ><i
                                class="fa fa-plus" aria-hidden="true" ></i>

                        </div>
                    </div>
                </div>
                </td>
                <td width="10%" class="text-center"><input class="form-control"  wire:model.defer="message.qty0  type="number" name=""
                        required></td>
                <td  width="10%" class="text-center"><input class="form-control" wire:model.defer="message.purchaseprice0"  type="number" name=""
                        required></td>
                <td  width="10%" class="text-center"><input class="form-control" wire:model.defer="message.sellprice0" type="number" name=""
                        required></td>
                <td width="10%" class="text-center"><input class="form-control" wire:model.defer="message.cost0"  type="number" name=""
                       required></td>
            </tr>',
    ];

    public function addTr($newId)
    {

        $newTr =
            '<tr>
        <td ><span style="cursor:pointer;" wire:click="removeTr(' . $newId . ')" class=" text-danger material-icons">
            delete
            </span></td>
            <td class="text-center">
            <div class="container">
                <div class="row">
                  <div class=" col" style="padding:0px;" >
                    <select  width="60%"  class="form-control supplier_dropdown" name="supplier-name">
                        <option value="0">select</option>
                        <option value="1">product 1</option>
                        <option value="2">product 2</option>
                    </select>
                    <div onclick="getCreateSupBodyModal()" data-toggle="modal" style="display: inline; cursor:pointer;"
                        data-target="#exampleModalLong"  ><i
                            class="fa fa-plus" aria-hidden="true" ></i>

                    </div>
                </div>
            </div>
            </td>
        <td><input class="form-control"  wire:model.defer="message.qty'.$newId.'"  type="text" name=""
                required></td>
        <td><input class="form-control" wire:model.defer="message.purchaseprice'.$newId.'"  type="number" name=""
                required></td>
        <td><input class="form-control" wire:model.defer="message.sellprice'.$newId.'" type="number" name=""
                 required></td>
        <td><input class="form-control" wire:model.defer="message.cost'.$newId.'" type="number" name=""
                 required></td>
    </tr>';
        array_push($this->tr, $newTr);
    }

    public function removeTr($id)
    {
        if(count($this->tr) > 1){
            unset($this->tr[$id]);
        }
        unset($this->message['qty'.$id]);
        unset($this->message['purchaseprice'.$id]);
        unset($this->message['sellprice'.$id]);
        unset($this->message['cost'.$id]);
    }

    public function render()
    {
        return view('livewire.all-purchases');
    }
}

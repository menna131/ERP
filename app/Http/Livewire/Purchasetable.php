<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Purchasetable extends Component
{

    public $value='glal';
    // public $tr = [
    //     '<tr id="tr1">
    //         <td> <span class=" text-danger material-icons">
    //             delete
    //             </span></td>
    //         <td><input type="text" name="date" class="form-control" id="pricelistname"
    //                 required></td>
    //         <td><input type="text" name="quantity" class="form-control" id="pricelistname"
    //                 required></td>
    //         <td><input type="text" name="t" class="form-control" id="pricelistname"
    //                 required></td>
    //         <td><input type="text" name="pricelistname" class="form-control"
    //                 id="pricelistname" required></td>
    //         <td><input type="text" name="pricelistname" class="form-control"
    //                 id="pricelistname" required></td>
    //     </tr>',
    //     '<tr id="tr2">
    //     <td> <span class=" text-danger material-icons">
    //         delete
    //         </span></td>
    //     <td><input type="text" name="date" class="form-control" id="pricelistname"
    //             required></td>
    //     <td><input type="text" name="quantity" class="form-control" id="pricelistname"
    //             required></td>
    //     <td><input type="text" name="t" class="form-control" id="pricelistname"
    //             required></td>
    //     <td><input type="text" name="pricelistname" class="form-control"
    //             id="pricelistname" required></td>
    //     <td><input type="text" name="pricelistname" class="form-control"
    //             id="pricelistname" required></td>
    // </tr>',
    //     ''
    // ];

    public function test()
    {

        // // $newid=$trCount+1;
        // $newTr =
        // '<tr id="tr3">
        //     <td> <span class=" text-danger material-icons">
        //         delete
        //         </span></td>
        //     <td><input type="text" name="date" class="form-control" id="pricelistname"
        //             required></td>
        //     <td><input type="text" name="quantity" class="form-control" id="pricelistname"
        //             required></td>
        //     <td><input type="text" name="t" class="form-control" id="pricelistname"
        //             required></td>
        //     <td><input type="text" name="pricelistname" class="form-control"
        //             id="pricelistname" required></td>
        //     <td><input type="text" name="pricelistname" class="form-control"
        //             id="pricelistname" required></td>
        // </tr>';

        // array_push($this->tr ,$newTr);
    }

    public function render()
    {
        return view('livewire.purchasetable');
    }
}

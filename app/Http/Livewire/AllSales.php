<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Validation;
use Illuminate\Support\Facades\Validator;

class AllSales extends Component
{
    // use Validator;
    // use ValidatesRequests;
    // public $new_variable=[];
    // public $buttonStatusCheck;
    protected $rules = [
        'invoice_row.product' => 'required|string|exists:products,slug',
        'invoice_row.supplier' => 'required|string|exists:suppliers,slug',
        'invoice_row.quantity' => 'required|numeric',
        'invoice_row.price' => 'required|numeric',
    ];
    public $initialPrices_forSelectedProduct;
    public $suppliers_id = [];
    public $suppliers_names = [];
    public $ids;
    public $rows= [];
    public $names_all=[];
    public $x = 0;
    public $productSelected = NULL;

    public $form_update_values=[
        'price' => 8888,
    ];

    public $invoice_row = [];

    public function removeTr($id){
        unset($this->rows[$id]);
    }

    public function addTr($newId, $rows, $initialPrices_forSelectedProduct){
        // dd($this->initialPrices_forSelectedProduct[0]['primary_purchase_price']);
        $newTr =
        "<tr>
            <td>
                <span style=\"cursor:pointer;\" wire:click=\"removeTr($newId)\" class=\" text-danger material-icons\">delete</span>
            </td>
            <td>{$rows['product']}</td>
            <td>{$rows['supplier']}"."                                                        ||"
            .__('translation.products.Primary Purchase Price').": "
            .$initialPrices_forSelectedProduct[0]['primary_purchase_price']."     "
            .__('translation.products.Primary Sale Price').": "
            ." || ".$initialPrices_forSelectedProduct[0]['primary_sale_price']."
            </td>
            <td>{$rows['quantity']}</td>
            <td>{$rows['price']}</td>
            <td><button  wire:click.prevent=\"update($newId)\"  class='btn btn-info update_button'><i class='material-icons'>edit</i></button></td>
        </tr>
        ";
        array_push($this->names_all, $this->invoice_row);
        array_push($this->rows ,$newTr);
        $this->x++;
    }
    public function render()
    {
        $products = DB::select('select id,name,slug from price_lists'); 
        if($this->productSelected !== null){
            $this->UpdatedProductSelected($this->productSelected);
        }
        return view('livewire.all-sales', compact('products'));
    }

    public function UpdatedProductSelected($product) //lifecycle hooks fl livewire
    {
        if(!is_null($product)){
            $this->initialPrices_forSelectedProduct = DB::select("select primary_purchase_price, primary_sale_price from products where slug = '".$product."'");
            $this->suppliers_id=DB::select("select GROUP_CONCAT(supplier_id) AS `id` from price_lists where slug = '".$product."'")[0]->id;
            $this->suppliers_names = DB::select("select id,name,slug from suppliers where id in (".$this->suppliers_id.")");
        }
    }
    public function save()
    {
        // $tt = $this->form_update_values;
        
        // validation
        // regex:/[\d]{2},[\d]{2}/
        
        // $validator = Validator::make($tt,$rules);
        // if( $validator->fails() )
        // {
        //     dd('mmmmm');
        // }

        $this->validate();
        // dd('kkkk');
        // end validation
        if(count($this->invoice_row) <= 4){
            $this->invoice_row['buttonStatusCheck'] = 'add';
        }else{
            dd($this->invoice_row);
        }
        // dd($this->invoice_row);
        $this->addTr($this->x,$this->invoice_row, $this->initialPrices_forSelectedProduct);
        $this->productSelected = null;
        $this->invoice_row = [];
        $this->suppliers_id = [];
        $this->suppliers_names = [];
    }

    public function update($id){
        // $this->new_variable = [$this->names_all, $id];
        // dd($this->names_all[$id]['product']);
        // $this->form_update_values['product']= $this->names_all[$id]['product'];
        // $this->form_update_values['supplier']= $this->names_all[$id]['supplier'];
        // $this->form_update_values['price']= $this->names_all[$id]['price'];
        // $this->form_update_values['quantity']= $this->names_all[$id]['quantity'];
        $this->form_update_values = $this->names_all[$id];
        // dd($this->form_update_values);
        $this->emit('select');
        $this->emit('updateForm', $this->form_update_values, $this->invoice_row);
        // dd($this->form_update_values);
    }
    public function dehydrate(){
        $this->emit('select');
    }
}

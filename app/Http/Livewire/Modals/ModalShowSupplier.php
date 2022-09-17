<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class ModalShowSupplier extends Component
{
    public $radio_value =0;
    // protected $listeners = ['postAdded', 'function_name_supplier_chosen'];
    // protected $listeners = ['postAdded', 'mount'];
    // public static $l_radio_value;
    public function render()
    {
        // session()->put('radio_value', $this->radio_value);
        // self::$l_radio_value = $this->radio_value;
        // dd(self::$l_radio_value);
        return view('livewire.modals.modal-show-supplier');
    }
    // public function function_name_supplier_chosen()
    // {
    //     $this->radio_value = 'm';
    // }
    // public function mount()
    // {
    //     $this->radio_value = 'm';
    // }
}

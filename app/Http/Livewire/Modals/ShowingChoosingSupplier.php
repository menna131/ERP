<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class ShowingChoosingSupplier extends Component
{
    public $supplier_id = [];

    public function mount()
    {
        // sharing properities here
    }

    public function render()
    {
        return view('livewire.modals.showing-choosing-supplier');
    }
}

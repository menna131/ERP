<?php

namespace App\Http\Livewire;

use App\Models\Media;
use Livewire\Component;
use Suppliers\Models\Supplier;

class DeleteMedia extends Component
{
    public $media; // get from db
    public $model_id; // get from edit blade

    public function getMedia()
    {
        $this->media = Media::where('model_id',$this->model_id)->get();
        // dd($this->media);
    }

    public function deleteMedia($media_id,$model_id)
    {
        Supplier::find($model_id)->deleteSingleMedia('pricelists',$media_id);
    }
    public function render()
    {
        $this->getMedia();
        return view('Suppliers::livewire.delete-media',['supplier_media'=>$this->media,'model_id'=>$this->model_id]);
    }
}

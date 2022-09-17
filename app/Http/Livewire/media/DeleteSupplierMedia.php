<?php

namespace App\Http\Livewire\media;


use Livewire\Component;
use Suppliers\Models\Supplier;
use App\Http\Livewire\media\mediaInterface;

class DeleteSupplierMedia extends  Component implements mediaInterface
{
    public $media; // get from db
    public $model_id; // get from edit blade


    public function getMedia()
    {
        $this->media = Supplier::with('medias')->where('id', $this->model_id)->first()->medias;
    }

    public function deleteMedia($media_id, $model_id)
    {
        // dd($media_id);
        Supplier::find($model_id)->deleteSingleMedia('pricelists', $media_id);
    }

    public function render()
    {
        $this->getMedia();
        return view('Suppliers::livewire.delete-media', ['model_media' => $this->media, 'model_id' => $this->model_id,'DeleteSupplierMedia'=>'']);
    }
}

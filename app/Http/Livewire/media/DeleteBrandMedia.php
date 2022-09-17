<?php

namespace App\Http\Livewire\media;


use Livewire\Component;
use App\Models\Brand;
use App\Http\Livewire\media\mediaInterface;

class DeleteBrandMedia extends  Component implements mediaInterface
{

    public $media; // get from db
    public $model_id; // get from edit blade

    public function getMedia()
    {
        $this->media = Brand::with('medias')->where('id', $this->model_id)->first()->medias;
    }

    public function deleteMedia($media_id, $model_id)
    {

        Brand::find($model_id)->deleteSingleMedia('brands', $media_id);
    }

    public function render()
    {
        $this->getMedia();
        return view('Suppliers::livewire.delete-media', ['model_media' => $this->media, 'model_id' => $this->model_id]);
    }
}

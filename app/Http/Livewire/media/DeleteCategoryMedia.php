<?php

namespace App\Http\Livewire\media;


use Livewire\Component;
use App\Models\Category;
use App\Http\Livewire\media\mediaInterface;

class DeleteCategoryMedia extends  Component implements mediaInterface
{

    public $media; // get from db
    public $model_id; // get from edit blade

    public function getMedia()
    {
        $this->media = Category::with('medias')->where('id', $this->model_id)->first()->medias;
    }

    public function deleteMedia($media_id, $model_id)
    {
dd($media_id);
        Category::find($model_id)->deleteSingleMedia('categories', $media_id);
    }

    public function render()
    {
        $this->getMedia();
        return view('Suppliers::livewire.delete-media', ['model_media' => $this->media, 'model_id' => $this->model_id]);
    }
}

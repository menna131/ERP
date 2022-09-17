<?php

namespace App\Http\Livewire\media;


interface mediaInterface
{

    function getMedia();
    function deleteMedia($media_id, $model_id);
}

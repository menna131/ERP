<?php
namespace App\Http\traits;
use App\Http\services\mediaService;
use App\Models\Media;
trait mediaTrait {

    public function insertMulitMedia($data,$collection_name){ //

        $model_type =  __CLASS__;
        $model_id = $this->id;
        $media_ids = [];
        foreach ($data as $media) {
            $media_ids[] = Media::Create([
                    'model_type'=>$model_type,
                    'model_id'=>$model_id,
                    'file_name'=> $media->getClientOriginalName(),
                    'mime_type'=> $media->getMimeType(),
                    'collection_name'=>$collection_name
                ])->id;
        }
        // dd( $model_type);
        return mediaService::uploadMultiMedia($data,$collection_name,$media_ids);
    }

    public function insertSingleMedia($data,$collection_name)
    {

        $model_type =  __CLASS__;
        $model_id = $this->id;
        $media_id = [];
        $media_id[] = Media::Create([
                    'model_type'=>$model_type,
                    'model_id'=>$model_id,
                    'file_name'=> $data->getClientOriginalName(),
                    'mime_type'=> $data->getMimeType(),
                    'collection_name'=>$collection_name
                ])->id;

        // dd( $model_type);
        return mediaService::uploadSigleMedia($data,$collection_name,$media_id);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable','model_type','model_id');
    }

    public function deleteMultiMedia($collection_name)
    {
        $media_ids = Media::where('model_id',$this->id)->pluck('id');
        if(mediaService::deleteMultiMedia($collection_name,$media_ids))
            Media::where([['model_id','=',$this->id],['collection_name','=',$collection_name]])->delete();
        return $this;
    }

    public function deleteSingleMedia($collection_name,$id)
    {
        if(mediaService::deleteSingleMedia($collection_name,$id))
            Media::where([['model_id','=',$this->id],['collection_name','=',$collection_name],['id','=',$id]])->delete();
        return $this;
    }

}

?>

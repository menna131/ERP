<?php
namespace App\Http\traits;
trait fileTrait {

    public function insertFile($folder,$image){ //
        $extension = $image->extension();
        $mediaName= time().'.'.$extension;
        $image->move(public_Path('media\\'.$folder,$mediaName));

    }

}

?>

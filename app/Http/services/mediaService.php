<?php

namespace App\Http\services;

class mediaService
{
    /**
     * upload media
     * @param data media to be uploaded
     * @param collection_name related to removed collection
     * @param directories is array of ids that related to folders name
     * @return  true
     */
    public static function uploadMultiMedia($data, $collection_name, $directories)
    {

        $iterator = 0;
        foreach ($data as $media) {
            $fileName = $media->getClientOriginalName();
            // dd($fileName);
            $media->move(public_path('media\\' . $collection_name . '\\' . $directories[$iterator]), $fileName);
            $iterator++;
            // dd($directories);
        }
        return true;
    }


    public static function uploadSigleMedia($data, $collection_name, $directory)
    {
        $iterator = 0;

            $fileName = $data->getClientOriginalName();
            $data->move(public_path('media\\' . $collection_name . '\\' . $directory[$iterator]), $fileName);

        return true;
    }



    /**
     * remove media
     * @param collection_name related to removed collection
     * @param directories is array of ids that related to folders name
     * @return  true
     */
    public static function deleteMultiMedia($collection_name, $directories)
    {
        // loop on directories to create the absloulte path
        foreach ($directories as $directory) {
            mediaService::deleteSingleMedia($collection_name, $directory);
        }
        return true;
    }

    public static function deleteSingleMedia($collection_name, $directory)
    {

            // creating abs path
            $directoryPath = public_path('media\\' . $collection_name . '\\' . $directory);
            // check if the directory path exits
            if (file_exists($directoryPath)) {

                // open directory path and get all files
                foreach (scandir($directoryPath) as $file) {
                    // ignore . , .. static files
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    // remove files
                    unlink($directoryPath . '\\' . $file);
                }
                // remove folder
                rmdir($directoryPath);
            }
            
            return true;
    }
}


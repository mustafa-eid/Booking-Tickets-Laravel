<?php 

namespace App\Http\traits;

trait media
{
    public function uploade_image($image, $folder) {
        $PhotoName = uniqid() . '.' . $image->extension();
        $image->move(public_path('/dist/img/' . $folder), $PhotoName);
        return $PhotoName;
    }

    public function delete_image($image_path) {
        if(file_exists($image_path)){
            unlink($image_path);
            return true;
        }
        return false;
    }
}
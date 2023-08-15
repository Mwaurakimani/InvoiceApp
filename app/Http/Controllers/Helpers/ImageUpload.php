<?php

namespace App\Http\Controllers\Helpers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class ImageUpload
{
    public static function upload_file($file, $storage, $replace = false, $type = null)
    {
        $image_name = ImageUpload::generate_name($file, $type);

        if ($replace) {
            if($type instanceof User){

                $current_image = $type->profile_photo_path;

                if($current_image != null && Storage::disk($storage)->exists($current_image)){
                    Storage::disk($storage)->delete($current_image);
                }

            } else {
                dd('error');
            }
        }

        $file->storeAs('./', $image_name, $storage);

        return [
            'name' => $image_name,
        ];

    }

    public static function generate_name($file, $type): string
    {
        $n = 16;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $imageExtension = 'custom_filename.' . $file->getClientOriginalExtension();

        if ($type instanceof User) {
            return $randomString . '_' . $type->id . '.' . $imageExtension;
        }else if($type instanceof Vehicle){
            dd("error");
        }else{
            dd("error");
        }
    }

    public function file_exist($file, $storages)
    {

    }

}

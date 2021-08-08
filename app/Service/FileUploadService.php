<?php

namespace App\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class FileUploadService{

    public function deleteFile($file){
        try{
            Storage::disk('public')->delete($file);
            return true;
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
    }

    public function uploadFile($file, $dir, $sub){
        try{
            $path = $file->store($dir,$sub);
            return $path;
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->view('/home', 500);
        }
    }

    public function generateFileName($file){

    }

}
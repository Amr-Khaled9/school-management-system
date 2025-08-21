<?php

namespace App\traits;

use Illuminate\Support\Facades\Storage;

trait UploadFileTrait
{
    public function uploadPDF($request ,$name)
    {

        $fileName =  $request->file($name)->getClientOriginalName();

         $request->file($name)->storeAs('/', $fileName, 'upload_books');
    }
    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_books')->exists($name);

        if($exists){
            Storage::disk('upload_books')->delete($name);
        }
    }
}

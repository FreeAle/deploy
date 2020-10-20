<?php


use Illuminate\Http\File;
namespace App\Http\Controllers;

class AppHelper extends Controller
{
    public function deleteFile($fileName)
    {
        if($fileName!= "default.jpg" ){
            $image_path = "uploadedimages/" . $fileName;
            if (unlink("uploadedimages/" . $fileName)) {
                return true;
            } else {
                echo "No someone reach First:)";
            }
        }
        
    }
    public function saveImage($request){
        $image = $request->file('image');
        $input['imagename'] = uniqid() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploadedimages');
        $image->move($destinationPath, $input['imagename']);

        return $input['imagename'];

    }
    public function saveCoverImage($request){
        $image = $request->file('cover_image');
        $input['imagename'] = uniqid() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploadedimages');
        $image->move($destinationPath, $input['imagename']);
        return $input['imagename'];
    }
}
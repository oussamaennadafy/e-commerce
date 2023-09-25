<?php


namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait
{
 public function uploadImage(Request $request, $inputName, $path)
 {
  if ($request->hasFile($inputName)) {
   //remove the old image
   // if (File::exists(public_path($user->image))) {
   //  File::delete(public_path($user->image));
   // }
   // upload the submited image
   $image = $request->{$inputName};
   $ext = $image->getClientOriginalExtension();
   $imageName = 'media_' . uniqid() . '.' . $ext;
   $image->move(public_path($path), $imageName);

   return $path . '/' . $imageName;
  }
 }
}

<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class ImageUpload
{

    public static function uploadImage($request, $height = null, $width = null, $path = null)
    {
        $imagename = Str::uuid() . date('Y-m-d') . '.' . $request->extension();
        [$widthDefult, $heightDefult] = getimagesize($request);
        $width = $width ?? $widthDefult;
        $height = $height ?? $heightDefult;

        $image = Image::make($request->path());
        $image->fit($width, $width, function ($constraint) {
            $constraint->upsize();
        })->stream();
        Storage::disk('images')->put($path . $imagename, $image);
        return $path.$imagename;

        // dd([$width, $height]);

    }
}

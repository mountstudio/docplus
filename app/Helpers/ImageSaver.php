<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageSaver
{
    /**
     * @param UploadedFile $file
     * @param $dir
     * @param $prefix
     * @return string
     */
    public static function save(UploadedFile $file, $dir, $prefix, $params = [])
    {
        $filename = uniqid($prefix . '_') . '.' . mb_strtolower($file->getClientOriginalExtension());

        $img = Image::make($file);
        if (array_key_exists('width', $params) && array_key_exists('height', $params)) {
            $img->resize($params['width'], $params['height']);
        }
        $originalWidth = $img->width();

        $watermark = Image::make(asset('img/doc_logo.png'));
        $watermark->resize($originalWidth * 0.15, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $watermark->opacity(20);

        $img->insert($watermark, 'bottom-right');

        $img->save(public_path($dir .'/'. $filename), 40);

        return $filename;
    }
}

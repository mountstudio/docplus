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
    public static function save($file, $dir, $prefix)
    {
        $filename = uniqid($prefix . '_') . '.' . mb_strtolower($file->getClientOriginalExtension());

        Image::make($file)
            ->resize(500, 500)
            ->save(public_path($dir .'/'. $filename), 40);

        return $filename;
    }
}

<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;

class ImageSaver
{
	public static save($file, $dir, $prefix)
	{
		$filename = uniqid($prefix.'_').'.'.$file->getClientOriginalExtension();

		Image::make($file)
			->save(public_path($dir.$filename), 40);

		return $filename;
	}
}
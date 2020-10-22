<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;

class Seo
{
    public static function genTitle($head, $body)
    {
        return true;
    }

    public static function genDescription($head, $body)
    {
        return true;
    }

    public static function genKeywords($head, $body)
    {
        return true;
    }

    public static function getAvatar($img,  $w=300, $h=300)
    {
        $image = Image::make($img);
        $height = $image->height();
        $width = $image->width();

        if($height>=$width) {
            $image->resize($w, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        if($width>=$height) {
            $image->resize(null, $h, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $image->resizeCanvas($w, $h);

        $image->save();
    }

}
<?php

namespace App\Helpers;

use App\Model\{
    Ads, Category, Region, City
};
use Intervention\Image\ImageManagerStatic as Image;

class Seo
{
    public static  $status = [
        'sell' => 'Купить',
        'buy' => 'Куплю',
    ];
    public static $transAlphabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zsh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'i', 'ъ' => '',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '-', '?' => '', '!' => '', '(' => '', ')' => '', '@' => '', '#' => '',
        '+' => '', '*' => '', '&' => '', '^' => '%', '$' => '~', '{' => '', '}' => '', '/' => '',
    ];

    public static function genTitle($head, $body, $city, $status)
    {
        $data = $city.' - '.self::$status[$status].' '.$head;
        return $data;
    }

    public static function genDescription($head, $body, $city, $status)
    {
        $data = self::$status[$status].' '.$head.' в '.$city.' - '.htmlspecialchars(nl2br(substr($body, 0, 90)));
        $data = str_replace('...', '.', $data);
        return $data;
    }

    public static function genKeywords($head, $body, $city, $status)
    {
        $data = self::$status[$status].' '.$head.' '.$city;
        $data = str_replace(' ', ', ', $data);
        $data = str_replace(',,', ',', $data);
        return $data;
    }

    public static function regionId($head)
    {
        $res = Region::select('id')
            ->where('region_name_ru', $head)
            ->first();
        if($res) {
            return $res['id'];
        }
        return 1;
    }

    public static function cityId($head)
    {
        $res = City::select('id')
            ->where('city_name_ru', $head)
            ->first();
        if($res) {
            return $res['id'];
        }
        return 1;
    }

    public static function extBrand($head)
    {
        $i = 0;
        $headBrand[0] = '';
        $category = Category::where('level', 1)->get();
        foreach($category as $cat){
            $head0 = strtoupper(str_replace(' ', '', str_replace('-', '', $head)));
            $carHead0 = strtoupper(str_replace(' ', '', str_replace('-', '', $cat->head)));
            $head1 = strtoupper(str_replace(' ', '', $head));
            $carHead1 = strtoupper(str_replace(' ', '', $cat->head));
            $head2 = strtoupper(str_replace('(', '', $head1));
            $head3 = strtoupper(str_replace(')', '', $head2));
            if(preg_match("/".$carHead0."/i", $head0) || preg_match("/".$carHead1."/i", $head1) || preg_match("/".$carHead1."/i", $head3)) {
                $headBrand[$i] = $cat->id;
            }
            $i++;
        }
        return $headBrand;
    }

    public static function extBrand2($head)
    {
        $headBrand = [];
        $category = Category::where('level', 1)->get();
        foreach($category as $cat){
            $head0 = explode(' ', strtoupper(str_replace(', ', ' ', str_replace(' - ', '-', $head))));
            $carHead0 = explode(' ', str_replace(')', '', str_replace('(', '', strtoupper($cat->head))));
            foreach($carHead0 as $v) {
                if(is_array($head0)) {
                    $arrS = array_search($v, $head0);
                    if(is_int($arrS)) {
                        $headBrand[] = $cat->id;
                    }
                } else {
                    if(preg_match("/".$v."/i", $head0)) {
                        $headBrand[] = $cat->id;
                    }
                }
            }
        }
        return $headBrand;
    }

    public static function genUrl($string)
    {
        $s = strip_tags($string);
        $s = str_replace(array("\n", "\r"), " ", $s);
        $s = preg_replace("/\s+/", ' ', $s);
        $s = trim($s);
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
        $s = strtr($s, self::$transAlphabet);
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
        $s = str_replace(" ", "-", $s);
        return $s;
    }

    public static function getAvatar($img, $w=300, $h=300)
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
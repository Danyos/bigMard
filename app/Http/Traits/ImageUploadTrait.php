<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait ImageUploadTrait
{

    public static function uploadBase64Image(string $base64Image, string $destinationPath, ?int $width = 1280, ?int $height = 720, int $quality = 60)
    {
        if (empty($base64Image)) {
            return null;
        }

        // Base64 -> Ֆայլի վերածում
        $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);
        $imageData = base64_decode($imageData);

        if (!$imageData) {
            return null;
        }

        // Ֆայլի անուն
        $filename = time() . '.jpg';
        $fullPath = public_path($destinationPath . '/' . $filename);

        // Ստեղծում ենք թիրախ պանակը, եթե այն չկա
        if (!File::exists(public_path($destinationPath))) {
            File::makeDirectory(public_path($destinationPath), 0755, true, true);
        }

        // Սկզբնական նկարը ստեղծում ենք GD-ով
        $sourceImage = imagecreatefromstring($imageData);

        if (!$sourceImage) {
            return null;
        }

        // Ստուգում ենք նկարի սկզբնական չափսերը
        list($origWidth, $origHeight) = getimagesizefromstring($imageData);

        // Պահպանում ենք կողմերի հարաբերակցությունը
        $ratio = min($width / $origWidth, $height / $origHeight);
        $resizeWidth = intval($origWidth * $ratio);
        $resizeHeight = intval($origHeight * $ratio);

        // Ստեղծում ենք նոր դատարկ պատկեր
        $resizedImage = imagecreatetruecolor($resizeWidth, $resizeHeight);

        // Վերափոխում ենք նկարը
        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $origWidth, $origHeight);

        // Պահպանում ենք նկարը JPEG ֆորմատով (թեթևացած ֆայլ)
        imagejpeg($resizedImage, $fullPath, $quality);

        // Մաքրում ենք հիշողությունը
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);

        return "$destinationPath/$filename";
    }
}

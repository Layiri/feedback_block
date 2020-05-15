<?php

/**
 * Class UploadFiles
 */
class UploadFiles
{
    public static function randomString($length = 32)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public static function resize_image($file, $width, $height)
    {
        list($w, $h) = getimagesize($file);
        /* calculate new image size with ratio */
        if ($width == 0) {
            $width = $w;
        }
        if ($height == 0) {
            $height = $h;
        }
        // Calculate ratio of desired maximum sizes and original sizes.
        $widthRatio = $width / $w;
        $heightRatio = $height / $h;

        // Ratio used for calculating new image dimensions.
        $ratio = min($widthRatio, $heightRatio);
        $ratio = min($widthRatio, $heightRatio);

        // Calculate new image dimensions.
        $newWidth = (int)$w * $ratio;
        $newHeight = (int)$h * $ratio;

        /* read binary data from image file */
        $imgString = file_get_contents($file);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image,
            0, 0,
            0, 0,
            $newWidth, $newHeight,
            $w, $h);
        imagejpeg($tmp, $file, 100);

//    /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);

        return $file;
    }


    public static function saveFile()
    {
        $info = pathinfo($_FILES['file_to_upload']['name']);
        if ($info['filename']) {
            $ext = strtolower($info['extension']); // get the extension of the file
            if (strtolower($ext) == 'gif' || strtolower($ext) == 'jpeg' || strtolower($ext) == 'png' || strtolower($ext) == 'jpg') {
                $file = self::resize_image($_FILES['file_to_upload']['tmp_name'], 320, 240);
                $newname = self::randomString() . "." . $ext;
                $target = '../resources/' . $newname;
                move_uploaded_file($file, $target);
                $file_path = '/resources/' . $newname;
            } elseif ($ext == 'txt') {
                $newname = self::randomString() . "." . $ext;
                $target = '../resources/' . $newname;
                move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $target);
                $file_path = '/resources/' . $newname;
            } else {
                $file_path = '';
            }
            return $file_path;

        } else {
            return '';
        }
    }


}


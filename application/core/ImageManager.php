<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 04.03.18
 * Time: 20:13
 */

namespace Core;

/**
 * Class ImageManager
 * @package Core
 */
class ImageManager implements FileManagerInterface
{
    /**
     * @param array $files
     * @return string
     */
    public function save($files)
    {
        if (isset($files['image']) && $files['image']["name"] != "") {
            if (
                !substr_count($files['image']['type'], "jpeg") and
                !substr_count($files['image']['type'], "png") and
                !substr_count($files['image']['type'], "gif")
            ) {
                return header('Location: index.php?route=main/index');
            }

            $tmp_name = $_FILES["image"]["tmp_name"];
            $imageName = $_FILES["image"]["name"];

            if (!file_exists("images/$imageName")) {
                move_uploaded_file($tmp_name, "images/$imageName");
            }

            $this->resize("images/$imageName");

            return $imageName;
        }
        
        return "";
    }

    /**
     * @param $imageName
     */
    private function resize($imageName)
    {
        /* Hosting doesn't have php-imagick extension */
        return;

        list($width, $height) = getimagesize($imageName);

        if ($width > 320 and $height > 240) {
            $thumb = new Imagick("images/$imageName");

            $thumb->resizeImage(320,240,Imagick::FILTER_LANCZOS,1);
            $thumb->writeImage("images/$imageName");

            $thumb->destroy();
        }
    }
}
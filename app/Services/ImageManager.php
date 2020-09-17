<?php


namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class ImageManager
{

    private $folder;


    public function __construct()
    {
        $this->folder = config('uploadsFolder');

    }//end __construct()


    // функция загружает изображение и удаляет текущие изображение из папки uploads при условии загрузки нового файла
    public function uploadImage($image, $currentImage=null): ?string
    {
        if (!is_file($image['tmp_name']) && !is_uploaded_file($image['tmp_name'])) {
            return $currentImage;
        }

        $this->deleteImage($currentImage);

        $filename = strtolower(str_random(10)).'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
        $image    = Image::make($image['tmp_name']);
        $image->save($this->folder.$filename);

        return $filename;

    }//end uploadImage()


    // функция проверяет на наличие файла
    public function checkImageExists($path)
    {
        if ($path != null && is_file($this->folder.$path) && file_exists($this->folder.$path)) {
            return true;
        }

    }//end checkImageExists()


    // функция удаляет изображение
    public function deleteImage($image)
    {
        if ($this->checkImageExists($image)) {
            unlink($this->folder.$image);
        }

    }//end deleteImage()


    // функция возвращает путь к файлу изображению
    function getImage($image)
    {
        if ($this->checkImageExists($image)) {
            return '/'.$this->folder.$image;
        }

        return '/img/no-user.png';

    }//end getImage()


}//end class

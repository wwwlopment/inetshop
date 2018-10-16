<?php


namespace common\models;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{

  public $image;
  public $currentImage;

  public function rules() {

   return [
     [['image'], 'required'],
     [['image'], 'file', 'extensions' => 'jpg, png, jpeg'],

   ];
  }

  public function uploadFile(UploadedFile $file, $currentImage='78')
  {
    $this->image = $file;
    if ($this->validate()) {
        $this->deleteCurrentImage($currentImage);

    return $this->saveImage();

    }
  }

  private function getFolder() {
    return '../../frontend/web/uploads/';
  }

  private function generateFilename() {
    return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
  }

  public function deleteCurrentImage($currentImage) {
    if ($this->fileExists($currentImage)) {
      unlink($this->getFolder() . $currentImage);
    }
  }

  public function fileExists($currentImage) {
    if(!empty($currentImage) && $currentImage != null) {
      return file_exists($this->getFolder() . $currentImage);
    }
  }

  public function saveImage() {
    $filename = $this->generateFilename();
  $savePath = $this->getFolder() . $filename;
  $newWidth = 800;
  $newHeight = 800;

    $this->image->saveAs($savePath);
    Image::getImagine()->open($savePath)->thumbnail(new Box($newWidth, $newHeight))->save($savePath , ['quality' => 90]);

    return $filename;
  }

}
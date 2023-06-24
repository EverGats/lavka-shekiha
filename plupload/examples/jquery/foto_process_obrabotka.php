<?php

class SimpleImage {

   var $image;
   var $image_type;

   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagejpeg($this->image);
//         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagejpeg($this->image);
//         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
}

function createThumbnail($flname,$new_flname,$width_image,$source_path,$dest_path)
{
   $image = new SimpleImage();
   $image->load($source_path.$flname);
   $image->resizeToWidth($width_image);
   $image->save($dest_path.$new_flname);
}

function imposingImage($path_to_flname)
{
// Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
	
$stamp = imagecreatefrompng('../plupload/imgpsh_fullsize.png');
$im2 = imagecreatefromjpeg($path_to_flname);
// Установка полей для штампа и получение высоты/ширины штампа
$marge_right = 200;
$marge_bottom = 250;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
// Копирование изображения штампа на фотографию с помощью смещения края
// и ширины фотографии для расчета позиционирования штампа.

/*imagecopy($im2, $stamp, imagesx($im2) - $sx - $marge_right,
imagesy($im2) - $sy - $marge_bottom, 0, 0, imagesx($stamp),
imagesy($stamp));
*/

imagecopy($im2, $stamp, round((imagesx($im2) - $sx)/2),round((imagesy($im2) - $sy)/2), 0, 0, imagesx($stamp),imagesy($stamp));

// Сохранение и освобождение памяти
imagejpeg($im2, $path_to_flname);
imagedestroy($im2);
}
?>
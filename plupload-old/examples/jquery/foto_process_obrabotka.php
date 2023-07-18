<?php
error_reporting(0);

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

function saveImageWithMaxResolution($filename) {
    require '../foto/config.php'; // Подключаем файл конфигурации
    global $privz;

    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // Получаем расширение файла

    // Поддерживаемые форматы изображений
    $supportedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    // Проверяем, что расширение файла является поддерживаемым форматом изображения
    if (!in_array($ext, $supportedExtensions)) {
        echo 'Неподдерживаемый формат изображения.';
        return;
    }

    $imagePath = $path_to_image_directory . $filename; // Полный путь к изображению



    // Получаем размеры изображения
    list($width, $height) = getimagesize($imagePath);

    // Проверяем размеры изображения
    if ($width === false || $height === false) {
        echo 'Не удалось получить размеры изображения.';
        return;
    }

    // Получаем максимальное разрешение по ширине и высоте
    $maxResolution = max($width, $height);

    // Проверяем наличие папки для сохранения изображений
    if (!file_exists($path_to_thumbs_directory)) {
        if (!mkdir($path_to_thumbs_directory)) {
            echo 'Ошибка при создании папки для сохранения изображений.';
            return;
        }
    }

    // Генерируем новое имя файла, основанное на уникальном идентификаторе
    $newFilename = $privz . '.' . $ext;


}


function createThumbnail2($filename) {

    require '../foto/config.php'; //Подключаем файл конфигурации

    global $privz;


    if(preg_match('/[.](jpg)$/', $filename))	{
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](JPG)$/', $filename))	{
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](JPEG)$/', $filename))	{
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](jpeg)$/', $filename))	{
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](gif)$/', $filename))	{
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](GIF)$/', $filename))	{
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](png)$/', $filename))	{
        $im = imagecreatefrompng($path_to_image_directory . $filename);
    }	else if (preg_match('/[.](PNG)$/', $filename))	{
        $im = imagecreatefrompng($path_to_image_directory . $filename);

    }//Определяем формат изображения

    $ox = imagesx($im);
    $oy = imagesy($im);





    $final_width_of_image = 600;





    $nx = $final_width_of_image;
    $ny = floor($oy * ($final_width_of_image / $ox));

    $nm = imagecreatetruecolor($nx, $ny);

    imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);



    if(!file_exists($path_to_mini_directory)) {
        if(!mkdir($path_to_mini_directory)) {
            die("Возникли проблемы! попробуйте снова1!");
        }
    }

    $ext = substr($_FILES['fupload']['name'], 1 + strrpos($_FILES['fupload']['name'], "."));


// выбираем максимальное значение id с image и увеличиваем его на единицу
// это число и будет служить именем файла

    $filename=$privz.".jpg";


    imagejpeg($nm, $path_to_mini_directory . $filename);



    if (file_exists($path_to_mini_directory.$filename)) {
// проверка на существование загруженного файла

////////////////////////////////////
        $img_file555 = "$path_to_mini_directory$filename"; // адрес изображения
        $img_size555 = getimagesize ( $img_file555 );

        $_SESSION['height_mini'] = $img_size555[1];
        $_SESSION['width_mini'] = $img_size555[0];
        $_SESSION['razmer_image_mini'] = filesize("$path_to_mini_directory$filename");

////////////////////////////////////////////////////////////////////

//добавление в базу
    }

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
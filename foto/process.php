
<?
	

function createThumbnail($filename) {
	
require '../foto/config.php'; //���������� ���� ������������
	 
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
	}	else if (preg_match('/[.](jfif)$/', $filename))	{	
			$im = imagecreatefrompng($path_to_image_directory . $filename);	
			
	}//���������� ������ �����������
	
	$ox = imagesx($im);
	$oy = imagesy($im);
	



if      ($ox <=200  ) {$final_width_of_image = 200;}
else if (($ox > 200) AND  ($ox <= 2560 )) {$final_width_of_image = $ox;}
else if ($ox > 2560) {$final_width_of_image = 2560;}


$_SESSION['width_image']=$final_width_of_image;
$_SESSION['height_image']=$oy;



	
	$nx = $final_width_of_image;
	$ny = floor($oy * ($final_width_of_image / $ox));
	
	$nm = imagecreatetruecolor($nx, $ny);
	
	imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
	
	

	if(!file_exists($path_to_thumbs_directory)) {
	  if(!mkdir($path_to_thumbs_directory)) {
           die("�������� ��������! ���������� �����1!");
	  } 
       }

$ext = substr($_FILES['fupload']['name'], 1 + strrpos($_FILES['fupload']['name'], "."));


// �������� ������������ �������� id � image � ����������� ��� �� �������
// ��� ����� � ����� ������� ������ �����

$filename=$privz.".jpg";
	
	
	imagejpeg($nm, $path_to_thumbs_directory . $filename);
	

	
if (file_exists($path_to_thumbs_directory.$filename)) {
// �������� �� ������������� ������������ �����


////////////////////////////////////////////////////////////////////////////
$img_file777 = "$path_to_thumbs_directory$filename"; // ����� �����������
$img_size777 = getimagesize ( $img_file777 );
 
$_SESSION['height_image'] = $img_size777[1];
$_SESSION['width_image'] = $img_size777[0];
$_SESSION['razmer_image'] = filesize("$path_to_thumbs_directory$filename"); 
//���������� � ����
}
else {
echo "���� �� ��� ��������!";	
}	
	
	
}//������� �����������, ���� ���� �������, �� ������� � ���, ���� �� ���, �� ������� ������������ ���������

////////////////////////////////////




function createThumbnail2($filename) {		
	
require '../foto/config.php'; //���������� ���� ������������
	 
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
			
	}//���������� ������ �����������
	
	$ox = imagesx($im);
	$oy = imagesy($im);
	




$final_width_of_image = 600;




	
	$nx = $final_width_of_image;
	$ny = floor($oy * ($final_width_of_image / $ox));
	
	$nm = imagecreatetruecolor($nx, $ny);
	
	imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
	
	

	if(!file_exists($path_to_mini_directory)) {
	  if(!mkdir($path_to_mini_directory)) {
           die("�������� ��������! ���������� �����1!");
	  } 
       }

$ext = substr($_FILES['fupload']['name'], 1 + strrpos($_FILES['fupload']['name'], "."));


// �������� ������������ �������� id � image � ����������� ��� �� �������
// ��� ����� � ����� ������� ������ �����

$filename=$privz.".jpg";
	
	
imagejpeg($nm, $path_to_mini_directory . $filename);
	

	
if (file_exists($path_to_mini_directory.$filename)) {
// �������� �� ������������� ������������ �����

////////////////////////////////////
$img_file555 = "$path_to_mini_directory$filename"; // ����� �����������
$img_size555 = getimagesize ( $img_file555 );
 
$_SESSION['height_mini'] = $img_size555[1];
$_SESSION['width_mini'] = $img_size555[0];
$_SESSION['razmer_image_mini'] = filesize("$path_to_mini_directory$filename"); 

////////////////////////////////////////////////////////////////////

//���������� � ����
}
else {
echo "���� �� ��� ��������!";	
}	
	
	
}//������� �����������, ���� ���� �������, �� ������� � ���, ���� �� ���, �� ������� ������������ ���������

////////////////////////////////////

?>
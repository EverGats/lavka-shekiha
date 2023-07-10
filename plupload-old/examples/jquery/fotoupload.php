<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>�������� ����.</title>

<link rel="stylesheet" href="../../css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="../../js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

<script src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>

<!-- production -->
<script type="text/javascript" src="../../js/plupload.full.min.js"></script>
<script type="text/javascript" src="../../js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

<!-- activate Russian translation -->
<script type="text/javascript" src="../../js/i18n/ru.js"></script>

</head>

<?php

$final_width_of_image_mini = 400;
$final_width_of_image_full = 1920;
$path_to_image_directory = '../../foto/original/'; //�����, ���� ����� ����������� ����� �������� ��������� (����� ����������)
$path_to_full_directory = '../../foto/full/'; //�����, ���� ����� ����������� �������������� ����������� 1920
$path_to_mini_directory = '../../foto/mini/';//�����, ���� ���� ��������� 400
$full_znak_on=1; // �� ��������� ��������� "��������" �������(1-��������)
$mini_znak_on=0; // �� ��������� ��������� "��������" �������(0-��� ���������)
//////////////////////////////////////////////////////////////

if (isset($_GET['fotoproekt'])) {$fotoproekt =$_GET['fotoproekt']; } 
            
          if ($fotoproekt){
		    if (!preg_match("|^[\d]+$|", $fotoproekt))    {
            exit("������� ������!!!");
		 
			}}		
			
			
if (isset($_GET['tag_f'])) {$tag_f =$_GET['tag_f']; } 
            
          if ($tag_f){
		    if (!preg_match("|^[\d]+$|", $tag_f))    {
            exit("������� ������!!!");
		 
			}}				

if (isset($_POST['uploader'])) {$uploader =1; } 
            else
            { $uploader = '' ;}
			
////////////////////////////////////////////////

function random($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil_1234567890-');
                return substr($pass,3,$count);
}

$privz=random(50); //��������� ���������� �����
//

//�������� ����������� � ������ .jpg


//////////////////g������ �������� � ���������////////////////////////

if(isset($_FILES['file'])) {

//require 'foto_process_obrabotka.php'; //���������� ����-����������


	if(preg_match('/[.](jpg)|(JPG)|(JPEG)|(jpeg)|(png)|(PNG)$/', //������ ���������� ������� ����������� ��� ��������
$_FILES['file']['name'])) {

        $filename = $_FILES['file']['name'];
		$source = $_FILES['file']['tmp_name'];	
		$target = $path_to_image_directory.$filename;
		
require 'foto_process_obrabotka.php'; //���������� ����-����������

copy($source, $target);

$new_filename=$privz.'.jpg';
//		move_uploaded_file($source, $target);
createThumbnail($filename,$new_filename,$final_width_of_image_mini,$path_to_image_directory,$path_to_mini_directory);	
createThumbnail($filename,$new_filename,$final_width_of_image_full,$path_to_image_directory,$path_to_full_directory);	
if($full_znak_on==1)
	{
		imposingImage($path_to_full_directory.$new_filename);
	}
if($mini_znak_on==1)
	{
		imposingImage($path_to_mini_directory.$new_filename);
	}	
unlink ($target);
		 
}
}
//////////////////g������ �������� � ���������////////////////////////	


	//////////////////////////////////////////////
///////////����� ���������� ����������////////
//////////////////////////////////////////////

echo"
<div style='height:5px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";

if ($vipolneno_ok==1){echo"$vipolneno";}


echo"
<form enctype='multipart/form-data' action='?meny=$meny&fotoproekt=$fotoproekt&tag_f=$tag_f&tag=$tag' method='post' name='forma' class='decorated-form'>";

echo"
<form id='form' method='post' action='./fotoupload.php'>
	<div id='uploader'>
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
	<br />
	<input type='submit' value='�������� ����' />
</form>
";
//////////////////////////////////////////////
///////////����� ���������� ���������� ����� ////////
//////////////////////////////////////////////
?>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : './fotoupload.php',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '3mb',

		// Resize images on clientside if we can
/*		resize : {
			width : 200, 
			height : 200, 
			quality : 90,
			crop: true // crop to exact  dimensions
		}, */
		
		filters : {
			// Maximum file size
			max_file_size : '1000mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,png"}
			]
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : '../../js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : '../../js/Moxie.xap'
	});


	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});
});
</script>




</html>
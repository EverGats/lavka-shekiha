<style>


.orange-button2{
	display: block;
	padding: 10px 10px;
	border: 1px solid #5f1b13;;
	border-radius: 3px;
	box-shadow: inset 0px 0px 1px white, 0px 1px 2px #dfcc7e;
	background: #dfcc7e; /* Old browsers */
	text-align: center;
	font-size: 15px;
	font-weight: bold;
	color: #5f1b13;
	cursor: pointer;
}

.orange-button2:hover{
	background: #caac52; /* Old browsers */
}




#blok_stat_img img {
max-width:94%;
padding:2px;
background:#fff;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
border:0;
}


#blok_stat_img a img {
border: 1px solid #CCCCCC; 
}

#blok_stat_img a:hover img{	
border: 1px solid #5f1b13; 
}



</style>



<?
if ($edit and $id_user_session==$id_admin_user){
	
	
$result_tovar = $db->query("SELECT * FROM tovari WHERE id='$edit'");	
$myrow_tovar= $result_tovar->fetch_array();

if (!$myrow_tovar['id']){
	
echo"Такого товара не существует!";	
exit();
}
	

$okei="";
$obem_del="";
$foto_ok="";

//////////////////////////////////////////////
//////////удаление Po ml//////////////////////////

if (isset($_GET['del_po_ml'])){$del_po_ml = $_GET['del_po_ml'];}


if ($del_po_ml){

$result_del_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id='$del_po_ml' and id_tovar='$edit'");	
$myrow_del_po_ml=$result_del_po_ml->fetch_array();

if ($myrow_del_po_ml){

	
$result_del = $db->query("DELETE FROM tovari_po_ml WHERE id='$myrow_del_po_ml[id]'");	

$result_min = $db->query("SELECT MIN(prise) FROM tovari_po_ml WHERE id_tovar='$edit'");	
$myrow_min=$result_min->fetch_array();


///////////////////////////
$result_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$edit' ORDER by name ASC");      
$myrow_ml=$result_ml->fetch_array();

$mass_ml=array();
do {
	
$mass_ml[] = "-$myrow_ml[name]-";		

}
while ($myrow_ml=$result_ml->fetch_array());	

//print_r( $mass_ml );
    $set_po_ml=implode('',$mass_ml);

$add_infa = $db->query("UPDATE tovari SET prise='$myrow_min[0]', po_ml='$set_po_ml' WHERE id='$edit' ");
//////////////////////////


$obem_del=1;
}
	
}


////////////////////////////////////////////////////////////
////Добавление объема мл. начало///////////////////////
/////////////////////////////////////////////////////////

if (isset($_POST['add_pozic_ml'])) {$add_pozic_ml =1; } 
            else
            { $add_pozic_ml = '' ;}	
			
			
if (isset($_POST['prise'])){$prise = $_POST['prise'];}

if (isset($_POST['po_ml'])){$po_ml = $_POST['po_ml'];} 

if (isset($_POST['kolvo'])){$kolvo = $_POST['kolvo'];} 

									

if ($add_pozic_ml==1 and $prise and $po_ml){
	
if (!$prise) {}else {
	
$str_prise=strlen($prise);

if ($str_prise <2){}else { 

if ($str_prise >7){}else{

if (!preg_match("|^[\d]+$|", $prise))  {}	

else{$prise_norm=1;}

}
}
}

/////////////////////////////////////////////////


/////////////////////

if (!$po_ml) {$po_ml_norm=1;}else {
	
$str_po_ml=strlen($po_ml);

if ($str_po_ml <1){}else { 

if ($str_po_ml >7){}else{

if (!preg_match("|^[\d]+$|", $po_ml))  {}	

else{$po_ml_norm=1;}

}
}
}

/////////////////////

if (!$kolvo) {}else {
	
$str_kolvo=strlen($kolvo);

if ($str_kolvo <1){}else { 

if ($str_kolvo >7){}else{

if (!preg_match("|^[\d]+$|", $kolvo))  {}	

else{$kolvo_norm=1;}

}
}
}

/////////////////////////////////////////////////
if ($prise_norm==1 and $po_ml_norm==1 and $kolvo_norm==1){

$result_post_povtor77 = $db->query("SELECT * FROM tovari_po_ml WHERE name='$po_ml' and id_tovar='$edit'");	
$myrow_post_povtor77=$result_post_povtor77->fetch_array();


if (!$myrow_post_povtor77){

$add_infa = $db->query("INSERT INTO tovari_po_ml (name,prise,id_tovar,kolvo) VALUES('$po_ml','$prise','$edit','$kolvo')");
	

$result_min = $db->query("SELECT MIN(prise) FROM tovari_po_ml WHERE id_tovar='$edit'");	
$myrow_min=$result_min->fetch_array();

///////////////////////////
$result_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$edit' ORDER by name ASC");      
$myrow_ml=$result_ml->fetch_array();

$mass_ml=array();
do {
	
$mass_ml[] = "-$myrow_ml[name]-";		

}
while ($myrow_ml=$result_ml->fetch_array());

//print_r( $mass_ml );
$set_po_ml=implode('',$mass_ml);

$add_infa = $db->query("UPDATE tovari SET prise='$myrow_min[0]', po_ml='$set_po_ml' WHERE id='$edit' ");
//////////////////////////

$prise="";
$po_ml="";
$kolvo="";
$add_pozic_ml="";
	
}


}
}
////////////////////////////////////////////////////////////
////Изменение общей инфы начало///////////////////////
/////////////////////////////////////////////////////////	
if (isset($_POST['dobavit'])) {$dobavit =1; } 
            else
            { $dobavit = '' ;}	
	
						
if ($dobavit==1 || $add_pozic_ml==1){
	
	
if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
 
{
/**
* mb_ucfirst - преобразует первый символ в верхний регистр
* @param string $str - строка
* @param string $encoding - кодировка, по-умолчанию UTF-8
* @return string */
function mb_ucfirst($str, $encoding='windows-1251')
 
{
$str = mb_ereg_replace('^[\ ]+', '', $str);
$str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
mb_substr($str, 1, mb_strlen($str), $encoding);
return $str;
}
}
$str = $ALL['tsennost_word'];
	


if (isset($_POST['nazvanie'])){$nazvanie = $_POST['nazvanie'];}

if (isset($_POST['cat'])){$cat = $_POST['cat'];}

if (isset($_POST['sostav'])){$sostav = $_POST['sostav'];}

if (isset($_POST['opisanie'])){$opisanie = $_POST['opisanie'];}

if (isset($_POST['fupload'])){$fupload = $_POST['fupload'];}

if (isset($_POST['status'])){$status = $_POST['status'];} 

if (isset($_POST['old_price'])){$old_price = $_POST['old_price'];} 

if (isset($_POST['mugskaya'])){$mugskaya = $_POST['mugskaya'];} 
if (isset($_POST['genskaya'])){$genskaya = $_POST['genskaya'];} 

if (isset($_FILES['fupload'])){$fupload = $_FILES['fupload'];}


//$opisanie = $db->real_escape_string($opisanie);




/////////////////////////////////////////
if (!$nazvanie) {}else {
	
$str_nazvanie=strlen($nazvanie);

if ($str_nazvanie <3){}else { 

if ($str_nazvanie >85){}
else{
$nazvanie = stripslashes($nazvanie);
$nazvanie = htmlspecialchars($nazvanie);
$nazvanie = trim($nazvanie);
$nazvanie=mb_ucfirst($nazvanie);


$result_post_povtor2 = $db->query("SELECT * FROM tovari WHERE nazvanie='$nazvanie' and id !='$edit'");

$myrow_post_povtor2=$result_post_povtor2->fetch_array();


if (!$myrow_post_povtor2){$nazvanie_norm=1;}

}
}
}
/////////////////////



if ($nazvanie_norm==1 and $cat){
	
/////////////////////

$add_infa = $db->query("UPDATE tovari SET nazvanie='$nazvanie',opisanie='$opisanie',status='$status',cat='$cat',mugskaya='$mugskaya',genskaya='$genskaya' WHERE id='$edit' ");

//////////////////////////////////////////////////////////////////////
if ($_FILES['fupload']['tmp_name']){
	
function random1($count){
$pass = str_shuffle('1234567890');
                return substr($pass,3,$count);

}

$sluch3=random1(3);
	
$new_image= $myrow_tovar['seo_url'].'_'.$sluch3;
	
$privz=$new_image;


require '../foto/config.php'; //Подключаем файл конфигурации
   //require '../foto/process.php'; //Подключаем файл-обработчик
    require $_SERVER['DOCUMENT_ROOT'] .'/plupload-old/examples/jquery/foto_process_obrabotka.php';

if(isset($_FILES['fupload'])) {
	
	if(preg_match('/[.](jpg)|(JPG)|(JPEG)|(jpeg)|(PNG)|(png)|(GIF)|(gif)$/', //Ставим допустимые форматы изображений для загрузки
	 $_FILES['fupload']['name'])) {
		

		$filename = $_FILES['fupload']['name'];
		$source = $_FILES['fupload']['tmp_name'];	
		$target = $path_to_image_directory . $filename;
		
		move_uploaded_file($source, $target);


        saveImageWithMaxResolution1($filename);
		createThumbnail2($filename);	

				
$add_infa = $db->query("UPDATE tovari SET image='$new_image' WHERE id='$edit' "); 					
	 }
}	
	
}
//////////////////////////////////////////////////////////


$result_tovar = $db->query("SELECT * FROM tovari WHERE id ='$edit'"); 
$myrow_tovar = $result_tovar->fetch_array();

	
if ($add_infa) {
	
$okei="

<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/ok_min.png' width='50'  /></td>
    <td><p>Товар успешно изменен<br />
    Информация так же изменилась на сайте!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";	



}	
}

}


//////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
//////////////добавление фотографии в базу/////////////////////////////////////
////////////////////////////////////////////////////////////////////	

$put_do_faila="?edit=$edit";

		
if(isset($_FILES['fupload'])) {
	


function random($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil_1234567890-');
                return substr($pass,3,$count);	
	
}
	
////////////////////////////////////////////////////////////
$final_width_of_image_mini = 400;
$final_width_of_image_full = 1920;
$path_to_image_directory = $_SERVER['DOCUMENT_ROOT'] . '/foto/original/'; //Папка, куда будут загружаться файлы процесса обработки (потом уждаляется)
$path_to_full_directory = '../foto/full/'; //Папка, куда будут загружаться полноразмерные изображения 1920
$path_to_mini_directory = '../foto/mini/';//Папка, куда буду тзгружать 400
$full_znak_on=0; // по умолчанию наложение "водяного" рисунка(1-наложить)
$mini_znak_on=0; // по умолчанию наложение "водяного" рисунка(0-без наложения)
//////////////////////////////////////////////////////////////
			
$privz=$edit."_".random(5); 




	if(preg_match('/[.](jpg)|(JPG)|(JPEG)|(jpeg)|(png)|(PNG)$/', //Ставим допустимые форматы изображений для загрузки
$_FILES['fupload']['name'])) {

        $filename = $_FILES['fupload']['name'];
		$source = $_FILES['fupload']['tmp_name'];
		$target = $path_to_image_directory.$filename;

	
      //  require '../foto/process.php';
//copy($source, $target);

$new_filename=$privz.'.jpg';
move_uploaded_file($source, $target);

saveImageWithMaxResolution1($filename,$new_filename,$final_width_of_image_mini,$path_to_image_directory,$path_to_mini_directory);
createThumbnail2($filename,$new_filename,$final_width_of_image_full,$path_to_image_directory,$path_to_full_directory);
if($full_znak_on==1)
	{
		imposingImage($path_to_full_directory.$new_filename);
	}
if($mini_znak_on==1)
	{
		imposingImage($path_to_mini_directory.$new_filename);
	}

if(file_exists($path_to_full_directory.$new_filename) AND file_exists($path_to_mini_directory.$new_filename))
{
    $db->query("INSERT INTO tovari_foto (id_tovar,img,date_time) VALUES('$edit','$privz','$date $time')");
// удалить список файлов после загрузки. 

$foto_ok=1;  
}
	 
}

}

////	////////////////////
	

//////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
//////////////добавление фотографии в базу конец/////////////////////////////////////
////////////////////////////////////////////////////////////////////	


/////////////////////////////////////////////////////
////////////удаление фотографий начало//////////////
////////////////////////////////////////////////////
$foto_del_ok=0;

$del="";

if (isset($_GET['foto_del'])) {$foto_del =$_GET['foto_del']; 
if (!preg_match("|^[\d]+$|", $foto_del)) {exit("Попытка взлома зафиксирована!");}} 
else{ $foto_del = '' ;}


if ($foto_del){
	
				
$result_kuda = $db->query("SELECT * FROM tovari_foto WHERE id='$foto_del' and id_tovar='$edit'");	
$myrow_kuda=$result_kuda->fetch_array();


if ($myrow_kuda[id]){

///////////удаление файла1///////////////////

function deletfile($directory,$filename) {
  if (is_file("$directory/$filename")) {
    unlink("$directory/$filename");
    if (!file_exists("$directory/$filename")) { return true; }
  }
}

///////////////////////////////////////////
//echo"../foto/full/$myrow_tovar[image].jpg'";

deletfile('../foto/full/',$myrow_kuda["img"].".jpg"); 
deletfile('../foto/mini/',$myrow_kuda["img"].".jpg"); 
	

$result_del = $db->query("DELETE FROM tovari_foto WHERE id='$myrow_kuda[id]'");

$foto_del_ok=1;
}
}	
	

/////////////////////////////////////////////////////
////////////удаление фотографий конец//////////////
////////////////////////////////////////////////////



echo"
<div style='height:2px;'></div>
<div id='liniya_st'></div>
<div align='center'><h2>Редактирование товара</h2></div>";

if ($obem_del==1) {
	
echo"
<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/delete_m.png' width='50'  /></td>
    <td><p>Объем успешно удален!<br />
    Информация так же изменилась на сайте!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";	
}


if ($foto_del_ok==1) {
	
echo"
<div style='height:20px;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/delete_m.png' width='50'  /></td>
    <td><p>Фотография успешно удалена!<br />
    Информация так же изменилась на сайте!</p></td>
  </tr>
</table>
<div style='height:10px;'></div>
";	
}


echo"
<div id='forma_standart'>
<form enctype='multipart/form-data' method='POST' action='' class='decorated-form'>";
			    		        

////////////

echo"
<div>
<label class='field'>
<span>Наименование товара  <em>*</em></span>
<input name='nazvanie' type='text' id='nazvanie' value='"; if (!$nazvanie){echo"$myrow_tovar[nazvanie]";}else{echo"$nazvanie";}echo"' maxlength='150'/>
<span class='hint'>Например: Скраб для лица Cosmo</span>";

if ($dobavit==1) {

if (!$nazvanie) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_nazvanie=strlen($nazvanie);

if ($str_nazvanie <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_nazvanie >85){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 85 знаков!</strong></div>";}

if ($myrow_post_povtor2){echo"<div><strong style='color:#EB1F14'>Ошибка! Такое название уже существует!</strong></div>";}
}
}
///////////		
}

echo"
</label>
</div>
";



echo"


<label class='field'>
<span>Бренд товара <em>*</em></span>
<select name='cat' style='width:310px;'>
<option value='0'>Выберите категорию</option>
";

$result_cat_sobitiya = $db->query("SELECT * FROM post_cat1 ORDER BY name ASC");      
$myrow_cat_sobitiya=$result_cat_sobitiya->fetch_array();

do{
$select_tag="";

if ($myrow_tovar['cat']==$myrow_cat_sobitiya['id']) {$select_tag=" selected='selected'";}

echo"
<option value='$myrow_cat_sobitiya[id]'$select_tag>$myrow_cat_sobitiya[name]</option>";
						
}
while ($myrow_cat_sobitiya=$result_cat_sobitiya->fetch_array());

echo"</select>";

if ($dobavit==1) {
if (!$cat) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}
}

echo"
</label>";


//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////
echo"
<div style='height:5px;'></div>
<div style='border: 2px solid #dfcc7e; padding:3px;'>";

echo"
<table border='0' align='center'>
<tbody>
<tr>
<td width='24%'>";
echo"
<label class='field'>
<span>Объем в мл. <em>*</em></span>
<input name='po_ml' type='text' id='po_ml' value='$po_ml' maxlength='5'/>";

if ($add_pozic_ml==1) {

if (!$po_ml)  {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_po_ml=strlen($po_ml);

if ($str_po_ml <1){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 1 знаков!</strong></div>";}else { 

if ($str_po_ml >7){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 7 знаков!</strong></div>";}

else{
	
if (!preg_match("|^[\d]+$|", $po_ml))  {	
echo"
<div><strong style='color:#EB1F14'>В поле можно использовать только цифры!</strong></div>";
}	

}
}
}
///////////	///////////////////////////	
}
echo"
</label>";
echo"
</td>
<td width='10'>&nbsp;</td>
<td width='24%'>";

echo"
<label class='field'>
<span>Цена <em>*</em></span>
<input name='prise' type='text' id='prise' value='$prise' maxlength='7'/>";

if ($add_pozic_ml==1) {

if (!$prise) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_prise=strlen($prise);

if ($str_prise <2){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 2 знаков!</strong></div>";}else { 

if ($str_prise >7){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 7 знаков!</strong></div>";}

else{
	
if (!preg_match("|^[\d]+$|", $prise))  {	
echo"
<div><strong style='color:#EB1F14'>В цене можно использовать только цифры!</strong></div>";
}	

}
}
}
//////////////////////////////////////////////////////		
}
echo"
</label>
";
echo"
</td>";
///////////////////////////////////////
////////////////////////////////////////////////////
echo"
<td width='10'>&nbsp;</td>
<td width='24%'>";

echo"
<label class='field'>
<span>Кол-во в шт. <em>*</em></span>
<input name='kolvo' type='text' id='kolvo' value='$kolvo' maxlength='5'/>";

if ($add_pozic_ml==1) {

if (!$kolvo)  {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_kolvo=strlen($kolvo);

if ($str_kolvo <1){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 1 знаков!</strong></div>";}else { 

if ($str_kolvo >7){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 7 знаков!</strong></div>";}

else{
	
if (!preg_match("|^[\d]+$|", $kolvo))  {	
echo"
<div><strong style='color:#EB1F14'>В поле можно использовать только цифры!</strong></div>";
}	

}
}
}
///////////	///////////////////////////	
}
echo"
</label>";
echo"
</td>";
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
echo"
<td width='10'>&nbsp;</td>
<td width='24%'>
<div style='height:8px;'></div>
<button class='orange-button2' name='add_pozic_ml' type='submit'>добавить +</button>
</td>
</tr>
</tbody>
</table>";

////////////////////////////////////////////////////
$result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$edit' ORDER by name ASC");	
$myrow_po_ml=$result_po_ml->fetch_array();

if($myrow_po_ml){
	
function randomz($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
return substr($pass,3,$count);
}	
	
echo"
<div align='center' style='background-color:#CCCCCC;;'>
<table align='center' width='100%' border='0' cellpadding='2' cellspacing='1'>
<tr bgcolor='#dfcc7e;'>
<td width='24%'><div align='center' style='padding:1px; color:#5f1b13'>Объем</div></td>
<td width='24%'><div align='center' style='padding:1px; color:#5f1b13'>Цена</div></td>
<td width='24%'><div align='center' style='padding:1px; color:#5f1b13'>Кол-во</div></td>
<td width='24%'><div align='center' style='padding:1px; color:#5f1b13'></div></td>
</tr>
";	
	
do {
	
$sluch3=randomz(7);	
	
$prise_format = number_format($myrow_po_ml['prise'],0,'',' ');
		
echo"
<tr bgcolor='#FFFFFF'>
<td align='center'>
<div style='padding:4px;'>$myrow_po_ml[name] мл.</div>
</td>
<td align='center'>
<div style='padding:4px;'>$prise_format руб.</div>
</td>
<td align='center'>
<div style='padding:4px;'>$myrow_po_ml[kolvo] шт.</div>
</td>
<td align='center'>
<div style='padding:4px;'><a href='javascript: $sluch3();'>удалить</a></div>";

echo"<script type='text/javascript'> 
function $sluch3(){

if (confirm('Предупреждение!!!\\r\\nВы уверены, что хотите удалить объем-  $myrow_po_ml[name] мл.!?')) {
window.open('?edit=$edit&del_po_ml=$myrow_po_ml[id]',target='_self'); }

else {}
}
</script>";

echo"
</td>
</tr>
";

}
while ($myrow_po_ml=$result_po_ml->fetch_array());	

echo"
</table>
</div>";	
}

echo"
</div>
<div style='height:15px;'></div>
";
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////



echo"


<label class='field'>
<span>Товар в наличии</span>";


if ($myrow_tovar['status']==0){$selekt0='selected="selected"';}
if ($myrow_tovar['status']==1){$selekt1='selected="selected"';}

echo"


<select name='status' id='status'>
<option value='0' $selekt0 >Да</option>
<option value='1' $selekt1 >Нет</option>
</select>
</label>";




////////////////////////////////////////////////////////////
echo"
<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td>

<label class='field'>
<span>Мужская</span>
</label>

</td>

<td>
<input type='checkbox' name='mugskaya' value='1'";

if ($myrow_tovar['mugskaya']==1){echo" checked='checked'";}

echo" />
<div style='height:4px;'></div>
</td>


<td width='30'>&nbsp;</td>
<td>

<label class='field'>
<span>Женская</span>
</label>

</td>
<td>
<input type='checkbox' name='genskaya' value='1'";

if ($myrow_tovar['genskaya']==1){echo" checked='checked'";}

echo" />
<div style='height:4px;'></div>
</td>


</tr>
</table>";

///////////////////////////////////////////////////////////

echo"
<label class='field'>
<span>Описание товара</span>
</label>
<div style='height:2px;'></div>



<div style='color:#000000;'>
<textarea id='redactor_content' name='opisanie' style='width: 100%; height:320px; color:#000000;'>"; if (!$opisanie){echo"$myrow_tovar[opisanie]";}else{echo"$opisanie";}echo"
</textarea>
</div>
<div style='height:10px;'></div>

<div style='color:#000000; padding:5px; background-color:#CCCCCC;' align='center'>Выберите фото <input name='fupload' type='file' size='50' /></div>
";
                  
echo"
<div style='height:5px;'></div>
<div align='center' style='padding:4px;'><img src='../foto/mini/$myrow_tovar[image].jpg' border='0' width='150' /></div>";

echo"
<div style='height:5px;'></div>
<div align='center'><input name='dobavit' type='submit' value='Изменить товар' class='orange-button' /></div>
<div style='height:5px;'></div> 
";

///////////////////////////////

echo"           
</form>
</div> 
<div style='height:15px;'></div> 
";

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////
//////////////////////////////////////////////
///////////форма добавления фотографии////////
//////////////////////////////////////////////

echo"
<div style='height:2px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>
<div align='center'><h2>Добавление фотографий к товару</h2></div>
<div style='height:7px;'></div>
";


if ($foto_ok==1){
	
echo"
<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/ok_min.png' width='50'  /></td>
    <td><p>фото успешно загружено<br />
    Информация так же изменилась на сайте!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";		


}

echo"<div id='forma_standart'>";

echo"
<div style='height:10px;'></div>
<form id='form' method='post' action='' class='decorated-form'>";	
echo"	
	<div id='uploader'>
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>";

echo"
</form>
";
?>

    <script type="text/javascript">
        // Initialize the widget when the DOM is ready
        $(function() {
            $("#uploader").plupload({
                // General settings
                runtimes : 'html5,flash,silverlight,html4',
                url : '<? echo $put_do_faila ?>',

                // User can upload no more then 20 files in one go (sets multiple_queues to false)
                max_file_count: 30,

                // Resize images on clientside if we can
                /*		resize : {
                            width : 200,
                            height : 200,
                            quality : 90,
                            crop: true // crop to exact  dimensions
                        }, */

                filters : {
                    // Maximum file size
                    max_file_size : '300mb',
                    // Specify what files to browse for
                    mime_types: [
                        {title : "Image files", extensions : "jpg,jpeg,png"}
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
                    list: false,
                    thumbs: true, // Show thumbs
                    active: 'thumbs'
                },

                // Flash settings
                flash_swf_url : '../plupload/js/Moxie.swf',

                silverlight_xap_url : '../plupload/js/Moxie.xap',
                init: {
                    UploadComplete: function (up, files)
                    {
                        up.splice();
                        up.refresh();
                        window.location = '<? echo $put_do_faila ?>'
                    }
                }
            });
            uploader.init();



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



<?
echo"</div>";

echo"
<a name='foto_add'></a>
";


/////////////////////////
//////////////////////	
echo"
<div style='height:4px;'></div>";
/////////////фото конец///////////////


//////////////////////////////////////////////
///////////форма добавления фотографии конец ////////
//////////////////////////////////////////////

//////////////////////////////////////////////
///////////Вывод фотографий начало ////////
//////////////////////////////////////////////

$result_foto = $db->query("SELECT * FROM tovari_foto WHERE id_tovar='$edit' ORDER BY ID ASC");	
$myrow_foto=$result_foto->fetch_array();

if ($myrow_foto){
	
function generat($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
                return substr($pass,3,$count);
}		
	
echo"
<div style='height:7px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>
<div align='center'><h2>Дополнительные фотографии к товару</h2></div>
<div style='height:7px;'></div>
";	


echo"
<div class='grid'>";

do{
	
$sluch=generat(5); 	

echo"
<div id='blok_stat' align='center'>
<div id='blok_stat_img'>
<a href='../foto/full/$myrow_foto[img].jpg' target='_blank'>
<img src='../foto/mini/$myrow_foto[img].jpg'>
</a>
</div>
<div style='height:5px;'></div>

<div align='center'><a href='javascript: $sluch();' style='color:#FF0000; font-size:14px'><img src='/img/delete2.png' alt='Удалить фото' title='Удалить фото' width='18' height='18' border='0' align='absmiddle'>удалить фотографию</a></div>

<script type='text/javascript'> 
function $sluch(){

if (confirm('Предупреждение!!!\\r\\nВнимание! Изображение $myrow_foto[date] $myrow_foto[time] будет удалено безвозратно! \\r\\n\\r\\nВы действительно хотите совершить данную операцию?')) {
parent.location='?edit=$edit&foto_del=$myrow_foto[id]';
}
else {}
}
</script>

</div>
";	
		
}
while ($myrow_foto=$result_foto->fetch_array());	

echo"
</div>
<div style='height:15px;'></div>
";
	
}

//////////////////////////////////////////////
///////////Вывод фотографий конец ////////
//////////////////////////////////////////////


/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////
}
?>


<?

if ($meny==2 and $id_user_session==$id_admin_user){
	
echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>Управление брендами сайта</h1></div>
";	
	

function random($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
                return substr($pass,3,$count);

}


if (isset($_POST['add_kat'])) {$add_kat =1; } 
            else
            { $add_kat = '' ;}	



if (isset($_GET['id_cat1'])) {$id_cat1 =$_GET['id_cat1']; 
		    if (!preg_match("|^[\d]+$|", $id_cat1))    {
		    exit("Попытка взлома зафиксирована!");
}
} else{$id_cat1 = '' ;}	




//////////////////////////////////////////////////////////

if ($id_cat1){
$result_post_cat2 = $db->query("SELECT * FROM  post_cat1 WHERE id='$id_cat1'");	
$myrow_post_cat2=$result_post_cat2->fetch_array();

if (!$myrow_post_cat2){exit("Ошибка такой категории не существует!");}
}
//////////////////////////////////////////////////////////
//////////////////////////////////////////
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
//////////////////////////////////////	

	
/////////////////////////////////////////////////////////////////////////
////////////////Создание под категории id_cat2 начало/////////////////////
///////////////////////////////////////////////////////////////////////
        				

if ($add_kat==1){
/////////////////////////////////////////

if (isset($_POST['name_id_cat2'])) {$name_id_cat2 =$_POST['name_id_cat2']; } 
            else
            { $name_id_cat2 = '' ;}		

/////////////////////////////////////////
if ($name_id_cat2) {
	

/////////////////////////////////////////
if (!$name_id_cat2) {}else {
	
$str_name_id_cat2=strlen($name_id_cat2);

if ($str_name_id_cat2 <3){}else { 

if ($str_name_id_cat2 >50){}
else{
$name_id_cat2 = stripslashes($name_id_cat2);
$name_id_cat2 = htmlspecialchars($name_id_cat2);
$name_id_cat2 = trim($name_id_cat2);

$result_post_povtor2 =  $db->query("SELECT * FROM post_cat1 WHERE name='$name_id_cat2'");	
$myrow_post_povtor2=$result_post_povtor2->fetch_array();



if (!$myrow_post_povtor2){$name_id_cat2_norm=1;}

}
}
}
/////////////////////

if ($name_id_cat2_norm==1){

/////////////////////
/////////////////////
function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i','й'=>'j','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shh','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов

  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  return $s; // возвращаем результат
}



function strtolower_ru($text) {
 $alfavitlover = array('ё','й','ц','у','к','е','н','г', 'ш','щ','з','х','ъ','ф','ы','в', 'а','п','р','о','л','д','ж','э', 'я','ч','с','м','и','т','ь','б','ю');
 $alfavitupper = array('Ё','Й','Ц','У','К','Е','Н','Г', 'Ш','Щ','З','Х','Ъ','Ф','Ы','В', 'А','П','Р','О','Л','Д','Ж','Э', 'Я','Ч','С','М','И','Т','Ь','Б','Ю');
 return str_replace($alfavitupper,$alfavitlover,strtolower($text));
}

$name_id_cat_mini = strtolower_ru($name_id_cat2);


$result555 = translit($name_id_cat_mini);

$name_id_cat2=mb_ucfirst($name_id_cat2);	
$result555 = translit($name_id_cat2);


$add_infa =  $db->query("INSERT INTO  post_cat1 (name,seo_url) VALUES ('$name_id_cat2','$result555')");

$result_inf555 =  $db->query("SELECT * FROM post_cat1 ORDER BY id DESC LIMIT 1");	
$myrow_inf555=$result_inf555->fetch_array();	

$add_infa =  $db->query("INSERT INTO site_pages (translit_url,name_url,url,id_cat1,lastmod) VALUES('$result555/','$result555','tovar_cat.php?id=$myrow_inf555[id]','$myrow_inf555[id]',NOW())");


$name_id_cat2="";
$add_kat=0;
}

/////////////////////////	
	
}	
	
}																																		
/////////////////////////////////////////////////////////////////////////
////////////////Создание под категории id_cat2 конец/////////////////////
///////////////////////////////////////////////////////////////////////									

/////////////////////////////////////////////////////
////////////удаление del_id_cat1 начало//////////////
////////////////////////////////////////////////////
$foto_del_ok=0;

$del="";

if (isset($_GET['del_id_cat2'])) {$del_id_cat2	 =$_GET['del_id_cat2']; 
if (!preg_match("|^[\d]+$|", $del_id_cat2	)) {exit("Попытка взлома зафиксирована!");}} 
else{ $del_id_cat2	 = '' ;}


if ($del_id_cat2	){
	
				
$result_kuda =  $db->query("SELECT * FROM post_cat1 WHERE id='$del_id_cat2'");	
$myrow_kuda=$result_kuda->fetch_array();


if ($myrow_kuda[id]){


$result_del =  $db->query("DELETE FROM post_cat1 WHERE id='$myrow_kuda[id]'");

$result_del =  $db->query("DELETE FROM site_pages WHERE id_cat1='$myrow_kuda[id]'");

$foto_del_ok=1;
}
}	
	

/////////////////////////////////////////////////////
////////////удаление del_id_cat2 конец//////////////
////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////
////////////////Вывод гланых категорий id_cat2 начало/////////////////////
///////////////////////////////////////////////////////////////////////



if (!$id_cat1 and !$id_organizac){



if ($foto_del_ok==1){
  
echo"

<div style='height:10px;'></div>
<div id='liniya_st'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/delete_m.png' width='50' height='50' /></td>
    <td><p>Бренд успешно удален!<br />
    Изменения уже вступили в силу</p></td>
  </tr>
</table>
<div id='liniya_st'></div>
<div style='height:10px;'></div>
";	
  
}



echo"
<div style='height:5px;'></div>
<div id='forma_standart'>
<div align='center' style='background-color:#d3ba6a; color:#000000; padding:5px;'><strong>Добавить новый бренд</strong></div>
<div style='height:10px;'></div>

<form enctype='multipart/form-data' action='' method='post' name='forma' class='decorated-form'>";


echo"
<div align='center'>
<label class='field'>
<span>Наименование бренда  <em>*</em></span>
<input name='name_id_cat2' type='text' id='name_id_cat2' value='$name_id_cat2' maxlength='50' style='width:300px;'/>
<span class='hint'>Например: Al-REHAB</span>";

if ($add_kat==1) {

if (!$name_id_cat2) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_name_id_cat2=strlen($name_id_cat2);

if ($str_name_id_cat2 <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_name_id_cat2 >50){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 50 знаков!</strong></div>";}

if ($myrow_post_povtor2){echo"<div><strong style='color:#EB1F14'>Ошибка! Такая категория уже существует в этом разделе!</strong></div>";}
}
}
///////////		
}

echo"
</label>
</div>
";


echo"
<div style='height:10px;'></div>
<table border='0' align='center'>
<tr>
<td>
<div style='padding:2px;'><strong><a href='/admin' style='color:#000000; text-decoration:none;'><<Вернуться назад</a></strong></div>
</td>
<td width='25'>&nbsp;</td>
<td>
<div align='center'>
<input name='add_kat' type='submit' value='Добавить название бренда' class='orange-button' />
</div>
</td>
</tr>
</table>

</form>
</div>
";


$result_post_cat2 =  $db->query("SELECT * FROM post_cat1 ORDER BY name ASC");	
$myrow_post_cat2=$result_post_cat2->fetch_array();


if($myrow_post_cat2){ 


echo"
<div style='height:15px;'></div>";

do{
	




$result_rozn22 =  $db->query("SELECT id FROM post_cat_id WHERE id_cat2='$myrow_post_cat2[id]'"); //бывшая spravocnik_cat_org
$myrow_rozn22= $result_rozn22->num_rows;

$sluch4=random(30); 

echo"
<div align='center'> <a href='?meny=$meny&id_cat1=$myrow_post_cat2[id]'>$myrow_post_cat2[name]</a> <a href='../$myrow_post_cat2[seo_url]' target='_blank'>[Всего товаров: $myrow_rozn22]</a>"; if ($myrow_rozn22==0){ echo"&nbsp;&nbsp;<a href='javascript: $sluch4();'><img border='0' src='../img/delete2.png' width='22' height='22' align='absmiddle' /></a>

<script type='text/javascript'> 
function $sluch4(){

if (confirm('Предупреждение!!!\\r\\nВы пытаетесь удалить бренд - $myrow_post_cat2[name]   \\r\\n\\r\\n\\r\\n\\r\\nВы действительно хотите совершить данную операцию?')) {
parent.location='?meny=$meny&del_id_cat2=$myrow_post_cat2[id]';
}
else {}
}
</script>";
}

if ($myrow_post_cat2[opisanie]==''){echo" [!]нет описания";}

echo"
</div>
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:10px;'></div>";


}
while ($myrow_post_cat2=$result_post_cat2->fetch_array());	


}
echo"<div style='height:30px;'></div>";

}
/////////////////////////////////////////////////////////////////////////
////////////////Вывод гланых категорий id_cat2 конец/////////////////////
///////////////////////////////////////////////////////////////////////










/////////////////////////////////////////////////////////////////////////
////////////////Обновление описания  id_cat2 начало/////////////////////
///////////////////////////////////////////////////////////////////////

if ($id_cat1){
	

if (isset($_POST['kat_update'])) {$kat_update =1; } 
            else
            { $kat_update = '' ;}	
			
			 
if ($kat_update==1){



if (isset($_POST['name'])) {$name =$_POST['name']; } 
            else
            { $name = '' ;}
			
if (isset($_POST['zagolovok_h1'])) {$zagolovok_h1 =$_POST['zagolovok_h1']; } 
            else
            { $zagolovok_h1 = '' ;}					

			
if (isset($_POST['title'])) {$title =$_POST['title']; } 
            else
            { $title = '' ;}
					

if (isset($_POST['keywords'])) {$keywords =$_POST['keywords']; } 
            else
            { $keywords = '' ;}	
			

if (isset($_POST['description'])) {$description =$_POST['description']; } 
            else
            { $description = '' ;}						


if (isset($_POST['seo_url'])) {$seo_url =$_POST['seo_url']; } 
            else
            { $seo_url = '' ;}
			
						
if (isset($_POST['text1'])) {$text1 =$_POST['text1']; } 
            else
            { $text1 = '' ;}



/////////////////////


if (!$name) {
		
}else{
$str_name=strlen($name);

if ($str_name <3){

}else { 

if ($str_name >50){

	
}else{

	
$name = stripslashes($name);
$name = htmlspecialchars($name);
$name = trim($name);
//$name=mb_ucfirst($name);	
$name_norm=1;}			
}		
}  


/////////////////////


if (!$zagolovok_h1) {
		
}else{
$str_zagolovok_h1=strlen($zagolovok_h1);

if ($str_zagolovok_h1 <6){

}else { 

if ($str_zagolovok_h1 >120){

	
}else{

	
$zagolovok_h1 = stripslashes($zagolovok_h1);
$zagolovok_h1 = htmlspecialchars($zagolovok_h1);
$zagolovok_h1 = trim($zagolovok_h1);
//$zagolovok_h1=mb_ucfirst($zagolovok_h1);	
$zagolovok_h1_norm=1;}			
}		
}  

////////////////////

if (!$title) {
		
}else{
$str_title=strlen($title);

if ($str_title <6){

}else { 

if ($str_title >120){

	
}else{
	
$title = stripslashes($title);
$title = htmlspecialchars($title);
$title = trim($title);	
//$title=mb_ucfirst($title);
$title_norm=1;}		
		
}		
}  

////////////////////


////////////////////

if (!$seo_url) {
		
}else{
$str_seo_url=strlen($seo_url);

if ($str_seo_url <6){

}else { 

if ($str_seo_url >90){

	
}else{

	
$seo_url = stripslashes($seo_url);
$seo_url = htmlspecialchars($seo_url);
$seo_url = trim($seo_url);	
$seo_url_norm=1;}			
}		
}  

////////////////////

/////////////////////

if (!$keywords) {
		
}else{
$str_keywords=strlen($keywords);

if ($str_keywords <6){

}else { 

if ($str_keywords >150){

	
}else{
	
$keywords = stripslashes($keywords);
$keywords = htmlspecialchars($keywords);
$keywords = trim($keywords);	
$keywords_norm=1;}		
		
}		
}  
////////////////////

/////////////////////

if (!$description) {
$description_norm=1;		
}else{
$str_description=strlen($description);

if ($str_description <55){

}else { 

if ($str_description >350){

	
}else{
	
$description = stripslashes($description);
$description = htmlspecialchars($description);
$description = trim($description);	
$description_norm=1;}		
		
}		
}  

////////////////////
if (!$text1) {
$text1_norm=1;		
}else{
$str_text1=strlen($text1);

if ($str_text1 <10){

}else { 

if ($str_text1 >50000){}

else{

$text1 = trim($text1);	
$text1_norm=1;	
	
}		
}
}
////////////////////////////////////
////////////////////


////////////////////////////////

if ($name_norm==1 AND $keywords_norm==1 AND $description_norm==1 and $seo_url_norm==1 AND $title_norm==1 AND $zagolovok_h1_norm==1 and $text1_norm==1){
	
	//echo"777";

$obnov =  $db->query("UPDATE post_cat1 SET name='$name', seo_url='$seo_url', title='$title', zagolovok_h1='$zagolovok_h1', keywords='$keywords',description='$description',text1='$text1' WHERE id='$id_cat1'");


$result300 =  $db->query("UPDATE site_pages SET translit_url='$seo_url/', name_url = '$seo_url' WHERE id_cat1='$id_cat1'");

$result_post_cat2 =  $db->query("SELECT * FROM  post_cat1 WHERE id='$id_cat1'");	
$myrow_post_cat2=$result_post_cat2->fetch_array();
}
}

	


echo"
<a name='yakor' id='yakor'></a>
<div id='forma_standart'>


<div style='background-color:#d3ba6a; color:#000000; padding:5px; '>
<div><strong>$myrow_post_cat1[name]>";

if ($myrow_post_cat2[name]){echo"> $myrow_post_cat2[name]";}


echo"
<a href='../$myrow_post_cat2[seo_url]' target='_blank' title='Открыть страницу категории'>
<img src='../img/blank_new.png' width='20' height='20' border='0' title='Открыть страницу категории' /></a>

</strong></div></div>
<div style='height:5px;'></div>

<div style='height:10px;'></div>
<form enctype='multipart/form-data' action='#yakor' method='post' name='forma' class='decorated-form'>";


echo"
<div align='center'>
<label class='field'>
<span>Название бренда <em>*</em></span>
<input name='name' type='text' id='name' value='$myrow_post_cat2[name]' maxlength='50' style='width:300px;'/>";

if ($kat_update==1) {

if (!$name) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_name=strlen($name);

if ($str_name <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_name >50){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 50 знаков!</strong></div>";}

if ($myrow_post_povtor2){echo"<div><strong style='color:#EB1F14'>Ошибка! Такая подкатегория уже существует в этом разделе!</strong></div>";}
}
}
///////////		
}

echo"
</label>
</div>
";

/////////////////////////////////
echo"
<label class='field'>
<span>SEO url <em>*</em></span>
<input name='seo_url' type='text' id='seo_url' value='$myrow_post_cat2[seo_url]' size='120' maxlength='100' />";
if ($kat_update==1) {

if (!$seo_url) {
		
echo"

<strong style='color:#DE0E0E' >Введите название seo_url!</strong><br />";
}else{
$str_seo_url=strlen($seo_url);

if ($str_seo_url <6){
echo"
<strong style='color:#DE0E0E'>Название seo_url должно быть не менее 6 символов!</strong><br />";	

}else { 

if ($str_seo_url >90){
echo"
<strong style='color:#DE0E0E'>Название seo_url должно быть не больше 90 символов!</strong><br />";		
	}

else{}	
	
	}  }
}
echo"
</label>
";
/////////////////////////////////



/////////////////////////////////
echo"
<label class='field'>
<span>Title <em>*</em></span>
<input name='title' type='text' value='"; if($myrow_post_cat2[title]){echo $myrow_post_cat2[title];}else{echo $title;}echo"' size='120' maxlength='120'  />";
if ($kat_update==1) {

if (!$title) {
		
echo"

<strong style='color:#DE0E0E' >Введите Title!</strong><br />";
}else{
$str_title=strlen($title);

if ($str_title <6){
echo"
<strong style='color:#DE0E0E'> Title статьи должно быть не менее 6 символов!</strong><br />";	

}else { 

if ($str_title >120){
echo"
<strong style='color:#DE0E0E'> Title статьи должно быть не больше 120 символов!</strong><br />";		
	}

else{}	
	
	}  }
}
echo"
</label>
";
/////////////////////////////////


/////////////////////////////////
echo"
<label class='field'>
<span>Название статьи H1 <em>*</em></span>
<input name='zagolovok_h1' type='text' id='zagolovok_h1' value='"; if($myrow_post_cat2[zagolovok_h1]){echo $myrow_post_cat2[zagolovok_h1];}else{echo $zagolovok_h1;}echo"' size='120' maxlength='120' />";
if ($kat_update==1) {

if (!$zagolovok_h1) {
		
echo"

<strong style='color:#DE0E0E' >Введите название статьи!</strong><br />";
}else{
$str_zagolovok_h1=strlen($zagolovok_h1);

if ($str_zagolovok_h1 <6){
echo"
<strong style='color:#DE0E0E'>Название статьи должно быть не менее 6 символов!</strong><br />";	

}else { 

if ($str_zagolovok_h1 >120){
echo"
<strong style='color:#DE0E0E'>Название статьи должно быть не больше 120 символов!</strong><br />";		
	}

else{}	
	
	}  }
}
echo"
</label>
";
/////////////////////////////////


/////////////////////////////////
echo"
<label class='field'>
<span>Ключевые слова через запятую (Keywords)<em>*</em></span>
<div style='height:2px;'></div>
<input name='keywords' type='text' id='keywords' value='"; if($myrow_post_cat2[keywords]){echo $myrow_post_cat2[keywords];}else{echo $keywords;}echo"' size='120' maxlength='100' />";
if ($kat_update==1) {

if (!$keywords) {
		
echo"

<strong style='color:#DE0E0E' >Введите ключевые слова!</strong><br />";
}else{
$str_keywords=strlen($keywords);

if ($str_keywords <6){
echo"
<strong style='color:#DE0E0E'>Ключевые слова должно быть не менее 6 символов!</strong><br />";	

}else { 

if ($str_name >150){
echo"
<strong style='color:#DE0E0E'>Ключевые слова должно быть не больше 150 символов!</strong><br />";		
	}

else{}	
	
	}  }
}
echo"
</label>
";
/////////////////////////////////

/////////////////////////////////
echo"
<label class='field'>
<span>Краткое описание (Description)</span>
<div style='height:2px;'></div>
<textarea name='description' cols='90' rows='4' style='width:98%;'>"; if($myrow_post_cat2[description]){echo $myrow_post_cat2[description];}else{echo $description;}echo"</textarea>
";
if ($kat_update==1) {

if (!$description) {
		
//echo"<strong style='color:#DE0E0E'>Введите краткое описание!</strong><br />";
}else{
$str_description=strlen($description);

if ($str_description <55){
echo"
<strong style='color:#DE0E0E'>Краткое описание статьи должно быть не менее 55 символов!</strong><br />";	

}else { 

if ($str_description >350){
	
echo"
<strong style='color:#DE0E0E'>Краткое описание статьи должно быть не более 350 символов!</strong><br />";	
	
	}

else{}	
	
	}  }
}
echo"
</label>
";
/////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


/////////////////////////////// описание


echo"      
<div style='height:10px;'></div>

<span>Описание категории</span> 
<textarea id='redactor_content' name='text1' style='width: 100%; height: 320px; text-align: left;'>";if($myrow_post_cat2[text1]){echo $myrow_post_cat2[text1];}else{echo $text1;} echo"</textarea>
";
                          
if ($kat_update==1) {
	
$text1=preg_replace("/(\\n|\\r|\\t|\\0| {2,})/", "", $text1);
$myrow_post_cat2[text1]=preg_replace("/(\\n|\\r|\\t|\\0| {2,})/", "", $myrow_post_cat2[text1]);	

if (!$text1) {//echo"<strong style='color:#DE0E0E'>Введите описание!</strong>";
}else {
	
$str_text1=strlen($text1);

if ($str_text1 <10){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 10 знаков!</strong></div>";}else { 

if ($str_text1 >50000){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 50000 знаков!</strong></div>";}else{
	
}


}
}
}


echo"

";
/////////////////////////////описание конец/////////////


echo"
<table border='0' align='center'>
<tr>
<td>
<div style='padding:2px;'><strong><a href='?meny=$meny' style='color:#000000; text-decoration:none;'><<Вернуться назад</a></strong></div>
</td>
<td width='25'>&nbsp;</td>
<td>
<div align='center'>
<input name='kat_update' type='submit' value='Обновить бренд' class='orange-button' />
</div>
</td>
</tr>
</table>

</form>
</div>
<div style='height:15px;'></div>
";
/////////////////////////////////////////////////////////////////////////
////////////////Обновление описания  id_cat2 конец/////////////////////
///////////////////////////////////////////////////////////////////////
}


}
?>
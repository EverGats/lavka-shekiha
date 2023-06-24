<?
session_start();
include ("blocks/bd.php") ;

$otziv_ok=0;

if (isset($_POST['dobavit'])) {$dobavit =1; } 
            else
            { $dobavit = '' ;}	
			
if ($dobavit==1){			
if (isset($_POST['fio'])){$fio = $_POST['fio'];}
if (isset($_POST['telefon'])){$telefon = $_POST['telefon'];}
if (isset($_POST['opisanie'])){$opisanie = $_POST['opisanie'];}


/////////////////////////////////////////
if (!$fio) {}else {
	
$str_fio=strlen($fio);

if ($str_fio <3){}else { 

if ($str_fio >55){}
else{
$seo_fio=$fio;
$fio = stripslashes($fio);
$fio = htmlspecialchars($fio);
$fio = trim($fio);

$fio_norm=1;

}
}
}

/////////////////////////////////////////////////

/////////////////////////////////////////
if (!$opisanie) {}else {
	
$str_opisanie=strlen($opisanie);

if ($str_opisanie <10){}else { 

if ($str_opisanie >5000){}
else{
$seo_opisanie=$opisanie;
$opisanie = stripslashes($opisanie);
$opisanie = htmlspecialchars($opisanie);
$opisanie = trim($opisanie);

$result_post_povtor2 = mysql_query ("SELECT * FROM otzivi WHERE opisanie='$opisanie'");	
$myrow_post_povtor2=mysql_fetch_array ($result_post_povtor2);


if (!$myrow_post_povtor2){$opisanie_norm=1;}

}
}
}

/////////////////////////////////////////////////


if ($telefon) 
	{
		$v_phone0=$telefon;
		$v_phone=substr($v_phone0,3,3).substr($v_phone0,8,3).substr($v_phone0,12,2).substr($v_phone0,15,2);
		//echo $v_phone;
	}						
////////////////////////////////////////////

if ($fio_norm==1 and $opisanie_norm==1){
	
$add_infa = mysql_query ("INSERT INTO otzivi (fio,telefon,date_time,date_time_format,opisanie) VALUES('$fio','$v_phone','$date $time',NOW(),'$opisanie')");	
$otziv_ok=1;

$fio="";
$telefon="";
$opisanie="";
$dobavit="";
	
}
}



echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";

?>

<?

echo"
<title>Отзывы о магазине Шейх Парфюм</title>
<meta name='Robots' content='NOINDEX' />
";


echo"
$myr_html[styl_skript_icon]";
?>
<script type="text/javascript" src="js/jquery.maskedinput.min.js" ></script>

<script>
$(document).ready(function() {
    $("#telephone").mask("+7(999) 999-99-99");
});
</script>  



<style>
  
#blok_otzivi { 
width:94%;
text-align: left;
margin:0 auto;
background:#fff;
padding-top: 15px;
padding-bottom: 15px;
padding-left:3px; 
padding-right:3px; 
border: 1px solid #dfcc7e;
border-radius: 3px;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-webkit-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
}

</style>


<?
echo"	
</head>
<body  id='top'>";

include ("blocks/header.php");
include ("blocks/navigation.php");

echo"
<div id='container_site'>	
<div id='sidebar'>";
include ("blocks/left_meny.php");
echo"
</div> 
<div id='content'>";

echo"
<div style='height:6px;'></div>
<div id='ssilka_mob'><a href='/'>Главная</a>&nbsp;<em>&rarr;</em>&nbsp;</div>";

echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>Отзывы о магазине Шейх Парфюм</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>

<?
echo"
<div style='height:3px;'></div>";




/////////////////////////////////////////////////////////

echo"
<div align='center'>Здесь вы можете оставить свой отзыв о нашем магазине Шейх Парфюм.</div>
<div style='height:6px;'></div>
";

if ($otziv_ok==1){
echo"	
<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/ok_min.png' width='50'  /></td>
    <td><p>Ваш отзыв успешно добавлен!<br />
    Спасибо что уделили свое время!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>";
}
/////////////////////////////////
echo"
<div id='forma_standart'>
<form enctype='multipart/form-data' method='POST' action='' class='decorated-form'>";

////////////

echo"
<div>
<label class='field'>
<span>Имя <em>*</em></span>
<input name='fio' type='text' id='fio' value='$fio' maxlength='55' required=''/>
<span class='hint'>Например: Андрей Игоревич</span>";

if ($dobavit==1) {

if (!$fio) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_fio=strlen($fio);

if ($str_fio <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_fio >85){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 55 знаков!</strong></div>";}

}
}
///////////		
}

echo"
</label>
</div>
";

////////////////////////////////
echo"
<label class='field'>
<span>Номер телефона <em>*</em>
<span style='font-size:11px;'>(телефон увидит только администрация сайта!)</span></span>
<div style='height:3px;'></div>
<input name='telefon' type='text' id='telephone' "; if ($_SESSION['id_klient']){echo"value='$_SESSION[login_klient]'";}else{ echo"value='$v_phone0'";} echo" maxlength='50' style='width:240px;' required='' "; if ($_SESSION['id_klient']){echo"disabled";} echo"/>
<span class='hint'>Пример: +7 (987) 23-56-478</span>
";

if ($add_obekt==1) {

if (!$telefon) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_telefon=strlen($telefon);

if ($str_telefon <6){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 6 знаков!</strong></div>";} else {

if ($str_telefon >50){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 50 знаков!</strong></div>";} 	

}
}
}	

echo"</label>
";

/////////////////////////////////


echo"
<label class='field'>
<span>Ваш отзыв <em>*</em></span>
<textarea name='opisanie' style='width: 98%; height:120px; color:#000000;' required=''>$opisanie
</textarea>
";

if ($dobavit==1) {

if (!$opisanie) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_opisanie=strlen($opisanie);

if ($str_opisanie <5){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 5 знаков!</strong></div>";}else { 

if ($str_opisanie >5000){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 5000 знаков!</strong></div>";}

}
}
///////////		
}

echo"
</label>
<div style='height:10px;'></div>";

echo"
<div align='center'><input name='dobavit' type='submit' value='Добавить отзыв' class='orange-button' /></div>
<div style='height:5px;'></div> 
";

echo"           
</form>
</div> 
<div style='height:15px;'></div> 
";

///////////////////////////////
	
?>



<?
$result_otziv = mysql_query("SELECT * FROM otzivi WHERE id_post='0' ORDER BY id DESC");      
$myrow_otziv=mysql_fetch_array ($result_otziv);	

if ($myrow_otziv){
	
do {


echo"
<div>
<div id='blok_otzivi' style='padding:10px;'>
<div>Автор: $myrow_otziv[fio]</div>
<div>Дата: $myrow_otziv[date_time]</div>
<div style='height:5px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>
<div>$myrow_otziv[opisanie]</div>
</div>
</div>
<div style='height:20px;'></div>
";


}
while ($myrow_otziv=mysql_fetch_array ($result_otziv));	
	
}

?>



<?


echo"
</div>
</div>
<div style='height:15px;'></div>

<div style='clear: both;'></div>
";


  

include ("blocks/footer.php");


echo"
</body>
</html>";
?>
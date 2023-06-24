<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";


           if (isset($_POST['zakaz_pereschet'])) {$zakaz_pereschet =1; } 
            else
            { $zakaz_pereschet = '' ;}	
			
			if (isset($_POST['zakaz_na_oplaty'])) {$zakaz_na_oplaty =1; } 
            else
            { $zakaz_na_oplaty = '' ;}	
			

$dostavka_po=350;
	
////////////////////////////////////////////////////
/////////////////////////перерасчет заказа начало////////
////////////////////////////////////////////////////

if ($zakaz_pereschet==1 || $zakaz_na_oplaty==1){
	

	
$aDoor = $_POST['formDoorz'];

if(empty($aDoor)){echo("Вы ничего не выбрали!");}

else{

$N = count($aDoor);

for($i=0; $i < $N; $i++){

$result_povtor_wabl_cat = mysql_query ("SELECT * FROM vibranie_tovari WHERE id='$aDoor[$i]' and tag='0'");
$myrow_povtor_wabl_cat=mysql_fetch_array ($result_povtor_wabl_cat);		

$form_st="kolvo$aDoor[$i]";
$kolvo=$_POST[$form_st];

$form_st2="skidka_discont$aDoor[$i]";
$skidka_discont=$_POST[$form_st2];


if ($kolvo){	

if ($myrow_povtor_wabl_cat){

$kolvo = trim($kolvo);	
$skidka_discont = trim($skidka_discont);

$obnov = mysql_query ("UPDATE vibranie_tovari SET colichestvo='$kolvo',dostavka='$dostavka' WHERE id='$aDoor[$i]'");}

$wabl_ok=1;

$summa_tovara=($myrow_povtor_wabl_cat[cena_za_ed]*$myrow_povtor_wabl_cat[colichestvo]);
$summa_tovarov_z= $summa_tovarov_z + $summa_tovara;
}

if ($kolvo==0){
	
$result4 = mysql_query ("DELETE FROM vibranie_tovari WHERE id='$aDoor[$i]'");


}

}
}
}



/*
if ($zakaz_na_oplaty==1){
	

$result_po = mysql_query ("SELECT * FROM vibranie_tovari WHERE id_zakaz='$zakaz_id_dop' and tag='0'");
$myrow_po=mysql_fetch_array ($result_po);		
	
if ($myrow_po){

$obnov = mysql_query ("UPDATE vibranie_tovari SET tag='1' WHERE id_klient='$myrow_po[id_klient]' and id_zakaz='$zakaz_id_dop' and tag='0'");	

}
}
*/
////////////////////////////////////////////////////////////////////////
if ($zakaz_na_oplaty==1 and $summa_tovarov_z){
$_SESSION[korzina_wag]=1; 
$_SESSION[summa_oplati]=$summa_tovarov_z+$dostavka_po;
}
/////////////////////////////////////////////////////////////////
           
		   if (isset($_POST['zakaz_na_oplaty1'])) {$zakaz_na_oplaty1 =1; } 
            else
            { $zakaz_na_oplaty1 = '' ;}	

if ($zakaz_na_oplaty1==1){$_SESSION[korzina_wag]=""; $_SESSION[summa_oplati]="";}

////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
if (isset($_POST['zakaz_na_oplaty2'])) {$zakaz_na_oplaty2 =1; } 
            else
            { $zakaz_na_oplaty2 = '' ;}	
			

if (isset($_POST['fio'])) {$fio =$_POST['fio']; } 

if (isset($_POST['adres'])) {$adres =$_POST['adres']; } 

if (isset($_POST['mail'])) {$mail =$_POST['mail']; } 

if (isset($_POST['koment'])) {$koment =$_POST['koment']; } 

if (isset($_POST['telefon'])) {$telefon =$_POST['telefon']; } 		

if ($telefon) 
	{
		$v_phone0=$telefon;
		$v_phone=substr($v_phone0,3,3).substr($v_phone0,8,3).substr($v_phone0,10,5);
		//echo $v_phone;
	}	


echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";
?>

<style>

#mob_otstup_korzina{display: none;}
  
#blok_stat_korzina  {
position:relative;
float:left; 
width:100%;
background:#fff;
padding-top: 15px;
padding-bottom: 15px;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-webkit-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
}  

#blok_stat_img_korzina {
float:left; 
margin: 0px 13px 0px 13px;
padding:2px;
background:#fff;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
}

#blok_stat_img_korzina img {
width:150px;
border:0;
}

#blok_stat_img_korzina a img {
border: 1px solid #CCCCCC; 
}

#blok_stat_img_korzina a:hover img{	
border: 1px solid #1678b2; 
}

.orange-button2{
	display: block;
	height: 34px;
	padding: 0 15px;
	border: 1px solid #5f1b13;;
	border-radius: 3px;
	box-shadow: inset 0px 0px 1px white, 0px 1px 2px #dfcc7e;
	background: #dfcc7e; /* Old browsers */
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	color: #5f1b13;
	cursor: pointer;
	width: 300px;	
}

.orange-button2:hover{
	background: #caac52; /* Old browsers */
}



@media screen and (max-width: 900px) {
.orange-button2{width: 100%;}
}

@media screen and (max-width: 700px) {
#blok_stat_img_korzina img {width:100%;}
#mob_otstup_korzina{display: block;}
}


</style>


<?

echo"
<title>Корзина покупателя</title>
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
<div id='ssilka_mob'><a href='/'>Главная</a>&nbsp;<em>&rarr;</em>&nbsp;";

echo "<a href='../korzina'>Корзина покупателя</a>";

echo"
<em>&rarr;</em>&nbsp;</div>";

echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>Корзина покупателя</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>




<?
if (!$_SESSION[korzina_wag]){

echo"
<div style='height:3px;'></div>";

$result_korzina = mysql_query ("SELECT * FROM vibranie_tovari WHERE talon='$_SESSION[talon]' order by id desc");
$myrow_korzina =  mysql_fetch_array($result_korzina);	


if ($myrow_korzina){
	
echo"<form enctype='multipart/form-data' method='POST' action='' class='decorated-form'>";	

$skidka_on=0;
	
do {
	
$result_tovar = mysql_query ("SELECT * FROM tovari WHERE id='$myrow_korzina[id_tovara]'");
$myrow_tovar =  mysql_fetch_array($result_tovar);		
	
echo"
<div style='height:20px;'></div>
<div id='blok_stat_korzina'>
<div id='blok_stat_img_korzina'>
<a href='../$myrow_tovar[seo_url]'>
<img src='../foto/mini/$myrow_tovar[image].jpg' alt='$myrow_tovar[nazvanie]' title='$myrow_tovar[nazvanie]'>
</a>
</div>

<div style='margin-left:15px;'>
<div id='mob_otstup_korzina'><div style='clear: both;'></div><div style='height:10px;'></div></div>
<div><a class='blok_stat_zag' href='../$myrow_tovar[seo_url]'>$myrow_tovar[nazvanie]</a></div>
<div style='height:1px;'></div>
<div style='color:#787878;'>Артикул на сайте: $myrow_tovar[id]</div>
<div style='height:10px;'></div>";

if ($myrow_korzina[cena_za_ed]){

if ($myrow_korzina[old_price]!=0){

$skidka_on=1;
	
$old1_=$myrow_korzina[old_price]/$myrow_korzina[cena_za_ed];	
$old1=$myrow_korzina[old_price]*$myrow_korzina[colichestvo];
$old2=floor(100-(100/$old1_));
$old2 = abs($old2);
	
$old1_format = number_format($old1,0,'',' ');


$raznica_skidka=($myrow_korzina[old_price]*$myrow_korzina[colichestvo])-($myrow_korzina[cena_za_ed]*$myrow_korzina[colichestvo]);

$old_price="
<span style='font-size:15px; padding-left:4px; color:#E10001;'>&ndash; $old2%</span>
";

$old_price2="
<div style='font-size:13px; color:#787878;'>Старая цена: <span style='text-decoration: line-through;'>$old1_format  руб.</span></div>
";
}

else{$old_price=""; $old_price2="";}



$cena_rozn = number_format($myrow_korzina[cena_za_ed],0,'',' ');
$cena_old_prise = number_format($myrow_korzina[old_price],0,'',' ');

$summa_tovara=($myrow_korzina[cena_za_ed]*$myrow_korzina[colichestvo]);	
$summa_tovara_format=number_format($summa_tovara,0,'.',' ');

if ($skidka_on==1){
$cena_sum1=$summa_tovara;
$raznica=$raznica+$raznica_skidka;

$raznica_skidka=0;
}

echo"
<div>
<strong style='font-size:15px; color:#228b22'>$summa_tovara_format руб. </strong>
$old_price
$old_price2
<div id='liniya_st'></div>
</div>
<div style='height:14px;'></div>
";
}
echo"
<div style='position:relative; width:100%;'>
<div style='float: left; padding-right:3px;'>Количество</div>
<div style='padding-left:3px; float: left; margin-top:-12px; padding-right:3px;'>
<label class='field'>
<input name='formDoorz[]' type='hidden' value='$myrow_korzina[id]'>
<input name='kolvo$myrow_korzina[id]' type='text' value='$myrow_korzina[colichestvo]' maxlength='2' id='kolvo' style='width:18px;' />
</label>
</div>";

if ($myrow_korzina[old_price]==0){
echo"
<div style='float: left; padding-right:3px; font-size:13px; color:#787878; margin-top:1px;'>$cena_rozn&nbsp;р/шт. </div>	
";
}else{ 
echo"
<div style='float: left; padding-right:3px; font-size:12px; color:#787878; margin-top:-7px;'>$cena_rozn&nbsp;р/шт. 
<div style='height:1px;'></div>
<span style='text-decoration: line-through;'>$cena_old_prise &nbsp;р/шт.</span></div>";
}

echo"
</div>
";

echo"
<div id='blok_stat_otstup'></div>
</div>
</div>

<div style='width:100%; height:1px; clear:both;'></div>
<div style='height:5px;'></div>

";		
$summa_tovarov= $summa_tovarov + $summa_tovara;
	
}
while ($myrow_korzina=mysql_fetch_array ($result_korzina));

//////////////////////////////////////////////////////////////////////////////////
if ($skidka_on==1){

$summa_tovarov_bez_skidki=$summa_tovarov+$raznica;

$raznica_skidka_format=number_format($raznica,0,'.',' ');
$summa_tovarov_format=number_format($summa_tovarov,0,'.',' ');
$summa_tovarov_bez_skidki_format=number_format($summa_tovarov_bez_skidki,0,'.',' ');
$summa_tovarov_format_dostavka_format=number_format($summa_tovarov+$dostavka_po,0,'.',' ');
$summa_oplati=$summa_tovarov+$dostavka_po;

$summa_tovarov_full="
Товаров на $summa_tovarov_format р.
<span style='font-size:13px; color:#787878;'>&nbsp;<span style='text-decoration: line-through;'>$summa_tovarov_bez_skidki_format р.</span></span>
<div style='height:5px;'></div>
Доставка $dostavka_po р.
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:15px;'></div>
<strong> Общая стоимость <span style='color:#228b22'>$summa_tovarov_format_dostavka_format р.</span></strong>
";
///////////////////////////////////////////////////////////////////////////////////////
}else{
	
$summa_tovarov_format=number_format($summa_tovarov,0,'.',' ');
$summa_tovarov_dostavka=number_format($summa_tovarov+$dostavka_po,0,'.',' ');	
$summa_oplati=$summa_tovarov+$dostavka_po;
	
$summa_tovarov_full="
Товаров на $summa_tovarov_format р.
<div style='height:5px;'></div>
Доставка $dostavka_po р.
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:15px;'></div>
<strong> Общая стоимость <span style='color:#228b22'> $summa_tovarov_dostavka р.</span></strong>
";
///////////////////////////////////////////////////////////////////////////////
}	


echo"
<div style='height:25px;'></div>
<div align='center' id='blok_stat_korzina'>$summa_tovarov_full</div>
<div style='clear: both;'></div>
<div style='height:10px;'></div>
";
	
echo"	
<div align='center'>
<div style='height:18px;'></div>
<button class='orange-button2' name='zakaz_pereschet' type='submit'>Пересчитать заказ</button>
<div style='height:20px;'></div>
<button class='orange-button2' name='zakaz_na_oplaty' type='submit'>Оформить >></button>
</div>";	
	
echo"
</form>";
	
}else{
echo"	
<div style='height:10px;'></div>
<div align='center'><strong>В вашей корзине товары пока отсутствуют!</strong></div>
<div style='height:10px;'></div>";
}
}
?>

<?
if ($_SESSION[korzina_wag]=='1'){
	
$summa_tovarov_format=number_format($_SESSION[summa_oplati],0,'.',' ');
	
	
echo"
<div style='height:25px;'></div>
<div align='center' id='blok_stat_korzina'>
<strong> Общая стоимость <span style='color:#228b22'>$summa_tovarov_format руб.</span></strong></div>
<div style='clear: both;'></div>
<div style='height:10px;'></div>
";

echo"	
<div style='height:10px;'></div>
<div id='forma_standart'>
<form enctype='multipart/form-data' method='POST' action='' class='decorated-form'>";

///////////////////////////////////////////////
/////////////////////////////////////////////
echo"

<div>
<label class='field'>
<span>ФИО<em>*</em></span>
<input name='fio' type='text' id='fio' value='$fio' maxlength='150' />
<span class='hint'>Пример: Скворцов Игорь Петрович</span>";

if ($zakaz_na_oplaty2==1) {

if (!$fio) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_fio=strlen($fio);

if ($str_fio <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_fio >85){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 85 знаков!</strong></div>";}

if ($myrow_post_povtor2){echo"<div><strong style='color:#EB1F14'>Ошибка! Такое название уже существует!</strong></div>";}
}
}
///////////		
}

echo"
</label>
</div>
";
//////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
/////////////////////////////////
echo"
<label class='field'>
<span>Номер телефона<em>*</em></span>
<input name='telefon' type='text' id='telephone' "; if ($_SESSION['id_klient']){echo"value='$_SESSION[login_klient]'";}else{ echo"value='$v_phone0'";} echo" maxlength='20' "; if ($_SESSION['id_klient']){echo"disabled";} echo"/>
<span class='hint'>Пример: +7 (987) 23-56-478</span>
";

if ($zakaz_na_oplaty2==1) {

if (!$telefon) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_telefon=strlen($telefon);

if ($str_telefon <6){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 6 знаков!</strong></div>";} else {

if ($str_telefon >20){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 20 знаков!</strong></div>";} 	

}
}
}	

echo"</label>
";

/////////////////////////////////

/////////////////////////////////
echo"
<label class='field'>
<span>Электронная почта (email)</span>
<input name='mail' type='text' id='mail' value='$mail' maxlength='50' />
<span class='hint'>Пример: ivanov@mail.ru</span>
";

if ($zakaz_na_oplaty2==1) {

if (!$mail) {}else {
	
$str_mail=strlen($mail);

if ($str_mail <6){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 6 знаков!</strong></div>";} else {

if ($str_mail >50){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 50 знаков!</strong></div>";} 	

}
}
}	

echo"</label>
";

/////////////////////////////////
/////////////////////////////////
echo"
<label class='field'>
<span>Адрес <em>*</em></span>
<input name='adres' type='text' id='adres' value='$adres' maxlength='100' />
<span class='hint'>Пример: г. Новороссийск, ул. Анапское шоссе, д. 37, кв 8</span>
";

if ($zakaz_na_oplaty2==1) {

if (!$adres) {echo"<div><strong style='color:#EB1F14'>Заполните поле!</strong></div>";}else {
	
$str_adres=strlen($adres);

if ($str_adres <6){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 6 знаков!</strong></div>";}else { 

if ($str_adres >80){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 80 знаков!</strong></div>";}
}
}
///////////		
}
echo"</label>
";
///////////////////////////////////////////////////

echo"
<label class='field'>
<span>Дополнительный комментарий</span>
<textarea name='koment' rows='4'>$koment</textarea>
</label>
";

///////////////////////////////////////////////////


echo"
<div align='center'>
<div style='height:18px;'></div>
<button class='orange-button2' name='zakaz_na_oplaty2' type='submit'>Продолжить >></button>
<div style='height:20px;'></div>
<button class='orange-button2' name='zakaz_na_oplaty1' type='submit'><< На шаг назад</button>
</div>
</form>
</div> 
<div style='height:15px;'></div> 
";

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
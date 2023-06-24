<?
session_start();
include ("blocks/bd.php") ;
					

echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";

?>

<style>
  


</style>


<?

echo"
<title>Поиск</title>
<meta name='Robots' content='NOINDEX' />
";


echo"
$myr_html[styl_skript_icon]	
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
<div align='center'><h1>Поиск по сайту</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>

<?
echo"
<div style='height:3px;'></div>";



include ("blocks/poisk_tovara.php");	


if ($dobavit==1){


////////////////////////////////////////////////////////////
if ($nazvanie){
	
$result_all_stat = mysql_query ("SELECT * FROM tovari WHERE nazvanie  like '%".$nazvanie."%' ORDER BY id DESC");	
$myrow_all_stat=mysql_fetch_array ($result_all_stat);	

if ($myrow_all_stat){

include ("blocks/spisok_tovara.php");

}else{echo"
<div style='height:15px;'></div>
<div align='center'><strong>С таким названием товара найти не удалось!</strong></div>
<div style='height:15px;'></div>
";}

}
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
if ($artikul){

	
$result_all_stat = mysql_query ("SELECT * FROM tovari WHERE id='$artikul' ORDER BY id DESC");	
$myrow_all_stat=mysql_fetch_array ($result_all_stat);	

if ($myrow_all_stat){


include ("blocks/spisok_tovara.php");

}else{echo"
<div style='height:15px;'></div>
<div align='center'><strong>С таким артикулом товара найти не удалось!</strong></div>
<div style='height:15px;'></div>
";}

}
/////////////////////////////////////////////////////////

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
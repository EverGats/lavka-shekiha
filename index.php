<?php
session_start();
include ("blocks/bd.php");
require "blocks/password.php";

//////////////////////////////////////////////////////////////////////
echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";
?>
<title>Шейх Парфюм. Интернет-магазин нишевой европейской и арабской парфюмерии</title>
<meta name="keywords" content="Шейх Парфюм"/>
<meta name="description" content="Шейх Парфюм/"/>

<style>



    /*//////////////////////////////////////////*/


</style>


<?
echo"$myr_html[styl_skript_icon]";


echo"
</head>
<body  id='top'>";

include ("blocks/header.php");
//include ("blocks/navigation.php");

echo"
<div id='container_site'>    
<div id='sidebar'>";
include ("blocks/left_meny.php");
echo"
</div> 
<div id='content'>";


echo"
<div align='center'><h1>Шейх Парфюм. Интернет-магазин нишевой европейской и арабской парфюмерии</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>";


echo"
<div style='height:3px;'></div>";




$result_all_stat = $db->query("SELECT * FROM  tovari ORDER BY id DESC LIMIT 16");
$myrow_all_stat = $result_all_stat->fetch_array();

include ("blocks/spisok_tovara.php");

?>

<?


echo"
</div>
</div>
<div style='height:5px;'></div>

<div style='clear: both;'></div>
";




include ("blocks/footer.php");


echo"
</body>
</html>";
?>

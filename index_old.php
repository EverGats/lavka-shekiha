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
echo"
$myr_html[styl_skript_icon]    

<link rel='stylesheet' href='slider/flexslider.css' type='text/css' media='screen' />";
?>
<script defer src="slider/jquery.flexslider-min.js"></script>

<!-- Запуск слайдера FlexSlider -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.flexslider').flexslider({
            slideshow: true,
            pauseOnAction: true,
            pauseOnHover: true,
            slideshowSpeed: 4000

        });

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
<div align='center'><h1>Шейх Парфюм. Интернет-магазин нишевой европейской и арабской парфюмерии</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>";

//////////////////////////////////////////////////////////////////////////////
//<div id='container' style='width: 96%; max-width: 400px; margin: 0 auto;'>

echo"

<div id='container' style='width: 92%; max-width: 420px; margin: 0 auto;'>
<div class='flexslider' style='display: flex;'>
<ul class='slides'>";


$res_slide = $db->query("SELECT * FROM tovari ORDER BY RAND() LIMIT 7");
$myr_slide = $res_slide->fetch_array();

do{


    echo"
<li style='margin: auto 0;'>
<a href='../$myr_slide[seo_url]'>
<img src='../foto/full/$myr_slide[image].jpg' />
<p class='flex-caption'>$myr_slide[nazvanie]</p>
</a>
</li>
";

}

while ($myr_slide = $res_slide->fetch_array());

echo"           
</ul>
</div>
</div>

<div style='height:15px;'></div>";
//////////////////////////////////////////////////////////////////////////




echo"
<div style='height:8px;'></div>
<div id='liniya_st'></div>
<div align='center'><h2><a href='#'>Новые поступления</a></h2></div>
";
?>


<?
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

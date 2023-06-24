<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";


//////////////////////////////////////////////////////////////////////
echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";
?>
<title>Шейх Парфюм. Интернет-магазин арабской косметики и парфюмерии</title>
<meta name="keywords" content="Шейх Парфюм"/>
<meta name="description" content="Шейх Парфюм/"/>

<style>

    .grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(3, 1fr);
	  row-gap: 5px;
      column-gap: 5px;
	  grid-auto-flow: dense;
	  margin: 1px;
    }

  </style>


<?
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
<a href='/' id='ssilka_mob'>Главная</a>&nbsp;<em>&rarr;</em>&nbsp;";

echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>Шейх Парфюм. Интернет-магазин арабской косметики и парфюмерии</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
<div align='center'><h2><a href='#'>Новинки</a></h2></div>
";
?>



<?
echo"
<div style='height:3px;'></div>";


$result_all_stat = mysql_query ("SELECT * FROM  tovari ORDER BY id DESC LIMIT 16");
$myrow_all_stat=mysql_fetch_array ($result_all_stat);


echo"
<!--noindex-->  
<div style='height:5px;'></div>
<div class='grid' style='margin:0 auto; width:98%;'>";
do {



$prsm="";

$last=$myrow_all_stat[view]%10;

if ($last==0){$prsm="просмотров";}
if ($last==1){$prsm="просмотр";}
if ($last>1 and $last<5){$prsm="просмотра";}
if ($last>4 and $last<10){$prsm="просмотров";}
$prosmotrov = number_format($myrow_all_stat[view],0,'',' ');

///////////////////////////////////////////

$result_kom = mysql_query ("SELECT id FROM post_komment WHERE post='$myrow_all_stat[id]' and moder='1'");
$myrow_kom= mysql_num_rows($result_kom);

$komment="";
$last_komment=$myrow_kom%10;

if ($last_komment==0){$komm="отзывов";}
if ($last_komment==1){$komm="отзыв";}
if ($last_komment>1 and $last_komment<5){$komm="отзыва";}
if ($last_komment>4 and $last_komment<10){$komm="отзывов";}




/////////////////////////////////////////////
if ($myrow_all_stat[prise]){

if ($myrow_all_stat[old_price]!=0){

$old1=$myrow_all_stat[old_price]/$myrow_all_stat[prise];
$old2=floor(100-(100/$old1));

$old_price="
<span style='font-size:17px; padding-left:4px; color:#E10001;'>&ndash; $old2%</span>
";

$old_price2="
<div style='font-size:13px; color:#787878;'>Старая цена: <span style='text-decoration: line-through;'>$myrow_all_stat[old_price] руб.</span></div>
";
}

else{$old_price=""; $old_price2="";}



$cena_rozn = number_format($myrow_all_stat[prise],0,'',' ');
$cena_rozn_vivod="
<div style='border: solid #D6D6D6; border-width: 1px; padding:2px;'>
<div>
<strong style='font-size:16px; color:#228b22'>Цена: $cena_rozn руб.</strong>
$old_price
$old_price2
</div>
</div>
<div style='height:3px;'></div>
";
}else{$cena_rozn_vivod="";}
///////////////////////////////////////////////////////////

echo"
<div style='height:20px;'></div>
<div>
<div id='blok_stat_img'>
<a href='../$myrow_all_stat[seo_url]'>
<img src='../foto/mini/$myrow_all_stat[image].jpg' alt='$myrow_all_stat[title]' title='$myrow_all_stat[title]'>
</a>
</div>

<div style='margin-left:15px;'>
<div><a class='blok_stat_zag' href='../$myrow_all_stat[seo_url]'>$myrow_all_stat[nazvanie]</a></div>
<div style='height:15px;'></div>
<div id='views'><img src='../img/views.png' width='12' height='8' align='baseline' /> $prosmotrov $prsm&nbsp; 
<img src='../img/comment.png' width='12' height='11' align='baseline' /> $myrow_kom $komm
</div> 
<div style='height:10px;'></div>";

echo"
$cena_rozn_vivod";


$result_us_tema_7 = mysql_query("SELECT * FROM post_blocks WHERE id_statiya='$myrow_all_stat[id]' ORDER by id DESC LIMIT 1");
$myrow_us_tema_7 = mysql_fetch_array($result_us_tema_7);


echo"
<div id='blok_stat_otstup'></div>
<div><a href='../$myrow_all_stat[seo_url]' class='blok_stat_knopka'>Подробнее >>></a></div>
</div>
</div>

<div style='width:100%; height:1px; clear:both;'></div>
<div style='height:20px;'></div>

";



}
while ($myrow_all_stat=mysql_fetch_array ($result_all_stat));
echo"</div>
<!--/noindex--> 
";


echo"
<div style='width:100%; height:20px; clear:both;'></div>
";

echo"
</div>
";
?>






<?


echo"
</div>
</div>
<div style='height:15px;'></div>
";


include ("blocks/footer.php");


echo"
</body>
</html>";
?>
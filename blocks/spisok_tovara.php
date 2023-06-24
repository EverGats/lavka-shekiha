


<style>

a.blok_stat_knopka {
  font-size: 80%;
  font-weight: 700;
  color: #5f1b13;
  text-decoration: none;
  text-shadow: 0 -1px 2px rgba(0,0,0,.2);
  padding: .3em 0.8em;
  border-radius: 3px;
  border: 1px solid #5f1b13;
  background: #dfcc7e;
  box-shadow: inset 0px 0px 1px white, 0px 1px 2px #0c558a;
  transition: .2s ease-in-out;
  width: 79%;
  display: inline-block ;
  /*display: block;*/


}

a.blok_stat_knopka:hover:not(:active) {
  background: #caac52;
}

a.blok_stat_knopka:active {
background: #caac52;
}


#blok_stat_img img {
height:160px;
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

#filters_tovar a{
text-decoration: none;
}

</style>
<?
if ($_SESSION['id_admin'] and $_SESSION['login_admin']){

function random($count){
$pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
return substr($pass,3,$count);
}

}


echo"<div id='filters_tovar'>
<div style='height:3px;'></div>";

$currentParams = $_GET;

if (isset($currentParams['filters']) && $currentParams['filters'] == 1) {
    $currentParams['filters'] = 2;
    $queryString = http_build_query($currentParams);
    echo "<div><a href='?{$queryString}'><img src='../img/filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;'/>Скрыть фильтры</a></div>";
} else {
    $currentParams['filters'] = 1;
    $queryString = http_build_query($currentParams);
    echo "<div><a href='?{$queryString}'><img src='../img/filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;'/>Показать фильтры</a></div>";
}

echo"<div style='float:right; margin-top:-22px;'>";

if ($_GET['poisk']==1){ echo"<a href='../katalog/?poisk=2'><img src='../img/poisk_filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;' />&nbsp;Скрыть поиск</a>";}
if ($_GET['poisk']==2 || !$_GET['poisk']){ echo"<a href='../katalog/?poisk=1'><img src='../img/poisk_filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;' />&nbsp;Октрыть поиск</a>";}

echo"
</div>
<div style='height:3px;'></div>
</div>";


///////////////////////////////////////////////////////
if ($_GET['poisk']==1){

include ("blocks/poisk_tovara.php");
}
////////////////////////////////////////////////////

if ($_GET['filters']==1){
echo"<div style='height:7px;'></div>";

include ("blocks/filters_tovar.php");
}

/////////////////////////////////////////////
if ($_GET['filters']==1){
echo"
<a name='tovar_gal'></a>
<div style='height:15px;'></div>
";}

$iterator = 0;


if ($myrow_all_stat['id']){


    echo"
<a name='tovar_gal'></a>

<!--noindex-->  
<div style='height:5px;'></div>
<div class='grid'>";

do {
    $volumes = explode('--', trim($myrow_all_stat['po_ml'], '-'));
    $isInVolumeRange = array_reduce($volumes, function($carry, $volume) use ($minVolume, $maxVolume) {
        return $carry ||
            (!$minVolume || $volume >= $minVolume) &&
            (!$maxVolume || $volume <= $maxVolume);
    }, false);

    if (!$isInVolumeRange) {
        continue;
    }



    if($myrow_all_stat['status']==0){
        $iterator++;
if ($_SESSION['id_admin'] and $_SESSION['login_admin']){
$sluch3=random(30);
$sluch4=random(30);
$sluch5=random(30);
}

$prsm="";

$last=$myrow_all_stat['view']%10;

if ($last==0){$prsm="просмотров";}
if ($last==1){$prsm="просмотр";}
if ($last>1 and $last<5){$prsm="просмотра";}
if ($last>4 and $last<10){$prsm="просмотров";}

$prosmotrov = number_format($myrow_all_stat['view'],0,'',' ');

///////////////////////////////////////////

        $result_kom = $db->query("SELECT id FROM post_komment WHERE post='$myrow_all_stat[id]' and moder='1'");
        $myrow_kom = $result_kom->num_rows;


$komment="";
$last_komment=$myrow_kom%10;

if ($last_komment==0){$komm="отзывов";}
if ($last_komment==1){$komm="отзыв";}
if ($last_komment>1 and $last_komment<5){$komm="отзыва";}
if ($last_komment>4 and $last_komment<10){$komm="отзывов";}






echo"
<div id='blok_stat' align='center'>

<div id='blok_stat_img'>
<a href='../$myrow_all_stat[seo_url]'>
<img src='../foto/mini/$myrow_all_stat[image].jpg' alt='$myrow_all_stat[nazvanie]' title='$myrow_all_stat[nazvanie]'>
</a>
</div>
<div style='height:5px;'></div>

<div><a class='blok_stat_zag' href='../$myrow_all_stat[seo_url]'>$myrow_all_stat[nazvanie]</a></div>

<div style='height:5px;'></div>";



//////////////////////////////////////////////////////////
$result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_all_stat[id]' ORDER by name DESC");
$myrow_po_ml= $result_po_ml->num_rows;




if ($myrow_po_ml){

do {

$prise_format = number_format($myrow_po_ml['prise'],0,'',' ');

echo"<div style='padding:1px;'><strong>$myrow_po_ml[name] мл.</strong> - $prise_format р.</div>
<div style='height:2px;'></div>
";


}
while ($myrow_po_ml = $result_po_ml->fetch_array());

echo"
<div id='liniya_st'></div>
<div style='height:2px;'></div>
";
}

/////////////////////////////////////////////////////////


echo"
<div align='center'>
<div id='views'><img src='../img/views.png' width='12' height='8' align='baseline' /> $prosmotrov $prsm&nbsp; 
<div style='height:1px;'></div>
<img src='../img/comment.png' width='12' height='11' align='baseline' /> $myrow_kom $komm </div>
<div style='height:10px;'></div>
</div>
";


if ($_SESSION['id_klient']){$id_klient=$_SESSION['id_klient'];}else{$id_klient="0";}




echo"
<div style='height:55px;'></div>
<div style='position:absolute; bottom:15px; width:100%;'>";

if ($myrow_all_stat['status']==0){
echo"
<a href='../$myrow_all_stat[seo_url]' class='blok_stat_knopka'>В корзину +</a>";}
else{echo"<span style='font-size:14px; color:#ff0000'>нет в наличии!</span> ";}

echo"  
<div style='height:7px;'></div>
<a href='../$myrow_all_stat[seo_url]' class='blok_stat_knopka'>Подробнее >></a></div>
";

//echo"<div style='position:absolute; bottom:0px; background-color:#0099FF; width:100%;'>txt</div>";


//////////////////////////////////////////////////////////////////////////////////
/////////////////////
if ($_SESSION['id_admin']==1 and $_SESSION['login_admin']){
echo"
<div style='height:17px;'></div>
<div align='center' style='position:relative; bottom:62px; width:94%;'>


<div id='knopka_katalog' style='padding:1px'><a href='javascript: $sluch5();'>редактировать <img style='float:right;' src='../img/edit_mik.png' width='17' height='17' border='0' align='absmiddle'></a></div>

<script type='text/javascript'> 
function $sluch5(){

if (confirm('Предупреждение!!!\\r\\nВы уверены, что хотите отредактировать этот товар -  $myrow_all_stat[nazvanie]!?')) {
	
window.open('../admin/?edit=$myrow_all_stat[id]','_blank'); }
	
else {}
}
</script>";




echo"<div style='height:1px;'></div>";
echo"<div id='knopka_katalog' style='padding:1px'><a href='javascript: $sluch3();'>удалить <img style='float:right;' src='/img/1no.png' width='20' height='15' border='0' align='absmiddle'></a></div>

<script type='text/javascript'> 
function $sluch3(){

if (confirm('Предупреждение!!!\\r\\nВы уверены, что хотите удалить товар -  $myrow_all_stat[nazvanie]!?\\r\\n\\r\\nИмейте ввиду, что так же будет удалена вся связанная с товаром информация!')) {
window.open('../admin/?del=$myrow_all_stat[id]','_blank'); }

else {}
}
</script>
</div>
";
}
/////////////////////////////////////////////////////
//////////////////////////////////////////////////



echo"
</div>
";


    }}
while ($myrow_all_stat=$result_all_stat->fetch_array());

echo"</div>
<!--/noindex--> 
";
    if ($iterator == 0){
        echo"
<div style='height:10px;'></div>
<div align='center'><strong>В данной категории товары с таким фильтром отсутствуют!</strong></div>
<div style='height:10px;'></div>
";

    }
}else{
echo"
<div style='height:10px;'></div>
<div align='center'><strong>В данной категории товары отсутствуют!</strong></div>
<div style='height:10px;'></div>
";
}

?>
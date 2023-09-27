<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";

////////////////////////////////////////////////////////////

if (isset($_GET['id'])) {$id =$_GET['id'];
            if (!preg_match("|^[\d]+$|", $id))    {
       			exit("Попытка взлома!");
            }


$result_tovar_cat = $db->query ("SELECT * FROM post_cat1 WHERE id='$id' ");
$myrow_tovar_cat =  $result_tovar_cat->fetch_array();
}
//////////////////////////////////////////////////////////////////////
if (isset($_GET['pol'])) {$pol =$_GET['pol'];
            if (!preg_match("|^[\d]+$|", $pol))    {
       			exit("Попытка взлома!");
            }}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////
if (isset($_GET['ml'])) {$ml =$_GET['ml'];
            if (!preg_match("|^[\d]+$|", $ml))    {
       			exit("Попытка взлома!");
            }}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

if (isset($_POST['nazvanie'])) {$nazvanie =$_POST['nazvanie']; }
            else
            { $nazvanie = '' ;}

if (isset($_POST['artikul'])) {$artikul =$_POST['artikul']; }
            else
            { $artikul = '' ;}

if (isset($_GET['poisk'])) {$poisk =$_GET['poisk']; }
            else
            { $poisk = '' ;}

$minVolume = isset($_GET['min_volume']) ? (int)$_GET['min_volume'] : null;
$maxVolume = isset($_GET['max_volume']) ? (int)$_GET['max_volume'] : null;

////////////////////////////////////////////////////////////////////

if ($id){$title="$myrow_tovar_cat[name]";}
if ($pol==1){$title="Парфюмерия для мужчин";}
if ($pol==2){$title="Парфюмерия для женщин";}
if ($pol==3){$title="Парфюмерия для мужчин и женщин";}
if ($ml){$title="Нишевая европейская и арабская парфюмерии объемом $ml мл. ";}


if (!$id and !$pol and !$ml){$title="Каталог нишевой европейской и арабской парфюмерии ";}




echo"
<head>";


echo"
<meta name='keywords' content='$myrow_tovar_cat[keywords]'/>
<meta name='description' content='$myrow_tovar_cat[description]/'/>
";


echo"
$myr_html[styl_skript_icon]	
</head>
<body  id='top'>";

include ("blocks/header.php");

echo"
<div id='container_site'>
";
    $isDesktop = !preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $_SERVER['HTTP_USER_AGENT']);

if ($isDesktop) {
    echo "
    <div id='sidebar'>";
    include("blocks/left_meny.php");
    echo"
    </div>";
}
echo "<div id='content'>";




echo"
<div align='center'><h1>";


echo"</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>

<?
echo "<div style='height:3px;'></div>";

$pol_view="";
$pol_v="";

if ($id || $pol || $poisk==1){$where_view="WHERE";}else{$where_view="";}

if ($poisk!=1){
    if ($pol==1){$pol_v="mugskaya='1'";}
    if ($pol==2){$pol_v="genskaya='1'";}
    if ($pol==3){$pol_v="mugskaya='1' and genskaya='1'"; }

    if ($id){$parametr="cat='$id' $pol_view";}
    if (!$id and $pol){$parametr="$pol_v";}
}
/////////////////////////////////////////////////////////
if ($poisk==1 and !$pol and !$id){
    if ($nazvanie){$parametr="nazvanie  like '%".$nazvanie."%'";}
    if ($artikul){$parametr="id='$artikul'";}
}
if(!empty($where_view) && !empty($parametr)){
$result_all_stat = $db->query("SELECT * FROM tovari $where_view $parametr ORDER BY id DESC LIMIT 16");
$myrow_all_stat = $result_all_stat->fetch_array();
}else{
    $result_all_stat = $db->query("SELECT * FROM tovari ORDER BY id DESC LIMIT 16");
    $myrow_all_stat = $result_all_stat->fetch_array();
}
include ("blocks/spisok_tovara.php");

///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
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
</html>
";
?>

<style>
    @media screen and (max-width: 1024px) {
        #content {
            width: 100% !important;
        }
    }

</style>

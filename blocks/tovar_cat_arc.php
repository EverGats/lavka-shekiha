<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";

////////////////////////////////////////////////////////////

if (isset($_GET['id'])) {$id =$_GET['id'];
            if (!preg_match("|^[\d]+$|", $id))    {
       			exit("Попытка взлома!");
            }


$result_tovar_cat = mysql_query ("SELECT * FROM post_cat1 WHERE id='$id' ");
$myrow_tovar_cat =  mysql_fetch_array($result_tovar_cat);
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

// Новый код
if (isset($_GET['min_volume'])) {
    $min_volume = $_GET['min_volume'];
    if (!preg_match("|^[\d]+$|", $min_volume)) {
        exit("Попытка взлома!");
    }
} else {
    $min_volume = 0; // default value
}

if (isset($_GET['max_volume'])) {
    $max_volume = $_GET['max_volume'];
    if (!preg_match("|^[\d]+$|", $max_volume)) {
        exit("Попытка взлома!");
    }
} else {
    $max_volume = PHP_INT_MAX; // default value
}
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

////////////////////////////////////////////////////////////////////

if ($id){$title="$myrow_tovar_cat[name]";}
if ($pol==1){$title="Парфюмерия для мужчин";}
if ($pol==2){$title="Парфюмерия для женщин";}
if ($ml){$title="Нишевая европейская и арабская парфюмерии объемом $ml мл. ";}


if (!$id and !$pol and !$ml){$title="Каталог нишевой европейской и арабской парфюмерии ";}




echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";


echo"
<title>$title</title>
<meta name='keywords' content='$myrow_tovar_cat[keywords]'/>
<meta name='description' content='$myrow_tovar_cat[description]/'/>
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
<div id='ssilka_mob'><a href='/'>Главная</a>&nbsp;<em>&rarr;</em>&nbsp;";

echo "$title";

echo"
<em>&rarr;</em>&nbsp;</div>";

echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>";

echo "$title";

echo"</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>

<?
echo"
<div style='height:3px;'></div>";

$pol_view="";
if ($ml){$ml_view=" and po_ml like '%-".$ml."-%'";}else{$ml_view="";}

if ($pol=='1'){$pol_view=" and mugskaya='1'";}
if ($pol=='2'){$pol_view=" and genskaya='1'";}

if ($id || $pol || $ml || $poisk==1){$where_view="WHERE";}else{$where_view="";}
//////////////////////////////////////////////////////////////////////////
if ($poisk!=1){

if ($pol==1){$pol_v="mugskaya='1'";}
if ($pol==2){$pol_v="genskaya='1'";}

if ($id){$parametr="cat='$id' $pol_view $ml_view";}
if (!$id and $pol){$parametr="$pol_v";}
if (!$id and !$pol and $ml){$parametr="po_ml like '%-".$ml."-%'";}

if (!$id and $pol and $ml){}
}
/////////////////////////////////////////////////////////
if ($poisk==1 and !$pol and !$id and !$ml){
if ($nazvanie){$parametr="nazvanie  like '%".$nazvanie."%'";}
if ($artikul){$parametr="id='$artikul'";}
}


$result_all_stat = mysql_query("SELECT * FROM tovari $where_view $parametr ORDER BY id DESC LIMIT 16");
$myrow_all_stat=mysql_fetch_array ($result_all_stat);



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
</html>";
?>
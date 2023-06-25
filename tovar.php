<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";

if (isset($_GET['id'])) {$id =$_GET['id']; } 
            else
            { exit("�� ����� ��    �������� ��� ���������!");}
            if (!preg_match("|^[\d]+$|", $id))    {
       			exit("������� ������");
            }	

$result_tovar = $db->query("SELECT * FROM tovari WHERE id='$id' ");
$myrow_tovar =  $result_tovar->fetch_array();

if (!$myrow_tovar){
header("HTTP/1.0 404 Not Found");
include ("blocks/error404.php");
exit;}

$new_view = $myrow_tovar['view'] + 1;
$update = $db->query("UPDATE tovari SET view = '$new_view' WHERE id='$id'");

echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";

?>

<script type="text/javascript">
function to_cart(id, id_klient, talon) {
$.post('../blocks/in_cart.php',{id:id, id_klient:id_klient,talon:talon},function(data){ //�������� ������ � ������ � ������������ � ����������
$('#basket_quantity').html(data); //��� �������� ���-�� ������� � ������� �� ������� ��������
alert("����� �������� � �������!"); //������� ��������� � ���, ��� ����� �������� � �������
});
}
</script>


<style>
  


#content_tovar {
	 padding-top:2px;
	 padding-bottom:15px;
     background: #FFFFFF;
	 float: right;
     width: 70%;
	 text-align: left;
	 box-sizing: border-box;
	 padding-left:7px;
	 padding-right:13px;
	 border: solid #d3ba6a;
     border-width: 0px 1px 0px;
}

#left_tovar {
	 background: #FFFFFF;
     float: left;
     width: 29%;
     height: 100%;
}

#left_tovar img {
width: 96%;
padding:2px;
background:#fff;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
border:0;	
}



a.blok_stat_knopka_tovar {
  font-size: 90%;
  font-weight: 800;
  color: #241515;
  text-decoration: none;
  padding: .5em 1.5em;
  border-radius: 3px;
  border: 1px solid #241515;
  background: #dfcc7e;
  box-shadow: inset 0px 0px 1px white, 0px 1px 2px #0c558a;
  transition: .2s ease-in-out;
  width: 100%;
}

a.blok_stat_knopka_tovar:hover:not(:active) {
  background: #caac52;
}

#image_gallery_mob {display:none;}


/* ��� ������ 800 �������� � ������ */
@media screen and (max-width: 800px) {
#left_tovar{display:none; width: 1%;}
#content_tovar {width: 100%;}
#image_gallery_mob {
width: 98%; 
display: block;
padding:2px;
background:#fff;
-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
border:0;
}	
}



</style>


<?

echo"
<title>$myrow_tovar[nazvanie]</title>
<meta name='keywords' content='$myrow_tovar[keywords]'/>
<meta name='description' content='$myrow_tovar[description]/'/>
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

$result_tovar_cat = $db->query("SELECT * FROM post_cat1 WHERE id='$myrow_tovar[cat]' ");
$myrow_tovar_cat =  $result_tovar_cat->fetch_array();

echo"
<div style='height:6px;'></div>
<div id='ssilka_mob'><a href='/'>�������</a>&nbsp;<em>&rarr;</em>&nbsp;";

echo "<a href='../$myrow_tovar_cat[seo_url]'>$myrow_tovar_cat[name]</a>";

echo"
<em>&rarr;</em>&nbsp;</div>";

echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>$myrow_tovar[nazvanie]</h1></div>

<div id='liniya_st'></div>
<div style='height:3px;'></div>
";
?>

<?
echo"
<div style='height:3px;'></div>";
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////
///////////////////////////////////////////////////////////



/////////////////////////////////////////////////////
echo"<div id='content_tovar'>";

echo"
<div style='height:3px'></div>
<div><strong>������� �� �����:</strong> $myrow_tovar[id]</div>

<div style='height:4px'></div>

<div><strong>�����:</strong> <a href='../$myrow_tovar_cat[seo_url]'>$myrow_tovar_cat[name]</a> </div>";


echo"
<div style='height:10px'></div>";
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

if ($myrow_tovar['prise']){


$cena_rozn = number_format($myrow_tovar['prise'],0,'',' ');


echo"
<div style='border: solid #d3ba6a; border-width: 1px; padding:8px;'>
<div><strong style='font-size:16px; color:#228b22'><div id='mydiv'>����: $cena_rozn ���.</div></strong>";


echo"
</div>
<div style='height:14px;'></div>
";

if ($myrow_tovar[status]==0){

if ($_SESSION['id_klient']){$id_klient=$_SESSION['id_klient'];}else{$id_klient="0";}

	
echo"
<div style='position:relative; width:100%;'>
<span id='parametr_on'><a href='javascript:void(0);' onclick='to_cart($myrow_tovar[id],$id_klient,$_SESSION[talon])' class='blok_stat_knopka_tovar'>�������� � ������� +</a></span>"; 

////////////////////////////////////////
$result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_tovar[id]' ORDER by name ASC");
$myrow_po_ml=$result_po_ml->fetch_array();

echo"
<select name='cena_po_ml' id='myselect'>";

if ($myrow_po_ml){
	
do {		

echo"
<option value='$myrow_po_ml[prise]'>$myrow_po_ml[name] ��.</option>
";
}
while ($myrow_po_ml=mysql_fetch_array ($result_po_ml));		
}
	 
echo"
</select>

</div>";

?>
<script type="text/javascript">
document.getElementById("myselect").addEventListener("change", function(){
/*document.getElementById('mydiv').innerHTML = "����: "+this.value+" ���."; */

var goro=this.value;
str = '' + goro;
result = str.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ");

document.getElementById('mydiv').innerHTML = "����: "+result+" ���.";
	  
/*
alert(result);
*/

document.getElementById('parametr_on').innerHTML = "<a href='javascript:void(0);' onclick='to_cart("+this.value+",<? echo"$id_klient,$_SESSION[talon]";?>)' class='blok_stat_knopka_tovar'>�������� � ������� +</a>";   
});
</script>

<?

}
else{echo"<span style='font-size:14px; color:#ff0000'>������ ��� � �������!</span> ";}

//////////////////////////////////////////////////////////
$result_po_ml = mysql_query ("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_tovar[id]' ORDER by name DESC");	
$myrow_po_ml=mysql_fetch_array ($result_po_ml);	


if ($myrow_po_ml){

echo"
<div style='height:12px;'></div>
";	
	
do {
	
$prise_format = number_format($myrow_po_ml[prise],0,'',' ');

echo"<div style='padding:1px;'><strong>$myrow_po_ml[name] ��.</strong> - $prise_format �.</div>
";
	
		
}
while ($myrow_po_ml=mysql_fetch_array ($result_po_ml));	

echo"
<div style='height:2px;'></div>
";	
}
/////////////////////////////////////////////

/////////////////////////////////////////////////////////

echo"
<div style='height:8px;'></div>
</div>
<div style='height:7px;'></div>
";
}

/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
echo"
<div id='image_gallery_mob' align='center'>
<a class='gallery' rel='group' href='../foto/full/$myrow_tovar[image].jpg'>
<img src='../foto/mini/$myrow_tovar[image].jpg' border='0' style='width:100%'  /></a>
</div>";




echo"
<div id='liniya_st'></div>
$myrow_tovar[opisanie]
</div>";
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////

echo"
<div id='left_tovar'>
<div align='center'>
<a class='gallery' rel='group' href='../foto/full/$myrow_tovar[image].jpg'>
<img src='../foto/mini/$myrow_tovar[image].jpg' border='0' /></a>
</div>
</div>";


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
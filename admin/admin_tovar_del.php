<?

if ($del and $id_user_session==$id_admin_user){
	
	
$result_tovar = mysql_query ("SELECT * FROM tovari WHERE id='$del'");	
$myrow_tovar=mysql_fetch_array ($result_tovar);

if (!$myrow_tovar[id]){
	
echo"������ ������ �� ����������!";	
exit();

}else{
///////////�������� �����1///////////////////

function deletfile($directory,$filename) {
  if (is_file("$directory/$filename")) {
    unlink("$directory/$filename");
    if (!file_exists("$directory/$filename")) { return true; }
  }
}

///////////////////////////////////////////
//echo"../foto/full/$myrow_tovar[image].jpg'";

deletfile('../foto/full/',$myrow_tovar["image"].".jpg"); 
deletfile('../foto/mini/',$myrow_tovar["image"].".jpg"); 

$result4 = mysql_query ("DELETE FROM tovari_po_ml WHERE id_tovar='$myrow_tovar[id]'");		 
$result4 = mysql_query ("DELETE FROM tovari WHERE id='$myrow_tovar[id]'");
$result4 = mysql_query ("DELETE FROM site_pages WHERE id_post='$myrow_tovar[id]' and id_post!='0'");	
	
	
}

	

$okei="";


//////////////////////////////////////////////////////////

$add_infa=1;

	
if ($add_infa) {
	
$okei="

<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/delete_m.png' width='50'  /></td>
    <td><p>����� ������� ������!<br />
    ���������� ��� �� ���������� �� �����!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";	

}

echo"$okei";


}
?>
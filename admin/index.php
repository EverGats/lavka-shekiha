<?
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/blocks/bd.php") ;
require $_SERVER['DOCUMENT_ROOT'] . "/blocks/password.php";

$id_admin_user=1;
$id_user_session=$_SESSION['id_admin'];

$date_format_mysql=date("Y-m-d");


if (isset($_GET['meny'])) {$meny =$_GET['meny']; 

if (preg_match('/[^0-9\-\_\.]+/i',$meny))   {
			exit("ERROR!");
            }} 
			
            else
            { $meny = '' ;}
			
			
			
if (isset($_GET['edit'])) {$edit =$_GET['edit']; 

if (preg_match('/[^0-9\-\_\.]+/i',$edit))   {
			exit("ERROR!");
            }} 
			
            else
            { $edit = '' ;}
			
			
			
if (isset($_GET['del'])) {$del =$_GET['del']; 

if (preg_match('/[^0-9\-\_\.]+/i',$del))   {
			exit("ERROR!");
            }} 
			
            else
            { $del = '' ;}			
						
			
//echo"$id_user_session";	
//////////////////////////////////////////////////////////////////////


include ("autorization_action.php");



//////////////////////////////////////////////////////////////////////
echo"
$myr_html[doctupe]
<head>
$myr_html[kodirovka]";
?>
<title>Панель управления сайтом Шейх Парфюм</title>
<meta name="Robots" content="NOINDEX" />

<?
if ($_SESSION['login_admin'] and $_SESSION['id_admin'] and $dostup !=1 and $z==1){
echo"<meta http-equiv='Refresh' content='2; '>";


echo"
<div style='background-color:#222120; position: absolute; width:100%;'>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td><div style='font-size:17px; background-color:#FFF; padding:5px;'>Обнаружена активная сессия Вашего профиля!<br>
Сейчас Вы будете перенаправлены в личный кабинет!</div>
</td>
<td width='10'>&nbsp;

</td>
<td><div style='background-color: #FFFFFF; padding:4px; font-size:27px;'>
<span id='timer'></span>
</div></td>
</tr>
</table>
</div>
";}
?>

<?
echo"
$myr_html[styl_skript_icon]

<script type='text/javascript' src='../redactor/redactor.min.js'></script>
<link rel='stylesheet' href='../redactor/redactor.css' type='text/css'>
<script src='../redactor/lang/ru.js'></script>
<script src='../redactor/plugins/table/table.js'></script>
<script src='../redactor/plugins/fontcolor/fontcolor.js'></script>
<script src='../redactor/plugins/fullscreen/fullscreen.js'></script>
<script src='../redactor/plugins/video/video.js'></script>
<script src='../redactor/plugins/textdirection/textdirection.js'></script>


<script type='text/javascript'>
	$(document).ready(
		function()
		{
			$('#redactor_content').redactor({ 
lang:'ru',
plugins:['table','fontcolor','fullscreen','video','textdirection'],
buttons:['html','table','formatting','bold','underline','italic','deleted',
'unorderedlist','orderedlist','outdent','indent',
'image','link','alignment','horizontalrule','table','fontcolor','fullscreen','video','textdirection']
			
			});
		}
	);
</script>


<link rel='stylesheet' href='../plupload/css/jquery-ui.css' type='text/css' />
<link rel='stylesheet' href='../plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css' type='text/css' />

<script type='text/javascript' src='../plupload/js/jquery-ui.min.js'></script>

<!-- production -->
<script type='text/javascript' src='../plupload/js/plupload.full.min.js'></script>
<script type='text/javascript' src='../plupload/js/jquery.ui.plupload/jquery.ui.plupload.js'></script>

<!-- activate Russian translation -->
<script type='text/javascript' src='../plupload/js/i18n/ru.js'></script>


	
</head>
<body  id='top'>";

include ($_SERVER['DOCUMENT_ROOT'] . "/blocks/header.php");
//include ("blocks/navigation.php");


echo"
<div id='container_site'>	 
<div id='content'>";


if ($id_user_session==$id_admin_user){
	





if (!$meny and !$edit and !$del){
echo"
<div style='height:6px;'></div>
<div id='liniya_st'></div>
<div align='center'><h1>Панель управления сайтом Шейх Парфюм</h1></div>
";
}

if ($meny || $edit || $del){	
if ($meny==1){
    include("admin_tovar_add.php");}

if ($meny==2){include ("admin_cat_spisok.php");}

if ($meny==3){include ("admin_exit.php");}

if ($edit){include ("admin_tovar_edit.php");}	

if ($del){include ("admin_tovar_del.php");}	


}else{

echo"
<div style='height:10px;'></div>
<div align='center'>
<div><a href='/admin/?meny=2'>Управление брендами сайта</a> | <a href='/admin/?meny=1'>Добавление товара</a> | <a href='/admin/?meny=3'>Выход</a></div>
<div style='height:15px;'></div>
</div>
<div style='height:30px;'></div>
";	

}

}else{

if ($dostup!=1){
echo"
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>

<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td width='60' align='center'><img src='../img/vniman.jpg' width='50' height='50' /></td>
<td>
<div>У Вас нет прав доступа к этому разделу!
<div style='height:3px;'></div>	 
Авторизуйтесь если у вас есть права администратора!</div>
</td>
</tr>
</table>

<div style='height:5px;'></div>
<div id='liniya_st'></div>
<div style='height:45px;'></div>";
}
/////////////////////////////////////////////////////
echo"
$error

<table width='302' border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td bgcolor='#d3ba6a'>
  
<div style='padding:5px;'>      
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td>

<form action='' method='post' name='forma' class='decorated-form'>              
<label class='field'>
<span>Логин</span>
<input name='user' type='text' id='user' value='$_POST[user]' maxlength='20' style='width:140px;' />
</label> 

<label class='field'>
<span>Пароль</span>
<input name='password' type='password' id='password' value='$_POST[password]' maxlength='20' style='width:140px;' />
</label>

<div style='height:10px;'></div> 


		
<table border='0' align='center'>
<tr>
<td>
<input type='submit' name='dostup' id='dostup' value='Войти' style='border:1px solid  #222120; background-color:#222120; height:30px; font-size:17px; color: #FFFFFF; cursor: pointer;' />  
</td>
<td width='3'>&nbsp;</td>
<td>
<a href='#'>Забыли пароль?</a> 
</td>
</tr>
</table>          
</form>

</td>
<td align='right' valign='top'>
<div style='height:8px;'></div>
<div style='padding:5px'><img src='../img/authorization.png' width='128' height='128' />
</div>
</td>
</tr>
</table>
</div>

       
</td>
</tr>
</table>
<div style='height:45px;'></div>";

?>

<?
	
?>              



<?

}



echo"
</div>
</div>
<div style='height:15px;'></div>
";
	 

include ($_SERVER['DOCUMENT_ROOT'] . "/blocks/footer.php");


echo"
</body>
</html>";
?>
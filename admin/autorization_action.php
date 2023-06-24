<?
///////////////////////////////////////////////
$error="";


if (isset($_POST['dostup'])) {$dostup =1; } 
            else
            { $dostup = '' ;}


if (empty($_SESSION['login_admin']) and  empty($_SESSION['id_admin']) and $dostup !=1){
	
	
	if (!empty($_COOKIE['_login_admin']) and  !empty($_COOKIE['_id_admin']) and  !empty($_COOKIE['_password_admin'])){


$result_nov = mysql_query("SELECT * FROM  users_sheikh WHERE username='$_COOKIE[_login_admin]' and id='$_COOKIE[_id_admin]'"); 
$myrow_nov = mysql_fetch_array($result_nov);				
	
				
if (($myrow_nov['password']==$_COOKIE['_password_admin'])){
	
$_SESSION['login_admin']=$_COOKIE['_login_admin']; 
$_SESSION['id_admin']=$_COOKIE['_id_admin'];	
$error="<meta http-equiv='Refresh' content='0; '>";	
}}}


//echo"--$_COOKIE[_login_admin] $_COOKIE[_id_admin] $_COOKIE[_password_admin]";
/////////////////////////////////////////////////////////////////////


$ok_verify=1;
$login_ok=1;


if (isset($_POST['user'])) { $user = $_POST['user']; 
$user = str_replace(" ","",$user);
$user = trim($user);
if ($user == '') { unset($user);} } 



if (isset($_POST['password'])) {$password=$_POST['password']; 
if ($password =='') { unset($password);} }



if ($dostup==1){
	
	
if ($user and $password) {


$result_poisk = mysql_query("SELECT * FROM users_sheikh WHERE username='$user' ORDER BY id DESC");
$myrow_poisk = mysql_fetch_array($result_poisk);





if ($myrow_poisk) {
			
		if (password_verify($password, $myrow_poisk['password'])) {
				// Success!
				$login_ok=1;
				$_SESSION['id_admin']=$myrow_poisk['id'];
				$_SESSION['login_admin']=$myrow_poisk['username'];				


setcookie("_login_admin", $_SESSION['login_admin'], time()+59999999); //694.4444 дней
setcookie("_password_admin", $myrow_poisk['password'], time()+59999999);//694.4444 дней
setcookie("_id_admin", $_SESSION['id_admin'], time()+59999999); //694.4444 дне





$error="

<meta http-equiv='Refresh' content='0; '>


<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>

<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td width='60' align='center'><img src='../img/ok_min.png' width='50'  /></td>
<td>
<div>Авторизация пройдена успешно!
<div style='height:3px;'></div>	 
Сейчас вы будете перенаправлены!
</div>
</td>
</tr>
</table>

<div style='height:5px;'></div>

<div id='liniya_st'></div>
<div style='height:45px;'></div>




";	



}else {
					
$error="
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>

<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td width='60' align='center'><img src='../img/vniman.jpg' width='50' height='50' /></td>
<td>
<div>Ошибка авторизации!
<div style='height:3px;'></div>	 
Вы ввели неправильный логин или пароль!
</div>
</td>
</tr>
</table>

<div style='height:5px;'></div>
<div id='liniya_st'></div>
<div style='height:45px;'></div>
";					
					
}	


}else{
	
					
$error="
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>

<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td width='60' align='center'><img src='../img/vniman.jpg' width='50' height='50' /></td>
<td>
<div>Ошибка авторизации!
<div style='height:3px;'></div>	 
Вы ввели неправильный логин или пароль!
</div>
</td>
</tr>
</table>

<div style='height:5px;'></div>
<div id='liniya_st'></div>
<div style='height:45px;'></div>
";						
					
}	

}else{
	
$error="
<div style='height:10px;'></div>
<div id='liniya_st'></div>
<div style='height:5px;'></div>

<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td width='60' align='center'><img src='../img/vniman.jpg' width='50' height='50' /></td>
<td>
<div>Ошибка авторизации!
<div style='height:3px;'></div>	 
Вы забыли указать логин или пароль!
</div>
</td>
</tr>
</table>

<div style='height:5px;'></div>

<div id='liniya_st'></div>
<div style='height:45px;'></div>
";		
	
	}
}		
/////////////////////////////////////////////////////////////////////
?>
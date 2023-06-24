<?
session_start();
session_destroy();

setcookie ("_id_admin", "");
setcookie ("_login_admin", "");
setcookie ("_password_admin", "");

if (!empty($_SESSION['id_admin']) and  !empty($_SESSION['login_admin']))
 {   
 
echo    "

<meta http-equiv='Refresh' content='0; URL=/'>";	
} 

?>

<meta http-equiv='Refresh' content='0; URL=/admin/'>
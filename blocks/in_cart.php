<?

include ("bd.php") ;

$id = str_replace('"','',json_encode ($_POST['id'])); //получаем в обработчик номер товара
$id_klient = str_replace('"','',json_encode ($_POST['id_klient'])); //получаем в обработчик user_id
$talon = str_replace('"','',json_encode ($_POST['talon'])); //получаем в обработчик user_id

$id=str_replace(' ', '', $id);

//ну и заносим в базу данных например данные о товаре, положенном в коризну 

$result_tovar = mysql_query ("SELECT * FROM tovari WHERE id='$id'");
$myrow_tovar =  mysql_fetch_array($result_tovar);	


$result_vibor = mysql_query ("SELECT * FROM vibranie_tovari WHERE id_tovara='$id' and talon='$talon'");
$myrow_vibor =  mysql_fetch_array($result_vibor);	

if ($myrow_vibor){
	
$new_colichestvo=$myrow_vibor[colichestvo]+1;	
	
$add_infa = mysql_query ("UPDATE vibranie_tovari SET colichestvo='$new_colichestvo' WHERE id='$myrow_vibor[id]' "); 	
}

else{

$add_infa = mysql_query ("INSERT INTO vibranie_tovari (id_tovara,id_klient,talon,date_time_add,colichestvo,cena_za_ed,old_price) VALUES('$id','$id_klient','$talon',NOW(),'1','$myrow_tovar[prise]','$myrow_tovar[old_price]')");
}

$_SESSION[korzina_wag]=""; $_SESSION[summa_oplati]="";

echo $quantity_in_cart;
?>
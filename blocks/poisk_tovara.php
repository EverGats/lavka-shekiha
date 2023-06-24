<?

if (isset($_POST['dobavit'])) {$dobavit =1; } 
            else
            { $dobavit = '' ;}		

if (isset($_POST['nazvanie'])) {$nazvanie =$_POST['nazvanie']; } 
            else
            { $nazvanie = '' ;}
			
if (isset($_POST['artikul'])) {$artikul =$_POST['artikul']; } 
            else
            { $artikul = '' ;}
						

/////////////////////////////////////////////////////////////////
echo"
<form action='' method='post' name='forma' class='decorated-form'>";



echo"
<div align='center' style='width:100%; position:relative; '>
<div id='forma_auto' align='center'>
<div style='height:7px;'></div>
<div align='center' id='forma_auto'>
<div style='height:4px;'></div>";

echo"
<div>
<label class='field'>
<span>Поиск по названию товара</span>
<input name='nazvanie' type='text' id='nazvanie' value='"; if (!$nazvanie){echo"$myrow_tovar[nazvanie]";}else{echo"$nazvanie";}echo"' maxlength='100' style='width:70%;'/>";

if ($dobavit==1) {

if (!$nazvanie) {}else {
	
$str_nazvanie=strlen($nazvanie);

if ($str_nazvanie <3){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 3 знаков!</strong></div>";}else { 

if ($str_nazvanie >85){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 85 знаков!</strong></div>";}
}
}
///////////		
}

echo"
</label>
</div>
";

echo"</div>";
////////////////////////////////////////////////////////////////

echo"
<div style='height:15px;'></div>
<div align='center' id='forma_auto'>
<div style='height:4px;'></div>
<div>
<label class='field'>
<span>Поиск по артикулу товара</span>
<input name='artikul' type='text' id='artikul' value='$artikul' maxlength='7' style='width:70%;'/>";

if ($dobavit==1) {

if (!$artikul) {}else {
	
$str_artikul=strlen($artikul);

if ($str_artikul <1){echo"<div><strong style='color:#EB1F14'>Поле должно быть не меньше 1 знаков!</strong></div>";}else { 

if ($str_artikul >8){echo"<div><strong style='color:#EB1F14'>Поле должно быть не больше 8 знаков!</strong></div>";}

else{
	
if (!preg_match("|^[\d]+$|", $artikul))  {	
echo"
<div><strong style='color:#EB1F14'>В артикуле можно использовать только цифры!</strong></div>";
}	

}
}
}
///////////		
}


echo"
</label>
</div>
";

echo"</div>";
////////////////////////////////////////////////////////////////


echo"
<div style='height:15px;'></div>
<div align='center'><input name='dobavit' type='submit' value='Искать товар' class='forma_button_auto' /></div>
<div style='height:5px;'></div> 
";

echo"

</div>
</div>
</form>
";
?>
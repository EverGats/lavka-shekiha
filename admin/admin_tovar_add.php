<?

if ($meny==1 and $id_user_session==$id_admin_user){

    $okei="";

    if (isset($_POST['dobavit'])) {$dobavit =1; }
    else
    { $dobavit = '' ;}




    if ($dobavit==1){


        if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))

        {
            /**
             * mb_ucfirst - сделать первую букву строки прописной
             * @param string $str - строка
             * @param string $encoding - кодировка, по-умолчанию UTF-8
             * @return string */
            function mb_ucfirst($str, $encoding='utf-8')

            {
                $str = mb_ereg_replace('^[\ ]+', '', $str);
                $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
                    mb_substr($str, 1, mb_strlen($str), $encoding);
                return $str;
            }
        }
        $str = $ALL['tsennost_word'];



        if (isset($_POST['nazvanie'])){$nazvanie = $_POST['nazvanie'];}

        if (isset($_POST['cat'])){$cat = $_POST['cat'];}


        if (isset($_POST['opisanie'])){$opisanie = $_POST['opisanie'];}

        if (isset($_POST['fupload'])){$fupload = $_POST['fupload'];}

        if (isset($_POST['status'])){$status = $_POST['status'];}

        if (isset($_POST['mugskaya'])){$mugskaya = $_POST['mugskaya'];}
        if (isset($_POST['genskaya'])){$genskaya = $_POST['genskaya'];}

        if (isset($_FILES['fupload'])){$fupload = $_FILES['fupload'];}


        $opisanie = $db->real_escape_string($opisanie);




/////////////////////////////////////////
        if (!$nazvanie) {}else {

            $str_nazvanie=strlen($nazvanie);

            if ($str_nazvanie <3){}else {

                if ($str_nazvanie >85){}
                else{
                    $seo_nazvanie=$nazvanie;
                    $nazvanie = stripslashes($nazvanie);
                    $nazvanie = htmlspecialchars($nazvanie);
                    $nazvanie = trim($nazvanie);
                    $nazvanie=mb_ucfirst($nazvanie);

                    $result_post_povtor2 = $db->query("SELECT * FROM tovari WHERE nazvanie='$nazvanie'");
                    $myrow_post_povtor2=$result_post_povtor2->fetch_array();



                    if (!$myrow_post_povtor2){$nazvanie_norm=1;}

                }
            }
        }

/////////////////////////////////////////////////





        if ($nazvanie_norm==1 and $cat and $_FILES['fupload']['tmp_name']){

/////////////////////
            function translit($s) {
                $s = (string) $s;
                $s = strip_tags($s);
                $s = str_replace(array("\n", "\r"), " ", $s);
                $s = trim($s);
                $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
                $s = strtr($s, array(
                    'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i','й'=>'j','к'=>'k',
                    'л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c',
                    'ч'=>'ch','ш'=>'sh','щ'=>'shh','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
                $s = preg_replace("/\s+/", ' ', $s);
                $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);

                $s = str_replace(" ", "-", $s);
                return $s;
            }

/////////////////////////////////////////

            function strtolower_ru($text) {
                $alfavitlover = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ы','э','ю','я','ъ','ь');
                $alfavitupper = array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ы','Э','Ю','Я','Ъ','Ь');
                return str_replace($alfavitupper,$alfavitlover,strtolower($text));
            }


////////////////////////////////////////////////////
            $name_mini=str_replace('"', "", $seo_nazvanie );
            $name_mini=str_replace("'", "", $seo_nazvanie );
            $name_mini = strtolower_ru($name_mini);
            $name_mini_seo = translit($name_mini);

            $name_mini_seo=str_replace('--', "-", $name_mini_seo);
            $name_mini_seo=str_replace('---', "-", $name_mini_seo);
            $name_mini_seo=str_replace('----', "-", $name_mini_seo);
            $name_mini_seo=mb_substr($name_mini_seo, 0, 80);

            $result_post_povtor3 = $db->query("SELECT * FROM site_pages WHERE name_url='$name_mini_seo'");
            $myrow_post_povtor3=$result_post_povtor3->fetch_array();

            if (!$myrow_post_povtor3){

                $add_infa = $db->query("INSERT INTO tovari (nazvanie,cat,status,mugskaya,genskaya,opisanie,seo_url,date_add,date_time_add,image) VALUES('$nazvanie','$cat','$status','$mugskaya','$genskaya','$opisanie','$name_mini_seo','$date $time',NOW(),'$name_mini_seo')");


                $result_us = $db->query("SELECT id FROM tovari ORDER by id DESC LIMIT 1");
                $myrow_us = $result_us->fetch_array();

                $add_infa = $db->query("INSERT INTO site_pages (translit_url,name_url,url,id_post,lastmod) VALUES('$name_mini_seo/','$name_mini_seo','tovar.php?id=$myrow_us[id]','$myrow_us[id]',NOW())");


                $nazvanie="";
                $cat="";
                $status="";
                $mugskaya="";
                $genskaya="";
                $opisanie="";
                $dobavit="";





                if ($add_infa) {

                    $privz=$name_mini_seo;


                    require '../foto/config.php';
                    require '../foto/process.php';


                    if(isset($_FILES['fupload'])) {

                        if(preg_match('/[.](jpg)|(JPG)|(JPEG)|(jpeg)|(PNG)|(png)|(GIF)|(gif)$/',
                            $_FILES['fupload']['name'])) {


                            $filename = $_FILES['fupload']['name'];
                            $source = $_FILES['fupload']['tmp_name'];
                            $target = $path_to_image_directory . $filename;

                            move_uploaded_file($source, $target);


                            createThumbnail($filename);
                            createThumbnail2($filename);
                            unlink ($target);
                        }
                    }

                    $okei="

<div style='height:10px;'></div>
<div style='height:1px; background-color:#CCCCCC;'></div>
<table border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='60' align='center'><img src='../img/ok_min.png' width='50'  /></td>
    <td><p>Товар успешно добавлен<br />
    На странице редактирования <a href='?edit=$myrow_us[id]'>продолжайте</a>!</p></td>
  </tr>
</table>
<div style='height:1px; background-color:#CCCCCC;'></div>
<div style='height:10px;'></div>
";



                }
            }
        }

    }

    echo $okei;

    echo"
<div style='height:2px;'></div>
<div id='liniya_st'></div>
<div align='center'><h2>Добавление товара</h2></div>";

    echo"
<div id='forma_standart'>
<form enctype='multipart/form-data' method='POST' action='' class='decorated-form'>";


////////////

    echo"
<div>
<label class='field'>
<span>Укажите название <em>*</em></span>
<input name='nazvanie' type='text' id='nazvanie' value='$nazvanie' maxlength='150'/>
<span class='hint'>Например: часы Rolex Cosmo</span>";


    if ($dobavit==1) {

        if (!$nazvanie) {echo"<div><strong style='color:#EB1F14'>Укажите название!</strong></div>";}else {

            $str_nazvanie=strlen($nazvanie);

            if ($str_nazvanie <3){echo"<div><strong style='color:#EB1F14'>Ваше название товара не должно быть менее 3 символов!</strong></div>";}else {

                if ($str_nazvanie >85){echo"<div><strong style='color:#EB1F14'>Ваше название товара не должно превышать 85 символов!</strong></div>";}

                if ($myrow_post_povtor2){echo"<div><strong style='color:#EB1F14'>Ошибка! Товар с таким названием уже существует!</strong></div>";}

                if ($myrow_post_povtor3){echo"<div><strong style='color:#EB1F14'>Ошибка! Товар с таким названием уже существует в вашем url адресе!</strong></div>";
                }
            }
        }
///////////
    }

    echo"
</label>
</div>
";



    echo"

<label class='field'>
<span>Категория товара <em>*</em></span>
<select name='cat' style='width:310px;'>
<option value='0'>Выберите категорию</option>
";

    $result_cat_sobitiya = $db->query("SELECT * FROM post_cat1 ORDER BY name ASC");
    $myrow_cat_sobitiya=$result_cat_sobitiya->fetch_array();

    do{
        $select_tag="";

        if ($cat==$myrow_cat_sobitiya['id']) {$select_tag=" selected='selected'";}

        echo"
<option value='$myrow_cat_sobitiya[id]'$select_tag>$myrow_cat_sobitiya[name]</option>";

    }
    while ($myrow_cat_sobitiya=$result_cat_sobitiya->fetch_array());

    echo"</select>";

    if ($dobavit==1) {
        if (!$cat) {echo"<div><strong style='color:#EB1F14'>Выберите категорию!</strong></div>";}
    }

    echo"
</label>";







    echo"

<label class='field'>
<span>Статус в наличии</span>";

    if ($status==0){$selekt0='selected="selected"';}
    if ($status==1){$selekt1='selected="selected"';}

    echo"

<select name='status' id='status'>
<option value='0' $selekt0 >Нет</option>
<option value='1' $selekt1 >Да</option>
</select>
</label>";

////////////////////////////////////////////////////////////
    echo"
<table border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td>

<label class='field'>
<span>Мужская</span>
</label>

</td>

<td>
<input type='checkbox' name='mugskaya' value='1'";

    if ($mugskaya==1){echo" checked='checked'";}

    echo" />
<div style='height:4px;'></div>
</td>


<td width='30'>&nbsp;</td>
<td>

<label class='field'>
<span>Женская</span>
</label>

</td>
<td>
<input type='checkbox' name='genskaya' value='1'";

    if ($genskaya==1){echo" checked='checked'";}

    echo" />
<div style='height:4px;'></div>
</td>


</tr>
</table>";

///////////////////////////////////////////////////////////

    echo"
<label class='field'>
<span>Описание товара</span>
</label>
<div style='height:2px;'></div>



<div style='color:#000000;'>
<textarea id='redactor_content' name='opisanie' style='width: 100%; height:320px; color:#000000;'>$opisanie
</textarea>
</div>
<div style='height:10px;'></div>

<div style='color:#000000; padding:5px; background-color:#CCCCCC;' align='center'>Загрузить файл <input name='fupload' type='file' size='50' /></div>
";
    if ($dobavit==1) {
        if ($_FILES['fupload']['tmp_name']){}else{echo"<div align='center'><strong style='color:#EB1F14'>Загрузите файл!</strong></div>";}
    }


    echo"
<div style='height:15px;'></div>
<div align='center'><input name='dobavit' type='submit' value='Добавить товар' class='orange-button' /></div>
<div style='height:5px;'></div> 
";



///////////////////////////////

    echo"           
</form>
</div> 
<div style='height:15px;'></div> 
";

}
?>
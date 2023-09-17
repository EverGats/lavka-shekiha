<?
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";

if (isset($_GET['id'])) {$id =$_GET['id']; }
else
{ exit("Вы зашли на страницу без параметра!");}
if (!preg_match("|^[\d]+$|", $id))    {
    exit("Попытка взлома");
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
            $.post('../blocks/in_cart.php',{id:id, id_klient:id_klient,talon:talon},function(data){ //передаем данные о товаре и пользователе в обработчик
                $('#basket_quantity').html(data); //тут изменяем кол-во товаров в корзине на текущей странице
                alert("Товар добавлен в корзину!"); //выводим сообщение о том, что товар добавлен в корзину
            });
        }
    </script>


    <style>



        #content {
            width: 100% !important;
        }

        #content_tovar {
            padding:20px;
            background: #FFFFFF;
            float: right;
            width: 70%;
            text-align: left;
            box-sizing: border-box;

            min-height: 420px;

        }

        #left_tovar {

            float: left;
            width: 29%;
            padding: 20px;
            margin-top: -20px;
            margin-left: 13px;

        }

        #left_tovar img {
            max-width: 100%;
            height: auto;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.2);
        }

        a.blok_stat_knopka_tovar {
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #2c3e50;
            border: none;
            border-radius: 3px;
            transition: background-color .3s;
        }

        a.blok_stat_knopka_tovar:hover {
            background-color: #34495e;
        }

        #suka {
            background-color: white;
            width: auto;
            height: 500px;
            padding-top: 30px;
        }

        #image_gallery_mob {
            display:none;
        }

        /* Для ширины 800 пикселей и меньше */
        @media screen and (max-width: 800px) {
            #left_tovar {
                display:none;
                width: 1%;
            }
            #content_tovar {
                width: 100%;
            }
            #image_gallery_mob {
                display: block;
                max-width: 100%;
                height: auto;
                margin: 0 auto;
            }
        }

        #myselect {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f8f8;
            color: #333;
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


echo"
<div id='container_site' style='min-height: 800px; background-color: #FFFAEE !important;'>
";
//include ("blocks/left_meny.php");
echo"

<div id='content'>";

$result_tovar_cat = $db->query("SELECT * FROM post_cat1 WHERE id='$myrow_tovar[cat]' ");
$myrow_tovar_cat =  $result_tovar_cat->fetch_array();

echo"
<div style='height:6px;'></div>
<div id='ssilka_mob'><a href='/'>Главная</a>&nbsp;<em>&rarr;</em>&nbsp;";

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


echo"<div id='suka'>";

echo"<div id='content_tovar'>";

echo"
<div style='height:3px'></div>
<div><strong>Артикул на сайте:</strong> $myrow_tovar[id]</div>

<div style='height:4px'></div>

<div><strong>Бренд:</strong> <a href='../$myrow_tovar_cat[seo_url]'>$myrow_tovar_cat[name]</a> </div>";


echo"
<div style='height:10px'></div>";

if ($myrow_tovar['prise']){


    $cena_rozn = number_format($myrow_tovar['prise'],0,'',' ');


    echo"
<div style='padding:8px;'>
<div><strong style='font-size:16px; color:#228b22'><div id='mydiv'>Цена: $cena_rozn руб.</div></strong>";


    echo"
</div>

<div style='height:14px;'></div>
";

    if ($myrow_tovar['status']==0){

        if ($_SESSION['id_klient']){$id_klient=$_SESSION['id_klient'];}else{$id_klient="0";}


        echo"
<div style='position:relative; width:100%;'>
<span id='parametr_on'><a href='javascript:void(0);' onclick='to_cart($myrow_tovar[id],$id_klient,$_SESSION[talon])' class='blok_stat_knopka_tovar'>Добавить в корзину +</a></span>";

        $result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_tovar[id]' ORDER by name ASC");
        $myrow_po_ml= $result_po_ml->fetch_array();

        echo"
<select name='cena_po_ml' id='myselect'>";

        if ($myrow_po_ml){

            do {

                echo"
<option value='$myrow_po_ml[prise]'>$myrow_po_ml[name] мл.</option>
";
            }
            while ($myrow_po_ml= $result_po_ml->fetch_array());
        }

        echo"
</select>

</div>";

        ?>
        <script type="text/javascript">
            document.getElementById("myselect").addEventListener("change", function(){
                /*document.getElementById('mydiv').innerHTML = "Цена: "+this.value+" руб."; */

                var goro=this.value;
                str = '' + goro;
                result = str.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ");

                document.getElementById('mydiv').innerHTML = "Цена: "+result+" руб.";

                /*
                alert(result);
                */

                document.getElementById('parametr_on').innerHTML = "<a href='javascript:void(0);' onclick='to_cart("+this.value+",<? echo"$id_klient,$_SESSION[talon]";?>)' class='blok_stat_knopka_tovar'>Добавить в корзину +</a>";
            });
        </script>

        <?

    }
    else{echo"<span style='font-size:14px; color:#ff0000'>товара нет в наличии!</span> ";}

    $result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_tovar[id]' ORDER by name DESC");
    $myrow_po_ml=$result_po_ml->fetch_array();


    if ($myrow_po_ml){

        echo"
<div style='height:12px;'></div>
";

        do {

            $prise_format = number_format($myrow_po_ml['prise'],0,'',' ');

            echo"<div style='padding:1px;'><strong>$myrow_po_ml[name] мл.</strong> - $prise_format р.</div>
";


        }
        while ($myrow_po_ml= $result_po_ml->fetch_array());

        echo"
<div style='height:2px;'></div>
";
    }


    echo"
<div style='height:8px;'></div>
</div>
<div style='height:7px;'></div>
";
}

echo"
<div id='image_gallery_mob' align='center'>
<a class='gallery' rel='group' href='../foto/full/$myrow_tovar[image].jpg'>
<img src='../foto/mini/$myrow_tovar[image].jpg' border='0' style='width:100%'  /></a>
</div>";




echo"
<div id='liniya_st'></div>
$myrow_tovar[opisanie]
</div>";

echo"
<div id='left_tovar'>

<div align='center'>
<a class='gallery' rel='group' href='../foto/full/$myrow_tovar[image].jpg'>
<img src='../foto/mini/$myrow_tovar[image].jpg' border='0' /></a>
</div>
</div>";


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
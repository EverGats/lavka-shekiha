<?php
do {
$volumes = explode('--', trim($myrow_all_stat['po_ml'], '-'));

$isInVolumeRange = array_reduce($volumes, function($carry, $volume) use ($minVolume, $maxVolume) {
    return $carry ||
        (!$minVolume || $volume >= $minVolume) &&
        (!$maxVolume || $volume <= $maxVolume);
}, false);

if (!$isInVolumeRange) {
    continue;
}

if($myrow_all_stat['status']==0){
    $iterator++;
    if ($_SESSION['id_admin'] and $_SESSION['login_admin']){
        $sluch3=random(30);
        $sluch4=random(30);
        $sluch5=random(30);
    }

    $prsm="";

    $last=$myrow_all_stat['view']%10;

    if ($last==0){$prsm="просмотров";}
    if ($last==1){$prsm="просмотр";}
    if ($last>1 and $last<5){$prsm="просмотра";}
    if ($last>4 and $last<10){$prsm="просмотров";}

    $prosmotrov = number_format($myrow_all_stat['view'],0,'',' ');

///////////////////////////////////////////

    $result_kom = $db->query("SELECT id FROM post_komment WHERE post='$myrow_all_stat[id]' and moder='1'");
    $myrow_kom = $result_kom->num_rows;


    $komment="";
    $last_komment=$myrow_kom%10;

    if ($last_komment==0){$komm="отзывов";}
    if ($last_komment==1){$komm="отзыв";}
    if ($last_komment>1 and $last_komment<5){$komm="отзыва";}
    if ($last_komment>4 and $last_komment<10){$komm="отзывов";}



    $image_path = "../foto/mini/$myrow_all_stat[image].jpg";
    $default_image_path = "/img/default.jpeg";

    if (!file_exists($image_path)) {
        $image_path = $default_image_path;
    }


    echo"
<div id='blok_stat' class='col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3' align='center'>

<div id='blok_stat_img'>
<a href='/catalog/$myrow_all_stat[seo_url]'>
<img src='$image_path' alt='$myrow_all_stat[nazvanie]' title='$myrow_all_stat[nazvanie]'>
</a>
</div>
<div style='height:20px;'></div>

<div><a class='blok_stat_zag' href='../$myrow_all_stat[seo_url]'>$myrow_all_stat[nazvanie]</a></div>

<div style='height:20px;'></div>
<div class='blok_stat_ml'>
";



//////////////////////////////////////////////////////////

    $result_po_ml = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='$myrow_all_stat[id]' ORDER by name DESC");
    $myrow_po_ml= $result_po_ml->num_rows;




    if ($myrow_po_ml) {

        while ($myrow_po_ml = $result_po_ml->fetch_array()) {


        $prise_format = number_format($myrow_po_ml['prise'], 0, '', ' ');

        echo "<div class='blok_stat_ml_text' style='text-align: left;'><span style='font-weight: 600;'>$myrow_po_ml[name] мл.</span> <span style='font-weight: 400;'>- $prise_format р.</span></div>
<div style='height:4px;'></div>
";


    }

        echo"
</div>
";
    }

/////////////////////////////////////////////////////////


    /*echo" ОТЗЫВЫ И КОММЕНТАРИИ
    <div align='center'>
    <div id='views'><img src='../img/views.png' width='12' height='8' align='baseline' /> $prosmotrov $prsm&nbsp;
    <div style='height:1px;'></div>
    <img src='../img/comment.png' width='12' height='11' align='baseline' /> $myrow_kom $komm </div>
    <div style='height:10px;'></div>
    </div>
    ";*/


    if ($_SESSION['id_klient']){$id_klient=$_SESSION['id_klient'];}else{$id_klient="0";}



    echo"
<a href='../$myrow_all_stat[seo_url]' class='blok_stat_knopka'>В корзину</a>";


    echo"  
<div style='height:7px;'></div>
";

//echo"<div style='position:absolute; bottom:0px; background-color:#0099FF; width:100%;'>txt</div>";


//////////////////////////////////////////////////////////////////////////////////
/////////////////////
    if ($_SESSION['id_admin']==1 and $_SESSION['login_admin']){
        echo"
<div style='height:17px;'></div>
<div align='center' style='position:relative; bottom:62px; width:94%;'>


<div id='knopka_katalog' style='padding:1px'><a href='javascript: $sluch5();'>редактировать <img style='float:right;' src='../img/edit_mik.png' width='17' height='17' border='0' align='absmiddle'></a></div>

<script type='text/javascript'> 
function $sluch5(){

if (confirm('Предупреждение!!!\\r\\nВы уверены, что хотите отредактировать этот товар -  $myrow_all_stat[nazvanie]!?')) {
	
window.open('../admin/?edit=$myrow_all_stat[id]','_blank'); }
	
else {}
}
</script>";




        echo"<div style='height:1px;'></div>";
        echo"<div id='knopka_katalog' style='padding:1px'><a href='javascript: $sluch3();'>удалить <img style='float:right;' src='/img/1no.png' width='20' height='15' border='0' align='absmiddle'></a></div>

<script type='text/javascript'> 
function $sluch3(){

if (confirm('Предупреждение!!!\\r\\nВы уверены, что хотите удалить товар -  $myrow_all_stat[nazvanie]!?\\r\\n\\r\\nИмейте ввиду, что так же будет удалена вся связанная с товаром информация!')) {
window.open('../admin/?del=$myrow_all_stat[id]','_blank'); }

else {}
}
</script>
</div>
";
    }
/////////////////////////////////////////////////////
//////////////////////////////////////////////////



    echo"
</div>
";


}

}
while ($myrow_all_stat=$result_all_stat->fetch_array());
?>
<style>
    a.blok_stat_knopka {
        font-size: 110%;
        font-weight: 700;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        padding: .3em 0.8em;
        transition: .2s ease-in-out;
        width: 100%;
        height: 37px;
        display: flex;
        justify-content: center;
        border-radius: 7px;
        background-color: rgb(131, 115, 102);
        opacity: 1;
        letter-spacing: 2.31px;
        align-items: center;
    }

    #blok_stat_img img {
        background:#fff;
    }
    #blok_stat  {
        position:relative;
        justify-content: center;
    }

    .blok_stat_ml_text{
        letter-spacing: 0.06em;
    }

    a.blok_stat_knopka:hover:not(:active) {
        background: #caac52;
    }

    a.blok_stat_knopka:active {
        background: #caac52;
    }
    a.blok_stat_zag {
        color: #241515;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: left;
        text-decoration: none;
        font-weight:700;
        text-transform: uppercase;
    }
    @media (min-width: 1000px) {
        .blok_stat_ml_text{
            font-size: 16px;
        }
        .blok_stat_ml {
            height: 65px;
            margin-bottom: 20px;
        }

        #blok_stat  {
            height: 610px;
        }

        a.blok_stat_zag {
            font-size: 17px;
        }
        #blok_stat_img img {
            height:230px;
            max-width:94%;
            padding:2px;
        }
        #blok_stat_img {
            height: 320px;
            background-color: #fff;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    }
    @media (max-width: 1000px) {
        .blok_stat_ml_text{
            font-size: 19px;
        }
        a.blok_stat_knopka {
            height: 44px;
        }
        .blok_stat_ml {
            height: 65px;
            margin-bottom: 20px;
        }
        #blok_stat {
            height: 590px;
        }
        a.blok_stat_zag {
            font-size: 21px;
        }
        #blok_stat_img img {
            height:230px;
            max-width:94%;
            padding:2px;
        }
        #blok_stat_img {
            height: 350px;
            background-color: #fff;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    }
    #filters_tovar a{
        text-decoration: none;
    }

    @media (min-width: 990px) and (max-width: 1200px) {
        #blok_stat_img {
            height: 265px;
        }

    }
</style>

<?
echo "
<div class='filter_blok'>
";
if ($id) {
    $result_brand = mysql_query("SELECT * FROM post_cat1 WHERE id='$id'");
    $myrow_brand = mysql_fetch_array($result_brand);
}

$img_off = "<img src='../img/chek_off.png'  height='30' border='0'/>";
$img_on = "<img src='../img/chek_on.png'  height='30' border='0'/>";


///////////////////////////////////////////////////////////////////////////////

if ($_GET['id']) {
    $brand_view = "../$myrow_brand[seo_url]";
} else {
    $brand_view = "../katalog";
}
if ($_GET['ml']) {
    $ml_view = "&ml=$_GET[ml]";
} else {
    $ml_view = "";
}

echo "
<ul>
<div>По полу</div>";

$result_pol = mysql_query("SELECT * FROM filters_pol ORDER BY id ASC");
$myrow_pol = mysql_fetch_array($result_pol);

do {
    if ($_GET['pol'] == $myrow_pol[id]) {
        $view_vibor_pol = $img_on;
    } else {
        $view_vibor_pol = $img_off;
    }

//
    if ($_GET['filters']) {
        if (!$_GET['pol']) {
            $filters_view = "&filters=1#tovar_gal";
        }
        if ($_GET['pol'] == $myrow_pol[id]) {
            $filters_view = "/?filters=1#tovar_gal";
        } else {
            $filters_view = "&filters=1#tovar_gal";
        }
    } else {
        $filters_view = "";
    }
//

    if ($_GET['ml']) {
        $pol_view = "&ml=$ml";
    } else {
        $ml_view = "";
    }

    echo "
<li><a href='$brand_view";
    if ($_GET['pol'] == $myrow_pol[id]) {
        echo "$filters_view";
    } else {
        echo "/?pol=$myrow_pol[id]$ml_view$filters_view";
    }
    echo "'>$view_vibor_pol $myrow_pol[name]</a></li>
";

} while ($myrow_pol = mysql_fetch_array($result_pol));
///////////////////////////////////////////////////////////////////////////////

echo "
<div id='liniya_st'></div>
<div style='height:3px;'></div>
<div>По брендам</div>
<div style='height:3px;'></div>
";


$result_cat_sobitiya = mysql_query("SELECT * FROM post_cat1 ORDER BY name ASC");
$myrow_cat_sobitiya = mysql_fetch_array($result_cat_sobitiya);

do {
    $result = mysql_fetch_array(mysql_query("SELECT * FROM tovari WHERE `status` = '0' and `cat` = '". $myrow_cat_sobitiya[id] ."'"));

    if($result) {

    $pol_view = "";

    if (!$_GET['id']) {
        $view_vibor_brand = $img_off;
    } else {
        if ($_GET['id'] == $myrow_cat_sobitiya[id]) {
            $view_vibor_brand = $img_on;
        } else {
            $view_vibor_brand = $img_off;
        }
    }

//
    if ($_GET['filters'] and !$_GET['pol'] and !$_GET['ml']) {

        if (!$_GET['id']) {
            $filters_view = "--/&filters=1#tovar_gal";
        }
        if ($_GET['id'] == $myrow_cat_sobitiya[id]) {
            $filters_view = "/?filters=1#tovar_gal";
        } else {
            $filters_view = "/?filters=1#tovar_gal";
        }

    } else {
        $filters_view = "";
    }


///
    if ($_GET['filters'] and ($_GET['pol'])) {
        $filters_view_dop = "&filters=1#tovar_gal";
    } else {
        $filters_view_dop = "";
    }
//

    if ($_GET['pol']) {
        $pol_view = "/?pol=$pol$filters_view_dop";
    }
    if ($_GET['ml']) {
        $pol_view = "/?ml=$ml$filters_view_dop";
    }
/////	

    echo "<li><a href='";
    if ($_GET['id'] == $myrow_cat_sobitiya[id]) {
        echo "../katalog$filters_view";
    } else {
        echo "../$myrow_cat_sobitiya[seo_url]$filters_view";
    }
    echo "$pol_view'>$view_vibor_brand $myrow_cat_sobitiya[name]</a></li>";
    }
} while ($myrow_cat_sobitiya = mysql_fetch_array($result_cat_sobitiya));


/////////////////////////////////////////////////////////////////////////////

echo "
<div id='liniya_st'></div>
<div style='height:3px;'></div>
<div>По объему</div>
<div style='height:3px;'></div>
";


$result_ml = mysql_query("SELECT * FROM tovari_po_ml GROUP BY name ORDER BY name DESC");
$myrow_ml = mysql_fetch_array($result_ml);

do {

/////

    if ($_GET['ml'] == $myrow_ml[name]) {
        $view_vibor_ml = $img_on;
    } else {
        $view_vibor_ml = $img_off;
    }

//
    if ($_GET['filters']) {
        if (!$_GET['ml']) {
            $filters_view = "&filters=1#tovar_gal";
        }

        if ($_GET['ml'] == $myrow_ml[name]) {
            $filters_view = "/?filters=1#tovar_gal";
        } else {
            $filters_view = "&filters=1#tovar_gal";
        }
    } else {
        $filters_view = "";
    }
//

    if ($_GET['pol']) {
        $pol_view = "&pol=$pol";
    } else {
        $pol_view = "";
    }

    echo "
<li><a href='$brand_view";
    if ($_GET['ml'] == $myrow_ml[name]) {
        echo "$filters_view";
    } else {
        echo "/?ml=$myrow_ml[name]$pol_view$filters_view";
    }
    echo "'>$view_vibor_ml $myrow_ml[name]</a></li>
";

} while ($myrow_ml = mysql_fetch_array($result_ml));


/////////////////////////////////////////////////////////////////////////////
echo "
</ul>
</div>
";

?>
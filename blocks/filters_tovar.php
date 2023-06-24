<?php
echo "<div class='filter_blok'>";

if ($id) {
    $result_brand = $db->query("SELECT * FROM post_cat1 WHERE id='$id'");
    $myrow_brand = $result_brand->fetch_array();
}

$img_off = "<img src='../img/chek_off.png'  height='30' border='0'/>";
$img_on = "<img src='../img/chek_on.png'  height='30' border='0'/>";

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

echo "<ul>
<div>По полу</div>";

$result_pol = $db->query("SELECT * FROM filters_pol ORDER BY id ASC");
$myrow_pol = $result_pol->fetch_array();

do {
    if ($_GET['pol'] == $myrow_pol['id']) {
        $view_vibor_pol = $img_on;
    } else {
        $view_vibor_pol = $img_off;
    }

    if ($_GET['filters']) {
        if (!$_GET['pol']) {
            $filters_view = "&filters=1#tovar_gal";
        }
        if ($_GET['pol'] == $myrow_pol['id']) {
            $filters_view = "/?filters=1#tovar_gal";
        } else {
            $filters_view = "&filters=1#tovar_gal";
        }
    } else {
        $filters_view = "";
    }

    if ($_GET['ml']) {
        $pol_view = "&ml=$ml";
    } else {
        $ml_view = "";
    }

    echo "<li><a href='$brand_view";
    if ($_GET['pol'] == $myrow_pol['id']) {
        echo "$filters_view";
    } else {
        echo "/?pol=$myrow_pol[id]$ml_view$filters_view";
    }
    echo "'>$view_vibor_pol $myrow_pol[name]</a></li>";

} while ($myrow_pol = $result_pol->fetch_array());

echo "<div id='liniya_st'></div>
<div style='height:3px;'></div>
<div>По брендам</div>
<div style='height:3px;'></div>";

$result_cat_sobitiya = $db->query("SELECT * FROM post_cat1 ORDER BY name ASC");
$myrow_cat_sobitiya = $result_cat_sobitiya->fetch_array();

do {
    $result = $db->query("SELECT * FROM tovari WHERE `status` = '0' and `cat` = '". $myrow_cat_sobitiya['id'] ."'")->fetch_array();

    if($result) {
        $pol_view = "";

        if (!$_GET['id']) {
            $view_vibor_brand = $img_off;
        } else {
            if ($_GET['id'] == $myrow_cat_sobitiya['id']) {
                $view_vibor_brand = $img_on;
            } else {
                $view_vibor_brand = $img_off;
            }
        }

        if ($_GET['filters'] and !$_GET['pol'] and !$_GET['ml']) {

            if (!$_GET['id']) {
                $filters_view = "--/&filters=1#tovar_gal";
            }
            if ($_GET['id'] == $myrow_cat_sobitiya['id']) {
                $filters_view = "/?filters=1#tovar_gal";
            } else {
                $filters_view = "/?filters=1#tovar_gal";
            }

        } else {
            $filters_view = "";
        }

        if ($_GET['filters'] and ($_GET['pol'])) {
            $filters_view_dop = "&filters=1#tovar_gal";
        } else {
            $filters_view_dop = "";
        }

        if ($_GET['pol']) {
            $pol_view = "/?pol=$pol$filters_view_dop";
        }
        if ($_GET['ml']) {
            $pol_view = "/?ml=$ml$filters_view_dop";
        }

        echo "<li><a href='";
        if ($_GET['id'] == $myrow_cat_sobitiya['id']) {
            echo "../katalog$filters_view";
        } else {
            echo "../$myrow_cat_sobitiya[seo_url]$filters_view";
        }
        echo "$pol_view'>$view_vibor_brand $myrow_cat_sobitiya[name]</a></li>";
    }
} while ($myrow_cat_sobitiya = $result_cat_sobitiya->fetch_array());

echo "<div id='liniya_st'></div>
<div style='height:3px;'></div>
<div>По объему</div>
<div style='height:3px;'></div>";

$min_volume = isset($_GET['min_volume']) ? intval($_GET['min_volume']) : 0;
$max_volume = isset($_GET['max_volume']) ? intval($_GET['max_volume']) : PHP_INT_MAX;

$result_ml = $db->query("SELECT * FROM tovari_po_ml WHERE name BETWEEN $min_volume AND $max_volume GROUP BY name ORDER BY name DESC");

$get_params = $_GET;
unset($get_params['min_volume']);
unset($get_params['max_volume']);

$get_params_string = http_build_query($get_params);
echo '
<style>
    .slider-container {
        max-width: 400px;
        width: 100%;
        margin-left: 7px;
    }
    .slider-range .ui-slider-handle {
        background-color: #5f1b13;
        border-color: #5f1b13;
    }
    .slider-range .ui-slider-range {
        background-color: #5f1b13;
    }
    .slider-all {
        display: flex;
        justify-content: space-between;
        color: #5f1b13;
        margin-bottom: 10px;
    }
    .slider-range {
        width: 100%;
    }
</style>

<div class="slider-container">
    <div class="slider-all">
        <span class="min-volume"></span>
        <span class="max-volume"></span>
    </div>
    <div class="slider-range"></div>
</div>

<script>
$( function() {
    $(".slider-range").each(function(index) {
        var $this = $(this);
        var $minVolume = $this.prev().find(".min-volume");
        var $maxVolume = $this.prev().find(".max-volume");
        
        $this.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ '.(isset($_GET['min_volume']) ? $_GET['min_volume'] : 75).' , '.(isset($_GET['max_volume']) ? $_GET['max_volume'] : 300).' ],
            slide: function(event, ui) {
                $minVolume.text(ui.values[0]);
                $maxVolume.text(ui.values[1]);

                // Обновляем все остальные слайдеры с этими новыми значениями.
                $(".slider-range").not(this).slider("values", ui.values);
                $(".min-volume").not($minVolume).text(ui.values[0]);
                $(".max-volume").not($maxVolume).text(ui.values[1]);
            },
            stop: function(event, ui) {
                var currentParams = "' . $get_params_string . '";
                var redirectUrl = "'.$brand_view.'?min_volume=" + ui.values[0] + "&max_volume=" + ui.values[1];
                if(currentParams) {
                    redirectUrl += "&" + currentParams;
                }
                window.location.href = redirectUrl;
            }
        });

        $minVolume.text($this.slider("values", 0));
        $maxVolume.text($this.slider("values", 1));
    });
} );
</script>
';





/////////////////////////////////////////////////////////////////////////////
echo "
</ul>
</div>
";

?>
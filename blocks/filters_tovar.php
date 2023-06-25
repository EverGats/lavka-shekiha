<?php
echo "<div class='filter_blok'>";

if ($id) {
    $result_brand = $db->query("SELECT * FROM post_cat1 WHERE id='$id'");
    $myrow_brand = $result_brand->fetch_array();
}

$img_off = "<img src='../img/checkbox-off.png' style='position: absolute; right: 0; bottom: 0;' height='20' border='0'/>";
$img_on = "<img src='../img/checkbox-on.png' style='float: right' height='20' border='0'/>";

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

echo "<ul>";

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

    echo "<li><a style='position: relative' href='$brand_view";
    if ($_GET['pol'] == $myrow_pol['id']) {
        echo "$filters_view";
    } else {
        echo "/?pol=$myrow_pol[id]$ml_view$filters_view";
    }
    echo "'>$myrow_pol[name] $view_vibor_pol </a></li>";

} while ($myrow_pol = $result_pol->fetch_array());

echo "<div id='liniya_st'></div>";

$min_volume = isset($_GET['min_volume']) ? intval($_GET['min_volume']) : 0;
$max_volume = isset($_GET['max_volume']) ? intval($_GET['max_volume']) : PHP_INT_MAX;

$result_ml = $db->query("SELECT * FROM tovari_po_ml WHERE name BETWEEN $min_volume AND $max_volume GROUP BY name ORDER BY name DESC");

$get_params = $_GET;
unset($get_params['min_volume']);
unset($get_params['max_volume']);

$get_params_string = http_build_query($get_params);
echo '
<style>
   .filter_blok {
  background-color: #FFFCF1;
  padding: 1px 20px 1px 20px;
  
}
.filter_blok a{
width: 130px;
font-size: 20px;
margin-left: 5px;
margin-bottom: 7px;
}

    #sidebar {
     background: #FFFCF1;
     }
    .slider-container {
        max-width: 400px;
        width: 100%;
        margin-left: 7px;
    }
    .slider-range .ui-slider-handle {
        background-color: #241515;
        border-color: #241515;
    }
    .slider-range .ui-slider-range {
        background-color: #241515;
    }
    .slider-all {
        display: flex;
        justify-content: space-between;
        color: #241515;
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
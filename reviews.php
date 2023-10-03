<?php

include "blocks/header.php"
?>

<div class="content-container">
    <div class="row">

        <div class="review col-xs-12 col-sm-12 col-lg-6 col-xl-6">
            <div style="width:560px;height:800px;overflow:hidden;position:relative;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/1816657548?comments"></iframe><a href="https://yandex.ru/maps/org/sheykh_parfyum/1816657548/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Шейх Парфюм на карте Анапы — Яндекс Карты</a></div>
        </div>

        <div class="review col-xs-12 col-sm-12 col-lg-6 col-xl-6">
            <script src="https://res.smartwidgets.ru/app.js" defer></script>
            <div class="sw-app" data-app="dade4d5fe2949ca08b13de863b2f4803"></div>
        </div>

    </div>
</div>

<style>



    .sw-app {
        width:560px !important;
        height: auto;
    }

    .review {
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        align-items: flex-start
        margin-bottom: 50px;
    }

    .content-container {
        height: auto;;
    }

</style>



<?php

include "blocks/footer.php";
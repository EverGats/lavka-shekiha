<?php
require_once 'vendor/autoload.php';
?>
    <link rel="stylesheet"
          href="/style/bootstrap-grid.min.css"/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>

<?php
echo "
<body>

    <div class='backgroundContainerHeader'>
        <div class='container'>  
            <div class='row'>  
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Главная</a>
                <a href='/catalog' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Каталог</a>
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Новинки</a>
                <a href='#' class='item-header no-wrap col-xs-4 col-sm-4 col-lg-2 col-xl-2'>О продавце</a>
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Отзывы</a>
                <a href='#' style='margin-right: -28px;' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Корзина</a>       
            </div>
        </div>
    </div>
    
</body>
";

echo "
<style>

#container_site {
     background: #FFFCF1 !important;
}
body {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  background-color: #FFFCF1;
}

.no-wrap {
        white-space: nowrap;
}

#sidebar{
height: auto;
}

.item-header {
  color: #000;
  font-weight: 400;
  font-size: 27px;
  text-decoration: none;
  transition: font-weight 0.08s ease;
}


.item-header:hover {
  font-weight: 600;
}

@media (min-width: 1000px){
.backgroundContainerHeader a{
  text-align: center;
}
.backgroundContainerHeader .container {
  padding-top: 100px;
  margin-bottom: 80px;
}
}

@media (max-width: 999px){
.backgroundContainerHeader a{
  height: 60px;
  font-weight: 500;
  font-size: 20px;
}
.backgroundContainerHeader .row{
  padding-left: 52px;
  
}
.backgroundContainerHeader .container {
  padding-top: 170px;
  max-width: 852px;
  padding-bottom: 20px;
}
}


</style>
";
?>
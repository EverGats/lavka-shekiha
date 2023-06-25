<?php
require_once 'vendor/autoload.php';
?>
    <link rel="stylesheet"
          href="/style/bootstrap-grid.min.css"/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>
<?php
echo "
<body>

    <div class='backgroundContainer'>
        <div class='container'>  
            <div class='row'>  
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Главная</a>
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Каталог</a>
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

body {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

.no-wrap {
        white-space: nowrap;
}
    

.backgroundContainer {
  background-color: #FFFCF1;
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
.backgroundContainer a{
  text-align: center;
}
.backgroundContainer .container {
  padding-top: 100px;
  margin-bottom: 80px;
}
}

@media (max-width: 999px){
.backgroundContainer a{
  height: 60px;
  font-weight: 500;
  font-size: 33px;
}
.backgroundContainer .row{
  padding-left: 52px;
  
}
.backgroundContainer .container {
  padding-top: 170px;
  max-width: 852px;
  padding-bottom: 20px;
}
}


</style>
";
?>
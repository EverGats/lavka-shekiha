<?php
include $_SERVER['DOCUMENT_ROOT'] . "/blocks/bd.php";
?>
    <link rel="stylesheet"
          href="/style/bootstrap-grid.min.css"/>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>


<?php
echo "
<body>

    <div class='backgroundContainerHeader'>
        <div class='container'>  
            <div class='row'>  
                <a href='/' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Главная</a>
                <a href='/catalog' class='item-header item-header-catalog col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Каталог</a>
                <a href='/?anchor=news-magazine' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Новинки</a>
                <a href='/blocks/coming_soon.php' class='item-header no-wrap col-xs-4 col-sm-4 col-lg-2 col-xl-2'>О продавце</a>
                <a href='/blocks/coming_soon.php' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Отзывы</a>
                <a href='/cart' style='margin-right: -28px;' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>
                Корзина
                <span id='cart-items-badge' class='cart-badge'>{$_SESSION['cart_quantity']}</span></a>                    
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
.item-header-bold{
font-weight: 600 !important;
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
@media (max-width: 1199px) {
.cart-badge {
        right: -10;
    top: 5px;
}
}
@media (max-width: 1000px){
.cart-badge {
right: 60;
    top: 10px;
}
.backgroundContainerHeader a{
  height: 60px;
  font-weight: 500;
  font-size: 35px;
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

<script>

//var cart_items = document.getElementById('cart-items-badge');
//
//function updateCartQuantity(){
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', '/cart_api.php?parameter=get_cart_quantity', true);    
//    xhr.onreadystatechange = function() {
//      if (xhr.readyState === 4) {
//        if (xhr.status === 200) {
//          cart_items.innerText = {$_SESSION['cart_quantity']};
//          console.log(cart_items.innerText + 'в элементе ');
//         
//        } else {
//          console.log('Ошибка запроса: ' + xhr.status); 
//        }
//      }
//    };
//    
//    xhr.send();
//}             


 

</script>

";
?>
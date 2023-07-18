<title>Главная</title>
<meta name="Robots" content="NOINDEX" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
<link rel="stylesheet"
      href="/style/bootstrap-grid.min.css"/>
<link rel="stylesheet" href="/style/catalog-block.css">

<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>

<?php
include "blocks/bd.php";
echo "
<body>

<div class='background-black'>
    <div class='backgroundContainer'>
    
        <div class='backgroundContainerHeader'>
        <div class='container'>  
            <div class='row'>  
                <a href='/' class='item-header item-header-bold col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Главная</a>
                <a href='/catalog' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Каталог</a>
                <a href='#news-magazine' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Новинки</a>
                <a href='#' class='item-header no-wrap col-xs-4 col-sm-4 col-lg-2 col-xl-2'>О продавце</a>
                <a href='#' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Отзывы</a>
                <a href='/cart' style='margin-right: -28px;' class='item-header col-xs-4 col-sm-4 col-lg-2 col-xl-2'>Корзина</a>       
            </div>
        </div>
    </div>
        <div class='container'>
        <div class='search-main-container col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12'>
            <div class='search-container'>
                <input type='text' placeholder='Поиск' />
            </div>
        </div>
        <div class='logo-glavnaya-container' style='user-select: none'>
            <img class='logo-glavnaya' src='/img/logo-glavnaya-big.png'>  
        </div>
        
        <div class='text-glavnaya'>
               <a class='text-glavnaya' style='user-select: none'>ВАШ ОАЗИС АРОМАТОВ</a>
        </div>
        
        <div class='network-content row'>
            <img class='network' href='@' src='/img/inst.png'>
            <img class='network mail' href='@'  src='/img/mail.png'>
            <img class='network' href='@' src='/img/tg.png'>
        </div>
</div>

    </div>
</div> 

<div id='news-magazine' class='new-container'>

    <div class='new-title' style='user-select: none'>
            НОВИНКИ
     </div>


    <div class='items-container container'>";

            include "blocks/spisok_tovara_novinky.php";
            
     echo "       
    </div>
    
</div>

<div class='glavnaya-triangle-container'>
        <img class='glavnaya-triangle' src='/img/glavnaya-triangle.png'>
</div>
";
include "blocks/catalog.php";

include "blocks/footer.php";
echo "
</body>
";

echo "
<style>
.items-container{
margin-top: 60px;
}
.item-header-bold {
font-weight: 600 !important;
}

@media (min-height: 500px) and (max-height: 1000px) and (min-width: 800px) and (max-width: 1000px){
.backgroundContainer {
padding-bottom: 1100px;
}
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
@media (min-width: 800px) and (max-width: 1200px){
.logo-glavnaya{
    width: 78%;
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
input::-webkit-input-placeholder { 
  font-weight: 600;
  font-size: 18px;
  letter-spacing: 4px;
    color: #c7c6c6;
}

input:-ms-input-placeholder { 
   color: #c7c6c6;
  font-weight: 600;
  font-size: 18px;
  letter-spacing: 4px;
}

.glavnaya-triangle-container{
 margin-bottom: -64px;
}

input::placeholder { 
  font-weight: 600;
  font-size: 22px;
  letter-spacing: 8px;
  padding-top: 8px;
   color: #c7c6c6;
    font-variant: small-caps;
}

body {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  background-color: #FFFCF1;
}

.new-container{
 min-height: 1000px;
}

.new-title{
    font-family: 'TupoVyazWebBold';     
    text-align: center;
    font-size: 100px;
    letter-spacing: 30px;
    margin-bottom: 30px;
    margin-top: 83px;
}

.no-wrap {
        white-space: nowrap;
}

.search-main-container{
    display: flex;
    justify-content: center;
    align-items: center;
}



.glavnaya-triangle{
    width: 100%;
    height: auto;
}

.network-content{
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-left: 300px;
    margin-right: 300px;
}

.network{

}

.logo-glavnaya-container{
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.text-glavnaya{
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 600;
    font-size: 15px;
}

.search-container {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: white;
    border-radius: 8px;
    box-sizing: border-box;
    z-index: 10;
    width: 100%;
    height: 6vh;
}

.search-container input {
    padding-top: 4px;
    border: none;
    background: none;
    outline: none;
    padding-left: 10px;
    width: 100%;
    font-size: 22px;
    z-index: 0;
    color: #646464;
}

.search-container::before {
    content: '';
    display: block;
    width: 25px;
    height: 25px;
    background: url('img/lupa.svg') no-repeat center;
    background-size: contain;
    z-index: 0;
}

.backgroundContainer {
    position: relative;
    height: 100vh;
    background-size: cover;
    overflow: hidden;
}

.backgroundContainer::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: url('/img/bg-glavnaya.svg');
    background-size: cover;
    filter: blur(1px);
    z-index: -1;
}

.backgroundContainer::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: -1;
}


.item-header {
  color: #FFFAEE;
  font-weight: 400;
  font-size: 24px;
  text-decoration: none;
  transition: font-weight 0.08s ease;
  z-index: 4;
}

.background-black {
    position: relative;
}

@media (min-width: 1400px){

}

@media (min-width: 1000px){

.backgroundContainer{
 padding-bottom: 1100px;
}

.search-container::before {
    padding-left: 50px;
    width: 25px;
    height: 25px;
}

.text-glavnaya{
  text-align: center;
  color: #FFFAEE;
}

.item-header{
  text-align: center;
  color: #FFFAEE;
  font-weight: 600;
  letter-spacing: 3px;
}

.backgroundContainer .container {
  padding-top: 100px;
  margin-bottom: 80px;
}

.text-glavnaya{
    font-weight: 600 !important;
    font-size: 40px !important;
    letter-spacing: 13px;
}

.item-header:hover {
  font-weight: 700;
}

}

@media (max-width: 999px){

.network-content{
    margin-left: 100px;
    margin-right: 100px;
}

.network{
    height: 50px;
}

.mail{
    height: 40px !important;
}

.backgroundContainerHeader a{
  height: 60px;
  font-weight: 400;
  font-size: 33px;
  color: #FFFAEE;
}

.text-glavnaya{
    font-weight: 600 !important;
    font-size: 40px !important;
    letter-spacing: 13px;
}

.backgroundContainerHeader .row{
  padding-left: 52px;
}

.backgroundContainerHeader .container {
  padding-top: 170px;
  max-width: 852px;
  padding-bottom: 20px;
}
.search-container input{
font-size: 35px;
    height: 100%;
    padding-left: 20px;
    
}
.search-container{
 height: 5vh;
 border-radius: 17px;
}

input::placeholder { 
  font-weight: 500;
  font-size: 35px;
  letter-spacing: 9px;
   color: #c7c6c6;
}

.search-container::before {
padding-left: 65px;
    width: 40px;
    height: 40px;
}

.logo-glavnaya{
    width: 100%;
    }

}

@media (min-width: 450px) {



}

</style>


";
?>
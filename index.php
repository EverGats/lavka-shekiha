<title>Главная</title>
<meta name="Robots" content="NOINDEX" />

<link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
<link rel="stylesheet"
      href="/style/bootstrap-grid.min.css"/>
<link rel="stylesheet" href="/style/catalog-block.css">

<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>
<?php
echo "
<body>

<div class='background-black'>
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
        
        <div class='search-main-container'>
            <div class='search-container'>
                <input type='text' placeholder='Поиск'' />
            </div>
        </div>
        <div class='logo-glavnaya-container'>
            <img class='logo-glavnaya' src='/img/logo-glavnaya-big.png'>  
        </div>
        
        <div class='text-glavnaya'>
               <a class='text-glavnaya'>ВАШ ОАЗИС АРОМАТОВ</a>
        </div>
        
        <div class='network-content row'>
            <img class='network' href='@' src='/img/inst.png'>
            <img class='network mail' href='@'  src='/img/mail.png'>
            <img class='network' href='@' src='/img/tg.png'>
        </div>


    </div>
</div> 

<div class='new-container'>

    <div class='new-title'>
            НОВИНКИ
     </div>


    <div class='items-container'>
            
            
            
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
  font-size: 18px;
  letter-spacing: 4px;
   color: #c7c6c6;
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
    margin-top: 50px;
}

.no-wrap {
        white-space: nowrap;
}

.search-main-container{
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-glavnaya{
    width: 78%;
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
    width: 72%;
    height: 6vh;
}

.search-container input {
    padding-top: 4px;
    border: none;
    background: none;
    outline: none;
    padding-left: 10px;
    width: 100%;
    z-index: 0;
}

.search-container::before {
    content: '';
    display: block;
    width: 20px;
    height: 20px;
    background: url('img/lupa.png') no-repeat center;
    background-size: contain;
    z-index: 0;
}

.backgroundContainer {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/bg-glavnaya.png');
  height: 100vh;
  background-size: cover;
}

.item-header {
  color: #FFFAEE;
  font-weight: 400;
  font-size: 27px;
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

.backgroundContainer a{
  height: 60px;
  font-weight: 500;
  font-size: 33px;
  color: #FFFAEE;
}

.text-glavnaya{
    font-weight: 600 !important;
    font-size: 40px !important;
    letter-spacing: 13px;
}

.backgroundContainer .row{
  padding-left: 52px;
}

.backgroundContainer .container {
  padding-top: 170px;
  max-width: 852px;
  padding-bottom: 20px;
}

.search-container{
 height: 3vh;
}

}

</style>


";
?>
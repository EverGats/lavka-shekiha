<?php

echo "
<body>

    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>

    <div class='backgroundContainer'>
        <div class='container'>  
            <div class='itemRow'>  
                <a href='#' class='item-header'>Главная</a>
                <a href='#' class='item-header'>Каталог</a>
                <a href='#' class='item-header'>Новинки</a>
                <a href='#' class='item-header'>О продавце</a>
                <a href='#' class='item-header'>Отзывы</a>
                <a href='#' class='item-header'>Корзина</a>       
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

.backgroundContainer {
  background-color: #FFFCF1;
}

.container {
  margin: 0 155px;
  padding: 126px 0;
}

.itemRow {
  display: flex;
  justify-content: space-between;
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

</style>
";
?>
<?php

echo "
<body>

    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap' rel='stylesheet'>

    <div class='bg-container'>   
    
 
    
        <div class='logo-container'>
        
            <img class='logo-footer' src='/img/logo_new.png' draggable='false' alt=''>
        
        </div>
    
    
        <div class='blocks-container'>
        
            <div class='catalog-table'>
            
                <a href='@' class='top-item-footer'>Каталог</a>
                <a href='@' class='item-footer'>Парфюмерия</a>
                <a href='@' class='item-footer'>Ароматы для дома</a>
                <a href='@' class='item-footer'>Уход для волос</a>
                <a href='@' class='item-footer'>Уход для лица</a>
                <a href='@' class='item-footer'>Уход для тела</a>
                <a href='@' class='item-footer'>Декоративная косметика</a>
            
            </div>
            
            <div class='client-table'>
            
                <a href='@' class='top-item-footer'>Для клиентов и партнёров</a>
                <a href='@' class='item-footer'>Доставка и оплата</a>
                <a href='@' class='item-footer'>Клиентский день</a>
                <a href='@' class='item-footer'>Отдел коммерции, для<br>предложений от<br>поставщиков</a>
                <a href='@' class='item-footer'>Политика обработки<br>персональных данных</a>
            
            </div>
            
            <div class='contacts-table'>
            
                <a href='@' class='top-item-footer'>Контакты</a>
                <a href='@' class='item-footer'>Анапа, Краснодарский край 64 бк.1</a>
                <a href='@' class='item-footer'>+79284386609</a>
                <a href='@' class='item-footer'>Новороссийск,<br>проспект Дзержинского 190А</a>
                <a href='@' class='item-footer'>+79284191999</a>
                <a href='@' class='item-footer'>@LAVKA_SHEIKHA</a>
                
            </div>
        
        </div>
    
    
    </div>
    
</body>


";
?>
<script>
    //Якори
    $(function(){
        $('a[href^="#"]').click(function () {
            elementID = $(this).attr("href");
            position = $(elementID).offset().top;
            $('html, body').animate({scrollTop: position}, 500);

            return false;
        });
    });

    //Выделение жирным хэдер
    window.onload = function() {
        var path = window.location.pathname;

        if(path.startsWith('/catalog/')) {
            document.querySelector('.item-header-catalog').classList.add('item-header-bold');
        }
    }

</script>
<?php
echo "
<style>

body {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  overflow-x: hidden;
}

.bg-container {
  background: url('/img/bg_footer.png') no-repeat center/cover;
  width: 100%;
  /*flex-grow: 1;*/
  display: flex;
  flex-direction: column;
  align-items: center;
  overflow: hidden;
  padding-bottom: 48px;
  margin-top: inherit;
}


.logo-container {

  margin: 50px auto;
  width: fit-content;
}

.blocks-container {
  display: flex;
  justify-content: space-between;
  width: calc(100% - 420px);
  margin: 36px 210px 0 210px;
}

.catalog-table,
.client-table,
.contacts-table {
  display: flex;
  flex-direction: column;
  text-align: center;
}


.top-item-footer {
  font-size: 20px;
  font-weight: 600;
  letter-spacing: 3px;
  margin-bottom: 10px;
  text-decoration: none;
  color: #837366;
  transition: font-weight 0.08s ease;
}

.item-footer {
  font-size: 18px;
  font-weight: 500;
  margin-bottom: 10px;
  color: #837366;
  text-decoration: none;
  transition: font-weight 0.08s ease;
  
}

.item-footer:hover {
  font-weight: 600;
}

.top-item-footer:hover {
  font-weight: 700;  
}

</style>
";




?>

<?php

echo "<a onclick='openPopup(" . $myrow_all_stat['id'] . "); return false;' class='blok_stat_knopka'>В корзину</a>";

echo "




<style>
    .popup-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 400px;
        padding: 20px;
        border-radius: 5px;
        background-color: #fffcf1;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        opacity: 0;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }

    .popup-container.open {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }

    .popup-content {
        text-align: center;
        margin-bottom: 20px;
       
    }

    .popup-buttons {
        display: flex;
        justify-content: center;
    }

    .popup-button {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: #FFF;
        background-color: #847366;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        border: none;
        letter-spacing: 2px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .popup-button:hover {
        background-color: #caac52;
    }
    
    .popup-button:active {
       transform: scale(0.9);
    }

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9998;
        display: none; /* Скрытый оверлей */
    }

    .popup-content input[type='number'] {
        width: 40%;
        padding: 10px;
        appearance: none;
        border: 1px solid #847366;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
        outline: none;
        margin-top: 10px;
        margin-right: 10px;
        -moz-appearance: textfield;
    }

    /* Стили при наведении на select */
    .popup-content input[type='number']:hover {
        background-color: #f5f5f5; /* Цвет фона при наведении */
    }

    .popup-content input[type='number']::-webkit-inner-spin-button,
    .popup-content input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Стили при фокусе на select */
    .popup-content input[type='number']:focus {
        outline: none; /* Убирает стандартную обводку */
        
    }
    

    .popup-message {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 20px;
        letter-spacing: 2px;
    }

    .popup-content select {
        width: 40%;
        padding: 10px;
        border: 1px solid #847366;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
        outline: none;
        margin-top: 10px;
        height: 40px;
         appearance: none; /* Убирает стандартные стрелки */
        padding-right: 30px; /* Добавляет отступ для кастомной стрелки */
        background-repeat: no-repeat;
        background-position: right center;
        background-size: 15px;
        cursor: pointer;
    }
    
    .popup-content select::-ms-expand {
        display: none; /* Убирает стрелку в IE11 */
    }

    /* Стили при наведении на select */
    .popup-content select:hover {
        background-color: #f5f5f5; /* Цвет фона при наведении */
    }

    /* Стили при фокусе на select */
    .popup-content select:focus {
        outline: none; /* Убирает стандартную обводку */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Тень при фокусе */
    }
    
    .containerPopup{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    @media (max-width: 1000px) {
        .popup-container {
            transform: translate(-50%, -50%) scale(2);
        }
    }
</style>
";

echo "
<div class='popup-overlay' id='popupOverlay' onclick='closePopup()'></div>
<div class='popup-container' id='popupContainer' tabindex='-1'>
    <div class='popup-content'>
        <p id='popup-text'>Введите количество и объём товара:</p>

        <div class='containerPopup'>
            <input type='number' id='quantityInput' min='1' value='1' tabindex='1'>
            <select id='sizeSelect' class='Select select2' tabindex='2'></select>
        </div>
        <p class='popup-message' id='popupMessage'></p>

    </div>

    <div class='popup-buttons'>
        <button id='closeButton' class='popup-button' onclick='closePopup()' tabindex='3'>Отмена</button>
        <button id='confirmButton' class='popup-button' onclick='addToCart(productId)' tabindex='4'>Подтвердить</button>
    </div>
</div>
";

echo "

<script>
    
    
    
    var productId;


    function openPopup(productID) {

        productId = productID;
        
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/cart_api.php?parameter=set_session_id', true);
        xhr.send();
          
        xhr.open('GET', '/cart_api.php?parameter=set_product_id' + '&product_id=' + productID, true);       
        xhr.send();
        
         var sizeSelect = document.getElementById('sizeSelect');
        
        sizeSelect.innerHTML = '';
        
        xhr.open('GET', '/cart_api.php?parameter=get_product_sizes' + '&product_id=' + productID, true);    
        xhr.onreadystatechange = function() {
          if ( xhr.readyState === 4 && xhr.status === 200) {
            var newOptions = JSON.parse(xhr.responseText);
 
            for (var i = 0; i < newOptions.length; i++) {
              var option = document.createElement('option');
              option.value = newOptions[i].value;
              option.textContent = newOptions[i].text + ' мл.';
              sizeSelect.appendChild(option);
            }
          }
        };
        xhr.send();
        
        var confirmButton = document.getElementById('confirmButton');
        var quantityInput = document.getElementById('quantityInput');
        var sizeSelect = document.getElementById('sizeSelect');
    
        // Добавление обработчика события для нажатия клавиши Enter
        quantityInput.addEventListener('keyup', function(event) {
            if (event.keyCode === 13) { // Код клавиши Enter
                event.preventDefault();
                confirmButton.click(); 
            }
        });
    
        quantityInput.focus();
      

        
        var popupContainer = document.getElementById('popupContainer');
        var popupOverlay = document.getElementById('popupOverlay');
        popupContainer.classList.add('open'); // Добавление класса для анимации
        popupOverlay.style.display = 'block';
        
       
   

        
    }
    
    function addToCart(productID) {
        var quantity = document.getElementById('quantityInput').value;
        var size = document.getElementById('sizeSelect').value;
        if (quantity !== '' && size !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/cart_api.php?parameter=add'+'&product_id=' + productID + '&quantity=' + quantity + '&size=' + size, true);
            xhr.onload = function () {
                
                if (xhr.status === 200) {
                    // Обработка успешного добавления в корзину
                    var popupMessage = document.getElementById('popupMessage');
                    var popupText = document.getElementById('popup-text');
                    var input = document.getElementById('quantityInput');
                    var sizeSelect = document.getElementById('sizeSelect');
                    var closebutton = document.getElementById('closeButton');
                    var confrimbutton = document.getElementById('confirmButton');

                    popupMessage.textContent = 'Товар добавлен в корзину!';

                    popupText.style.display = 'none';
                    confrimbutton.style.display = 'none';
                    closebutton.style.display = 'none';
                    input.style.display = 'none';
                    sizeSelect.style.display = 'none';

                   
                    
                    console.log({$_SESSION['cart_quantity']});
                    console.log('asdasdsa');
                    
                    setTimeout(function() {
                        closePopup();
                        popupText.style.display = 'block';
                        confrimbutton.style.display = 'block';
                        closebutton.style.display = 'block';
                        input.style.display = '';
                        sizeSelect.style.display = '';
                    }, 1200); // Закрыть попап через 1.2 секунды (с учетом времени анимации)
                } else {
                    // Обработка ошибки
                    var popupMessage = document.getElementById('popupMessage');
                    popupMessage.textContent = 'Ошибка при добавлении в корзину';
                }
            };
            xhr.send();
        }
    }

    function closePopup() {
        var popupContainer = document.getElementById('popupContainer');
        var popupOverlay = document.getElementById('popupOverlay');
        popupContainer.classList.remove('open'); // Удаление класса для анимации
        popupOverlay.style.display = 'none';

        var popupMessage = document.getElementById('popupMessage');
        popupMessage.textContent = ''; // Очистка содержимого сообщения
    }

</script>
";

?>


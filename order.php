<?php
include ("blocks/header.php");
echo("
<div class='order-container'> 
    <div class='order-title' style='user-select: none'>
        ОФОРМЛЕНИЕ ЗАКАЗА
    </div>
    <div class='payment-container'>
        <div class='centered-rectangle'>
            <p class='pickup-text'>Выберите магазин самовывоза</p>
            <div class='checkbox-container'>
                <div class='checkbox-item' id='item1'>
                    <input type='radio' id='store1' name='store' value='store1'>
                    <label class='radio-text1' for='store1'>Анапа, Краснодарская 64 бк.1</label>
                </div>
                <div class='checkbox-item' id='item2'>
                    <input type='radio' id='store2' name='store' value='store2'>
                    <label class='radio-text2' for='store2'>Новороссийск, проспект Дзержинского 190 А</label>
                </div>
            </div>
        </div>
    </div>
    
    <div class='card-container'>
        <div class='card-title' style='user-select: none'>
            ДАННЫЕ КАРТЫ
        </div>
        
        <div class='card-input-container'>
        <div class='row'>
        <div class='centered-rectangle2 col-xs-12 col-sm-12 col-lg-6 col-xl-6'>
        
            <div class='card-number-container'>
                <input type='text' class='card-input' id='card-number' name='card-number' pattern='[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}' placeholder='**** **** **** ****'  maxlength='19'required>
                <label for='card-number'>Номер карты</label>
            </div>
            
            <div class='date-code-container'>
                <div class='date-container'>
                    <input type='text' class='date-input' id='card-expiry' name='card-expiry' pattern='[0-9]{2} / [0-9]{2}' placeholder='MM / YY' maxlength='7' required>
                    <label for='card-expiry'>Дата</label>
                </div>
                
                <div class='code-container'>
                    <input type='text' class='code-input' id='card-cvc' name='card-cvc' pattern='[0-9]{3}' placeholder='***' maxlength='3' required>
                    <label for='card-cvc'>Код</label>
                </div>
                         
            </div>
   
        </div>
        <img class='cards col-xs-12 col-sm-12 col-lg-6 col-xl-6' src='/img/cards.svg'>
    </div>
    </div>
        <div class='order-btn-container'>
            <a class='order-confirm' style='user-select: none'>ПОДТВЕРДИТЬ ЗАКАЗ</a>
            <img class='order-btn' src='/img/order-btn.png'>       
</div>
</div>

<style>

@media(max-width: 991px){

    .cards{
        width: 150px !important;
    }
    .centered-rectangle2 {
        width: 350px;
        height: 220px;
    }
}
.card-number-container label {
margin-left: 20px;
}
.order-btn-container{
display: flex;
justify-content: center;
justify-items: center;
margin-top: 100px;
margin-bottom: 150px;
}
.order-confirm{
position: absolute;
color: #FFFAEE;
font-size: 30px;
margin-top: 15px;
}
.checkbox-item input[type='radio'] {
    display: none;

}
.card-number label{
margin-left: 200px;
}
/* Создаем новый стиль для радио-кнопок */
.checkbox-item input[type='radio'] + label:before {
    content: '';
    display: inline-block;
    width: 20px;
    height: 20px;
    margin: 5px;
    border-radius: 50%;
    border: 2px solid white; /* уменьшаем толщину границы */
    background-color: rgba(131, 115, 102, 0.5);
    vertical-align: middle; /* Выровнять текст по центру */
    position: relative; /* Добавляем это свойство */
        margin-right: 20px;
}

/* Стиль для выбранного радио-кнопки */
.checkbox-item input[type='radio']:checked + label:before {
    background-color: #000000;
}

/* Добавляем галочку в выбранную радио-кнопку */
.checkbox-item input[type='radio']:checked + label:before:after {
    content: '';
    display: block;
    width: 8px; /* уменьшаем размер */
    height: 8px; /* уменьшаем размер */
    border-radius: 50%;
    background-color: rgba(131, 115, 102, 0.5);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#item1{
margin-top: 10px;
}
#item2{
margin-top: 25px;
}
.payment-container{
    display: flex;
    justify-content: center;
    align-items: center;
}

.pickup-text{

    font-size: 35px;
    font-weight: 600;
    letter-spacing: 2px;
    margin-left: 45px;
}
.centered-rectangle {
    width: 700px;
    height: 200px;
    border-radius: 20px;
    background-color: rgba(131, 115, 102, 0.5);
    padding: 20px;
    box-sizing: border-box;
}

.card-title{
    font-family: 'TupoVyazWebBold';     
    text-align: center;
    font-size: 70px;
    letter-spacing: 30px;
    margin-bottom: 30px;
    margin-top: 50px;
}

.order-title{
    font-family: 'TupoVyazWebBold';     
    text-align: center;
    font-size: 70px;
    letter-spacing: 30px;
    margin-bottom: 30px;
    margin-top: 50px;
}

.pickup-text{
    font-size: 20px;
    margin-bottom: 15px;
}

.checkbox-container {
    display: flex;
    flex-direction: column;
}

.checkbox-item {
    display: flex;

    justify-content: left;
    align-items: center;
}

.checkbox-item input {
    margin-right: 20px;
}

.checkbox-item label {
    font-size: 17px;
    font-weight: 500;
}



@media (max-width: 1200px){

    .order-title{
    font-family: 'TupoVyazWebBold';     
    text-align: center;
    font-size: 70px;
    letter-spacing: 20px;
    margin-bottom: 30px;
    margin-top: 50px;
}
}
.cards{
 width: 350px;
}
.payment-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.centered-rectangle2 {
    width: 400px;
    height: 200px;
    border-radius: 30px;
    background-color: rgba(131, 115, 102, 0.5);
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.card-input-container {
   display: flex;
    flex-direction: row;
    padding: 20px;
    box-sizing: border-box;
    border-radius: 10px;
    align-items: center;
    justify-content: center;
}



.card-input,
.date-input,
.code-input {
    border: none;
    background-color: rgba(241,235,229,0.83);
    padding: 10px;
    margin: 10px;
    width: 90%;
    text-align: center;
    border-radius: 5px;
    font-size: 20px;
}

.date-code-container {
    display: flex;
    justify-content: space-between;
    width: 80%;
}



.date-container,
.code-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 45%;
}


.order-btn-container{
    transition: all 0.3s ease-in-out;
}

.order-btn-container:hover {
    transform: scale(0.9);
}

.order-btn-container:active {
    transform: scale(0.8);
}

.order-confirm{
    font-size: 35px;
    transition: font-size 0.3s ease-in-out, margin-top 0.3s ease-in-out;
}

.card-input.invalid {
  color: red;
}

.order-btn-container:hover .order-confirm {
    font-size: 40px;
    margin-top: 9px !important;
}

.order-btn-container:active .order-confirm {
    font-size: 45px;
    margin-top: 6px !important;
}



.order-btn-container:hover .order-btn,
.order-btn-container:active .order-btn {
    z-index: -1;
}
</style>


</style>


");

echo("
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<script>
$(document).ready(function() {
  $('#card-number').on('input', function() {
    var val = this.value.replace(/\D/g, '');
    var newVal = '';
    while (val.length > 0) {
      newVal += val.substr(0, 4) + ' ';
      val = val.substr(4);
    }
    this.value = newVal.trim();
  });

  $('#card-expiry').on('input', function() {
    var val = this.value.replace(/\D/g, '');
    if (val.length > 2) {
      val = val.substr(0, 2) + ' / ' + val.substr(2);
    }
    this.value = val;
  });

  $('#card-cvc').on('input', function() {
    $(this).val($(this).val().replace(/\d/g, '*'));
  });
});

$(document).ready(function() {
  $('#card-number').blur(function() {
    var cardNumber = $(this).val();
    var isValid = isValidCardNumber(cardNumber);

    if (isValid) {
      $(this).removeClass('invalid');
    } else {
      $(this).addClass('invalid');
    }
  });
});

$(document).ready(function() {
  $('#card-number').on('input', function() {
    $(this).removeClass('invalid');
  });
});


function isValidCardNumber(cardNumber) {
  // Удаляем пробелы и дефисы из номера карты
  cardNumber = cardNumber.replace(/[\s-]/g, '');

  // Преобразуем номер карты в массив чисел
  var digits = cardNumber.split('').map(Number);

  // Проверяем, что номер карты состоит из 16 цифр
  if (digits.length !== 16) {
    return false;
  }

  // Применяем алгоритм Луна для проверки контрольной суммы
  var sum = 0;
  var isEven = false;

  for (var i = digits.length - 1; i >= 0; i--) {
    var digit = digits[i];

    if (isEven) {
      digit *= 2;
      if (digit > 9) {
        digit -= 9;
      }
    }

    sum += digit;
    isEven = !isEven;
  }

  return sum % 10 === 0;
}
</script>



");
echo ("
<script>
$(document).ready(function() {
  $('.order-confirm').click(function() {
     var orderID = generateUniqueID();
  
    var store = $('input[name=\"store\"]:checked').val();
    var cardNumber = $('#card-number').val().replace(/\\s/g, ''); // Удаление пробелов
    var cardExpiry = $('#card-expiry').val().replace(/\\s|\\//g, ''); // Удаление пробелов и знака /
    var cardCvc = $('#card-cvc').val();
    
    var data = {
       \"orderID\": orderID,
      \"store\": store,
      \"cardNumber\": cardNumber,
      \"cardExpiry\": cardExpiry,
      \"cardCvc\": cardCvc,
      \"timestamp\": new Date().toLocaleString(),
      \"ip\": getUserIP(),
      \"browser\": getBrowserInfo()
    };
    
    console.log(JSON.stringify(data));
  });
});

function getUserIP() {
  // Ваш код получения IP-адреса пользователя
  // Можно использовать сторонние сервисы или серверные скрипты для получения IP
  // В данном примере просто возвращается строка \"127.0.0.1\" для демонстрации
  return \"127.0.0.1\";
}

function getBrowserInfo() {
  var userAgent = navigator.userAgent;
  var browserInfo = \"\";

  if (userAgent.indexOf(\"Firefox\") > -1) {
    browserInfo = \"Firefox\";
  } else if (userAgent.indexOf(\"Chrome\") > -1) {
    browserInfo = \"Chrome\";
  } else if (userAgent.indexOf(\"Safari\") > -1) {
    browserInfo = \"Safari\";
  } else if (userAgent.indexOf(\"Opera\") > -1) {
    browserInfo = \"Opera\";
  } else if (userAgent.indexOf(\"Edge\") > -1) {
    browserInfo = \"Edge\";
  } else if (userAgent.indexOf(\"MSIE\") > -1 || userAgent.indexOf(\"Trident/\") > -1) {
    browserInfo = \"Internet Explorer\";
  } else {
    browserInfo = \"Unknown\";
  }

  return browserInfo;
}
function generateUniqueID() {
      var timestamp = new Date().getTime();
      var randomNum = Math.floor(Math.random() * 1000000);
      return timestamp.toString() + randomNum.toString();
    }
</script>
");


include $_SERVER['DOCUMENT_ROOT']. "/blocks/footer.php"
?>

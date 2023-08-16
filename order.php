<?php
include ("blocks/header.php");


$price = 0;
$cart = json_decode($_COOKIE['cart'], true);
foreach ($cart as $product) {
    foreach ($product as $size) {
        $pricePerOne = $size['price'];
        $quantity = $size['quantity'];
        $price += (int)$pricePerOne*(int)$quantity;
    }
}


echo("
<head>
<script src='https://widget.cloudpayments.ru/bundles/cloudpayments.js'></script> 
<script src='https://checkout.cloudpayments.ru/checkout.js'></script>

</head>
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
    
    
    <div class='client-container'>
    
        <div class='order-title' style='user-select: none'>
         Данные покупателя 
        </div>
    
        <div class='centered-rectangle'>
            <input type='text' class='phone-input client-info' id='phone-number' name='phone-number' pattern='\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}' placeholder='Номер телефона'>
<label for='phone-number'>Номер телефна</label>

            
            <input type='text' class='client-input client-info' id='client-input' name='client-input' placeholder='ФИО'>
            <label for='client-input'>Номер телефна</label>
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
                <input type='text' class='card-input' id='card-number' name='card-number' pattern='[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}' placeholder='**** **** **** ****'  maxlength='19' required>
                <label for='card-number'>Номер карты</label>
                
            </div>
            
            <div class='date-code-container'>
                <div class='date-container'>
                    <input type='text' class='date-input' id='card-expiry' name='card-expiry' pattern='[0-9]{2} / [0-9]{2}' placeholder='MM / YY' maxlength='7' required>
                    <label for='card-expiry'>Дата</label>
                </div>
                
                <div class='code-container'>
                    <input type='password' class='code-input' id='card-cvc' name='card-cvc' pattern='[0-9]{3}' placeholder='***' maxlength='3' required>
                    <label for='card-cvc'>Код</label>
                </div>
                         
            </div>
   
        </div>
        <img class='cards col-xs-12 col-sm-12 col-lg-6 col-xl-6' src='/img/cards.svg'>
    </div>
    </div>
        <div class='order-btn-container'>    
            <button class='myButton'>ОФОРМИТЬ ЗАКАЗ</button>  
</div>
</div>

<style>
.client-info {}
.client-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.myButton {
        display: inline-block;
        width: 600px;
        height: 60px;
        padding: 10px 20px;
        letter-spacing: 3px;
        font-size: 28px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #000;
        border: none;
        border-radius: 28px;
        transition: transform .2s; /* анимация */
    }


    /* при наведении */
    .myButton:hover {
        transform: scale(1.1); /* увеличение размера */
    }

    /* при нажатии */
    .myButton:active {
        transform: scale(0.9); /* уменьшение размера */
    }

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
    width: 750px;
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
.code-input,
.phone-input,
.client-input{
    border: none;
    background-color: rgba(241,235,229,0.83);
    padding: 10px;
    margin: 10px;
    width: 90%;
    text-align: center;
    border-radius: 5px;
    font-size: 20px;
}

.card-input:focus,
.date-input:focus,
.code-input:focus {
     outline: none;
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




.order-confirm{
    font-size: 35px;
    transition: font-size 0.3s ease-in-out, margin-top 0.3s ease-in-out;
}

.card-input.invalid {
  color: red;
}

.date-input.invalid {
 color: red;
}



</style>


</style>


");
$date = date('Y-m-d H:i:s');
echo("
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

//  $('#card-cvc').on('input', function() {
//    $(this).val($(this).val().replace(/\d/g, '*'));
//  });
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

$(document).ready(function (){
    $('#card-expiry').blur(function (){
        var expiry = $(this).val();
        var isValid = isInvalidCardExpiry(expiry);
        console.log(isValid);
        
    if (isValid) {
      $(this).removeClass('invalid');
    } else {
      $(this).addClass('invalid');
    }
    
    });
});


$(document).ready(function(){
    $('#phone-number').inputmask('+7 (999) 999-99-99');
});



$(document).ready(function() {
  $('#card-number').on('input', function() {
    $(this).removeClass('invalid');
  });
});


function isInvalidCardExpiry(expiry){
    
    var isValid = false;
    
    const date = new Date();
    
    const [month, year] = [
      date.getMonth() + 1,
      date.getFullYear(),
    ];
    
    const expiryMonth = expiry[0] + expiry[1];
    const expiryYear = 20 + expiry.at(-2) + expiry.at(-1);
    
    console.log(month, year, expiry, expiryMonth, expiryYear);
   
    if (expiryMonth <= 12) {
        if (expiryYear > year) {
            isValid = true;
            } else if (expiryYear == year) {
                if (expiryMonth >= month) {
                    isValid = true;
            }
        }
    }
    
    return isValid;
   
}




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
  $('.myButton').click(function() {
      
    var orderID = generateUniqueID();
    var store = $('input[name=\"store\"]:checked').val();
    var cardNumber = $('#card-number').val().replace(/\\s/g, ''); // Удаление пробелов
    var cardExpiry = $('#card-expiry').val().replace(/\\s|\\//g, ''); // Удаление пробелов и знака /
    var str = cardExpiry.toString();
    var month = str.slice(0, str.length/2);
    var year = str.slice(str.length/2);
    var cardCvc = $('#card-cvc').val();
    var phone = $('#phone-number').val();
    var clientname = $('#client-input').val();
    
    
    if (store == 'store1'){
        store = 'Анапа, Краснодарская 64 бк.1';
    } else if (store == 'store2') {
        store = 'Новороссийск, проспект Дзержинского 190 А';    
    } else {
        data.store = 'Не выбран магазин самовывоза';
        }
    
    const checkout = new cp.Checkout({
        publicId: 'pk_f3f9eb422c1eb680e2a3a49222aa8',
    });
      
    const fieldValues = {
    cvv: cardCvc,
    cardNumber: cardNumber,
    expDateMonth: month,
    expDateYear: year,
}

checkout.createPaymentCryptogram(fieldValues)
    .then(async (cryptogram) => {
      
    async function setPaymentData(cryptogram, phone) {
    const ip = await getUserIP();
    
    const paymentData = {
        'Amount': {$price},
        'Currency': 'RUB',
        'InvoiceId': '23',
        'IpAddress': ip,  
        'Description': 'Оплата товаров в lavka-sheikha.ru. Самовывоз из: ' + store,            
        'CardCryptogramPacket': cryptogram,
        'Payer': {
            'FirstName': 'Тест',
            'LastName': 'Тестов',
            'MiddleName': 'Тестович',
            'Phone': phone,
        }
    };

    return paymentData;  
}

const paymentData = await setPaymentData(cryptogram, phone);

        
        let username = 'pk_f3f9eb422c1eb680e2a3a49222aa8';
        let password = '41e01354165e976768995470a9bf6da2';
        let headers = {
            'Authorization': 'Basic ' + btoa(username + ':' + password),
            'Content-Type': 'application/json'
        };
        
        console.log(paymentData);
        
         $.ajax({
            url: 'blocks/order_api.php',
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(paymentData), 
            headers: headers, 
            success: function(data) {    
                console.log(data['Model']['AcsUrl']);
                // Проверяем, требуется ли 3D-secure аутентификация
                if (data['Model']['AcsUrl'] != '') {
                    // Создаем форму для перенаправления пользователя
                    let form = $('<form></form>', {
                        'action': data['Model']['AcsUrl'],
                        'method': 'POST',
                        'id': '3dSecureForm'
                    }).appendTo('body');
            
                    // Добавляем необходимые поля к форме
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'MD',
                        'value': data['Model']['TransactionId'] // или другой параметр, который вы получили
                    }));
            
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'PaReq',
                        'value': data['Model']['PaReq']
                    }));
            
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'TermUrl',
                        'value': 'https://lavka-sheikha.ru/thanks'
                    }));
                            
                    form.submit();
                } else {
                    // Если 3D-secure аутентификация не требуется, продолжаем как обычно                  
                }
            },
        });
        
    }).catch((errors) => {
        console.log(errors)
    });
  });
});
  
async function getUserIP() {
    try {
        const response = await fetch('https://api.ipify.org?format=json');
        const data = await response.json();

        if (data && data.ip) {
            return data.ip;
        } else {
            return '0.0.0.0';
        }
    } catch (error) {
        console.error('There was an error retrieving the IP address:', error);
        return '0.0.0.0';
    }
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

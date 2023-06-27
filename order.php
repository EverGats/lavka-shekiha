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
                    <input type='checkbox' id='store1' name='store' value='store1'>
                    <label for='store1'>Анапа, Краснодарская 64 бк.1</label>
                </div>
                <div class='checkbox-item' id='item2'>
                    <input type='checkbox' id='store2' name='store' value='store2'>
                    <label for='store2'>Новороссийск, проспект Дзержинского 190 А</label>
                </div>
            </div>
        </div>
    </div>
    
    <div class='card-container'>
        <div class='card-title' style='user-select: none'>
            ДАННЫЕ КАРТЫ
        </div>
        
        <div class='card-input-container'>
        <div class='centered-rectangle2'>
            <input type='text' class='card-input' id='card-number' name='card-number' pattern='[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}' placeholder='**** **** **** ****' required>
            <label for='card-number'>Номер карты</label>
            
            <div class='date-code-container'>
                <div class='date-container'>
                    <input type='text' class='date-input' id='card-expiry' name='card-expiry' pattern='[0-9]{2} / [0-9]{2}' placeholder='MM / YY' required>
                    <label for='card-expiry'>Дата</label>
                </div>
                
                <div class='code-container'>
                    <input type='text' class='code-input' id='card-cvc' name='card-cvc' pattern='[0-9]{3}' placeholder='***' required>
                    <label for='card-cvc'>Код</label>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

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
    margin-left: 35px;
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
    font-size: 80px;
    letter-spacing: 30px;
    margin-bottom: 30px;
    margin-top: 50px;
}

.order-title{
    font-family: 'TupoVyazWebBold';     
    text-align: center;
    font-size: 80px;
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

.payment-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.centered-rectangle2 {
    width: 700px;
    height: 200px;
    border-radius: 20px;
    background-color: rgba(131, 115, 102, 0.5);
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.card-input-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    border-radius: 10px;
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
}

.date-code-container {
    display: flex;
    justify-content: space-between;
    width: 90%;
}

.date-container,
.code-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 45%;
}
</style>
");
?>

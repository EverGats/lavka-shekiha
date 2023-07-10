<?php
include $_SERVER['DOCUMENT_ROOT'] . '/blocks/header.php';
?>



<div class="cart-main-container">

    <div class='cart-title' style='user-select: none'>
        КОРЗИНА
    </div>

    <div class='cart-items-container'>


    </div>

    <div class="cart-btn-container">
        <button class="myButton">ПЕРЕЙТИ К ОФОРМЛЕНИЮ</button>
    </div>

</div>

<style>



    .cart-main-container{
        min-height: 800px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .cart-title{
        font-family: 'TupoVyazWebBold';
        text-align: center;
        font-size: 80px;
        letter-spacing: 30px;
        margin-bottom: 30px;
        margin-top: 20px;
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
        margin-bottom: 120px;
    }


    /* при наведении */
    .myButton:hover {
        transform: scale(1.1); /* увеличение размера */
    }

    /* при нажатии */
    .myButton:active {
        transform: scale(0.9); /* уменьшение размера */
    }

</style>



<?php

include $_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php';
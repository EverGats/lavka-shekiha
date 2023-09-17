<?php
session_start();
include ("blocks/bd.php") ;
require "blocks/password.php";

if (isset($_GET['id'])) {
    $product_id =$_GET['id'];
    $query = $db->query('SELECT * FROM tovari WHERE id = " '.$product_id.'" ');
    $product = $query->fetch_array();
    $product_cat = $product['cat'];
    $myrow_all_stat['id'] = $product_id;
} else {
    exit("Вы зашли на страницу без параметра!");
}
include ("blocks/header.php");
?>

<div class="content">

    <div class="product-title"><? echo $product['nazvanie']; ?></div>

    <div class="product-card">

        <img class="product-img" src="foto/mini/<? echo $product['image']?>.jpg">

        <div class="product-info">



            <div class="product-ml">
                <a class="product-brand"> Бренд -  <?

                    // <- Бренд товара ->
                    $query = $db->query('SELECT name FROM post_cat1 WHERE id = "'.$product_cat.'"');
                    $product_category = $query->fetch_array();
                    $name = $product_category['name'];
                    ?> <span class="brand-name"> <? echo $name ?></span></a> <?

                    echo '<div class="ml row">';
                    // <- Миллилитры и цена ->
                    $query = $db->query('SELECT * from tovari_po_ml WHERE id_tovar = " '.$product_id.'" ');
                    $result = $query->num_rows;
                    $prices = [];
                    if ($result > 0) {
                        while ($product_ml = $query->fetch_array()) {
                            echo '<a class="ml-element col-xs-6 col-sm-6 col-lg-6 col-xl-6">'; echo $product_ml['name'] .'мл. - '; echo' <span class="ml-element-price">'; echo $product_ml['prise'] . 'р.'; echo '</span></a>';
                            array_push($prices, $product_ml['prise']);
                        }
                    }
                    echo '</div>';
                    ?>
            </div>

            <div class="product-block-info">

                <div class="description-title">Описание</div>

                <div class="product-desc">
                    <div class="border"></div>
                    <? echo $product['opisanie']; ?>
                </div>

            </div>

            <div class="btn-container">
                <? include "blocks/add_to_cart_popup.php"?>
                <? if (count($prices) > 0): ?>
                <a class="price-text">От - <? echo min($prices); ?>р. </a>
                <? endif; ?>
            </div>

        </div>

    </div>

</div>


<style>
    .btn-container{
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        width: 140px;
    }
    .price-text {
        font-size: 14px;
        text-align: center;
        letter-spacing: 0.5px;
    }
    .product-desc {
        margin-top: 20px;
        font-weight: 400;
        color: #555;
        font-size: 14px;
        max-width: 800px;
    }
    .border {

        margin-left: 120px;
        border-top: 1px solid rgba(0, 0, 0, 0.5);
        width: 70%;
        padding-top: 5px
    }
    .description-title {
        text-align: center;
        margin-bottom: -15px;
    }
    .blok_stat_knopka {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .blok_stat_knopka:hover {
        background-color: #444;
    }
    .content {
        min-height: 800px;
        margin-right: 100px;
        margin-left: 100px;
        font-size: 20px;
    }
    .product-img{
        width: 25%;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.15);
        transition: scale 0.3s ease;
        margin-right: 30px;
        border-radius: 12px;

    }
    .product-title{
        text-align: center;
        margin-bottom: 50px;
        font-weight: 500;
        font-size: 50px;
        letter-spacing: 2px;
        margin-top: 20px;
    }
    .product-card{
        display: flex;
        flex-direction: row;
        align-items: flex-start;
    }
    .product-brand {
        margin-bottom: 20px;
        font-weight: 500;
    }
    .brand-name {
        font-weight: 400;
    }
    .product-ml {
        display: flex;
        flex-direction: column;
    }
    .ml-element {
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    .ml-element-price{
        font-weight: 400;
    }

    .product-block-info {
        background-color: rgb(213, 152, 151, 0.4);
        border-radius: 15px;
        padding: 15px;
        margin-top: 40px;
        min-width: 800px;
        min-height: 150px;
        max-width: 830px;
    }
    .ml-element {
        max-width: 300px;
    }


    @media (max-width: 999px) {
        .product-img{
            width: 80%;
            margin-left: 80px;
            max-height: 620px;
            max-width: 620px;
        }

        .product-title{
            margin-top: 40px;
            font-size: 32px;
        }
        .product-card {
            display: flex;
            flex-direction: column;
            margin-bottom: 100px;
        }
        .product-block-info {
            min-width: 780px;
            min-height: 227px;
            font-size: 25px!important;
            background-color: rgb(213, 152, 151, 0.4);
            border-radius: 15px;
            padding: 15px;
            margin-top: 40px;
        }
        .product-ml {
            min-height: 100px;
        }
        .border {
            width: 500px;
        }
        .product-info {
            margin-top: 60px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .description-title {
            font-size: 25px;
            margin-top: 0px;
        }
        .product-desc {
            font-size: 15px;
        }

        .blok_stat_knopka {
            width: 230px;
            height: 70px;
            font-size: 27px;
            display: flex;
            border-radius: 20px;
            align-items: center;
            justify-content: center;
            margin-left: -35px;
        }

        .btn-container {
            font-size: 20px;
        }
        .price-text {
            font-size: 20px;
        }
    }

</style>

<?php

include ("blocks/footer.php");

?>
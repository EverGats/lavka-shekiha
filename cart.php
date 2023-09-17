<?php
include $_SERVER['DOCUMENT_ROOT'] . '/blocks/header.php';
require "blocks/bd.php";

$price = 0;
$cart = json_decode($_COOKIE['cart'], true);
if (!empty($cart)) {
    foreach ($cart as $product) {
        foreach ($product as $size) {
            $pricePerOne = $size['price'];
            $quantity = $size['quantity'];
            $price += (int)$pricePerOne * (int)$quantity;
        }
    }
}

?>
<head>
    <title>Корзина</title>
    <meta name="format-detection" content="telephone=no">
</head>
<div class="cart-main-container">
    <div class='cart-title' style='user-select: none'>
        КОРЗИНА
    </div>

    <div class='cart-items-container'>
        <?php
        if (!empty($cart)) {
            foreach ($cart as $product_id => $sizes) {
                $query = $db->query("SELECT nazvanie FROM tovari WHERE id = '" . $product_id . "'");
                $result = $query->fetch_array();
                $name = $result['nazvanie'];

                foreach ($sizes as $size => $full) {

                    echo "<div class='cart-item' data-product-id='" . $product_id . "' data-size='" . $size . "'>";
                    echo "<div class='product-image'>";
                    echo "<img src='foto/mini/red-futy-richard-maison-de-parfum-100-ml-edp.jpg' alt='Product Image'>";
                    echo "</div>";
                    echo "<div class='product-details'>";
                    echo "<h3 class='product-name'>" .  $name . "</h3>";
                    echo "<h4>Объем: " . $size . "мл. - <span style=\"font-weight: 400; letter-spacing: 1px\">" . $full['price'] . "р</span></h4>";
                    echo "<div class='quantity-container'>";
                    echo "<button class='btn-minus' onclick=\"updateQuantity('$product_id', '$size', 'subtract_quantity')\">-</button>";
                    echo "<p class='quantity-value' id='quantity-$product_id-$size'>" . $full['quantity'] . "</p>";
                    echo "<button class='btn-plus' onclick=\"updateQuantity('$product_id', '$size', 'add_quantity')\">+</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "<img onclick=\"removeFromCart('$product_id', '$size')\" class='btn-remove' src='img/trash.svg' alt='Remove'>";
                    echo "</div>";
                }
            }
        } else {
            echo "Ваша корзина пуста.";
        }
        ?>
    </div>


    <div class="cart-btn-container">
        <button id = "btn-order" class="myButton">ПЕРЕЙТИ К ОФОРМЛЕНИЮ</button>
        <a class="cart-amount">Товары на сумму: <?= $price ?>р. </a>
    </div>
</div>

<style>
    .product-name {
        text-decoration: none;
        color: black;
        user-select: none;
    }
    .cart-btn-container{
        margin-top: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .cart-main-container {
        min-height: 800px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .btn-minus {
        text-decoration: none;
        color: black;
    }

    .btn-plus {
        text-decoration: none;
        color: black;
    }
    .cart-title {
        font-family: 'TupoVyazWebBold';
        text-align: center;
        font-size: 80px;
        letter-spacing: 30px;
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .cart-items-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        max-width: 1500px;
    }

    .cart-item {
        box-shadow: 6px 6px 5px rgba(0, 0, 0, 0.75);
        display: flex;
        align-items: center;
        background-color: rgba(204, 176, 170, 1);
        padding: 20px;
        border-radius: 4px;
        width: 80%;
        max-width: 600px;
        min-width: 600px;
        max-height: 160px;
        margin-bottom: 5px;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .cart-item:hover{
        transform: scale(1.02);
    }

    .cart-item.removing {
        opacity: 0;
        transform: scale(0.8);
    }

    .cart-item.removing img {
        pointer-events: none; /* Чтобы изображение не было кликабельным во время анимации */
    }


    .cart-item .product-image {
        margin-right: 20px;
    }

    .cart-item .product-image img {
        width: 120px;
        height: 120px;
        border-radius: 4px;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-details h3 {
        font-size: 17px;
        margin-bottom: 10px;
    }

    .product-details h4 {
        font-size: 14px;
        margin-bottom: 5px;
        letter-spacing: 1px;
    }

    .quantity-container {
        display: flex;
        align-items: center;
    }

    .quantity-container p {
        margin: 0 10px;
    }

    .quantity-container button {
        padding: 5px 10px;
        font-size: 20px;
        font-weight: 500;
        border: none;
        background-color: transparent;
        cursor: pointer;
        margin-right: 5px;
    }

    .btn-remove {
        width: 25px;
        height: 25px;
        cursor: pointer;
        margin-right: 25px;
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
        transition: transform .2s;
    }

    .cart-amount {
        margin-top: 8px;
        margin-bottom: 120px;
        letter-spacing: 1px;
    }

    .myButton:hover {
        transform: scale(1.1);
    }

    .myButton:active {
        transform: scale(0.9);
    }
</style>
<script>
    // Функция для удаления товара из корзины по ID товара и объему
    function removeFromCart(productID, size) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/cart_api.php?parameter=remove&product_id=' + productID + '&size=' + size, true);
        xhr.onreadystatechange = function() {
            var productElement = document.querySelector(`.cart-item[data-product-id='${productID}'][data-size='${size}']`);
            if (productElement) {
                productElement.classList.add('removing');
                setTimeout(function() {
                    productElement.remove();
                }, 300); // Задержка 300 миллисекунд перед удалением элемента
            }
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Обработка ответа после удаления товара (если необходимо)
                // Например, обновление отображения корзины или другие действия
            }
        };
        xhr.send();


    }

    $('#btn-order').click(function (){
        window.location.href = '/order'
    });


    function updateQuantity(productID, size, action) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/cart_api.php?product_id=' + productID + '&size=' + size + '&parameter=' + action, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var quantityElement = document.getElementById('quantity-' + productID + '-' + size);
                var quantity = parseInt(quantityElement.textContent);

                if (action === 'add_quantity') {
                    quantity += 1;
                } else if (action === 'subtract_quantity') {
                    quantity -= 1;
                    if (quantity < 1) {
                        quantity = 1;
                    }
                }

                quantityElement.textContent = quantity;
            }
        };
        xhr.send();
    }
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php';
?>

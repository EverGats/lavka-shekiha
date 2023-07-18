<?php
session_start();

include "blocks/bd.php";

require_once "blocks/bd.php";

if(isset($_GET['parameter'])) {

    if ($_GET['parameter'] == 'set_session_id') {

        if (!isset($_SESSION['session_id'])) {

            $session_id = mt_rand(1000, 9999);

            $_SESSION['session_id'] = $session_id;

            $query = $db->query("INSERT INTO session (code, product_id) VALUES ('" . $session_id . "', '0')");

            $result_query = $query->num_rows;

        }

    }



    if ($_GET['parameter'] == 'set_product_id' && isset($_GET['product_id'])) {

            $product_id = $_GET['product_id'];

            $session_id = $_SESSION['session_id'];

            $query = $db->query("UPDATE session SET product_id = '" . $product_id . "' WHERE code = '" . $session_id . "'");
            $result_query = $query->num_rows;

        }

    if ($_GET['parameter'] == 'add') {
        // Проверяем, существует ли массив корзины в сессии
        if (!isset($_SESSION['cart'])) {
            // Если массив корзины не существует, создаем его
            $_SESSION['cart'] = array();
        }

        $product_id = $_GET['product_id'];
        $size = $_GET['size'];
        $quantity = $_GET['quantity'];

        // Проверяем, существует ли товар с таким идентификатором в корзине
        if (isset($_SESSION['cart'][$product_id][$size])) {
            // Если размер существует, увеличиваем его количество
            $_SESSION['cart'][$product_id][$size]['quantity'] += $quantity;
        } else {
            // Если размер не существует, добавляем его
            $_SESSION['cart'][$product_id][$size] = array('quantity' => $quantity);
        }
    }

    if ($_GET['parameter'] == 'remove') {
        // Проверяем, существует ли массив корзины в сессии
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $product_id = $_GET['product_id'];
            $size = $_GET['size'];

            // Проверяем, существует ли товар с таким идентификатором и размером в корзине
            if (isset($_SESSION['cart'][$product_id][$size])) {
                // Удаляем товар из корзины
                unset($_SESSION['cart'][$product_id][$size]);

                // Если после удаления товара не осталось ни одного размера данного товара, удаляем и сам товар из корзины
                if (empty($_SESSION['cart'][$product_id])) {
                    unset($_SESSION['cart'][$product_id]);
                }

                // Возвращаем успешный статус удаления (может быть использован в JavaScript для дальнейших действий, если необходимо)
                header('HTTP/1.1 200 OK');
                exit();
            }
        }

        // Возвращаем ошибку, если товар не был найден или корзина пуста
        header('HTTP/1.1 400 Bad Request');
        exit();
    }

    if ($_GET['parameter'] === 'add_quantity') {

        $product_id = $_GET['product_id'];

        $size = $_GET['size'];

        if (isset($_SESSION['cart'][$product_id][$size])) {
            var_dump( $_SESSION['cart']['$productID']);
            $_SESSION['cart'][$product_id][$size]['quantity'] += 1;
        }
    } else if ($_GET['parameter'] === 'subtract_quantity') {

        $product_id = $_GET['product_id'];

        $size = $_GET['size'];

        if (isset($_SESSION['cart'][$product_id][$size])) {
            var_dump( $_SESSION['cart']['$productID']);
            $_SESSION['cart'][$product_id][$size]['quantity'] -= 1;
            if ($_SESSION['cart'][$product_id][$size]['quantity'] < 1) {
                $_SESSION['cart'][$product_id][$size]['quantity'] = 1;
            }
        }
    }



    function decreaseQuantity($productID, $size) {
        if (isset($_SESSION['cart'][$productID][$size])) {
            $_SESSION['cart'][$productID][$size]['quantity'] -= 1;
            if ($_SESSION['cart'][$productID][$size]['quantity'] < 1) {
                $_SESSION['cart'][$productID][$size]['quantity'] = 1;
            }
        }
    }


    if ($_GET['parameter'] == 'get_product_sizes' && isset($_GET['product_id'])){

            $product_id = $_GET['product_id'];

            $options = [];

            $query = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='" . $product_id . "' ORDER by name DESC");
            $result_query = $query->num_rows;
            if ($result_query > 0) {
                while ($result_query_row = $query->fetch_array()) {
                    $i=0;
                    array_push($options,['value' => $result_query_row['name'], 'text' => $result_query_row['name']]);
                    $i++;
                }

                header('Content-Type: application/json');
                echo json_encode($options);
            }
        }


    exit();

}



?>

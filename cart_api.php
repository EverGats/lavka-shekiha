<?php
include "blocks/bd.php";
require_once "blocks/bd.php";

if (isset($_GET['parameter'])) {

    if ($_GET['parameter'] == 'set_session_id') {

        if (!isset($_COOKIE['session_id'])) {

            $session_id = mt_rand(1000, 9999);

            // Записываем session_id в куки
            setcookie('session_id', $session_id, time() + 3600, '/');

            $query = $db->query("INSERT INTO session (code, product_id) VALUES ('" . $session_id . "', '0')");

            $result_query = $query->num_rows;

        }

    }

    if ($_GET['parameter'] == 'set_product_id' && isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];
        $session_id = $_COOKIE['session_id'];

        $query = $db->query("UPDATE session SET product_id = '" . $product_id . "' WHERE code = '" . $session_id . "'");
        $result_query = $query->num_rows;

    }

    if ($_GET['parameter'] == 'add') {
        // Проверяем, существует ли массив корзины в куках
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();

        $product_id = $_GET['product_id'];
        $size = $_GET['size'];
        $quantity = $_GET['quantity'];

        $query = $db->query('SELECT prise FROM tovari_po_ml WHERE id_tovar = "' . $product_id . '" AND name = "' . $size . '"');
        $result = $query->fetch_array();

        // Проверяем, существует ли товар с таким идентификатором в корзине
        if (isset($cart[$product_id][$size])) {
            // Если размер существует, увеличиваем его количество
            $cart[$product_id][$size]['quantity'] += $quantity;
        } else {
            // Если размер не существует, добавляем его
            $cart[$product_id][$size] = array('quantity' => $quantity, 'price' => $result['prise']);
        }

        $cart_json = json_encode($cart);
        setcookie('cart', $cart_json, time() + 1814400 , '/');

    }

    if ($_GET['parameter'] == 'remove') {
        // Проверяем, существует ли массив корзины в куках
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $product_id = $_GET['product_id'];
            $size = $_GET['size'];

            // Проверяем, существует ли товар с таким идентификатором и размером в корзине
            $cart = json_decode($_COOKIE['cart'], true);
            if (isset($cart[$product_id][$size])) {
                // Удаляем товар из корзины
                unset($cart[$product_id][$size]);

                // Если после удаления товара не осталось ни одного размера данного товара, удаляем и сам товар из корзины
                if (empty($cart[$product_id])) {
                    unset($cart[$product_id]);
                }
            }

            $cart_json = json_encode($cart);
            setcookie('cart', $cart_json, time() + 1814400 , '/');

        }
    }

    if ($_GET['parameter'] === 'add_quantity') {

        $product_id = $_GET['product_id'];
        $size = $_GET['size'];

        // Decode the cart JSON string into an array
        $cart = json_decode($_COOKIE['cart'], true);

        if (isset($cart[$product_id])) {

            $cart[$product_id][$size]['quantity'] += 1;
        }

        // Encode the updated cart array back to JSON and set the cookie
        $cart_json = json_encode($cart);
        setcookie('cart', $cart_json, time() + 1814400 , '/');

    } else if ($_GET['parameter'] === 'subtract_quantity') {

        $product_id = $_GET['product_id'];
        $size = $_GET['size'];

        // Decode the cart JSON string into an array
        $cart = json_decode($_COOKIE['cart'], true);

        if (isset($cart[$product_id][$size])) {
            $cart[$product_id][$size]['quantity'] -= 1;
            if ($cart[$product_id][$size]['quantity'] < 1) {
                $cart[$product_id][$size]['quantity'] = 1;
            }
        }

        // Encode the updated cart array back to JSON and set the cookie
        $cart_json = json_encode($cart);
        setcookie('cart', $cart_json, time() + 1814400 , '/');

    }

    if ($_GET['parameter'] == 'get_product_sizes' && isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $options = [];

        $query = $db->query("SELECT * FROM tovari_po_ml WHERE id_tovar='" . $product_id . "' ORDER by name DESC");
        $result_query = $query->num_rows;
        if ($result_query > 0) {
            while ($result_query_row = $query->fetch_array()) {
                $i = 0;
                array_push($options, ['value' => $result_query_row['name'], 'text' => $result_query_row['name']]);
                $i++;
            }

            header('Content-Type: application/json');
            echo json_encode($options);
        }
    }

    exit();
}
?>

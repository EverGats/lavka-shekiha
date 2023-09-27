<?php

include './bd.php';

$data = json_decode(file_get_contents("php://input"), true);


if (!empty($data['InvoiceId'])) {

    $url = 'https://api.cloudpayments.ru/payments/cards/charge';
    $username = 'pk_f3f9eb422c1eb680e2a3a49222aa8';
    $password = '41e01354165e976768995470a9bf6da2';
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   // Возвращать результат вместо вывода на экран
    curl_setopt($ch, CURLOPT_POST, true);             // Указание на то, что это POST запрос
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));  // Данные для отправки
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

    $response = curl_exec($ch);
    $PayData = json_decode($response, true);
    $cartData = json_encode($data['JsonData'],JSON_UNESCAPED_UNICODE);

    $query = $db->query("INSERT INTO orders (user_name , user_number, products, MD, paid_status) VALUES ('" . $data['Payer']['FirstName'] . ' ' .  $data['Payer']['LastName'] .  "' , '" . $data['Payer']['Phone'] . "', '" . $cartData . "', '" . $PayData['Model']['TransactionId']."' , 0 )");

    curl_close($ch);

    echo $response;



} else if (!empty($data['TransactionId'])) {

    $url = 'https://api.cloudpayments.ru/payments/cards/post3ds';
    $username = 'pk_f3f9eb422c1eb680e2a3a49222aa8';
    $password = '41e01354165e976768995470a9bf6da2';
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   // Возвращать результат вместо вывода на экран
    curl_setopt($ch, CURLOPT_POST, true);             // Указание на то, что это POST запрос
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));  // Данные для отправки
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

    $response = curl_exec($ch);

    $PayData = json_decode($response, true);

    if ($PayData['Success'] === true) {
        $query = $db->query("UPDATE orders SET paid_status = 1 WHERE MD = '" . $data['TransactionId'] ."' ");
    }

    curl_close($ch);

    echo $response;

} else {
    $response_status = array(
        'status' => 'error',
        'message' => 'No data received.'
    );
    echo json_encode($response_status);
}


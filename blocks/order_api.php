<?php

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

    curl_close($ch);

    echo json_encode($response);

} else {
    $response_status = array(
        'status' => 'error',
        'message' => 'No data received.'
    );
    echo json_encode($response_status);
}


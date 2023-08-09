<?php

// Подключение к базе данных
include "bd.php";



// Получение поискового запроса
$searchTerm = $_POST['query'];

// Проверка наличия запроса
if (!isset($searchTerm)){
    echo json_encode(['error' => 'Пустой запрос.']);
    die();
}

// Подготовка SQL запроса
$stmt = $db->prepare("SELECT * FROM tovari WHERE nazvanie LIKE ? LIMIT 10");
$searchTerm = "%$searchTerm%";
$stmt->bind_param("s", $searchTerm);

// Выполнение запроса
$stmt->execute();

// Получение результатов
$result = $stmt->get_result();

// Проверка на наличие результатов
if ($result->num_rows === 0) {
    echo json_encode(['error' => 'По вашему запросу ничего не найдено.']);
    die();
}

// Преобразование результатов в массив
$products = $result->fetch_all(MYSQLI_ASSOC);

// Возврат результатов в формате JSON
echo json_encode($products);

?>

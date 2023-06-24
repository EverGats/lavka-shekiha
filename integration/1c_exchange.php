<?php
$username = '1';
$password = '1';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || $_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="My Realm"');
    exit('<h2>401 Unauthorized - You need to enter correct username and password!</h2>');
}

// If the user has entered correct credentials, we can proceed with rest of the code






require '../vendor/autoload.php';
    
    use ArtemsWay\Exchange1C\Exchange1C;


    $exchange = new Exchange1C([
        'dir' => $_SERVER['DOCUMENT_ROOT'].'/integration/files/', // Папка, в которую будут загружаться файлы обмена
        'ordersTemplate' => 'vendor/artemsway/exchange1c/src/templates/orders.php' // Шаблон файла заказов
    ]);

    /**
     * Регистрация callback функции для любого типа ($_GET['type']).
     * В качестве аргументов принимает логин и пароль полученные из HTTP-аутентификации.
     *
     * Вернуть функция должна name и id сессии либо null если логин или пароль не подходит
     */
    $exchange->on('checkauth', function ($login, $password) {
       

        return [
            'name' => 'session_name',
            'id' => 'session_id'
        ];
    });
    
    /**
     * В данной функции нужно выполнить проверку доступа
     * Вернуть функция должна boolean:
     * true - пользователь имеет доступ
     * false - доступ закрыт
     */
    $exchange->on('access', function () {
        return true;
    });
    
    /**
     * Функция инициализации обмена.
     *
     * Должна вернуть массив с двумя элементами:
     * zip - будут ли данные передаватся в виде архива, доступные значения ('yes', 'no'),
     * filesize - максимальный размер принимаемого файла в байтах (1024 = 1КБ), в php по умолчанию upload_max_filesize=2M
     */
    $exchange->on('init', function () {
        return ['yes', 1024*1024*2];
    });
    
    
  $exchange->on('file', function ($filename) {
        return ['success', 'Файл успешно сохранен'];
    });
    
    /**
     * Вызывается после парсинга xml файла.
     * В качестве аргументов принимает тип файла и массив данных полученных при парсинге xml файла.
     * Должна вернуть массив с двумя элементами:
     * status - статус операции, доступные значения ('success', 'progress', 'failure'),
     * massage - текст сообщения который будет оправлен в 1С
     */
    $exchange->on('import', function ($type, $data) {

        return ['success', 'Импорт успешно завершён.'];
        //return ['progress', 'Успешно загруженно 20%.'; // В случае статуса 'progress', 1С выполнит тот же запрос пока система не вернет статус 'success'.
    });
    
    
    /**
     * Должна вернуть массив заказов, который в следствии будет передан в файл ordersTemplate.
     */
    $exchange->on('query', function () {
        $orders = 'sql запрос для получения заказов';
    
        return $orders;
    });
    
    /**
     * Вызывается после успешной обработки заказов на стороне 1С.
     *
     * Должна вернуть массив с двумя элементами:
     * status - статус операции, доступные значения ('success', 'failure'),
     * massage - текст сообщения который будет оправлен в 1С
     */
    $exchange->on('success', function () {
        $orders = 'sql запрос для получения заказов';
    
        return $orders;
    });



    try {
    
        $response = $exchange->execute();
        
    } catch (\Exception $e) {
    
        // Упс произошла ошибка детали в $e
        
        $response = 'failure'. $e;
    }

    // И выводим ответ
    echo $response;

   
    
    
    
    ?>
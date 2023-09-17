<?php
// Симуляция запроса на сервер и получение ответа.
// В реальности здесь будет ваш запрос к серверу.
sleep(3); // Задержка в 3 секунды для демонстрации.
$response = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка...</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect'' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap' rel='stylesheet''>
    <link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
    <link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Regular.css' type='text/css' charset='utf-8'>
    
    <style>
        .middlePage,
        .middlePage2{
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            margin-top: -60px;
        }
        .nf{
            font-weight: 500;
            font-size: 100px;
            letter-spacing: 6px;
            text-align: center;
            margin-top: 40px;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            color:#000000;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main {
            background-color: #FFFAEE;
            width: 100vw; /* устанавливаем ширину в 100% от ширины экрана */
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden; /* прячем все, что выходит за пределы .main */
        }

        .topImg, .bottomImg {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .topImg {
            transform: scaleY(-1); /* отражает изображение по вертикали */
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loader .spinner {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #ecd2cb; /* Blue */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="loader" style="display: flex; align-items: center; justify-content: center; height: 100vh;">
        <div class="spinner"></div>
    </div>

        <div class='topPage' style="display: none;">
            <img class='topImg' src='/img/glavnaya-triangle.png'>
        </div>
        <div class='middlePage' style="display: none;">
            <a class='nf'>БЛАГОДАРИМ<br>ЗА ЗАКАЗ</a>
        </div>
        <div class='bottomPage' style="display: none;">
            <img class='bottomImg' src='/img/glavnaya-triangle.png'>
        </div>



        <div class='topPage2' style="display: none;">
            <img class='topImg' src='/img/glavnaya-triangle.png'>
        </div>
        <div class='middlePage2' style="display: none;">
            <a class='nf'>ОШИБКА</a>
        </div>
        <div class='bottomPage2' style="display: none;">
            <img class='bottomImg' src='/img/glavnaya-triangle.png'>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let response = <?php echo json_encode($response); ?>;

            // Симулируем асинхронный запрос, используя setTimeout.
            // В реальности здесь будет ваш AJAX-запрос или fetch к API.
            setTimeout(function() {
                if (response) {
                    document.querySelector(".loader").style.display = "none";
                    document.querySelector(".topPage").style.display = "block";
                    document.querySelector(".middlePage").style.display = "block";
                    document.querySelector(".bottomPage").style.display = "block";
                } else {
                    document.querySelector(".loader").style.display = "none";
                    document.querySelector(".topPage2").style.display = "block";
                    document.querySelector(".middlePage2").style.display = "block";
                    document.querySelector(".bottomPage2").style.display = "block";
                }
            }, 3000);
        });
    </script>

</body>
</html>

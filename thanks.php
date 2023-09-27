<?php
// Симуляция запроса на сервер и получение ответа.
// В реальности здесь будет ваш запрос к серверу.

$response = false;
var_dump($_POST);

if ($_POST['MD'] != '' && $_POST['PaRes'] != '') {

    $MD = (string)$_POST['MD'];
    $PaRes = (string)$_POST['PaRes'];

} else {

    $MD = 000;
    $PaRes = 'null';

}



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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            font-size: 120px;
            letter-spacing: 6px;
            text-align: center;
            margin-top: 40px;
        }

        @media (max-width: 999px ) {
            .nf{
                font-weight: 500;
                font-size: 60px;
                letter-spacing: 6px;
                text-align: center;
                margin-top: 40px;
            }
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

            let MD = <?=$MD?>;
            let PaRes = '<?=$PaRes?>';

            if (MD != 000 && PaRes != 'null') {

                let payment = {
                    'TransactionId' : MD,
                    'RaRes' : PaRes
                };

                $.ajax({
                    url: 'blocks/order_api.php',
                    type: 'POST',
                    dataType: 'json',
                    data: JSON.stringify(payment),
                    success: function(data) {
                        if (data.Success === true) {
                            document.querySelector(".loader").style.display = "none";
                            document.querySelector(".topPage").style.display = "";
                            document.querySelector(".middlePage").style.display = "";
                            document.querySelector(".bottomPage").style.display = "";
                            console.log(data);
                        } else {
                            console.log(data);
                            document.querySelector(".loader").style.display = "none";
                            document.querySelector(".topPage2").style.display = "";
                            document.querySelector(".middlePage2").style.display = "";
                            document.querySelector(".bottomPage2").style.display = "";
                        }
                    }
                });

            } else {
                console.log("Payment data is required")
                document.querySelector(".loader").style.display = "none";
                document.querySelector(".topPage2").style.display = "";
                document.querySelector(".middlePage2").style.display = "";
                document.querySelector(".bottomPage2").style.display = "";
            }

        });
    </script>

</body>
</html>

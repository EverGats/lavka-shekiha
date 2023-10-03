<?php
require "blocks/bd.php";


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_title':
            $stmt = $db->prepare("INSERT INTO about (type, text) VALUES ('Title', ?)");
            $text = $_POST['text'];
            $stmt->bind_param("s", $text);  // 's' обозначает строковый тип данных
            $stmt->execute();
            break;
        case 'add_text':
            $stmt = $db->prepare("INSERT INTO about (type, text, image_path) VALUES ('Text', ?, ?)");
            $text = $_POST['text'];

            $imagePath = null;
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $uploadDir = 'foto/full/';
                $uploadFile = $uploadDir . basename($_FILES['image']['name']);

                if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)){
                    $imagePath = $uploadFile;
                }
            }

            $stmt->bind_param("ss", $text, $imagePath);  // 'ss' обозначает строковый тип данных
            $stmt->execute();
            break;

        case 'delete_block':
            $stmt = $db->prepare("DELETE FROM about ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            break;
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$query = $db->query("SELECT * FROM about ORDER BY id");
$blocks = array();

while ($row = $query->fetch_assoc()) {
    $blocks[] = $row;
}
include "blocks/header.php";
?>

    <div class="content-container">
        <?php foreach ($blocks as $block):?>
            <?php if ($block['type'] == 'Title'): ?>
                <div class="title-container">
                    <h1><?= $block['text'] ?></h1>
                </div>
            <?php else: ?>
                <div class="text-container">
                    <p><?= nl2br($block['text']) ?></p>
                    <?php if(!empty($block['image_path'])): ?>
                        <img src="<?= $block['image_path'] ?>" alt="Attached Image" width="300"> <!-- отображение изображения -->
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($_SESSION['login_admin'] and $_SESSION['id_admin']): ?>
        <div class="form-container">
            <h5>Админ панель</h5>
            <form action="" method="POST">
                <input type="hidden" name="action" value="add_title">
                <input type="text" name="text" placeholder="Введите заголовок">
                <input type="submit" value="Добавить блок заголовка">
            </form>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_text">
                <textarea name="text" placeholder="Введите текст"></textarea>
                <input type="file" name="image" id="fileInput" style="display: none;">

                <!-- Создаем лейбл, который будет выглядеть как кнопка -->
                <label for="fileInput" class="custom-file-upload">
                    Загрузить фото
                </label>

                <span id="fileStatus">Файл не выбран</span>

                <input type="submit" value="Добавить блок">
            </form>


            <form action="" method="POST">
                <input type="hidden" name="action" value="delete_block">
                <input type="submit" class="delete" value="Удалить последний блок">
            </form>
        </div>
        <?php endif; ?>
    </div>

    <style>
        .content-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            max-width: 600px; /* Ограничиваем максимальную ширину для улучшения внешнего вида на больших экранах */
            margin: 0 auto; /* Центрирование контейнера по горизонтали */
        }

        @media (min-width: 1000px) {

            .content-container {
                min-width: 1000px;
            }

        }

        /* Увеличиваем высоту полей ввода */
        .content-container input[type="text"] {
            height: 40px;
        }

        /* Увеличиваем высоту и ширину textarea */
        .content-container textarea {
            height: 150px;
        }


        .content-container input[type="text"],
        .content-container textarea {
            width: 100%;
            padding: 10px 15px; /* Увеличиваем padding для большей высоты и комфорта */
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }


        .title-container {
            margin-left: auto;
            margin-right: auto;
        }
        .content-container input[type="submit"] {
            width: 100%; /* Чтобы кнопка растягивалась на всю ширину */
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
            text-align: center;
            margin-bottom: 10px;
        }

        .custom-file-upload:hover {
            background-color: #45a049;
        }

        .delete {
            background-color: red !important;
        }
        .form-container a {
            margin-bottom: 10px;
        }

        .text-container {
            display: flex;
            flex-direction: row-reverse;
            align-content: space-around;
            justify-content: center;
            align-items: center;
        }


        .content-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .content-container input[type="file"] {
            margin-bottom: 20px;
        }

        .text-container img {
            box-shadow: -10px 5px 5px gray;
            margin-bottom: 40px;
        }

        .text-container p {
            margin-left: 20px;
        }

        .form-container {
            margin-top: 40px;
            padding: 20px;
            background-color: rgba(255, 174, 71, 0.43);
            border-radius: 10px;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 50px;
        }
        .content-container form:not(:last-child) {
            margin-bottom: 15px;
        }
    </style>

    <script>

        document.getElementById('fileInput').addEventListener('change', function() {
            var fileName = this.value.split('\\').pop(); // Получаем имя файла
            if (fileName) {
                document.getElementById('fileStatus').textContent = 'Выбран файл: ' + fileName;
            } else {
                document.getElementById('fileStatus').textContent = 'Файл не выбран';
            }
        });


    </script>
<?php
include "blocks/footer.php";

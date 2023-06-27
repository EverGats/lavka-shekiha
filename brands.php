<?php
include ("blocks/header.php");
include ("blocks/bd.php");

echo('
    <div class="all-brands-container">
        <div class="all-brands-title"  style="user-select: none">
            ВСЕ БРЕНДЫ
        </div>
        <div class="brands-list">
');

$query = "SELECT * FROM post_cat1";
$result = $db->query($query);
if (!$result) {
    die("Database query failed: " . $db->error);
}
while($brand = $result->fetch_assoc()){
    $brand_id = $brand["id"];
    $brand_name = $brand["name"];
    $brand_seo_url = $brand["seo_url"];  // Тут мы получаем seo_url
    $check_query = "SELECT * FROM tovari WHERE cat = $brand_id AND status = 0";
    $check_result = $db->query($check_query);
    if($check_result->num_rows > 0){
        echo("<div class='brand-item' style='text-align: center; font-size: 30px;'><a style='text-decoration: none;' href='http://localhost/catalog/parfum/".$brand_seo_url."'>".strtoupper($brand_name)."</a></div>");  // Тут мы добавляем ссылку
    }
}

echo('
        </div>
    </div>
    <style>
    .all-brands-title{
        font-family: "TupoVyazWebBold";     
        text-align: center;
        font-size: 100px;
        letter-spacing: 30px;
        margin-bottom: 30px;
        margin-top: 50px;
    }
    .brand-item{
        margin-bottom: 20px;
    }
    .brand-item a{
        color: #000;  // Можете изменить цвет ссылки на свой вкус
        text-decoration: none;  // Удалите подчеркивание ссылки, если оно есть
    }
    
    
    </style>
');

include("blocks/footer.php");
?>

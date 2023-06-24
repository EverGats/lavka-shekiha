
<style>

.block7   {
  width: 25px;
  height: 25px;
  background-color: red;
  border-radius: 50%;
  transform: scale(.85);
  animation: pulse 2s ease-in-out infinite;
  position:fixed;
  color:#FFFFFF;
  text-decoration:none;
  z-index: 991; 
  line-height:24px;
  text-align:center;
  cursor: pointer;
  margin-top:-4px;
}

.block7 a:hover{
font-weight:800;
color:#FFFFFF;
}

@keyframes pulse {
  from {
    transform: scale(.85);
  }
  50% {
    transform: scale(1);
  }
  to {
    transform: scale(.85);
  }
}

</style>
<?php
$result_korz = $db->query("SELECT COUNT(*) FROM vibranie_tovari WHERE talon='".$_SESSION['talon']."' limit 9");
$myrow_korz = $result_korz->fetch_array();

echo '
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
';

echo"
<div style='position:fixed; background-color: #FFFFFF; padding-top:8px; padding-bottom:8px; margin-left:-8px; width:100%;  opacity: 0.90; z-index: 990; border-bottom: 2px solid #5f1b13;'>
<div align='center'>";

if ($_SESSION['id_admin'] and $_SESSION['login_admin']){
    echo"<strong><a style='text-decoration: none;' href='/admin'>Вход в админку</a></strong> <strong style='color:#5f1b13'>|</strong> ";
}

echo"
<strong><a style='text-decoration: none;' href='#'>Вход в личный кабинет</a></strong>  <strong style='color:#5f1b13'>|</strong> <strong><a style='text-decoration: none;' href='../korzina'>Корзина</a></strong>";

if ($myrow_korz[0]>0){
    echo"
    <a href='../korzina' class='block7'>$myrow_korz[0]</a>&nbsp;&nbsp;&nbsp;&nbsp;";
}

echo"<a href='../korzina'><img style='margin-top:-6px; position:fixed;' src='../img/basket.png' height='45px' border='0' /></a>";

echo"</div>
</div>
";

echo"<div id='header'></div>";
?>
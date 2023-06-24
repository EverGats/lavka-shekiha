<?
 error_reporting(E_ALL); ini_set('display_errors', 'On'); 
mb_internal_encoding("utf-8");
require_once('reqClass.php');
require_once('Logger.php');
$log= new Logger("log_tests");
$req = new reqClass();
$goods = $req->checkDouble(9);
checkSqlError($goods);

if(mysqli_num_rows($goods)!==0){ 
while($item = mysqli_fetch_assoc($goods)){
    print_r($item);
    echo "ss </br>";
}}else echo "yep";
















function checkSqlError($sql){if(gettype($sql) == "string") {echo $sql; exit;}}


?>
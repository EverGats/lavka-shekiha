<?
/*
$url_z = $_SERVER['REQUEST_URI'];
$string_1="&";
$string_2="?";
*/


// Вывод — Слово "лет" есть в данной строке.
//if ($_GET['filters']==1){
//$filters_view="filters=1";	
//$add_1="/?";	
//}
//if (strpos($url_z, $string_1 and $string_2) !== false) {
//ecть
//{$filters_view="----?filters=1";}
//}else{
//нет	
//if ($_GET['filters']==1){$filters_view="&filters=1";}

/////////////////////////////
//else{
//$filters_view="";
//$add_1="&";	
//}
?>
<style>

.filter_blok ul{	
margin: 0.5;
padding: 0; 
list-style-type: none; 
font-size: 16px;
padding-top: -41px;
text-align:left;
}


.filter_blok ul li{ 
position: relative;
padding-top: 1px; 
} 

.filter_blok ul li a{ 
color: #241515;;  /*цвет шрифта*/
display: block; 
overflow: auto; /*force hasLayout in IE7 */
text-decoration: none;  /*убрали подчеркивание*/
padding: 1px; /*отступы*/
border-bottom: 1px solid #FFFFFF; 
}

.filter_blok ul li ul{ 
position: absolute; 
width: 230px; /*ширина подменю */
top: 0; 
visibility: hidden; 
}

.filter_blok ul li img {
    vertical-align: middle;
}
#mini_hide {
    transition: all 0.3s ease-in-out; /* добавление плавности */
}

</style>
    <script src="/js/jq-sticky.js"></script>

<script>
    $('#sidebar ').stickThis({
        top: 130
    });
</script>

<?

echo"
<div id='mini_hide' >";

include ("blocks/filters_tovar.php");	

echo"
</div>";
?>
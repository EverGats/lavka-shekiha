<?php

function regexpEscape($str)
{
	return preg_quote($str, '/');
}
$mRequestUri= $_SERVER["REQUEST_URI"]; //получаем REQUEST_URI
if ( $mRequestUri == '/op' ) //если пользователь обратился к главной странице
{
	$mPageUrl = $mRequestUri;
}
else
{
	if ( $_SERVER["QUERY_STRING"] )
	{
		$mPageUrl = preg_replace (array('/^\//', '/\/?\?'.RegexpEscape($_SERVER['QUERY_STRING']).'$/'), array('',''), $mRequestUri ).'/';
	}
	else
	{
		$mPageUrl = preg_replace (array('/^\//', '/\/?\??$/'), array('',''), $mRequestUri ).'/';
	}
}
//echo $mPageUrl;
//echo $mRequestUri;
    // Подключение и выбор БД
include ("blocks/bd.php");
////////////////////////////////////////////////

$v_url = $db->query("SELECT * FROM site_pages WHERE translit_url='$mPageUrl'");
$resnum_url = $db->affected_rows;

if( $resnum_url==0)
{
    header("HTTP/1.0 404 Not Found");
include ("blocks/error404.php");
    exit;
} else	{
			$resurl=$v_url->fetch_array();
			$rout_url=$resurl['url']; // URL из БД
			$question_pos = strpos($rout_url, '?');
			if(!$question_pos)
				{
					include $rout_url; // если нет параметров
				} else // если есть параметры
					{
						$get_vars = substr($rout_url, $question_pos+1); // строка параметров
						parse_str($get_vars,$out_vars);
						$_GET = array_merge($_GET, $out_vars); // добавляем параметры в массив $_GET
						$get_url = substr($rout_url, 0, $question_pos); // извлекаем модуль php из БД для include
						include $get_url;
					}
		}
//echo var_dump(get_defined_vars());	

?>

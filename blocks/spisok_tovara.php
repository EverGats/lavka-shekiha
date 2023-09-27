


<style>



    a.blok_stat_knopka {
        font-size: 120%;
        font-weight: 700;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        padding: .3em 0.8em;
        transition: .2s ease-in-out;
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: center;
        border-radius: 7px;
        background-color: rgb(131, 115, 102);
        opacity: 1;
        letter-spacing: 2.31px;
        align-items: center;
    }


    a.blok_stat_knopka:hover:not(:active) {
        background: #caac52;
    }

    a.blok_stat_knopka:active {
        background: #caac52;
    }


    @media (min-width: 1000px) {
        #filters_tovar{
            display:none;
        }
        #blok_stat  {
            height: 650px;
            position:relative;
            justify-content: center;
        }

        a.blok_stat_zag {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: left;
            font-size: 18px;
            text-decoration: none;
            font-weight:700;
            text-transform: uppercase;
            min-height: 67px;
            margin-top: 5px;
        }
        #blok_stat_img img {
            /*height:300px;*/
            /*max-width:94%;*/
            width: 95%;
            padding:2px;
            background:#fff;
        }
        #blok_stat_img {
            height: 350px;
            background-color: #fff;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    }
    @media (max-width: 1000px) {

        #blok_stat  {
            position:relative;
        }

        a.blok_stat_zag {
            text-align: left;
            font-size: 17px;
            text-decoration: none;
            font-weight:700;
            text-transform: uppercase;
        }
        #blok_stat_img img {
            height:300px;
            max-width:94%;
            padding:2px;
            background:#fff;
        }
        #blok_stat_img {
            height: 350px;
            background-color: #fff;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    }
    #filters_tovar a{
        text-decoration: none;
    }

</style>
<?
if ($_SESSION['id_admin'] and $_SESSION['login_admin']){

    function random($count){
        $pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
        return substr($pass,3,$count);
    }

}


echo"<div id='filters_tovar'>
<div style='height:3px;'></div>";

$currentParams = $_GET;

if (isset($currentParams['filters']) && $currentParams['filters'] == 1) {
    $currentParams['filters'] = 2;
    $queryString = http_build_query($currentParams);
    echo "<div><a href='?{$queryString}'><img src='/img/filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;'/>Скрыть фильтры</a></div>";
} else {
    $currentParams['filters'] = 1;
    $queryString = http_build_query($currentParams);
    echo "<div><a href='?{$queryString}'><img src='/img/filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;'/>Показать фильтры</a></div>";
}

echo"<div style='float:right; margin-top:-22px;'>";

if ($_GET['poisk']==1){ echo"<a href='../catalog/?poisk=2'><img src='/img/poisk_filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;' />&nbsp;Скрыть поиск</a>";}
if ($_GET['poisk']==2 || !$_GET['poisk']){ echo"<a href='../catalog/?poisk=1'><img src='/img/poisk_filters.png' width='25' height='25' align='top' border='0' style='margin-top:-2px;' />&nbsp;Октрыть поиск</a>";}

echo"
</div>
<div style='height:3px;'></div>
</div>";


///////////////////////////////////////////////////////
if ($_GET['poisk']==1){

    include ("blocks/poisk_tovara.php");
}
////////////////////////////////////////////////////

if ( $_GET['filters']==1){
    echo"<div style='height:7px;'></div>";

    include ("blocks/filters_tovar.php");
}

/////////////////////////////////////////////
if ($_GET['filters']==1){
    echo"
<a name='tovar_gal'></a>
<div style='height:15px;'></div>
";}

$iterator = 0;


if ($myrow_all_stat['id']){


    echo"
<a name='tovar_gal'></a>

<!--noindex-->  
<div style='height:5px;'></div>
<div class='grid row' >";
    include 'product_block.php';


    echo"</div>
<!--/noindex--> 
";
    if ($iterator == 0){
        echo"
<div style='height:10px;'></div>
<div align='center'><strong>В данной категории товары с таким фильтром отсутствуют!</strong></div>
<div style='height:10px;'></div>
";

    }
}else{
    echo"
<div style='height:10px;'></div>
<div align='center'><strong>В данной категории товары отсутствуют!</strong></div>
<div style='height:10px;'></div>
";
}

?>
<style>

</style>

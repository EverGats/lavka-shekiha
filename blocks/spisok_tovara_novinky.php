

<?
if ($_SESSION['id_admin'] and $_SESSION['login_admin']){
    $pol_view="";
    $pol_v="";

    if ($id || $pol || $poisk==1){$where_view="WHERE";}else{$where_view="";}

    if ($poisk!=1){
        if ($pol==1){$pol_v="mugskaya='1'";}
        if ($pol==2){$pol_v="genskaya='1'";}
        if ($pol==3){$pol_v="mugskaya='1' and genskaya='1'"; }

        if ($id){$parametr="cat='$id' $pol_view";}
        if (!$id and $pol){$parametr="$pol_v";}
    }
/////////////////////////////////////////////////////////

    function random($count){
        $pass = str_shuffle('abcdefghedfiklmnoprstufhckfpaldmvnrywiwjsnaqpemfkvil');
        return substr($pass,3,$count);
    }

}

$result_all_stat = $db->query("SELECT * FROM tovari ORDER BY id DESC LIMIT 8");
$myrow_all_stat = $result_all_stat->fetch_array();

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

}

?>

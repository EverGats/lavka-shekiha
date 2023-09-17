<?

namespace ivan;

require('transTrait.php');

class stringG
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function getString()
    {
        return $this->string;
    }
}

class reqClass
{
    use trans;

    public $link;
    public $log;
    public $logOffer;
    public $logGood;
    public $logWarn;
    const PARFUM_UID = '409f0e4e-3b7b-11ee-84a1-f0761c70905c';
    const DECOR_UID = '409f0e7b-3b7b-11ee-84a1-f0761c70905c';
    const FACE_UID = '409f0e57-3b7b-11ee-84a1-f0761c70905c';
    const BODY_UID = '409f0e69-3b7b-11ee-84a1-f0761c70905c';

    public function __construct()
    {
        $this->link = mysqli_connect("localhost", "root", "", "udb6211_2");


        mysqli_set_charset($this->link, "utf-8");
        mysqli_query($this->link, "SET NAMES 'utf-8'");
        mysqli_query($this->link, "SET NAMES 'utf-8';");
        mysqli_query($this->link, "SET CHARACTER SET 'utf-8';");
        mysqli_query($this->link, "SET SESSION collation_connection = 'utf-8_general_ci';");

    }


    public function checkDouble($uid, $imof)
    {

        $tableName = 'SSSA';
        switch ($imof) {
            case 'cat':
                $tableName = 'post_cat1';
                break;
            case 'good':
                $tableName = 'tovari';
                break;
            case 'offer':
                $tableName = 'tovari_po_ml';
                break;
            default:
                $tableName = 'SSSA';
                break;
        }

        $sql = 'SELECT `id`, `uid` FROM `' . $tableName . '` WHERE `uid` like "%' . $uid . '%"';


        $res = mysqli_query($this->link, $sql);
        if (!$res) {
            $message = 'bad request: ' . mysqli_error($this->link) . "\n";
            $message .= 'Self request: ' . $sql;
            return $message;
        } else {

            return $res;
        }
    }

    public function cat($cat, $method)
    {
        $nazvanie = preg_replace("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", "", $cat->name);
        switch ($method) {

            case 'insert':
                $sql = 'INSERT INTO `post_cat1`(`kolvo_zametok`,`map_block`,`text1`,`text2`,`view`,`id_cat1`,
                `id_group`,`description`,`sort`,`name`, `title`, `zagolovok_h1`, `seo_url`, `keywords`, `uid`) VALUES 
                (0,0,"","",0,0,0,"",0,"' . iconv('UTF-8', 'utf-8', $cat->name) . '","' . iconv('UTF-8', 'utf-8', $cat->name) . '","' . iconv('UTF-8', 'utf-8', $cat->name) . '","' . $this->transliteseo(new stringG($cat->name)) . '","' . iconv('UTF-8', 'utf-8', $cat->name) . '","' . $cat->id . '")';

                $res = mysqli_query($this->link, $sql);

                if (!$res) {
                    $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                    $message .= 'Self request: ' . $sql;
                    return $message;
                } else {
                    $result_us = mysqli_query($this->link, "SELECT id FROM post_cat1 ORDER by id DESC LIMIT 1");
                    $myrow_us = mysqli_fetch_array($result_us);
                    $add_infa = mysqli_query($this->link, "INSERT INTO site_pages (translit_url,url,lastmod) VALUES('catalog/brands/" . $this->transliteseo(new stringG($nazvanie)) . "/','tovar_cat.php?id=" . $myrow_us['id'] . "',NOW())");
                    if (!$add_infa) {
                        $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                        $message .= 'Self request: ' . $sql;
                        return $message;
                    } else {
                        return $res;
                    }
                }

                break;

            default:


                break;
        }
    }

    public function good($good, $method)
    {
        $realcat = '';
        if($good->realCategory == self::PARFUM_UID && preg_match("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", $good->name)) {
            $realcat = 'parfum';
        } else {
            switch($good->realCategory) {
                case self::DECOR_UID:
                    $realcat = 'decor';
                    break;
                case self::FACE_UID:
                    $realcat = 'face';
                    break;
                case self::BODY_UID:
                    $realcat = 'body';
                    break;
            }
        }

        if (preg_match("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", $good->name, $matches) != false) {
            $nazvanie = trim(preg_replace("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", "", $good->name));
            $nazvanie = str_replace('"', '', $nazvanie);
            $ml = trim(preg_replace("/(МЛ|мл|ml|ML)/", "", $matches[0]));
        } elseif($good->realCategory && $good->realCategory != self::PARFUM_UID) {
            $nazvanie = $good->name;
            $ml = null;
        }else{
            return array('');
        }

        $result_us = mysqli_query($this->link, "SELECT id FROM post_cat1 WHERE uid ='" . $good->category . "'");
        $myrow_us = mysqli_fetch_array($result_us);
        $cat = $myrow_us["id"];

        $sql = 'SELECT `nazvanie`, `id`, `uid`,`po_ml` FROM `tovari` where `nazvanie` = "' . iconv('UTF-8', 'utf-8', $nazvanie) . '"';
        $res = mysqli_query($this->link, $sql);
        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_array($res)) {
                if (stripos($row['po_ml'], $ml) == false) {
                    $string = "-" . $ml . "-" . $row['po_ml'];
                    $delimiter = "-";
                    $numbers = array_filter(explode($delimiter, $string), 'is_numeric');
                    sort($numbers);
                    $newPoml = implode("", array_map(function ($item) {
                        return "-" . $item . "-";
                    }, $numbers));
                    $sql = 'UPDATE tovari SET `po_ml` = "' . $newPoml . '", `status` = "0" WHERE `id` = ' . $row['id'];
                    $res = mysqli_query($this->link, $sql);

                }
                if (stripos($row['uid'], $good->id) == false) {
                    $string = "|" . $good->id . $row['uid'];

                    $sql = 'UPDATE tovari SET `uid` = "' . $string . '", `status` = 0  where `id` = ' . $row['id'];
                    $res = mysqli_query($this->link, $sql);

                }
                $sql = 'UPDATE tovari SET `realcat` = "' . $realcat . '", `nazvanie` = "' . iconv('UTF-8', 'utf-8', $nazvanie) . '", `status` = 0 WHERE `id` = ' . $row['id'];
                $res = mysqli_query($this->link, $sql);

                if (!$res) {
                    $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                    $message .= 'Self request: ' . $sql;
                    return $message;
                }
            }

        } else {

            switch ($method) {
                case 'insert':
                    $sql = 'INSERT INTO `tovari`(`opisanie`, `seo_url`,`nazvanie`, `date_time_add`, `uid`,`po_ml`, `status`, `realcat`) VALUES 
            ("' . $good->description . '","' . $this->transliteseo(new stringG($nazvanie)) . '","' . iconv('UTF-8', 'utf-8', $nazvanie) . '","' . date('Y-m-d H:i:s') . '","|' . $good->id . '|","-' . $ml . '-", "0", "' . $realcat . '")';

                    $res = mysqli_query($this->link, $sql);

                    if (!$res) {
                        $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                        return $message;
                    } else {
                        $sql = 'INSERT INTO `site_pages`(`translit_url`,`url`, `lastmod`) VALUES 
                        ("catalog/' . $this->transliteseo(new stringG($nazvanie)) . '/","tovar.php?id=' . mysqli_insert_id($this->link) . '","' . date('Y-m-d H:i:s') . '")';

                        $res = mysqli_query($this->link, $sql);

                        $result_us = mysqli_query($this->link, "SELECT `id` FROM `post_cat1` WHERE `uid` ='" . $good->category . "'");
                        $myrow_us = mysqli_fetch_array($result_us);
                        $cat = $myrow_us["id"];



                        $sql = 'SELECT `nazvanie`, `id`, `uid`,`po_ml`,`cat` FROM `tovari` where `nazvanie` = "' . iconv('UTF-8', 'utf-8',$nazvanie) . '"';
                        $res = mysqli_query($this->link, $sql);

                        while ($row = mysqli_fetch_array($res)) {

                            if ($row['cat'] !== $cat) {
                                $sql = 'UPDATE tovari SET `cat` = ' . $cat . ', `status` = 0  where `id` = ' . $row['id'];
                                $res = mysqli_query($this->link, $sql);

                            }
                        }

                        $result_us = mysqli_query($this->link, "SELECT id FROM tovari ORDER by id DESC LIMIT 1");
                        $myrow_us = mysqli_fetch_array($result_us);
                        $add_infa = mysqli_query($this->link, "INSERT INTO site_pages (translit_url,name_url,url,id_post,lastmod) VALUES('" . $this->transliteseo(new stringG($nazvanie)) . "/','" . $this->transliteseo(new stringG($nazvanie)) . "','tovar.php?id=" . $myrow_us['id'] . "','" . $myrow_us['id'] . "',NOW())");

                        return $res;
                    }

                    break;

                default:
                    break;
            }
        }
    }

    public function offer($offer, $method)
    {
        if (preg_match("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", $offer->name, $matches) != false) {
            $nazvanie = trim(preg_replace("/[0-9]+(\s|МЛ|мл|ml|ML)*(МЛ|мл|ml|ML)/", "", $offer->name));
            $nazvanie = str_replace('"', '', $nazvanie); // Удаление двойных кавычек
            $ml = trim(preg_replace("/(МЛ|мл|ml|ML)/", "", $matches[0]));
        }

        switch ($method) {
            case 'insert':

                $sql = 'SELECT `id`, `po_ml` from `tovari` where `uid` LIKE "%' . $offer->productId . '%"';

                $res = mysqli_query($this->link, $sql);
                if (mysqli_num_rows($res) > 0) {

                    $cos = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        if (strpos($row["po_ml"], $ml)) {
                            foreach ($offer->prices as $value) {
                                $cos = $value['pricePerUnite'];
                            }
                            if ($cos === null) {
                                $cos = 0;
                            }
                            $ml = ($ml === null) ? 0 : $ml;

                            $sql = 'INSERT INTO `tovari_po_ml`(`id_tovar`, `uid`, `name`, `prise`, `kolvo`) VALUES 
                ("' . $row['id'] . '","' . $offer->characteristicId . '","' . $ml . '",' . $cos . ',"' . $offer->warehouses['03a3a88c-28bb-11eb-8443-acb57ddb1f92']['value'] . '")';

                            $res = mysqli_query($this->link, $sql);

                            if (!$res) {
                                $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                                $message .= 'Self request: ' . $sql;
                                return $message;
                            } else {

                                return $res;
                            }
                        }


                    }


                } else {

                }

                break;


            case 'update':
                foreach ($offer->prices as $value) {
                    $cos = $value['pricePerUnite'];
                }
                if ($cos === null) {
                    $cos = 0;
                }
                $sql = 'UPDATE `tovari_po_ml` SET `prise`=' . $cos . ',`kolvo`=' . $offer->warehouses['03a3a88c-28bb-11eb-8443-acb57ddb1f92']['value'] . ' WHERE `uid` = "' . $offer->characteristicId . '"';

                $res = mysqli_query($this->link, $sql);
                if (!$res) {
                    $message = 'bad request: ' . mysqli_error($this->link) . "\n";
                    $message .= 'Self request: ' . $sql;
                    return $message;
                } else {

                    return $res;
                }
                break;
            default:


                break;
        }
    }


    public function statusOne(){
        $sql = "UPDATE tovari SET `status` = 1";
        $res = mysqli_query($this->link, $sql);
        return $res;
    }

    public function setStatusZero($uid)
    {
        if (strlen($uid)>7){

        $sql = "UPDATE tovari SET `status` = '0' WHERE `uid` LIKE '%" . $uid . "%'";
        $res= mysqli_query($this->link, $sql);
        return $res;
        }
        return false;
    }
}
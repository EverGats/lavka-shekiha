<?php
use ArtemsWay\Exchange1C\Parser1C;
use ivan\Logger;
use ivan\reqClass;

try {
require '../vendor/autoload.php';

    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/artemsway/exchange1c/src/ModeTrait.php';




     echo 1;
 $importFile = $_SERVER['DOCUMENT_ROOT'].'/integration/files/catalog/import.xml';
     echo 1;
 $importData = ArtemsWay\Parser1C\Parser1C::parseImportFile($importFile);
     echo 1;
 import($importData);
     echo 1;
    /* $offersFile = $_SERVER['DOCUMENT_ROOT'].'/integration/files/catalog/offers.xml';


     $offersData = ArtemsWay\Parser1C\Parser1C::parseOffersFile($offersFile);
import($offersData);*/

echo 1;
}catch (Exception $e){
    var_export($e);
}

    function import($importData)
    {
        $imof = (isset($importData['offers']) > 0) ? "offers" : "import";

        $log = new Logger($_SERVER['DOCUMENT_ROOT'] . "/integration/log_tests.txt");

        $req = new reqClass();

        if ($imof == "import") {


            foreach ($importData["categories"] as $value) {


                $goods = $req->checkDouble($value->id, 'cat');
                if (checkSqlError($goods)) {
                    $kols = mysqli_num_rows($goods);

                    switch ($kols) {
                        case 0:
                            $res = $req->cat($value, "insert");

                            if (checkSqlError($res)) {
                            }
                            break;
                        case 1:
                            break;
                        default:
                            break;
                    }


                }
            }

            foreach ($importData["products"] as $value) {




                $goods = $req->checkDouble($value->id, 'good');
                if (checkSqlError($goods)) {
                    $kols = mysqli_num_rows($goods);

                    switch ($kols) {
                        case 0:

                            $res = $req->good($value, "insert");
                            if (checkSqlError($res)) {

                            }
                            break;
                        case 1:
                            $res = $req->setStatusZero($value->id);
                            break;
                        default:

                            break;
                    }


                }
            }
        } else {
            foreach ($importData["offers"] as $value) {
                $logBad = new Logger($_SERVER['DOCUMENT_ROOT'] . "/integration/log_bads.txt");


                $meth = $req->checkDouble($value->characteristicId, 'offer');

                if (checkSqlError($meth)) {
                    $kols = mysqli_num_rows($meth);

                    switch ($kols) {
                        case 0:
                            $res = $req->offer($value, "insert");
                            break;
                        case 1:
                            $res = $req->offer($value, "update");
                            break;
                        default:
                            break;
                    }


                }


            }
        }

    }


    function checkSqlError($sql)
    {
        $logBad = new Logger($_SERVER['DOCUMENT_ROOT'] . "/integration/log_bads.txt");

        if (gettype($sql) == "string") {
            $logBad->log($sql);
            return false;
        } elseif (gettype($sql) == "Integer") {
            return false;
        } else return true;

    }


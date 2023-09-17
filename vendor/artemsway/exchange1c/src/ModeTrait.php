<?php

namespace ArtemsWay\Exchange1C;

use ArtemsWay\Parser1C\Parser1C;


require_once($_SERVER['DOCUMENT_ROOT'] . '/integration/reqClass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/integration/Logger.php');

use ivan\Logger;
use ivan\reqClass;

trait ModeTrait
{
    /**
     * @return string
     */
    public function modeCheckauth()
    {
        $login = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        if (!$login || !$password) {
            return $this->printFailure("Ошибка HTTP аутентификации user или password не установлены.");
        }

        if (!$response = $this->triggerEventCallback(null, compact('login', 'password'))) {
            return $this->printFailure("Доступ запрещён.");
        }

        return $this->printSuccess($response['name'] . "\n" . $response['id']);
    }

    /**
     * @return string
     */
    public function modeInit()
    {
        $dir = $this->getDir();

        $this->prepareDirectory($dir);

        $response = $this->triggerEventCallback();

        return $this->printZip($response);
    }

    /**
     * @return string
     */
    public function modeFile()
    {
        $dir = $this->getDir();

        $filePath = $dir . '/' . $this->filename;

        $file = fopen($filePath, 'ab');

        $data = file_get_contents($this->getPostSource());

        $result = fwrite($file, $data);

        $size = strlen($data);

        if ($result !== $size) {
            return $this->printFailure("Ошибка записи файла: $filePath");
        }

        if (substr($filePath, -3) == 'zip') {
            if (!$this->unzip($dir, $filePath)) {
                return $this->printFailure("Не удалось распаковать архив: $filePath");
            }
        }


        $importFile = $_SERVER["DOCUMENT_ROOT"] . "/integration/files/catalog/import.xml";
        if (file_exists($importFile)) {
            $importData = \ArtemsWay\Parser1C\Parser1C::parseImportFile($importFile);


            $this->import($importData);


            $offersFile = $_SERVER["DOCUMENT_ROOT"] . "/integration/files/catalog/offers.xml";
        }
        if (file_exists($offersFile)) {

            $offersData = \ArtemsWay\Parser1C\Parser1C::parseOffersFile($offersFile);
            $this->import($offersData);
        }


        $response = $this->triggerEventCallback(null, [$this->filename]);

        // Так как 1С не делает запрос вида type=sale&mode=import
        // Мы просто его эмулируем
        if ($this->type == 'sale') {
            $this->mode = 'import';

            return $this->modeImport();
        }


        return $this->printStatus($response);
    }

    /**
     * @return string
     */
    public function modeImport()
    {
        $file = $this->getFile();

        $type = $this->getFileType($file);

        $parser = $this->getParser($type);

        $parser = new Parser1C($file, $parser);

        $data = $parser->load()->parseAll()->getData();

        $response = $this->triggerEventCallback(null, compact('type', 'data'));

        return $this->printStatus($response);
    }

    /**
     * @return string
     */
    public function modeQuery()
    {
        $orders = $this->triggerEventCallback();

        $xml = $this->getOrdersXml($orders);

        return $this->printOrders($xml);
    }

    /**
     * @return string
     */
    public function modeSuccess()
    {
        $response = $this->triggerEventCallback();

        return $this->printStatus($response);
    }

    /**
     * @return string
     */
    public function modeDefault()
    {
        $response = $this->triggerEventCallback();

        return $this->printStatus($response);
    }


    public function import($importData)
    {
        $imof = isset($importData['offers']) ? "offers" : "import";

        $log = new Logger($_SERVER['DOCUMENT_ROOT'] . "/integration/log_tests.txt");

        $req = new reqClass();

        if ($imof == "import") {
            $req->statusOne();

            foreach ($importData["categories"] as $value) {


                $goods = $req->checkDouble($value->id, 'cat');
                if ($this->checkSqlError($goods)) {
                    $kols = mysqli_num_rows($goods);

                    switch ($kols) {
                        case 0:
                            $res = $req->cat($value, "insert");

                            if ($this->checkSqlError($res)) {
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
                if ($this->checkSqlError($goods)) {
                    $kols = mysqli_num_rows($goods);

                    switch ($kols) {
                        case 0:

                            $res = $req->good($value, "insert");

                            if ($this->checkSqlError($res)) {

                            }
                            break;
                        case 1:
                            $res = $req->setStatusZero($value->id);
                            if($res ){

                            }else{

                            }
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

                if ($this->checkSqlError($meth)) {
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


}

?>
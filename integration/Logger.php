<?
namespace ivan;
class Logger {
    private $logFile;

    public function __construct($fileName)
    {
        $this->logFile = fopen($fileName, 'a');
    }

    public function log($message)
    {
        fwrite($this->logFile, '['.date('Y-m-d H:i:s').'] '.$message.PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->logFile);
    }
}
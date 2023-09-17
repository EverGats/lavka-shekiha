<?
namespace ivan;

trait trans{
    public function transliteseo(stringG $s1){
        $s = $s1->getString();
        $logOffer= new Logger( $_SERVER['DOCUMENT_ROOT']."/integration/TEMPLOGS.txt");
        $logOffer->log($s);
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = mb_strtolower($s,'utf8'); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i','й'=>'j','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shh','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $logOffer->log($s);

        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
      
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        $logOffer->log($s);

        return $s; // возвращаем результат
    }
}
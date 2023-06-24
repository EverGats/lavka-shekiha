<?


class Product {
    private $mlPrice; 
    private $name; 
    private $description; 

      private $seo;
  
    public function __construct() {

    }
  
    public function getMl() {
        return $this->mlPrice; 
    }
  
    public function setMlPrice($ml, $price) {
        $this->mlPrice[$ml] = $price;
    }
  
    public function getName() {
        return $this->name; 
    }

    public function getSeo() {
        return $this->seo; 
    }
  
    public function setName($name) {
        $this->name = $name; 
        $seo = $this->translite($name);
    }
  
    public function getDescription() {
        return $this->description;
    }
  
    public function setDescription($description) {
        $this->description = $description;
    }
  
    

    private function translite($str){
        $table = array(
            'а'=>'a',
            'б'=>'b',
            'в'=>'v',
            'г'=>'g',
            'д'=>'d',
            'е'=>'e',
            'ё'=>'yo',
            'ж'=>'zh',
            'з'=>'z',
            'и'=>'i',
            'й'=>'j',
            'к'=>'k',
            'л'=>'l',
            'м'=>'m',
            'н'=>'n',
            'о'=>'o',
            'п'=>'p',
            'р'=>'r',
            'с'=>'s',
            'т'=>'t',
            'у'=>'u',
            'ф'=>'f',
            'х'=>'h',
            'ц'=>'c',
            'ч'=>'ch',
            'ш'=>'sh',
            'щ'=>'sch',
            'ъ'=>'',
            'ы'=>'y',
            'ь'=>'',
            'э'=>'e',
            'ю'=>'yu',
            'я'=>'ya',
            ' '=>'-'
        );
        return strtr($str,$table);
    }
  }
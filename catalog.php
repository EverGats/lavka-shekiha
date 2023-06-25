
<title>Каталог</title>
<meta name="Robots" content="NOINDEX" />
<?php
include('blocks/header_new.php');

echo"
<body>

<link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
    <div class='parfum-bg-container'>
    
        <div class='parfum-title'>
            ПАРФЮМЕРИЯ
        </div>

        <div class='parfum-blocks-container'>
        
            <div class='parfum-first-row'>
            
                <div class='parfum-block'>
                    <a class='pafrum-block-text'>Для него</a>
                    <img class='parfum-img' src='/img/parfum-man.png'>
                </div>
                
                <div class='parfum-block'>
                    <a class='pafrum-block-text'>Дня неё</a>
                    <img class='parfum-img' src='/img/parfum-woman.png'>
                </div>
            
            </div>
            
            <div class='parfum-second-row'>
            
                <div class='parfum-block'>
                    <a class='pafrum-block-text'>Для всех</a>
                    <img class='parfum-img' src='/img/parfum-unisex.png'>
                </div>
                
                <div class='parfum-block'>
                    <a class='pafrum-block-text'>Все <br>бренды</a>
                    <img class='parfum-img' src='/img/parfum-all.png'>
                </div>
            
            </div>
        
        </div>
    </div>
</body>

";

echo"

<style>

body {
  margin: 0;
}

.parfum-bg-container{
 background-color: #FFFCF1;
 width: 100%;
 overflow: hidden;
}

.parfum-blocks-container{
   margin-left: 310px;
   margin-right: 310px;

   
}

.parfum-title{
    font-family: 'TupoVyazWebBold';		
    text-align: center;
    font-size: 80px;
    letter-spacing: 25px;
}

.parfum-first-row{
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 100px;

}

.parfum-second-row{
    display: flex;
    justify-content: space-between;
    margin-bottom: 80px;

}

.parfum-block{
    
    width: 363px;
    height: 363px;
    position: relative; 
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;

}
.parfum-img{
  
}

.parfum-block::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5); /* Black color with 50% opacity */
    z-index: 1;
}

.pafrum-block-text{

    position: absolute; 
    font-size: 40px;
    color: #FFFAEE;
    font-weight: bold;
    letter-spacing: 4px;
    text-align: center;
    margin-top: 42px;
    z-index: 10;
}
 
</style>
";



include('blocks/footer_new.php');

?>
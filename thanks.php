

<title>Страница не найдена!</title>
<meta name="Robots" content="NOINDEX" />
<?


echo "
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect'' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap' rel='stylesheet''>
<link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Bold.css' type='text/css' charset='utf-8'>
<link rel='stylesheet' href='/fonts/Tupo-Vyaz/Tupo-Vyaz_Regular.css' type='text/css' charset='utf-8'>

<div class='main'>

    <div class='topPage'>
    
        <img class='topImg' src='/img/glavnaya-triangle.png'>
        
    </div>
   
    <div class='middlePage'>
    
        <a class='nf'>БЛАГОДАРИМ<br>ЗА ЗАКАЗ</a>
   
    </div>

    <div calss='bottomPage'>
        
        <img class='bottomImg' src='/img/glavnaya-triangle.png'>
        
    </div>

</div>
";

echo"
<style>

.middlePage{
    align-items: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    margin-bottom: -140px;
    margin-top: -113px;
}
.nf{
    font-weight: 500;
    font-size: 170px;
    letter-spacing: 25px;
    text-align: center;
    font-family: 'TupoVyazWebRegular';\
}

html, body {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
  color:#000000;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.main {
  background-color: #FFFAEE;
  width: 100vw; /* устанавливаем ширину в 100% от ширины экрана */
  height: 100vh; 
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden; /* прячем все, что выходит за пределы .main */
}

.topImg, .bottomImg {
  height: 100%;
  width: 100%;
  object-fit: cover;
} 

.topImg {
  transform: scaleY(-1); /* отражает изображение по вертикали */
}

 



.topImg {
  transform: scaleY(-1); /* отражает изображение по вертикали */
}

</style>


";




?>


<title>Страница не найдена!</title>
<meta name="Robots" content="NOINDEX" />
<?


echo "
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect'' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap' rel='stylesheet''>

<div class='main'>

    <div class='topPage'>
    
        <img class='topImg' src='/img/glavnaya-triangle.png'>
        
    </div>
   
    <div class='middlePage'>
    
        <a class='nf'>СТРАНИЦА В РАЗРАБОТКЕ</a>
   
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
    margin-top: -60px;
}
.nf{
    font-weight: 500;
    font-size: 100px;
    letter-spacing: 6px;
    text-align: center;
    margin-top: 40px;
}
.code{
    font-weight: 600;
    font-size: 170px;
    letter-spacing: 6px;
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

/*echo"
<style>
html, body {
margin: 0;
padding: 0;
color:#000000;
}

a.knopka_404 {
  position: relative;
  display: inline-block;
  font-size: 20px;
  font-weight: 700;
  color: #241515;
  text-decoration: none;
  text-shadow: 0 -1px 2px rgba(0,0,0,.2);
  padding: .5em 1em;
  outline: none;
  border-radius: 3px;
  border: 1px solid #241515;
  background: #dfcc7e;
  box-shadow: inset 0px 0px 1px white, 0px 1px 2px #0c558a;
  transition: .2s ease-in-out;
  bottom:14px;
  right:14px;


}

a.knopka_404:hover:not(:active) {
  background: #bca044;
}

a.knopka_404:active {
background: #bca044;
}
</style>
";*/






/*echo"
<div style='height:30px;'></div>
<div align='center'>
<div style='font-size:60px;'>Ошибка 404</div>
<div style='height:30px;'></div>
<div style='font-size:40px;'>Страница не найдена!</div>
<div style='font-size:30px;'>Страница удалена, устарела, или не существовала вовсе!</div>
<div style='height:40px;'></div>
<div><a href='/' class='knopka_404'>Вернуться на главную</a></div>
</div>";*/



?>
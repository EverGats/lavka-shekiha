

<title>Страница не найдена!</title>
<meta name="Robots" content="NOINDEX" />
<?


echo "
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect'' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap' rel='stylesheet''>

<div class='main'>

    <div class='topPage'>
    
        <img class='topImg' src='/img/404up.png'>
        
    </div>
   
    <div class='middlePage'>
    
        <a class='code'>404 <br></a>
        <a class='nf'>FILE NOT FOUND</a>
   
    </div>

    <div calss='bottomPage'>
        
        <img class='bottomImg' src='/img/404up.png'>
        
    </div>

</div>
";

echo"
<style>
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
  height: 100vh; 
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  overflow: hidden; /* прячем все, что выходит за пределы .main */
}

.topImg, .bottomImg {
  width: 100%; 
  height: 60vh; /* задаем высоту в 30% от общей высоты экрана */
  
    
}

.middlePage {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.middlePage .code {
  font-size: 20vh; /* размер шрифта в 10% от общей высоты экрана */
  font-weight: 800; 
}

.middlePage .nf {
  font-size: 10vh; /* размер шрифта в 5% от общей высоты экрана */
  font-weight: 500; 
}

.bottomImg {
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
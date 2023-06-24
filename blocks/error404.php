

<title>Страница не найдена!</title>
<meta name="Robots" content="NOINDEX" />
<?
echo"
<style>
html, body {
margin: 0;
padding: 0;
font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;
color:#000000;
}

a.knopka_404 {
  position: relative;
  display: inline-block;
  font-size: 20px;
  font-weight: 700;
  color: #5f1b13;
  text-decoration: none;
  text-shadow: 0 -1px 2px rgba(0,0,0,.2);
  padding: .5em 1em;
  outline: none;
  border-radius: 3px;
  border: 1px solid #5f1b13;
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
";


echo"
<div style='height:30px;'></div>
<div align='center'>
<div style='font-size:60px;'>Ошибка 404</div>
<div style='height:30px;'></div>
<div style='font-size:40px;'>Страница не найдена!</div>
<div style='font-size:30px;'>Страница удалена, устарела, или не существовала вовсе!</div>
<div style='height:40px;'></div>
<div><a href='/' class='knopka_404'>Вернуться на главную</a></div>
</div>";



?>
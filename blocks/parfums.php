
<title>Каталог</title>
<meta name="Robots" content="NOINDEX" />
<?php
include('blocks/header.php');

echo "
<body>

    <div class='parfum-bg-container'>
    
        <div class='title parfum-title'>
            ПАРФЮМЕРИЯ
        </div>

        <div class='container'>
        
            <div class='row'>
            
            
                <div class='parfum-block parfum-block-left col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
                    <a class='pafrum-block-text'>Для него</a>
                    <div class='image-wrapper'>
                    <img class='parfum-img' src='/img/parfum-man.png'>
                    </div>
                </div>
                
                <div class='parfum-block parfum-block-right col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
                    <a class='pafrum-block-text'>Для неё</a>
                    <div class='image-wrapper'>
                    <img class='parfum-img' src='/img/parfum-woman.png'>
                    </div>
                </div>
            
           
                <div class='parfum-block parfum-block-left col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
                    <a class='pafrum-block-text'>Для всех</a>
                    <div class='image-wrapper'>
                    <img class='parfum-img' src='/img/parfum-unisex.png'>
                    </div>
                </div>
                
                <div class='parfum-block parfum-block-right col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
                    <a class='pafrum-block-text'>Все <br>бренды</a>
                    <div class='image-wrapper'>
                    <img class='parfum-img' src='/img/parfum-all.png'>
                    </div>
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



.parfum-title{
    font-family: 'TupoVyazWebBold';		
    text-align: center;
    font-size: 80px;
    letter-spacing: 25px;
    margin-bottom: 30px;
}

.image-wrapper {
    position: relative;
    display: inline-block;
}

.image-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5); 
    z-index: 1;
}

.parfum-img {
    display: block;
    z-index: 0;
    
}

.parfum-block{
    
    
    position: relative; 
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;

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

@media(min-width: 1000px){
.parfum-block-left {
padding-left: 120px;
}
.parfum-block-right {
padding-right: 120px;
}

}
@media(max-width: 1000px){
.parfum-img{
height: 420px;
        width: 420px;
}
}

</style>
<script>
function updateMargins() {
    var blocksLeft = document.getElementsByClassName('parfum-block-left');
    var blocksRight = document.getElementsByClassName('parfum-block-right');
    if(window.innerWidth > 1000) {
        if (blocksLeft.length > 0) {
            blocksLeft[0].style.marginBottom = '80px';
        }
        if (blocksRight.length > 0) {
            blocksRight[0].style.marginBottom = '80px';
        }
        if (blocksLeft.length > 1) {
            blocksLeft[1].style.marginBottom = '30px';
        }
        if (blocksRight.length > 1) {
            blocksRight[1].style.marginBottom = '30px';
        }
    } else {
        if (blocksLeft.length > 0) {
            blocksLeft[0].style.marginBottom = '60px';
        }
        if (blocksRight.length > 0) {
            blocksRight[0].style.marginBottom = '60px';
        }
        if (blocksLeft.length > 1) {
            blocksLeft[1].style.marginBottom = '60px';
        }
        if (blocksRight.length > 1) {
            blocksRight[1].style.marginBottom = '60px';
        }
    }
}
window.onload = updateMargins;
window.onresize = updateMargins;
</script>
";



include('blocks/footer.php');

?>
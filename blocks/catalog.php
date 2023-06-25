<link rel="stylesheet" href="/style/catalog-block.css">

<div class='catalog-tovarov-bg'>
<div class="container">
    <div class='catalog-tovarov-title' style="user-select: none;">
        КАТАЛОГ <span class="tovarov">ТОВАРОВ</span>
    </div>

    <div class='catalog-tovarov-container row'>

        <div class='catalog-tovarov-block catalog-left col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>

            <a href="/catalog/parfum" class='catalog-tovarov-block-text'>Парфюмерия</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-parfum.jpg'>
            </div>

        </div>

        <div class='catalog-tovarov-block catalog-right col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
            <a class='catalog-tovarov-block-text'>Уход для<br> волос</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-hair.jpg'>
            </div>
        </div>

        <div class='catalog-tovarov-block catalog-left col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
            <a class='catalog-tovarov-block-text'>Уход для<br> лица</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-face.jpg'>
            </div>
        </div>

        <div class='catalog-tovarov-block catalog-right col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
            <a class='catalog-tovarov-block-text'>Уход для<br> тела</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-body.jpg'>
            </div>
        </div>

        <div class='catalog-tovarov-block catalog-left col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
            <a class='catalog-tovarov-block-text'>Декоративная<br>косметика</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-body.jpg'>
            </div>
        </div>

        <div class='catalog-tovarov-block catalog-right col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6'>
            <a class='catalog-tovarov-block-text'>Ароматы для<br>дома</a>
            <div class='image-wrapper'>
                <img class='catalog-tovarov-img' src='/img/glavnaya-aromati.jpg'>
            </div>
        </div>

    </div>
</div>
</div>
<script>
    function updateMargins() {
        var blocksLeft = document.getElementsByClassName('catalog-left');
        var blocksRight = document.getElementsByClassName('catalog-right');
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
    document.querySelectorAll('.catalog-tovarov-block').forEach((block) => {
        const link = block.querySelector('.catalog-tovarov-block-text').getAttribute('href');

        Array.from(block.children).forEach((child) => {
            if (child.tagName !== 'A') {
                const linkElement = document.createElement('a');
                linkElement.setAttribute('href', link);
                linkElement.appendChild(child.cloneNode(true));
                block.replaceChild(linkElement, child);
            }
        });
    });

</script>
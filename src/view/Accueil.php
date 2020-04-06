<?php
session_start();
require_once'elements/head.php';
require_once 'elements/footer.php';
head();
include'elements/nav.php'; ?>

    <h1 class="col-sm-12"> Accueil</h1>

</header>
<main id="accueil">
    <div class="col-lg-5">
        <div id="article_diapo">
            <p>Voici l'aperçu des articles écrits par la communauté. Vous aussi vous pouvez contribuer en postant les vôtres. </p>
            <div id="article">
                <img src="../../assets/img/articles/article1.jpg" class="img-thumbnail" id="diapo" alt=""/>
            </div>
            <div id="article_description">
                <a href="article.html">Les origines du foot et son évolution à travers les âges</a>
            </div>
        </div>
        <p>Toutefois en postant un article vous vous engagez à être respectueux et à ne pas publier de contenu offensant. </p>
        <p> Les pages admins sont visibles <a href="admin_cote.html">ici</a></p>
    </div>


    <div id="chat" class="d_none col-lg-5 bg-light-gray">
        <form id="formChat">
            <input type="text" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg"/>
            <input type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm "/>
        </form>
        <div id="zoneChat">
            <p class="bg-dark msgChat"> @Audrey le 16/02/20 à 10h30<br/>Bla BLZA VKSEDJFSOJFOSHJOHSF JPEJ PJEF J EPI J£J ZO£J F£J£ FJ </p>
            <p class="bg-dark msgChat"> @juzja le 16/02/20 à 10h10<br/> kjzzd hg HZUYdih iizi$ dzhdzeig ii uizh odzo jdzohd </p>
            <p class="bg-dark msgChat">@JAYGL le 16/02/20 à 10h03<br/> lzidzhgi ohzd ihdjzhd hdzighdg hi zdh iz hpih zphd hpozh dp</p>
        </div>
    </div>
    <script type="text/javascript" src="../../assets/js/diapo_article.js"></script>
<?php
footer();
?>

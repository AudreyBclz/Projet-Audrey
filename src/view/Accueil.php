<?php
session_start();
require_once'elements/head.php';
require_once 'elements/footer.php';
head();
include'elements/nav.php';
require_once '../controller/function.php';

$bdd=dbconnect();
$sql1erArticle='SELECT * FROM article
                WHERE verified=1
                LIMIT 0,1';
$req1erArticle=$bdd->prepare($sql1erArticle);
$req1erArticle->execute();
$tab_1erarticle=array();
while($data=$req1erArticle->fetchObject())
{
    array_push($tab_1erarticle,$data);
}
$sqlCompteArt='SELECT COUNT(*) as nbArt FROM article
               WHERE verified=1';
$reqCompteArt=$bdd->prepare($sqlCompteArt);
$reqCompteArt->execute();
$tab_compte=array();
while($data=$reqCompteArt->fetchObject())
{
    array_push($tab_compte,$data);
}
$nbArticle=intval($tab_compte[0]->nbArt);

$sqlArticle='SELECT * FROM article
             WHERE verified=1
             LIMIT 1,'.$nbArticle;
$reqArticle=$bdd->prepare($sqlArticle);
$reqArticle->execute();
$tab_article=array();
while($data=$reqArticle->fetchObject())
{
    array_push($tab_article,$data);
}
?>

    <h1 class="col-sm-12"> Accueil</h1>

</header>
<main id="accueil">
    <div class="col-lg-5">
        <div id="article_diapo">
            <p>Voici l'aperçu des articles écrits par la communauté. Vous aussi vous pouvez contribuer en postant les vôtres. </p>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($tab_1erarticle as $article1er)
                        { ?>
                    <div class="carousel-item active">
                        <img class="d-block img-thumbnail" src="../../assets/img/articles/articles<?= $article1er->ID ?><?= $article1er->suffix ?>" alt="..">
                        <div id="article_description">
                            <form method="get" action="article.php">
                                <input type="number" name="id" value="<?= $article1er->ID ?>" class="d-none">
                                <button type="submit" class="bouton text-light"><?= $article1er->title ?></button>
                            </form>
                        </div>
                    </div>
                   <?php }
                   foreach ($tab_article as $article)
                    { ?>
                        <div class="carousel-item">
                            <img class="d-block img-thumbnail" src="../../assets/img/articles/articles<?= $article->ID ?><?= $article->suffix ?>" alt="..">
                            <div id="article_description">
                                <form method="get" action="article.php">
                                    <input type="number" name="id" value="<?= $article->ID ?>" class="d-none">
                                    <button type="submit" class="bouton text-light"><?= $article->title ?></button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <p>Toutefois en postant un article vous vous engagez à être respectueux et à ne pas publier de contenu offensant. </p>
        <p> Les pages admins sont visibles <a href="admin_cote.html">ici</a></p>
    </div>


    <div id="chat" class="d_none col-lg-5 bg-light-gray">
        <form id="formChat">
            <input type="text" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg"/>
            <button type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm ">Envoyer</button>
        </form>
        <div id="zoneChat">
            <p class="bg-dark msgChat"> @Audrey le 16/02/20 à 10h30<br/>Bla BLZA VKSEDJFSOJFOSHJOHSF JPEJ PJEF J EPI J£J ZO£J F£J£ FJ </p>
            <p class="bg-dark msgChat"> @juzja le 16/02/20 à 10h10<br/> kjzzd hg HZUYdih iizi$ dzhdzeig ii uizh odzo jdzohd </p>
            <p class="bg-dark msgChat">@JAYGL le 16/02/20 à 10h03<br/> lzidzhgi ohzd ihdjzhd hdzighdg hi zdh iz hpih zphd hpozh dp</p>
        </div>
    </div>
<!--    <script type="text/javascript" src="../../assets/js/diapo_article.js"></script>-->
<?php
footer();
?>

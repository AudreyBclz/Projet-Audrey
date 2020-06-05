<?php
require'src/controller/function.php';
require_once'src/view/elements/head.php';
require_once 'src/view/elements/footer.php';
require_once 'src/controller/function.php';
head();
$bdd=dbconnect();
connect();
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="assets/css/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/normalisation.css" rel="stylesheet"/>
    <link href="assets/css/PC.css" rel="stylesheet"/>
    <link href="assets/css/Tablette.css" rel="stylesheet"/>
    <link href="assets/css/MOB.css" rel="stylesheet"/>

    <title>Les Pronos Stickers!!</title>
</head>
<body>

<header>
        <h1 class="col-sm-12"> Bienvenue chez les Pronos Stickers!</h1>
    </header>

    <main class="col-sm-12">
        <div id="index_pc" class="f">
            <div id="paragraphe" class="col-lg-6">
                <p class="marg-bottom-10">Ici Vous trouverez des gens sympas et passionnés qui vous permettront de partager des bons moments et des bons tuyaux niveau pronostic :)</p>
                <p class="d_none">Vous voulez nous rejoindre? Lire les articles? Cliquer <a href="src/view/inscription.php">ici</a></p>
            </div>
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($tab_1erarticle as $article1er)
                        { ?>
                            <div class="carousel-item active">
                                <img class="d-block img-thumbnail" src="assets/img/articles/articles<?= $article1er->idarticle ?><?= $article1er->suffix ?>" alt="..">
                                <div id="article_description">
                                    <span><?= $article1er->title ?></span>
                                </div>
                            </div>
                        <?php }
                        foreach ($tab_article as $article)
                        { ?>
                            <div class="carousel-item">
                                <img class="d-block img-thumbnail" src="assets/img/articles/articles<?= $article->idarticle ?><?= $article->suffix ?>" alt="..">
                                <div id="article_description">
                                    <span><?= $article->title ?></span>
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
        </div>
        <div id="connexion">
            <p> Pour vous inscrire <a href="src/view/inscription.php">cliquer ici</a></p>
            <form method="post" action="inscription.php">
                <fieldset class="bg-dark">
                    <div class="form-group">
                        <legend>Pour vous connecter c'est par ici!</legend>
                        <div class="row justify-content-center">
                            <label for="pseudo" class="col-form-label-sm">Pseudo </label>
                            <input type="text" id="pseudo" class="form-control-sm" name="pseudo" required="required"/><br/>
                        </div>
                        <div class="row justify-content-center">
                            <label for="MdP" class="col-form-label-sm"> Mot de passe</label>
                            <input type="password" id="MdP" class="pass form-control-sm" name="MdP" required="required"/><br/>
                        </div>
                        <div class="row">
                            <input type="submit" value="Connexion" id="co" class="btn-danger" name="connexion"/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <img src="assets/img/logo.png" id="logo"/>
    </main>

<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="assets/js/Bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/controlProno.js"></script>
<script type="text/javascript" src="assets/js/controle_form.js"></script>
<!--<script type="text/javascript" src="assets/js/diapo_article_i.js"></script>-->
</body>
</html>


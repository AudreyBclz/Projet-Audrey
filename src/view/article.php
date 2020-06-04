<?php
session_start();
require '../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
include 'elements/nav.php';

$bdd=dbconnect();

$sqlSelArticle='SELECT * FROM article WHERE ID=:id_a';
$reqSelArticle=$bdd->prepare($sqlSelArticle);
$reqSelArticle->bindParam(':id_a',$_GET['id']);
$reqSelArticle->execute();
$tab_article=array();
while($data=$reqSelArticle->fetchObject())
{
    array_push($tab_article,$data);
}
?>

    <h1 class="col-sm-12 mb-5"><?= $tab_article[0]->title ?></h1>
</header>
<main class="d-flex flex-column justify-content-center align-items-center">
    <div id="article">
        <img src="../../assets/img/articles/articles<?= $tab_article[0]->ID ?>" class="img-fluid img-thumbnail" alt=""/>
    </div>
    <div id="contenu_article" class="mt-5">
        <p><?= $tab_article[0]->content ?></p>
        <p>Ecrit par :<span class="font-weight-bold"><?= $tab_article[0]->pseudo ?></span></p>
    </div>

<?php
footer();

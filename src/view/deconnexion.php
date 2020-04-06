<?php
session_start();
require_once'elements/head.php';
require_once 'elements/footer.php';
head();
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" user-scalable="no">
    <link href="../../assets/css/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="../../assets/css/normalisation.css" rel="stylesheet"/>
    <link href="../../assets/css/PC.css" rel="stylesheet"/>
    <link href="../../assets/css/Tablette.css" rel="stylesheet"/>
    <link href="../../assets/css/MOB.css" rel="stylesheet"/>



    <title>Les Pronos Stickers!!</title>
</head>
<body>

<header class="position-relative">
    <?php include'elements/nav.php';?>
</header>
<div class="fin text-center">
    <h1 class="col-sm-12 px-0"> Vous nous quittez déjà?</h1>
    <h1 class="col-sm-12 px-0"> C'est une erreur? <br/>Cliquez-ici</h1>
    <a href="Accueil.php" class="btn btn-danger reconnection">I'm back!</a>
    <h1 class="mb-1">Sinon cliquer sur le logo. <br/>A très bientôt!</h1>
    <a href="confirmation_deco.php"><img src="../../assets/img/logo.png" id="logo"/></a>
</div>
<main class="col-sm-12">

<?php
footer();
?>

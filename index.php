<?php
require'src/controller/function.php';
require_once'src/view/elements/head.php';
require_once 'src/view/elements/footer.php';
head();
connect();
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
                <div id="article_diapo" class="d_none">
                    <div id="article">
                        <img src="assets/img/articles/article1.jpg" class="img-thumbnail" id="diapo" alt=""/>
                    </div>
                    <div id="article_description">
                        Les origines du foot et son évolution à travers les âges
                    </div>
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
<script type="text/javascript" src="assets/js/diapo_article_i.js"></script>
</body>
</html>


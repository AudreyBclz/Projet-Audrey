<?php
session_start();
$indice=1;
require ('../../src/controller/function.php');
post_article();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="../../assets/css/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="../../assets/css/normalisation.css" rel="stylesheet"/>
    <link href="../../assets/css/PC.css" rel="stylesheet"/>
    <link href="../../assets/css/MOB.css" rel="stylesheet"/>
    <link href="../../assets/css/Tablette.css" rel="stylesheet"/>



    <title>Les Pronos Stickers!!</title>
</head>
<body>

<header>
   <?php include ('nav.php')?>
    <h1>Poster un article</h1>
    <main id="main">
        <div class="col-lg-6">
            <form method="post" action="Post_Article.php" enctype="multipart/form-data">
                <fieldset class="bg-dark">
                    <div class="form-group justify-content-center">
                        <label for="titre" class="col-form-label-sm col-sm-12">Quel est le titre de votre article? </label>
                        <input type="text" id="titre" class="form-control-sm" name="title"/><br/>
                        <label for="contenu" class="col-form-label-sm col-sm-12">Entrer son contenu:</label>
                        <textarea id="contenu" name="content" rows="5"></textarea>
                        <label for="image" class="col-form-label-sm col-sm-12">Image (JPG,PNG)</label>
                        <input type="file" class="form-control-file" name="picture" id="image"/><br/>
                        <input type="submit" value="Envoyer" name="envoi" class="btn-danger"/>
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="chat" class="d_none col-lg-5 bg-light-gray">
            <form id="formChat" method="post" action="Post_Article.php">
                <input type="text" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg"/>
                <input type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm "/>
            </form>
            <div id="zoneChat">
                <p class="bg-dark msgChat"> @Audrey le 16/02/20 à 10h30<br/>Bla BLZA VKSEDJFSOJFOSHJOHSF JPEJ PJEF J EPI J£J ZO£J F£J£ FJ </p>
                <p class="bg-dark msgChat"> @juzja le 16/02/20 à 10h10<br/> kjzzd hg HZUYdih iizi$ dzhdzeig ii uizh odzo jdzohd </p>
                <p class="bg-dark msgChat">@JAYGL le 16/02/20 à 10h03<br/> lzidzhgi ohzd ihdjzhd hdzighdg hi zdh iz hpih zphd hpozh dp</p>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="../../assets/js/popper.min.js" ></script>
    <script type="text/javascript" src="../../assets/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../../assets/js/Bootstrap/bootstrap.js"></script>
</body>
</html>

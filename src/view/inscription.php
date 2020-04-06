<?php
session_start();
require'../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
inscription();
connect();

?>

    <h1 class="col-sm-12"> Bienvenue chez les Pronos Stickers!</h1>
    <p class="col-sm-12 text-justify mb-5">Ici Vous trouverez des gens sympas et passionnés qui vous permettront de partager des bons moments et des bons tuyaux niveau pronostic :) </p>
</header>
<main>
    <div id="formulaire">
        <form class="col-lg-4" id="form_inscription" method="post" action="inscription.php">
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend>Rejoins nous on est bien!</legend>
                    <div class="row justify-content-center">
                        <label for="pseudo" class="col-form-label-sm">Pseudo </label>
                        <input type="text" id="pseudo" class="form-control-sm" name="pseudo" required="required"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="email" class="col-form-label-sm">Adresse mail</label>
                        <input type="email"id="email" class="form-control-sm" name="mail" required="required"><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="conf_email" class="col-form-label-sm">Confirmer mail</label>
                        <input type="email"id="conf_email" class="form-control-sm" name="conf_mail" required="required"><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="MdP" class="col-form-label-sm"> Mot de passe*</label>
                        <input type="password" id="MdP" class="form-control-sm" name="pass" required="required"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="conf_MdP" class="col-form-label-sm"> Confirmation mot de passe</label>
                        <input type="password" id="conf_MdP" class="form-control-sm" name="conf_pass" required="required"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="robot" class="col-form-label-sm">Je ne suis pas un robot</label>
                        <input type="checkbox" id="robot" value="notRobot" required="required"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <input type="button" value="Inscription" id="inscription" class="btn-danger" name="inscription"/>
                    </div>
                </div>
                <p class="font-weight-lighter" id="asterisque">* Votre mot de passe doit contenir 6 caractères minimum</p>
            </fieldset>
        </form>
        <form class="col-lg-4 d_none" method="post" action="inscription.php">
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend>Pour vous connecter c'est par ici!</legend>
                    <div class="row justify-content-center">
                        <label for="pseudo_co" class="col-form-label-sm">Pseudo </label>
                        <input type="text" id="pseudo_co" class="form-control-sm" name="pseudo_co"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <label for="MdP_co" class="col-form-label-sm"> Mot de passe</label>
                        <input type="password" id="MdP_co" class="pass form-control-sm" name="password_co"/><br/>
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" value="Connexion" id="connect" class="btn-danger"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <img src="../../assets/img/logo.png" id="logo"/>
<?php
footer();
?>

<?php
session_start();
$balance =$_SESSION['balance'];
$pseudo=$_SESSION['pseudo'];
require'../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
include('elements/nav.php');

$bdd=dbconnect();
$sqlCompte='SELECT *,COUNT(*) AS nbJour FROM adminCote';
$reqCompte=$bdd->prepare($sqlCompte);
$reqCompte->execute();
$tab_compte=array();
while($data=$reqCompte->fetchObject())
{
    array_push($tab_compte,$data);
}

if(empty($tab_compte))
{
    echo '<div class="alert-info">Les cotes ne sont pas encore disponibles pour parier</div>';
}
else
{
    $nbJour=intval($tab_compte[0]->nbJour)-1;
    $sqlSelDernierJr='SELECT * FROM adminCote
                      LIMIT '.$nbJour.',1';
    $reqSelDernierJr=$bdd->prepare($sqlSelDernierJr);
    $reqSelDernierJr->execute();
    $tab_dernier=array();
    while($data=$reqSelDernierJr->fetchObject())
    {
        array_push($tab_dernier,$data);
    }
}
?>
<h1>Cote de la semaine</h1>
</header>
<main>
    <div id="prono-cote">
            <?php if(!empty($tab_dernier))
            { ?>
                <form class="col-lg-5 prono-pc">
                    <select name="journee" class="rounded-0 mb-3 w-25 m-auto" readonly="readonly">
                        <option  class="m-auto" value="<?= $tab_dernier[0]->journeeCote ?>">J<?= $tab_dernier[0]->journeeCote ?></option>
                    </select>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-1">Match 1</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match1Equipe1 ?> " class="m-1  text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match1Equipe2 ?>" class="m-1  text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30">Victoire </label>
                                <label class="col-form-label-sm w-30">Nul</label>
                                <label class="col-form-label-sm w-30">Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match1CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match1CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match1CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-2">Match 2</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match2Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match2Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match2CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match2CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match2CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 3</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match3Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match3Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match3CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match3CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match3CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 4</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match4Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match4Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match4CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match4CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match4CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 5</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match5Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match5Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match5CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match5CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match5CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 6</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match6Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match6Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match6CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match6CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match6CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 7</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match7Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match7Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match7CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match7CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match7CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 8</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match8Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match8Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match8CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match8CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match8CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 9</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match9Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match9Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match9CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match9CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match9CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-dark">
                        <div class="form-group">
                            <legend class="pt-3">Match 10</legend>
                            <div class="row label justify-content-around">
                                <input type="text" placeholder="Equipe 1" value="<?= $tab_dernier[0]->match10Equipe1 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <input type="text" placeholder="Equipe 2" value="<?= $tab_dernier[0]->match10Equipe2 ?>" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                                <label class="col-form-label-sm w-30"> Victoire </label>
                                <label class="col-form-label-sm w-30"> Nul</label>
                                <label class="col-form-label-sm w-30"> Défaite</label>
                            </div>
                            <div class="row check mb-sm-2 pb-4">
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match10CoteV ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match10CoteN ?>" readonly="readonly"/>
                                <input type="text" class="form-control-sm decimal_tab decimal w-25 text-center" value="<?= $tab_dernier[0]->match10CoteD ?>" readonly="readonly"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            <?php } ?>
    </div>
    <?php
    footer();
    ?>


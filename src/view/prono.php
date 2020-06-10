<?php
session_start();
$balance =$_SESSION['balance'];
$pseudo=$_SESSION['pseudo'];
require'../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
prono_record();
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

    $sqlSelProno='SELECT * FROM prono
              WHERE journeeProno=:jour';
    $reqSelProno=$bdd->prepare($sqlSelProno);
    $reqSelProno->bindParam(':jour',$tab_dernier[0]->journeeCote);
    $reqSelProno->execute();
    $tab_prono=array();
    while($data=$reqSelProno->fetchObject())
    {
        array_push($tab_prono, $data);
    }
}
?>
    <h1>Pronostic de la semaine</h1>
</header>
<main>
    <div id="prono-cote">
        <?php if(empty($tab_dernier))
            {
                echo 'Veuillez attendre que les cotes soient renseignée par l\'administrateur.';
            }else{ ?>
        <form class="col-lg-5 prono-pc" id="formulaire" method="post" action="prono.php">
            <div>
                <select name="journee" class="rounded-0 mb-3 w-25" readonly="readonly">
                    <option value="<?= $tab_dernier[0]->journeeCote ?>">J<?= $tab_dernier[0]->journeeCote ?></option>
                </select>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 1</legend>
                        <div class="row label text-center justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check ">
                            <input type="radio" value="1Equipe1" name="match1"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match1,"1Equipe1","checked");} ?>/>
                            <input type="radio" value="1Nul" name="match1"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match1,"1Nul","checked");} ?>/>
                            <input type="radio" value="1Equipe2" name="match1"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match1,"1Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount1" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount1;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 2</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="2Equipe1" name="match2"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match2,"2Equipe1","checked");} ?>/>
                            <input type="radio" value="2Nul" name="match2"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match2,"2Nul","checked");} ?>/>
                            <input type="radio" value="2Equipe2" name="match2"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match2,"2Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount2" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount2;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 3</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="3Equipe1" name="match3"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match3,"3Equipe1","checked");} ?>/>
                            <input type="radio" value="3Nul" name="match3"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match3,"3Nul","checked");} ?>/>
                            <input type="radio" value="3Equipe2" name="match3"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match3,"3Equipe2","checked");} ?>/>

                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount3" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount3;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 4</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="4Equipe1" name="match4"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match4,"4Equipe1","checked");} ?>/>
                            <input type="radio" value="4Nul" name="match4"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match4,"4Nul","checked");} ?>/>
                            <input type="radio" value="4Equipe2" name="match4"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match4,"4Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount4" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount4;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 5</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="5Equipe1" name="match5"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match5,"5Equipe1","checked");} ?>/>
                            <input type="radio" value="5Nul" name="match5"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match5,"5Nul","checked");} ?>>
                            <input type="radio" value="5Equipe2" name="match5"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match5,"5Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount5" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount5;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 6</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="6Equipe1" name="match6"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match6,"6Equipe1","checked");} ?>/>
                            <input type="radio" value="6Nul" name="match6"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match6,"6Nul","checked");} ?>/>
                            <input type="radio" value="6Equipe2" name="match6"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match6,"6Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount6" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount6;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 7</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="7Equipe1" name="match7"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match7,"7Equipe1","checked");} ?>/>
                            <input type="radio" value="7Nul" name="match7"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match7,"7Nul","checked");} ?>/>
                            <input type="radio" value="7Equipe2" name="match7"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match7,"7Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount7" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount7;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 8</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="8Equipe1" name="match8"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match8,"8Equipe1","checked");} ?>/>
                            <input type="radio" value="8Nul"  name="match8"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match8,"8Nul","checked");} ?>/>
                            <input type="radio" value="8Equipe2" name="match8"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match8,"8Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount8" class="form-control-sm decimal"value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount8;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 9</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="9Equipe1" name="match9"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match9,"9Equipe1","checked");} ?>/>
                            <input type="radio" value="9Nul" name="match9"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match9,"9Nul","checked");} ?>/>
                            <input type="radio" value="9Equipe2"name="match9"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match9,"9Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount9" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount9;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 10</legend>
                        <div class="row label justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check">
                            <input type="radio" value="10Equipe1" name="match10"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match10,"10Equipe1","checked");} ?>/>
                            <input type="radio" value="10Nul" name="match10"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match10,"10Nul","checked");} ?>/>
                            <input type="radio" value="10Equipe2" name="match10"<?php if(!empty($tab_prono)){ aff_SelProno($tab_prono[0]->match10,"10Equipe2","checked");} ?>/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount10" class="form-control-sm decimal" value="<?php if(!empty($tab_prono)){echo $tab_prono[0]->mount10;} ?>"/>
                        </div>
                    </div>
                </fieldset>
                <div class="row justify-content-sm-center w-100">
                    <?php if (empty($tab_prono)){ ?><input type="submit" value="Parier" name="envoi" class="btn-danger w-50" id="parier"/><?php } ?>
                </div>
            </div>
        </form>
        <?php if(!empty($tab_compte))
            { ?>
        <form class="col-lg-5 d_none prono-pc">
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
        <?php } }?>
    </div>
<?php
footer();
?>

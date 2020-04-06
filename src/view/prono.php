<?php
session_start();
$balance =$_SESSION['balance'];
$pseudo=$_SESSION['pseudo'];
require'../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
prono_record();
include('elements/nav.php');?>
    <h1>Pronostic de la semaine</h1>
</header>
<main>
    <div id="prono-cote">
        <form class="col-lg-5 prono-pc" id="formulaire" method="post" action="prono.php">
            <div>
                <fieldset class="bg-dark pad-0">
                    <div class="form-group bg-dark">
                        <legend class="text-center">Match 1</legend>
                        <div class="row label text-center justify-content-between">
                            <label class="col-form-label-sm">Equipe 1</label>
                            <label class="col-form-label-sm">Nul </label>
                            <label class="col-form-label-sm">Equipe 2</label>
                        </div>
                        <div class="row-content check ">
                            <input type="radio" value="1Equipe1" name="match1"/>
                            <input type="radio" value="1Nul" name="match1"/>
                            <input type="radio" value="1Equipe2" name="match1"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount1" class="form-control-sm decimal"/>
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
                            <input type="radio" value="2Equipe1" name="match2"/>
                            <input type="radio" value="2Nul" name="match2"/>
                            <input type="radio" value="2Equipe2" name="match2"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount2" class="form-control-sm decimal"/>
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
                            <input type="radio" value="3Equipe1" name="match3"/>
                            <input type="radio" value="3Nul" name="match3"/>
                            <input type="radio" value="3Equipe2" name="match3"/>

                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount3" class="form-control-sm decimal"/>
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
                            <input type="radio" value="4Equipe1" name="match4"/>
                            <input type="radio" value="4Nul" name="match4"/>
                            <input type="radio" value="4Equipe2" name="match4"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount4" class="form-control-sm decimal"/>
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
                            <input type="radio" value="5Equipe1" name="match5"/>
                            <input type="radio" value="5Nul" name="match5"/>
                            <input type="radio" value="5Equipe2" name="match5"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount5" class="form-control-sm decimal"/>
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
                            <input type="radio" value="6Equipe1" name="match6"/>
                            <input type="radio" value="6Nul" name="match6"/>
                            <input type="radio" value="6Equipe2" name="match6"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount6" class="form-control-sm decimal"/>
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
                            <input type="radio" value="7Equipe1" name="match7"/>
                            <input type="radio" value="7Nul" name="match7"/>
                            <input type="radio" value="7Equipe2" name="match7"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount7" class="form-control-sm decimal"/>
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
                            <input type="radio" value="8Equipe1" name="match8"/>
                            <input type="radio" value="8Nul"  name="match8"/>
                            <input type="radio" value="8Equipe2" name="match8"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount8" class="form-control-sm decimal"/>
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
                            <input type="radio" value="9Equipe1" name="match9"/>
                            <input type="radio" value="9Nul" name="match9"/>
                            <input type="radio" value="9Equipe2"name="match9"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount9" class="form-control-sm decimal"/>
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
                            <input type="radio" value="10Equipe1" name="match10"/>
                            <input type="radio" value="10Nul" name="match10"/>
                            <input type="radio" value="10Equipe2" name="match10"/>
                        </div>
                        <div class="ligne-decimal justify-content-center">
                            <label class="col-form-label-sm">Montant parié</label>
                            <input type="text" name="mount10" class="form-control-sm decimal"/>
                        </div>
                    </div>
                </fieldset>
                <div class="row justify-content-sm-center w-100">
                    <input type="submit" value="Parier" name="envoi" class="btn-danger w-50" id="parier"/>
                </div>
            </div>
        </form>
        <form class="col-lg-5 d_none prono-pc">
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-1">Match 1</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1  text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1  text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30">Victoire </label>
                        <label class="col-form-label-sm w-30">Nul</label>
                        <label class="col-form-label-sm w-30">Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-2">Match 2</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 3</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 4</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 5</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 6</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 7</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 8</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 9</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <fieldset class="bg-dark">
                <div class="form-group">
                    <legend class="pt-3">Match 10</legend>
                    <div class="row label justify-content-around">
                        <input type="text" placeholder="Equipe 1" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <input type="text" placeholder="Equipe 2" class="m-1 text-center form-control-sm w-40" readonly="readonly"/>
                        <label class="col-form-label-sm w-30"> Victoire </label>
                        <label class="col-form-label-sm w-30"> Nul</label>
                        <label class="col-form-label-sm w-30"> Défaite</label>
                    </div>
                    <div class="row check mb-sm-2 pb-4">
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                        <input type="text" class="form-control-sm decimal_tab decimal w-25" readonly="readonly"/>
                    </div>
                </div>
            </fieldset>
            <div class="row mt-3 justify-content-sm-center w-100">
                <input type="submit" value="Envoyer" name="envoi" class="btn-danger w-50"/>
            </div>
        </form>
    </div>
<?php
footer();
?>

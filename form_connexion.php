<?php
include('dbconnect.php');
$connected=false;
$reponse=$bdd->query('SELECT pseudo,password FROM member_list');
if (isset($_POST['pseudo_co']) AND isset($_POST['password_co']))
{
    while ($donnees=$reponse->fetch())
    {
        if($donnees['pseudo']==$_POST['pseudo_co'] AND password_verify($_POST['password_co'],$donnees['password']))
        {
            $connected=true;
            header('Location:Accueil.html');
            echo'<span class="alert-success">connexion réussie</span>';
        }
    }
    if(!$connected)
    {
        header('Location:');
        echo'<span class=alert-info">Erreur veuillez entrer le bon pseudo ou mot de passe</span>';
    }
}

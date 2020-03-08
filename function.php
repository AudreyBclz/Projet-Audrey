<?php

function inscription()
{
    include('dbconnect.php');
    $notListed=true;
    $reponse=$bdd->query('SELECT pseudo,mail FROM member_list');
    if (isset($_POST['mail']) AND isset($_POST['pseudo']) AND isset($_POST['pass'])) {
        while ($donnees = $reponse->fetch()) {

            if ($donnees['pseudo'] == $_POST['pseudo']) {
                $notListed = false;
                echo '<span class="alert-info">Pseudo déjà utilisé, veuillez réessayer.</span>';
            } elseif ($donnees['mail'] == $_POST['mail']) {
                $notListed = false;
                echo '<span class="alert-info">Email déjà utilisé, veuillez réessayer.</span>';
            }
        }

        $reponse->closeCursor();
        if ($notListed) {
            $pseudo = strip_tags($_POST['pseudo']);
            $mdp = strip_tags(password_hash($_POST['pass'], PASSWORD_DEFAULT));
            $email = $_POST['mail'];
            $request = $bdd->prepare('INSERT INTO member_list(pseudo,mail,password)VALUES(:pseudo,:mail,:password)');
            $request->execute(array(
                'pseudo' => $pseudo,
                'mail' => $email,
                'password' => $mdp
            ));
            echo '<span class="alert-success">Votre inscription a bien été enregistrée</span>';
            $request->closeCursor();
        }
    }
}

function connect()
{
    include('dbconnect.php');
    $connected = false;
    $reponse = $bdd->query('SELECT pseudo,password,balance FROM member_list');
    if (isset($_POST['pseudo_co']) AND isset($_POST['password_co']))
    {
        while ($donnees = $reponse->fetch())
        {
            if ($donnees['pseudo'] == $_POST['pseudo_co'] AND password_verify($_POST['password_co'], $donnees['password']))
            {
                $connected = true;
                session_start();
                $_SESSION['pseudo']=$donnees['pseudo'];
                $_SESSION['balance']=$donnees['balance'];
                header('Location: Accueil.html');
            }
        }
        if (!$connected)
        {
            echo '<span class="alert-info">Erreur dans le pseudo ou le mot de passe</span>';
        }
    }
}



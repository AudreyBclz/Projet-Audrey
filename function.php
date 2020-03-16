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
                header('Location: Accueil.php');
            }
        }
        if (!$connected)
        {
            echo '<span class="alert-info">Erreur dans le pseudo ou le mot de passe</span>';
        }
    }
}

function prono_record()
{
    $sumMount=0;
    $balance_remain=0;
    $exist=true;
    include ('dbconnect.php');
    $request=$bdd->prepare('SELECT pseudo FROM prono_user WHERE pseudo=:pseudo');
    $request->execute(array(
        'pseudo'=>$_SESSION['pseudo']
    ));
    $result=$request->fetch();
    if ($_SESSION['pseudo']==$result['pseudo'])
    {
        echo'<span class="alert-warning">Vous avez déjà parier pour cette session</span>';
    }

    else
    {
        for ($i=1;$i<=10;$i++)
        {
            if(!(isset($_POST['match'.$i])))
            {
                $exist=false;
            }
        }
        if($exist)
        {
            $request->closeCursor();
            $request=$bdd->prepare('SELECT balance FROM member_list WHERE pseudo=:pseudo');
            $request->execute(array(
                'pseudo'=>$_SESSION['pseudo']
            ));
            $result=$request->fetch();
            for($i=1;$i<=10;$i++)
            {
                $sumMount=$sumMount+$_POST['mount'.$i];
            }
            if($sumMount>$result['balance'])
            {
                echo'<span class="alert-warning">Le montant parié est supérieur à vos crédits. Veuillez recommencer</span>';
            }
            else
            {
                $balance_remain=$result['balance']-$sumMount;
                $request->closeCursor();
                $request=$bdd->prepare('INSERT INTO prono_user(pseudo,match1,mount1,match2,mount2,match3,mount3,match4,mount4,match5,mount5,match6,mount6,match7,mount7,match8,mount8,match9,mount9,match10,mount10)
        VALUES(:pseudo,:match1,:mount1,:match2,:mount2,:match3,:mount3,:match4,:mount4,:match5,:mount5,:match6,:mount6,:match7,:mount7,:match8,:mount8,:match9,:mount9,:match10,:mount10)');
                $request->execute(array(
                    'pseudo'=>$_SESSION['pseudo'],
                    'match1'=>$_POST['match1'],
                    'mount1'=>$_POST['mount1'],
                    'match2'=>$_POST['match2'],
                    'mount2'=>$_POST['mount2'],
                    'match3'=>$_POST['match3'],
                    'mount3'=>$_POST['mount3'],
                    'match4'=>$_POST['match4'],
                    'mount4'=>$_POST['mount4'],
                    'match5'=>$_POST['match5'],
                    'mount5'=>$_POST['mount5'],
                    'match6'=>$_POST['match6'],
                    'mount6'=>$_POST['mount6'],
                    'match7'=>$_POST['match7'],
                    'mount7'=>$_POST['mount7'],
                    'match8'=>$_POST['match8'],
                    'mount8'=>$_POST['mount8'],
                    'match9'=>$_POST['match9'],
                    'mount9'=>$_POST['mount9'],
                    'match10'=>$_POST['match10'],
                    'mount10'=>$_POST['mount10']
                ));
                $request->closeCursor();
                $request=$bdd->prepare('UPDATE member_list SET balance= :balance WHERE pseudo= :pseudo');
                $request->execute(array(
                    'balance'=>$balance_remain,
                    'pseudo'=>$_SESSION['pseudo']
                ));
                $_SESSION['balance']=$balance_remain;
                echo'<span class="alert-info">Votre pronostic a bien été enregistré</span>';
            }

        }
    }

}
$indice=1;
function post_article()
{
    include ('dbconnect.php');
    if(isset($_POST["title"]) AND isset($_POST["content"]) AND isset($_FILES["picture"]))
    {
        if($_POST["title"]==="" || $_POST["content"]==="")
        {
            echo'<span class="alert-warning"> Veuillez remplir tous les champs.</span>';
        }
        if(!($_FILES["picture"]['type']=='image/jpeg' OR $_FILES["picture"]['type']=='image/png'))
        {
            echo'<span class="alert-warning">Seul les formats JPEG et PNG sont acceptés, trouvez une autre image</span>';
        }
        else
        {
            move_uploaded_file($_FILES['picture']['name'],'img/articles');
            if ($_FILES["picture"]['type']=='image/jpeg')
            {
                $chemin=$_FILES['picture']['name'].'.jpg';
            }
            else
            {
                $chemin=$_FILES['picture']['name'].'.png';
            }
        }
    }

}



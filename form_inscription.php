<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
try{
    $bdd=new PDO('mysql:host=localhost;dbname=projet-Audrey;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur: '.$e->getMessage());
}
$notListed=true;
$reponse=$bdd->query('SELECT pseudo,mail FROM member_list');
while ($donnees=$reponse->fetch())
{
    if($donnees['pseudo']==$_POST['pseudo'])
    {
        $notListed=false;
        echo 'Pseudo déjà utilisé, veuillez réessayer.<br/> veuillez réessayer';
    }
    elseif ($donnees['mail']==$_POST['mail'])
    {
        $notListed=false;
        echo 'Email déjà utilisé, veuillez réessayer.<br/>';
    }
}
$reponse->closeCursor();
if($notListed)
{
    $pseudo=$_POST['pseudo'];
    $mdp=password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $email=$_POST['mail'];
    $requete=$bdd->prepare('INSERT INTO member_list(pseudo,mail,password)VALUES(:pseudo,:mail,:password)');
    $requete->execute(array(
        'pseudo'=>$pseudo,
        'mail'=>$email,
        'password'=>$mdp
    ));
    echo'Votre inscription a bien été enregistrée';
    $requete->closeCursor();
}
?>
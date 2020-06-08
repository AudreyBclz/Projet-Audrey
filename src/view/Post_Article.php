<?php
session_start();
require '../../src/controller/function.php';
require_once 'elements/head.php';
require_once 'elements/footer.php';
head();
include'elements/nav.php';


$bdd=dbconnect();
    if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_FILES["picture"]))
    {
        if ($_POST["title"] === "" || $_POST["content"] === "")
        {
            echo '<span class="alert-warning"> Veuillez remplir tous les champs.</span><br/>';
        } elseif (!($_FILES["picture"]['type'] == 'image/jpeg' || $_FILES["picture"]['type'] == 'image/png'))
        {
            echo '<span class="alert-warning">Seul les formats JPEG et PNG sont acceptés, trouvez une autre image</span>';
        } else
        {
            if ($_FILES["picture"]['type'] == 'image/jpeg')
            {
                $suffix=".jpg";
            } else
            {
                $suffix=".png";
            }
            move_uploaded_file($_FILES['picture']['tmp_name'], '../../assets/img/articles/' . $_FILES['picture']['name']);

            $pseudo = $_SESSION['pseudo'];
            $title = htmlspecialchars(trim($_POST['title']));
            $content = htmlspecialchars(trim($_POST['content']));
            $request = $bdd->prepare('INSERT INTO article (member_list_idmembre,date_creation,title,content,suffix) VALUES(:id_pseudo,NOW(),:title,:content,:suffix)');
            $request->execute(array(
                'id_pseudo' => $_SESSION['iduser'],
                'title' => $title,
                'content' => $content,
                'suffix'=>$suffix
            ));
            $request->closeCursor();
            $indice=intval($bdd->lastInsertId());
            rename('../../assets/img/articles/' . $_FILES['picture']['name'], '../../assets/img/articles/articles'.$indice.$suffix);
            echo '<span class="alert-info">Article bien enregistré.</span>';
        }
    }
if(isset($_POST['message']))
{
    $message=htmlspecialchars(trim($_POST['message']));
    $sqlInsChat='INSERT INTO chat (message,member_list_idmembre) VALUES (:message,:idmembre)';
    $reqInsChat=$bdd->prepare($sqlInsChat);
    $reqInsChat->bindParam(':message',$message);
    $reqInsChat->bindParam(':idmembre',$_SESSION['iduser']);
    $reqInsChat->execute();
}
$sqlSelChat='SELECT *,
             DATE_FORMAT(date_message,\'%d/%m/%Y à %Hh %imin %ss\') AS date_m 
             FROM chat
             INNER JOIN member_list ON member_list_idmembre=idmembre
             ORDER BY date_message DESC LIMIT 0,10';
$reqSelChat=$bdd->prepare($sqlSelChat);
$reqSelChat->execute();
$tab_chat=array();
while($data=$reqSelChat->fetchObject())
{
    array_push($tab_chat,$data);
}
?>

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
            <div class="">
                <form id="formChat" method="post" action="Post_Article.php" class="w-75">
                    <input type="text" name="message" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg" required/>
                    <button type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm ">Envoyer</button>
                    <button type="button" class="btn-sm btn-success" id="refresh">Rafraîchir</button>
                </form>
            </div>
            <div id="zoneChat">
                <?php foreach ($tab_chat as $message)
                { ?>
                    <p class="bg-dark msgChat"><span class="font-weight-bold"><?= $message->pseudo ?></span> le <?= $message->date_m ?><br/><?= $message->message ?></p>
                <?php } ?>
            </div>
        </div>


 <?php
footer();
?>
        <script>$('#refresh').on('click',function (){document.location.href='Post_Article.php'})</script>

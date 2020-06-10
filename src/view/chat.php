<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../controller/function.php';
session_start();
$bdd=dbconnect();

head();

$url=explode('indice=',$_SERVER['REQUEST_URI']);
if (isset($url[1]))
{
    $url_i=explode('?tri=',$url[1]);
    $indice=intval($url_i[0]);
}
else
{
    $indice=0; // si elle n'existe pas alors c'est la première page donc indice =0
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
$sqlcompteMessage='SELECT COUNT(*) as cpte FROM chat';
$reqcompteMessage=$bdd->prepare($sqlcompteMessage);
$reqcompteMessage->execute();
$tab_compte=array();
while($data=$reqcompteMessage->fetchObject())
{
    array_push($tab_compte,$data);
}
$nbmessage=intval($tab_compte[0]->cpte);
$nbpage= ceil($nbmessage/10);
$sqlSelChat='SELECT *,
             DATE_FORMAT(date_message,\'%d/%m/%Y à %Hh %imin %ss\') AS date_m 
             FROM chat
             INNER JOIN member_list ON member_list_idmembre=idmembre
             ORDER BY date_message DESC LIMIT '.$indice.',10';
$reqSelChat=$bdd->prepare($sqlSelChat);
$reqSelChat->execute();
$tab_chat=array();
while($data=$reqSelChat->fetchObject())
{
    array_push($tab_chat,$data);
}
require_once 'elements/nav.php';
?>

    <h1> Chat</h1>
<div class="d-flex justify-content-center">
    <main class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
        <div id="chat" class="bg-light-gray rounded border-light p-3">
            <form id="formChat" method="post" action="chat.php" class="w-75">
                <input type="text" name="message" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg" required/>
                <button type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm ">Envoyer</button>
                <button type="button" class="btn-sm btn-success" id="refresh">Rafraîchir</button>
            </form>
        <div id="zoneChat" class="mt-2">
            <?php foreach ($tab_chat as $message)
                { ?>
            <p class="bg-dark msgChat"><span class="font-weight-bold"><?= $message->pseudo ?></span> le <?= $message->date_m ?><br/><?= $message->message ?></p>
         <?php } ?>
        </div>
        </div>
    </main>
</div>
    <div class="d-flex justify-content-center chat mt-2">
        <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination">
                <?php for($i=1;$i<=$nbpage;$i++)
                { ?>
                    <li class="page-item"><a class="page-link" href="chat.php?indice=<?= ($i-1)*10 ?>
                           "><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php
footer();
?>
<script>$('#refresh').on('click',function (){document.location.href='chat.php'})</script>

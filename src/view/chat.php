<?php
require_once '../elements/head.php';
require_once '../elements/footer.php';

head();
?>


<main class="col-sm-12">
    <form id="formChat">
        <input type="text" placeholder="Ecrivez votre message ici" class="form-control-sm bg-light my-2 mb-2" id="msg"/>
        <input type="submit" value="Envoyer" name="envoi" class="btn-danger btn-sm "/>
    </form>
    <div id="zoneChat">
        <p class="bg-dark msgChat"> @Audrey le 16/02/20 à 10h30<br/>Bla BLZA VKSEDJFSOJFOSHJOHSF JPEJ PJEF J EPI J£J ZO£J F£J£ FJ </p>
        <p class="bg-dark msgChat"> @juzja le 16/02/20 à 10h10<br/> kjzzd hg HZUYdih iizi$ dzhdzeig ii uizh odzo jdzohd </p>
        <p class="bg-dark msgChat">@JAYGL le 16/02/20 à 10h03<br/> lzidzhgi ohzd ihdjzhd hdzighdg hi zdh iz hpih zphd hpozh dp</p>
    </div>
</main>

<script type="text/javascript" src="js/popper.min.js" ></script>
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/Bootstrap/bootstrap.js"></script>
</body>
</html>
<?php
footer();

<?php
if (!isset($_SESSION['pseudo']))
{
    header("Location:inscription.php");
}
else
{
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-red">
        <span class="navbar-brand"><img src="../../assets/img/gif_logo.gif"/></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link text-warning">Bonjour <?php echo $_SESSION['pseudo']?></span>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-warning">Vous avez <?php echo $_SESSION['balance']?> cr</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../view/Accueil.php" id="Accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/Post_Article.php" id="Post_Article">Poster un article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/chat.html" id="chat">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/prono.php" id="prono">Pronostic de la semaine</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="../view/deconnexion.php" id="deconnexion.">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
   <!--<script src="../../assets/js/jquery-3.4.1.js"></script>-->

<?php
}
?>



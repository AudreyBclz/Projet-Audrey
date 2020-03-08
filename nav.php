<?php
if (!isset($_SESSION['pseudo']))
{
    header("Location:inscription.php");
}
else
{
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-red">
        <span class="navbar-brand"><img src="img/gif%20logo.gif"/></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link text-danger">Bonjour <?php echo $_SESSION['pseudo']?></span>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-danger">Vous avez <?php echo $_SESSION['balance']?> cr</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Accueil.php" id="idAccueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Post_Article.html" id="idPostArticle">Poster un article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.html" id="idChat">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prono.php" id="idProno">Pronostic de la semaine</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="deconnexion.html">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <script src="js/jquery-3.4.1.js"></script>
    <script>
        function class_active()
        {
            this.addClass("active");
            $("li:not(.this)").removeClass("active");
        }
        $('#idProno').on("click",class_active());
        $('#idChat').on("click",class_active());
        $('#idPostArticle').on("click",class_active());
        $('#idAccueil').on("click",class_active());
    </script>
<?php
}
?>



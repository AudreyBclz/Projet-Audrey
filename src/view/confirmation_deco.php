<?php
session_start();
$_SESSION["pseudo"]="";
$_SESSION['balance']="";
session_destroy();
header('Location:../../index.php');


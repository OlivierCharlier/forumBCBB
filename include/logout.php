<?php 
/*DECONNEXION - LOGOUT*/ 
session_start();
$_SESSION = array();
session_destroy();
//Renvoie l'utilisateur vers la page de connexion
header('Location: login.php');
?>
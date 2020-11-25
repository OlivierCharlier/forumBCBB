<?php
// call the session
session_start();

// We overwrite the session table
$_SESSION = array();

// destroy the session
session_destroy();
header('Location: index.php');
?>
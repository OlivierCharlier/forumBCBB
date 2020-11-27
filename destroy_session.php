<?php

// We overwrite the session table
$_SESSION = array();

// destroy the session
session_destroy();

//back to index
header('Location: index.php');
exit();
?>

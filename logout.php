<?php session_start(); ?>
<?php
// завершение сессии 
session_destroy();
unset($_SESSION['login']);
unset($_SESSION['password']);
header('Location: index.php');

?>
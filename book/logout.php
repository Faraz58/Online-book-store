<?php
session_start();
$_SESSION['login']=0;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
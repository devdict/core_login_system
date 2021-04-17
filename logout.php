<?php include 'connection.php'?>
<?php
if($_SESSION['login']){
    $_SESSION['login'] = false;
    header('location:login.php');
}
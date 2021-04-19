<?php include 'connection.php';?>
<?php
if(isset($_SESSION['login']) == true){
    session_destroy();
    return header('location: login.php');
}else{
    return header('location: login.php');
}


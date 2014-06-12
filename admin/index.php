<?php
session_start();
if($_SESSION['tipo']=="administrador"){
 header('Location: admin.php');    
}else{
 include('login.php');   
}
?>


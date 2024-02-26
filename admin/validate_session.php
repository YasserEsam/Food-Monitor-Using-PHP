<?php
session_start();
if($_SESSION['user_id'] == null && $_SESSION['user_name'] == null){
    header('location:login.php');
}
?>
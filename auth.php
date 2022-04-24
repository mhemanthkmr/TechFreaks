<?php 
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['authenticated']))
{
    $_SESSION['flag'] = 2;
    $_SESSION['message'] = "Login to Access the Dashboard";
    header("Location: login.php");
    exit(0);
}

?>
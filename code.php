<?php

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
}
if(isset($_POST['login_btn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
}
?>
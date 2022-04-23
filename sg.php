<?php

include('code/user.Class.php');

$user = new User;

$result = $user->userExist('dfghghfgh');

var_dump($result);

print_r($_SERVER);
?>
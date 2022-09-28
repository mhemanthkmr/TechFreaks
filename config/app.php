<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'mhemanthkmr');
define('DB_PASSWORD', 'Hemanth123$');
define('DB_DATABASE', 'TechFreaks');
define('SITE_URL', 'http://localhost/TechFreaks/');
include_once('database.Class.php');
$db = new DatabaseConnection;
$con = $db->conn;
// $con = mysqli_connect("localhost","mhemanthkmr","hemanth123","TechFreaks");
function baseurl($slug)
{
    echo SITE_URL.$slug;
}
// baseurl('index.php');
function validateInput($dbcon,$input)
{
    return mysqli_real_escape_string($dbcon, $input);
}

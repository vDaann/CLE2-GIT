<?php
$host       = "sql.hosted.hr.nl";
$database   = "0965089";
$user       = "0965089";
$password   = "reehaiqu";

$db = mysqli_connect($host, $user, $password, $database)
    or die("Error: " . mysqli_connect_error());;

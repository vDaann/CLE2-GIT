<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="logout.php">Uitloggen</a>

</body>
</html>
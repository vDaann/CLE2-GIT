<?php
session_start();
//Require database in this file
require_once "includes/database.php";
//Check if user is logged in, else move to secure page
if (isset($_SESSION['loggedInUser'])) {
    header("Location: reservations.php");
    exit;
}
//If form is posted, lets validate!
if (isset($_POST['submit'])) {
    //Retrieve values (email safe for query)
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    //Get password & name from DB
    $query = "SELECT id, password FROM login_users
              WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    //Check if email exists in database
    $errors = [];
    if ($user) {
        //Validate password
        if (password_verify($password, $user['password'])) {
            //Set email for later use in Session
            $_SESSION['loggedInUser'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];
            //Redirect to secure.php & exit script
            header("Location: reservations.php");
            exit;
        } else {
            $errors[] = 'Uw combinatie van wachtwoord, e-mailadres is onjuist';
        }
    } else {
        $errors[] = 'Uw combinatie van wachtwoord, e-mailadres is onjuist';
    }
}
?>
<!doctype html>
<html>
<head>
    <title>DG | Digital Creative Agency | Login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="shortcut icon" type="image/png" href="images/favi_dg.png"/>
</head>
<body>
    <div id="container">
        <div class="header-wrap">
            <div class="header">
                <div class="logo">
                    <img src="images/logo-dg.png">
                    <p class="intro">Creative Digital Agency</p>
                    <p class="outro">Full Service Bureau voor Digitale Groei</p>
                </div>
            </div>
        </div>

        <div class="login-wrap">
            <div class="inner-login-wrap">
                <div class="form" id="form">
                    <div class="form-intro">
                        <p>Alle aanmeldingen bekijken?</p>
                        <h2>Login met je account</h2>
                        <p class="micro"><a href="index.php">Terug naar prototype-sessie</a></p>
                    </div>
                    <?php if (isset($errors) && !empty($errors)) { ?>
                        <ul class="errors">
                            <?php for ($i = 0; $i < count($errors); $i++) { ?>
                                <li><?= $errors[$i]; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <form id="login" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
                        <div class="left">
                            <label for="email">E-mailadres</label>
                            <input type="email" name="email" id="email" value="<?= (isset($email) ? $email : ''); ?>"/>
                        </div>
                        <div class="right">
                            <label for="password">Wachtwoord</label>
                            <input type="password" name="password" id="password"/>
                        </div>
                        <div class="button left">
                            <input type="submit" name="submit" value="Login"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
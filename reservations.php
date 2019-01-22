<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
    exit;
}

require_once "includes/reservation-data.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/animate.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="images/favi_dg.png"/>
    <title>DG | Digital Creative Agency | Aanmeldingen</title>
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
                        <h2>Alle aanmeldingen in een lijst</h2>
                        <p class="micro"><a href="logout.php">Uitloggen</a></p>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Voor- en achternaam</th>
                            <th>E-mailadres</th>
                            <th>Bedrijfsnaam</th>
                            <th>Telefoonnummer</th>
                            <th>Datum</th>
                            <th>Tijdsblok</th>
                            <th>Website bedrijf</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($reservationLists as $reservationList) {
                            $id = $reservationList['id'];
                            ?>
                            <tr>
                                <td><?= $reservationList['fullname']; ?></td>
                                <td><?= $reservationList['email']; ?></td>
                                <td><?= $reservationList['company']; ?></td>
                                <td><?= $reservationList['phone']; ?></td>
                                <td><?= $reservationList['date_day']; ?></td>
                                <td><?= $reservationList['date_time']; ?></td>
                                <td><?= $reservationList['website']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
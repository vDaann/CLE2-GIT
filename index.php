<?php
if (isset($_POST['submit'])) {
//Require database in this file & image helpers
    require_once "includes/database.php";

//Postback with the data showed to the user, first retrieve data from 'Super global'
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $company = mysqli_escape_string($db, $_POST['company']);
    $phone = mysqli_escape_string($db, $_POST['phone']);
    $date_day = mysqli_escape_string($db, $_POST['date_day']);
    $date_time = mysqli_escape_string($db, $_POST['date_time']);
    $website = mysqli_escape_string($db, $_POST['website']);
    $agreed = mysqli_escape_string($db, $_POST['agreed']);

//Require the form validation handling
    require_once "includes/form-validation.php";

//Special check for add form only
    if (empty($errors)) {

        //Save the record to the database
        $query = "INSERT INTO reservations (fullname, email, company, phone, date_day, date_time, website, agreed)
                  VALUES ('$fullname', '$email', '$company', '$phone', '$date_day', '$date_time', '$website', '$agreed')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <link href="css/animate.css" type="text/css" rel="stylesheet"/>
        <link rel="shortcut icon" type="image/png" href="images/favi_dg.png"/>
        <title>DG | Digital Creative Agency | Prototype-sessie</title>
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

            <div class="information-wrap">
                <div class="information">
                    <p class="bold">Eerst zien, dan geloven! Wij laten vooraf – vrijblijvend – zien wat we kunnen betekenen.</p>
                    <p class="bold">In Prototype Sessie presenteren we onze visie en een werkend prototype van uw website of -applicatie.</p>

                    <div class="left-info">
                        <p class="bold">Waarom een Prototype Sessie?</p>
                        <div class="separator"></div>
                        <p>Het selecteren van een business partner voor de ontwikkeling en implementatie
                            van uw Digitale Strategie is lastig. Zelfs met een zorgvuldig samengestelde
                            shortlist en een helder geformuleerd ‘Request for Proposal’ blijkt er in de praktijk
                            toch nog te vaak op onderbuikgevoel geselecteerd te worden.</p><br>

                        <p>Bij DG denken we dat dit anders kan – en moet! Om die reden laten wij u
                            graag <span class="bold">vooraf</span> zien wat we kunnen betekenen. In het DG|Creative Lab nodigen we u daarom
                            graag uit voor een Prototype Sessie.</p>

                    </div>

                    <div class="right-info">
                        <p class="bold">Wat is een Prototype Sessie?</p>
                        <div class="separator"></div>
                        <p>Op basis van een intake inventariseren we uw project. We vragen naar doelstellingen,
                            doelgroep, positionering, grafische richtlijnen en beschikbare referentie-projecten.
                            Vervolgens gaan onze designers, developers en marketeers aan de slag. Het resultaat
                            is een werkend Prototype van uw website/applicatie of campagne.</p><br>

                        <p>Tijdens de 2-uur durende Prototype Sessie presenteren we de visie van DG op het project
                            en de roadmap die we hebben gevolgd om te komen van Digitale Strategie naar Prototype.</p>

                    </div>
                </div>
                <div class="form" id="form">
                    <div class="form-intro">
                        <p>Interesse in een vrijblijvende prototype sessie?</p>
                        <h2>Neem contact op</h2>
                        <p class="micro"><a href="login.php">Alle aanmeldingen bekijken</a></p>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="left">
                            <label>Voor- en achternaam <span class="errors"><?= isset($errors['fullname']) ? $errors['fullname'] : '' ?></span></label><br>
                            <input type="text" name="fullname" value="<?= isset($fullname) ? $fullname : '' ?>"/>
                        </div>
                        <div class="right">
                            <label>E-mailadres <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span></label><br>
                            <input type="email" name="email" value="<?= isset($email) ? $email : '' ?>"/>
                        </div>
                        <div class="left">
                            <label>Bedrijfsnaam <span class="errors"><?= isset($errors['company']) ? $errors['company'] : '' ?></span></label><br>
                            <input type="text" name="company" value="<?= isset($company) ? $company : '' ?>"/>
                        </div>
                        <div class="right">
                            <label>Telefoonnummer <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span></label><br>
                            <input type="number" name="phone" value="<?= isset($phone) ? $phone : '' ?>"/>
                        </div>
                        <div class="left">
                            <label>Datum <span class="errors"><?= isset($errors['date_day']) ? $errors['date_day'] : '' ?></span></label><br>
                            <input type="date" name="date_day" value="<?= isset($date_day) ? $date_day : '' ?>"/>
                        </div>
                        <div class="right timestamp">
                            <label>Tijdsblok <span class="errors"><?= isset($errors['date_time']) ? $errors['date_time'] : '' ?></span></label><br>
                                <select name="date_time">
                                    <option value="">Kies een tijdsblok</option>
                                    <option value="12:00">12:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                        </div>
                        <div class="left">
                            <label>Website bedrijf <span class="errors"><?= isset($errors['website']) ? $errors['website'] : '' ?></span></label><br>
                            <input type="text" name="website" value="<?= isset($website) ? $website : '' ?>"/>
                        </div>
                        <input type="hidden" name="agreed" value="0">
                        <div class="agreed">
                            <label>Toestemming gegevensverwerking <span class="errors"><?= isset($errors['agreed']) ? $errors['agreed'] : '' ?></span></label><p></p>
                            <input type="checkbox" name="agreed" value="akkoord" class="inner-agreed"/>Ja, ik geef toestemming.<br/>
                            <p class="info-agreed">Met het invullen van deze gegevens geef ik toestemming aan DG Inernetbureau om mijn gegevens te verwerken,
                                op de manier zoals beschreven is in de privacyverklaring.</p>
                        </div>
                        <div class="button left">
                            <input type="submit" name="submit" value="Verzenden"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
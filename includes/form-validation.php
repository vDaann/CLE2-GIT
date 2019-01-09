<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($fullname == "") {
    $errors['fullname'] = 'Voor- en achternaam kan niet leeg zijn';
}
if ($email == "") {
    $errors['email'] = 'E-mailadres kan niet leeg zijn';
}
if ($company == "") {
    $errors['company'] = 'Bedrijfsnaam kan niet leeg zijn';
}
if (!is_numeric($phone)) {
    $errors['phone'] = 'Telefoonnummer moeten getallen zijn';
}
// this error message wil overwrite the previous error when phone is empty
if ($phone == "") {
    $errors['phone'] = 'Telefoonnummer kan niet leeg zijn';
}
if (!is_numeric($date)) {
    $errors['date'] = 'Datum moeten getallen zijn';
}
// this error message wil overwrite the previous error when tracks is empty
if ($date == "") {
    $errors['date'] = 'Datum kan niet leeg zijn';
}
if ($timestamp == "") {
    $errors['timestamp'] = 'Tijdsblok kan niet leeg zijn';
}
if ($website == "") {
    $errors['website'] = 'Website bedrijf kan niet leeg zijn';
}
if ($checkbox == "") {
    $errors['checkbox'] = 'U moet akkoord gaan met de gegevensverwerking';
}
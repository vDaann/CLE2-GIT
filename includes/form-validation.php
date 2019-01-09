<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($fullname == "") {
    $errors['fullname'] = 'kan niet leeg zijn';
}
if ($email == "") {
    $errors['email'] = 'kan niet leeg zijn';
}
if ($company == "") {
    $errors['company'] = 'kan niet leeg zijn';
}
if (!is_numeric($phone)) {
    $errors['phone'] = 'moeten getallen zijn';
}
// this error message wil overwrite the previous error when phone is empty
if ($phone == "") {
    $errors['phone'] = 'kan niet leeg zijn';
}
// this error message wil overwrite the previous error when tracks is empty
if ($date_day == "") {
    $errors['date_day'] = 'kan niet leeg zijn';
}
if ($date_time == "") {
    $errors['date_time'] = 'kan niet leeg zijn';
}
if ($website == "") {
    $errors['website'] = 'kan niet leeg zijn';
}
if ($agreed == "" || $agreed == "0") {
    $errors['agreed'] = 'aanvinken';
}
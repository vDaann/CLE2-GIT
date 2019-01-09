<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email   = mysqli_escape_string($db, $_POST['email']);
    $company  = mysqli_escape_string($db, $_POST['company']);
    $phone   = mysqli_escape_string($db, $_POST['phone']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $timestamp = mysqli_escape_string($db, $_POST['timestamp']);
    $website = mysqli_escape_string($db, $_POST['website']);
    $checkbox = mysqli_escape_string($db, $_POST['checkbox']);

    //Require the form validation handling
    require_once "includes/form-validation.php";

    //Special check for add form only
    if (empty($errors)) {

        //Save the record to the database
        $query = "INSERT INTO reservations (fullname, email, company, phone, date, timestamp, website, checkbox)
                  VALUES ('$fullname', '$email', '$company', $phone, $date, '$timestamp', '$website', '$checkbox')";
        $result = mysqli_query($db, $query)
        or die('Error: '.$query);

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
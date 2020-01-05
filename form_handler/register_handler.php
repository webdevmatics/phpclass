<?php

$name = $email = $password = ''; //initializing variables
$errors = [];  //holds error messages

if (isset($_POST['register_it'])) { //checking if register button is clicked

    //Name
    $name = $_POST['name'];  // getting name of user from name input field and assigning it to variable
    $name = mysqli_real_escape_string($connection, $name);  //sanitize user input
    $_SESSION['name'] = $name; // saving name to session for displaying in input field in case user entered wrong data


    //Email
    $email = $_POST['email'];    // getting email of user from email input field and assigning it to variable
    $_SESSION['email'] = $email; // saving email to session for displaying in input field in case user entered wrong data

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // checking if email entered by user is valid
        $errors['email'] = "invalid email";
    }else {    // email already exist check
        $existingEmailCheck = mysqli_query($connection, "SELECT email from users where email = '$email'");

        if(mysqli_num_rows($existingEmailCheck) > 0) {
            $errors['existing_email'] = "Email Already Exists. Please enter another email";
        }
    }


    //Password
    $password = trim($_POST['password']); // getting password of user from password input field and assigning it to variable

    if (strlen($password) < 5) {       //checking if password in less than 5 character
        $errors['password'] = "password too short";
    }

    $passwordConfirmation = $_POST['confirm_password']; //getting confirm password input field data

    if($password !== $passwordConfirmation){
        $errors['confirm_password']= "The password confirmation does not match.";
    }

    $password = password_hash($password, PASSWORD_DEFAULT); //encrpting password to make is secure



    if (count($errors) == 0) {

        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";  // SQL query to insert name email and password into database

        $result = mysqli_query($connection, $insertQuery); // executing query , this will save user data to database

        //Resetting
        $_SESSION['name'] = '';  //resetting session
        $_SESSION['email'] = '';  //resetting session


        redirectTo('login.php?message=Registered Successfully! Please Login to continue.');

    }
}

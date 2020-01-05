<?php

$email =  $password = ''; //initializing variables
$errors = [];  //holds error messages

if (isset($_POST['login_it'])) { //checking if register button is clicked
    //Email
    $email = $_POST['email'];    // getting email of user from email input field and assigning it to variable
    $_SESSION['email'] = $email; // saving email to session for displaying in input field in case user entered wrong data

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // checking if email entered by user is valid
        $errors['email'] = "invalid email";
    }

    //Password
    $password = trim($_POST['password']); // getting password of user from password input field and assigning it to variable

    if (strlen($password) < 5) {       //checking if password in less than 5 character
        $errors['password'] = "password too short";
    }

    if (count($errors) == 0) {

        $loginQuery = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($connection, $loginQuery);

        $rowCount = mysqli_num_rows($result);

        if($rowCount == 1) {
            $user = mysqli_fetch_assoc($result); //getting user in associative array format
//        $user = mysqli_fetch_array($result); // another way of getting user gets both associative array and simple

            if(!password_verify($password, $user['password'])) {
                $errors['incorrect_detail'] = "Email or password incorrect";

            }else {
                $_SESSION['auth_user'] = $user['name'];
                $_SESSION['auth_id'] = $user['id'];  //saving user id 
                
                redirectTo("index.php?message=Logged In");

            }

        }else{
            $errors['incorrect_detail'] = "Email or password incorrect";
        }
    }
}

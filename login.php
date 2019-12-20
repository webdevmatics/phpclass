<?php
session_start(); //starting seesion

function dd($data){
    var_dump($data);
    die;
}

$connection = mysqli_connect('localhost', 'root', '', 'facebook'); //making connection with database

if (mysqli_connect_errno()) {   //checking if connection is not successful
    echo "there is some error while connecting to db";
    exit(); //if not successful exit  by displaying error
}

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

        $_SESSION['auth_user'] = $name;  //saving name of user in session so that we can display it in page 

        //Resetting
        $_SESSION['name'] = '';  //resetting session
        $_SESSION['email'] = '';  //resetting session


        header("Location: index.php?message=register_successfully"); // after register success taking user to main page and displaying success message
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        h1 {
            background: grey;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Welcome to FaceBook</h1>


    <?php if (isset($_SESSION['auth_user'])) : ?>
        <!-- checking if session is set and displaying logged in users name  -->
        <h5 style="text-align:center"> Logged in as : <?php echo $_SESSION['auth_user'] ?>
            <a href="/facebook/logout.php">Logout</a>
        <?php endif; ?>

        </h5>
        <p>
            <!-- displaying success or error message -->
            <?php
            if (isset($_GET['message'])) {

                echo $_GET['message'];
            }
            ?>
        </p>

        <div>
            <h5>Login here or <a href="/facebook/index.php">Register</a></h5>

            <div class="validation-errors">
                <ul>
                    <!-- displaying validation errors by looping through errors array -->
                    <?php foreach ($errors as $key => $error): ?>
                        <li style="color:red;"><?php echo $error; ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <form action="index.php" method="POST">

                <br>

                <input type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
                                                                                                echo $_SESSION['email'];
                                                                                            } ?>">
                <br>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>
                <input type="submit" value="Login" name="login">


            </form>

        </div>
</body>

</html>
<?php
session_start(); //starting seesion

$name = $email = $password = ''; //initializing variables

//checking if register button is clicked

if (isset($_POST['register_it'])) {

    $name = $_POST['name'];  // getting name of user from name input field and assigning it to variable
    $_SESSION['name'] = $name; // saving name to session for displaying in input field in case user entered wrong data

    $email = $_POST['email'];    // getting email of user from email input field and assigning it to variable
    $_SESSION['email'] = $email; // saving email to session for displaying in input field in case user entered wrong data

    $password = $_POST['password']; // getting password of user from password input field and assigning it to variable
    $password = password_hash($password, PASSWORD_DEFAULT); //encrpting password to make is secure


    //checking if password in less than 5 character
    if (strlen($password) < 5) {

        // if user entered password less than 5 character taking user back to same page and displaying password to short message

        header("Location: index.php?message=Password too short");
        exit(); //and existing from page , code below exit will not be executed
    }

    // checking if email entered by user is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        header("Location: index.php?message=invalid email");
        exit();
    }



    $connection = mysqli_connect('localhost', 'root', '', 'facebook'); //making connection with database

    //checking if connection is not successful
    if (mysqli_connect_errno()) {
        echo "there is some error while connecting to db";
        exit(); //if not successful exit  by displaying error
    }

    $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";  // SQL query to insert name email and password into database

    $result = mysqli_query($connection, $insertQuery); // executing query , this will save user data to database

    $_SESSION['auth_user'] = $name;  //saving name of user in session so that we can display it in page 


    header("Location: index.php?message=register_successfully"); // after register success taking user to main page and displaying success message

    exit();
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

    <!-- checking if session is set and displaying logged in users name  -->

    <?php if (isset($_SESSION['auth_user'])) : ?>
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
            <h5>Sigup here</h5>

            <form action="index.php" method="POST">
                <input type="text" placeholder="Enter Your name" name="name" required value="<?php if (isset($_SESSION['name'])) {  //displaying old input that user entered before any error occured
                                                                                                    echo $_SESSION['name'];
                                                                                                } ?>">
                <br>

                <input type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
                                                                                                    echo $_SESSION['email'];
                                                                                                } ?>">
                <br>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>

                <input type="submit" value="Register" name="register_it">


            </form>

        </div>
</body>

</html>
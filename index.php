<?php
session_start();
// echo "<pre>";
// var_dump($connection);
// echo "</pre>";
const HOST = 'localhost';
const USER = 'root';
const DB_PASSWORD = '';
const DATABASE_NAME = 'facebook';


// exit;
// echo "<pre>";
// var_dump($multi['mydata']['love']);
// echo "</pre>";
// exit;
// define(HOST, 'localhost'); //another way of defininig constant

$connection = mysqli_connect(HOST, USER, DB_PASSWORD, DATABASE_NAME);

if (mysqli_connect_errno()) {
    echo "there is some error while connecting to db";
    exit();
}


$name = $email = $password = '';
$errors = [];
//checking if register button is clicked
if (isset($_POST['register_it'])) {

    $name = $_POST['name'];
    $_SESSION['name'] = $name;

    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $password = $_POST['password']; //secret


    if (strlen($password) < 5) {
        header("Location: index.php?message=Password too short");
        exit();
        // array_push($errors, "password should be more than 6");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // array_push($errors, "please enter valid email");
        header("Location: index.php?message=invalide email");
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($connection, $insertQuery);

    $_SESSION['auth_user'] = $name;

    header("Location: index.php?message=register_successfully");

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
    <?php if (isset($_SESSION['auth_user'])) : ?>
        <h5 style="text-align:center"> Logged in as : <?php echo $_SESSION['auth_user'] ?>
            <a href="/facebook/logout.php">Logout</a>
        <?php endif; ?>


        </h5>

        <p>
            <?php
                                                    if (isset($_GET['message'])) {
                                                        echo $_GET['message'];
                                                    }
            ?>
        </p>

        <div>
            <h5>Sigup here</h5>

            <form action="index.php" method="POST">
                <input type="text" placeholder="Enter Your name" name="name" required value="<?php if (isset($_SESSION['name'])) {
                                                                                                    echo $_SESSION['name'];
                                                                                                } ?>">
                <br>
                <input type="text" placeholder="Enter email" name="email" required>
                <br>

                <!-- <input type="file" name='profile_pic'> -->
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>

                <input type="submit" value="Register" name="register_it">


            </form>

        </div>
</body>

</html>
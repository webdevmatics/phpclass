<?php
session_start();
// echo "<pre>";
// var_dump($connection);
// echo "</pre>";


$connection = mysqli_connect('localhost', 'root', '', 'facebook');

if (mysqli_connect_errno()) {
    echo "there is some error while connecting to db";
    exit();
}


$name = $email = $password = '';

if (isset($_POST['register_it'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

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
    <?php if(isset($_SESSION['auth_user'])):?>
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
            <input type="text" placeholder="Enter Your name" name="name" required>
            <br>
            <input type="email" placeholder="Enter email" name="email" required>
            <br>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br>

            <input type="submit" value="Register" name="register_it">


        </form>

    </div>
</body>

</html>
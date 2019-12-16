<?php
// echo "<pre>";
// var_dump($connection);
// echo "</pre>";


$connection = mysqli_connect('localhost','root','','facebook');

if(mysqli_connect_errno()) {
    echo "there is some error while connecting to db";
    exit();
}


$name=$email=$password='';

if(isset($_POST['register_it'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($connection, $insertQuery);

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
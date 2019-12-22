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

    <form action="/facebook/login.php" method="POST">

        <br>

        <input type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } ?>">
        <br>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
        <input type="submit" value="Login" name="login_it">


    </form>

</div>
</body>

</html>
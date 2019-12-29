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

        nav {
            background: grey;
            padding: 5px;
            text-align: center;
        }

        .container {
            margin: 0 20px;
        }

        table,
        th,
        td,
        tr {
            border: 1px solid red;
        }
    </style>
</head>

<body>


    <nav>
        <h1>Welcome to Webbook Nepal</h1>

        <a href="/facebook/index.php">Main</a> <br>

        <?php if (isset($_SESSION['auth_user'])) : ?>
            <span><?php echo $_SESSION['auth_user']; ?></span>
            <a href="/facebook/logout.php">Logout</a>

        <?php else : ?>
            <a href="/facebook/login.php">Login</a> or
            <a href="/facebook/register.php">Register</a>
        <?php endif ?>



    </nav>
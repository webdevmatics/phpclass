<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/bootstrap.css">

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
   
    <script src='./assets/jquery.min.js'></script>
    <script src='./assets/bootstrap.js'></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/facebook/index.php">Facebook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">

                <?php if (isset($_SESSION['auth_user'])) : ?>
                    <li class="nav-item">
                        <span><?php echo $_SESSION['auth_user']; ?></span>
                        <a style="color:white" href="/facebook/logout.php">Logout</a>
                    </li>


                <?php else : ?>
                    <li class="nav-item">
                        <a href="/facebook/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/facebook/register.php">Register</a>
                    </li>

                <?php endif ?>

            </ul>
        </div>
    </nav>
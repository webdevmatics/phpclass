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
        <h2>Your entered data are</h2>

        <!-- this will display data that you entered in form in name field -->
        <p>Your name is :
            <?php
            //checking if value is set before displaying it by use echo
            
                if (isset($_POST['name'])) {
                    
                    echo $_POST['name'];
                }
            ?>
        </p>

        <!-- below this line display data that you entered in form in email input field -->


        <!-- below this line display data that you entered in form in password input field -->

    </div>

    br
    <div>
        <h5>Sigup here</h5>

        <form action="index.php" method="POST">
            <input type="text" placeholder="Enter Your name" name="name" required>
            <br>
            <input type="text" placeholder="Enter email" name="email" required>
            <br>

            <input type="password" placeholder="Enter Password" name="password" required>
            <br>

            <input type="submit" value="Register" name="register_it">


        </form>

    </div>
</body>

</html>
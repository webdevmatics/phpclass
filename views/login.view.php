    <?php include "header.view.php"; ?>

    
    <div class="container w-50 mx-auto mt-3">

        <?php if (isset($_SESSION['auth_user'])) : ?>
            <!-- checking if session is set and displaying logged in users name  -->
            <h5 style="text-align:center"> Logged in as : <?php echo $_SESSION['auth_user'] ?>
                <a href="/facebook/logout.php">Logout</a>
            <?php endif; ?>

            </h5>

            <div>
                <h5>Login here or <a href="/facebook/register.php">Register</a></h5>

                <div class="validation-errors">
                    <!-- displaying validation errors by looping through errors array -->
                    <?php foreach ($errors as $key => $error) : ?>

                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oops!</strong> <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>

                </div>

                <form action="/facebook/login.php" method="POST" class=>

                    <br>

                    <input class="form-control" type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                    } ?>">
                    <br>
                    <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <input class="btn btn-success" type="submit" value="Login" name="login_it">


                </form>

            </div>

    </div>


    </body>

    </html>
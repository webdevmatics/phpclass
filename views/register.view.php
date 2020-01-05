    <?php include "header.view.php"; ?>

    <div class="container w-50 mx-auto mt-3">

        <?php if (isset($_SESSION['auth_user'])) : ?>
            <!-- checking if session is set and displaying logged in users name  -->
            <h5 style="text-align:center"> Logged in as : <?php echo $_SESSION['auth_user'] ?>
                <a href="/facebook/logout.php">Logout</a>
            <?php endif; ?>

            </h5>
            <!-- displaying success or error message -->


            <div>
                <h5>Sigup here</h5>

                <div class="validation-errors">
                    <?php foreach ($errors as $key => $error) : ?>

                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oops!</strong> <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <form action="register.php" method="POST">
                    <input class="form-control" type="text" placeholder="Enter Your name" name="name" value="<?php if (isset($_SESSION['name'])) {  //displaying old input that user entered before any error occured
                                                                                                                    echo $_SESSION['name'];
                                                                                                                } ?>">
                    <br>

                    <input class="form-control" type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                    } ?>">
                    <br>
                    <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password" required><br>
                    <input class="btn btn-primary" type="submit" value="Register" name="register_it">


                </form>

                <p class="mt-3"> Already have account? <a href="/facebook/login.php">Login here</a></p>

            </div>


    </div>

    </body>

    </html>
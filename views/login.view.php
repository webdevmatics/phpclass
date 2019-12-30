    <?php include "header.view.php"; ?>


    <div class="container w-50 mx-auto">
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
                <h5>Login here or <a href="/facebook/register.php">Register</a></h5>

                <div class="validation-errors">
                    <ul>
                        <!-- displaying validation errors by looping through errors array -->
                        <?php foreach ($errors as $key => $error) : ?>
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

    </div>
            </body>

            </html>
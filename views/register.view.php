    <?php include "header.view.php"; ?>



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
            <h5>Sigup here</h5>

            <div class="validation-errors">
                <ul>
                    <!-- displaying validation errors by looping through errors array -->
                    <?php foreach ($errors as $key => $error) : ?>
                        <li style="color:red;"><?php echo $error; ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <form action="register.php" method="POST">
                <input type="text" placeholder="Enter Your name" name="name" value="<?php if (isset($_SESSION['name'])) {  //displaying old input that user entered before any error occured
                                                                                        echo $_SESSION['name'];
                                                                                    } ?>">
                <br>

                <input type="text" placeholder="Enter email" name="email" required value="<?php if (isset($_SESSION['email'])) {
                                                                                                echo $_SESSION['email'];
                                                                                            } ?>">
                <br>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>
                <input type="password" placeholder="Confirm Password" name="confirm_password" required><br>
                <input type="submit" value="Register" name="register_it">


            </form>

            <p> Already have account? <a href="/facebook/login.php">Login here</a></p>

        </div>
        </body>

        </html>
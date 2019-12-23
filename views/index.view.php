    <?php include "header.view.php"; ?>

    <div class="container">
        <p>this is index</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias accusamus exercitationem pariatur in repellendus quis cumque nulla voluptatem maiores odit vitae eaque asperiores, iusto deserunt omnis. Eaque enim nihil accusantium?</p>


        <h2> List of registered users on Facebook</h2>


        <?php foreach ($users as $user) : ?>

            <li>
                <small>
                    <?php echo $user['name'] ?>

                </small>

                <em><?php echo $user['email'] ?></em>

            </li>

        <?php endforeach; ?>


    </div>




    </body>

    </html>
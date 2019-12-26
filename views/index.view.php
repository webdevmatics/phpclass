    <?php include "header.view.php"; ?>

    <div class="container">
        <p>this is index</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias accusamus exercitationem pariatur in repellendus quis cumque nulla voluptatem maiores odit vitae eaque asperiores, iusto deserunt omnis. Eaque enim nihil accusantium?</p>


        <h2>Displaying data of users in table</h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>



            <?php while($u = mysqli_fetch_assoc($userQueryResult)): ?>

                <tr>
                    <td><?php echo $u['name'] ?></td>
                    <td><?php echo $u['email'] ?></td>
                </tr>


            <?php endwhile; ?>
            


        </table>


    </div>




    </body>

    </html>
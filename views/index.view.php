    <?php include "header.view.php"; ?>

   <div>

        <h2>Create Post</h2>

        <form action="/facebook/index.php" method="POST">

            <input type="text" placeholder="Whats on your mind?" name="body">

            <input type="submit" value="Post Status" name="post_it">


        </form>


   </div>

   <br>
   <div>

    <h3>My posts</h3>

        <?php while($postData = mysqli_fetch_assoc($posts)) : ?>

            <div>
                <?php echo $postData['body']; ?>
            </div>

        <?php endwhile ?>

   </div>




    </body>

    </html>
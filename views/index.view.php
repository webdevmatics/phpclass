    <?php include "header.view.php"; ?>

    <div class="container w-50 mx-auto">

        <div class="post-form mt-3">
            <h4>Create Post</h4>

            <form action="/facebook/index.php" method="POST">

                <input class="form-control" type="text" placeholder="Whats on your mind?" name="body">

                <input class="btn btn-success btn-sm mt-2" type="submit" value="Post Status" name="post_it">

            </form>
        </div>

        <hr>
        <div class="post-data mt-3  text-center">

            <h5>My posts</h5>

            <?php while ($postData = mysqli_fetch_assoc($posts)) : ?>

                <div class="card mt-2">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5> -->
                        <p class="card-text">
                            <?php echo $postData['body']; ?>
                        </p>
                        <a href="#" class="card-link">edit</a>
                        <a href="#" class="card-link">delete</a>
                    </div>
                </div>

            <?php endwhile ?>


        </div>


    </div>

    </body>

    </html>
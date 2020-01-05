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
                        <a href="#" class="card-link" data-toggle="modal" data-target="#<?php echo $postData['id'] ?>">edit</a>
                        <a href="/facebook/index.php?delete_post=<?php echo $postData['id'] ?>" class="card-link">delete</a>

                    </div>
                </div>

                <!-- //bootstrap edit modal -->

                <!-- Modal -->
                <div class="modal fade" id="<?php echo $postData['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/facebook/index.php" method="POST">

                                    <input type="hidden" name="post_id" value="<?php echo $postData['id'] ?>">
                                    <div class="row">
                                        <div class="col-9">
                                            <input class="form-control" type="text" name="body" value="<?php echo $postData['body'] ?>">

                                        </div>
                                        <div class="col-3">
                                            <input class="btn btn-success" type="submit" value="Edit Status" name="post_it">

                                        </div>
                                    </div>


                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div> -->
                        </div>
                    </div>
                </div>

            <?php endwhile ?>


        </div>


    </div>

    </body>

    </html>
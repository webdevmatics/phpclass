<?php
require_once './includes/connections.php';
require_once './includes/functions.php';

require './classes/Post.php';

$postObject = new Post($connection);

//checking if user is logged in 
if (!isset($_SESSION['auth_user'])) {
    //redirect user to login page
    redirectTo('login.php');
}

$userId = $_SESSION['auth_id'];

//Delete handler

if(!empty($_GET['delete_post'])) {
    $postIdToDelete =(integer) $_GET['delete_post'];

    $postToDelete = $postObject->find($postIdToDelete);


    //authorization check

    if($postToDelete['user_id'] != $userId) {

        redirectTo('index.php?error=Sorry your are not authorized!');
    }


    if($postObject->delete($postIdToDelete)){
        redirectTo('index.php?message=Post Deleted');

    }else {
        redirectTo('index.php?error=Problem Deleting');
    }


}

// form submisssion handler
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $body = $_POST['body'];

    $postId = $_POST['post_id'];


    //if post Id is not empty that means we are updating otherwise creating new record
    if (!empty($postId)) {

        //todo put authorization

        $isUpdated = $postObject->update((integer)$postId, ['body' => $body]);

        if($isUpdated) {

            redirectTo('index.php?message=update success');

        }else{
            redirectTo('index.php?message=failed to update');
        }

    } else {
        $postObject->create(['body' => $body, 'user_id' => $userId]);
    }

    redirectTo('index.php');
}

// fetching all posts
$posts = $postObject->all($userId);

include './views/index.view.php';

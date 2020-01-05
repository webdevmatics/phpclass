<?php
require_once './includes/connections.php';
require_once './includes/functions.php';

require './classes/Post.php';

$postObject = new Post($connection);

//checking if user is logged in 
if(!isset($_SESSION['auth_user'])) {
    //redirect user to login page
    redirectTo('login.php');

}

$userId = $_SESSION['auth_id'];

// form submisssion handler
if(isset($_POST['post_it'])) {
    $body = $_POST['body'];
    
    $postObject->create(['body'=> $body, 'user_id'=> $userId]);

    redirectTo('index.php');
}

// fetching all posts
$posts = $postObject->all($userId);

include './views/index.view.php'

?>


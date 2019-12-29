<?php
require_once './includes/connections.php';
require_once './includes/functions.php';

//checking if user is logged in 
if(!isset($_SESSION['auth_user'])) {

    //redirect user to login page

    header("Location: login.php");
    exit();

}

$userId = $_SESSION['auth_id'];


// form submisssion handler
if(isset($_POST['post_it'])) {
    $body = $_POST['body'];


    //add validation


    //sanitize user data
    $body = mysqli_real_escape_string($connection, $body);

    mysqli_query($connection, "INSERT INTO posts(body,user_id) values('$body',$userId)");

}

// fetching all posts
$posts = mysqli_query($connection, "SELECT * from posts WHERE user_id='$userId'");


include './views/index.view.php'

?>


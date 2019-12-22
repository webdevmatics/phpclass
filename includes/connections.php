<?php
session_start(); //starting session

$connection = mysqli_connect('localhost', 'root', '', 'facebook'); //making connection with database

if (mysqli_connect_errno()) {   //checking if connection is not successful
    echo "there is some error while connecting to db";
    exit(); //if not successful exit  by displaying error
}


<?php

function dd($data){
    var_dump($data);
    die;
}

function redirectTo($location) {
    header("Location: ".$location);
    exit();
}

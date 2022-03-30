<?php

session_start();

require('model/model.php');

function connection()
{
    $connection = getConnection($_POST['username'], $_POST['password']);

    require('view/frontend/connection.php');
}

function register()
{
    require('view/frontend/register.php');
    // $register = newUser($_POST['username'], $_POST['password']);
}

function coffre()
{
    require('view/frontend/coffre.php');
}

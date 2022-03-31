<?php

session_start();

require('model/model.php');

function connection()
{
    require_once('controller/controller_connection.php');
}

function register()
{
    require_once('controller/controller_register.php');
}

function chest()
{
    require_once('controller/controller_chest.php');
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=connection');
}

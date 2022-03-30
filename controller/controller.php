<?php

session_start();

require('model/model.php');

function connection()
{
    $connection = getConnection($_POST['username'], $_POST['password']);

    try {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $info = 'Veuillez remplir tous les champs';
            } else {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Create session for the user
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $connection = getConnection($username, $password);
                if ($connection) {
                    $_SESSION['user'] = $connection;
                    $success = 'Vous êtes connecté';
                    // Wait 2 seconds before redirecting
                    header('Refresh: 2; URL=index.php?action=coffre');
                } else {
                    $error = 'Identifiant ou mot de passe incorrect';
                }
            }
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        header('Location: index.php?action=404');
    }
    require('view/frontend/connection.php');
}

function register()
{
    require('view/frontend/register.php');
    // $register = newUser($_POST['username'], $_POST['password']);
}

function coffre()
{
    require('view/frontend/chest.php');
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=connection');
}

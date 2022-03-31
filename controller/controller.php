<?php

session_start();

require('model/model.php');

function connection()
{
    require_once('controller/controller_connection.php');
}

function register()
{
    // // $register = newUser($_POST['username'], $_POST['password']);
    // // $getUserForCheck = getUser($_POST['username'], $_POST['password']);

    // try {
    //     if (isset($_POST['username']) && isset($_POST['password'])) {
    //         if (empty($_POST['username']) || empty($_POST['password'])) {
    //             $info = 'Veuillez remplir tous les champs';
    //         } else {
    //             $username = $_POST['username'];
    //             $password = $_POST['password'];

    //             $getUserForCheck = getUser($username, $password);

    //             if ($getUserForCheck) {
    //                 $error = 'Ce compte existe déjà';
    //             } elseif ($_POST['password'] != $_POST['password_confirm']) {
    //                 $warning = 'Les mots de passe ne correspondent pas';
    //             } else {
    //                 $_SESSION['username'] = $username;
    //                 $_SESSION['password'] = $password;

    //                 $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    //                 $register = newUser($username, $password_hashed);
    //                 $success = 'Vous êtes inscrit';
    //                 // Wait 2 seconds before redirecting
    //                 header('Refresh: 2; URL=index.php?action=connection');
    //             }
    //         }
    //     }
    // } catch (Exception $e) {
    //     echo 'Erreur : ' . $e->getMessage();
    //     header('Location: index.php?action=404');
    // }

    // require('view/frontend/register.php');

    require_once('controller/controller_register.php');
}

function chest()
{
    require_once('controller/controlleur_chest.php');
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=connection');
}

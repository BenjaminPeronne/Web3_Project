<?php

$connection = getConnection($_POST['username']);

try {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $info = 'Veuillez remplir tous les champs';
        } elseif ($connection) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (password_verify($password, $connection['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $connection['id'];
                $connection = getConnection($username, $password);

                $_SESSION['user'] = $connection;
                $success = 'Connexion réussie | Redirection en cours ...';
                // Wait 2 seconds before redirecting
                header('Refresh: 2; URL=index.php?action=coffre');
            } else {
                $error = 'Identifiant ou mot de passe incorrect';
            }
        } else {
            $error = 'Ce compte n\'existe pas';
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    header('Location: index.php?action=404');
}
require('view/frontend/connection.php');
<?php
// $register = newUser($_POST['username'], $_POST['password']);
// $getUserForCheck = getUser($_POST['username'], $_POST['password']);

try {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $info = 'Veuillez remplir tous les champs';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $getUserForCheck = getUser($username, $password);

            if ($getUserForCheck) {
                $error = 'Ce compte existe déjà';
            } elseif ($_POST['password'] != $_POST['password_confirm']) {
                $warning = 'Les mots de passe ne correspondent pas';
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                $register = newUser($username, $password_hashed);
                $success = 'Compte créé avec succès | Redirection en cours ...';
                // Wait 2 seconds before redirecting
                header('Refresh: 2; URL=index.php?action=connection');
            }
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    header('Location: index.php?action=404');
}

require('view/frontend/register.php');
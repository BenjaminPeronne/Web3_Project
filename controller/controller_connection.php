<?php

// create formulaire & check the connection formulaire 

function checkConnectionForm()
{
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] != '' && $_POST['password'] != '') {
            header('Location: index.php?action=coffre');
            return true;
        }
    }
    return false;
}


// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Create session for the user
//     $_SESSION['username'] = $username;
//     $_SESSION['password'] = $password;
//     $user = getConnection($username, $password);
//     if ($user) {
//         $_SESSION['user'] = $user;
//         header('Location: index.php?action=coffre');
//     } else {
//         $error = 'Identifiant ou mot de passe incorrect';
//     }
// }

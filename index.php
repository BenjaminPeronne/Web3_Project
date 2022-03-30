<?php

require('controller/controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'connection') {
            connection();
        } elseif ($_GET['action'] == 'register') {
            register();
        } elseif ($_GET['action'] == 'coffre') {
            coffre();
        } elseif ($_GET['action'] == 'logout') {
            logout();
        } else {
            $_GET['action'] ?? '404';
            require('view/frontend/404.php');
        }
    } else {
        connection();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

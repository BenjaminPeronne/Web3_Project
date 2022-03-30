<?php

function dbConnect()
{
    // Database configuration 
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'digital_safe');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

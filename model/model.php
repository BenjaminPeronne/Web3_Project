<?php

require_once('model/config/dbConfig.php');

// insert new user into database
function newUser($username, $password)
{
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO users(username, password) VALUES(?, ?)');
    $affectedLines = $query->execute(array($username, $password));

    return $affectedLines;
}

function getConnection($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $req->execute(array($username, $password));
    $user = $req->fetch();
    return $user;
}

function getUser($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $req->execute(array($username, $password));
    $user = $req->fetch();
    return $user;
}

function getUserNameById($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT username FROM users WHERE id = ?');
    $req->execute(array($id));
    $user = $req->fetch();
    return $user;
}

function getUserId($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id FROM users WHERE username = ? AND password = ?');
    $req->execute(array($username, $password));
    $user = $req->fetch();
    return $user;
}

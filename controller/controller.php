<?php

session_start();

require('model/model.php');

function connection()
{
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
                    $success = 'Vous êtes inscrit';
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
}

function chest()
{
    // File upload path
    $targetDir = "public/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = updateLink($fileName, $_SESSION['id']);
                if ($insert) {
                    $success = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $error = "File upload failed, please try again.";
                }
            } else {
                $error = "Sorry, there was an error uploading your file.";
            }
        } else {
            $error = 'Veuillez choisir un fichier de type jpg, png, jpeg, gif, pdf, doc, docx, xls, xlsx';
        }
    } else {
        $warning = 'Please select a file to upload.';
    }

    $link = getLink($_SESSION['id']);

    $_SESSION['link'] = $link;

    require('view/frontend/chest.php');
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=connection');
}

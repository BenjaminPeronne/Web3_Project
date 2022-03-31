<?php

try {
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
                    $success = "Le fichier " . $fileName . " a été upload avec succès.";
                } else {
                    $error = "Echec de l'upload du fichier, veuillez réessayer.";
                }
            } else {
                $error = "Désolé, une erreur est survenue lors de l'envoi du fichier.";
            }
        } else {
            $error = 'Veuillez choisir un fichier de type jpg, png, jpeg, gif, pdf, doc, docx, xls, xlsx';
        }
    } else {
        $warning = 'Veuillez choisir un fichier';
    }

    $link = getLink($_SESSION['id']);

    $_SESSION['link'] = $link;

    require('view/frontend/chest.php');
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    header('Location: index.php?action=404');
}
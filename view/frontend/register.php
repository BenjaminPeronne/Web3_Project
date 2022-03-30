<?php $title = 'Inscription'; ?>

<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $isRegister = newUser($username, $password);

    if ($isRegister) {
        $_SESSION['user'] = $isRegister;
        $success = 'Vous êtes inscrit';
        // Wait 2 seconds before redirecting
        header('Refresh: 2; URL=index.php?action=coffre');
    } else {
        $error = 'Identifiant ou mot de passe incorrect';
    }
}

?>

<?php ob_start(); ?>


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-md-offset-3">
            <h1>Inscription</h1>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($success)) : ?>
                <div class="alert alert-success">
                    <?= $success; ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirmation du mot de passe</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2 center">Inscription</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p class="mt-3">Vous avez déjà un compte ? <a href="index.php?action=connection">Connectez-vous</a></p>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>
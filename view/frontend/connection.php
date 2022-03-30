<?php $title = 'Connexion'; ?>

<?php
try {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Create session for the user
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $user = getConnection($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            $success = 'Vous êtes connecté';
            // Wait 2 seconds before redirecting
            header('Refresh: 2; URL=index.php?action=coffre');
        } else {
            $error = 'Identifiant ou mot de passe incorrect';
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    header('Location: index.php?action=404');
}
?>

<?php ob_start(); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-md-offset-3">
            <h1>Connexion</h1>
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
                    <label for="login">Login</label>
                    <input type="text" id="login" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2 center">Connexion</button>
                </div>
            </form>
            <form class="text-center mt-3">
                <p class="mt-3">Vous n'avez pas de compte ? <a href="index.php?action=register">Inscrivez-vous </a></p>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
<?php $title = 'Inscription'; ?>
<?php $css_name = 'main'; ?>

<?php ob_start(); ?>

<div class="limiter">
    <div class="container-login">
        <div class=".col-md-6 wrap-login w-35  p-3 p-b-90 p-t-50">
            <form class="login-form validate-form" action="" method="POST">
                <span class="login-form-title pb-2 mb-2">
                    Inscription
                </span>
                <div class="wrap-input validate-input mb-2" data-validate="Username is required">
                    <input class="input" type="text" name="username" placeholder="Username">
                </div>

                <div class="wrap-input validate-input mb-2" data-validate="Password is required">
                    <input class="input" type="password" name="password" placeholder="Mot de passe">
                </div>

                <div class="wrap-input validate-input mb-2" data-validate="Password is required">
                    <input class="input" type="password" name="password_confirm" placeholder="Confirmer mot de passe">
                </div>

                <div class="container-confirm-form-btn mt-2">
                    <button type="submit" class="confirm-form-btn">
                        Confirmation
                    </button>
                </div>

            </form>
            <?php if (isset($error)) : ?>
                <div class="text-center alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($success)) : ?>
                <div class="text-center alert alert-success">
                    <?= $success; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($info)) : ?>
                <div class="text-center alert alert-info">
                    <?= $info; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($warning)) : ?>
                <div class="text-center alert alert-warning">
                    <?= $warning; ?>
                </div>
            <?php endif; ?>
            <form class="text-center mt-3">
                <p class="mt-3">Vous avez déjà un compte ? <a href="index.php?action=connection">Connectez-vous </a></p>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>
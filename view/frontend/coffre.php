<?php $title = 'Coffre'; ?>


<?php ob_start(); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-md-offset-3">
            <?php echo '<h1>Bonjour ' . $_SESSION['username'] . ' bienvenu dans votre coffre en ligne</h1>'; ?>

            <!-- déconexion -->
            <form action="index.php?action=logout" method="POST">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2 center">Déconnexion</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
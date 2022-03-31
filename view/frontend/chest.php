<?php
$title = 'Coffre';
$css_name = 'main';
?>

<?php ob_start(); ?>
<div class="container">
    <div class="row justify-content-md-center mt-4">
        <div class="col-md-6 col-md-offset-3">
            <?php echo '<h1 class="text-center">Bonjour ' . $_SESSION['username'] . '</h1>'; ?>
            <p class="text-center">Bienvenu dans votre coffre en ligne <?php $_SESSION['id'] ?></p>

            <!-- upload button -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="flex-center">
                        <label for="file"  class="label-file">Cliquer ici pour choisir votre fichier</label>
                        <input id="file" class="input-file" type="file">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-1 w-100" name="submit">Cliquer ici pour mettre votre ficheir dans le coffre</button>
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

            <a href="public/uploads/<?= $_SESSION['link'][0] ?>" target="_blank" rel="noopener noreferrer">Votre fichier</a>

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
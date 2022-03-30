<?php
$title = 'Coffre';
$css_name_1 = 'main';
$css_name_2 = 'drag_area';

?>



<?php ob_start(); ?>
<div class="container">
    <div class="row justify-content-md-center mt-4">
        <div class="col-md-6 col-md-offset-3">
            <?php echo '<h1 class="text-center">Bonjour ' . $_SESSION['username'] . '</h1>'; ?>
            <p class="text-center">bienvenu dans votre coffre en ligne</p>
            <div class="d-fle">
                <div class="drag-area">
                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <header>Drag & Drop to Upload File</header>
                    <span>OR</span>
                    <button>Browse File</button>
                    <input type="file" hidden>
                </div>
            </div>
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
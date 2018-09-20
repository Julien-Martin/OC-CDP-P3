<?php
$view = 'Tableau de bord';
ob_start(); ?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">Nombre d'épisodes</p>
                <h3 class="card-title"><?= $postNumber; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/posts">Afficher les épisodes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">comments</i>
                </div>
                <p class="card-category">Nombre de commentaires</p>
                <h3 class="card-title"><?= $commentsNumber; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="/admin/comments">Afficher les commentaires</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'template.php';
?>
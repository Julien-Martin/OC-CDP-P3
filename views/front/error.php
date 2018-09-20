<?php ob_start(); ?>
<section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home" data-background="/public/img/alaska.jpg">
    <div class="titan-caption">
        <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-4">Erreur</div>
            <div class="font-alt"><?= $errorMsg; ?></div>
            <div class="font-alt mt-30"><a class="btn btn-border-w btn-round" href="/">Retour à la page d'accueil</a></div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require 'template.php';
?>

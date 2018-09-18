<?php
$view = 'Accueil';
ob_start(); ?>

    <div class="mdl-grid">
        <div class="demo-card-event mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col">
            <div class="mdl-card__title mdl-card--expand">
                <div class="book-card-content">
                    <p><?= $booksNumber;?></p>
                </div>
            </div>
        </div>

    </div>

<?php
$content = ob_get_clean();
require 'template.php';
?>
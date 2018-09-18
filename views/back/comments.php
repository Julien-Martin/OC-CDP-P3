<?php
$view = 'Commentaires';
ob_start(); ?>

    <div class="mdl-grid">
        <?php foreach ($comments as $comment):?>
            <div class="demo-card-event mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col">
                <div class="mdl-card__title mdl-card--expand">
                    <div class="book-card-content">
                        <p><?= $comment['author'];?></p>
                        <p><?= $comment['comment'];?></p>
                        <p><?= $comment['comment_date'];?></p>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href=<?= '/admin/comments/'.$comment['id']; ?> class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Supprimer
                    </a>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?php
$content = ob_get_clean();
require 'template.php';
?>
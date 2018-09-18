<?php
$view = $book['title'];
ob_start();
?>
    <div class="mdl-grid">
        <div class="demo-card-event mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col">
            <div class="mdl-card__title mdl-card--expand">
                <div class="book-card-content">
                    <a href=<?= '/admin/episodes/'.$book['id'].'/newEpisode'; ?>><i class="material-icons">note_add</i></a>
                </div>
            </div>
        </div>
        <?php foreach ($episodes as $episode):?>
            <div class="demo-card-event mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col">
                <div class="mdl-card__title mdl-card--expand">
                    <div class="book-card-content">
                        <h4><?= $episode['title'] ?></h4>
                        <!--<div class="book-card-info">
                    <p><?/*= $book['id']; */?> <i class="material-icons">library_books</i></p>
                    <p>3 <i class="material-icons">comments</i></p>
                </div>-->
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href=<?= '/admin/episodes/'.$book['id'].'/'.$episode['episode_id'];?> class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Éditer l'épisode
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
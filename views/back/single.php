<?php
$view = $book['title'].' : '.$episode['title'];
ob_start();
?>
    <div class="mdl-grid demo-content">
        <form class="tinymce-wrap" action=<?= '/admin/episodes/'.$book['id'].'/'.$episode['episode_id'].'/editEpisode' ?> method="post">
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="title" name="title" value=<?= $episode['title']; ?>>
                    <label class="mdl-textfield__label" for="title">Titre</label>
                </div>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Enregister
                </button>
            </div>
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <textarea id="mce" name="content" ><?= $episode['content']; ?></textarea>

            </div>
        </form>

    </div>
<?php
$content = ob_get_clean();
require 'template.php';
?>
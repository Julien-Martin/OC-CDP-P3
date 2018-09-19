<?php
$view = 'Édition : '.$post['title'];
ob_start();
?>
    <div class="mdl-grid demo-content">
        <form class="tinymce-wrap" action=<?= '/admin/posts/'.$post['id'].'/editPost' ?> method="post">
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="title" name="title" value=<?= $post['title']; ?>>
                    <label class="mdl-textfield__label" for="title">Titre</label>
                </div>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Enregister
                </button>
            </div>
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <textarea id="mce" name="content" ><?= $post['content']; ?></textarea>

            </div>
        </form>

    </div>
<?php
$content = ob_get_clean();
require 'template.php';
?>
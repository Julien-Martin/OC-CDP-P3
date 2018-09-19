<?php ob_start(); ?>
<div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">
        <div class="demo-back">
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="/" title="go back"
               role="button">
                <i class="material-icons" role="presentation">arrow_back</i>
            </a>
        </div>
        <div class="demo-blog__posts mdl-grid">
            <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                <div class="mdl-card__media mdl-color-text--grey-50">
                    <h3><?= $post['title']; ?></h3>
                </div>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <div class="minilogo"></div>
                    <div>
                        <span><?= $post['creation_date']; ?></span>
                    </div>
                    <div class="section-spacer"></div>
                    <div class="meta__favorites">
                        425 <i class="material-icons" role="presentation">favorite</i>
                        <span class="visuallyhidden">favorites</span>
                    </div>
                    <div>
                        <i class="material-icons" role="presentation">bookmark</i>
                        <span class="visuallyhidden">bookmark</span>
                    </div>
                    <div>
                        <i class="material-icons" role="presentation">share</i>
                        <span class="visuallyhidden">share</span>
                    </div>
                </div>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
                    <p><?= $post['content']; ?></p>
                </div>
                <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
                    <form action=<?= '/episode/'.$post['id'].'/addComment' ?> method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="author" name="author">
                            <label class="mdl-textfield__label" for="author">Nom</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="comment" name="comment">
                            <label class="mdl-textfield__label" for="comment">Commentaire</label>
                        </div>
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                        </button>
                    </form>
                    <?php
                    while ($data = $comments->fetch()) {
                        ?>
                        <div class="comment mdl-color-text--grey-700">
                            <header class="comment__header">
                                <img src="/public/img/co1.jpg" class="comment__avatar">
                                <div class="comment__author">
                                    <strong><?= $data['author']; ?></strong>
                                    <span><?= $data['comment_date']; ?></span>
                                </div>
                            </header>
                            <div class="comment__text"><?= $data['comment']; ?></div>
                            <nav class="comment__actions">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                    <i class="material-icons" role="presentation">thumb_up</i><span
                                            class="visuallyhidden">like comment</span>
                                </button>
                            </nav>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
                <?php
                    if($key+1 != 1 && $key+1 <= $total) {
                        $previousPage = $previousPage = $posts[array_search($post['id'], array_column($posts, 'id'))-1]['id'];;
                        echo '<a href=/episode/'. $previousPage.' class="demo-nav__button">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                        role="presentation">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                                Épisode '.$key.'
                            </a>';
                    }
                ?>


                <div class="section-spacer"></div>

                <?php
                    if($key+1 != $total && $key+1 < $total){
                        $nextPage = $posts[array_search($post['id'], array_column($posts, 'id'))+1]['id'];
                        $url = '/episode/'.$nextPage;
                        echo '<a href=/episode/'.$nextPage.' class="demo-nav__button">
                                Épisode '.($key+2).'
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                        role="presentation">
                                    <i class="material-icons">arrow_forward</i>
                                </button>
                            </a>';
                    }
                ?>

            </nav>
        </div>
        <?php
        $content = ob_get_clean();
        require 'template.php';
        ?>


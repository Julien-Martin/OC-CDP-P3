<?php ob_start(); ?>
    <div class="main">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="post">
                        <div class="post-header font-alt">
                            <h1 class="post-title"><?= $post['title']; ?></h1>
                            <div class="post-meta"><?= "Par Jean Forteroche | " . $post['creation_date'] . " | " . $commentsNumber . " commentaire(s)" ?></div>
                        </div>
                        <div class="post-entry">
                            <p><?= $post['content']; ?></p>
                        </div>
                    </div>
                    <div class="comments">
                        <h4 class="comment-title font-alt"><?= "Il y a " . $commentsNumber . " commentaire(s)"; ?></h4>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment clearfix">
                                <div class="comment-content clearfix">
                                    <div class="comment-author font-alt"><a href="#"><?= $comment['author']; ?></a>
                                    </div>
                                    <div class="comment-body">
                                        <p><?= $comment['comment']; ?></p>
                                    </div>
                                    <div class="comment-meta font-alt">
                                        <?= $comment['comment_date']; ?>
                                        <a href=<?= '/episode/reportComment/'.$post['id'].'/'.$comment['id']; ?>>Signaler</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="comment-form">
                        <h4 class="comment-form-title font-alt">Ajouter un commentaire</h4>
                        <form action=<?= '/episode/' . $post['id'] . '/addComment' ?> method="post">
                            <div class="form-group">
                                <label class="sr-only" for="name">Nom</label>
                                <input class="form-control" id="name" type="text" name="author" placeholder="Nom"/>
                            </div>
                            <div class="form-group">
                                    <textarea class="form-control" id="comment" name="comment" rows="4"
                                              placeholder="Commentaire"></textarea>
                            </div>
                            <button class="btn btn-round btn-d" type="submit">Publier le commentaire</button>
                        </form>
                    </div>
                    <div class="comment-form">
                        <h4 class="comment-form-title font-alt">Pagination</h4>
                        <div class="custom-pagination">
                            <div class="custom-pagination-element">
                                <?php
                                if ($key + 1 != 1 && $key + 1 <= $total) {
                                    $previousPage = $posts[array_search($post['id'], array_column($posts, 'id')) - 1]['id'];
                                    echo '<a href=/episode/' . $previousPage . ' class="demo-nav__button">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                        role="presentation">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                                Épisode ' . $key . '
                            </a>';
                                }
                                ?>
                            </div>
                            <div class="section-spacer"></div>
                            <div class="custom-pagination-element">
                                <?php
                                if ($key + 1 != $total && $key + 1 < $total) {
                                    $nextPage = $posts[array_search($post['id'], array_column($posts, 'id')) + 1]['id'];
                                    $url = '/episode/' . $nextPage;
                                    echo '<a href=/episode/' . $nextPage . ' class="demo-nav__button">
                                Épisode ' . ($key + 2) . '
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                        role="presentation">
                                    <i class="material-icons">arrow_forward</i>
                                </button>
                            </a>';
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean();
require 'template.php'
?>
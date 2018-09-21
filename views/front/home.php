<?php ob_start(); ?>
    <section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home"
             data-background="/public/img/alaska.jpg">
        <div class="titan-caption">
            <div class="caption-content">
                <div class="font-alt mb-30 titan-title-size-1">Un roman épisodique</div>
                <div class="font-alt mb-40 titan-title-size-3">"Billet simple pour l'Alaska"</div>
            </div>
        </div>
    </section>
    <div class="main">
    <section class="module">
        <div class="container">
            <div class="row multi-columns-row post-columns">
                <?php foreach ($posts as $post): ?>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="post">
                            <?php
                                $imageId = array_search($post['id'], array_column($posts, 'id'))+1;
                            ?>
                            <div class="post-thumbnail"><a href=<?= '/episode/'.$post['id'];?>><img src=<?= '/public/img/thumbnails/'.$imageId.'.jpg'; ?> alt="Blog-post Thumbnail"/></a></div>
                            <div class="post-header font-alt">
                                <h2 class="post-title"><a href=<?= '/episode/'.$post['id'];?>><?= $post['title'] ?></a></h2>
                                <div class="post-meta"> <?= $post['creation_date'] ?>
                                </div>
                            </div>
                            <div class="post-more"><a class="more-link" href=<?= '/episode/'.$post['id'];?>>Lire</a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php $content = ob_get_clean();
require 'template.php';
?>
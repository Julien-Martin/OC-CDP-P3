<?php ob_start(); ?>
    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">
            <div class="demo-blog__posts mdl-grid">
                <?php
                while($data = $posts->fetch()) {
                    ?>
                    <div class="mdl-card coffee-pic mdl-cell mdl-cell--6-col">
                        <div class="mdl-card__media mdl-color-text--grey-50">
                            <h3><a href=<?= "/episode/".$data['id']; ?>><?= htmlspecialchars($data['title']); ?></a></h3>
                        </div>
                        <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                            <div class="minilogo"></div>
                            <div>
                                <span><?= $data['creation_date']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                ?>
                <!--<nav class="demo-nav mdl-cell mdl-cell--12-col">
                    <div class="section-spacer"></div>
                    <a href="single.php" class="demo-nav__button" title="show more">
                        More
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">arrow_forward</i>
                        </button>
                    </a>
                </nav>-->
            </div>
<?php
$posts->closeCursor();
$content = ob_get_clean();
require 'template.php';
?>

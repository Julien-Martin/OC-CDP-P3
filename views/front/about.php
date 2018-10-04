<?php ob_start(); ?>
    <div class="main">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?= $about['content']; ?>
                </div>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean();
require 'template.php'
?>
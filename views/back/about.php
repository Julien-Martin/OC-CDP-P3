<?php
$view = 'À propos';
ob_start(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">face</i>
                    </div>
                    <h3 class="card-title">Modifier la page à propos</h3>
                </div>
                <div class="card-body">
                    <form action="/admin/about" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="mce" name="content" ><?= htmlspecialchars($about['content']); ?></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Modifier</button>
                        <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require 'template.php';
?>
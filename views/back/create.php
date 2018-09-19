<?php
$view = 'Épisodes';
ob_start();
?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <h3 class="card-title">Ajouter un épisode</h3>
                </div>
                <div class="card-body">
                    <form action="/admin/posts/createPost" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Titre</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="mce" name="content" ></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Ajouter l'épisode</button>
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
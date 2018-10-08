<?php ob_start(); ?>
    <div class="main">
        <section class="module bg-dark-30" data-background="/public/img/connexion.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt mb-0">Connexion</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <h4 class="font-alt">Connexion</h4>
                        <hr class="divider-w mb-10">
                        <form class="form" action="/login" method="post">
                            <div class="form-group">
                                <input class="form-control" id="username" type="text" name="username" placeholder="Identifiant"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-round btn-b">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php $content = ob_get_clean();
require 'template.php';

?>
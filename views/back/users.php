<?php
$view = 'Utilisateurs';
ob_start(); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <h3 class="card-title">Ajouter un utilisateur</h3>
                </div>
                <div class="card-body">
                    <form action="/admin/users/createUser" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nom d'utilisateur</label>
                                    <input type="text" name="username" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                        <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <i class="material-icons">comments</i> Gestion des utilisateurs
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                    <?php foreach ($users as $user):?>
                                    <tr>
                                        <td><?= $user['username']; ?></td>
                                        <td class="td-actions text-right">
                                            <form action=<?= '/admin/users/'.$user['id']; ?> method="post">
                                                <button type="submit" rel="tooltip" title="Supprimer" class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require 'template.php';
?>
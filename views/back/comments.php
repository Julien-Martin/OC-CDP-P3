<?php
$view = 'Commentaires';
ob_start(); ?>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-success">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <i class="material-icons">comments</i> Gestion des commentaires
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
                                <?php foreach ($comments as $comment): ?>
                                    <?php
                                    if ($comment['reported']) {
                                        $report = '<button type="submit" rel="tooltip" title="Enlever le signalement" class="btn btn-danger btn-link btn-sm"><i class="material-icons">warning</i></button>';
                                    } else {
                                        $report = '';
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $comment['author']; ?></td>
                                        <td><?= $comment['comment_date']; ?></td>
                                        <td class="td-text"><?= $comment['comment'] ?></td>
                                        <td class="td-actions text-right">
                                            <form action=<?= '/admin/comments/' . $comment['id']; ?> method="post">
                                                <button type="submit" rel="tooltip" title="Supprimer" class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                            <form action=<?= '/admin/comments/'.$comment['id'].'/unreported' ?> method="post">
                                                <?= $report; ?>
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
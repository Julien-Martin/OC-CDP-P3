<?php
$view = 'Épisodes';
ob_start();
?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-warning">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/posts/newPost">
                                        <i class="material-icons">note_add</i> Ajouter un épisode
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
                                <?php foreach ($posts as $post):?>
                                <tr>
                                    <td><?= $post['title']; ?></td>
                                    <td><?= substr($post['content'], 0, 50); ?></td>
                                    <td class="td-actions text-right">
                                        <button onclick="location.href='<?= '/admin/posts/'.$post['id'];?>'" type="button" rel="tooltip" title="Editer"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <form action=<?= '/admin/posts/'.$post['id'].'/removePost';?> method="post">
                                            <button type="submit" rel="tooltip" title="Supprimer"
                                                    class="btn btn-danger btn-link btn-sm">
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
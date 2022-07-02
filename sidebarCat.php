<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
$user = current_user();
$all_categories = find_all('categories')
?>

<section id="stats-subtitle">
    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Categories Management</h4>
            <p>Add, Remove, View all categories.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php echo display_msg($msg); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="secondary">Add New Categories</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="categorie-name" placeholder="Categorie Name">
                                </div>
                                <button name="add_cat" class="btn btn-secondary" onclick="clickAddCat()">Add categorie</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-8 col-md-12">
            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_categories as $cat) : ?>
                        <tr>
                            <th scope="row"><?php echo count_id(); ?></th>
                            <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                            <td>
                                <a data-toggle="tooltip" title="Edit">
                                    <button type="button" class="btn btn-warning" onclick="loadPageEdit('edit_categorie', <?php echo (int)$cat['id']; ?>)"><i class="icon-pencil"></i></button>
                                </a>
                                <?php if ($user['user_level'] <= '1') : ?>
                                <a data-toggle="tooltip" title="Remove">
                                    <button type="button" class="btn btn-danger" onclick="clickDelCat(<?php echo (int)$cat['id']; ?>)"><i class="icon-trash"></i></button>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
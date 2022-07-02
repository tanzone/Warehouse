<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
$all_groups = find_all('user_groups');
$all_users = find_all_user();
?>

<section id="stats-subtitle">
    <div class="row">
        <div class="col-md-12">
            <?php echo display_msg($msg); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Group Management</h4>
            <p>View all group present on the system.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <button type="button" class="btn btn-outline-success" onclick="loadPage('add_group')">Add Group</button>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-md-12">
            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Group Name</th>
                        <th scope="col">Group Level</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_groups as $a_group) : ?>
                        <tr>
                            <th scope="row"><?php echo count_id(); ?></th>
                            <td><?php echo remove_junk(ucwords($a_group['group_name'])) ?></td>
                            <td><?php echo remove_junk(ucwords($a_group['group_level'])) ?></td>
                            <td>
                                <?php if ($a_group['group_status'] === '1') : ?>
                                    <span class="success"><?php echo "Active"; ?></span>
                                <?php else : ?>
                                    <span class="danger"><?php echo "Deactive"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a data-toggle="tooltip" title="Edit">
                                    <button type="button" class="btn btn-warning" onclick="loadPageEdit('edit_group', <?php echo (int)$a_group['id']; ?>)"><i class="icon-pencil"></i></button>
                                </a>
                                <a data-toggle="tooltip" title="Remove">
                                    <button type="button" class="btn btn-danger" onclick="clickDelGroup(<?php echo (int)$a_group['id']; ?>)"><i class="icon-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section id="stats-subtitle">
    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <hr>
            <h4 class="text-uppercase">User Management</h4>
            <p>View all users registred.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <button type="button" class="btn btn-outline-success" onclick="loadPage('add_user')">Add User</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_users as $a_user) : ?>
                        <tr>
                            <th scope="row"><?php echo count_id(); ?></th>
                            <td><?php echo remove_junk(ucwords($a_user['name'])) ?></td>
                            <td><?php echo remove_junk(ucwords($a_user['username'])) ?></td>
                            <td><?php echo remove_junk(ucwords($a_user['group_name'])) ?></td>
                            <td>
                                <?php if ($a_user['status'] === '1') : ?>
                                    <span class="success"><?php echo "Active"; ?></span>
                                <?php else : ?>
                                    <span class="danger"><?php echo "Deactive"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo read_date($a_user['last_login']) ?></td>
                            <td>
                                <a data-toggle="tooltip" title="Edit">
                                    <button type="button" class="btn btn-warning" onclick="loadPageEdit('edit_user', <?php echo (int)$a_user['id']; ?>)"><i class="icon-pencil"></i></button>
                                </a>
                                <a data-toggle="tooltip" title="Remove">
                                    <button type="button" class="btn btn-danger" onclick="clickDelUser(<?php echo (int)$a_user['id']; ?>)"><i class="icon-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>





</section>
<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
?>
<?php
$e_user = find_by_id('users', (int)$_SESSION['session_edit']);
$groups  = find_all('user_groups');
if (!$e_user) {
  $session->msg("d", "Missing user id.");
  return false;
}
?>


<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Update <?php echo remove_junk(ucwords($e_user['name'])); ?> Account</h4>
      <p id="user-id-edit" hidden><?php echo $e_user["id"]; ?></p>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Name</label>
      <div class="input-group mb-3">
        <input id="user-name-edit" type="text" class="form-control" name="group-name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
      </div>

      <label for="name" class="control-label">Username</label>
      <div class="input-group mb-3">
        <input id="user-username-edit" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $e_user['username']; ?>">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">User Role: </label>
        </div>
        <select class="custom-select" id="role-edit">
          <?php foreach ($groups as $group) : ?>
            <option <?php if ($group['group_level'] === $e_user['user_level']) echo 'selected="selected"'; ?> value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Status: </label>
        </div>
        <select class="custom-select" id="status-edit">
          <option <?php if ($e_user['status'] === '1') echo 'selected="selected"'; ?> value="1"> Active </option>
          <option <?php if ($e_user['status'] === '0') echo 'selected="selected"'; ?> value="0">Deactive</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-success" onclick="clickEditUser()">Update User Info</button>
    </div>
  </div>
</section>




<section id="stats-subtitle">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <hr>
      <h4 class="text-uppercase">Change <?php echo remove_junk(ucwords($e_user['name'])); ?> Password</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Password</label>
      <div class="input-group mb-3">
        <input id="user-psw-edit" type="text" class="form-control" name="user-psw" placeholder="Type user new password" aria-label="Type user new password" aria-describedby="basic-addon1">
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-danger" onclick="clickEditPassw()">Change</button>
    </div>
  </div>
</section>
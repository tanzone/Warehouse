<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
$groups = find_all('user_groups');
?>

<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Add New User</h4>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Name</label>
      <div class="input-group mb-3">
        <input id="full-name" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1">
      </div>

      <label for="name" class="control-label">Username</label>
      <div class="input-group mb-3">
        <input id="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div>

      <label for="name" class="control-label">Password</label>
      <div class="input-group mb-3">
        <input id="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Group Name: </label>
        </div>
        <select class="custom-select" id="level">
          <?php foreach ($groups as $group) : ?>
            <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-success" onclick="clickAddUser()">Add User</button>
    </div>
  </div>
</section>
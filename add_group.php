<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
?>

<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Add New User Group</h4>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Group Name</label>
      <div class="input-group mb-3">
        <input id="group-name" type="text" class="form-control" placeholder="Group Name" aria-label="Group Name" aria-describedby="basic-addon1">
      </div>

      <label for="name" class="control-label">Group Level</label>
      <div class="input-group mb-3">
        <input id="group-level" type="text" class="form-control" placeholder="Group Level" aria-label="Group Level" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Status: </label>
        </div>
        <select class="custom-select" id="status">
          <option selected value="1">Active</option>
          <option value="0">Deactive</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-success" onclick="clickAddGroup()">Add Group</button>
    </div>
  </div>
</section>
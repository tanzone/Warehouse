<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
?>
<?php
$e_group = find_by_id('user_groups', (int)$_SESSION['session_edit']);
if (!$e_group) {
  $session->msg("d", "Missing Group id.");
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
      <h4 class="text-uppercase">Edit Group</h4>
      <p id="group-id-edit" hidden><?php echo $e_group["id"];?></p>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Group Name</label>
      <div class="input-group mb-3">
        <input id="group-name-edit" type="text" class="form-control" name="group-name" value="<?php echo remove_junk(ucwords($e_group['group_name'])); ?>" placeholder="Group Name" aria-label="Group Name" aria-describedby="basic-addon1">
      </div>

      <label for="name" class="control-label">Group Level</label>
      <div class="input-group mb-3">
        <input id="group-level-edit" type="text" class="form-control" placeholder="Group Level" aria-label="Group Level" aria-describedby="basic-addon1" value="<?php echo (int)$e_group['group_level']; ?>">

      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Status: </label>
        </div>
        <select class="custom-select" id="status-edit">
          <option <?php if ($e_group['group_status'] === '1') echo 'selected="selected"'; ?> value="1"> Active </option>
          <option <?php if ($e_group['group_status'] === '0') echo 'selected="selected"'; ?> value="0">Deactive</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-success" onclick="clickEditGroup()">Update Group</button>
    </div>
  </div>
</section>
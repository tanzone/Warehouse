<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(3);
?>
<?php $user = current_user(); ?>

<?php
if (isset($_POST['update'])) {

  $req_fields = array('new-password', 'old-password', 'id');
  validate_fields($req_fields);

  if (empty($errors)) {

    if (sha1($_POST['old-password']) !== current_user()['password']) {
      $session->msg('d', "Your old password not match");
      redirect('change_password.php', false);
    }

    $id = (int)$_POST['id'];
    $new = remove_junk($db->escape(sha1($_POST['new-password'])));
    $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) :
      $session->logout();
      $session->msg('s', "Login with your new password.");
      redirect('index.php', false);
    else :
      $session->msg('d', ' Sorry failed to updated!');
      redirect('change_password.php', false);
    endif;
  } else {
    $session->msg("d", $errors);
    redirect('change_password.php', false);
  }
}
?>

<?php include_once('layouts/header.php'); ?>

<div class="dinamic">

  <section id="stats-subtitle">
    <div class="row">
      <div class="col-md-12">
        <?php echo display_msg($msg); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Change your Password</h4>
        <hr>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-6 mt-3 mb-1">
          <form method="post" action="change_password.php" class="clearfix">
            <label for="name" class="control-label">New password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="new-password" placeholder="New password">
            </div>

            <label for="name" class="control-label">Old password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="old-password" placeholder="Old password">
            </div>
            <div class="input-group mb-3">
              <input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
              <button type="submit" name="update" class="btn btn-info">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

</div>
<?php include_once('layouts/footer.php'); ?>
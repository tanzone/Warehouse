<?php
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
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

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col">
          <h1>This is your new home page!</h1>
          <p>Last access: <strong><?php echo date("F j, Y, g:i a"); ?></strong></p>
        </div>
      </div>
    </div>
    
</div>

<?php include_once('layouts/footer.php'); ?>
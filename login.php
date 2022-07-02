<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) {
  redirect('home.php', false);
}
?>

<?php include_once('layouts/header.php'); ?>

<body class="hiddenBody">
  <div class="container" onclick="onclick">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
      <h2>Please Sign In</h2>
      <form method="post" action="auth.php">
        <?php echo display_msg($msg); ?>
        <input type="name" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <input type="submit" value="Sign In" class="btnLogin" />
      </form>
      <h2>&nbsp;</h2>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
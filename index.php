<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true))  { redirect('home.php', false);}
  else                                { redirect('login.php', false);}
?>



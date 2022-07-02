<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(3);
?>

<?php
$user_id = (int)$_GET['id'];
if (empty($user_id)) :
  redirect('home.php', false);
else :
  $user_p = find_by_id('users', $user_id);
endif;
?>

<?php include_once('layouts/header.php'); ?>

<div class="dinamic">

  <div class="container">
    <div class="row">
      <!-- Single Advisor-->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <!-- Team Thumb-->
          <div class="advisor_thumb"><img src="uploads/users/<?php echo $user_p['image']; ?>" alt="Image Profile">
            <!-- Social Info-->
            <div class="social-info">
              <?php if ($user_p['id'] === $user['id']) : ?>
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="edit_account.php"> <i class="icon-pencil"></i> Edit profile</a></li>
                </ul>
              <?php endif; ?>
            </div>
          </div>
          <!-- Team Details-->
          <div class="single_advisor_details_info">
            <h6><?php echo first_character($user_p['name']); ?></h6>
            <p class="designation"><?php echo first_character($user_p['username']); ?> &amp; <?php echo first_character($user_p['user_level']); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
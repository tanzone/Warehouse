<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div>
      <a href="home.php" class="nav_logo">
        <i class='bx bx-home nav_logo-icon'></i>
        <span class="nav_logo-name">UNIPR Warehouse</span>
      </a>
      <div class="nav_list">
        <?php if ($user['user_level'] <= '2') : ?>
          <a class="nav_link sidebarClick" name="sidebarDash">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '1') : ?>
          <a class="nav_link sidebarClick" name="sidebarUser">
            <i class='bx bx-user nav_icon'></i>
            <span class="nav_name">User Management</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '2') : ?>
          <a class="nav_link sidebarClick" name="sidebarCat"> 
            <i class='bx bx-list-ol nav_icon'></i>
            <span class="nav_name">Categories</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '3') : ?>
          <a class="nav_link sidebarClick" name="sidebarProd"> 
            <i class='bx bx-box nav_icon'></i>
            <span class="nav_name">Products</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '2') : ?>
          <a class="nav_link sidebarClick" name="sidebarMedia"> 
            <i class='bx bx-folder nav_icon'></i>
            <span class="nav_name">Medias</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '3') : ?>
          <a class="nav_link sidebarClick" name="sidebarSales">
             <i class='bx bx-euro nav_icon'></i>
            <span class="nav_name">Sales</span>
          </a>
        <?php endif; ?>
        <?php if ($user['user_level'] <= '0') : ?>
          <a class="nav_link sidebarClick" name="sidebarRep"> 
            <i class='bx bx-edit nav_icon'></i>
            <span class="nav_name">Sales Report</span>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
      <span class="nav_name">SignOut</span> </a>
  </nav>
</div>
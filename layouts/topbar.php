<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="btn-group">
            <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-image" width="40" height="40" class="rounded-circle">
                <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php?id=<?php echo (int)$user['id']; ?>">Profile</a></li>
                <li><a class="dropdown-item" href="edit_account.php">Settings</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
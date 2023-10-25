<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text"><span>Event</span>Share</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <div>
        <ul class="nav">
            <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href=#>Services</a></li>

            <?php if (isset($_SESSION['id'])): ?>
                <li>
                    <a href=#>
                        <i class="fa fa-user"></i>
                        <?php echo $_SESSION ['username']; ?>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul>
                        <?php if($_SESSION["admin"]): ?>
                        <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>"">DashBoard</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="Logout">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/register.php' ?>">SignUp</a></li>
                <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>
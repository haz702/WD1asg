<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
        <h1 class="logo-text"><span>Event</span>Share</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <div class="nav">
        <?php if (isset($_SESSION["id"])): ?>
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION["username"]; ?>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul>
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="Logout">Logout</a></li>
                </ul>
            </li>
        </ul>
        <?php endif;    ?>
    </div>
</header>
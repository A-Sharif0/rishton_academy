<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="<?= $GLOBALS['logo']; ?>" alt="">
        </div>

        <span class="logo_name">
            <?php if (isset($_SESSION['ADMINID'])) {
                echo $_SESSION['ADMINNAME'];
            } ?>
        </span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="./home">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
            <li><a href="./manage_parents">
            <i class="uil uil-users-alt"></i>
                <span class="link-name">Manage Parents</span>
            </a></li>
            <li><a href="./manage_teachers">
            <i class="fas fa-chalkboard-teacher"></i>
                <span class="link-name">Manage Teachers</span>
            </a></li>
            <li><a href="./manage_teacherassistant">
            <i class="fa-solid fa-handshake"></i>
                <span class="link-name">Manage Teaching Assistants</span>
            </a></li>
            <li><a href="./manage_classes">
            <i class="fas fa-clock"></i>
                <span class="link-name">Manage Classes</span>
            </a></li>
            <li><a href="./manage_pupils">
            <i class="fas fa-users"></i>
                <span class="link-name">Manage Pupils</span>
            </a></li>
            <li><a href="./manage_dinnermoney">
            <i class="fas fa-hamburger"></i>
                <span class="link-name">Manage Dinner Money</span>
            </a></li>
            <li><a href="./manage_salary">
            <i class="fas fa-money-check-alt"></i>
                <span class="link-name">Manage Salary</span>
            </a></li><li><a href="./manage_libbook">
            <i class="fas fa-book"></i>
                <span class="link-name">Manage Library Books</span>
            </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="./config/logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <!-- profile-dropdown -->
        <div class="">
            <img src="<?= $GLOBALS['profile']; ?>" alt="">
            <div class="dropdown-content">
                <a href="#">Name</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
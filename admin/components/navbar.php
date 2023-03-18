<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 shadow-none" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 fs-3" href="index.php"><?= settings()['companyname'] ?></a>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
                    ?>
                        <a class="dropdown-item" href="<?= settings()['homepage'] ?>logout.php">Logout</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<header class="app-header">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="brand-logo d-flex align-items-center justify-content-between">
			<a href="<?=BURL?>" class="text-nowrap logo-img">
				<h2 class="fw-bold">Maha FC</h2>
			</a>
			<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
				<i class="ti ti-x fs-8"></i>
			</div>
		</div>
		<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
			<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item">
          <a href="#home" class="nav-link fs-4">Home</a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link fs-4">About</a>
        </li>
        <li class="nav-item">
          <a href="#services" class="nav-link fs-4">Services</a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link fs-4">Contact</a>
        </li>
        <?php if (isset($_SESSION['user'])) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" type="button" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="<?=IMG?>/users/<?= ($_SESSION['user']['image']) ? $_SESSION['user']['image'] : 'user-1.jpg' ?>" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a class="d-flex flex-column align-items-center dropdown-item disabled">
                  <p class="mb-0 fs-3 fw-bold"><?=$_SESSION['user']['username']?></p>
                  <small class="mb-0 fs-2 fw-light"><?=$_SESSION['user']['role']?></small>
                </a>
                <?php if ($_SESSION['user']['role'] == "Admin") { ?>
                  <div class="dropdown-divider"></div>
                  <a href="<?=BURL?>/dashboard" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-layout-dashboard fs-6"></i>
                    <p class="mb-0 fs-3">Dashboard</p>
                  </a>
                  <a href="<?=BURL?>/profile/<?=$_SESSION['user']['username']?>" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">My Profile</p>
                  </a>
                <?php } ?>
                <a href="<?=BURL?>/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a href="<?=BURL?>/login" class="nav-link fs-4">Login</a>
          </li>
        <?php } ?>
			</ul>
		</div>
	</nav>
</header>
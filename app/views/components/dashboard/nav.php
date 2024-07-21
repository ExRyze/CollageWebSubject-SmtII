<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<div class="brand-logo d-flex align-items-center justify-content-between">
			<a href="<?=BURL?>" class="text-nowrap logo-img">
				<h2 class="fw-bold">Maha FC</h2>
			</a>
			<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
				<i class="ti ti-x fs-8"></i>
			</div>
		</div>
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
			<ul id="sidebarnav">
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Home</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/dashboard" aria-expanded="false">
						<span>
							<i class="ti ti-layout-dashboard"></i>
						</span>
						<span class="hide-menu">Dashboard</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/dashboard/statistik" aria-expanded="false">
						<span>
							<i class="ti ti-chart-bar"></i>
						</span>
						<span class="hide-menu">Statistic</span>
					</a>
				</li>
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Data</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/dashboard/admin" aria-expanded="false">
						<span>
							<i class="ti ti-user"></i>
						</span>
						<span class="hide-menu">Admin</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/dashboard/member" aria-expanded="false">
						<span>
							<i class="ti ti-id-badge-2"></i>
						</span>
						<span class="hide-menu">Member</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/dashboard/kategori" aria-expanded="false">
						<span>
							<i class="ti ti-packages"></i>
						</span>
						<span class="hide-menu">Kategori barang</span>
					</a>
				</li>
				<li class="sidebar-item dropdown">
					<a type="button" class="sidebar-link" data-bs-toggle="collapse" data-bs-target="#colNav" aria-expanded="false" aria-controls="collapseExample">
						<span>
							<i class="ti ti-package"></i>
						</span>
						<span class="hide-menu">Item barang</span>
						<span class="ms-auto">
							<i class="ti ti-chevron-down"></i>
						</span>
					</a>
				</li>
				<li class="sidebar-item dropdown collapse ps-4" id="colNav">
					<?php foreach (Functions::categories() as $ktg) { ?>
						<a class="sidebar-link bg-white text-dark" href="<?=BURL?>/kategori/<?=$ktg['id']?>" aria-expanded="false">
							<span>
								<i class="ti ti-point"></i>
							</span>
							<span class="hide-menu"><?=$ktg['nama']?></span>
						</a>
					<?php } ?>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?=BURL?>/penjualan" aria-expanded="false">
						<span>
							<i class="ti ti-cash"></i>
						</span>
						<span class="hide-menu">Penjualan</span>
					</a>
				</li>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
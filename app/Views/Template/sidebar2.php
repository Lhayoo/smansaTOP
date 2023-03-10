<?php

use App\Models\userModel;

$userModel = new userModel();

$datUser = $userModel->getUser(session()->get('id'));
?>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('/assets/theme/dist/img/icon-user.png'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                <?= $datUser['username']; ?>
            </a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
		<div class="input-group" data-widget="sidebar-search">
			<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-sidebar">
					<i class="fas fa-search fa-fw"></i>
				</button>
			</div>
		</div>
	</div>
	<!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="<?= base_url() ?>" class="nav-link <?= ($active == 'home') ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Home</p>
                </a>
            </li>
            <?php if ($datUser['level'] == '1') :; ?>
                <li class="nav-item ">
                    <a href="<?= base_url('/Siswa/index') ?>" class="nav-link <?= ($active == 'siswa') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?= base_url('/Users/index') ?>" class="nav-link <?= ($active == 'users') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Users</p>
                    </a>
                </li>
            <?php
            endif;
            ?>
            <li class="nav-item">
                <a href="<?= site_url('/Auth/logout') ?>" class="nav-link btn bg-danger text-left text-white">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
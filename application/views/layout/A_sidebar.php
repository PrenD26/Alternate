<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="<?=base_url('dashboard/calendar')?>" style='font-size:20px; font-weight:700 ;  margin-top:4px; ' class="nav-link nav-link-lg">
                            <span><?php echo date("d/m/Y"); ?></a></li>
                    <li><a href="#" data-toggle="sidebar" style='font-size:20px; padding-left:2px !important; font-weight:700 ; margin-top:4px;' class="nav-link nav-link-lg">
                            <span id="jamServer"><?php echo date("H:i:s"); ?></span></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?= base_url('assets/avatar/') .$this->session->userdata['image'] ?>" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi,<?= $this->session->userdata['username'] ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                   
                        <div class="dropdown-title">Login <?php $post_date=$this->session->userdata['jam_login'];$now = time();echo timespan($post_date, $now) . ' ago'; ?></div>
                        <a href="<?=base_url('profile')?>" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="<?=base_url('profile/change')?>" class="dropdown-item has-icon">
                            <i class="fas fa-key"></i> Ubah Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger tombol-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?= base_url('dashboard') ?>">Alternate</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?= base_url('dashboard') ?>">Ae</a>
                </div>
                <ul class="sidebar-menu">

                    <li class="menu-header">Dashboard</li>
                    <li class="<?php if ($this->uri->segment(1) == 'dashboard') echo 'active' ?>"><a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-chart-pie"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">Manage</li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(1) == 'barang') echo 'active' ?> <?php if ($this->uri->segment(1) == 'paket') echo 'active' ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i><span>Item</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(1) == 'barang') echo 'active' ?>"><a class="nav-link" href="<?= base_url('barang') ?>">Barang</a></li>
                            <li class="<?php if ($this->uri->segment(1) == 'paket') echo 'active' ?>"><a class="nav-link" href="<?= base_url('paket') ?>">Paket</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(1) == 'pelanggan') echo 'active' ?> <?php if ($this->uri->segment(1) == 'user') echo 'active' ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Data</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(1) == 'pelanggan') echo 'active' ?>"><a class="nav-link" href="<?= base_url('pelanggan') ?>">Pelanggan</a></li>
                            <?php if ($this->session->userdata("level") == 'Admin') : ?>
                                <li class="<?php if ($this->uri->segment(1) == 'user') echo 'active' ?>"><a class="nav-link" href="<?= base_url('user') ?>">User</a></li>
                            <?php endif ?>
                        </ul>
                    </li>
                    <li class="menu-header">Transaction</li>
                    <li class="<?php if ($this->uri->segment(1) == 'transaksi') echo 'active' ?>"><a class="nav-link" href="<?= base_url('transaksi') ?>"><i class="fas fa-cash-register"></i>
                            <span>Transaksi</span></a>
                    </li>
                    <li class="<?php if ($this->uri->segment(1) == 'mutasi') echo 'active' ?>"><a class="nav-link" href="<?= base_url('mutasi') ?>"><i class="fas fa-exchange"></i>
                            <span>Mutasi</span></a>
                    </li>
                </ul>


            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
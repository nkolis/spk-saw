<?php

use SPK\App\Cores\Config;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $model['title'] ?></title>
    <link href="<?= Config::getBaseUrl() ?>/src/css/datatables.css" rel="stylesheet" />
    <link href="<?= Config::getBaseUrl() ?>/src/css/styles.css" rel="stylesheet" />
    <script src="<?= Config::getBaseUrl() ?>/src/js/all-min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">SPK - SAW</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Ubah Password</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav mt-4">
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Beranda
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/kriteria">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Kriteria
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/penduduk">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Penduduk
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/alternatif">
                            <div class="sb-nav-link-icon"><i class="fas fa-copy"></i></div>
                            Alternatif
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/penilaian">
                            <div class="sb-nav-link-icon"><i class="fas fa-paste"></i></div>
                            Penilaian
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/laporan">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            Laporan
                        </a>
                        <a class="nav-link" href="<?= Config::getBaseUrl() ?>/pengguna">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Pengguna
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
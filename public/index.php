<?php

require_once __DIR__ . "/../vendor/autoload.php";

use SPK\App\Cores\Router;
use SPK\App\Controllers\{HomeController, KriteriaController, AlternatifController, PenilaianController, LaporanController, PenggunaController, PendudukController};

//Beranda
Router::add("GET", "/", HomeController::class, "index");
//Kriteria
Router::add("GET", "/kriteria", KriteriaController::class, "index");
Router::add("GET", "/kriteria/tambah", KriteriaController::class, "tambah");
Router::add("GET", "/kriteria/subkriteria/id/([0-9A-Za-z]*)", KriteriaController::class, "subkriteria");
Router::add("POST", "/kriteria/tambahKriteria", KriteriaController::class, "tambahKriteria");
//Penduduk
Router::add("GET", "/penduduk", PendudukController::class, "index");
//Alternatif
Router::add("GET", "/alternatif", AlternatifController::class, "index");
Router::add("GET", "/alternatif/detail/id/([0-9A-Za-z]*)", AlternatifController::class, "detail");
//Penilaian
Router::add("GET", "/penilaian", PenilaianController::class, "index");
//Laporan
Router::add("GET", "/laporan", LaporanController::class, "index");
//Pengguna
Router::add("GET", "/pengguna", PenggunaController::class, "index");

//Run
Router::run();

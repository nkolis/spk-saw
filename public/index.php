<?php

require_once __DIR__ . "/../vendor/autoload.php";

use SPK\App\Core\Router;

use SPK\App\Controllers\{HomeController, KriteriaController, SubkriteriaController, AlternatifController, PenilaianController, LaporanController, PenggunaController, PendudukController};

//Beranda
Router::add("GET", "/", HomeController::class, "index");
//Kriteria
Router::add("GET", "/kriteria", KriteriaController::class, "index");
Router::add("POST", "/kriteria/id/([0-9A-Za-z]*)", KriteriaController::class, "getById");
Router::add("POST", "/kriteria/tambahKriteria", KriteriaController::class, "tambahKriteria");
Router::add("POST", "/kriteria/editKriteria", KriteriaController::class, "editKriteria");
Router::add("POST", "/kriteria/delete/id/([0-9A-Za-z]*)", KriteriaController::class, "hapusKriteria");
Router::add("GET", "/kriteria/subkriteria/id/([0-9A-Za-z]*)", SubkriteriaController::class, "index");
Router::add("POST", "/subkriteria/id/([0-9A-Za-z]*)", SubkriteriaController::class, "getById");
Router::add("POST", "/subkriteria/tambahSubkriteria", SubkriteriaController::class, "tambahSubkriteria");
Router::add("POST", "/subkriteria/editSubkriteria", SubkriteriaController::class, "editSubkriteria");
Router::add("POST", "/subkriteria/delete/id/([0-9A-Za-z]*)", SubkriteriaController::class, "hapusSubkriteria");
//Penduduk
Router::add("GET", "/penduduk", PendudukController::class, "index");
Router::add("POST", "/penduduk/id/([0-9A-Za-z]*)", PendudukController::class, "getById");
Router::add("POST", "/penduduk/nik/([0-9A-Za-z]*)", PendudukController::class, "getByNik");
Router::add("POST", "/penduduk/tambahPenduduk", PendudukController::class, "tambahPenduduk");
Router::add("POST", "/penduduk/editPenduduk", PendudukController::class, "editPenduduk");
Router::add("POST", "/penduduk/delete/id/([0-9A-Za-z]*)", PendudukController::class, "hapusPenduduk");
//Alternatif
Router::add("GET", "/alternatif", AlternatifController::class, "index");
Router::add("POST", "/alternatif/formAlternatif", AlternatifController::class, "formAddAlternatif");
Router::add("POST", "/alternatif/tambahAlternatif", AlternatifController::class, "tambahAlternatif");
Router::add("POST", "/alternatif/editAlternatif", AlternatifController::class, "editAlternatif");
Router::add("POST", "/alternatif/detail/id/([0-9A-Za-z]*)", AlternatifController::class, "detail");
Router::add("POST", "/alternatif/delete/id/([0-9A-Za-z]*)", AlternatifController::class, "hapusAlternatif");
//Penilaian
Router::add("GET", "/penilaian", PenilaianController::class, "index");
//Laporan
Router::add("GET", "/laporan", LaporanController::class, "index");
//Pengguna
Router::add("GET", "/pengguna", PenggunaController::class, "index");

//Run
Router::run();

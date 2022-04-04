<?php

use SPK\App\Cores\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Kriteria</h5>
    </div>
    <div class="card-body">
        <a href="kriteria/tambah" class="btn bg-gradient-primary mb-3">Tambah kriteria</a>

        <table id="default-datatable" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['kriteria'] as $no => $data) { ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $data['id_kriteria'] ?></td>
                        <td><?= $data['nama_kriteria'] ?></td>
                        <td><?= $data['bobot'] ?></td>
                        <td><?= $data['tipe'] ?></td>
                        <td>

                            <a class="btn bg-gradient-primary btn-xs" href='<?= Config::getBaseUrl() ?>/kriteria/subkriteria/id/<?= $data['id_kriteria'] ?>'>Subkriteria</a>
                            <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></a>
                            <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
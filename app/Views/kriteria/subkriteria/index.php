<?php

use SPK\App\Cores\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Kriteria : <?= $model['kriteria'][0]['nama_kriteria'] ?> / <?= $model['kriteria'][0]['id_kriteria'] ?></h5>
    </div>
    <div class="card-body">
        <a href="kriteria/tambah" class="btn bg-gradient-primary mb-3">Tambah Subkriteria</a>
        <table id="default-datatable" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['subkriteria'] as $no => $data) { ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $data['nama_subkriteria'] ?></td>
                        <td><?= $data['bobot'] ?></td>
                        <td>

                            <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></a>
                            <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
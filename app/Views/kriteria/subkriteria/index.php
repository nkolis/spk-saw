<?php

use SPK\App\Cores\Config;
?>
<div class="card mt-4">
    <div class="card-header">
        <h5>Kriteria : <?= $model['kriteria'][0]['nama_kriteria'] ?> / <?= $model['kriteria'][0]['id_kriteria'] ?></h5>
    </div>
    <div class="card-body">
        <a href="kriteria/tambah" class="btn btn-primary mb-3">Tambah Subkriteria</a>
        <table id="datatablesSimple">
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
                            <div class="btn-group btn-group-sm">
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
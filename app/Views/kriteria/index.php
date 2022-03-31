<?php

use SPK\App\Cores\Config;
?>
<div class="card mt-4">
    <div class="card-header">
        <h5>Kriteria</h5>
    </div>
    <div class="card-body">
        <a href="kriteria/tambah" class="btn btn-primary mb-3">Tambah kriteria</a>

        <table id="datatablesSimple">
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
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary" href='<?= Config::getBaseUrl() ?>/kriteria/subkriteria/id/<?= $data['id_kriteria'] ?>'>Subkriteria</a>
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
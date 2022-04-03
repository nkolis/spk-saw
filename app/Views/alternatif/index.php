<?php

use SPK\App\Cores\Config;
?>
<div class="card mt-4">
    <div class="card-header">
        <h5>Alternatif</h5>
    </div>
    <div class="card-body">
        <a href="alternatif/tambah" class="btn btn-primary mb-3">Tambah alternatif</a>

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>A</th>
                    <th>Nama Alternatif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['alternatif'] as $no => $data) { ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $data['nama_alternatif'] ?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary" href='<?= Config::getBaseUrl() ?>/alternatif/detail/id/<?= $data['id_alternatif'] ?>'>Lihat</a>
                                <a href="<?= Config::getBaseUrl() ?>/alternatif/edit/id/<?= $data['id_alternatif'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= Config::getBaseUrl() ?>/alternatif/hapus/id/<?= $data['id_alternatif'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
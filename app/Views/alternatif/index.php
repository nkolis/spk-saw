<?php

use SPK\App\Cores\Config;
?>
<div class="card">
    <div class="card-header">
        <h5>Alternatif</h5>
    </div>
    <div class="card-body">
        <a href="alternatif/tambah" class="btn bg-gradient-primary mb-3">Tambah alternatif</a>

        <table id="default-datatable" class="table table-bordered table-striped table-sm">
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

                            <a class="btn bg-gradient-primary btn-xs" href='<?= Config::getBaseUrl() ?>/alternatif/detail/id/<?= $data['id_alternatif'] ?>'>Lihat</a>
                            <a href="<?= Config::getBaseUrl() ?>/alternatif/edit/id/<?= $data['id_alternatif'] ?>" class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></a>
                            <a href="<?= Config::getBaseUrl() ?>/alternatif/hapus/id/<?= $data['id_alternatif'] ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
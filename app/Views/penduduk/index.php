<?php

use SPK\App\Cores\Config;
?>
<div class="card">
    <div class="card-header">
        <h5>Penduduk</h5>
    </div>
    <div class="card-body">
        <a href="kriteria/tambah" class="btn btn-primary mb-3">Tambah penduduk</a>

        <table id="default-datatable" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['penduduk'] as $no => $data) { ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= ($data['jenkel'] == 'l') ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td>

                            <a href="<?= Config::getBaseUrl() ?>/penduduk/edit/id/<?= $data['id'] ?>" class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></a>
                            <a href="<?= Config::getBaseUrl() ?>/penduduk/hapus/id/<?= $data['id'] ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
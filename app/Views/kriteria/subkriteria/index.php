<?php

use SPK\App\Core\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Kriteria : <?= $model['kriteria'][0]['nama_kriteria'] ?> / <?= $model['kriteria'][0]['id_kriteria'] ?></h5>
    </div>
    <div class="card-body">
        <button type="button" class="btn bg-gradient-primary mb-3" data-toggle="modal" data-target="#modal-subkriteria">Tambah Subkriteria</button>
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

<div class="modal fade" id="modal-subkriteria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah SubKriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= Config::getBaseUrl() ?>/subkriteria/tambahSubkriteria">


                    <input type="hidden" class="form-control" id="id_kriteria" name="id_kriteria" placeholder="Id Subkriteria" required value="<?= $model['kriteria'][0]['id_kriteria'] ?>">


                    <div class="form-group">
                        <label for="inputNamaKriteria">Nama Subkriteria</label>

                        <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" placeholder="Nama Subkriteria" required>

                    </div>
                    <div class="form-group">
                        <label for="inputBobot">Bobot</label>

                        <input type="number" class="form-control" id="bobot_subkriteria" name="bobot_subkriteria" placeholder="Bobot" required>

                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
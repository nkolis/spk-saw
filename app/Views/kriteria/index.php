<?php

use SPK\App\Core\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Kriteria</h5>
    </div>
    <div class="card-body">
        <button type="button" class="btn bg-gradient-primary mb-3" data-toggle="modal" data-target="#modal-kriteria">Tambah kriteria</button>

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
                            <a class="editkriteria btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-kriteria" data-idkriteria="<?= $data['id_kriteria'] ?>"><i class="fas fa-edit"></i></a>
                            <form style="display: inline-block" action="<?= Config::getBaseUrl() ?>/kriteria/delete/id/<?= $data['id'] ?>" method="post">
                                <button type="submit" class="btn bg-gradient-danger btn-xs" data-idkriteria="<?= $data['id_kriteria'] ?>"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-kriteria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= Config::getBaseUrl() ?>/kriteria/tambahKriteria">
                    <div class="form-group">
                        <label for="inputIdKriteria">Id Kriteria</label>

                        <input type="text" class="form-control" id="inputIdKriteria" name="id_kriteria" placeholder="Id Kriteria" required>

                    </div>
                    <div class="form-group">
                        <label for="inputNamaKriteria">Nama Kriteria</label>

                        <input type="text" class="form-control" id="inputNamaKriteria" name="nama_kriteria" placeholder="Nama Kriteria" required>

                    </div>
                    <div class="form-group">
                        <label for="inputBobot">Bobot</label>

                        <input type="number" class="form-control" id="inputBobot" name="bobot_kriteria" placeholder="Bobot" required>

                    </div>
                    <div class="form-group">
                        <label for="inputTipe">Tipe</label>

                        <select class="form-control" id="inputTipe" name="tipe_kriteria" placeholder="Tipe" required>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>

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
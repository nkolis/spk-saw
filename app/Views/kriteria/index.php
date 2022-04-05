<?php

use SPK\App\Core\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Kriteria</h5>
    </div>
    <div class="card-body">
        <a href="#" class="btn bg-gradient-primary mb-3" data-toggle="modal" data-target="#modal-form-kriteria">Tambah kriteria</a>

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

<div class="modal fade" id="modal-form-kriteria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/kriteria/tambahKriteria">
                    <div class="row mb-3">
                        <label for="inputIdKriteria" class="col-sm-2 col-form-label">Id Kriteria</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdKriteria" name="id_kriteria">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNamaKriteria" class="col-sm-2 col-form-label">Name Kriteria</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNamaKriteria" name="nama_kriteria">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputBobot" class="col-sm-2 col-form-label">Bobot</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputBobot" name="bobot_kriteria">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTipe" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="inputTipe" name="tipe_kriteria">
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary float-end">Kirirm</button>
                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php

use SPK\App\Core\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Penduduk</h5>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-penduduk">Tambah penduduk</button>

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

                            <a class="editpenduduk btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-penduduk" data-idpenduduk="<?= $data['id'] ?>"><i class="fas fa-edit"></i></a>

                            <form style="display: inline-block" action="<?= Config::getBaseUrl() ?>/penduduk/delete/id/<?= $data['id'] ?>" method="post">
                                <button type="submit" class="btn bg-gradient-danger btn-xs" data-idpenduduk="<?= $data['id'] ?>"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-penduduk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= Config::getBaseUrl() ?>/penduduk/tambahPenduduk">
                    <div class="form-group">
                        <label for="nik">Nik</label>

                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik" required>

                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>

                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin</label>

                        <select class="form-control" id="jenkel" name="jenkel" placeholder="Jenis Kelamin" required>
                            <option value="l">Laki - laki</option>
                            <option value="p">Perempuan</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>

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
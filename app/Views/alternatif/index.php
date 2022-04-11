<?php


use SPK\App\Core\Config;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Alternatif</h5>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" id="form-tambah-alternatif" data-toggle="modal" data-target="#modal-alternatif">Tambah alternatif</button>


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

                            <a class="btn bg-gradient-primary btn-xs" href='#' data-toggle="modal" data-target="#modal-alternatif-detail" data-id="<?= $data['id_alternatif'] ?>">Lihat</a>
                            <a class="editalternatif btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-alternatif" data-idalternatif="<?= $data['id_alternatif'] ?>"><i class="fas fa-edit"></i></a>
                            <form style="display: inline-block" action="<?= Config::getBaseUrl() ?>/alternatif/delete/id/<?= $data['id_alternatif'] ?>" method="post">
                                <button type="submit" class="btn bg-gradient-danger btn-xs" data-idkriteria="<?= $data['id_alternatif'] ?>"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-alternatif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Altenatif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


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

<div class="modal fade" id="modal-alternatif-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Alternatif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
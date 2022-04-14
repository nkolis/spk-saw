<?php

use SPK\App\Core\Config;


?>

<form method="POST" action="<?= Config::getBaseUrl() ?>/alternatif/editAlternatif" class="form-edit-alternatif">
    <input type="hidden" id="id_alternatif" name="id_alternatif">

    <div class="form-group">
        <label for="nama_alternatif">Nama Penduduk</label>
        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" placeholder="" required disabled>
    </div>


    <?php foreach ($model['kriteria'] as $key => $kriteria) {
        $id_kriteria = $kriteria['id_kriteria'];
        $nama_kriteria = ucwords($kriteria['nama_kriteria'], " ");
        $l_nama_kriteria = strtolower(str_replace(' ', '_', $nama_kriteria));
    ?>


        <div class="form-group">
            <label for="<?= $l_nama_kriteria ?>"><?= $nama_kriteria ?></label>
            <select class="form-control" id="<?= $id_kriteria ?>" name="<?= $id_kriteria ?>" required>
                <?php foreach ($model['subkriteria'] as $subkriteria) {
                    if ($subkriteria['id_kriteria'] == $id_kriteria) {
                ?>

                        <option value="<?= $subkriteria['id_subkriteria'] ?>"><?= $subkriteria['nama_subkriteria'] ?></option>

                <?php }
                } ?>
            </select>

        </div>


    <?php } ?>
</form>
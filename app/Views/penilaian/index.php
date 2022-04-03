<?php

use SPK\App\Cores\Config;
?>
<div class="card mt-4">
    <div class="card-header">
        <h5>Penilaian</h5>
    </div>
    <div class="card-body">
        <p>Matrik</p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <?php
                    $i = 0;
                    foreach ($model['alternatif'] as $index => $data) {
                        foreach ($data as $key => $row) {
                            $i++;
                            if ($i <= count($data)) {
                                $field = ucwords(str_replace("_", " ", $key), " ");
                                echo "<th>$field</th>";
                            }
                        }
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['alternatif'] as $no => $data) { ?>
                    <tr>
                        <td>A<?= $no + 1 ?></td>
                        <?php foreach ($data as $key => $row) {
                        ?>

                            <td><?= $row ?></td>
                            <!-- <td>
                            <div class="btn-group btn-group-sm">
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td> -->
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p>Normalisasi Matrik -R</p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>R</th>
                    <?php
                    $i = 0;
                    foreach ($model['alternatif_normalisasi'] as $index => $data) {
                        foreach ($data as $key => $row) {
                            $i++;
                            if ($i <= count($data)) {
                                $field = ucwords(str_replace("_", " ", $key), " ");
                                echo "<th>$field</th>";
                            }
                        }
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['alternatif_normalisasi'] as $no => $data) { ?>
                    <tr>
                        <td>R<?= $no + 1 ?></td>
                        <?php foreach ($data as $key => $row) {
                        ?>

                            <td><?= $row ?></td>
                            <!-- <td>
                            <div class="btn-group btn-group-sm">
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td> -->
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p>Nilai Prefensi (V)</p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>V</th>
                    <?php
                    $i = 0;
                    foreach ($model['alternatif_prefensi'] as $index => $data) {

                        foreach ($data as $key => $row) {
                            $i++;
                            if ($i <= count($data)) {
                                $field = ucwords(str_replace("_", " ", $key), " ");
                                echo "<th>$field</th>";
                            }
                        }
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['alternatif_prefensi'] as $no => $data) { ?>
                    <tr>
                        <td>V<?= $no + 1 ?></td>
                        <?php foreach ($data as $key => $row) {
                        ?>

                            <td><?= $row ?></td>
                            <!-- <td>
                            <div class="btn-group btn-group-sm">
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= Config::getBaseUrl() ?>/kriteria/id/<?= $data['id_kriteria'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td> -->
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
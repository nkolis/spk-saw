<?php

use SPK\App\Cores\Config;
?>
<div class="card mt-4">
    <div class="card-header">
        <h5>Penilaian</h5>
    </div>
    <div class="card-body">
        <p><b>Matriks</b></p>
        <table id="simple-datatable" class="table table-bordered table-striped table-sm">
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
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="mt-4"><b>Normalisasi Matrik -R</b></p>
        <table id="simple-datatable2" class="table table-bordered table-striped table-sm">
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
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p class="mt-4"><b>Nilai Prefensi (V)</b></p>
        <table id="simple-datatable3" class="table table-bordered table-striped table-sm">
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
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php

use SPK\App\Cores\Config;
?>
<div class="card">
    <div class="card-header">
        <h5>Data Alternatif</h5>
    </div>
    <div class="card-body">

        <table class="table table-hover">



            <?php foreach ($model['alternatif'] as $index => $data) {
                foreach ($data as $key => $row) {
            ?>
                    <tr>
                        <th><?= ucwords(str_replace("_", " ", $key), " ") ?></th>
                        <td>:</td>
                        <td><?= $row ?></td>
                    </tr>

            <?php }
            } ?>


        </table>
    </div>
</div>
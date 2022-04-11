<div class="row">
    <?php foreach ($model['alternatif'][0] as $key => $row) { ?>
        <div class="col-md-4"><?= $key ?></div>
        <div>:</div>
        <div class="col-md-4"><?= $row ?></div>
    <?php } ?>
</div>
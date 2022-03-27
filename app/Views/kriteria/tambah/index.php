<div class="card mt-4">
    <div class="card-header">
        <h5>Tambah Kriteria</h5>
    </div>
    <div class="card-body">
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
</div>
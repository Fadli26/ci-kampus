<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= $judul; ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="text" class="form-control" id="nim" disabled value="<?= $mahasiswa["nim"]; ?>"
                                name="nim">
                        </div>
                        <div class="form-group">
                            <label for="matkul">Mata Kuliah</label>
                            <select class="form-control" id="matkul" name="matkul">
                                <option value="" selected>choose mata Kuliah</option>
                                <?php foreach($matkul as $row) : ?>
                                <option value="<?= $row["id"]; ?>"><?= $row["matkul"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('matkul'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
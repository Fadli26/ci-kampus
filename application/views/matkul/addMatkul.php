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
                            <!-- Menampilkan daftar matkul dalam bentuk checkbox -->
                            <?php foreach($matkul as $row_matkul) : ?>

                              <input type="checkbox" id="<?= $row_matkul['id']; ?>"
                              name="matkul[]" value="<?= $row_matkul['id']; ?>"
                              <?php foreach($semester as $row_semester) : ?>
                                <?= auto_check_input($row_semester['id'], $row_matkul['id']) ?>
                              <?php endforeach; ?>>

                              <label for="<?= $row_matkul['id']; ?>"><?= $row_matkul['matkul']; ?></label><br>

                            <?php endforeach; ?>
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

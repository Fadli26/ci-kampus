<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card mb-4">
                <div class="card-header">
                    Create new Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="nim" class="col-sm-3 col-form-label">Nim</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="id" hidden
                                    value="<?= $mahasiswa['id']; ?>">
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="<?= $mahasiswa['nim']; ?>">
                                <small id="emailHelp"
                                    class="form-text text-danger pl-3"><?= form_error('nim'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?= $mahasiswa['nama']; ?>">
                                <small id="emailHelp"
                                    class="form-text text-danger pl-3"><?= form_error('nama'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?= $mahasiswa['email']; ?>">
                                <small id="emailHelp"
                                    class="form-text text-danger pl-3"><?= form_error('email'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="jurusan" name="jurusan"<?= set_value('jurusan'); ?>>
                                    <option value="" selected hidden>choose Jurusan</option>
                                    <?php foreach($jurusan as $row): ?>
                                    <option <?= $mahasiswa['jurusan_id'] == $row['id'] ? 'selected' : NULL ?>
                                      value="<?= $row["id"]; ?>"><?= $row["jurusan"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small id="emailHelp"
                                    class="form-text text-danger pl-3"><?= form_error('jurusan'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

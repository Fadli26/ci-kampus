<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><?= $mahasiswa["nama"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nim</th>
                                <td><?= $mahasiswa["nim"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jurusan</th>
                                <td><?= $mahasiswa["jurusan"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- mata kuliah -->
        <div class="col-md">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mata Kuliah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($matkulMhs as  $row) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row["matkul"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- akhir mata kuliah -->
    </div>
</div>
</div>
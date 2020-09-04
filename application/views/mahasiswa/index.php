<!-- flashdata status insert mahasiswa -->
<?= $this->session->flashdata('insert_status') ? $this->session->flashdata('insert_status') : null ?>
<!-- enf of flashdata -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('mahasiswa/createMahasiswa'); ?>" class="btn btn-primary ">tambah data mahasiswa</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>email</th>
                            <th>Jurusan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>email</th>
                            <th>Jurusan</th>
                            <th>aksi</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <td><?= $row["nim"] ?></td>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["jurusan"] ?></td>
                            <td>
                                <a href="<?= base_url('mahasiswa/detailMhs/') . $row["id"]; ?>"
                                    class="btn btn-info btn-sm">detail</a>
                                <a href="<?= base_url('mahasiswa/deleteMahasiswa/') . $row["id"];  ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('apakah anda yakin');">delete</a>
                                <a href="<?= base_url('mahasiswa/updateMahasiswa/') . $row["id"]; ?>"
                                    class="btn btn-warning btn-sm">edit</a>
                                <a href="<?= base_url('matkul/addMatkulMhs/') . $row["id"]; ?>"
                                    class="btn btn-primary btn-sm">mata
                                    kuliah</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

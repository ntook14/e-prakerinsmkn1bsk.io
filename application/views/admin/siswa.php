<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">

        <div class="col-lg-12">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#newSiswaModal"><i class="fas fa-location-arrow"></i> Add New Siswa</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nomor Induk Siswa</th>
                            <th class="text-center" scope="col">Nama Siswa</th>
                            <th class="text-center" scope="col">Jenis Kelamin</th>
                            <th class="text-center" scope="col">Alamat Siswa</th>
                            <th class="text-center" scope="col">Jurusan</th>
                            <th class="text-center" scope="col">Pembimbing</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <!-- $menu ko diambiek dari controller menu.php nan ado di dataku -->
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>

                                <th scope="row"><?= $i; ?></th>
                                <td><?= $s['nis']; ?></td>
                                <td><?= $s['nama_siswa']; ?></td>
                                <td><?= $s['jenkel']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td><?= $s['jurusan']; ?></td>
                                <td><?= $s['nama_pembimbing']; ?></td>

                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSiswa<?= $s['id_siswa']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusSiswa<?= $s['id_siswa']; ?>"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php $i++; ?>
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


<!-- Button trigger modal -->

<!-- Modal Tambah Data Siswa-->
<div class="modal fade" id="newSiswaModal" tabindex="-1" aria-labelledby="newSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSiswaModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('admin/addsiswa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>No Induk Siswa</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input type="radio" id="Laki-laki" name="jenkel" value="Laki-Laki">
                            <label for="Laki-laki">Laki-Laki</label>
                            <input type="radio" id="Perempuan" name="jenkel" value="Perempuan">
                            <label for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option selected>---Pilih Jurusan---</option>
                            <option value="Akuntansi">Administrasi Perkantoran</option>
                            <option value="Pemasaran">Pemasaran</option>
                            <option value="Administrasi Perkantoran">Akuntansi</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Tambah Data -->
<!-- Modal Edit Pembimbing -->
<?php $no = 0;
foreach ($siswa as $s) : $no++ ?>
    <div class="modal fade" id="editSiswa<?= $s['id_siswa']; ?>" tabindex="-1" aria-labelledby="editSiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaLabel">Edit Data Siswa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/editsiswa'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>No Induk Siswa</label>
                            <input type="hidden" value="<?= $s['id_siswa']; ?>" name="id_siswa" id="id_siswa">
                            <input type="text" value="<?= $s['nis']; ?>" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" value="<?= $s['nama_siswa']; ?>" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check" value="<?= $s['jenkel']; ?>">
                                <label><?= $s['jenkel']; ?> -> </label> &nbsp;
                                <input type="radio" id="Laki-laki" name="jenkel" value="Laki-Laki">
                                <label for="Laki-laki">Laki-Laki</label>
                                <input type="radio" id="Perempuan" name="jenkel" value="Perempuan">
                                <label for="Perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" value="<?= $s['alamat']; ?>" class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan" value="<?= $s['jurusan']; ?>">
                                <option selected>---Pilih Jurusan---</option>
                                <option value="<?= $s['jurusan']; ?>" selected><?= $s['jurusan']; ?></option>
                                <option value="Akuntansi">Administrasi Perkantoran</option>
                                <option value="Pemasaran">Pemasaran</option>
                                <option value="Administrasi Perkantoran">Akuntansi</option>
                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Pembimbing">Pembimbing</label>
                            <select class="form-control" name="id_pembimbing" id="id_pembimbing" value="<?= $s['Pembimbing']; ?>">
                                <option>---Pilih Pembimbing---</option>
                                <option value="<?= $s['id_pembimbing']; ?>" selected><?= $s['nama_pembimbing']; ?></option>
                                <?php foreach ($dataPembimbing as $a) : ?>
                                    <option value="<?= $a['id_pembimbing']; ?>"><?= $a['nama_pembimbing']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Hapus Pembimbing -->
<?php $no = 0;
foreach ($siswa as $s) : $no++ ?>
    <div class="modal fade" id="hapusSiswa<?= $s['id_siswa']; ?>" tabindex="-1" aria-labelledby="hapusSiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSiswaLabel">Hapus Data Siswa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/hapussiswa'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $s['id_siswa']; ?>" name="id_siswa" id="id_siswa">
                            <label>Apakah Anda Yakin Untuk Menghapus Data Ini?</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
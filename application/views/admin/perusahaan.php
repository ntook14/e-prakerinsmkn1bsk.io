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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPerusaahModal"><i class="fas fa-location-arrow"></i> Add New Perusahaan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Tempat Prakerin</th>
                            <th class="text-center" scope="col">Alamat</th>
                            <th class="text-center" scope="col">Jurusan Diterima</th>
                            <th class="text-center" scope="col">Jumlah Kuota</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <!-- $menu ko diambiek dari controller menu.php nan ado di dataku -->
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($perusahaan as $d) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $d['nama_perusahaan']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['jurusan_diterima']; ?></td>
                                <td class="text-center"><?= $d['kuota']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPerusahaan<?= $d['id_perusahaan']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusPerusahaan<?= $d['id_perusahaan']; ?>"><i class="fas fa-trash"></i></a>

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

<!-- Modal Tambah Data Perusahaan-->
<div class="modal fade" id="addPerusaahModal" tabindex="-1" aria-labelledby="addPerusaahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPerusaahModalLabel">Tambah Data Perusahaan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('admin/addperusahaan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Perusahaan" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan Diterima</label>
                        <select class="form-control" name="jurusan_diterima" id="jurusan_diterima">
                            <option selected>---Pilih Jurusan---</option>
                            <option value="Akuntansi">Administrasi Perkantoran</option>
                            <option value="Pemasaran">Pemasaran</option>
                            <option value="Administrasi Perkantoran">Akuntansi</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kuota</label>
                        <input type="text" class="form-control" id="kuota" name="kuota" placeholder="Kuota Yang Ditampung" required>
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
foreach ($perusahaan as $d) : $no++ ?>
    <div class="modal fade" id="editPerusahaan<?= $d['id_perusahaan']; ?>" tabindex="-1" aria-labelledby="editPerusahaanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPerusahaanLabel">Edit Data Perusahaan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/editperusahaan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="hidden" value="<?= $d['id_perusahaan']; ?>" name="id_perusahaan" id="id_siswa">
                            <input type="text" class="form-control" value="<?= $d['nama_perusahaan']; ?>" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" value="<?= $d['alamat']; ?>" class="form-control" id="alamat" name="alamat" placeholder="Alamat Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan Diterima</label>
                            <select class="form-control" name="jurusan_diterima" id="jurusan_diterima" value="<?= $d['jurusan_diterima']; ?>">
                                <option selected>---Pilih Jurusan---</option>
                                <option value="Akuntansi">Administrasi Perkantoran</option>
                                <option value="Pemasaran">Pemasaran</option>
                                <option value="Administrasi Perkantoran">Akuntansi</option>
                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kuota</label>
                            <input type="text" value="<?= $d['kuota']; ?>" class="form-control" id="kuota" name="kuota" placeholder="Kuota Yang Ditampung" required>
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
<?php endforeach; ?>
<!-- Modal Hapus Pembimbing -->
<?php $no = 0;
foreach ($perusahaan as $d) : $no++ ?>
    <div class="modal fade" id="hapusPerusahaan<?= $d['id_perusahaan']; ?>" tabindex="-1" aria-labelledby="hapusPerusahaanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPerusahaanLabel">Hapus Data Perusahaan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/hapusperusahaan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $d['id_perusahaan']; ?>" name="id_perusahaan" id="id_perusahaan">
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
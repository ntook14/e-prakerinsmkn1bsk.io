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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-location-arrow"></i> Add New Pembimbing</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">NIP</th>
                            <th class="text-center" scope="col">Nama Guru Pembimbing</th>
                            <th class="text-center" scope="col">Jenis Kelamin</th>
                            <th class="text-center" scope="col">Alamat</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <!-- $menu ko diambiek dari controller menu.php nan ado di dataku -->
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pembimbing as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nip']; ?></td>
                                <td><?= $p['nama_pembimbing']; ?></td>
                                <td><?= $p['jenkel']; ?></td>
                                <td><?= $p['alamat']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPembimbing<?= $p['id_pembimbing']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusPembimbing<?= $p['id_pembimbing']; ?>"><i class="fas fa-trash"></i></a>

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

<!-- Modal tambah Pembimbing -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Pembimbing</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('admin/addpembimbing'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP Pembimbing" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pembimbing</label>
                        <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" placeholder="Nama Pembimbing" required>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Pembimbing -->
<?php $no = 0;
foreach ($pembimbing as $p) : $no++ ?>
    <div class="modal fade" id="editPembimbing<?= $p['id_pembimbing']; ?>" tabindex="-1" aria-labelledby="editPembimbingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPembimbingLabel">Edit Data Pembimbing</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/editpembimbing'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $p['id_pembimbing']; ?>" name="id_pembimbing" id="id_pembimbing">
                            <label>NIP</label>
                            <input type="text" value="<?= $p['nip']; ?>" class="form-control" id="nip" name="nip" placeholder="NIP Pembimbing" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pembimbing</label>
                            <input type="text" value="<?= $p['nama_pembimbing']; ?>" class="form-control" id="nama_pembimbing" name="nama_pembimbing" placeholder="Nama Pembimbing" required>
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
                            <input type="text" value="<?= $p['alamat']; ?>" class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Hapus Pembimbing -->
<?php $no = 0;
foreach ($pembimbing as $p) : $no++ ?>
    <div class="modal fade" id="hapusPembimbing<?= $p['id_pembimbing']; ?>" tabindex="-1" aria-labelledby="hapusPembimbingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPembimbingLabel">Hapus Data Pembimbing</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/hapusPembimbing'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $p['id_pembimbing']; ?>" name="id_pembimbing" id="id_pembimbing">
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
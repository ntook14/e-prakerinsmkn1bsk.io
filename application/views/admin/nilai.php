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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNilai"><i class="fas fa-location-arrow"></i> Add New Nilai</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Siswa</th>
                            <th class="text-center" scope="col">Nilai Dudi</th>
                            <th class="text-center" scope="col">Nilai Laporan</th>
                            <th class="text-center" scope="col">Nilai Akhir</th>
                            <th class="text-center" scope="col">Pembimbing</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <!-- $menu ko diambiek dari controller menu.php nan ado di dataku -->
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($nilai as $n) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="text-center"><?= $n['nama_siswa']; ?></td>
                                <td class="text-center"><?= $n['nilai_dudi']; ?></td>
                                <td class="text-center"><?= $n['nilai_laporan']; ?></td>
                                <td class="text-center"><?= ($n['nilai_dudi']*0.6)+($n['nilai_laporan']*0.4); ?></td>
                                <td class="text-center"><?= $n['nama_pembimbing']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editNilai<?= $n['id_nilai']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusNilai<?= $n['id_nilai']; ?>"><i class="fas fa-trash"></i></a>

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

<!-- Modal Tambah Data nilai-->

 <div class="modal fade" id="addNilai" tabindex="-1" aria-labelledby="addNilaiLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addNilaiLabel">Tambah Data Nilai Siswa</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="<?= base_url('admin/addnilai'); ?>" method="post">
                <div class="modal-body">
                        <div   div class="form-group">
                            <label for="Siswa">Siswa</label>
                            <select class="form-control" name="id_siswa" id="id_siswa" value="<?= $n['Siswa'] ?>">
                                <option>---Pilih Siswa---</option>
                                <?php foreach ($nama_siswa as $ns) : ?>
                                    <option value="<?= $ns['id_siswa'] ?>"><?= $ns['nama_siswa']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai Prakerin</label>
                            <input type="text" class="form-control" id="nilai_dudi" name="nilai_dudi" placeholder="Nilai Prakerin" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Laporan</label>
                            <input type="text" class="form-control" id="nilai_laporan" name="nilai_laporan" placeholder="Nilai Laporan" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Nilai Akhir</label>
                            <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir"  required>
                        </div> -->
                        <div   div class="form-group">
                            <label for="Pembimbing">Pembimbing</label>
                            <select class="form-control" name="id_pembimbing" id="id_pembimbing" value="<?= $n['Pembimbing'] ?>">
                                <option>---Pilih Pembimbing---</option>
                                <?php foreach ($nama_pembimbing as $np) : ?>
                                    <option value="<?= $np['id_pembimbing'] ?>"><?= $np['nama_pembimbing']; ?></option>
                                <?php endforeach; ?>

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
<!-- Edit Nilai Siswa -->
<?php $no = 0;
foreach ($nilai as $n) : $no++ ?>
    <div class="modal fade" id="editNilai<?= $n['id_nilai']; ?>" tabindex="-1" aria-labelledby="editNilaiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNilaiLabel">Edit Nilai Siswa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/editnilai'); ?>" method="post">
                <div class="modal-body">
                        <div   div class="form-group">
                        <input type="hidden" value="<?= $n['id_nilai']; ?>" name="id_nilai" id="id_nilai">
                            <label for="Siswa">Siswa</label>
                            <select class="form-control" name="id_siswa" id="id_siswa" value="<?= $n['Siswa'] ?>">
                                <option>---Pilih Siswa---</option>
                                <option value="<?= $n['id_siswa'] ?>"><?= $n['nama_siswa']; ?></option>
                                <?php foreach ($nama_siswa as $ns) : ?>
                                    <option value="<?= $ns['id_siswa'] ?>"><?= $ns['nama_siswa']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai Prakerin</label>
                            <input type="text" class="form-control" value="<?= $n['nilai_dudi'] ?>" id="nilai_dudi" name="nilai_dudi" placeholder="Nilai Prakerin" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Laporan</label>
                            <input type="text" class="form-control" value="<?= $n['nilai_laporan'] ?>" id="nilai_laporan" name="nilai_laporan" placeholder="Nilai Laporan" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Nilai Akhir</label>
                            <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir"  required>
                        </div> -->
                        <div   div class="form-group">
                            <label for="Pembimbing">Pembimbing</label>
                            <select class="form-control" name="id_pembimbing" id="id_pembimbing" value="<?= $n['Pembimbing'] ?>">
                                <option>---Pilih Pembimbing---</option>
                                <option value="<?= $n['id_pembimbing'] ?>"><?= $n['nama_pembimbing']; ?></option>
                                <?php foreach ($nama_pembimbing as $np) : ?>
                                    <option value="<?= $np['id_pembimbing'] ?>"><?= $np['nama_pembimbing']; ?></option>
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
foreach ($nilai as $n) : $no++ ?>
    <div class="modal fade" id="hapusNilai<?= $n['id_nilai']; ?>" tabindex="-1" aria-labelledby="hapusNilaiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusNilaiLabel">Hapus Data Siswa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('admin/hapusnilai'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $n['id_nilai']; ?>" name="id_nilai" id="id_nilai">
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
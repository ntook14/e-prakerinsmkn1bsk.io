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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPerusaahModal"><i class="fas fa-location-arrow"></i> Ajukan Tempat Prakerin</a>
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
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#pilihPerusahaan"><i class="fas fa-plus"></i></a>
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

<!-- Modal Hapus Pembimbing -->
<div class="modal fade" id="pilihPerusahaan" tabindex="-1" aria-labelledby="pilihPerusahaanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihPerusahaanLabel">Pilih Perusahaan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('user/magang'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Apakah Anda Yakin Untuk Memiliki Perusahaan ini?</label>
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
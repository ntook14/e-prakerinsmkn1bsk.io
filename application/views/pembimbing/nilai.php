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
                                <td>
                                    <a href="" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
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
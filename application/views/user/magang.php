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

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama iswa</th>
                        <th class="text-center" scope="col">Tempat Prakerin</th>
                        <th class="text-center" scope="col">Pembimbing</th>
                        <th class="text-center" scope="col">Status Prakerin</th>
                    </tr>
                    </tr>
                </thead>
                <!-- $menu ko diambiek dari controller menu.php nan ado di dataku -->
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($magang as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['nama_siswa']; ?></td>
                            <td><?= $m['nama_perusahaan']; ?></td>
                            <td><?= $m['nama_pembimbing']; ?></td>
                            <td class="text-center"><?= $m['status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Button trigger modal -->
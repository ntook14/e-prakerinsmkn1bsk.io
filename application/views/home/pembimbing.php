<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama Guru Pembimbing</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pembimbing as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nip; ?></td>
                            <td><?= $value->nama_pembimbing; ?></td>
                            <td><?= $value->jenkel; ?></td>
                            <td><?= $value->alamat; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
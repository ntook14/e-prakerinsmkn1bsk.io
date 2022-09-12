<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">Jurusan Yang Tersedia</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($perusahaan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_perusahaan; ?></td>
                            <td><?= $value->jurusan_diterima; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
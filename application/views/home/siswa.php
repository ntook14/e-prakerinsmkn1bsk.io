<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nis; ?></td>
                            <td><?= $value->nama_siswa; ?></td>
                            <td><?= $value->jenkel; ?></td>
                            <td><?= $value->alamat; ?></td>
                            <td><?= $value->jurusan; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
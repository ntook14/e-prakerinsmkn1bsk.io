<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?> -->

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Lembur</th>
                        <th scope="col">Uang Makan</th>
                        <th scope="col">Transportasi</th>
                        <th scope="col">Hutang</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subGaji as $sg) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sg['name']; ?></td>
                            <td>Rp. <?= $sg['gaji_pokok']; ?></td>
                            <td>Rp. <?= $sg['lembur']; ?></td>
                            <td>Rp. <?= $sg['uang_makan']; ?></td>
                            <td>Rp. <?= $sg['transportasi']; ?></td>
                            <td>Rp. <?= $sg['hutang']; ?></td>
                            <td>Rp. <?= $sg['gaji_pokok'] + $sg['lembur'] + $sg['uang_makan'] + $sg['transportasi'] - $sg['hutang']; ?></td>
                            <td>
                                <a href="" class="badge rounded-pill bg-success">Edit</a>
                                <a href="" class="badge rounded-pill bg-danger">Delete</a>
                            </td>
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

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <select name="id_user" id="id_user" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($name as $g) : ?>
                                <option value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
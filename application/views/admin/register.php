    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('admin/t_karyawan'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="namo" value="<?= set_value('namo'); ?>" placeholder="Nama Lengkap">
                                    <?= form_error('namo', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Alamat Email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>" placeholder="Alamat Lengkap">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="devisi" name="devisi" value="<?= set_value('devisi'); ?>" placeholder="Devisi">
                                    <?= form_error('devisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>" placeholder="Jabatan">
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
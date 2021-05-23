<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit Profile</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('profile/edit/' . $user['user_id']); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info pull-right">Ubah Profile</button>
                <div class="clearfix"></div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('assets/') ?>img/avatar/<?= $user['pict'] ?>" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= $user['nama'] ?></h4>
                <p class="card-description">
                    <?= $user['level'] ?>
                </p>
                <div class="row">
                    <button class="btn btn-outline-info mx-1 my-1" data-toggle="modal" data-backdrop="false" data-target="#modalpass">Ubah Password</button>
                    <div class="modal fade bd-example-modal-lg" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart('profile/ubahpass/'); ?>
                                    <div class="form-group">
                                        <label for="nama">Password Baru</label>
                                        <input type="text" class="form-control" id="nama" name="password" aria-describedby="emailHelp" placeholder="Masukan Password Baru">
                                        <small id="emailHelp" class="form-text text-muted">Password min 8 karakter.</small>
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Simpan
                                    </button>
                                    <?php echo form_close(); ?>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info" data-toggle="modal" data-backdrop="false" data-target="#modalfoto">Ubah Foto</button>
                    <div class="modal fade bd-example-modal-lg" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Foto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart('profile/upFoto/'); ?>
                                    <div class="form-group">
                                        <div class="">
                                            <label class="" for="customFile">Pilih file</label>
                                            <input type="file" name="foto" value="" class="form-control" id="customFile" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Simpan
                                    </button>
                                    <?php echo form_close(); ?>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
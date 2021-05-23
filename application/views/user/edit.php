<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit User</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('user/edit/' . $user['user_id']); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="email" name="email" class="form-control"
                                value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" name="nama"
                                value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $user['nama']); ?>" />
                            <span class="text-danger"><?php echo form_error('nama'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Level</label>
                            <select name="level" class="form-control">
                                <?php
								$level_values = array(
									'Admin' => 'Admin',
									'Pendidik' => 'Pendidik',
									'Siswa' => 'Siswa'
								);

								foreach ($level_values as $value => $display_text) {
									$selected = ($value == $user['level']) ? ' selected="selected"' : "";

									echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
								}
								?>
                            </select>
                            <span class="text-danger"><?php echo form_error('level'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <select name="status" class="form-control">
                                <?php
								$status_values = array(
									'aktif' => 'Aktif',
									'nonaktif' => 'Non Aktif',
								);

								foreach ($status_values as $value => $display_text) {
									$selected = ($value == $user['status']) ? ' selected="selected"' : "";

									echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
								}
								?>
                            </select>
                            <span class="text-danger"><?php echo form_error('status'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" name="password" value="" class="form-control" id="password" />
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-info pull-right">Ubah User</button>
                <div class="clearfix"></div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('assets/') ?>img/avatar/<?= $user['pict'] ?>"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= $user['nama'] ?></h4>
                <p class="card-description">
                    <?= $user['level'] ?>
                </p>
                <button class="btn btn-info" data-toggle="modal" data-backdrop="false" data-target="#modalfoto">Ubah
                    Foto</button>
                <div class="modal fade bd-example-modal-lg" id="modalfoto" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('user/upFoto/' . $this->uri->segment(3)); ?>
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
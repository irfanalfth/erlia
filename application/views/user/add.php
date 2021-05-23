<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Tambah Data Users</h3>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <?php echo form_open_multipart('user/add', array('class' => 'form form-horizontal')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
                                    <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    <div class="form-control-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Level</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="level" class="form-control">
                                    <?php
                                    $level_values = array(
                                        'Admin' => 'Admin',
                                        'Pendidik' => 'Pendidik',
                                        'Siswa' => 'Siswa'
                                    );
                                    foreach ($level_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('level')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('level'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Status</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <?php
                                    $status_values = array(
                                        'aktif' => 'Aktif',
                                        'nonaktif' => 'Non Aktif',
                                    );

                                    foreach ($status_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('status')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Tambah Data Sub Kelas</h3>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <?php echo form_open_multipart('sub_kelas/add', array('class' => 'form form-horizontal')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nama Sub Kelas</label>
                        </div>
                        <div class="col-md-10">
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
                        <div class="col-md-2">
                            <label>Kelas</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <select name="kelas_id" class="form-control">
                                    <?php
                                    foreach ($kelas as $value) {
                                        $selected = ($value['kelas_id'] == $this->input->post('kelas_id')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value['kelas_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('kelas_id'); ?></span>
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
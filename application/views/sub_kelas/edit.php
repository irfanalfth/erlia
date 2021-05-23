<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit Sub Kelas</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('sub_kelas/edit/' . $sub_kelas['sub_kelas_id']); ?>
                <div class="row">
                    <div class="col-md-2">
                        <label>Nama Sub Kelas</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $sub_kelas['nama']); ?>" />
                            <span class="text-danger"><?php echo form_error('nama'); ?></span>
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
                                    $selected = ($value['kelas_id'] == $sub_kelas['kelas_id']) ? ' selected="selected"' : "";

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
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
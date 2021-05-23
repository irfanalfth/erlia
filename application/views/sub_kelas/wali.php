<?php
$CI = &get_instance();
$CI->load->model('Global_model');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit Wali Kelas</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('sub_kelas/wali/' . $sub_kelas['sub_kelas_id']); ?>
                <div class="row">
                    <div class="col-md-2">
                        <label>Pendidik</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <select name="pendidik_id" class="form-control">
                                <?php
                                foreach ($pendidik as $value) {
                                    $cek = $CI->Global_model->get_data(['pendidik_id' => $value['pendidik_id']], 'sub_kelas', false);
                                    $selected = ($value['pendidik_id'] == $sub_kelas['pendidik_id']) ? ' selected="selected"' : "";
                                    if ($cek == null) {
                                        echo '<option value="' . $value['pendidik_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                    } else {
                                        $cek2 = $CI->Global_model->get_data(['pendidik_id' => $value['pendidik_id'], 'sub_kelas_id' => $this->uri->segment(3)], 'sub_kelas', false);

                                        if ($cek2['pendidik_id'] == $value['pendidik_id']) {
                                            echo '<option value="' . $value['pendidik_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('pendidik_id'); ?></span>
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
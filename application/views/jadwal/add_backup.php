<?php
$CI = &get_instance();
$CI->load->model('Global_model');
?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6><?php echo $this->uri->segment(3) ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-sm has-icon-left">
                            <div class="position-relative">
                                <label for="masuk">Jam Masuk</label>
                                <input type="time" name="jam_masuk" value="<?php echo $this->input->post('jam_masuk'); ?>" class="form-control" id="jam_masuk" />
                                <span class="text-danger"><?php echo form_error('jam_masuk'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-sm has-icon-left">
                            <div class="position-relative">
                                <label for="keluar">Jam Keluar</label>
                                <input type="time" name="jam_keluar" value="<?php echo $this->input->post('jam_keluar'); ?>" class="form-control" id="jam_keluar" />
                                <span class="text-danger"><?php echo form_error('jam_keluar'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-group-sm has-icon-left">
                            <div class="position-relative">
                                <label for="keluar">Set Jam</label>
                                <br>
                                <button type="button" class="btn btn-sm btn-primary">Set</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <ul>
                        <?php
                        foreach ($kelas as $k) {
                        ?>
                            <li>
                                <?php echo 'Kelas ' . $k['nama'] ?>
                                <ul>
                                    <?php
                                    foreach ($sub_kelas as $sk) {
                                        if ($k['kelas_id'] == $sk['kelas_id']) {
                                    ?>
                                            <li><?php echo $sk['nama'] ?> <input type="number" name="kelas|<?= $k['kelas_id']?>|" value=""></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Daftar Pendidik</h6>
            </div>
            <div class="card-body">
                <ul>
                    <?php
                    foreach ($pendidik as $k => $v) {
                        $ampu = $CI->db->join('mapel', 'mapel.mapel_id=ampu.mapel_id')->get_where('ampu', ['pendidik_id' => $v['pendidik_id']])->result_array();
                    ?>
                        <li>
                            <?= $v['nama'] ?>
                            <ul>
                                <?php
                                foreach ($ampu as $k => $v) {
                                ?>
                                    <li><?php echo $v['ampu_id'] . '-' . $v['nama'] ?></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
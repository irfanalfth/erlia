<?php
$CI = &get_instance();
$CI->load->model('Global_model');
?>
<div class="row">
    <div class="col-md-8">
        <?php
        foreach ($hari as $k => $v) {
        ?>
            <div class="card">
                <div class="card-header">
                    <div class="col-12 d-flex justify-content-between ">
                        <h6><?php echo $v; ?></h6>
                        <a href="<?= base_url('jadwal/add/' . $v) ?>" class="btn btn-primary mr-1 mb-1"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
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
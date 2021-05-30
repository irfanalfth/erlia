<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Biodata</h4>
            </div>

            <div class="card-body">
                <?php echo form_open('pendidik/addAmpu'); ?>

                <input type="hidden" name="pendidik" value="<?= $pendidik['pendidik_id']; ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kelas</label>
                            <select name="kelas" class="form-control">
                                <?php
                                    foreach ($kelas as $value) {
                                        $selected = $value['nama'];

                                        echo '<option value="' . $value['kelas_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                    }
                                    ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('kelas'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Sub Kelas</label>
                            <select name="sub_kelas" class="form-control">
                                <?php
                                    foreach ($sub_kelas as $value) {
                                        $selected = $value['nama'];

                                        echo '<option value="' . $value['sub_kelas_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                    }
                                    ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('sub_kelas'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Mata Pelajaran</label>
                            <select name="mapel" class="form-control">
                                <?php
                                    foreach ($mapel as $value) {
                                        $selected = $value['nama'];

                                        echo '<option value="' . $value['mapel_id'] . '" ' . $selected . '>' . $value['nama'] . '</option>';
                                    }
                                    ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('mapel'); ?></span>
                        </div>
                    </div>
                </div>
                

                <button type="submit" class="btn btn-info pull-right float-right">Simpan</button>
                <div class="clearfix"></div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                src="<?= (isset($pendidik['pict'])) ? base_url('assets/img/avatar/'). $pendidik['pict'] : base_url('assets/'). 'img/avatar/' . $user['pict']; ?>"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= (isset($pendidik['nama'])) ? $pendidik['nama'] : $user['nama']; ?></h4>
                <p class="card-description">
                    <?= $user['level']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
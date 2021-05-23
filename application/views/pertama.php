<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Lengkapi Data Pribadi</h3>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <?php echo form_open_multipart('alumni/pribadi/' . $this->session->userdata('user_id'), array('class' => 'form form-horizontal')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-1">
                            <label>No HP</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="no_hp" value="<?php echo $this->input->post('no_hp'); ?>" class="form-control" id="no_hp" />
                                    <span class="text-danger"><?php echo form_error('no_hp'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Hobby</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="hobby" value="<?php echo $this->input->post('hobby'); ?>" class="form-control" id="hobby" />
                                    <span class="text-danger"><?php echo form_error('hobby'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="jenis_kelamin" class="form-control">
                                    <?php
                                    $jenis_kelamin_values = array(
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan',
                                    );

                                    foreach ($jenis_kelamin_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('jenis_kelamin')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('jenis_kelamin'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>IPK</label>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="ipk" value="<?php echo $this->input->post('ipk'); ?>" class="form-control" id="ipk" />
                                    <span class="text-danger"><?php echo form_error('ipk'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Agama</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="agama" class="form-control">
                                    <?php
                                    $agama_values = array(
                                        'Islam' => 'Islam',
                                        'Budha' => 'Budha',
                                        'Kristen' => 'Kristen',
                                        'Katolik' => 'Katolik',
                                        'Hindu' => 'Hindu',
                                    );

                                    foreach ($agama_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('agama')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('agama'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Provinsi</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select name="idprovinsi" id="idprovinsi" class="form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kabupaten/Kota</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select name="idkabupatenkota" id="idkabupatenkota" class="form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kecamatan</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select name="idkecamatan" id="idkecamatan" class="form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kelurahan</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select name="idkelurahan" id="idkelurahan" class="form-control">

                                    </select>
                                    <span class="text-danger"><?php echo form_error('idkelurahan'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-11">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
                                    <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Tempat Lahir</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="tempat_lahir" value="<?php echo $this->input->post('tempat_lahir'); ?>" class="form-control" id="tempat_lahir" />
                                    <span class="text-danger"><?php echo form_error('tempat_lahir'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="date" name="tanggal_lahir" value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control" id="tanggal_lahir" />
                                    <span class="text-danger"><?php echo form_error('tanggal_lahir'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Tahun Masuk</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="tahun_masuk" value="<?php echo $this->input->post('tahun_masuk'); ?>" class="form-control" id="tahun_masuk" />
                                    <span class="text-danger"><?php echo form_error('tahun_masuk'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Tahun Keluar</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="tahun_keluar" value="<?php echo $this->input->post('tahun_keluar'); ?>" class="form-control" id="tahun_keluar" />
                                    <span class="text-danger"><?php echo form_error('tahun_keluar'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Tanggal Wisuda</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="date" name="tanggal_wisuda" value="<?php echo $this->input->post('tanggal_wisuda'); ?>" class="form-control" id="tanggal_wisuda" />
                                    <span class="text-danger"><?php echo form_error('tanggal_wisuda'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-1">
                            <label>Judul Tugas Akhir</label>
                        </div>
                        <div class="col-md-11">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="judul_ta" value="<?php echo $this->input->post('judul_ta'); ?>" class="form-control" id="judul_ta" />
                                    <span class="text-danger"><?php echo form_error('judul_ta'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Lama waktu mendapat pekerjaan</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="radio" name="category" value="dibawah" /> Dibawah satu tahun <br>
                                    <input type="radio" name="category" value="diatas" /> Diatas satu tahun
                                </div>
                                <span class="text-danger"><?php echo form_error('lamawaktu'); ?></span>
                            </div>
                        </div>
                        <input type="hidden" value="" class="tipe" name="tipe">
                        <div class="col-md-8 lamawaktu">

                        </div>
                        <div class="col-md-1">
                            <label>Facebook</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="facebook" value="<?php echo $this->input->post('facebook'); ?>" class="form-control" id="facebook" />
                                    <span class="text-danger"><?php echo form_error('facebook'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Instagram</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="instagram" value="<?php echo $this->input->post('instagram'); ?>" class="form-control" id="instagram" />
                                    <span class="text-danger"><?php echo form_error('instagram'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Next</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(':radio[name="category"]').change(function() {
        var category = $(this).filter(':checked').val();
        console.log(category);
        if (category == 'dibawah') {
            $(".tipe").val('dibawah');
            $(".lamawaktu").html('<div class="row"><div class="col-md-4"><label>Bulan</label></div><div class="col-md-8"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu" value="<?php echo $this->input->post('lamawaktu'); ?>" class="form-control" id="lamawaktu" /><span class="text-danger"><?php echo form_error('lamawaktu'); ?></span></div></div></div></div>');
        }
        if (category == 'diatas') {
            $(".tipe").val('diatas');
            $(".lamawaktu").html('<div class="row"><div class="col-md-2"><label>Tahun</label></div><div class="col-md-4"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu1" value="<?php echo $this->input->post('lamawaktu1'); ?>" class="form-control" id="lamawaktu1" /><span class="text-danger"><?php echo form_error('lamawaktu1'); ?></span></div></div></div><div class="col-md-2"><label>Bulan</label></div><div class="col-md-4"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu2" value="<?php echo $this->input->post('lamawaktu2'); ?>" class="form-control" id="lamawaktu2" /><span class="text-danger"><?php echo form_error('lamawaktu2'); ?></span></div></div></div></div>');
        }
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>/location/getprovinsi/",
            cache: false,
            success: function(msg) {
                $("#idprovinsi").html(msg);
            }
        });
        $("#idprovinsi").on('change', function() {
            var provinsi = $("#idprovinsi").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkabupaten/",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(msg) {
                    $("#idkabupatenkota").html(msg);
                }
            });
        }).trigger('change')

        $("#idkabupatenkota").on('change', function() {
            var kabupaten = $("#idkabupatenkota").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkecamatan/",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(msg) {
                    $("#idkecamatan").html(msg);
                }
            })
        }).trigger('change')

        $("#idkecamatan").on('change', function() {
            var kecamatan = $("#idkecamatan").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkelurahan/",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(msg) {
                    $("#idkelurahan").html(msg);
                }
            });
        }).trigger('change')
    })
</script>
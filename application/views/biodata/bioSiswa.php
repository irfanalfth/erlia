<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Biodata</h4>
            </div>

            <div class="card-body">
                <?php echo form_open('biodata/editSiswa'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">NISN</label>
                            <input type="number" name="nisn" class="form-control"
                                value="<?= (isset($siswa['nisn'])) ? $siswa['nisn'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('nisn'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                value="<?= (isset($siswa['nama'])) ? $siswa['nama'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('nama'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
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
                            <span class="text-danger"><?php echo form_error('jk'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="text" name="tl" class="form-control"
                                        value="<?= (isset($siswa['tempat_lahir'])) ? $siswa['tempat_lahir'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('tl'); ?></span>
                                </div>
                                <div class="col-md-5">
                                    <input type="date" name="tgl" class="form-control"
                                        value="<?= (isset($siswa['tanggal_lahir'])) ? $siswa['tanggal_lahir'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('tgl'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Agama</label>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control"
                                value="<?= (isset($siswa['nama_ayah'])) ? $siswa['nama_ayah'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('nama_ayah'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_a" class="form-control"
                                value="<?= (isset($siswa['pekerjaan_ayah'])) ? $siswa['pekerjaan_ayah'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('pekerjaan_a'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control"
                                value="<?= (isset($siswa['nama_ibu'])) ? $siswa['nama_ibu'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('nama_ibu'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_i" class="form-control"
                                value="<?= (isset($siswa['pekerjaan_ibu'])) ? $siswa['pekerjaan_ibu'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('[pekerjaan_i]'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Provinsi</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="idprovinsi" id="idprovinsi" edit-id="<?= $lok['idprovinsi'] ?>" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Kabupaten/Kota</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="idkabupatenkota" id="idkabupatenkota" edit-id="<?= $lok['idkabupatenkota'] ?>" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Kecamatan</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="idkecamatan" id="idkecamatan" edit-id="<?= $lok['idkecamatan'] ?>" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Kelurahan</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="idkelurahan" id="idkelurahan" edit-id="<?= $lok['kelurahan_id'] ?>" class="form-control">

                                </select>
                                <span class="text-danger"><?php echo form_error('idkelurahan'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="2" style="height: 30%;"><?= ucwords(strtolower($lok['alamat'])); ?></textarea>
                            <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control"
                                value="<?= (isset($siswa['asal_sekolah'])) ? $siswa['asal_sekolah'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('asal_sekolah'); ?></span>
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
                src="<?= (isset($siswa['pict'])) ? base_url('assets/img/avatar/'). $siswa['pict'] : base_url('assets/'). 'img/avatar/' . $user['pict']; ?>"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= (isset($siswa['nama'])) ? $siswa['nama'] : $user['nama']; ?></h4>
                <p class="card-description">
                    <?= $user['level']; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>/location/getprovinsi/",
            cache: false,
            success: function (msg) {
                $("#idprovinsi").html(msg);
            }
        });
        $("#idprovinsi").on('change', function () {
            var provinsi = $("#idprovinsi").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkabupaten/",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function (msg) {
                    $("#idkabupatenkota").html(msg);
                }
            });
        }).trigger('change')

        $("#idkabupatenkota").on('change', function () {
            var kabupaten = $("#idkabupatenkota").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkecamatan/",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function (msg) {
                    $("#idkecamatan").html(msg);
                }
            })
        }).trigger('change')

        $("#idkecamatan").on('change', function () {
            var kecamatan = $("#idkecamatan").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkelurahan/",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function (msg) {
                    $("#idkelurahan").html(msg);
                }
            });
        }).trigger('change')
    })
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>/location/getprovinsi/",
            cache: false,
            success: function(msg) {
                $("#idprovinsi").html(msg);
                var edit = $("#idprovinsi").attr("edit-id");
                $("#idprovinsi").val(edit).change();
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
                    var edit = $("#idkabupatenkota").attr("edit-id");
                    $("#idkabupatenkota").val(edit).change();
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
                    var edit = $("#idkecamatan").attr("edit-id");
                    $("#idkecamatan").val(edit).change();
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
                    var edit = $("#idkelurahan").attr("edit-id");
                    $("#idkelurahan").val(edit).change();
                }
            });
        }).trigger('change')
    })
</script>
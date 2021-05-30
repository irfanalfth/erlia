<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Biodata</h4>
            </div>

            <div class="card-body">
                <?php echo form_open(''); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">NUPTK</label>
                            <input type="number" name="nuptk" class="form-control"
                                value="<?= (isset($pendidik['nuptk'])) ? $pendidik['nuptk'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('nuptk'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                value="<?= (isset($pendidik['nama'])) ? $pendidik['nama'] : ""; ?>" />
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
                                        value="<?= (isset($pendidik['tempat_lahir'])) ? $pendidik['tempat_lahir'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('tl'); ?></span>
                                </div>
                                <div class="col-md-5">
                                    <input type="date" name="tgl" class="form-control"
                                        value="<?= (isset($pendidik['tanggal_lahir'])) ? $pendidik['tanggal_lahir'] : ""; ?>" />
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
                            <label class="bmd-label-floating">Status Kepegawaian</label>
                            <input type="text" name="status_kepegawaian" class="form-control"
                                value="<?= (isset($pendidik['status_kepegawaian'])) ? $pendidik['status_kepegawaian'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('status_kepegawaian'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis PTK</label>
                            <input type="text" name="jenis_ptk" class="form-control"
                                value="<?= (isset($pendidik['jenis_ptk'])) ? $pendidik['jenis_ptk'] : ""; ?>" />
                            <span class="text-danger"><?php echo form_error('jenis_ptk'); ?></span>
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
                            <textarea class="form-control" name="alamat" rows="2" placeholder="Jalan" style="height: 30%;"><?= ucwords(strtolower($pendidik['alamat'])); ?></textarea>
                            <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="text" name="rt" class="form-control" placeholder="RT"
                                        value="<?= (isset($pendidik['rt'])) ? $pendidik['rt'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('rt'); ?></span>
                                </div>
                                <div class="col-md-4">
                                <input type="text" name="rw" class="form-control" placeholder="RW"
                                        value="<?= (isset($pendidik['rw'])) ? $pendidik['rw'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('rw'); ?></span>
                                </div>
                                <div class="col-md-4">
                                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos"
                                        value="<?= (isset($pendidik['kode_pos'])) ? $pendidik['kode_pos'] : ""; ?>" />
                                    <span class="text-danger"><?php echo form_error('kode_pos'); ?></span>
                                </div>
                            </div>
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
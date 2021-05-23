<div class="card card-body">
    <div class="row col-md-12">
        <div class="d-sm-flex justify-content-between mb-3 ">
            <h1 class="h3 ml-3 text-gray-800">Profile</h1>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?= base_url('assets/img/avatar/' . $user['pict']) ?>" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4><?= $user['nama'] ?></h4>
                            <p class="mb-4"><?= ($user['level'] == '2') ? 'Mahasiswa' : 'Administrator' ?>/<?= $user['npm'] ?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-backdrop="false" data-target="#modalfoto">Ubah Foto</button>
                            <div class="modal fade bd-example-modal-lg" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Ubah Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('profile/upFoto/'); ?>
                                            <div class="form-group">
                                                <div class="">
                                                    <label class="" for="customFile">Pilih file</label>
                                                    <input type="file" name="foto" value="" class="form-control" id="customFile" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check"></i> Simpan
                                            </button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['nama'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tempat Lahir/Tanggal Lahir</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['tempat_lahir'] . '/' . $user['tanggal_lahir'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['email'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">No Hp</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['nohp'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tahun Masuk</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['tahun_masuk'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tahun Keluar</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['tahun_keluar'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tanggal Wisuda</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['tanggal_wisuda'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Judul Tugas Akhir</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['judul_ta'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Lama Waktu Pengerjaan</h6>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $bilangan = $user['lamawaktu'];
                            $pembagi = 12;
                            $sisaBagi = $bilangan % $pembagi;
                            $hasilBagi = ($bilangan - $sisaBagi) / $pembagi;
                            if ($hasilBagi != 0) {
                                echo $hasilBagi . " Tahun dan " . $sisaBagi . " Bulan";
                            } else {
                                echo $sisaBagi . " Bulan";
                            }

                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Hobby</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['hobby'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Jenis Kelamin</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= ($user['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan' ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">IPK</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['ipk'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Agama</h6>
                        </div>
                        <div class="col-sm-9">
                            <?= $user['agama'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Alamat</h6>
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <?php
                                $loka = $this->db->join('kelurahan', 'kelurahan.idkelurahan=tbl_alumni.idkelurahan')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('tbl_alumni', ['npm' => $user['npm']])->row_array();
                                ?>
                                <div class="col-md-12"><?= $loka['nmprovinsi'] . ' - ' . $loka['nmkabupatenkota'] . ' - ' . $loka['nmkecamatan'] . ' - ' . $loka['nmkelurahan'] ?> </div>
                                <div class="col-md-12"><?= $loka['alamat_ortu'] ?> </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-outline-primary float-left" data-toggle="modal" data-backdrop="false" data-target="#modaldataortu">Data Orang Tua</button>
                            <div class="modal fade bd-example-modal-lg" id="modaldataortu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data Orang Tua</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row ff">
                                                <div class="col-md-2">
                                                    <label>Nama Ayah</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['nama_ayah'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan Ayah</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['pekerjaan_ayah'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Penghasilan Ayah</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <?= $user['penghasilan_ayah'] ?>
                                                </div>
                                            </div>
                                            <div class="row ff">
                                                <div class="col-md-2">
                                                    <label>Nama Ibu</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['nama_ibu'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan Ibu</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['pekerjaan_ibu'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Penghasilan Ibu</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <?= $user['penghasilan_ibu'] ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">Alamat </div>
                                                    <?php
                                                    $lok = $this->db->join('kelurahan', 'kelurahan.idkelurahan=tbl_alumni.idkelurahan_ortu')->join('kecamatan', 'kelurahan.idkecamatan=kecamatan.idkecamatan')->join('kabupatenkota', 'kecamatan.idkabupatenkota=kabupatenkota.idkabupatenkota')->join('provinsi', 'kabupatenkota.idprovinsi=provinsi.idprovinsi')->get_where('tbl_alumni', ['npm' => $user['npm']])->row_array();
                                                    ?>
                                                    <div class="col-md-12"><?= $lok['nmprovinsi'] . ' - ' . $lok['nmkabupatenkota'] . ' - ' . $lok['nmkecamatan'] . ' - ' . $lok['nmkelurahan'] ?> </div>
                                                    <div class="col-md-12"><?= $lok['alamat_ortu'] ?> </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end ">
                                                    <button type="button" class="btn btn-primary mr-1 mb-1 editGeh">Edit</button>
                                                </div>
                                            </div>
                                            <?php echo form_open_multipart('profile/orangtua/' . $this->session->userdata('user_id'), array('class' => 'form form-horizontal')); ?>
                                            <div class="form-body d-none editortu">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Nama Ayah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="nama_ayah" value="<?php echo ($this->input->post('nama_ayah') ? $this->input->post('nama_ayah') : $user['nama_ayah']); ?>" class="form-control" id="nama_ayah" />
                                                                <span class="text-danger"><?php echo form_error('nama_ayah'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Pekerjaan Ayah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="pekerjaan_ayah" value="<?php echo ($this->input->post('pekerjaan_ayah') ? $this->input->post('pekerjaan_ayah') : $user['pekerjaan_ayah']); ?>" class="form-control" id="pekerjaan_ayah" />
                                                                <span class="text-danger"><?php echo form_error('pekerjaan_ayah'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Penghasilan Ayah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="penghasilan_ayah" value="<?php echo ($this->input->post('penghasilan_ayah') ? $this->input->post('penghasilan_ayah') : $user['penghasilan_ayah']); ?>" class="form-control" id="dengan-rupiah" />
                                                                <span class="text-danger"><?php echo form_error('penghasilan_ayah'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Nama Ibu</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="nama_ibu" value="<?php echo ($this->input->post('nama_ibu') ? $this->input->post('nama_ibu') : $user['nama_ibu']); ?>" class="form-control" id="nama_ibu" />
                                                                <span class="text-danger"><?php echo form_error('nama_ibu'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Pekerjaan Ibu</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="pekerjaan_ibu" value="<?php echo ($this->input->post('pekerjaan_ibu') ? $this->input->post('pekerjaan_ibu') : $user['pekerjaan_ibu']); ?>" class="form-control" id="pekerjaan_ibu" />
                                                                <span class="text-danger"><?php echo form_error('pekerjaan_ibu'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Penghasilan Ibu</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="penghasilan_ibu" value="<?php echo ($this->input->post('penghasilan_ibu') ? $this->input->post('penghasilan_ibu') : $user['penghasilan_ibu']); ?>" class="form-control" id="dengan-rupiah1" />
                                                                <span class="text-danger"><?php echo form_error('penghasilan_ibu'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                <select name="idkelurahan" id="idkelurahan" edit-id="<?= $lok['idkelurahan'] ?>" class="form-control">

                                                                </select>
                                                                <span class="text-danger"><?php echo form_error('idkelurahan'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat Orang Tua</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="alamat_ortu" value="<?php echo ($this->input->post('alamat_ortu') ? $this->input->post('alamat_ortu') : $user['alamat_ortu']); ?>" class="form-control" id="alamat_ortu" />
                                                                <span class="text-danger"><?php echo form_error('alamat_ortu'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end ">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                                        <button type="button" class="btn btn-secondary mr-1 mb-1 keluarGeh">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary ff" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary float-left ml-1" data-toggle="modal" data-backdrop="false" data-target="#modalberkas">Data Berkas</button>
                            <div class="modal fade bd-example-modal-lg" id="modalberkas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row fff">
                                                <div class="col-md-2">
                                                    <label>No Ijazah</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['no_ijazah'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>No SKHUN</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['no_skhun'] ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Status Pekerjaan</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $user['status_pekerjaan'] ?>
                                                </div>
                                            </div>
                                            <div class="row fff">
                                                <div class="col-md-2">
                                                    <label>Deskripsi Pekerjaan</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <?= $user['deskripsi_pekerjaan'] ?>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end ">
                                                    <button type="button" class="btn btn-primary mr-1 mb-1 editGehBerkas">Edit</button>
                                                </div>
                                            </div>
                                            <?php echo form_open_multipart('profile/berkas/' . $this->session->userdata('user_id'), array('class' => 'form form-horizontal')); ?>
                                            <div class="form-body d-none editberkas">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>No Ijazah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="no_ijazah" value="<?php echo ($this->input->post('no_ijazah') ? $this->input->post('no_ijazah') : $user['no_ijazah']); ?>" class="form-control" id="no_ijazah" />
                                                                <span class="text-danger"><?php echo form_error('no_ijazah'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>No SKHUN</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="no_skhun" value="<?php echo ($this->input->post('no_skhun') ? $this->input->post('no_skhun') : $user['no_skhun']); ?>" class="form-control" id="no_skhun" />
                                                                <span class="text-danger"><?php echo form_error('no_skhun'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Status Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select name="status_pekerjaan" class="form-control">
                                                                <?php
                                                                $status_pekerjaan_values = array(
                                                                    'Bekerja' => 'Bekerja',
                                                                    'Tidak Bekerja' => 'Tidak Bekerja',
                                                                );

                                                                foreach ($status_pekerjaan_values as $value => $display_text) {
                                                                    $selected = ($value == $user['status_pekerjaan']) ? ' selected="selected"' : "";

                                                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="text-danger"><?php echo form_error('status_pekerjaan'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Deskripsi Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <textarea name="deskripsi_pekerjaan" class="form-control" id="deskripsi_pekerjaan"><?php echo ($this->input->post('deskripsi_pekerjaan') ? $this->input->post('deskripsi_pekerjaan') : $user['deskripsi_pekerjaan']); ?></textarea>
                                                                <span class="text-danger"><?php echo form_error('deskripsi_pekerjaan'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end ">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                                        <button type="button" class="btn btn-secondary mr-1 mb-1 keluarGehBerkas">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary fff" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary float-right ml-2" data-toggle="modal" data-backdrop="false" data-target="#modalpass">Ubah Password</button>
                            <div class="modal fade bd-example-modal-lg" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Ubah Password</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('profile/ubahpass/'); ?>
                                            <div class="form-group">
                                                <label for="nama">Password Baru</label>
                                                <input type="text" class="form-control" id="nama" name="password" aria-describedby="emailHelp" placeholder="Masukan Password Baru">
                                                <small id="emailHelp" class="form-text text-muted">Password min 8 karakter.</small>
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check"></i> Simpan
                                            </button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary float-right" data-toggle="modal" data-backdrop="false" data-target="#modalprofile">Ubah Data</button>
                            <div class="modal fade bd-example-modal-lg" id="modalprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Ubah Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('profile/edit/'); ?>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $user['nama']); ?>" aria-describedby="emailHelp" placeholder="Masukan Nama">
                                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No HP</label>
                                                <input type="text" class="form-control" name="nohp" value="<?php echo ($this->input->post('nohp') ? $this->input->post('nohp') : $user['nohp']); ?>" id="exampleInputnohp1" aria-describedby="nohpHelp" placeholder="Masukan nohp">
                                                <span class="text-danger"><?php echo form_error('nohp'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : $user['tempat_lahir']); ?>" id="exampleInputtempat_lahir1" aria-describedby="tempat_lahirHelp" placeholder="Masukan tempat_lahir">
                                                <span class="text-danger"><?php echo form_error('tempat_lahir'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $user['tanggal_lahir']); ?>" id="exampleInputtanggal_lahir1" aria-describedby="tanggal_lahirHelp" placeholder="Masukan tanggal_lahir">
                                                <span class="text-danger"><?php echo form_error('tanggal_lahir'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="L" <?= ($user['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                                    <option value="P" <?= ($user['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option value="Islam" <?= ($user['agama'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                                    <option value="Hindu" <?= ($user['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                                    <option value="Budha" <?= ($user['agama'] == 'Budha') ? 'selected' : '' ?>>Budha</option>
                                                    <option value="Kristen" <?= ($user['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                                    <option value="Katolik" <?= ($user['agama'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hobby</label>
                                                <input type="text" class="form-control" name="hobby" value="<?php echo ($this->input->post('hobby') ? $this->input->post('hobby') : $user['hobby']); ?>" id="exampleInputhobby1" aria-describedby="hobbyHelp" placeholder="Masukan hobby">
                                                <span class="text-danger"><?php echo form_error('hobby'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tahun Masuk</label>
                                                <input type="text" class="form-control" name="tahun_masuk" value="<?php echo ($this->input->post('tahun_masuk') ? $this->input->post('tahun_masuk') : $user['tahun_masuk']); ?>" id="exampleInputtahun_masuk1" aria-describedby="tahun_masukHelp" placeholder="Masukan tahun_masuk">
                                                <span class="text-danger"><?php echo form_error('tahun_masuk'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tahun Keluar</label>
                                                <input type="text" class="form-control" name="tahun_keluar" value="<?php echo ($this->input->post('tahun_keluar') ? $this->input->post('tahun_keluar') : $user['tahun_keluar']); ?>" id="exampleInputtahun_keluar1" aria-describedby="tahun_keluarHelp" placeholder="Masukan tahun_keluar">
                                                <span class="text-danger"><?php echo form_error('tahun_keluar'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">IPK</label>
                                                <input type="text" class="form-control" name="ipk" value="<?php echo ($this->input->post('ipk') ? $this->input->post('ipk') : $user['ipk']); ?>" id="exampleInputipk1" aria-describedby="ipkHelp" placeholder="Masukan ipk">
                                                <span class="text-danger"><?php echo form_error('ipk'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select name="idprovinsi" id="idprovinsi1" edit-id="<?= $loka['idprovinsi'] ?>" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kabupaten/Kota</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select name="idkabupatenkota" id="idkabupatenkota1" edit-id="<?= $loka['idkabupatenkota'] ?>" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select name="idkecamatan" id="idkecamatan1" edit-id="<?= $loka['idkecamatan'] ?>" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select name="idkelurahan" id="idkelurahan1" edit-id="<?= $loka['idkelurahan'] ?>" class="form-control">

                                                        </select>
                                                        <span class="text-danger"><?php echo form_error('idkelurahan'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                <textarea class="form-control" name="alamat"><?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $user['alamat']); ?></textarea>
                                                <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Wisuda</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="date" name="tanggal_wisuda" value="<?php echo ($this->input->post('tanggal_wisuda') ? $this->input->post('tanggal_wisuda') : $user['tanggal_wisuda']); ?>" class="form-control" id="tanggal_wisuda" />
                                                        <span class="text-danger"><?php echo form_error('tanggal_wisuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Tugas Akhir</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" name="judul_ta" value="<?php echo ($this->input->post('judul_ta') ? $this->input->post('judul_ta') : $user['judul_ta']); ?>" class="form-control" id="judul_ta" />
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
                                                        <input type="radio" name="category" value="dibawah" id="category" /> Dibawah satu tahun <br>
                                                        <input type="radio" name="category" value="diatas"  id="category"/> Diatas satu tahun
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('lamawaktu'); ?></span>
                                                </div>
                                            </div>
                                            <input type="hidden" value="" class="tipe" name="tipe">
                                            <input type="hidden" value="<?php echo $user['lamawaktu']; ?>" class="sele" name="sele">
                                            <div class="col-md-8 lamawaktu">

                                            </div>
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" name="facebook" value="<?php echo ($this->input->post('facebook') ? $this->input->post('facebook') : $user['facebook']); ?>" class="form-control" id="facebook" />
                                                        <span class="text-danger"><?php echo form_error('facebook'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" name="instagram" value="<?php echo ($this->input->post('instagram') ? $this->input->post('instagram') : $user['instagram']); ?>" class="form-control" id="instagram" />
                                                        <span class="text-danger"><?php echo form_error('instagram'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check"></i> Simpan
                                            </button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        var one = $('#dengan-rupiah').val();
        var two = $('#dengan-rupiah1').val();
        $('#dengan-rupiah').val(formatRupiah(one, 'Rp. '));
        $('#dengan-rupiah1').val(formatRupiah(two, 'Rp. '));
    })
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah1 = document.getElementById('dengan-rupiah1');
    dengan_rupiah1.addEventListener('keyup', function(e) {
        dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });

    $("body").delegate('.editGeh', 'click', function() {
        $('.editortu').removeClass('d-none');
        $('.ff').addClass('d-none');
    })
    $("body").delegate('.keluarGeh', 'click', function() {
        $('.editortu').addClass('d-none');
        $('.ff').removeClass('d-none');
    })

    $("body").delegate('.editGehBerkas', 'click', function() {
        $('.editberkas').removeClass('d-none');
        $('.fff').addClass('d-none');
    })
    $("body").delegate('.keluarGehBerkas', 'click', function() {
        $('.editberkas').addClass('d-none');
        $('.fff').removeClass('d-none');
    })
    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    $(':radio[name="category"]').change(function() {
        var category = $(this).filter(':checked').val();
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
<script>
    $(document).ready(function() {
        var sele = $(".sele").val();
        if (sele > 12) {
            $(".tipe").val('diatas');
            $('#category[value="diatas"]').attr('checked', true).trigger('click');
            $(".lamawaktu").html('<div class="row"><div class="col-md-2"><label>Tahun</label></div><div class="col-md-4"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu1" value="<?php $sisaBagi=$user['lamawaktu']%12; $hasilBagi=($user['lamawaktu']-$sisaBagi)/12; echo $hasilBagi?>" class="form-control" id="lamawaktu1" /><span class="text-danger"><?php echo form_error('lamawaktu1'); ?></span></div></div></div><div class="col-md-2"><label>Bulan</label></div><div class="col-md-4"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu2" value="<?php echo $sisaBagi; ?>" class="form-control" id="lamawaktu2" /><span class="text-danger"><?php echo form_error('lamawaktu2'); ?></span></div></div></div></div>');
        } else {
            $('#category[value="dibawah"]').attr('checked', true).trigger('click');
            $(".tipe").val('dibawah');
            $(".lamawaktu").html('<div class="row"><div class="col-md-4"><label>Bulan</label></div><div class="col-md-8"><div class="form-group has-icon-left"><div class="position-relative"><input type="text" name="lamawaktu" value="<?php echo ($this->input->post('lamawaktu') ? $this->input->post('lamawaktu') : $user['lamawaktu']); ?>" class="form-control" id="lamawaktu" /><span class="text-danger"><?php echo form_error('lamawaktu'); ?></span></div></div></div></div>');
        }
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>/location/getprovinsi/",
            cache: false,
            success: function(msg) {
                $("#idprovinsi1").html(msg);
                var edit = $("#idprovinsi1").attr("edit-id");
                $("#idprovinsi1").val(edit).change();
            }
        });
        $("#idprovinsi1").on('change', function() {
            var provinsi = $("#idprovinsi1").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkabupaten/",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(msg) {
                    $("#idkabupatenkota1").html(msg);
                    var edit = $("#idkabupatenkota1").attr("edit-id");
                    $("#idkabupatenkota1").val(edit).change();
                }
            });
        }).trigger('change')

        $("#idkabupatenkota1").on('change', function() {
            var kabupaten = $("#idkabupatenkota1").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkecamatan/",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(msg) {
                    $("#idkecamatan1").html(msg);
                    var edit = $("#idkecamatan1").attr("edit-id");
                    $("#idkecamatan1").val(edit).change();
                }
            })
        }).trigger('change')

        $("#idkecamatan1").on('change', function() {
            var kecamatan = $("#idkecamatan1").val()
            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>/location/getkelurahan/",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(msg) {
                    $("#idkelurahan1").html(msg);
                    var edit = $("#idkelurahan1").attr("edit-id");
                    $("#idkelurahan1").val(edit).change();
                }
            });
        }).trigger('change')
    })
</script>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Biodata</h4>
                <div class="my-0">
                    <a class="btn btn-success float-right" href="<?= base_url('biodata/edit/'. $siswa['user_id']); ?>">Edit</a>
                </div>
                
            </div>
            <p class="ml-4 mt-1 mr-4">
                <span class="text-danger">*</span>Lengkapi Biodata Yang Kosong 
            </p>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">NISN</label>
                                <input type="nisn" name="nisn" class="form-control" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama</label>
                                <input type="text" class="form-control" name="nama" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jk" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tempat Tanggal Lahir</label>
                                <input type="text" class="form-control" name="ttl" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Agama</label>
                                <input type="text" class="form-control" name="agama" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pa" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" name="pi" value="" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="2" style="height: 30%;"
                                    readonly>asfgasgas</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Asal Sekolah</label>
                                <input type="text" class="form-control" name="nama" value="" readonly />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('assets/') ?>img/avatar/<?= $siswa['pict'] ?>"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= $siswa['nama'] ?></h4>
                <p class="card-description">
                    <?= $siswa['level'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
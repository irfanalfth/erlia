<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title ">Upload Jadwal</h4>
        </div>
        <?= form_open_multipart('jadwal/upload'); ?>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-10">
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Upload Jadwal</button>
                </div>
            </div>
        </div>
    </div>
</div>
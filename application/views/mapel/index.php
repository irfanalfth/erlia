<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title ">Data Mapel <a href="<?= base_url('mapel/add') ?>" class="btn btn-sm btn-success pull-right">Tambah Mapel</a></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Mapel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mapel as $u) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $u['nama']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('mapel/edit/' . $u['mapel_id']); ?>" class="badge badge-sm badge-warning"><span class="fa fa-pen"></span> Edit</a>
                                    <a href="<?php echo site_url('mapel/remove/' . $u['mapel_id']); ?>" class="badge badge-sm badge-danger"><span class="fa fa-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title ">Data User <a href="<?= base_url('user/add') ?>" class="btn btn-sm btn-success pull-right">Tambah User</a></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $u) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $u['nama']; ?></td>
                                <td><?php echo $u['email']; ?></td>
                                <td><?php echo $u['level']; ?></td>
                                <td><?php echo $u['status']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('user/edit/' . $u['user_id']); ?>" class="badge badge-sm badge-warning"><span class="fa fa-pen"></span> Edit</a>
                                    <a href="<?php echo site_url('user/remove/' . $u['user_id']); ?>" class="badge badge-sm badge-danger"><span class="fa fa-trash"></span> Delete</a>
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
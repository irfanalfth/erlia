<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title ">Data Sub Kelas <a href="<?= base_url('sub_kelas/add') ?>" class="btn btn-sm btn-success pull-right">Tambah Sub Kelas</a></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Wali Kelas</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sub_kelas as $u) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo view('kelas', ['kelas_id' => $u['kelas_id']], 'nama') . $u['nama']; ?></td>
                                <td><?php $aa = view('pendidik', ['pendidik_id' => $u['pendidik_id']], 'nama');
                                    echo ($aa == null) ? '-' : $aa; ?></td>
                                <td>
                                    <a href="<?php echo site_url('sub_kelas/edit/' . $u['sub_kelas_id']); ?>" class="badge badge-sm badge-warning"><span class="fa fa-pen"></span> Edit</a>
                                    <a href="<?php echo site_url('sub_kelas/remove/' . $u['sub_kelas_id']); ?>" class="badge badge-sm badge-danger"><span class="fa fa-trash"></span> Delete</a>
                                    <a href="<?php echo site_url('sub_kelas/wali/' . $u['sub_kelas_id']); ?>" class="badge badge-sm badge-primary"><span class="fa fa-plus"></span> Set Wali</a>
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
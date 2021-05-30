<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title ">Data Pendidik</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pendidik as $u) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php $aa = view('pendidik', ['pendidik_id' => $u['pendidik_id']], 'nama');
                                    echo ($aa == null) ? '-' : $aa; ?></td>
                                <td>
                                    <a href="<?php echo site_url('pendidik/edit/' . $u['pendidik_id']); ?>" class="badge badge-sm badge-warning"><span class="fa fa-pen"></span> Edit</a>
                                    <a href="<?php echo site_url('pendidik/remove/' . $u['pendidik_id']); ?>" class="badge badge-sm badge-danger"><span class="fa fa-trash"></span> Delete</a>
                                    <a href="<?php echo site_url('pendidik/mapel/' . $u['pendidik_id']); ?>" class="badge badge-sm badge-primary"><span class="fa fa-plus"></span> Set Mapel</a>
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
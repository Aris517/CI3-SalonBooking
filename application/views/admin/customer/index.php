<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola Customer</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($customer as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->email ?></td>
                                    <td>
                                        <a href="<?= base_url('customer/status/' . $row->id) ?>" class="btn btn-sm <?= $row->status ? 'btn-danger' : 'btn-primary' ?>"><?= $row->status ? 'Nonaktifkan' : 'Aktifkan' ?></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
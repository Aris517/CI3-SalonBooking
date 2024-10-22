<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Transaksi Sewa Baju</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Hp</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Bayar</th>
                                <th class="text-center">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($sewa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $row->nama ?></td>
                                    <td class="text-center"><?= $row->no_hp ?></td>
                                    <td class="text-center"><?= number_format($row->total, 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <?php if ($row->status == 'Menunggu') : ?>
                                            <a href="<?= base_url("transaksi/bayar/sewa/$row->id") ?>" class="btn btn-primary btn-sm">Bayar</a>
                                        <?php else : ?>
                                            <?= $row->status ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row->status == 'Selesai') : ?>
                                            <a href="<?= base_url("transaksi/cetak/sewa/$row->id") ?>" class="btn btn-primary btn-sm" target="_blank">Cetak</a>
                                        <?php else : ?>
                                            -
                                        <?php endif ?>
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

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Transaksi Booking MUA</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped border-2 border-dark" id="dataTables1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Hp</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Bayar</th>
                                <th class="text-center">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($booking as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $row->nama ?></td>
                                    <td class="text-center"><?= $row->no_hp ?></td>
                                    <td class="text-center"><?= number_format($row->total, 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <?php if ($row->status == 'Menunggu') : ?>
                                            <a href="<?= base_url("transaksi/bayar/booking/$row->id") ?>" class="btn btn-primary btn-sm">Bayar</a>
                                        <?php else : ?>
                                            <?= $row->status ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row->status == 'Selesai') : ?>
                                            <a href="<?= base_url("transaksi/cetak/booking/$row->id") ?>" class="btn btn-primary btn-sm" target="_blank">Cetak</a>
                                        <?php else : ?>
                                            -
                                        <?php endif ?>
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
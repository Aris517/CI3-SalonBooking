<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cetak<?= date('Y-m-d') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 mx-auto">
        <div class="text-center">
            <h1>CETAK PERIODE</h1>
            <hr>
            <h4>Tabel dari <?= $dari ?> sampai <?= $sampai ?></h4>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="8"><b class="fs-3">Tabel Sewa Baju</b></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Untuk Tanggal</th>
                    <th>Layanan</th>
                    <th>Jumlah Baju</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $total = 0;
                foreach ($sewa as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->no_hp ?></td>
                        <td><?= $row->untuk_tgl ?></td>
                        <td><?= $row->pelayanan ?></td>
                        <td><?= $row->jml_baju ?></td>
                        <td><?= number_format($row->total, 0, ',', '.') ?></td>
                        <td><?= $row->status ?></td>
                    </tr>
                <?php if ($row->status == 'Selesai') {
                        $total += $row->total;
                    };
                endforeach ?>
                <tr>
                    <td colspan="6" class="text-center">Jumlah Total Selesai</td>
                    <td colspan="2"><?= number_format($total, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="8"><b class="fs-3">Tabel Booking MUA</b></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Untuk Tanggal</th>
                    <th>Layanan</th>
                    <th>Jumlah Orang</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $total = 0;
                foreach ($booking as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->no_hp ?></td>
                        <td><?= $row->untuk_tgl ?></td>
                        <td><?= $row->pelayanan ?></td>
                        <td><?= $row->jml_orang ?></td>
                        <td><?= number_format($row->total, 0, ',', '.') ?></td>
                        <td><?= $row->status ?></td>
                    </tr>
                <?php if ($row->status == 'Selesai') {
                        $total += $row->total;
                    };
                endforeach ?>
                <tr>
                    <td colspan="6" class="text-center">Jumlah Total Selesai</td>
                    <td colspan="2"><?= number_format($total, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <div class="row justify-content-start">
            <div class="col-2">
                <p class="text-center mb-5 pb-3">Mengetahui,</p>
                <p class="text-center">Pemilik</p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        window.print()
        window.onafterprint = function() {
            window.close();
        };
    </script>
</body>

</html>
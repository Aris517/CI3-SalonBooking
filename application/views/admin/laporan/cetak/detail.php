<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cetak<?= date('Y-m-d') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 w-75 mx-auto">
        <div class="text-center">
            <h1>CETAK DETAIL <?= strtoupper($tipe) ?></h1>
            <hr>
        </div>
        <table class="table table-borderles">
            <tr>
                <td class="text-end">Nama</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= $trans->nama ?></td>
            </tr>
            <tr>
                <td class="text-end">No Hp</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= $trans->no_hp ?></td>
            </tr>
            <tr>
                <td class="text-end">Tipe Transaksi</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= strtoupper($tipe) ?></td>
            </tr>
            <tr>
                <td class="text-end">Pelayanan</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= $trans->pelayanan ?></td>
            </tr>
            <tr>
                <td class="text-end">Tanggal Transaksi</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= $trans->tgl_transaksi ?></td>
            </tr>
            <?php if ($tipe == 'sewa') : ?>
                <tr>
                    <td class="text-end">Baju</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= $trans->nama_baju ?></td>
                </tr>
                <tr>
                    <td class="text-end">Kategori Baju</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= $trans->kategori_baju ?></td>
                </tr>
                <tr>
                    <td class="text-end">Jumlah Baju</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= $trans->jml_baju ?></td>
                </tr>
                <tr>
                    <td class="text-end">Harga Sewa</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= number_format($trans->harga_sewa, 0, ',', '.') ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <td class="text-end">MUA</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= $trans->kategori_mua ?></td>
                </tr>
                <tr>
                    <td class="text-end">Jumlah Orang</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= $trans->jml_orang ?></td>
                </tr>
                <tr>
                    <td class="text-end">Harga</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?= number_format($trans->harga, 0, ',', '.') ?></td>
                </tr>
            <?php endif ?>
            <tr>
                <td class="text-end">Harga Layanan</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= number_format($trans->harga_layanan, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="text-end">Bayar</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= number_format($trans->bayar, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="text-end">kembalian</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= number_format($trans->kembalian, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="text-end">Total</td>
                <td class="text-center">:</td>
                <td class="text-start"><?= number_format($trans->total, 0, ',', '.') ?></td>
            </tr>
        </table>
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
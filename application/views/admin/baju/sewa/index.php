<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola Sewa Baju</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Hp</th>
                                <th class="text-center">Nama Baju</th>
                                <th class="text-center">Jenis Pelayanan</th>
                                <th class="text-center">Untuk Tgl</th>
                                <th class="text-center">Aksi</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($sewa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $row->nama ?></td>
                                    <td class="text-center"><?= $row->no_hp ?></td>
                                    <td class="text-center"><?= $row->nama_baju ?></td>
                                    <td class="text-center"><?= $row->pelayanan ?></td>
                                    <td class="text-center"><?= $row->untuk_tgl ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail" data-bs-baju="<?= $row->nama_baju ?>" data-bs-nama="<?= $row->nama ?>" data-bs-no="<?= $row->no_hp ?>" data-bs-pelayanan="<?= $row->pelayanan ?>" data-bs-tgl="<?= $row->untuk_tgl ?>" data-bs-total="<?= $row->total ?>" data-bs-alamat="<?= $row->alamat ?>" data-bs-jml="<?= $row->jml_baju ?>" data-bs-tgl_sewa="<?= $row->tgl_sewa ?>">
                                            Detail
                                        </button>
                                        <?php if ($row->status == 'Menunggu') : ?>
                                            <a href="<?= base_url('baju/sewa_edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row->status == 'Menunggu') : ?>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#batal" data-bs-id="<?= $row->id ?>" class="btn btn-danger btn-sm">Batal</button>
                                        <?php else : ?>
                                            <?= $row->status ?>
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

<div class="modal fade" id="batal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="confirm fs-4"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('batal')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')

            const modalTitle = exampleModal.querySelector('.modal-title')
            const confirm = exampleModal.querySelector('.confirm')
            const link = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = `Konfirmasi Batal`
            confirm.textContent = `Yakin ingin batalkan booking data ini ?`
            link.href = `<?= base_url('baju/proses_sewa_batal/') ?>${id}`
        })
    }
</script>

<div class="modal fade" id="detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" class="form-control" id="no_hp" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Baju</label>
                    <input type="text" class="form-control" id="jml_baju" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Untuk Tanggal</label>
                    <input type="date" class="form-control" id="untuk_tgl" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control" id="tgl_sewa" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Baju</label>
                    <input type="text" class="form-control" id="baju" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pelyananan</label>
                    <input type="text" class="form-control" id="pelayanan" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total</label>
                    <input type="text" class="form-control" id="total" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const detail = document.getElementById('detail')
    if (detail) {
        detail.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const baju = button.getAttribute('data-bs-baju')
            const nama = button.getAttribute('data-bs-nama')
            const no = button.getAttribute('data-bs-no')
            const alamat = button.getAttribute('data-bs-alamat')
            const pelayanan = button.getAttribute('data-bs-pelayanan')
            const untuk = button.getAttribute('data-bs-tgl')
            const jml = button.getAttribute('data-bs-jml')
            const tgl_sewa = button.getAttribute('data-bs-tgl_sewa')
            const total = button.getAttribute('data-bs-total')

            const modalTitle = detail.querySelector('.modal-title')
            const dataBaju = detail.querySelector('.modal-body #baju')
            const dataNama = detail.querySelector('.modal-body #nama')
            const dataNo = detail.querySelector('.modal-body #no_hp')
            const dataAlamat = detail.querySelector('.modal-body #alamat')
            const dataJml = detail.querySelector('.modal-body #jml_baju')
            const dataTgl = detail.querySelector('.modal-body #untuk_tgl')
            const dataTglSewa = detail.querySelector('.modal-body #tgl_sewa')
            const dataTotal = detail.querySelector('.modal-body #total')
            const dataPelayanan = detail.querySelector('.modal-body #pelayanan')

            modalTitle.textContent = `Detail Data`
            dataBaju.value = baju
            dataNama.value = nama
            dataNo.value = no
            dataAlamat.value = alamat
            dataJml.value = jml
            dataTgl.value = untuk
            dataTotal.value = total
            dataPelayanan.value = pelayanan
            dataTglSewa.value = tgl_sewa
        })
    }
</script>
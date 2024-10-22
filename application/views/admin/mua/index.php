<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola MUA</h5>
                <a href="<?= base_url('mua/tambah') ?>" class="btn btn-sm btn-success ms-4">Tambah</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Layanan MUA</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mua as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $row->kategori_mua ?></td>
                                    <td class="text-center"><?= $row->harga ?></td>
                                    <td class="text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#detail" data-bs-mua="<?= $row->kategori_mua ?>" data-bs-harga="<?= $row->harga ?>" data-bs-deskripsi="<?= $row->deskripsi ?>" class=" btn btn-info btn-sm">Detail</button>
                                        <a href="<?= base_url('mua/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <button data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $row->id ?>" data-bs-data="<?= $row->kategori_mua ?>" class="btn btn-danger btn-sm">Hapus</button>
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

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('hapus')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')
            const data = button.getAttribute('data-bs-data')

            const modalTitle = exampleModal.querySelector('.modal-title')
            const confirm = exampleModal.querySelector('.confirm')
            const link = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = `Konfirmasi Hapus Data`
            confirm.textContent = `Yakin ingin hapus data ${data} ?`
            link.href = `<?= base_url('mua/proses_hapus/') ?>${id}`
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
                <div class="text-center">
                    <img src="" class="w-50 foto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori MUA</label>
                    <input type="text" class="form-control" id="mua" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" disabled></textarea>
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

            const mua = button.getAttribute('data-bs-mua')
            const harga = button.getAttribute('data-bs-harga')
            const deskripsi = button.getAttribute('data-bs-deskripsi')

            const modalTitle = detail.querySelector('.modal-title')
            const dataMUA = detail.querySelector('.modal-body #mua')
            const dataHarga = detail.querySelector('.modal-body #harga')
            const dataDeskripsi = detail.querySelector('.modal-body #deskripsi')

            modalTitle.textContent = `Detail Data`
            dataMUA.value = mua
            dataHarga.value = harga
            dataDeskripsi.value = deskripsi
        })
    }
</script>
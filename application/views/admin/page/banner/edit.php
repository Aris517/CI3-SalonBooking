<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Edit Banner</h5>
                <a href="<?= base_url('page') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('page/proses_edit_banner/' . $data->id) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="opsi" value="<?= $opsi ?>">
                        <div class="mb-3">
                            <label class="form-label">Take Line</label>
                            <input type="text" class="form-control" name="tl" value="<?= $data->take_line ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Header</label>
                            <input type="text" class="form-control" name="header" value="<?= $data->header ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea type="text" id="editor" class="form-control" name="deskripsi" required><?= $data->deskripsi ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" accept=".gif, .jpg, .jpeg, .png">
                            <input type="hidden" name="f" value="<?= $data->banner ?>" class="form-control">
                            <div class="form-text text-info">File tidak perlu diinputkan jika tidak akan dirubah</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
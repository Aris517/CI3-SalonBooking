<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola Banner Home</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex mb-4">
                        <h3>Banner MUA</h3>
                        <a href="<?= base_url('page/edit_banner/mua') ?>" class="btn btn-sm btn-warning ms-auto">Edit Data</a>
                    </div>
                    <table class="table table-striped" style="width: 100%;">
                        <tr>
                            <th>Take line</th>
                            <th>:</th>
                            <th><?= $banner_mua->take_line ?></th>
                        </tr>
                        <tr>
                            <th>Header</th>
                            <th>:</th>
                            <th><?= $banner_mua->header ?></th>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <th>:</th>
                            <th><?= $banner_mua->deskripsi ?></th>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <th>:</th>
                            <th>
                                <img src="<?= base_url('upload/banner/' . $banner_mua->banner) ?>" alt="" width="150">
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex mb-4">
                        <h3>Banner Penyewaan Baju</h3>
                        <a href="<?= base_url('page/edit_banner/sewa') ?>" class="btn btn-sm btn-warning ms-auto">Edit Data</a>
                    </div>
                    <table class="table table-striped" style="width: 100%;">
                        <tr>
                            <th>Take line</th>
                            <th>:</th>
                            <th><?= $banner_sewa->take_line ?></th>
                        </tr>
                        <tr>
                            <th>Header</th>
                            <th>:</th>
                            <th><?= $banner_sewa->header ?></th>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <th>:</th>
                            <th><?= $banner_sewa->deskripsi ?></th>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <th>:</th>
                            <th>
                                <img src="<?= base_url('upload/banner/' . $banner_sewa->banner) ?>" alt="" width="150">
                            </th>
                        </tr>
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
                <h5 class="card-title fw-semibold">Kelola Page Profil</h5>
                <a href="<?= base_url('page/edit_profil') ?>" class="btn btn-sm btn-warning ms-auto">Edit Profil</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped" style="width: 100%;">
                        <tr>
                            <th>Header</th>
                            <th>:</th>
                            <th><?= $profil->header ?></th>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <th>:</th>
                            <th><?= $profil->deskripsi ?></th>
                        </tr>
                        <tr>
                            <th>Foto 1</th>
                            <th>:</th>
                            <th>
                                <img src="<?= base_url('upload/profil/' . $profil->foto) ?>" alt="" width="150" height="150" class="rounded-circle">
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
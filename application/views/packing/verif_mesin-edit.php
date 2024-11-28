<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Verifikasi Mesin</h5>
            <div class="card-body">
                <form action="<?= base_url('verif_mesin/update/' . $verif_mesin->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $verif_mesin->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $verif_mesin->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($verif_mesin->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($verif_mesin->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($verif_mesin->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>

                           
                            <div class="mb-3">
                                <label for="nama_mesin" class="form-label">Nama Mesin</label>
                                <input type="text" class="form-control" id="nama_mesin" name="nama_mesin"
                                    value="<?= $verif_mesin->nama_mesin ?>" placeholder="Masukkan Nama Mesin">
                            </div>

                            <div class="mb-3">
                                <label for="standar_setting" class="form-label">Standar Setting</label>
                                <input type="text" class="form-control" id="standar_setting" name="standar_setting"
                                    value="<?= $verif_mesin->standar_setting ?>" placeholder="Masukkan Standar Setting">
                            </div>

                            <div class="mb-3">
                                <label for="aktual" class="form-label">Aktual</label>
                                <input type="text" class="form-control" id="aktual" name="aktual"
                                    value="<?= $verif_mesin->aktual ?>" placeholder="Masukkan Aktual">
                            </div>

                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control" id="tindakan" name="tindakan"
                                    value="<?= $verif_mesin->tindakan ?>" placeholder="Masukkan Tindakan">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $verif_mesin->keterangan ?>" placeholder="Masukkan Keterangan">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $verif_mesin->catatan ?>" placeholder="Masukkan Catatan">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('verif_mesin') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
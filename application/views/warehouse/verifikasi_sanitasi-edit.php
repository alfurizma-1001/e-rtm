<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Verifikasi Sanitasi</h5>
            <div class="card-body">
                <form action="<?= base_url('verifikasi_sanitasi/update/' . $verifikasi_sanitasi->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $verifikasi_sanitasi->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $verifikasi_sanitasi->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul"
                                    value="<?= $verifikasi_sanitasi->pukul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($verifikasi_sanitasi->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($verifikasi_sanitasi->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($verifikasi_sanitasi->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" class="form-control" id="area" name="area"
                                    value="<?= $verifikasi_sanitasi->area ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mesin" class="form-label">Mesin</label>
                                <input type="text" class="form-control" id="mesin" name="mesin"
                                    value="<?= $verifikasi_sanitasi->mesin ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cleaning_agents" class="form-label">Cleaning Agents</label>
                                <input type="text" class="form-control" id="cleaning_agents" name="cleaning_agents"
                                    value="<?= $verifikasi_sanitasi->cleaning_agents ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $verifikasi_sanitasi->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $verifikasi_sanitasi->catatan ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('verifikasi_sanitasi') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
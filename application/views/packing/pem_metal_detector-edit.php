<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Metal Detector</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_metal_detector/update/' . $pem_metal_detector->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_metal_detector->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_metal_detector->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pem_metal_detector->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($pem_metal_detector->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($pem_metal_detector->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul"
                                    value="<?= $pem_metal_detector->pukul ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pem_metal_detector->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="no_Produksi" class="form-label">No. Produksi</label>
                                <input type="text" class="form-control" id="no_Produksi" name="no_Produksi"
                                    value="<?= $pem_metal_detector->no_Produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="fe_1" class="form-label">Fe 1</label>
                                <input type="text" class="form-control" id="fe_1" name="fe_1"
                                    value="<?= $pem_metal_detector->fe_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="fe_2" class="form-label">Fe 2</label>
                                <input type="text" class="form-control" id="fe_2" name="fe_2"
                                    value="<?= $pem_metal_detector->fe_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="non_fe_1" class="form-label">Non Fe 1</label>
                                <input type="text" class="form-control" id="non_fe_1" name="non_fe_1"
                                    value="<?= $pem_metal_detector->non_fe_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="non_fe_2" class="form-label">Non Fe 2</label>
                                <input type="text" class="form-control" id="non_fe_2" name="non_fe_2"
                                    value="<?= $pem_metal_detector->non_fe_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sus_1" class="form-label">Sus 1</label>
                                <input type="text" class="form-control" id="sus_1" name="sus_1"
                                    value="<?= $pem_metal_detector->sus_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sus_2" class="form-label">Sus 2</label>
                                <input type="text" class="form-control" id="sus_2" name="sus_2"
                                    value="<?= $pem_metal_detector->sus_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pem_metal_detector->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tindakan_koreksi" class="form-label">Tindakan Koreksi</label>
                                <input type="text" class="form-control" id="tindakan_koreksi" name="tindakan_koreksi"
                                    value="<?= $pem_metal_detector->tindakan_koreksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_metal_detector->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_metal_detector') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
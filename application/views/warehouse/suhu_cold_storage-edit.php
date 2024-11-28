<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Suhu Cold Storage</h5>
            <div class="card-body">
                <form action="<?= base_url('suhu_cold_storage/update/' . $suhu_cold_storage->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $suhu_cold_storage->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $suhu_cold_storage->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul"
                                    value="<?= $suhu_cold_storage->pukul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($suhu_cold_storage->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($suhu_cold_storage->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($suhu_cold_storage->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $suhu_cold_storage->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_cs" class="form-label">Suhu CS</label>
                                <input type="text" class="form-control" id="suhu_cs" name="suhu_cs"
                                    value="<?= $suhu_cold_storage->suhu_cs ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics1" class="form-label">Suhu DICS1</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics1" name="suhu_dics1"
                                    value="<?= $suhu_cold_storage->suhu_dics1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics2" class="form-label">Suhu DICS2</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics2" name="suhu_dics2"
                                    value="<?= $suhu_cold_storage->suhu_dics2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics3" class="form-label">Suhu DICS3</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics3" name="suhu_dics3"
                                    value="<?= $suhu_cold_storage->suhu_dics3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics4" class="form-label">Suhu DICS4</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics4" name="suhu_dics4"
                                    value="<?= $suhu_cold_storage->suhu_dics4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics5" class="form-label">Suhu DICS5</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics5" name="suhu_dics5"
                                    value="<?= $suhu_cold_storage->suhu_dics5 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rata" class="form-label">Rata</label>
                                <input type="number" step="0.01" class="form-control" id="rata" name="rata"
                                    value="<?= $suhu_cold_storage->rata ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $suhu_cold_storage->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $suhu_cold_storage->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('suhu_cold_storage') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
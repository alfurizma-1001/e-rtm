<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Retur</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_incoming/update/' . $pemeriksaan_incoming->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_incoming->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_incoming->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pemeriksaan_incoming->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($pemeriksaan_incoming->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($pemeriksaan_incoming->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_supllier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supllier" name="nama_supllier"
                                    value="<?= $pemeriksaan_incoming->nama_supllier ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    value="<?= $pemeriksaan_incoming->nama_barang ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_mobil" class="form-label">Jenis Mobil</label>
                                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil"
                                    value="<?= $pemeriksaan_incoming->jenis_mobil ?>">
                            </div>
                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No Polisi</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                    value="<?= $pemeriksaan_incoming->no_polisi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="identitas_pengantar" class="form-label">Identitas Pengantar</label>
                                <input type="text" class="form-control" id="identitas_pengantar"
                                    name="identitas_pengantar"
                                    value="<?= $pemeriksaan_incoming->identitas_pengantar ?>">
                            </div>
                            <div class="mb-3">
                                <label for="segel" class="form-label">Segel</label>
                                <input type="text" class="form-control" id="segel" name="segel"
                                    value="<?= $pemeriksaan_incoming->segel ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kebersihaan" class="form-label">Kebersihan</label>
                                <input type="text" class="form-control" id="kebersihaan" name="kebersihaan"
                                    value="<?= $pemeriksaan_incoming->kebersihaan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tertutup" class="form-label">Tertutup</label>
                                <input type="text" class="form-control" id="tertutup" name="tertutup"
                                    value="<?= $pemeriksaan_incoming->tertutup ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hama" class="form-label">Hama</label>
                                <input type="text" class="form-control" id="hama" name="hama"
                                    value="<?= $pemeriksaan_incoming->hama ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jam_datang" class="form-label">Jam Datang</label>
                                <input type="time" class="form-control" id="jam_datang" name="jam_datang"
                                    value="<?= $pemeriksaan_incoming->jam_datang ?>">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan"
                                    name="keterangan"><?= $pemeriksaan_incoming->keterangan ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan"
                                    name="catatan"><?= $pemeriksaan_incoming->catatan ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_incoming') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
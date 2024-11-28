<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Retur</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_retur/update/' . $pemeriksaan_retur->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_retur->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_retur->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pemeriksaan_retur->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($pemeriksaan_retur->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($pemeriksaan_retur->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="no_mobil" class="form-label">No. Mobil</label>
                                <input type="text" class="form-control" id="no_mobil" name="no_mobil"
                                    value="<?= $pemeriksaan_retur->no_mobil ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_supir" class="form-label">Nama Supir</label>
                                <input type="text" class="form-control" id="nama_supir" name="nama_supir"
                                    value="<?= $pemeriksaan_retur->nama_supir ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pemeriksaan_retur->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pemeriksaan_retur->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="exp_date" class="form-label">Exp Date</label>
                                <input type="date" class="form-control" id="exp_date" name="exp_date"
                                    value="<?= $pemeriksaan_retur->exp_date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    value="<?= $pemeriksaan_retur->jumlah ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bocor" class="form-label">Bocor</label>
                                <input type="text" class="form-control" id="bocor" name="bocor"
                                    value="<?= $pemeriksaan_retur->bocor ?>">
                            </div>

                            <div class="mb-3">
                                <label for="isi_kurang" class="form-label">Isi Kurang</label>
                                <input type="text" class="form-control" id="isi_kurang" name="isi_kurang"
                                    value="<?= $pemeriksaan_retur->isi_kurang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lain" class="form-label">Lain</label>
                                <input type="text" class="form-control" id="lain" name="lain"
                                    value="<?= $pemeriksaan_retur->lain ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pemeriksaan_retur->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pemeriksaan_retur->catatan ?>">
                            </div>



                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_retur') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
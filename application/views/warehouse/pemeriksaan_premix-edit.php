<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Kedatangan Premix</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_premix/update/' . $pemeriksaan_premix->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_premix->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_premix->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pemeriksaan_premix->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($pemeriksaan_premix->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($pemeriksaan_premix->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                        
                            <div class="mb-3">
                                <label for="no_mobil" class="form-label">No Mobil</label>
                                <input type="text" class="form-control" id="no_mobil" name="no_mobil"
                                    value="<?= $pemeriksaan_premix->no_mobil ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_supir" class="form-label">Nama Supir</label>
                                <input type="text" class="form-control" id="nama_supir" name="nama_supir"
                                    value="<?= $pemeriksaan_premix->nama_supir ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pemeriksaan_premix->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pemasok" class="form-label">Pemasok</label>
                                <input type="text" class="form-control" id="pemasok" name="pemasok"
                                    value="<?= $pemeriksaan_premix->pemasok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pemeriksaan_premix->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="exp_date" class="form-label">Exp Date</label>
                                <input type="date" class="form-control" id="exp_date" name="exp_date"
                                    value="<?= $pemeriksaan_premix->exp_date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_datang" class="form-label">Jumlah Barang Datang</label>
                                <input type="text" class="form-control" id="jumlah_barang_datang"
                                    name="jumlah_barang_datang"
                                    value="<?= $pemeriksaan_premix->jumlah_barang_datang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_sample_cek" class="form-label">Jumlah Sample Cek</label>
                                <input type="text" class="form-control" id="jumlah_sample_cek" name="jumlah_sample_cek"
                                    value="<?= $pemeriksaan_premix->jumlah_sample_cek ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sesuai" class="form-label">Sesuai</label>
                                <input type="text" class="form-control" id="sesuai" name="sesuai"
                                    value="<?= $pemeriksaan_premix->sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_sesuai" class="form-label">Tidak Sesuai</label>
                                <input type="text" class="form-control" id="tidak_sesuai" name="tidak_sesuai"
                                    value="<?= $pemeriksaan_premix->tidak_sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="berat_premix" class="form-label">Berat Premix</label>
                                <input type="text" class="form-control" id="berat_premix" name="berat_premix"
                                    value="<?= $pemeriksaan_premix->berat_premix ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kemasan" class="form-label">Kemasan</label>
                                <input type="text" class="form-control" id="kemasan" name="kemasan"
                                    value="<?= $pemeriksaan_premix->kemasan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna"
                                    value="<?= $pemeriksaan_premix->warna ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jamur" class="form-label">Jamur</label>
                                <input type="text" class="form-control" id="jamur" name="jamur"
                                    value="<?= $pemeriksaan_premix->jamur ?>">
                            </div>

                            <div class="mb-3">
                                <label for="aroma" class="form-label">Aroma</label>
                                <input type="text" class="form-control" id="aroma" name="aroma"
                                    value="<?= $pemeriksaan_premix->aroma ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ok" class="form-label">OK</label>
                                <input type="text" class="form-control" id="ok" name="ok"
                                    value="<?= $pemeriksaan_premix->ok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tolak" class="form-label">Tolak</label>
                                <input type="text" class="form-control" id="tolak" name="tolak"
                                    value="<?= $pemeriksaan_premix->tolak ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pemeriksaan_premix->catatan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pemeriksaan_premix->keterangan ?>">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_premix') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
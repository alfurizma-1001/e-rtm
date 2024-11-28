<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data pemeriksaan kemasan dari pemasok</h5>
            <div class="card-body">
                <form
                    action="<?= base_url('pemeriksaan_kemasan_dari_pemasok/update/' . $pemeriksaan_kemasan_dari_pemasok->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_kemasan_dari_pemasok->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kemasan" class="form-label">Jenis Kemasan</label>
                                <input type="text" class="form-control" id="jenis_kemasan" name="jenis_kemasan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->jenis_kemasan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->spesifikasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pemasok" class="form-label">Pemasok</label>
                                <input type="text" class="form-control" id="pemasok" name="pemasok"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->pemasok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="no_po" class="form-label">No PO</label>
                                <input type="text" class="form-control" id="no_po" name="no_po"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->no_po ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_datang" class="form-label">Jumlah Barang Datang</label>
                                <input type="text" class="form-control" id="jumlah_barang_datang"
                                    name="jumlah_barang_datang"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->jumlah_barang_datang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sampling" class="form-label">Sampling</label>
                                <input type="text" class="form-control" id="sampling" name="sampling"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->sampling ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sesuai" class="form-label">Sesuai</label>
                                <input type="text" class="form-control" id="sesuai" name="sesuai"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_sesuai" class="form-label">Tidak Sesuai</label>
                                <input type="text" class="form-control" id="tidak_sesuai" name="tidak_sesuai"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->tidak_sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="penampakan" class="form-label">Penampakan</label>
                                <input type="text" class="form-control" id="penampakan" name="penampakan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->penampakan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="dimensi" class="form-label">Dimensi</label>
                                <input type="text" class="form-control" id="dimensi" name="dimensi"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->dimensi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sealing" class="form-label">Sealing</label>
                                <input type="text" class="form-control" id="sealing" name="sealing"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->sealing ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cetakan" class="form-label">Cetakan</label>
                                <input type="text" class="form-control" id="cetakan" name="cetakan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->cetakan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ketebalan" class="form-label">Ketebalan</label>
                                <input type="text" class="form-control" id="ketebalan" name="ketebalan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->ketebalan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ok" class="form-label">OK</label>
                                <input type="text" class="form-control" id="ok" name="ok"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->ok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tolak" class="form-label">Tolak</label>
                                <input type="text" class="form-control" id="tolak" name="tolak"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->tolak ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pemeriksaan_kemasan_dari_pemasok->catatan ?>">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_kemasan_dari_pemasok') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
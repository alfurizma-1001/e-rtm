<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Loading Produk Untuk Lokal</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_dry_store/update/' . $pemeriksaan_dry_store->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_dry_store->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_dry_store->date ?>" required>
                            </div>
                           
                            <div class="mb-3">
                                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                    value="<?= $pemeriksaan_dry_store->nama_supplier ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    value="<?= $pemeriksaan_dry_store->nama_barang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mobil" class="form-label">Mobil</label>
                                <input type="text" class="form-control" id="mobil" name="mobil"
                                    value="<?= $pemeriksaan_dry_store->mobil ?>">
                            </div>

                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No Polisi</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                    value="<?= $pemeriksaan_dry_store->no_polisi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="identitas_pengantar" class="form-label">Identitas Pengantar</label>
                                <input type="text" class="form-control" id="identitas_pengantar"
                                    name="identitas_pengantar"
                                    value="<?= $pemeriksaan_dry_store->identitas_pengantar ?>">
                            </div>

                            <div class="mb-3">
                                <label for="segel" class="form-label">Segel</label>
                                <input type="text" class="form-control" id="segel" name="segel"
                                    value="<?= $pemeriksaan_dry_store->segel ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kebersihaan" class="form-label">Kebersihan</label>
                                <input type="text" class="form-control" id="kebersihaan" name="kebersihaan"
                                    value="<?= $pemeriksaan_dry_store->kebersihaan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="hama" class="form-label">Hama</label>
                                <input type="text" class="form-control" id="hama" name="hama"
                                    value="<?= $pemeriksaan_dry_store->hama ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                <input type="time" class="form-control" id="jam_masuk" name="jam_masuk"
                                    value="<?= $pemeriksaan_dry_store->jam_masuk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"
                                    value="<?= $pemeriksaan_dry_store->jam_keluar ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mulai_dicek" class="form-label">Mulai Dicek</label>
                                <input type="text" class="form-control" id="mulai_dicek" name="mulai_dicek"
                                    value="<?= $pemeriksaan_dry_store->mulai_dicek ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_dicek" class="form-label">Selesai Dicek</label>
                                <input type="text" class="form-control" id="selesai_dicek" name="selesai_dicek"
                                    value="<?= $pemeriksaan_dry_store->selesai_dicek ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pemeriksaan_dry_store->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pemeriksaan_dry_store->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_dry_store') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
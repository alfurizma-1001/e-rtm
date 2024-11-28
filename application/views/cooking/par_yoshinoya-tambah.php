<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Tambah</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('par_yoshinoya/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    placeholder="Masukkan Shift" required>
                            </div>
                            <div class="mb-3">
                                <label for="saus" class="form-label">Saus</label>
                                <input type="text" class="form-control" id="saus" name="saus"
                                    placeholder="Masukkan Saus" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                                <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Masukkan kode produksi" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="suhu_pengukuran" class="form-label">Suhu Pengukuran</label>
                                <input type="text" class="form-control" id="suhu_pengukuran" name="suhu_pengukuran"
                                    placeholder="Masukkan suhu pengukuran..." required>
                            </div>
                            <div class="mb-3">
                                <label for="brix" class="form-label">Brix</label>
                                <input type="text" class="form-control" id="brix" name="brix"
                                    placeholder="Masukkan nilai brix..." required>
                            </div>
                            <div class="mb-3">
                                <label for="salt" class="form-label">Salt</label>
                                <input type="text" class="form-control" id="salt" name="salt"
                                    placeholder="Masukkan nilai salt..." required>
                            </div>
                            <div class="mb-3">
                                <label for="viscositas" class="form-label">Viscositas</label>
                                <input type="text" class="form-control" id="viscositas" name="viscositas"
                                    placeholder="Masukkan nilai viscositas..." required>
                            </div>
                            <div class="mb-3">
                                <label for="brookfield" class="form-label">Brookfield</label>
                                <input type="text" class="form-control" id="brookfield" name="brookfield"
                                    placeholder="Masukkan nilai brookfield..." required>
                            </div>
                            <div class="mb-3">
                                <label for="brookfield_setelah_frozen" class="form-label">Brookfield Setelah
                                    Frozen</label>
                                <input type="text" class="form-control" id="brookfield_setelah_frozen"
                                    name="brookfield_setelah_frozen"
                                    placeholder="Masukkan nilai brookfield setelah frozen..." required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukkan catatan...">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('par_yoshinoya') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                            Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
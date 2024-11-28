<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Kontaminasi Benda Asing</h5>
            <div class="card-body">
                <form action="<?= base_url('kontaminasi_benda_asing/update/'.$kontaminasi_benda_asing->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $kontaminasi_benda_asing->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?= $kontaminasi_benda_asing->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($kontaminasi_benda_asing->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($kontaminasi_benda_asing->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($kontaminasi_benda_asing->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul" value="<?= $kontaminasi_benda_asing->pukul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kontaminasi_benda_asing" class="form-label">Jenis Kontaminasi Benda Asing</label>
                                <input type="text" class="form-control" id="jenis_kontaminasi_benda_asing" name="jenis_kontaminasi_benda_asing" value="<?= $kontaminasi_benda_asing->jenis_kontaminasi_benda_asing ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Bukti</label>
                                <input type="text" class="form-control" id="bukti" name="bukti" value="<?= $kontaminasi_benda_asing->bukti ?>">
                            </div>
                            <div class="mb-3">
                                <label for="produk" class="form-label">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" value="<?= $kontaminasi_benda_asing->produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" value="<?= $kontaminasi_benda_asing->kode_produksi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tahapan" class="form-label">Tahapan</label>
                                <input type="text" class="form-control" id="tahapan" name="tahapan" value="<?= $kontaminasi_benda_asing->tahapan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tindakan_koreksi" class="form-label">Tindakan Koreksi</label>
                                <input type="text" class="form-control" id="tindakan_koreksi" name="tindakan_koreksi" value="<?= $kontaminasi_benda_asing->tindakan_koreksi ?>">
                            </div>
                        
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $kontaminasi_benda_asing->catatan ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('kontaminasi_benda_asing') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

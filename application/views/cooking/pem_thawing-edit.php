<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Dengan thawing</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_thawing/update/' . $pem_thawing->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_thawing->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_thawing->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pem_thawing->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($pem_thawing->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($pem_thawing->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kondisi_ruangan" class="form-label">Kondisi Ruangan</label>
                                <input type="text" class="form-control" id="kondisi_ruangan" name="kondisi_ruangan"
                                    value="<?= $pem_thawing->kondisi_ruangan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk"
                                    value="<?= $pem_thawing->jenis_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    value="<?= $pem_thawing->jumlah ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pem_thawing->kode_produksi ?>">
                            </div>
                           
                            <div class="mb-3">
                                <label for="suhu_ruangan" class="form-label">Suhu Ruangan (°C)</label>
                                <input type="text" class="form-control" id="suhu_ruangan" name="suhu_ruangan"
                                    value="<?= $pem_thawing->suhu_ruangan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mulai_thawing_pukul" class="form-label">Mulai Thawing (Pukul)</label>
                                <input type="time" class="form-control" id="mulai_thawing_pukul"
                                    name="mulai_thawing_pukul" value="<?= $pem_thawing->mulai_thawing_pukul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="selesai_thawing_pukul" class="form-label">Selesai Thawing (Pukul)</label>
                                <input type="time" class="form-control" id="selesai_thawing_pukul"
                                    name="selesai_thawing_pukul" value="<?= $pem_thawing->selesai_thawing_pukul ?>">
                            </div>
                          
                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk (°C)</label>
                                <input type="text" class="form-control" id="suhu_produk" name="suhu_produk"
                                    value="<?= $pem_thawing->suhu_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan"
                                    name="catatan"><?= $pem_thawing->catatan ?></textarea>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_thawing') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
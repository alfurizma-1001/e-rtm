<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Tambah</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_thawing/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                       
                            <div class="mb-3">
                                <label for="kondisi_ruangan" class="form-label">Kondisi Ruangan</label>
                                <input type="text" class="form-control" id="kondisi_ruangan" name="kondisi_ruangan"
                                    placeholder="Masukkan Kondisi Ruangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk"
                                    placeholder="Masukkan Jenis Produk" required>
                            </div>
                            <h5 class="card-header">SEBELUM THAWING</h5>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Masukkan Jumlah Produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Masukkan Kode Produksi" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_ruangan" class="form-label">Suhu Ruangan (°C)</label>
                                <input type="text" class="form-control" id="suhu_ruangan" name="suhu_ruangan"
                                    placeholder="Masukkan Suhu Ruangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="mulai_thawing_pukul" class="form-label">Mulai Thawing Pukul</label>
                                <input type="time" class="form-control" id="mulai_thawing_pukul"
                                    name="mulai_thawing_pukul" placeholder="Masukkan Waktu Mulai Thawing" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header">SESUDAH THAWING</h5>

                            <div class="mb-3">
                                <label for="selesai_thawing_pukul" class="form-label">Selesai Thawing Pukul</label>
                                <input type="time" class="form-control" id="selesai_thawing_pukul"
                                    name="selesai_thawing_pukul" placeholder="Masukkan Waktu Selesai Thawing" required>
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk (°C)</label>
                                <input type="text" class="form-control" id="suhu_produk" name="suhu_produk"
                                    placeholder="Masukkan Suhu Produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukkan Catatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pem_thawing') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                            Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Loading Produk Untuk Lokal</h5>
            <div class="card-body">
                <form action="<?= base_url('loading_lokal/update/' . $loading_lokal->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $loading_lokal->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $loading_lokal->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($loading_lokal->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($loading_lokal->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($loading_lokal->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                        
                            <div class="mb-3">
                                <label for="mulai_loading" class="form-label">Mulai Loading</label>
                                <input type="date" class="form-control" id="mulai_loading" name="mulai_loading"
                                    value="<?= $loading_lokal->mulai_loading ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_loading" class="form-label">Selesai Loading</label>
                                <input type="date" class="form-control" id="selesai_loading" name="selesai_loading"
                                    value="<?= $loading_lokal->selesai_loading ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan"
                                    value="<?= $loading_lokal->jenis_kendaraan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan"
                                    value="<?= $loading_lokal->nomor_kendaraan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_ekspedisi" class="form-label">Nama Ekspedisi</label>
                                <input type="text" class="form-control" id="nama_ekspedisi" name="nama_ekspedisi"
                                    value="<?= $loading_lokal->nama_ekspedisi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_supir" class="form-label">Nama Supir</label>
                                <input type="text" class="form-control" id="nama_supir" name="nama_supir"
                                    value="<?= $loading_lokal->nama_supir ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim"
                                    value="<?= $loading_lokal->nama_pengirim ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tujuan_pengiriman" class="form-label">Tujuan Pengiriman</label>
                                <input type="text" class="form-control" id="tujuan_pengiriman" name="tujuan_pengiriman"
                                    value="<?= $loading_lokal->tujuan_pengiriman ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bersih" class="form-label">Bersih</label>
                                <input type="text" class="form-control" id="bersih" name="bersih"
                                    value="<?= $loading_lokal->bersih ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_berdebu" class="form-label">Tidak Berdebu</label>
                                <input type="text" class="form-control" id="tidak_berdebu" name="tidak_berdebu"
                                    value="<?= $loading_lokal->tidak_berdebu ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_pecah" class="form-label">Tidak Pecah</label>
                                <input type="text" class="form-control" id="tidak_pecah" name="tidak_pecah"
                                    value="<?= $loading_lokal->tidak_pecah ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bebas_hama" class="form-label">Bebas Hama</label>
                                <input type="text" class="form-control" id="bebas_hama" name="bebas_hama"
                                    value="<?= $loading_lokal->bebas_hama ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_kondensasi" class="form-label">Tidak Kondensasi</label>
                                <input type="text" class="form-control" id="tidak_kondensasi" name="tidak_kondensasi"
                                    value="<?= $loading_lokal->tidak_kondensasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pecah" class="form-label">Pecah</label>
                                <input type="text" class="form-control" id="pecah" name="pecah"
                                    value="<?= $loading_lokal->pecah ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bebabs_produk_nonhalal" class="form-label">Bebas Produk Nonhalal</label>
                                <input type="text" class="form-control" id="bebabs_produk_nonhalal"
                                    name="bebabs_produk_nonhalal" value="<?= $loading_lokal->bebabs_produk_nonhalal ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_ada_noda" class="form-label">Tidak Ada Noda</label>
                                <input type="text" class="form-control" id="tidak_ada_noda" name="tidak_ada_noda"
                                    value="<?= $loading_lokal->tidak_ada_noda ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pallet_utuh" class="form-label">Pallet Utuh</label>
                                <input type="text" class="form-control" id="pallet_utuh" name="pallet_utuh"
                                    value="<?= $loading_lokal->pallet_utuh ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_ada_sampah" class="form-label">Tidak Ada Sampah</label>
                                <input type="text" class="form-control" id="tidak_ada_sampah" name="tidak_ada_sampah"
                                    value="<?= $loading_lokal->tidak_ada_sampah ?>">
                            </div>

                            <div class="mb-3">
                                <label for="binatang" class="form-label">Binatang</label>
                                <input type="text" class="form-control" id="binatang" name="binatang"
                                    value="<?= $loading_lokal->binatang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jamur" class="form-label">Jamur</label>
                                <input type="text" class="form-control" id="jamur" name="jamur"
                                    value="<?= $loading_lokal->jamur ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $loading_lokal->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kondisi_produk" class="form-label">Kondisi Produk</label>
                                <input type="text" class="form-control" id="kondisi_produk" name="kondisi_produk"
                                    value="<?= $loading_lokal->kondisi_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kondisi_kemasanan" class="form-label">Kondisi Kemasanan</label>
                                <input type="text" class="form-control" id="kondisi_kemasanan" name="kondisi_kemasanan"
                                    value="<?= $loading_lokal->kondisi_kemasanan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $loading_lokal->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control" id="tanggal_kadaluarsa"
                                    name="tanggal_kadaluarsa" value="<?= $loading_lokal->tanggal_kadaluarsa ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $loading_lokal->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sanitasi_larutan" class="form-label">Sanitasi Larutan</label>
                                <input type="text" class="form-control" id="sanitasi_larutan" name="sanitasi_larutan"
                                    value="<?= $loading_lokal->sanitasi_larutan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ppm_sanitasi_larutan" class="form-label">PPM Sanitasi Larutan</label>
                                <input type="text" class="form-control" id="ppm_sanitasi_larutan"
                                    name="ppm_sanitasi_larutan" value="<?= $loading_lokal->ppm_sanitasi_larutan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="precooling" class="form-label">Precooling</label>
                                <input type="text" class="form-control" id="precooling" name="precooling"
                                    value="<?= $loading_lokal->precooling ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk</label>
                                <input type="number" class="form-control" id="suhu_produk" name="suhu_produk"
                                    value="<?= $loading_lokal->suhu_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_18" class="form-label">Suhu -18°C</label>
                                <input type="text" class="form-control" id="suhu_18" name="suhu_18"
                                    value="<?= $loading_lokal->suhu_18 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="segel_terpasang" class="form-label">Segel Terpasang</label>
                                <input type="text" class="form-control" id="segel_terpasang" name="segel_terpasang"
                                    value="<?= $loading_lokal->segel_terpasang ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lama_delay" class="form-label">Lama Delay</label>
                                <input type="text" class="form-control" id="lama_delay" name="lama_delay"
                                    value="<?= $loading_lokal->lama_delay ?>">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('loading_lokal') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
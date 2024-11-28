<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Loading Produk Untuk Lokal</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_masak_noodle/update/' . $pem_masak_noodle->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_masak_noodle->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_masak_noodle->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pem_masak_noodle->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($pem_masak_noodle->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($pem_masak_noodle->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pem_masak_noodle->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pem_masak_noodle->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mixing_bahan_utama" class="form-label">Mixing Bahan Utama</label>
                                <textarea class="form-control" id="mixing_bahan_utama"
                                    name="mixing_bahan_utama"><?= $pem_masak_noodle->mixing_bahan_utama ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="mixing_kode_produksi" class="form-label">Mixing Kode Produksi</label>
                                <textarea class="form-control" id="mixing_kode_produksi"
                                    name="mixing_kode_produksi"><?= $pem_masak_noodle->mixing_kode_produksi ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="mixing_berat" class="form-label">Mixing Berat</label>
                                <textarea class="form-control" id="mixing_berat"
                                    name="mixing_berat"><?= $pem_masak_noodle->mixing_berat ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain" class="form-label">Bahan Lain</label>
                                <textarea class="form-control" id="bahan_lain"
                                    name="bahan_lain"><?= $pem_masak_noodle->bahan_lain ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_produksi" class="form-label">Bahan Lain Kode
                                    Produksi</label>
                                <textarea class="form-control" id="bahan_lain_kode_produksi"
                                    name="bahan_lain_kode_produksi"><?= $pem_masak_noodle->bahan_lain_kode_produksi ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat" class="form-label">Bahan Lain Berat</label>
                                <textarea class="form-control" id="bahan_lain_berat"
                                    name="bahan_lain_berat"><?= $pem_masak_noodle->bahan_lain_berat ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_produksi_item2" class="form-label">Bahan Lain Kode
                                    Produksi Item 2</label>
                                <textarea class="form-control" id="bahan_lain_kode_produksi_item2"
                                    name="bahan_lain_kode_produksi_item2"><?= $pem_masak_noodle->bahan_lain_kode_produksi_item2 ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item2" class="form-label">Bahan Lain Berat Item 2</label>
                                <textarea class="form-control" id="bahan_lain_berat_item2"
                                    name="bahan_lain_berat_item2"><?= $pem_masak_noodle->bahan_lain_berat_item2 ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="waktu_proses" class="form-label">Waktu Proses</label>
                                <textarea class="form-control" id="waktu_proses"
                                    name="waktu_proses"><?= $pem_masak_noodle->waktu_proses ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="vacuum" class="form-label">Vacuum</label>
                                <textarea class="form-control" id="vacuum"
                                    name="vacuum"><?= $pem_masak_noodle->vacuum ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_adonan" class="form-label">Suhu Adonan</label>
                                <textarea class="form-control" id="suhu_adonan"
                                    name="suhu_adonan"><?= $pem_masak_noodle->suhu_adonan ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_waktu" class="form-label">Aging Waktu</label>
                                <textarea class="form-control" id="aging_waktu"
                                    name="aging_waktu"><?= $pem_masak_noodle->aging_waktu ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_rh" class="form-label">Aging RH</label>
                                <textarea class="form-control" id="aging_rh"
                                    name="aging_rh"><?= $pem_masak_noodle->aging_rh ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_suhu_ruangan" class="form-label">Aging Suhu Ruangan</label>
                                <textarea class="form-control" id="aging_suhu_ruangan"
                                    name="aging_suhu_ruangan"><?= $pem_masak_noodle->aging_suhu_ruangan ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rolling_ukuran_tebal" class="form-label">Rolling Ukuran Tebal</label>
                                <textarea class="form-control" id="rolling_ukuran_tebal"
                                    name="rolling_ukuran_tebal"><?= $pem_masak_noodle->rolling_ukuran_tebal ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cutting_sampling_berat" class="form-label">Cutting Sampling Berat</label>
                                <textarea class="form-control" id="cutting_sampling_berat"
                                    name="cutting_sampling_berat"><?= $pem_masak_noodle->cutting_sampling_berat ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_suhu_setting_water" class="form-label">Boiling Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="boiling_suhu_setting_water"
                                    name="boiling_suhu_setting_water"><?= $pem_masak_noodle->boiling_suhu_setting_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_suhu_actual_water" class="form-label">Boiling Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="boiling_suhu_actual_water"
                                    name="boiling_suhu_actual_water"><?= $pem_masak_noodle->boiling_suhu_actual_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_waktu" class="form-label">Boiling Waktu</label>
                                <textarea class="form-control" id="boiling_waktu"
                                    name="boiling_waktu"><?= $pem_masak_noodle->boiling_waktu ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_suhu_setting_water" class="form-label">Washing Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="washing_suhu_setting_water"
                                    name="washing_suhu_setting_water"><?= $pem_masak_noodle->washing_suhu_setting_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_suhu_actual_water" class="form-label">Washing Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="washing_suhu_actual_water"
                                    name="washing_suhu_actual_water"><?= $pem_masak_noodle->washing_suhu_actual_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_waktu" class="form-label">Washing Waktu</label>
                                <textarea class="form-control" id="washing_waktu"
                                    name="washing_waktu"><?= $pem_masak_noodle->washing_waktu ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cooling_suhu_setting_water" class="form-label">Cooling Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="cooling_suhu_setting_water"
                                    name="cooling_suhu_setting_water"><?= $pem_masak_noodle->cooling_suhu_setting_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cooling_suhu_actual_water" class="form-label">Cooling Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="cooling_suhu_actual_water"
                                    name="cooling_suhu_actual_water"><?= $pem_masak_noodle->cooling_suhu_actual_water ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cooling_waktu" class="form-label">Cooling Waktu</label>
                                <textarea class="form-control" id="cooling_waktu"
                                    name="cooling_waktu"><?= $pem_masak_noodle->cooling_waktu ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lama_proses_jam_mulai" class="form-label">Lama Proses Jam Mulai</label>
                                <textarea class="form-control" id="lama_proses_jam_mulai" name="lama_proses_jam_mulai"
                                    rows="1"
                                    placeholder="Enter start time for the process"><?= htmlspecialchars($pem_masak_noodle->lama_proses_jam_mulai) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lama_proses_jam_selesai" class="form-label">Lama Proses Jam Selesai</label>
                                <textarea class="form-control" id="lama_proses_jam_selesai"
                                    name="lama_proses_jam_selesai" rows="1"
                                    placeholder="Enter end time for the process"><?= htmlspecialchars($pem_masak_noodle->lama_proses_jam_selesai) ?></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="sensori_suhu_produk_akhir" class="form-label">Sensori Suhu Produk
                                    Akhir</label>
                                <textarea class="form-control" id="sensori_suhu_produk_akhir"
                                    name="sensori_suhu_produk_akhir"><?= $pem_masak_noodle->sensori_suhu_produk_akhir ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_suhu_produk_setelah" class="form-label">Sensori Suhu Produk
                                    Setelah</label>
                                <textarea class="form-control" id="sensori_suhu_produk_setelah"
                                    name="sensori_suhu_produk_setelah"><?= $pem_masak_noodle->sensori_suhu_produk_setelah ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_rasa" class="form-label">Sensori Rasa</label>
                                <textarea class="form-control" id="sensori_rasa"
                                    name="sensori_rasa"><?= $pem_masak_noodle->sensori_rasa ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_kekenyalan" class="form-label">Sensori Kekenyalan</label>
                                <textarea class="form-control" id="sensori_kekenyalan"
                                    name="sensori_kekenyalan"><?= $pem_masak_noodle->sensori_kekenyalan ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_warna" class="form-label">Sensori Warna</label>
                                <textarea class="form-control" id="sensori_warna"
                                    name="sensori_warna"><?= $pem_masak_noodle->sensori_warna ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_masak_noodle->catatan ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_masak_noodle') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
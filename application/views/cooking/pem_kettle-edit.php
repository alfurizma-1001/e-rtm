<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Produk Di Steam /Cooking Kettle</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_kettle/update/' . $pem_kettle->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_kettle->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_kettle->date ?>">
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">shift</label>
                                <input type="shift" class="form-control" id="shift" name="shift"
                                    value="<?= $pem_kettle->shift ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="nama_produk" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pem_kettle->nama_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <input type="jenis_produk" class="form-control" id="jenis_produk" name="jenis_produk"
                                    value="<?= $pem_kettle->jenis_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Jenis Produk</label>
                                <input type="kode_produksi" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pem_kettle->kode_produksi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="waktu_start_stop" class="form-label">Jenis Produk</label>
                                <input type="waktu_start_stop" class="form-control" id="waktu_start_stop"
                                    name="waktu_start_stop" value="<?= $pem_kettle->waktu_start_stop ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mesin" class="form-label">Mesin</label>
                                <input type="mesin" class="form-control" id="mesin" name="mesin"
                                    value="<?= $pem_kettle->mesin ?>">
                            </div>
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="text" class="form-control" id="waktu" name="waktu"
                                    value="<?= $pem_kettle->waktu ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tahapan_proses" class="form-label">Tahapan Proses</label>
                                <select class="form-control" id="tahapan_proses" name="tahapan_proses">
                                    <option value="Cooking & Stirring" <?= $pem_kettle->tahapan_proses == 'Cooking & Stirring' ? 'selected' : '' ?>>Cooking & Stirring</option>
                                    <option value="Finish" <?= $pem_kettle->tahapan_proses == 'Finish' ? 'selected' : '' ?>>Finish</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="formulasike" class="form-label">Formulasi Ke</label>
                                <select class="form-control" id="formulasike" name="formulasike">
                                    <option value=" " <?= $pem_kettle->formulasike == ' ' ? 'selected' : '' ?>> </option>
                                    <option value="Formulasi ke 1" <?= $pem_kettle->formulasike == 'Formulasi ke 1' ? 'selected' : '' ?>>Formulasi ke 1</option>
                                    <option value="Formulasi ke 2" <?= $pem_kettle->formulasike == 'Formulasi ke 2' ? 'selected' : '' ?>>Formulasi ke 2</option>
                                    <option value="Formulasi ke 3" <?= $pem_kettle->formulasike == 'Formulasi ke 3' ? 'selected' : '' ?>>Formulasi ke 3</option>
                                    <option value="Formulasi ke 4" <?= $pem_kettle->formulasike == 'Formulasi ke 4' ? 'selected' : '' ?>>Formulasi ke 4</option>
                                    <option value="Formulasi ke 5" <?= $pem_kettle->formulasike == 'Formulasi ke 5' ? 'selected' : '' ?>>Formulasi ke 5</option>
                                    <option value="Formulasi ke 6" <?= $pem_kettle->formulasike == 'Formulasi ke 6' ? 'selected' : '' ?>>Formulasi ke 6</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="jenis_bahan" class="form-label">Jenis Bahan</label>
                                <input type="text" class="form-control" id="jenis_bahan" name="jenis_bahan"
                                    value="<?= $pem_kettle->jenis_bahan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_standar" class="form-label">Jumlah Standar</label>
                                <input type="text" class="form-control" id="jumlah_standar" name="jumlah_standar"
                                    value="<?= $pem_kettle->jumlah_standar ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_aktual" class="form-label">Jumlah Aktual</label>
                                <input type="text" class="form-control" id="jumlah_aktual" name="jumlah_aktual"
                                    value="<?= $pem_kettle->jumlah_aktual ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sensori" class="form-label">Sensori</label>
                                <input type="text" class="form-control" id="sensori" name="sensori"
                                    value="<?= $pem_kettle->sensori ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lama_proses" class="form-label">Lama Proses</label>
                                <input type="text" class="form-control" id="lama_proses" name="lama_proses"
                                    value="<?= $pem_kettle->lama_proses ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mixing_paddle_on" class="form-label">Mixing Paddle On</label>
                                <input type="text" class="form-control" id="mixing_paddle_on" name="mixing_paddle_on"
                                    value="<?= $pem_kettle->mixing_paddle_on ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mixing_paddle_off" class="form-label">Mixing Paddle Off</label>
                                <input type="text" class="form-control" id="mixing_paddle_off" name="mixing_paddle_off"
                                    value="<?= $pem_kettle->mixing_paddle_off ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pressure" class="form-label">Pressure</label>
                                <input type="text" class="form-control" id="pressure" name="pressure"
                                    value="<?= $pem_kettle->pressure ?>">
                            </div>

                            <div class="mb-3">
                                <label for="temperature" class="form-label">Temperature</label>
                                <input type="text" class="form-control" id="temperature" name="temperature"
                                    value="<?= $pem_kettle->temperature ?>">
                            </div>

                            <div class="mb-3">
                                <label for="target_temperature" class="form-label">Target Temperature</label>
                                <input type="text" class="form-control" id="target_temperature"
                                    name="target_temperature" value="<?= $pem_kettle->target_temperature ?>">
                            </div>

                            <div class="mb-3">
                                <label for="actual_temperature" class="form-label">Actual Temperature</label>
                                <input type="text" class="form-control" id="actual_temperature"
                                    name="actual_temperature" value="<?= $pem_kettle->actual_temperature ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_pusat_produk" class="form-label">Suhu Pusat Produk</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk" name="suhu_pusat_produk"
                                    value="<?= $pem_kettle->suhu_pusat_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="organoleptik_warna" class="form-label">Organoleptik Warna</label>
                                <input type="text" class="form-control" id="organoleptik_warna"
                                    name="organoleptik_warna" value="<?= $pem_kettle->organoleptik_warna ?>">
                            </div>

                            <div class="mb-3">
                                <label for="organoleptik_aroma" class="form-label">Organoleptik Aroma</label>
                                <input type="text" class="form-control" id="organoleptik_aroma"
                                    name="organoleptik_aroma" value="<?= $pem_kettle->organoleptik_aroma ?>">
                            </div>

                            <div class="mb-3">
                                <label for="organoleptik_rasa" class="form-label">Organoleptik Rasa</label>
                                <input type="text" class="form-control" id="organoleptik_rasa" name="organoleptik_rasa"
                                    value="<?= $pem_kettle->organoleptik_rasa ?>">
                            </div>

                            <div class="mb-3">
                                <label for="organoleptik_tekstur" class="form-label">Organoleptik Tekstur</label>
                                <input type="text" class="form-control" id="organoleptik_tekstur"
                                    name="organoleptik_tekstur" value="<?= $pem_kettle->organoleptik_tekstur ?>">
                            </div>
                            <div class="mb-3">
                                <label for="catatan_kanan" class="form-label">Catatan Kanan</label>
                                <input type="text" class="form-control" id="catatan_kanan" name="catatan_kanan"
                                    value="<?= $pem_kettle->catatan_kanan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_kettle->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_kettle') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
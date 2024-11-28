<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cooking /</span> Pemeriksaan Pemasakan Produk Di
            Steam /Cooking Kettle Tambah</h4>
        <div class="card">
            <h5 class="card-header">Pemeriksaan Pemasakan Produk Di Steam /Cooking Kettle Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_kettle/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="" disabled selected>Pilih Shift</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu_start_stop" class="form-label">Tahapan (Start-Stop)</label>
                                <input type="text" class="form-control" id="waktu_start_stop" name="waktu_start_stop"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mesin" class="form-label">Mesin</label>
                                <input type="text" class="form-control" id="mesin" name="mesin" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tahapan_proses" class="form-label">Tahapan Proses</label>
                                <select class="form-control" id="tahapan_proses" name="tahapan_proses">
                                    <option value="Cooking & Stirring">Cooking & Stirring</option>
                                    <option value="Finish">Finish</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formulasike" class="form-label">Formulasi Ke</label>
                                <select class="form-control" id="formulasike" name="formulasike">
                                    <option value=""></option>
                                    <option value="Formulasi ke 1">Formulasi ke 1</option>
                                    <option value="Formulasi ke 2">Formulasi ke 2</option>
                                    <option value="Formulasi ke 3">Formulasi ke 3</option>
                                    <option value="Formulasi ke 4">Formulasi ke 4</option>
                                    <option value="Formulasi ke 5">Formulasi ke 5</option>
                                    <option value="Formulasi ke 6">Formulasi ke 6</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_bahan" class="form-label">Jenis Bahan</label>
                                <input type="text" class="form-control" id="jenis_bahan" name="jenis_bahan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_standar" class="form-label">Jumlah Standar</label>
                                <input type="text" class="form-control" id="jumlah_standar" name="jumlah_standar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_aktual" class="form-label">Jumlah Aktual</label>
                                <input type="text" class="form-control" id="jumlah_aktual" name="jumlah_aktual">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sensori" class="form-label">Sensori</label>
                                <input type="text" class="form-control" id="sensori" name="sensori">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lama_proses" class="form-label">Lama Proses</label>
                                <input type="text" class="form-control" id="lama_proses" name="lama_proses">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mixing_paddle_on" class="form-label">Mixing Paddle On</label>
                                <input type="text" class="form-control" id="mixing_paddle_on" name="mixing_paddle_on">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mixing_paddle_off" class="form-label">Mixing Paddle Off</label>
                                <input type="text" class="form-control" id="mixing_paddle_off" name="mixing_paddle_off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pressure" class="form-label">Pressure</label>
                                <input type="text" class="form-control" id="pressure" name="pressure">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="temperature" class="form-label">Temperature</label>
                                <input type="text" class="form-control" id="temperature" name="temperature">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="target_temperature" class="form-label">Target Temperature</label>
                                <input type="text" class="form-control" id="target_temperature"
                                    name="target_temperature">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="actual_temperature" class="form-label">Actual Temperature</label>
                                <input type="text" class="form-control" id="actual_temperature"
                                    name="actual_temperature">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="suhu_pusat_produk" class="form-label">Suhu Pusat Produk</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk" name="suhu_pusat_produk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="organoleptik_warna" class="form-label">Organoleptik Warna</label>
                                <input type="text" class="form-control" id="organoleptik_warna"
                                    name="organoleptik_warna">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="organoleptik_aroma" class="form-label">Organoleptik Aroma</label>
                                <input type="text" class="form-control" id="organoleptik_aroma"
                                    name="organoleptik_aroma">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="organoleptik_rasa" class="form-label">Organoleptik Rasa</label>
                                <input type="text" class="form-control" id="organoleptik_rasa" name="organoleptik_rasa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="organoleptik_tekstur" class="form-label">Organoleptik Tekstur</label>
                                <input type="text" class="form-control" id="organoleptik_tekstur"
                                    name="organoleptik_tekstur">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="catatan_kanan" class="form-label">Catatan Kanan</label>
                                <input type="text" class="form-control" id="catatan_kanan" name="catatan_kanan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan">
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                            <a href="<?= base_url('pem_kettle') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                                Batal</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
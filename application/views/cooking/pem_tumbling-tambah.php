<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Tambah</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_tumbling/tambah') ?>" method="post">
                    <h5>SECTION 1</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    placeholder="Masukkan Tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    placeholder="Masukkan Shift">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="batch_no" class="form-label">Batch No</label>
                                <input type="text" class="form-control" id="batch_no" name="batch_no"
                                    placeholder="Masukkan Batch No Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="identifikasi_daging" class="form-label">Identifikasi Daging</label>
                                <input type="text" class="form-control" id="identifikasi_daging"
                                    name="identifikasi_daging" placeholder="Masukkan Identifikasi Daging Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal</label>
                                <input type="text" class="form-control" id="asal" name="asal"
                                    placeholder="Masukkan Asal Max 4 Pakai Koma">
                            </div>

                            <!-- Kode Item -->
                            <div class="mb-3">
                                <label for="kode_item_1" class="form-label">Kode Item 1</label>
                                <input type="text" class="form-control" id="kode_item_1" name="kode_item_1"
                                    placeholder="Masukkan Kode Item 1 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_2" class="form-label">Kode Item 2</label>
                                <input type="text" class="form-control" id="kode_item_2" name="kode_item_2"
                                    placeholder="Masukkan Kode Item 2 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_3" class="form-label">Kode Item 3</label>
                                <input type="text" class="form-control" id="kode_item_3" name="kode_item_3"
                                    placeholder="Masukkan Kode Item 3 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_4" class="form-label">Kode Item 4</label>
                                <input type="text" class="form-control" id="kode_item_4" name="kode_item_4"
                                    placeholder="Masukkan Kode Item 4 Max 3 Pakai Koma">
                            </div>

                            <!-- Berat Item -->
                            <div class="mb-3">
                                <label for="berat_item_1" class="form-label">Berat Item 1</label>
                                <input type="text" class="form-control" id="berat_item_1" name="berat_item_1"
                                    placeholder="Masukkan Berat Item 1 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_2" class="form-label">Berat Item 2</label>
                                <input type="text" class="form-control" id="berat_item_2" name="berat_item_2"
                                    placeholder="Masukkan Berat Item 2 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_3" class="form-label">Berat Item 3</label>
                                <input type="text" class="form-control" id="berat_item_3" name="berat_item_3"
                                    placeholder="Masukkan Berat Item 3 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_4" class="form-label">Berat Item 4</label>
                                <input type="text" class="form-control" id="berat_item_4" name="berat_item_4"
                                    placeholder="Masukkan Berat Item 4 Max 3 Pakai Koma">
                            </div>

                            <!-- Suhu Daging -->
                            <div class="mb-3">
                                <label for="suhu_daging_item_1" class="form-label">Suhu Daging Item 1</label>
                                <input type="text" class="form-control" id="suhu_daging_item_1"
                                    name="suhu_daging_item_1" placeholder="Masukkan Suhu Daging Item 1 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_2" class="form-label">Suhu Daging Item 2</label>
                                <input type="text" class="form-control" id="suhu_daging_item_2"
                                    name="suhu_daging_item_2" placeholder="Masukkan Suhu Daging Item 2 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_3" class="form-label">Suhu Daging Item 3</label>
                                <input type="text" class="form-control" id="suhu_daging_item_3"
                                    name="suhu_daging_item_3" placeholder="Masukkan Suhu Daging Item 3 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_4" class="form-label">Suhu Daging Item 4</label>
                                <input type="text" class="form-control" id="suhu_daging_item_4"
                                    name="suhu_daging_item_4" placeholder="Masukkan Suhu Daging Item 4 Max 12 Pakai Koma">
                            </div>

                            <div class="mb-3">
                                <label for="rata_rata_item_1" class="form-label">Rata-rata Item 1</label>
                                <input type="text" class="form-control" id="rata_rata_item_1" name="rata_rata_item_1"
                                    placeholder="Masukkan Rata-rata Item 1 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="rata_rata_item_2" class="form-label">Rata-rata Item 2</label>
                                <input type="text" class="form-control" id="rata_rata_item_2" name="rata_rata_item_2"
                                    placeholder="Masukkan Rata-rata Item 2 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="rata_rata_item_3" class="form-label">Rata-rata Item 3</label>
                                <input type="text" class="form-control" id="rata_rata_item_3" name="rata_rata_item_3"
                                    placeholder="Masukkan Rata-rata Item 3 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="rata_rata_item_4" class="form-label">Rata-rata Item 4</label>
                                <input type="text" class="form-control" id="rata_rata_item_4" name="rata_rata_item_4"
                                    placeholder="Masukkan Rata-rata Item 4 Max 3 Pakai Koma">
                            </div>

                            <!-- Kondisi Daging -->
                            <div class="mb-3">
                                <label for="kondisi_daging" class="form-label">Kondisi Daging</label>
                                <input type="text" class="form-control" id="kondisi_daging" name="kondisi_daging"
                                    placeholder="Masukkan Kondisi Daging Max 4 Pakai Koma">
                            </div>

                            <!-- Marinade Bahan Utama -->
                            <div class="mb-3">
                                <label for="marinade_bahan_utama_1" class="form-label">Marinade Bahan Utama 1</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_1"
                                    name="marinade_bahan_utama_1" placeholder="Masukkan Marinade Bahan Utama 1 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_bahan_utama_2" class="form-label">Marinade Bahan Utama 2</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_2"
                                    name="marinade_bahan_utama_2" placeholder="Masukkan Marinade Bahan Utama 2 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_bahan_utama_3" class="form-label">Marinade Bahan Utama 3</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_3"
                                    name="marinade_bahan_utama_3" placeholder="Masukkan Marinade Bahan Utama 3 Max 3 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_bahan_utama_4" class="form-label">Marinade Bahan Utama 4</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_4"
                                    name="marinade_bahan_utama_4" placeholder="Masukkan Marinade Bahan Utama 4 Max 3 Pakai Koma">
                            </div>

                            <!-- Marinade Kode -->
                            <div class="mb-3">
                                <label for="marinade_kode_1" class="form-label">Marinade Kode 1</label>
                                <input type="text" class="form-control" id="marinade_kode_1" name="marinade_kode_1"
                                    placeholder="Masukkan Marinade Kode 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_2" class="form-label">Marinade Kode 2</label>
                                <input type="text" class="form-control" id="marinade_kode_2" name="marinade_kode_2"
                                    placeholder="Masukkan Marinade Kode 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_3" class="form-label">Marinade Kode 3</label>
                                <input type="text" class="form-control" id="marinade_kode_3" name="marinade_kode_3"
                                    placeholder="Masukkan Marinade Kode 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_4" class="form-label">Marinade Kode 4</label>
                                <input type="text" class="form-control" id="marinade_kode_4" name="marinade_kode_4"
                                    placeholder="Masukkan Marinade Kode 4 Max 6 Pakai Koma">
                            </div>

                            <!-- Marinade Berat -->
                            <div class="mb-3">
                                <label for="marinade_berat_1" class="form-label">Marinade Berat 1</label>
                                <input type="text" class="form-control" id="marinade_berat_1" name="marinade_berat_1"
                                    placeholder="Masukkan Marinade Berat 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_2" class="form-label">Marinade Berat 2</label>
                                <input type="text" class="form-control" id="marinade_berat_2" name="marinade_berat_2"
                                    placeholder="Masukkan Marinade Berat 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_3" class="form-label">Marinade Berat 3</label>
                                <input type="text" class="form-control" id="marinade_berat_3" name="marinade_berat_3"
                                    placeholder="Masukkan Marinade Berat 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_4" class="form-label">Marinade Berat 4</label>
                                <input type="text" class="form-control" id="marinade_berat_4" name="marinade_berat_4"
                                    placeholder="Masukkan Marinade Berat 4 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_next_1" class="form-label">Marinade Kode Next 1</label>
                                <input type="text" class="form-control" id="marinade_kode_next_1"
                                    name="marinade_kode_next_1" placeholder="Masukkan Marinade Kode Next 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_next_2" class="form-label">Marinade Kode Next 2</label>
                                <input type="text" class="form-control" id="marinade_kode_next_2 "
                                    name="marinade_kode_next_2" placeholder="Masukkan Marinade Kode Next 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_next_3" class="form-label">Marinade Kode Next 3</label>
                                <input type="text" class="form-control" id="marinade_kode_next_3"
                                    name="marinade_kode_next_3" placeholder="Masukkan Marinade Kode Next 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_kode_next_4" class="form-label">Marinade Kode Next 4</label>
                                <input type="text" class="form-control" id="marinade_kode_next_4"
                                    name="marinade_kode_next_4" placeholder="Masukkan Marinade Kode Next 4 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_next_1" class="form-label">Marinade Berat Next 1</label>
                                <input type="text" class="form-control" id="marinade_berat_next_1"
                                    name="marinade_berat_next_1" placeholder="Masukkan Marinade Berat Next 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_next_2" class="form-label">Marinade Berat Next 2</label>
                                <input type="text" class="form-control" id="marinade_berat_next_2"
                                    name="marinade_berat_next_2" placeholder="Masukkan Marinade Berat Next 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_next_3" class="form-label">Marinade Berat Next 3</label>
                                <input type="text" class="form-control" id="marinade_berat_next_3"
                                    name="marinade_berat_next_3" placeholder="Masukkan Marinade Berat Next 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="marinade_berat_next_4" class="form-label">Marinade Berat Next 4</label>
                                <input type="text" class="form-control" id="marinade_berat_next_4"
                                    name="marinade_berat_next_4" placeholder="Masukkan Marinade Berat Next 4 Max 6 Pakai Koma">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bahan_lain" class="form-label">Bahan Lain</label>
                                <input type="text" class="form-control" id="bahan_lain" name="bahan_lain"
                                    placeholder="Masukkan Bahan Lain Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_1" class="form-label">Bahan Lain Kode Item 1</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_1"
                                    name="bahan_lain_kode_item_1" placeholder="Masukkan Bahan Lain Kode Item 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_1" class="form-label">Bahan Lain Berat Item 1</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_1"
                                    name="bahan_lain_berat_item_1" placeholder="Masukkan Bahan Lain Berat Item 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_1" class="form-label">Bahan Lain Sensori Item
                                    1</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_1"
                                    name="bahan_lain_sensori_item_1" placeholder="Masukkan Bahan Lain Sensori Item 1 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_2" class="form-label">Bahan Lain Kode Item 2</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_2"
                                    name="bahan_lain_kode_item_2" placeholder="Masukkan Bahan Lain Kode Item 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_2" class="form-label">Bahan Lain Berat Item 2</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_2"
                                    name="bahan_lain_berat_item_2" placeholder="Masukkan Bahan Lain Berat Item 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_2" class="form-label">Bahan Lain Sensori Item
                                    2</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_2"
                                    name="bahan_lain_sensori_item_2" placeholder="Masukkan Bahan Lain Sensori Item 2 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_3" class="form-label">Bahan Lain Kode Item 3</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_3"
                                    name="bahan_lain_kode_item_3" placeholder="Masukkan Bahan Lain Kode Item 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_3" class="form-label">Bahan Lain Berat Item 3</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_3"
                                    name="bahan_lain_berat_item_3" placeholder="Masukkan Bahan Lain Berat Item 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_3" class="form-label">Bahan Lain Sensori Item
                                    3</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_3"
                                    name="bahan_lain_sensori_item_3" placeholder="Masukkan Bahan Lain Sensori Item 3 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_4" class="form-label">Bahan Lain Kode Item 4</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_4"
                                    name="bahan_lain_kode_item_4" placeholder="Masukkan Bahan Lain Kode Item 4 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_4" class="form-label">Bahan Lain Berat Item 4</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_4"
                                    name="bahan_lain_berat_item_4" placeholder="Masukkan Bahan Lain Berat Item 4 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_4" class="form-label">Bahan Lain Sensori Item
                                    4</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_4"
                                    name="bahan_lain_sensori_item_4" placeholder="Masukkan Bahan Lain Sensori Item 4 Max 6 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="air" class="form-label">Air</label>
                                <input type="text" class="form-control" id="air" name="air" placeholder="Masukkan Air Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_air" class="form-label">Suhu Air</label>
                                <input type="text" class="form-control" id="suhu_air" name="suhu_air"
                                    placeholder="Masukkan Suhu Air">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_marinade" class="form-label">Suhu Marinade</label>
                                <input type="text" class="form-control" id="suhu_marinade" name="suhu_marinade"
                                    placeholder="Masukkan Suhu Marinade Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="lama_pengadukan" class="form-label">Lama Pengadukan</label>
                                <input type="text" class="form-control" id="lama_pengadukan" name="lama_pengadukan"
                                    placeholder="Masukkan Lama Pengadukan Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="brix_salinity" class="form-label">Brix Salinity</label>
                                <input type="text" class="form-control" id="brix_salinity" name="brix_salinity"
                                    placeholder="Masukkan Brix Salinity Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="drum_on" class="form-label">Drum On</label>
                                <input type="text" class="form-control" id="drum_on" name="drum_on"
                                    placeholder="Masukkan Drum On Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="drum_off" class="form-label">Drum Off</label>
                                <input type="text" class="form-control" id="drum_off" name="drum_off"
                                    placeholder="Masukkan Drum Off Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="drum_speed" class="form-label">Drum Speed</label>
                                <input type="text" class="form-control" id="drum_speed" name="drum_speed"
                                    placeholder="Masukkan Drum Speed Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="vacuum_time" class="form-label">Vacuum Time</label>
                                <input type="text" class="form-control" id="vacuum_time" name="vacuum_time"
                                    placeholder="Masukkan Vacuum Time Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="total_time" class="form-label">Total Time</label>
                                <input type="text" class="form-control" id="total_time" name="total_time"
                                    placeholder="Masukkan Total Time Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="mulai_item_1" class="form-label">Mulai Item 1</label>
                                <input type="text" class="form-control" id="mulai_item_1" name="mulai_item_1"
                                    placeholder="Masukkan Mulai Item 1 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="mulai_item_2" class="form-label">Mulai Item 2</label>
                                <input type="text" class="form-control" id="mulai_item_2" name="mulai_item_2"
                                    placeholder="Masukkan Mulai Item 2 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="mulai_item_3" class="form-label">Mulai Item 3</label>
                                <input type="text" class="form-control" id="mulai_item_3" name="mulai_item_3"
                                    placeholder="Masukkan Mulai Item 3 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="mulai_item_4" class="form-label">Mulai Item 4</label>
                                <input type="text" class="form-control" id="mulai_item_4" name="mulai_item_4"
                                    placeholder="Masukkan Mulai Item 4 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="selesai_item_1" class="form-label">Selesai Item 1</label>
                                <input type="text" class="form-control" id="selesai_item_1" name="selesai_item_1"
                                    placeholder="Masukkan Selesai Item 1 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="selesai_item_2" class="form-label">Selesai Item 2</label>
                                <input type="text" class="form-control" id="selesai_item_2" name="selesai_item_2"
                                    placeholder="Masukkan Selesai Item 2 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="selesai_item_3" class="form-label">Selesai Item 3</label>
                                <input type="text" class="form-control" id="selesai_item_3" name="selesai_item_3"
                                    placeholder="Masukkan Selesai Item 3 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="selesai_item_4" class="form-label">Selesai Item 4</label>
                                <input type="text" class="form-control" id="selesai_item_4" name="selesai_item_4"
                                    placeholder="Masukkan Selesai Item 4 Max 2 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_1" class="form-label">Tumbling Suhu Daging Item
                                    1</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_1"
                                    name="tumbling_suhu_daging_item_1"
                                    placeholder="Masukkan Tumbling Suhu Daging Item 1 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_2" class="form-label">Tumbling Suhu Daging Item
                                    2</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_2"
                                    name="tumbling_suhu_daging_item_2"
                                    placeholder="Masukkan Tumbling Suhu Daging Item 2 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_3" class="form-label">Tumbling Suhu Daging Item
                                    3</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_3"
                                    name="tumbling_suhu_daging_item_3"
                                    placeholder="Masukkan Tumbling Suhu Daging Item 3 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_4" class="form-label">Tumbling Suhu Daging Item
                                    4</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_4"
                                    name="tumbling_suhu_daging_item_4"
                                    placeholder="Masukkan Tumbling Suhu Daging Item 4 Max 12 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="tumbling_rata_rata" class="form-label">Tumbling Rata-Rata</label>
                                <input type="text" class="form-control" id="tumbling_rata_rata"
                                    name="tumbling_rata_rata" placeholder="Masukkan Tumbling Rata-Rata Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="kondisi" class="form-label">Kondisi</label>
                                <input type="text" class="form-control" id="kondisi" name="kondisi"
                                    placeholder="Masukkan Kondisi Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="catatan_bawah" class="form-label">Catatan Bawah</label>
                                <input type="text" class="form-control" id="catatan_bawah" name="catatan_bawah"
                                    placeholder="Masukkan Catatan Bawah Max 4 Pakai Koma">
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukkan Catatan">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pem_tumbling') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                            Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<script>
    function syncInput(sourceId, targetId) {
        // Get the value of the source input
        const sourceValue = document.getElementById(sourceId).value;
        // Set the value of the target input
        document.getElementById(targetId).value = sourceValue;
    }
</script>
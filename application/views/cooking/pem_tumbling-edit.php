<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Dengan Tumbling</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_tumbling/update/' . $pem_tumbling->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_tumbling->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_tumbling->date ?>">
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    value="<?= $pem_tumbling->shift ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pem_tumbling->nama_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="batch_no" class="form-label">Batch No</label>
                                <input type="text" class="form-control" id="batch_no" name="batch_no"
                                    value="<?= $pem_tumbling->batch_no ?>">
                            </div>
                            <div class="mb-3">
                                <label for="identifikasi_daging" class="form-label">Identifikasi Daging</label>
                                <input type="text" class="form-control" id="identifikasi_daging"
                                    name="identifikasi_daging" value="<?= $pem_tumbling->identifikasi_daging ?>">
                            </div>
                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal</label>
                                <input type="text" class="form-control" id="asal" name="asal"
                                    value="<?= $pem_tumbling->asal ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_1" class="form-label">Kode Item 1</label>
                                <input type="text" class="form-control" id="kode_item_1" name="kode_item_1"
                                    value="<?= $pem_tumbling->kode_item_1 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_2" class="form-label">Kode Item 2</label>
                                <input type="text" class="form-control" id="kode_item_2" name="kode_item_2"
                                    value="<?= $pem_tumbling->kode_item_2 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_3" class="form-label">Kode Item 3</label>
                                <input type="text" class="form-control" id="kode_item_3" name="kode_item_3"
                                    value="<?= $pem_tumbling->kode_item_3 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kode_item_4" class="form-label">Kode Item 4</label>
                                <input type="text" class="form-control" id="kode_item_4" name="kode_item_4"
                                    value="<?= $pem_tumbling->kode_item_4 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_1" class="form-label">Berat Item 1</label>
                                <input type="text" class="form-control" id="berat_item_1" name="berat_item_1"
                                    value="<?= $pem_tumbling->berat_item_1 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_2" class="form-label">Berat Item 2</label>
                                <input type="text" class="form-control" id="berat_item_2" name="berat_item_2"
                                    value="<?= $pem_tumbling->berat_item_2 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_3" class="form-label">Berat Item 3</label>
                                <input type="text" class="form-control" id="berat_item_3" name="berat_item_3"
                                    value="<?= $pem_tumbling->berat_item_3 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="berat_item_4" class="form-label">Berat Item 4</label>
                                <input type="text" class="form-control" id="berat_item_4" name="berat_item_4"
                                    value="<?= $pem_tumbling->berat_item_4 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_1" class="form-label">Suhu Daging Item 1</label>
                                <input type="text" class="form-control" id="suhu_daging_item_1"
                                    name="suhu_daging_item_1" value="<?= $pem_tumbling->suhu_daging_item_1 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_2" class="form-label">Suhu Daging Item 2</label>
                                <input type="text" class="form-control" id="suhu_daging_item_2"
                                    name="suhu_daging_item_2" value="<?= $pem_tumbling->suhu_daging_item_2 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_3" class="form-label">Suhu Daging Item 3</label>
                                <input type="text" class="form-control" id="suhu_daging_item_3"
                                    name="suhu_daging_item_3" value="<?= $pem_tumbling->suhu_daging_item_3 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_daging_item_4" class="form-label">Suhu Daging Item 4</label>
                                <input type="text" class="form-control" id="suhu_daging_item_4"
                                    name="suhu_daging_item_4" value="<?= $pem_tumbling->suhu_daging_item_4 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="rata_rata_item_1" class="form-label">Rata-rata Item 1</label>
                                <input type="text" class="form-control" id="rata_rata_item_1" name="rata_rata_item_1"
                                    value="<?= $pem_tumbling->rata_rata_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rata_rata_item_2" class="form-label">Rata-rata Item 2</label>
                                <input type="text" class="form-control" id="rata_rata_item_2" name="rata_rata_item_2"
                                    value="<?= $pem_tumbling->rata_rata_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rata_rata_item_3" class="form-label">Rata-rata Item 3</label>
                                <input type="text" class="form-control" id="rata_rata_item_3" name="rata_rata_item_3"
                                    value="<?= $pem_tumbling->rata_rata_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rata_rata_item_4" class="form-label">Rata-rata Item 4</label>
                                <input type="text" class="form-control" id="rata_rata_item_4" name="rata_rata_item_4"
                                    value="<?= $pem_tumbling->rata_rata_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kondisi_daging" class="form-label">Kondisi Daging</label>
                                <input type="text" class="form-control" id="kondisi_daging" name="kondisi_daging"
                                    value="<?= $pem_tumbling->kondisi_daging ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_bahan_utama_1" class="form-label">Marinade Bahan Utama 1</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_1"
                                    name="marinade_bahan_utama_1" value="<?= $pem_tumbling->marinade_bahan_utama_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_bahan_utama_2" class="form-label">Marinade Bahan Utama 2</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_2"
                                    name="marinade_bahan_utama_2" value="<?= $pem_tumbling->marinade_bahan_utama_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_bahan_utama_3" class="form-label">Marinade Bahan Utama 3</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_3"
                                    name="marinade_bahan_utama_3" value="<?= $pem_tumbling->marinade_bahan_utama_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_bahan_utama_4" class="form-label">Marinade Bahan Utama 4</label>
                                <input type="text" class="form-control" id="marinade_bahan_utama_4"
                                    name="marinade_bahan_utama_4" value="<?= $pem_tumbling->marinade_bahan_utama_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_1" class="form-label">Marinade Kode 1</label>
                                <input type="text" class="form-control" id="marinade_kode_1" name="marinade_kode_1"
                                    value="<?= $pem_tumbling->marinade_kode_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_2" class="form-label">Marinade Kode 2</label>
                                <input type="text" class="form-control" id="marinade_kode_2" name="marinade_kode_2"
                                    value="<?= $pem_tumbling->marinade_kode_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_3" class="form-label">Marinade Kode 3</label>
                                <input type="text" class="form-control" id="marinade_kode_3" name="marinade_kode_3"
                                    value="<?= $pem_tumbling->marinade_kode_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_4" class="form-label">Marinade Kode 4</label>
                                <input type="text" class="form-control" id="marinade_kode_4" name="marinade_kode_4"
                                    value="<?= $pem_tumbling->marinade_kode_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_1" class="form-label">Marinade Berat 1</label>
                                <input type="text" class="form-control" id="marinade_berat_1" name="marinade_berat_1"
                                    value="<?= $pem_tumbling->marinade_berat_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_2" class="form-label">Marinade Berat 2</label>
                                <input type="text" class="form-control" id="marinade_berat_2" name="marinade_berat_2"
                                    value="<?= $pem_tumbling->marinade_berat_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_3" class="form-label">Marinade Berat 3</label>
                                <input type="text" class="form-control" id="marinade_berat_3" name="marinade_berat_3"
                                    value="<?= $pem_tumbling->marinade_berat_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_4" class="form-label">Marinade Berat 4</label>
                                <input type="text" class="form-control" id="marinade_berat_4" name="marinade_berat_4"
                                    value="<?= $pem_tumbling->marinade_berat_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_next_1" class="form-label">Marinade Kode Next 1</label>
                                <input type="text" class="form-control" id="marinade_kode_next_1"
                                    name="marinade_kode_next_1" value="<?= $pem_tumbling->marinade_kode_next_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_next_2" class="form-label">Marinade Kode Next 2</label>
                                <input type="text" class="form-control" id="marinade_kode_next_2"
                                    name="marinade_kode_next_2" value="<?= $pem_tumbling->marinade_kode_next_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_next_3" class="form-label">Marinade Kode Next 3</label>
                                <input type="text" class="form-control" id="marinade_kode_next_3"
                                    name="marinade_kode_next_3" value="<?= $pem_tumbling->marinade_kode_next_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_kode_next_4" class="form-label">Marinade Kode Next 4</label>
                                <input type="text" class="form-control" id="marinade_kode_next_4"
                                    name="marinade_kode_next_4" value="<?= $pem_tumbling->marinade_kode_next_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_next_1" class="form-label">Marinade Berat Next 1</label>
                                <input type="text" class="form-control" id="marinade_berat_next_1"
                                    name="marinade_berat_next_1" value="<?= $pem_tumbling->marinade_berat_next_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_next_2" class="form-label">Marinade Berat Next 2</label>
                                <input type="text" class="form-control" id="marinade_berat_next_2"
                                    name="marinade_berat_next_2" value="<?= $pem_tumbling->marinade_berat_next_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_next_3" class="form-label">Marinade Berat Next 3</label>
                                <input type="text" class="form-control" id="marinade_berat_next_3"
                                    name="marinade_berat_next_3" value="<?= $pem_tumbling->marinade_berat_next_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="marinade_berat_next_4" class="form-label">Marinade Berat Next 4</label>
                                <input type="text" class="form-control" id="marinade_berat_next_4"
                                    name="marinade_berat_next_4" value="<?= $pem_tumbling->marinade_berat_next_4 ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bahan_lain" class="form-label">Bahan Lain</label>
                                <input type="text" class="form-control" id="bahan_lain" name="bahan_lain"
                                    value="<?= $pem_tumbling->bahan_lain ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_1" class="form-label">Bahan Lain Kode Item 1</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_1"
                                    name="bahan_lain_kode_item_1" value="<?= $pem_tumbling->bahan_lain_kode_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_1" class="form-label">Bahan Lain Berat Item 1</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_1"
                                    name="bahan_lain_berat_item_1"
                                    value="<?= $pem_tumbling->bahan_lain_berat_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_1" class="form-label">Bahan Lain Sensori Item
                                    1</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_1"
                                    name="bahan_lain_sensori_item_1"
                                    value="<?= $pem_tumbling->bahan_lain_sensori_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_2" class="form-label">Bahan Lain Kode Item 2</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_2"
                                    name="bahan_lain_kode_item_2" value="<?= $pem_tumbling->bahan_lain_kode_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_2" class="form-label">Bahan Lain Berat Item 2</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_2"
                                    name="bahan_lain_berat_item_2"
                                    value="<?= $pem_tumbling->bahan_lain_berat_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_2" class="form-label">Bahan Lain Sensori Item
                                    2</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_2"
                                    name="bahan_lain_sensori_item_2"
                                    value="<?= $pem_tumbling->bahan_lain_sensori_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_3" class="form-label">Bahan Lain Kode Item 3</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_3"
                                    name="bahan_lain_kode_item_3" value="<?= $pem_tumbling->bahan_lain_kode_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_3" class="form-label">Bahan Lain Berat Item 3</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_3"
                                    name="bahan_lain_berat_item_3"
                                    value="<?= $pem_tumbling->bahan_lain_berat_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_3" class="form-label">Bahan Lain Sensori Item
                                    3</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_3"
                                    name="bahan_lain_sensori_item_3"
                                    value="<?= $pem_tumbling->bahan_lain_sensori_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_item_4" class="form-label">Bahan Lain Kode Item 4</label>
                                <input type="text" class="form-control" id="bahan_lain_kode_item_4"
                                    name="bahan_lain_kode_item_4" value="<?= $pem_tumbling->bahan_lain_kode_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item_4" class="form-label">Bahan Lain Berat Item 4</label>
                                <input type="text" class="form-control" id="bahan_lain_berat_item_4"
                                    name="bahan_lain_berat_item_4"
                                    value="<?= $pem_tumbling->bahan_lain_berat_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_sensori_item_4" class="form-label">Bahan Lain Sensori Item
                                    4</label>
                                <input type="text" class="form-control" id="bahan_lain_sensori_item_4"
                                    name="bahan_lain_sensori_item_4"
                                    value="<?= $pem_tumbling->bahan_lain_sensori_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="air" class="form-label">Air</label>
                                <input type="text" class="form-control" id="air" name="air"
                                    value="<?= $pem_tumbling->air ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_air" class="form-label">Suhu Air</label>
                                <input type="text" class="form-control" id="suhu_air" name="suhu_air"
                                    value="<?= $pem_tumbling->suhu_air ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_marinade" class="form-label">Suhu Marinade</label>
                                <input type="text" class="form-control" id="suhu_marinade" name="suhu_marinade"
                                    value="<?= $pem_tumbling->suhu_marinade ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lama_pengadukan" class="form-label">Lama Pengadukan</label>
                                <input type="text" class="form-control" id="lama_pengadukan" name="lama_pengadukan"
                                    value="<?= $pem_tumbling->lama_pengadukan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="brix_salinity" class="form-label">Brix Salinity</label>
                                <input type="text" class="form-control" id="brix_salinity" name="brix_salinity"
                                    value="<?= $pem_tumbling->brix_salinity ?>">
                            </div>

                            <div class="mb-3">
                                <label for="drum_on" class="form-label">Drum On</label>
                                <input type="text" class="form-control" id="drum_on" name="drum_on"
                                    value="<?= $pem_tumbling->drum_on ?>">
                            </div>

                            <div class="mb-3">
                                <label for="drum_off" class="form-label">Drum Off</label>
                                <input type="text" class="form-control" id="drum_off" name="drum_off"
                                    value="<?= $pem_tumbling->drum_off ?>">
                            </div>

                            <div class="mb-3">
                                <label for="drum_speed" class="form-label">Drum Speed</label>
                                <input type="text" class="form-control" id="drum_speed" name="drum_speed"
                                    value="<?= $pem_tumbling->drum_speed ?>">
                            </div>

                            <div class="mb-3">
                                <label for="vacuum_time" class="form-label">Vacuum Time</label>
                                <input type="text" class="form-control" id="vacuum_time" name="vacuum_time"
                                    value="<?= $pem_tumbling->vacuum_time ?>">
                            </div>

                            <div class="mb-3">
                                <label for="total_time" class="form-label">Total Time</label>
                                <input type="text" class="form-control" id="total_time" name="total_time"
                                    value="<?= $pem_tumbling->total_time ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mulai_item_1" class="form-label">Mulai Item 1</label>
                                <input type="text" class="form-control" id="mulai_item_1" name="mulai_item_1"
                                    value="<?= $pem_tumbling->mulai_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mulai_item_2" class="form-label">Mulai Item 2</label>
                                <input type="text" class="form-control" id="mulai_item_2" name="mulai_item_2"
                                    value="<?= $pem_tumbling->mulai_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mulai_item_3" class="form-label">Mulai Item 3</label>
                                <input type="text" class="form-control" id="mulai_item_3" name="mulai_item_3"
                                    value="<?= $pem_tumbling->mulai_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="mulai_item_4" class="form-label">Mulai Item 4</label>
                                <input type="text" class="form-control" id="mulai_item_4" name="mulai_item_4"
                                    value="<?= $pem_tumbling->mulai_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_item_1" class="form-label">Selesai Item 1</label>
                                <input type="text" class="form-control" id="selesai_item_1" name="selesai_item_1"
                                    value="<?= $pem_tumbling->selesai_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_item_2" class="form-label">Selesai Item 2</label>
                                <input type="text" class="form-control" id="selesai_item_2" name="selesai_item_2"
                                    value="<?= $pem_tumbling->selesai_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_item_3" class="form-label">Selesai Item 3</label>
                                <input type="text" class="form-control" id="selesai_item_3" name="selesai_item_3"
                                    value="<?= $pem_tumbling->selesai_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="selesai_item_4" class="form-label">Selesai Item 4</label>
                                <input type="text" class="form-control" id="selesai_item_4" name="selesai_item_4"
                                    value="<?= $pem_tumbling->selesai_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_1" class="form-label">Tumbling Suhu Daging Item
                                    1</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_1"
                                    name="tumbling_suhu_daging_item_1"
                                    value="<?= $pem_tumbling->tumbling_suhu_daging_item_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_2" class="form-label">Tumbling Suhu Daging Item
                                    2</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_2"
                                    name="tumbling_suhu_daging_item_2"
                                    value="<?= $pem_tumbling->tumbling_suhu_daging_item_2 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_3" class="form-label">Tumbling Suhu Daging Item
                                    3</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_3"
                                    name="tumbling_suhu_daging_item_3"
                                    value="<?= $pem_tumbling->tumbling_suhu_daging_item_3 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tumbling_suhu_daging_item_4" class="form-label">Tumbling Suhu Daging Item
                                    4</label>
                                <input type="text" class="form-control" id="tumbling_suhu_daging_item_4"
                                    name="tumbling_suhu_daging_item_4"
                                    value="<?= $pem_tumbling->tumbling_suhu_daging_item_4 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tumbling_rata_rata" class="form-label">Tumbling Rata Rata</label>
                                <input type="text" class="form-control" id="tumbling_rata_rata"
                                    name="tumbling_rata_rata" value="<?= $pem_tumbling->tumbling_rata_rata ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kondisi" class="form-label">Kondisi</label>
                                <input type="text" class="form-control" id="kondisi" name="kondisi"
                                    value="<?= $pem_tumbling->kondisi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan_bawah" class="form-label">Catatan Bawah</label>
                                <input type="text" class="form-control" id="catatan_bawah" name="catatan_bawah"
                                    value="<?= $pem_tumbling->catatan_bawah ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_tumbling->catatan ?>">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_tumbling') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
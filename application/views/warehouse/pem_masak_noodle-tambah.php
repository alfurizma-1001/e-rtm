<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Loading Produk Untuk Lokal
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_masak_noodle/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" onchange="updateTimeOptions()"
                                    required>
                                    <option value="" disabled selected>Pilih Shift</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Enter Product Name">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Enter Production Code">
                            </div>

                            <div class="mb-3">
                                <label for="mixing_bahan_utama" class="form-label">Mixing Bahan Utama</label>
                                <input type="text" class="form-control" id="mixing_bahan_utama"
                                    name="mixing_bahan_utama" placeholder="Enter mixing_bahan_utama">
                            </div>

                            <div class="mb-3">
                                <label for="mixing_kode_produksi" class="form-label">Mixing Kode Produksi</label>
                                <input type="text" class="form-control" id="mixing_kode_produksi"
                                    name="mixing_kode_produksi" placeholder="Enter Production Code for Mixing">
                            </div>

                            <div class="mb-3">
                                <label for="mixing_berat" class="form-label">Mixing Berat</label>
                                <input type="text" class="form-control" id="mixing_berat" name="mixing_berat"
                                    placeholder="Enter Weight for Mixing">
                            </div>


                            <div class="mb-3">
                                <label for="bahan_lain" class="form-label">Bahan Lain</label>
                                <textarea class="form-control" id="bahan_lain" name="bahan_lain" rows="3"
                                    placeholder="Enter Other Ingredients"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_produksi" class="form-label">Bahan Lain Kode
                                    Produksi</label>
                                <textarea class="form-control" id="bahan_lain_kode_produksi"
                                    name="bahan_lain_kode_produksi" rows="3"
                                    placeholder="Enter Production Code for Other Ingredients"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat" class="form-label">Bahan Lain Berat</label>
                                <textarea class="form-control" id="bahan_lain_berat" name="bahan_lain_berat" rows="3"
                                    placeholder="Enter Weight for Other Ingredients"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_kode_produksi_item2" class="form-label">Bahan Lain Kode
                                    Produksi Item 2</label>
                                <textarea class="form-control" id="bahan_lain_kode_produksi_item2"
                                    name="bahan_lain_kode_produksi_item2" rows="3"
                                    placeholder="Enter Production Code for Other Ingredients"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bahan_lain_berat_item2" class="form-label">Bahan Lain Berat Item 2</label>
                                <textarea class="form-control" id="bahan_lain_berat_item2" name="bahan_lain_berat_item2" rows="3"
                                    placeholder="Enter Weight for Other Ingredients"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="waktu_proses" class="form-label">Waktu Proses</label>
                                <textarea class="form-control" id="waktu_proses" name="waktu_proses" rows="3"
                                    placeholder="Enter waktu_proses Details"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="vacuum" class="form-label">Vacuum</label>
                                <textarea class="form-control" id="vacuum" name="vacuum" rows="3"
                                    placeholder="Enter Vacuum Details"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_adonan" class="form-label">Suhu Adonan</label>
                                <textarea class="form-control" id="suhu_adonan" name="suhu_adonan" rows="3"
                                    placeholder="Enter Dough Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_waktu" class="form-label">Aging Waktu</label>
                                <textarea class="form-control" id="aging_waktu" name="aging_waktu" rows="3"
                                    placeholder="Enter Aging Time"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_rh" class="form-label">Aging RH</label>
                                <textarea class="form-control" id="aging_rh" name="aging_rh" rows="3"
                                    placeholder="Enter Aging RH"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aging_suhu_ruangan" class="form-label">Aging Suhu Ruangan</label>
                                <textarea class="form-control" id="aging_suhu_ruangan" name="aging_suhu_ruangan"
                                    rows="3" placeholder="Enter Aging Room Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rolling_ukuran_tebal" class="form-label">Rolling Ukuran Tebal</label>
                                <textarea class="form-control" id="rolling_ukuran_tebal" name="rolling_ukuran_tebal"
                                    rows="3" placeholder="Enter Rolling Thickness"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cutting_sampling_berat" class="form-label">Cutting Sampling Berat</label>
                                <textarea class="form-control" id="cutting_sampling_berat" name="cutting_sampling_berat"
                                    rows="3" placeholder="Enter Weight of Sample"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_suhu_setting_water" class="form-label">Boiling Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="boiling_suhu_setting_water"
                                    name="boiling_suhu_setting_water" rows="3"
                                    placeholder="Enter Boiling Water Temperature Setting"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_suhu_actual_water" class="form-label">Boiling Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="boiling_suhu_actual_water"
                                    name="boiling_suhu_actual_water" rows="3"
                                    placeholder="Enter Actual Boiling Water Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="boiling_waktu" class="form-label">Boiling Waktu</label>
                                <textarea class="form-control" id="boiling_waktu" name="boiling_waktu" rows="3"
                                    placeholder="Enter Boiling Time"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_suhu_setting_water" class="form-label">Washing Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="washing_suhu_setting_water"
                                    name="washing_suhu_setting_water" rows="3"
                                    placeholder="Enter Washing Water Temperature Setting"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_suhu_actual_water" class="form-label">Washing Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="washing_suhu_actual_water"
                                    name="washing_suhu_actual_water" rows="3"
                                    placeholder="Enter Actual Washing Water Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="washing_waktu" class="form-label">Washing Waktu</label>
                                <textarea class="form-control" id="washing_waktu" name="washing_waktu" rows="3"
                                    placeholder="Enter Washing Time"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cooling_suhu_setting_water" class="form-label">Cooling Suhu Setting
                                    Water</label>
                                <textarea class="form-control" id="cooling_suhu_setting_water"
                                    name="cooling_suhu_setting_water" rows="3"
                                    placeholder="Enter Cooling Water Temperature Setting"></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="cooling_suhu_actual_water" class="form-label">Cooling Suhu Actual
                                    Water</label>
                                <textarea class="form-control" id="cooling_suhu_actual_water"
                                    name="cooling_suhu_actual_water" rows="3"
                                    placeholder="Enter Actual Cooling Water Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cooling_waktu" class="form-label">Cooling Waktu</label>
                                <textarea class="form-control" id="cooling_waktu" name="cooling_waktu" rows="3"
                                    placeholder="Enter Cooling Time"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lama_proses_jam_mulai" class="form-label">Lama Proses Jam Mulai</label>
                                <textarea class="form-control" id="lama_proses_jam_mulai" name="lama_proses_jam_mulai"
                                    rows="1" placeholder="Enter start time for the process"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lama_proses_jam_selesai" class="form-label">Lama Proses Jam Selesai</label>
                                <textarea class="form-control" id="lama_proses_jam_selesai"
                                    name="lama_proses_jam_selesai" rows="1"
                                    placeholder="Enter end time for the process"></textarea>
                            </div>


                            <!-- Additional Sensory Fields -->
                            <div class="mb-3">
                                <label for="sensori_suhu_produk_akhir" class="form-label">Sensori Suhu Produk
                                    Akhir</label>
                                <textarea class="form-control" id="sensori_suhu_produk_akhir"
                                    name="sensori_suhu_produk_akhir" rows="3"
                                    placeholder="Enter Final Product Temperature"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_suhu_produk_setelah" class="form-label">Sensori Suhu Produk
                                    Setelah</label>
                                <textarea class="form-control" id="sensori_suhu_produk_setelah"
                                    name="sensori_suhu_produk_setelah" rows="3"
                                    placeholder="Enter Temperature After Sensory Check"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_rasa" class="form-label">Sensori Rasa</label>
                                <textarea class="form-control" id="sensori_rasa" name="sensori_rasa" rows="3"
                                    placeholder="Enter Flavor Sensory Evaluation"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_kekenyalan" class="form-label">Sensori Kekenyalan</label>
                                <textarea class="form-control" id="sensori_kekenyalan" name="sensori_kekenyalan"
                                    rows="3" placeholder="Enter Texture Sensory Evaluation"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="sensori_warna" class="form-label">Sensori Warna</label>
                                <textarea class="form-control" id="sensori_warna" name="sensori_warna" rows="3"
                                    placeholder="Enter Color Sensory Evaluation"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Notes">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pem_masak_noodle') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                            Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTimeOptions() {
        const shift = document.getElementById("shift").value;
        const pukulSelect = document.getElementById("pukul");
        pukulSelect.innerHTML = "";

        if (shift === "1") {
            addOption(pukulSelect, "7:00", "7:00");
            addOption(pukulSelect, "8:00", "8:00");
            addOption(pukulSelect, "9:00", "9:00");
            addOption(pukulSelect, "10:00", "10:00");
            addOption(pukulSelect, "11:00", "11:00");
            addOption(pukulSelect, "12:00", "12:00");
            addOption(pukulSelect, "13:00", "13:00");
            addOption(pukulSelect, "14:00", "14:00");
            addOption(pukulSelect, "15:00", "15:00");
        } else if (shift === "2") {
            addOption(pukulSelect, "15:00", "15:00");
            addOption(pukulSelect, "16:00", "16:00");
            addOption(pukulSelect, "17:00", "17:00");
            addOption(pukulSelect, "18:00", "18:00");
            addOption(pukulSelect, "19:00", "19:00");
            addOption(pukulSelect, "20:00", "20:00");
            addOption(pukulSelect, "21:00", "21:00");
            addOption(pukulSelect, "22:00", "22:00");
            addOption(pukulSelect, "23:00", "23:00");
        } else if (shift === "3") {
            addOption(pukulSelect, "23:00", "23:00");
            addOption(pukulSelect, "0:00", "0:00");
            addOption(pukulSelect, "1:00", "1:00");
            addOption(pukulSelect, "2:00", "2:00");
            addOption(pukulSelect, "3:00", "3:00");
            addOption(pukulSelect, "4:00", "4:00");
            addOption(pukulSelect, "5:00", "5:00");
            addOption(pukulSelect, "6:00", "6:00");
            addOption(pukulSelect, "7:00", "7:00");
        }
    }

    function addOption(select, text, value) {
        const option = document.createElement("option");
        option.text = text;
        option.value = value;
        select.add(option);
    }

    var inputDate = document.getElementById('date');

    var now = new Date();
    var year = now.getFullYear();
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var day = String(now.getDate()).padStart(2, '0');

    inputDate.value = year + '-' + month + '-' + day;
    inputTime.value = hours + ':' + minutes;
</script>
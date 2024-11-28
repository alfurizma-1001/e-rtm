<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> KPengecekan Suhu Produk Setiap
        Tahapan</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('suhu_tahapan/tambah') ?>" method="post">
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
                                    placeholder="Masukkan Nama Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Masukkan Kode Produksi" required>
                            </div>

                            <div class="mb-3">
                                <label for="filling_portioning" class="form-label">Filling Portioning</label>
                                <input type="text" class="form-control" id="filling_portioning"
                                    name="filling_portioning" placeholder="Masukkan Filling Portioning" required>
                            </div>

                            <div class="mb-3">
                                <label for="iqf" class="form-label">IQF</label>
                                <input type="text" class="form-control" id="iqf" name="iqf" placeholder="Masukkan IQF"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="top_sealer" class="form-label">Top Sealer</label>
                                <input type="text" class="form-control" id="top_sealer" name="top_sealer"
                                    placeholder="Masukkan Top Sealer" required>
                            </div>

                            <div class="mb-3">
                                <label for="x_ray" class="form-label">X-Ray</label>
                                <input type="text" class="form-control" id="x_ray" name="x_ray"
                                    placeholder="Masukkan X-Ray" required>
                            </div>

                            <div class="mb-3">
                                <label for="sticker" class="form-label">Sticker</label>
                                <input type="text" class="form-control" id="sticker" name="sticker"
                                    placeholder="Masukkan Sticker" required>
                            </div>

                            <div class="mb-3">
                                <label for="shrink" class="form-label">Shrink</label>
                                <input type="text" class="form-control" id="shrink" name="shrink"
                                    placeholder="Masukkan Shrink" required>
                            </div>
                            <div class="mb-3">
                                <label for="packing_box" class="form-label">Packing Box</label>
                                <input type="text" class="form-control" id="packing_box" name="packing_box"
                                    placeholder="Masukkan Packing Box" required>
                            </div>

                            <div class="mb-3">
                                <label for="cold_storage" class="form-label">Cold Storage</label>
                                <input type="text" class="form-control" id="cold_storage" name="cold_storage"
                                    placeholder="Masukkan Cold Storage" required>
                            </div>

                            <div class="mb-3">
                                <label for="filling" class="form-label">Filling</label>
                                <input type="text" class="form-control" id="filling" name="filling"
                                    placeholder="Masukkan Filling" required>
                            </div>

                            <div class="mb-3">
                                <label for="masuk_iqf" class="form-label">Masuk IQF</label>
                                <input type="text" class="form-control" id="masuk_iqf" name="masuk_iqf"
                                    placeholder="Masukkan Masuk IQF" required>
                            </div>

                            <div class="mb-3">
                                <label for="keluar_aktual" class="form-label">Keluar Aktual</label>
                                <input type="text" class="form-control" id="keluar_aktual" name="keluar_aktual"
                                    placeholder="Masukkan Keluar Aktual" required>
                            </div>



                        </div>
                        <div class="col-md-6">





                            <div class="mb-3">
                                <label for="suhu_top_sealer" class="form-label">Suhu Top Sealer</label>
                                <input type="text" class="form-control" id="suhu_top_sealer" name="suhu_top_sealer"
                                    placeholder="Masukkan Suhu Top Sealer" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_x_ray" class="form-label">Suhu X-Ray</label>
                                <input type="text" class="form-control" id="suhu_x_ray" name="suhu_x_ray"
                                    placeholder="Masukkan Suhu X-Ray" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_sticker" class="form-label">Suhu Sticker</label>
                                <input type="text" class="form-control" id="suhu_sticker" name="suhu_sticker"
                                    placeholder="Masukkan Suhu Sticker" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_shrink" class="form-label">Suhu Shrink</label>
                                <input type="text" class="form-control" id="suhu_shrink" name="suhu_shrink"
                                    placeholder="Masukkan Suhu Shrink" required>
                            </div>

                            <div class="mb-3">
                                <label for="down_time" class="form-label">Down Time</label>
                                <input type="text" class="form-control" id="down_time" name="down_time"
                                    placeholder="Masukkan Down Time" required>
                            </div>

                            <div class="mb-3">
                                <label for="cold_aktual" class="form-label">Cold Aktual</label>
                                <input type="text" class="form-control" id="cold_aktual" name="cold_aktual"
                                    placeholder="Masukkan Cold Aktual" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan_kanan" class="form-label">Catatan Kanan</label>
                                <input type="text" class="form-control" id="catatan_kanan" name="catatan_kanan"
                                    placeholder="Masukkan Catatan Kanan" required>
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
                        <a href="<?= base_url('suhu_tahapan') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
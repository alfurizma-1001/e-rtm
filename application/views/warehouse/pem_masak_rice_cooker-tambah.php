<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Pemeriksaan Pemasakan Rice Cooker
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_masak_rice_cooker/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    placeholder="Masukkan Shift" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Masukkan Nama Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_beras" class="form-label">Kode Beras</label>
                                <input type="text" class="form-control" id="kode_beras" name="kode_beras"
                                    placeholder="Masukkan Kode Beras" required>
                            </div>

                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat</label>
                                <input type="text" class="form-control" id="berat" name="berat"
                                    placeholder="Masukkan Berat" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_prod" class="form-label">Kode Prod</label>
                                <input type="text" class="form-control" id="kode_prod" name="kode_prod"
                                    placeholder="Masukkan Kode Prod" required>
                            </div>

                            <div class="mb-3">
                                <label for="basket_no" class="form-label">Basket No</label>
                                <input type="text" class="form-control" id="basket_no" name="basket_no"
                                    placeholder="Masukkan Basket No" required>
                            </div>

                            <div class="mb-3">
                                <label for="gas" class="form-label">Gas</label>
                                <input type="text" class="form-control" id="gas" name="gas" placeholder="Masukkan Gas"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu"
                                    placeholder="Masukkan Waktu" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_produk" name="suhu_produk"
                                    placeholder="Masukkan Suhu Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk_1menit" class="form-label">Suhu Produk (1 Menit)</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_produk_1menit"
                                    name="suhu_produk_1menit" placeholder="Masukkan Suhu Produk (1 Menit)" required>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="suhu_aftervakum" class="form-label">Suhu After Vakum</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_aftervakum"
                                    name="suhu_aftervakum" placeholder="Masukkan Suhu After Vakum" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    placeholder="Masukkan Jam Mulai" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_selesi" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesi" name="jam_selesi"
                                    placeholder="Masukkan Jam Selesai" required>
                            </div>

                            <div class="mb-3">
                                <label for="kematangan" class="form-label">Kematangan</label>
                                <input type="text" class="form-control" id="kematangan" name="kematangan"
                                    placeholder="Masukkan Kematangan" required>
                            </div>

                            <div class="mb-3">
                                <label for="rasa" class="form-label">Rasa</label>
                                <input type="text" class="form-control" id="rasa" name="rasa"
                                    placeholder="Masukkan Rasa" required>
                            </div>

                            <div class="mb-3">
                                <label for="tekstur" class="form-label">Tekstur</label>
                                <input type="text" class="form-control" id="tekstur" name="tekstur"
                                    placeholder="Masukkan Tekstur" required>
                            </div>

                            <div class="mb-3">
                                <label for="aroma" class="form-label">Aroma</label>
                                <input type="text" class="form-control" id="aroma" name="aroma"
                                    placeholder="Masukkan aroma" required>
                            </div>


                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna"
                                    placeholder="Masukkan Warna" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Masukkan Keterangan" required>
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
                        <a href="<?= base_url('pem_masak_rice_cooker') ?>" class="btn btn-danger"><i
                                class="bx bx-x"></i>
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
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> Kontaminasi Benda Asing</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pspsiqf/tambah') ?>" method="post">
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
                                <label for="iqf_no" class="form-label">IQF No.</label>
                                <input type="text" class="form-control" id="iqf_no" name="iqf_no"
                                    placeholder="Masukkan iqf_no" required>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <select class="form-select" id="pukul" name="pukul" required>
                                    <option value="" disabled selected>Pilih waktu</option>
                                    <?php for ($i = 0; $i <= 23; $i++): ?>
                                        <option value="<?= "{$i}:00" ?>"><?= "{$i}:00" ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="produk" class="form-label">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk"
                                    placeholder="Masukkan produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="batch_no" class="form-label">Batch No.</label>
                                <input type="text" class="form-control" id="batch_no" name="batch_no"
                                    placeholder="Masukkan batch_no" required>
                            </div>
                            <div class="mb-3">
                                <label for="stdct" class="form-label">STD CT.</label>
                                <input type="text" class="form-control" id="stdct" name="stdct"
                                    placeholder="Masukkan stdct" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_1" class="form-label">Suhu Pusat Produk 1</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_1"
                                    name="suhu_pusat_produk_1" placeholder="Masukkan suhu_pusat_produk_1" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_2" class="form-label">Suhu Pusat Produk 2</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_2"
                                    name="suhu_pusat_produk_2" placeholder="Masukkan suhu_pusat_produk_2" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_3" class="form-label">Suhu Pusat Produk 3</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_3"
                                    name="suhu_pusat_produk_3" placeholder="Masukkan suhu_pusat_produk_3" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_4" class="form-label">Suhu Pusat Produk 4</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_4"
                                    name="suhu_pusat_produk_4" placeholder="Masukkan suhu_pusat_produk_4" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_5" class="form-label">Suhu Pusat Produk 5</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_5"
                                    name="suhu_pusat_produk_5" placeholder="Masukkan suhu_pusat_produk_5" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_6" class="form-label">Suhu Pusat Produk 6</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_6"
                                    name="suhu_pusat_produk_6" placeholder="Masukkan suhu_pusat_produk_6" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_7" class="form-label">Suhu Pusat Produk 7</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_7"
                                    name="suhu_pusat_produk_7" placeholder="Masukkan suhu_pusat_produk_7" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_8" class="form-label">Suhu Pusat Produk 8</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_8"
                                    name="suhu_pusat_produk_8" placeholder="Masukkan suhu_pusat_produk_8" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_9" class="form-label">Suhu Pusat Produk 9</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_9"
                                    name="suhu_pusat_produk_9" placeholder="Masukkan suhu_pusat_produk_9" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_10" class="form-label">Suhu Pusat Produk 10</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_10"
                                    name="suhu_pusat_produk_10" placeholder="Masukkan suhu_pusat_produk_10" required>
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_x" class="form-label">Suhu Pusat Produk x</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_x"
                                    name="suhu_pusat_produk_x" placeholder="Masukkan suhu_pusat_produk_x" required>
                            </div>

                            <div class="mb-3">
                                <label for="problem" class="form-label">Problem</label>
                                <input type="text" class="form-control" id="problem" name="problem"
                                    placeholder="Masukkan problem" required>
                            </div>
                            <div class="mb-3">
                                <label for="tindakan_koreksi" class="form-label">Tindakan Koreksi</label>
                                <input type="text" class="form-control" id="tindakan_koreksi" name="tindakan_koreksi"
                                    placeholder="Masukkan Tindakan Koreksi" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukkan catatan" required>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pspsiqf') ?>" class="btn btn-danger"><i
                                class="bx bx-x"></i> Batal</a>
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
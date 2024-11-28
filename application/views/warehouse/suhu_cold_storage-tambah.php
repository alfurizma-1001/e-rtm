<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Suhu Cold Storage
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('suhu_cold_storage/tambah') ?>" method="post">
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
                                <label for="pukul" class="form-label">Pukul</label>
                                <select class="form-select" id="pukul" name="pukul" required>
                                    <option value="" disabled selected>Pilih waktu</option>
                                    <?php for ($i = 0; $i <= 23; $i++): ?>
                                        <option value="<?= "{$i}:00" ?>"><?= "{$i}:00" ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Enter nama produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_cs" class="form-label">Suhu CS</label>
                                <input type="text" class="form-control" id="suhu_cs" name="suhu_cs"
                                    placeholder="Enter Suhu CS" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics1" class="form-label">Suhu DICS1</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics1" name="suhu_dics1"
                                    placeholder="Enter Suhu DICS1" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics2" class="form-label">Suhu DICS2</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics2" name="suhu_dics2"
                                    placeholder="Enter Suhu DICS2" required>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="suhu_dics3" class="form-label">Suhu DICS3</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics3" name="suhu_dics3"
                                    placeholder="Enter Suhu DICS3" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics4" class="form-label">Suhu DICS4</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics4" name="suhu_dics4"
                                    placeholder="Enter Suhu DICS4" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_dics5" class="form-label">Suhu DICS5</label>
                                <input type="number" step="0.01" class="form-control" id="suhu_dics5" name="suhu_dics5"
                                    placeholder="Enter Suhu DICS5" required>
                            </div>

                            <div class="mb-3">
                                <label for="rata" class="form-label">Rata</label>
                                <input type="number" step="0.01" class="form-control" id="rata" name="rata"
                                    placeholder="Enter Rata" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Keterangan" required>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Notes" required>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('suhu_cold_storage') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
            addOption(pukulSelect, "07:00", "07:00");
            addOption(pukulSelect, "08:00", "08:00");
            addOption(pukulSelect, "09:00", "09:00");
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
            addOption(pukulSelect, "24:00", "24:00");
            addOption(pukulSelect, "01:00", "01:00");
            addOption(pukulSelect, "02:00", "02:00");
            addOption(pukulSelect, "03:00", "03:00");
            addOption(pukulSelect, "04:00", "04:00");
            addOption(pukulSelect, "05:00", "05:00");
            addOption(pukulSelect, "06:00", "06:00");
            addOption(pukulSelect, "07:00", "07:00");
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
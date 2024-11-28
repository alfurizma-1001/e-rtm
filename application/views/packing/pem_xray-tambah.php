<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> Pemeriksaan X-Ray</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_xray/tambah') ?>" method="post">
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
                                <label for="bukti" class="form-label">Bukti</label>
                                <input type="text" class="form-control" id="bukti" name="bukti"
                                    placeholder="Masukkan Bukti" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Enter Kode Produksi">
                            </div>

                            <div class="mb-3">
                                <label for="no_program" class="form-label">No Program</label>
                                <input type="text" class="form-control" id="no_program" name="no_program"
                                    placeholder="Enter No Program">
                            </div>

                            <div class="mb-3">
                                <label for="glass_ball_1" class="form-label">Glass Ball 1</label>
                                <input type="text" class="form-control" id="glass_ball_1" name="glass_ball_1"
                                    placeholder="Enter Glass Ball 1">
                            </div>

                            <div class="mb-3">
                                <label for="glass_ball_2" class="form-label">Glass Ball 2</label>
                                <input type="text" class="form-control" id="glass_ball_2" name="glass_ball_2"
                                    placeholder="Enter Glass Ball 2" required>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="ceramic_1" class="form-label">Ceramic 1</label>
                                <input type="text" class="form-control" id="ceramic_1" name="ceramic_1"
                                    placeholder="Enter Ceramic 1">
                            </div>

                            <div class="mb-3">
                                <label for="ceramic_2" class="form-label">Ceramic 2</label>
                                <input type="text" class="form-control" id="ceramic_2" name="ceramic_2"
                                    placeholder="Enter Ceramic 2" required>
                            </div>

                            <div class="mb-3">
                                <label for="sus_wire_1" class="form-label">SUS Wire 1</label>
                                <input type="text" class="form-control" id="sus_wire_1" name="sus_wire_1"
                                    placeholder="Enter SUS Wire 1">
                            </div>

                            <div class="mb-3">
                                <label for="sus_wire_2" class="form-label">SUS Wire 2</label>
                                <input type="text" class="form-control" id="sus_wire_2" name="sus_wire_2"
                                    placeholder="Enter SUS Wire 2" required>
                            </div>

                            <div class="mb-3">
                                <label for="sus_ball_1" class="form-label">SUS Ball 1</label>
                                <input type="text" class="form-control" id="sus_ball_1" name="sus_ball_1"
                                    placeholder="Enter SUS Ball 1">
                            </div>

                            <div class="mb-3">
                                <label for="sus_ball_2" class="form-label">SUS Ball 2</label>
                                <input type="text" class="form-control" id="sus_ball_2" name="sus_ball_2"
                                    placeholder="Enter SUS Ball 2" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Keterangan">
                            </div>

                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control" id="tindakan" name="tindakan"
                                    placeholder="Enter Tindakan">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Catatan">
                            </div>


                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pem_xray') ?>" class="btn btn-danger"><i class="bx bx-x"></i> Batal</a>
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
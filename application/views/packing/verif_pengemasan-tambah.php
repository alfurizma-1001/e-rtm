<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> Kontaminasi Benda Asing</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('verif_pengemasan/tambah') ?>" method="post">
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
                                <label for="jam" class="form-label">Jam</label>
                                <select class="form-select" id="jam" name="jam" required>
                                    <option value="" disabled selected>Pilih jam</option>
                                    <?php for ($i = 0; $i <= 23; $i++): ?>
                                        <option value="<?= "{$i}:00" ?>"><?= "{$i}:00" ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tnama_produk" class="form-label">Nama Produk (T)</label>
                                <input type="text" class="form-control" id="tnama_produk" name="tnama_produk"
                                    placeholder="Enter Top Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="tprod_code" class="form-label">Product Code (T)</label>
                                <input type="text" class="form-control" id="tprod_code" name="tprod_code"
                                    placeholder="Enter Top Product Code" required>
                            </div>
                            <div class="mb-3">
                                <label for="tbb" class="form-label">Best Before (T)</label>
                                <input type="text" class="form-control" id="tbb" name="tbb"
                                    placeholder="Enter Best Before (T)" required>
                            </div>
                            <div class="mb-3">
                                <label for="tqr_code" class="form-label">QR Code (T)</label>
                                <input type="text" class="form-control" id="tqr_code" name="tqr_code"
                                    placeholder="Enter QR Code (T)" required>
                            </div>
                            <div class="mb-3">
                                <label for="tok_tdk" class="form-label">OK/TDK OK (T)</label>
                                <input type="text" class="form-control" id="tok_tdk" name="tok_tdk"
                                    placeholder="Enter OK/TDK OK (T)" required>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="bnama_produk" class="form-label">Nama Produk (B)</label>
                                <input type="text" class="form-control" id="bnama_produk" name="bnama_produk"
                                    placeholder="Enter Bottom Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="bprod_code" class="form-label">Product Code (B)</label>
                                <input type="text" class="form-control" id="bprod_code" name="bprod_code"
                                    placeholder="Enter Bottom Product Code" required>
                            </div>
                            <div class="mb-3">
                                <label for="bbb" class="form-label">Best Before (B)</label>
                                <input type="text" class="form-control" id="bbb" name="bbb"
                                    placeholder="Enter Best Before (B)" required>
                            </div>
                            <div class="mb-3">
                                <label for="bisi" class="form-label">Isi/Box (B)</label>
                                <input type="text" class="form-control" id="bisi" name="bisi"
                                    placeholder="Enter Isi/Box (B)" required>
                            </div>
                            <div class="mb-3">
                                <label for="bok_tdk" class="form-label">OK/TDK OK (B)</label>
                                <input type="text" class="form-control" id="bok_tdk" name="bok_tdk"
                                    placeholder="Enter OK/TDK OK (B)" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Keterangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Catatan" required>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('verif_pengemasan') ?>" class="btn btn-danger"><i
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
        const pukulSelect = document.getElementById("jam");
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
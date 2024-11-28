<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> Kontaminasi Benda Asing</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('verif_topping/tambah') ?>" method="post">
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
                                <label for="kode_produk" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                    placeholder="Masukkan Kode Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_topping" class="form-label">Jenis Topping</label>
                                <textarea class="form-control" id="jenis_topping" name="jenis_topping"
                                    placeholder="Pakai Koma beli lebih dari satu" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="standar" class="form-label">Standar</label>
                                <textarea class="form-control" id="standar" name="standar"
                                    placeholder="Pakai Koma beli lebih dari satu" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul" required>
                            </div>

                            <div class="mb-3">
                                <label for="gramasi" class="form-label">Gramasi</label>
                                <textarea class="form-control" id="gramasi" name="gramasi"
                                    placeholder="Pakai Koma beli lebih dari satu" required></textarea>
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="p_pukul" class="form-label">P Pukul</label>
                                <input type="time" class="form-control" id="p_pukul" name="p_pukul" required>
                            </div>

                            <div class="mb-3">
                                <label for="p_gramasi" class="form-label">P Gramasi</label>
                                <textarea class="form-control" id="p_gramasi" name="p_gramasi"
                                    placeholder="Pakai Koma beli lebih dari satu" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="pp_pukul" class="form-label">PP Pukul</label>
                                <input type="time" class="form-control" id="pp_pukul" name="pp_pukul" required>
                            </div>

                            <div class="mb-3">
                                <label for="pp_gramasi" class="form-label">PP Gramasi</label>
                                <textarea class="form-control" id="pp_gramasi" name="pp_gramasi"
                                    placeholder="Pakai Koma beli lebih dari satu" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control" id="tindakan" name="tindakan"
                                    placeholder="Masukkan Tindakan" required>
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
                        <a href="<?= base_url('verif_topping') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
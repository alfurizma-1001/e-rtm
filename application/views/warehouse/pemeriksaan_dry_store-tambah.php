<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Loading Produk Untuk Lokal
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_dry_store/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                    placeholder="Masukkan Nama Supplier" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Masukkan Nama Barang" required>
                            </div>

                            <div class="mb-3">
                                <label for="mobil" class="form-label">Mobil</label>
                                <input type="text" class="form-control" id="mobil" name="mobil"
                                    placeholder="Masukkan Mobil" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No Polisi</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                    placeholder="Masukkan No Polisi" required>
                            </div>

                            <div class="mb-3">
                                <label for="identitas_pengantar" class="form-label">Identitas Pengantar</label>
                                <input type="text" class="form-control" id="identitas_pengantar"
                                    name="identitas_pengantar" placeholder="Masukkan Identitas Pengantar" required>
                            </div>

                            <div class="mb-3">
                                <label for="segel" class="form-label">Segel</label>
                                <input type="text" class="form-control" id="segel" name="segel"
                                    placeholder="Masukkan Segel" required>
                            </div>

                            <div class="mb-3">
                                <label for="kebersihaan" class="form-label">Kebersihan</label>
                                <input type="text" class="form-control" id="kebersihaan" name="kebersihaan"
                                    placeholder="Masukkan Kebersihan" required>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="hama" class="form-label">Hama</label>
                                <input type="text" class="form-control" id="hama" name="hama"
                                    placeholder="Masukkan Hama" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" required>
                            </div>

                            <div class="mb-3">
                                <label for="mulai_dicek" class="form-label">Mulai Dicek</label>
                                <input type="text" class="form-control" id="mulai_dicek" name="mulai_dicek"
                                    placeholder="Masukkan Mulai Dicek" required>
                            </div>

                            <div class="mb-3">
                                <label for="selesai_dicek" class="form-label">Selesai Dicek</label>
                                <input type="text" class="form-control" id="selesai_dicek" name="selesai_dicek"
                                    placeholder="Masukkan Selesai Dicek" required>
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
                        <a href="<?= base_url('pemeriksaan_dry_store') ?>" class="btn btn-danger"><i
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
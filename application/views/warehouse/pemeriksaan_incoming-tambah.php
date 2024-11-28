<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Pemeriksaan Kendaraan
            Incoming
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_incoming/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_supllier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supllier" name="nama_supllier"
                                    placeholder="Enter Supplier Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Enter Item Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_mobil" class="form-label">Jenis Mobil</label>
                                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil"
                                    placeholder="Enter Vehicle Type" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No Polisi</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                    placeholder="Enter Vehicle Number" required>
                            </div>
                            <div class="mb-3">
                                <label for="identitas_pengantar" class="form-label">Identitas Pengantar</label>
                                <input type="text" class="form-control" id="identitas_pengantar"
                                    name="identitas_pengantar" placeholder="Enter Delivery Person ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="segel" class="form-label">Segel</label>
                                <input type="text" class="form-control" id="segel" name="segel"
                                    placeholder="Enter Seal Status" required>
                            </div>
                            <div class="mb-3">
                                <label for="kebersihaan" class="form-label">Kebersihan</label>
                                <input type="text" class="form-control" id="kebersihaan" name="kebersihaan"
                                    placeholder="Enter Cleanliness Status" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tertutup" class="form-label">Tertutup</label>
                                <input type="text" class="form-control" id="tertutup" name="tertutup"
                                    placeholder="Enter Coverage Status" required>
                            </div>
                            <div class="mb-3">
                                <label for="hama" class="form-label">Hama</label>
                                <input type="text" class="form-control" id="hama" name="hama"
                                    placeholder="Enter Pest Control Status" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_datang" class="form-label">Jam Datang</label>
                                <input type="time" class="form-control" id="jam_datang" name="jam_datang" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" placeholder="Enter Notes"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pemeriksaan_incoming') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
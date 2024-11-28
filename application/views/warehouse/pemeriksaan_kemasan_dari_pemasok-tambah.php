<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span>pemeriksaan kemasan dari
            pemasok
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_kemasan_dari_pemasok/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kemasan" class="form-label">Jenis Kemasan</label>
                                <input type="text" class="form-control" id="jenis_kemasan" name="jenis_kemasan">
                            </div>

                            <div class="mb-3">
                                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi">
                            </div>

                            <div class="mb-3">
                                <label for="pemasok" class="form-label">Pemasok</label>
                                <input type="text" class="form-control" id="pemasok" name="pemasok">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi">
                            </div>

                            <div class="mb-3">
                                <label for="no_po" class="form-label">No PO</label>
                                <input type="text" class="form-control" id="no_po" name="no_po">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_datang" class="form-label">Jumlah Barang Datang</label>
                                <input type="text" class="form-control" id="jumlah_barang_datang"
                                    name="jumlah_barang_datang">
                            </div>

                            <div class="mb-3">
                                <label for="sampling" class="form-label">Sampling</label>
                                <input type="text" class="form-control" id="sampling" name="sampling">
                            </div>

                            <div class="mb-3">
                                <label for="sesuai" class="form-label">Sesuai</label>
                                <input type="text" class="form-control" id="sesuai" name="sesuai">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_sesuai" class="form-label">Tidak Sesuai</label>
                                <input type="text" class="form-control" id="tidak_sesuai" name="tidak_sesuai">
                            </div>


                        </div>
                        <div class="col-md-6">


                            <div class="mb-3">
                                <label for="penampakan" class="form-label">Penampakan</label>
                                <input type="text" class="form-control" id="penampakan" name="penampakan">
                            </div>

                            <div class="mb-3">
                                <label for="dimensi" class="form-label">Dimensi</label>
                                <input type="text" class="form-control" id="dimensi" name="dimensi">
                            </div>

                            <div class="mb-3">
                                <label for="sealing" class="form-label">Sealing</label>
                                <input type="text" class="form-control" id="sealing" name="sealing">
                            </div>

                            <div class="mb-3">
                                <label for="cetakan" class="form-label">Cetakan</label>
                                <input type="text" class="form-control" id="cetakan" name="cetakan">
                            </div>

                            <div class="mb-3">
                                <label for="ketebalan" class="form-label">Ketebalan</label>
                                <input type="text" class="form-control" id="ketebalan" name="ketebalan">
                            </div>

                            <div class="mb-3">
                                <label for="ok" class="form-label">OK</label>
                                <input type="text" class="form-control" id="ok" name="ok">
                            </div>

                            <div class="mb-3">
                                <label for="tolak" class="form-label">Tolak</label>
                                <input type="text" class="form-control" id="tolak" name="tolak">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan">
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pemeriksaan_kemasan_dari_pemasok') ?>" class="btn btn-danger"><i
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
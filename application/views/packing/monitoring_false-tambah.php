<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packing /</span> Monitoring False Rejection</h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('monitoring_false/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="mesin" class="form-label">Mesin</label>
                                <input type="text" class="form-control" id="mesin" name="mesin"
                                    placeholder="Masukkan Mesin" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    placeholder="Masukkan Tanggal" required>
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
                                <label for="jumlah_pack_tdklolos" class="form-label">Jumlah Pack Tidak Lolos</label>
                                <input type="number" class="form-control" id="jumlah_pack_tdklolos"
                                    name="jumlah_pack_tdklolos" placeholder="Masukkan Jumlah Pack Tidak Lolos" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_pack_kontaminan" class="form-label">Jumlah Pack Kontaminan</label>
                                <input type="number" class="form-control" id="jumlah_pack_kontaminan"
                                    name="jumlah_pack_kontaminan" placeholder="Masukkan Jumlah Pack Kontaminan"
                                    required>
                            </div>

            
                        </div>
                        <div class="col-md-6">

                        <div class="mb-3">
                                <label for="jenis_kontaminan" class="form-label">Jenis Kontaminan</label>
                                <input type="text" class="form-control" id="jenis_kontaminan" name="jenis_kontaminan"
                                    placeholder="Masukkan Jenis Kontaminan" required>
                            </div>

                            <div class="mb-3">
                                <label for="posisi_kontaminan" class="form-label">Posisi Kontaminan</label>
                                <input type="text" class="form-control" id="posisi_kontaminan" name="posisi_kontaminan"
                                    placeholder="Masukkan Posisi Kontaminan" required>
                            </div>

                            <div class="mb-3">
                                <label for="false_rejections" class="form-label">False Rejections</label>
                                <input type="text" class="form-control" id="false_rejections" name="false_rejections"
                                    placeholder="Masukkan False Rejections" required>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukkan Catatan" required></textarea>
                            </div>


                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('monitoring_false') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
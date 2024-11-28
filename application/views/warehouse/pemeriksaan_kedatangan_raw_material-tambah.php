<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Pemeriksaan kedatangan raw material
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_kedatangan_raw_material/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" >
                            </div>
                    
                            <div class="mb-3">
                                <label for="jenis_raw_material" class="form-label">Jenis Raw Material</label>
                                <input type="text" class="form-control" id="jenis_raw_material"
                                    name="jenis_raw_material" placeholder="Enter Raw Material Type" >
                            </div>

                            <div class="mb-3">
                                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi"
                                    placeholder="Enter Specifications" >
                            </div>

                            <div class="mb-3">
                                <label for="pemasok" class="form-label">Pemasok</label>
                                <input type="text" class="form-control" id="pemasok" name="pemasok"
                                    placeholder="Enter Supplier Name" >
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Enter Production Code" >
                            </div>

                            <div class="mb-3">
                                <label for="exp_date" class="form-label">Exp Date</label>
                                <input type="date" class="form-control" id="exp_date" name="exp_date" >
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_datang" class="form-label">Jumlah Barang Datang</label>
                                <input type="text" class="form-control" id="jumlah_barang_datang"
                                    name="jumlah_barang_datang" placeholder="Enter Quantity Arrived" >
                            </div>
                            <div class="mb-3">
                                <label for="sampel" class="form-label">sampel</label>
                                <input type="text" class="form-control" id="sampel"
                                    name="sampel" placeholder="Enter sampel" >
                            </div>
                            <div class="mb-3">
                                <label for="sampel" class="form-label">Sampel</label>
                                <input type="text" class="form-control" id="sampel"
                                    name="sampel" placeholder="Enter sampel" >
                            </div>

                            <div class="mb-3">
                                <label for="sesuai" class="form-label">Sesuai</label>
                                <input type="text" class="form-control" id="sesuai" name="sesuai"
                                    placeholder="Enter Conformance Status" >
                            </div>

                            <div class="mb-3">
                                <label for="tidak_sesuai" class="form-label">Tidak Sesuai</label>
                                <input type="text" class="form-control" id="tidak_sesuai" name="tidak_sesuai"
                                    placeholder="Enter Non-conformance Status" >
                            </div>

                            <div class="mb-3">
                                <label for="kemasan" class="form-label">Kemasan</label>
                                <input type="text" class="form-control" id="kemasan" name="kemasan"
                                    placeholder="Enter Packaging Details" >
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna"
                                    placeholder="Enter Color" >
                            </div>

                            <div class="mb-3">
                                <label for="kotoran" class="form-label">Kotoran</label>
                                <input type="text" class="form-control" id="kotoran" name="kotoran"
                                    placeholder="Enter Contaminants" >
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="aroma" class="form-label">Aroma</label>
                                <input type="text" class="form-control" id="aroma" name="aroma"
                                    placeholder="Enter Aroma" >
                            </div>

                            <div class="mb-3">
                                <label for="suhu" class="form-label">Suhu</label>
                                <input type="text" class="form-control" id="suhu" name="suhu"
                                    placeholder="Enter Temperature" >
                            </div>

                            <div class="mb-3">
                                <label for="ada" class="form-label">Ada</label>
                                <input type="text" class="form-control" id="ada" name="ada"
                                    placeholder="Enter Presence Status" >
                            </div>

                            <div class="mb-3">
                                <label for="tdk_ada" class="form-label">Tidak Ada</label>
                                <input type="text" class="form-control" id="tdk_ada" name="tdk_ada"
                                    placeholder="Enter Absence Status" >
                            </div>

                            <div class="mb-3">
                                <label for="negara_asal" class="form-label">Negara Asal</label>
                                <input type="text" class="form-control" id="negara_asal" name="negara_asal"
                                    placeholder="Enter Country of Origin" >
                            </div>

                            <div class="mb-3">
                                <label for="ok" class="form-label">OK</label>
                                <input type="text" class="form-control" id="ok" name="ok" placeholder="Enter OK Status"
                                    >
                            </div>

                            <div class="mb-3">
                                <label for="tolak" class="form-label">Tolak</label>
                                <input type="text" class="form-control" id="tolak" name="tolak"
                                    placeholder="Enter Rejection Status" >
                            </div>

                            <div class="mb-3">
                                <label for="berlaku" class="form-label">Berlaku</label>
                                <input type="text" class="form-control" id="berlaku" name="berlaku"
                                    placeholder="Enter Validity Status" >
                            </div>

                            <div class="mb-3">
                                <label for="tidak_berlaku" class="form-label">Tidak Berlaku</label>
                                <input type="text" class="form-control" id="tidak_berlaku" name="tidak_berlaku"
                                    placeholder="Enter Invalid Status" >
                            </div>

                            <div class="mb-3">
                                <label for="coa" class="form-label">COA</label>
                                <input type="text" class="form-control" id="coa" name="coa"
                                    placeholder="Enter COA Status" >
                            </div>

                            <div class="mb-3">
                                <label for="A" class="form-label">A</label>
                                <input type="text" class="form-control" id="A" name="A" placeholder="Enter A Status"
                                    >
                            </div>

                            <div class="mb-3">
                                <label for="NA" class="form-label">NA</label>
                                <input type="text" class="form-control" id="NA" name="NA" placeholder="Enter NA Status"
                                    >
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Additional Information" >
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Notes" >
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('pemeriksaan_kedatangan_raw_material') ?>" class="btn btn-danger"><i
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
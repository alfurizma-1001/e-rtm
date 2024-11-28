<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Loading Produk Untuk Lokal
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('loading_lokal/tambah') ?>" method="post">
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
                                <label for="mulai_loading" class="form-label">Mulai Loading</label>
                                <input type="time" class="form-control" id="mulai_loading" name="mulai_loading"
                                    placeholder="Enter Start Loading time" required>
                            </div>

                            <div class="mb-3">
                                <label for="selesai_loading" class="form-label">Selesai Loading</label>
                                <input type="time" class="form-control" id="selesai_loading" name="selesai_loading"
                                    placeholder="Enter End Loading time" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan"
                                    placeholder="Enter Vehicle Type" required>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan"
                                    placeholder="Enter Vehicle Number" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_ekspedisi" class="form-label">Nama Ekspedisi</label>
                                <input type="text" class="form-control" id="nama_ekspedisi" name="nama_ekspedisi"
                                    placeholder="Enter Expedition Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_supir" class="form-label">Nama Supir</label>
                                <input type="text" class="form-control" id="nama_supir" name="nama_supir"
                                    placeholder="Enter Driver's Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim"
                                    placeholder="Enter Sender's Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="tujuan_pengiriman" class="form-label">Tujuan Pengiriman</label>
                                <input type="text" class="form-control" id="tujuan_pengiriman" name="tujuan_pengiriman"
                                    placeholder="Enter Destination" required>
                            </div>

                            <div class="mb-3">
                                <label for="bersih" class="form-label">Bersih</label>
                                <input type="text" class="form-control" id="bersih" name="bersih"
                                    placeholder="Enter Clean Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="tidak_berdebu" class="form-label">Tidak Berdebu</label>
                                <input type="text" class="form-control" id="tidak_berdebu" name="tidak_berdebu"
                                    placeholder="Enter Dust-Free Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="tidak_pecah" class="form-label">Tidak Pecah</label>
                                <input type="text" class="form-control" id="tidak_pecah" name="tidak_pecah"
                                    placeholder="Enter Not Broken Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="bebas_hama" class="form-label">Bebas Hama</label>
                                <input type="text" class="form-control" id="bebas_hama" name="bebas_hama"
                                    placeholder="Enter Pest-Free Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="tidak_kondensasi" class="form-label">Tidak Kondensasi</label>
                                <input type="text" class="form-control" id="tidak_kondensasi" name="tidak_kondensasi"
                                    placeholder="Enter No Condensation" required>
                            </div>

                            <div class="mb-3">
                                <label for="pecah" class="form-label">Pecah</label>
                                <input type="text" class="form-control" id="pecah" name="pecah"
                                    placeholder="Enter Broken Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="bebabs_produk_nonhalal" class="form-label">Bebas Produk Nonhalal</label>
                                <input type="text" class="form-control" id="bebabs_produk_nonhalal"
                                    name="bebabs_produk_nonhalal" placeholder="Enter Non-Halal Free Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="tidak_ada_noda" class="form-label">Tidak Ada Noda</label>
                                <input type="text" class="form-control" id="tidak_ada_noda" name="tidak_ada_noda"
                                    placeholder="Enter Stain-Free Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="pallet_utuh" class="form-label">Pallet Utuh</label>
                                <input type="text" class="form-control" id="pallet_utuh" name="pallet_utuh"
                                    placeholder="Enter Pallet Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="tidak_ada_sampah" class="form-label">Tidak Ada Sampah</label>
                                <input type="text" class="form-control" id="tidak_ada_sampah" name="tidak_ada_sampah"
                                    placeholder="Enter Trash-Free Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="binatang" class="form-label">Binatang</label>
                                <input type="text" class="form-control" id="binatang" name="binatang"
                                    placeholder="Enter Animal Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="jamur" class="form-label">Jamur</label>
                                <input type="text" class="form-control" id="jamur" name="jamur"
                                    placeholder="Enter Mold Status" required>
                            </div>

                        </div>
                        <div class="col-md-6">





                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Masukkan Nama Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="kondisi_produk" class="form-label">Kondisi Produk</label>
                                <input type="text" class="form-control" id="kondisi_produk" name="kondisi_produk"
                                    placeholder="Enter Product Condition" required>
                            </div>

                            <div class="mb-3">
                                <label for="kondisi_kemasanan" class="form-label">Kondisi Kemasanan</label>
                                <input type="text" class="form-control" id="kondisi_kemasanan" name="kondisi_kemasanan"
                                    placeholder="Enter Packaging Condition" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    placeholder="Enter Production Code" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control" id="tanggal_kadaluarsa"
                                    name="tanggal_kadaluarsa" placeholder="Enter Expiry Date" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter Remarks" required>
                            </div>

                            <div class="mb-3">
                                <label for="sanitasi_larutan" class="form-label">Sanitasi Larutan</label>
                                <select class="form-select" id="sanitasi_larutan" name="sanitasi_larutan" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="ppm_sanitasi_larutan" class="form-label">PPM Sanitasi Larutan</label>
                                <input type="text" class="form-control" id="ppm_sanitasi_larutan"
                                    name="ppm_sanitasi_larutan" placeholder="Enter PPM of Sanitizer Solution" required>
                            </div>

                            <div class="mb-3">
                                <label for="precooling" class="form-label">Precooling</label>
                                <input type="text" class="form-control" id="precooling" name="precooling"
                                    placeholder="Enter Precooling Status" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk</label>
                                <input type="number" class="form-control" id="suhu_produk" name="suhu_produk"
                                    placeholder="Enter Product Temperature" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="suhu_18" class="form-label">Suhu 18°C</label>
                                <select class="form-select" id="suhu_18" name="suhu_18" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="segel_terpasang" class="form-label">Segel Terpasang</label>
                                <select class="form-select" id="segel_terpasang" name="segel_terpasang" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="lama_delay" class="form-label">Lama Delay</label>
                                <input type="text" class="form-control" id="lama_delay" name="lama_delay"
                                    placeholder="Enter Delay Duration" required>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('loading_lokal') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
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
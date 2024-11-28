<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan kedatangan raw material</h5>
            <div class="card-body">
                <form action="<?= base_url('pemeriksaan_kedatangan_raw_material/update/' . $pemeriksaan_kedatangan_raw_material->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $pemeriksaan_kedatangan_raw_material->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->date ?>" required>
                            </div>

                    
                            <div class="mb-3">
                                <label for="jenis_raw_material" class="form-label">Jenis Raw Material</label>
                                <input type="text" class="form-control" id="jenis_raw_material"
                                    name="jenis_raw_material" value="<?= $pemeriksaan_kedatangan_raw_material->jenis_raw_material ?>">
                            </div>

                            <div class="mb-3">
                                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->spesifikasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pemasok" class="form-label">Pemasok</label>
                                <input type="text" class="form-control" id="pemasok" name="pemasok"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->pemasok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="exp_date" class="form-label">Exp Date</label>
                                <input type="date" class="form-control" id="exp_date" name="exp_date"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->exp_date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_datang" class="form-label">Jumlah Barang Datang</label>
                                <input type="text" class="form-control" id="jumlah_barang_datang"
                                    name="jumlah_barang_datang"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->jumlah_barang_datang ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sampel" class="form-label">Sampel</label>
                                <input type="text" class="form-control" id="sampel"
                                    name="sampel"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->sampel ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sesuai" class="form-label">Sesuai</label>
                                <input type="text" class="form-control" id="sesuai" name="sesuai"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_sesuai" class="form-label">Tidak Sesuai</label>
                                <input type="text" class="form-control" id="tidak_sesuai" name="tidak_sesuai"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->tidak_sesuai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kemasan" class="form-label">Kemasan</label>
                                <input type="text" class="form-control" id="kemasan" name="kemasan"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->kemasan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->warna ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kotoran" class="form-label">Kotoran</label>
                                <input type="text" class="form-control" id="kotoran" name="kotoran"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->kotoran ?>">
                            </div>

                            <div class="mb-3">
                                <label for="aroma" class="form-label">Aroma</label>
                                <input type="text" class="form-control" id="aroma" name="aroma"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->aroma ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu" class="form-label">Suhu</label>
                                <input type="text" class="form-control" id="suhu" name="suhu"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->suhu ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ada" class="form-label">Ada</label>
                                <input type="text" class="form-control" id="ada" name="ada"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->ada ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tdk_ada" class="form-label">Tidak Ada</label>
                                <input type="text" class="form-control" id="tdk_ada" name="tdk_ada"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->tdk_ada ?>">
                            </div>

                            <div class="mb-3">
                                <label for="negara_asal" class="form-label">Negara Asal</label>
                                <input type="text" class="form-control" id="negara_asal" name="negara_asal"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->negara_asal ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ok" class="form-label">OK</label>
                                <input type="text" class="form-control" id="ok" name="ok"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->ok ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tolak" class="form-label">Tolak</label>
                                <input type="text" class="form-control" id="tolak" name="tolak"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->tolak ?>">
                            </div>

                            <div class="mb-3">
                                <label for="berlaku" class="form-label">Berlaku</label>
                                <input type="text" class="form-control" id="berlaku" name="berlaku"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->berlaku ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tidak_berlaku" class="form-label">Tidak Berlaku</label>
                                <input type="text" class="form-control" id="tidak_berlaku" name="tidak_berlaku"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->tidak_berlaku ?>">
                            </div>

                            <div class="mb-3">
                                <label for="coa" class="form-label">COA</label>
                                <input type="text" class="form-control" id="coa" name="coa"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->coa ?>">
                            </div>

                            <div class="mb-3">
                                <label for="A" class="form-label">A</label>
                                <input type="text" class="form-control" id="A" name="A"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->A ?>">
                            </div>

                            <div class="mb-3">
                                <label for="NA" class="form-label">NA</label>
                                <input type="text" class="form-control" id="NA" name="NA"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->NA ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pemeriksaan_kedatangan_raw_material->catatan ?>">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pemeriksaan_kedatangan_raw_material') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
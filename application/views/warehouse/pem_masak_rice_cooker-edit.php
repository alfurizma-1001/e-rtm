<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Rice Cooker</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_masak_rice_cooker/update/' . $pem_masak_rice_cooker->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_masak_rice_cooker->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_masak_rice_cooker->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    value="<?= $pem_masak_rice_cooker->shift ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $pem_masak_rice_cooker->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_beras" class="form-label">Kode Beras</label>
                                <input type="text" class="form-control" id="kode_beras" name="kode_beras"
                                    value="<?= $pem_masak_rice_cooker->kode_beras ?>">
                            </div>

                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat</label>
                                <input type="text" class="form-control" id="berat" name="berat"
                                    value="<?= $pem_masak_rice_cooker->berat ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_prod" class="form-label">Kode Prod</label>
                                <input type="text" class="form-control" id="kode_prod" name="kode_prod"
                                    value="<?= $pem_masak_rice_cooker->kode_prod ?>">
                            </div>

                            <div class="mb-3">
                                <label for="basket_no" class="form-label">Basket No</label>
                                <input type="text" class="form-control" id="basket_no" name="basket_no"
                                    value="<?= $pem_masak_rice_cooker->basket_no ?>">
                            </div>

                            <div class="mb-3">
                                <label for="gas" class="form-label">Gas</label>
                                <input type="text" class="form-control" id="gas" name="gas"
                                    value="<?= $pem_masak_rice_cooker->gas ?>">
                            </div>

                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu"
                                    value="<?= $pem_masak_rice_cooker->waktu ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk" class="form-label">Suhu Produk</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_produk" name="suhu_produk"
                                    value="<?= $pem_masak_rice_cooker->suhu_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_produk_1menit" class="form-label">Suhu Produk (1 Menit)</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_produk_1menit"
                                    name="suhu_produk_1menit" value="<?= $pem_masak_rice_cooker->suhu_produk_1menit ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_aftervakum" class="form-label">Suhu After Vakum</label>
                                <input type="number" step="0.1" class="form-control" id="suhu_aftervakum"
                                    name="suhu_aftervakum" value="<?= $pem_masak_rice_cooker->suhu_aftervakum ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    value="<?= $pem_masak_rice_cooker->jam_mulai ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jam_selesi" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesi" name="jam_selesi"
                                    value="<?= $pem_masak_rice_cooker->jam_selesi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kematangan" class="form-label">Kematangan</label>
                                <input type="text" class="form-control" id="kematangan" name="kematangan"
                                    value="<?= $pem_masak_rice_cooker->kematangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rasa" class="form-label">Rasa</label>
                                <input type="text" class="form-control" id="rasa" name="rasa"
                                    value="<?= $pem_masak_rice_cooker->rasa ?>">
                            </div>

                            <div class="mb-3">
                                <label for="aroma" class="form-label">Aroma</label>
                                <input type="text" class="form-control" id="aroma" name="aroma"
                                    value="<?= $pem_masak_rice_cooker->aroma ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tekstur" class="form-label">Tekstur</label>
                                <input type="text" class="form-control" id="tekstur" name="tekstur"
                                    value="<?= $pem_masak_rice_cooker->tekstur ?>">
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna"
                                    value="<?= $pem_masak_rice_cooker->warna ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pem_masak_rice_cooker->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_masak_rice_cooker->catatan ?>">
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_masak_rice_cooker') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
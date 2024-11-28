<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pengecekan Suhu Produk Setiap
                Tahapan</h5>
            <div class="card-body">
                <form action="<?= base_url('suhu_tahapan/update/' . $suhu_tahapan->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $suhu_tahapan->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $suhu_tahapan->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($suhu_tahapan->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($suhu_tahapan->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($suhu_tahapan->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $suhu_tahapan->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $suhu_tahapan->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="filling_portioning" class="form-label">Filling Portioning</label>
                                <input type="text" class="form-control" id="filling_portioning"
                                    name="filling_portioning" value="<?= $suhu_tahapan->filling_portioning ?>">
                            </div>

                            <div class="mb-3">
                                <label for="iqf" class="form-label">IQF</label>
                                <input type="text" class="form-control" id="iqf" name="iqf"
                                    value="<?= $suhu_tahapan->iqf ?>">
                            </div>

                            <div class="mb-3">
                                <label for="top_sealer" class="form-label">Top Sealer</label>
                                <input type="text" class="form-control" id="top_sealer" name="top_sealer"
                                    value="<?= $suhu_tahapan->top_sealer ?>">
                            </div>

                            <div class="mb-3">
                                <label for="x_ray" class="form-label">X-Ray</label>
                                <input type="text" class="form-control" id="x_ray" name="x_ray"
                                    value="<?= $suhu_tahapan->x_ray ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sticker" class="form-label">Sticker</label>
                                <input type="text" class="form-control" id="sticker" name="sticker"
                                    value="<?= $suhu_tahapan->sticker ?>">
                            </div>

                            <div class="mb-3">
                                <label for="shrink" class="form-label">Shrink</label>
                                <input type="text" class="form-control" id="shrink" name="shrink"
                                    value="<?= $suhu_tahapan->shrink ?>">
                            </div>

                            <div class="mb-3">
                                <label for="packing_box" class="form-label">Packing Box</label>
                                <input type="text" class="form-control" id="packing_box" name="packing_box"
                                    value="<?= $suhu_tahapan->packing_box ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cold_storage" class="form-label">Cold Storage</label>
                                <input type="text" class="form-control" id="cold_storage" name="cold_storage"
                                    value="<?= $suhu_tahapan->cold_storage ?>">
                            </div>

                            <div class="mb-3">
                                <label for="filling" class="form-label">Filling</label>
                                <input type="text" class="form-control" id="filling" name="filling"
                                    value="<?= $suhu_tahapan->filling ?>">
                            </div>

                            <div class="mb-3">
                                <label for="masuk_iqf" class="form-label">Masuk IQF</label>
                                <input type="text" class="form-control" id="masuk_iqf" name="masuk_iqf"
                                    value="<?= $suhu_tahapan->masuk_iqf ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keluar_aktual" class="form-label">Keluar Aktual</label>
                                <input type="text" class="form-control" id="keluar_aktual" name="keluar_aktual"
                                    value="<?= $suhu_tahapan->keluar_aktual ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_top_sealer" class="form-label">Suhu Top Sealer</label>
                                <input type="text" class="form-control" id="suhu_top_sealer" name="suhu_top_sealer"
                                    value="<?= $suhu_tahapan->suhu_top_sealer ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_x_ray" class="form-label">Suhu X-Ray</label>
                                <input type="text" class="form-control" id="suhu_x_ray" name="suhu_x_ray"
                                    value="<?= $suhu_tahapan->suhu_x_ray ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_sticker" class="form-label">Suhu Sticker</label>
                                <input type="text" class="form-control" id="suhu_sticker" name="suhu_sticker"
                                    value="<?= $suhu_tahapan->suhu_sticker ?>">
                            </div>

                            <div class="mb-3">
                                <label for="suhu_shrink" class="form-label">Suhu Shrink</label>
                                <input type="text" class="form-control" id="suhu_shrink" name="suhu_shrink"
                                    value="<?= $suhu_tahapan->suhu_shrink ?>">
                            </div>

                            <div class="mb-3">
                                <label for="down_time" class="form-label">Down Time</label>
                                <input type="text" class="form-control" id="down_time" name="down_time"
                                    value="<?= $suhu_tahapan->down_time ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cold_aktual" class="form-label">Cold Aktual</label>
                                <input type="text" class="form-control" id="cold_aktual" name="cold_aktual"
                                    value="<?= $suhu_tahapan->cold_aktual ?>">
                            </div>
                            <div class="mb-3">
                                <label for="catatan_kanan" class="form-label">Catatan Kanan</label>
                                <input type="text" class="form-control" id="catatan_kanan" name="catatan_kanan"
                                    value="<?= $suhu_tahapan->catatan_kanan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $suhu_tahapan->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('suhu_tahapan') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
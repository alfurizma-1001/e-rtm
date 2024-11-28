<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Dengan Steamer</h5>
            <div class="card-body">
                <form action="<?= base_url('pspsiqf/update/'.$pspsiqf->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pspsiqf->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?= $pspsiqf->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pspsiqf->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($pspsiqf->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($pspsiqf->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="iqf_no" class="form-label">IQF No.</label>
                                <input type="text" class="form-control" id="iqf_no" name="iqf_no" value="<?= $pspsiqf->iqf_no ?>">
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul" value="<?= $pspsiqf->pukul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="produk" class="form-label">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" value="<?= $pspsiqf->produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="batch_no" class="form-label">Batch No.</label>
                                <input type="text" class="form-control" id="batch_no" name="batch_no" value="<?= $pspsiqf->batch_no ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stdct" class="form-label">STD CT.</label>
                                <input type="text" class="form-control" id="stdct" name="stdct" value="<?= $pspsiqf->stdct ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_1" class="form-label">Suhu Pusat Produk 1</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_1" name="suhu_pusat_produk_1" value="<?= $pspsiqf->suhu_pusat_produk_1 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_2" class="form-label">Suhu Pusat Produk 2</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_2" name="suhu_pusat_produk_2" value="<?= $pspsiqf->suhu_pusat_produk_2 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_3" class="form-label">Suhu Pusat Produk 3</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_3" name="suhu_pusat_produk_3" value="<?= $pspsiqf->suhu_pusat_produk_3 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_4" class="form-label">Suhu Pusat Produk 4</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_4" name="suhu_pusat_produk_4" value="<?= $pspsiqf->suhu_pusat_produk_4 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_5" class="form-label">Suhu Pusat Produk 5</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_5" name="suhu_pusat_produk_5" value="<?= $pspsiqf->suhu_pusat_produk_5 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_6" class="form-label">Suhu Pusat Produk 6</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_6" name="suhu_pusat_produk_6" value="<?= $pspsiqf->suhu_pusat_produk_6 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_7" class="form-label">Suhu Pusat Produk 7</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_7" name="suhu_pusat_produk_7" value="<?= $pspsiqf->suhu_pusat_produk_7 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_8" class="form-label">Suhu Pusat Produk 8</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_8" name="suhu_pusat_produk_8" value="<?= $pspsiqf->suhu_pusat_produk_8 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_9" class="form-label">Suhu Pusat Produk 9</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_9" name="suhu_pusat_produk_9" value="<?= $pspsiqf->suhu_pusat_produk_9 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_10" class="form-label">Suhu Pusat Produk 10</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_10" name="suhu_pusat_produk_10" value="<?= $pspsiqf->suhu_pusat_produk_10 ?>">
                            </div>
                            <div class="mb-3">
                                <label for="suhu_pusat_produk_x" class="form-label">Suhu Pusat Produk x</label>
                                <input type="text" class="form-control" id="suhu_pusat_produk_x" name="suhu_pusat_produk_x" value="<?= $pspsiqf->suhu_pusat_produk_x ?>">
                            </div>
                            <div class="mb-3">
                                <label for="problem" class="form-label">Problem</label>
                                <input type="text" class="form-control" id="problem" name="problem" value="<?= $pspsiqf->problem ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tindakan_koreksi" class="form-label">Tindakan Koreksi</label>
                                <input type="text" class="form-control" id="tindakan_koreksi" name="tindakan_koreksi" value="<?= $pspsiqf->tindakan_koreksi ?>">
                            </div>
                        
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $pspsiqf->catatan ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pspsiqf') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

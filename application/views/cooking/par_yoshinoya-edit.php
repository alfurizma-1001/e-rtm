<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Parameter Produk Saus Yoshinoya</h5>
            <div class="card-body">
                <form action="<?= base_url('par_yoshinoya/update/' . $par_yoshinoya->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $par_yoshinoya->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="saus" class="form-label">Saus</label>
                                <input type="text" class="form-control" id="saus" name="saus"
                                    value="<?= $par_yoshinoya->saus ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="shift" name="shift"
                                    value="<?= $par_yoshinoya->shift ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                                <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi"
                                    value="<?= $par_yoshinoya->tanggal_produksi ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $par_yoshinoya->kode_produksi ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="suhu_pengukuran" class="form-label">Suhu Pengukuran</label>
                                <input type="text" class="form-control" id="suhu_pengukuran" name="suhu_pengukuran"
                                    value="<?= $par_yoshinoya->suhu_pengukuran ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="brix" class="form-label">Brix</label>
                                <input type="text" class="form-control" id="brix" name="brix"
                                    value="<?= $par_yoshinoya->brix ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="salt" class="form-label">Salt</label>
                                <input type="text" class="form-control" id="salt" name="salt"
                                    value="<?= $par_yoshinoya->salt ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="viscositas" class="form-label">Viscositas</label>
                                <input type="text" class="form-control" id="viscositas" name="viscositas"
                                    value="<?= $par_yoshinoya->viscositas ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="brookfield" class="form-label">Brookfield</label>
                                <input type="text" class="form-control" id="brookfield" name="brookfield"
                                    value="<?= $par_yoshinoya->brookfield ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="brookfield_setelah_frozen" class="form-label">Brookfield Setelah
                                    Frozen</label>
                                <input type="text" class="form-control" id="brookfield_setelah_frozen"
                                    name="brookfield_setelah_frozen"
                                    value="<?= $par_yoshinoya->brookfield_setelah_frozen ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $par_yoshinoya->catatan ?>">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('par_yoshinoya') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
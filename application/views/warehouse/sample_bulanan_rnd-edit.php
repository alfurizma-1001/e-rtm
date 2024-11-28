<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Sample Bulanan RND</h5>
            <div class="card-body">
                <form action="<?= base_url('sample_bulanan_rnd/update/' . $sample_bulanan_rnd->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $sample_bulanan_rnd->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plant" class="form-label">Plant</label>
                                <input type="text" class="form-control" id="plant" name="plant"
                                    value="<?= $sample_bulanan_rnd->plant ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_bulan" class="form-label">Sample Bulan</label>
                                <input type="text" class="form-control" id="sample_bulan" name="sample_bulan"
                                    value="<?= $sample_bulanan_rnd->sample_bulan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $sample_bulanan_rnd->date ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_frozen" class="form-label">Sample Storage Frozen</label>
                                <input type="text" class="form-control" id="sample_storage_frozen"
                                    name="sample_storage_frozen"
                                    value="<?= $sample_bulanan_rnd->sample_storage_frozen ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_chilled" class="form-label">Sample Storage Chilled</label>
                                <input type="text" class="form-control" id="sample_storage_chilled"
                                    name="sample_storage_chilled"
                                    value="<?= $sample_bulanan_rnd->sample_storage_chilled ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_other" class="form-label">Sample Storage Other</label>
                                <input type="text" class="form-control" id="sample_storage_other"
                                    name="sample_storage_other"
                                    value="<?= $sample_bulanan_rnd->sample_storage_other ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $sample_bulanan_rnd->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $sample_bulanan_rnd->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="best_before" class="form-label">Best Before</label>
                                <input type="text" class="form-control" id="best_before" name="best_before"
                                    value="<?= $sample_bulanan_rnd->best_before ?>">
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="<?= $sample_bulanan_rnd->quantity ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $sample_bulanan_rnd->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $sample_bulanan_rnd->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('sample_bulanan_rnd') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
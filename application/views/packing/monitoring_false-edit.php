<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Monitoring False Rejection</h5>
            <div class="card-body">
                <form action="<?= base_url('monitoring_false/update/' . $monitoring_false->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $monitoring_false->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mesin" class="form-label">Mesin</label>
                                <input type="text" class="form-control" id="mesin" name="mesin"
                                    value="<?= $monitoring_false->mesin ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $monitoring_false->date ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $monitoring_false->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $monitoring_false->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_pack_tdklolos" class="form-label">Jumlah Pack Tidak Lolos</label>
                                <input type="number" class="form-control" id="jumlah_pack_tdklolos"
                                    name="jumlah_pack_tdklolos" value="<?= $monitoring_false->jumlah_pack_tdklolos ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_pack_kontaminan" class="form-label">Jumlah Pack Kontaminan</label>
                                <input type="number" class="form-control" id="jumlah_pack_kontaminan"
                                    name="jumlah_pack_kontaminan"
                                    value="<?= $monitoring_false->jumlah_pack_kontaminan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kontaminan" class="form-label">Jenis Kontaminan</label>
                                <input type="text" class="form-control" id="jenis_kontaminan" name="jenis_kontaminan"
                                    value="<?= $monitoring_false->jenis_kontaminan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="posisi_kontaminan" class="form-label">Posisi Kontaminan</label>
                                <input type="text" class="form-control" id="posisi_kontaminan" name="posisi_kontaminan"
                                    value="<?= $monitoring_false->posisi_kontaminan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="false_rejections" class="form-label">False Rejections</label>
                                <input type="text" class="form-control" id="false_rejections" name="false_rejections"
                                    value="<?= $monitoring_false->false_rejections ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan"
                                    name="catatan"><?= $monitoring_false->catatan ?></textarea>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('monitoring_false') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
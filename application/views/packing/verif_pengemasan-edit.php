<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan Pemasakan Dengan Steamer</h5>
            <div class="card-body">
                <form action="<?= base_url('verifikasi_pengemasan/update/' . $verifikasi_pengemasan->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $verifikasi_pengemasan->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $verifikasi_pengemasan->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($verifikasi_pengemasan->shift == 1) ? 'selected' : '' ?>>Shift 1
                                    </option>
                                    <option value="2" <?= ($verifikasi_pengemasan->shift == 2) ? 'selected' : '' ?>>Shift 2
                                    </option>
                                    <option value="3" <?= ($verifikasi_pengemasan->shift == 3) ? 'selected' : '' ?>>Shift 3
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="jam" name="jam"
                                    value="<?= $verifikasi_pengemasan->jam ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tnama_produk" class="form-label">Nama Produk (T)</label>
                                <input type="text" class="form-control" id="tnama_produk" name="tnama_produk"
                                    value="<?= $verifikasi_pengemasan->tnama_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tprod_code" class="form-label">Product Code (T)</label>
                                <input type="text" class="form-control" id="tprod_code" name="tprod_code"
                                    value="<?= $verifikasi_pengemasan->tprod_code ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tbb" class="form-label">Best Before (T)</label>
                                <input type="text" class="form-control" id="tbb" name="tbb"
                                    value="<?= $verifikasi_pengemasan->tbb ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tqr_code" class="form-label">QR Code (T)</label>
                                <input type="text" class="form-control" id="tqr_code" name="tqr_code"
                                    value="<?= $verifikasi_pengemasan->tqr_code ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tok_tdk" class="form-label">OK/TDK OK (T)</label>
                                <input type="text" class="form-control" id="tok_tdk" name="tok_tdk"
                                    value="<?= $verifikasi_pengemasan->tok_tdk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bnama_produk" class="form-label">Nama Produk (B)</label>
                                <input type="text" class="form-control" id="bnama_produk" name="bnama_produk"
                                    value="<?= $verifikasi_pengemasan->bnama_produk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bprod_code" class="form-label">Product Code (B)</label>
                                <input type="text" class="form-control" id="bprod_code" name="bprod_code"
                                    value="<?= $verifikasi_pengemasan->bprod_code ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bbb" class="form-label">Best Before (B)</label>
                                <input type="text" class="form-control" id="bbb" name="bbb"
                                    value="<?= $verifikasi_pengemasan->bbb ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bisi" class="form-label">Isi/Box (B)</label>
                                <input type="text" class="form-control" id="bisi" name="bisi"
                                    value="<?= $verifikasi_pengemasan->bisi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bok_tdk" class="form-label">OK/TDK OK (B)</label>
                                <input type="text" class="form-control" id="bok_tdk" name="bok_tdk"
                                    value="<?= $verifikasi_pengemasan->bok_tdk ?>">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $verifikasi_pengemasan->keterangan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $verifikasi_pengemasan->catatan ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('verifikasi_pengemasan') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
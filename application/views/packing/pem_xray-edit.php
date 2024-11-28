<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Pemeriksaan X-Ray</h5>
            <div class="card-body">
                <form action="<?= base_url('pem_xray/update/' . $pem_xray->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $pem_xray->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $pem_xray->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($pem_xray->shift == 1) ? 'selected' : '' ?>>Shift 1</option>
                                    <option value="2" <?= ($pem_xray->shift == 2) ? 'selected' : '' ?>>Shift 2</option>
                                    <option value="3" <?= ($pem_xray->shift == 3) ? 'selected' : '' ?>>Shift 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul"
                                    value="<?= $pem_xray->pukul ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi"
                                    value="<?= $pem_xray->kode_produksi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="no_program" class="form-label">No Program</label>
                                <input type="text" class="form-control" id="no_program" name="no_program"
                                    value="<?= $pem_xray->no_program ?>">
                            </div>

                            <div class="mb-3">
                                <label for="glass_ball_1" class="form-label">Glass Ball 1</label>
                                <input type="text" class="form-control" id="glass_ball_1" name="glass_ball_1"
                                    value="<?= $pem_xray->glass_ball_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="glass_ball_2" class="form-label">Glass Ball 2</label>
                                <input type="text" class="form-control" id="glass_ball_2" name="glass_ball_2"
                                    value="<?= $pem_xray->glass_ball_2 ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="ceramic_1" class="form-label">Ceramic 1</label>
                                <input type="text" class="form-control" id="ceramic_1" name="ceramic_1"
                                    value="<?= $pem_xray->ceramic_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ceramic_2" class="form-label">Ceramic 2</label>
                                <input type="text" class="form-control" id="ceramic_2" name="ceramic_2"
                                    value="<?= $pem_xray->ceramic_2 ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sus_wire_1" class="form-label">SUS Wire 1</label>
                                <input type="text" class="form-control" id="sus_wire_1" name="sus_wire_1"
                                    value="<?= $pem_xray->sus_wire_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sus_wire_2" class="form-label">SUS Wire 2</label>
                                <input type="text" class="form-control" id="sus_wire_2" name="sus_wire_2"
                                    value="<?= $pem_xray->sus_wire_2 ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sus_ball_1" class="form-label">SUS Ball 1</label>
                                <input type="text" class="form-control" id="sus_ball_1" name="sus_ball_1"
                                    value="<?= $pem_xray->sus_ball_1 ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sus_ball_2" class="form-label">SUS Ball 2</label>
                                <input type="text" class="form-control" id="sus_ball_2" name="sus_ball_2"
                                    value="<?= $pem_xray->sus_ball_2 ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $pem_xray->keterangan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control" id="tindakan" name="tindakan"
                                    value="<?= $pem_xray->tindakan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $pem_xray->catatan ?>">
                            </div>



                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('pem_xray') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
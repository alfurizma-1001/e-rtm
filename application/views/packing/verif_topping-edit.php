<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Packing /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Kontaminasi Benda Asing</h5>
            <div class="card-body">
                <form action="<?= base_url('verif_topping/update/' . $verif_topping->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $verif_topping->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $verif_topping->date ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="shift" class="form-label">Shift</label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="1" <?= ($verif_topping->shift == 1) ? 'selected' : '' ?>>Shift
                                        1</option>
                                    <option value="2" <?= ($verif_topping->shift == 2) ? 'selected' : '' ?>>Shift
                                        2</option>
                                    <option value="3" <?= ($verif_topping->shift == 3) ? 'selected' : '' ?>>Shift
                                        3</option>
                                </select>
                            </div>
                           
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= $verif_topping->nama_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="kode_produk" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                    value="<?= $verif_topping->kode_produk ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_topping" class="form-label">Jenis Topping</label>
                                <input type="text" class="form-control" id="jenis_topping" name="jenis_topping"
                                    value="<?= $verif_topping->jenis_topping ?>">
                            </div>

                            <div class="mb-3">
                                <label for="standar" class="form-label">Standar</label>
                                <input type="text" class="form-control" id="standar" name="standar"
                                    value="<?= $verif_topping->standar ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pukul" class="form-label">Pukul</label>
                                <input type="time" class="form-control" id="pukul" name="pukul"
                                    value="<?= $verif_topping->pukul ?>">
                            </div>

                            <div class="mb-3">
                                <label for="gramasi" class="form-label">Gramasi</label>
                                <input type="text" class="form-control" id="gramasi" name="gramasi"
                                    value="<?= $verif_topping->gramasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="p_pukul" class="form-label">P Pukul</label>
                                <input type="time" class="form-control" id="p_pukul" name="p_pukul"
                                    value="<?= $verif_topping->p_pukul ?>">
                            </div>

                            <div class="mb-3">
                                <label for="p_gramasi" class="form-label">P Gramasi</label>
                                <input type="text" class="form-control" id="p_gramasi" name="p_gramasi"
                                    value="<?= $verif_topping->p_gramasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pp_pukul" class="form-label">PP Pukul</label>
                                <input type="time" class="form-control" id="pp_pukul" name="pp_pukul"
                                    value="<?= $verif_topping->pp_pukul ?>">
                            </div>

                            <div class="mb-3">
                                <label for="pp_gramasi" class="form-label">PP Gramasi</label>
                                <input type="text" class="form-control" id="pp_gramasi" name="pp_gramasi"
                                    value="<?= $verif_topping->pp_gramasi ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control" id="tindakan" name="tindakan"
                                    value="<?= $verif_topping->tindakan ?>">
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $verif_topping->catatan ?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('verif_topping') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
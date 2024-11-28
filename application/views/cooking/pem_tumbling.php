<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Pemeriksaan Pemasakan
            Dengan Tumbling</h4>
        <div class="demo-inline-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= base_url('pem_tumbling/tambah') ?>" class="btn btn-primary">
                    <span class="tf-icons bx bxs-plus-circle"></span>&nbsp; Tambah
                </a>
                <div class="d-flex align-items-center">
                    <label for="tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" class="form-control mr-2" id="tanggal" name="tanggal">
                </div>

                <script>
                    document.getElementById('tanggal').addEventListener('input', function () {
                        const filterDate = this.value;  // Get the selected date
                        const table = document.getElementById('tumblingTable');
                        const rows = table.querySelectorAll('tbody tr');  // Get all rows in the table body

                        rows.forEach(row => {
                            const dateCell = row.cells[1];  // Assuming the date is in the second column
                            const rowDate = dateCell.textContent.trim();  // Get the date value from the row

                            // Check if the row's date starts with the selected date (in YYYY-MM-DD format)
                            if (rowDate.startsWith(filterDate)) {
                                row.style.display = '';  // Show the row if it matches the filter
                            } else {
                                row.style.display = 'none';  // Hide the row if it doesn't match the filter
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <hr class="my-5" />
        <!-- Responsive Table -->
        <div class="card">
            <?php if ($this->session->flashdata('success_msg')): ?>
                <div id="successModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Success!</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?= $this->session->flashdata('success_msg') ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="close btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <?php if ($this->session->flashdata('error_msg')): ?>
                <div id="errorModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Error!</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?= $this->session->flashdata('error_msg') ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="close btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <!-- / Alert Modals -->
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Data Pemeriksaan Pemasakan Dengan Tumbling</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="tumblingTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Nama Produk</th>
                                <th>Batch No</th>
                                <th>Identifikasi Daging</th>
                                <th>Asal</th>
                                <th>Kode Item 1</th>
                                <th>Kode Item 2</th>
                                <th>Kode Item 3</th>
                                <th>Kode Item 4</th>
                                <th>Berat Item 1</th>
                                <th>Berat Item 2</th>
                                <th>Berat Item 3</th>
                                <th>Berat Item 4</th>
                                <th>Suhu Daging Item 1</th>
                                <th>Suhu Daging Item 2</th>
                                <th>Suhu Daging Item 3</th>
                                <th>Suhu Daging Item 4</th>
                                <th>Rata-rata Item 1</th>
                                <th>Rata-rata Item 2</th>
                                <th>Rata-rata Item 3</th>
                                <th>Rata-rata Item 4</th>
                                <th>Kondisi Daging</th>
                                <th>Marinade Bahan Utama 1</th>
                                <th>Marinade Bahan Utama 2</th>
                                <th>Marinade Bahan Utama 3</th>
                                <th>Marinade Bahan Utama 4</th>
                                <th>Marinade Kode 1</th>
                                <th>Marinade Kode 2</th>
                                <th>Marinade Kode 3</th>
                                <th>Marinade Kode 4</th>
                                <th>Marinade Berat 1</th>
                                <th>Marinade Berat 2</th>
                                <th>Marinade Berat 3</th>
                                <th>Marinade Berat 4</th>
                                <th>Marinade Kode Next 1</th>
                                <th>Marinade Kode Next 2</th>
                                <th>Marinade Kode Next 3</th>
                                <th>Marinade Kode Next 4</th>
                                <th>Marinade Berat Next 1</th>
                                <th>Marinade Berat Next 2</th>
                                <th>Marinade Berat Next 3</th>
                                <th>Marinade Berat Next 4</th>
                                <th>Bahan Lain</th>
                                <th>Bahan Lain Kode Item 1</th>
                                <th>Bahan Lain Berat Item 1</th>
                                <th>Bahan Lain Sensori Item 1</th>
                                <th>Bahan Lain Kode Item 2</th>
                                <th>Bahan Lain Berat Item 2</th>
                                <th>Bahan Lain Sensori Item 2</th>
                                <th>Bahan Lain Kode Item 3</th>
                                <th>Bahan Lain Berat Item 3</th>
                                <th>Bahan Lain Sensori Item 3</th>
                                <th>Bahan Lain Kode Item 4</th>
                                <th>Bahan Lain Berat Item 4</th>
                                <th>Bahan Lain Sensori Item 4</th>
                                <th>Air</th>
                                <th>Suhu Air</th>
                                <th>Suhu Marinade</th>
                                <th>Lama Pengadukan</th>
                                <th>Brix Salinity</th>
                                <th>Drum On</th>
                                <th>Drum Off</th>
                                <th>Drum Speed</th>
                                <th>Vacuum Time</th>
                                <th>Total Time</th>
                                <th>Mulai Item 1</th>
                                <th>Mulai Item 2</th>
                                <th>Mulai Item 3</th>
                                <th>Mulai Item 4</th>
                                <th>Selesai Item 1</th>
                                <th>Selesai Item 2</th>
                                <th>Selesai Item 3</th>
                                <th>Selesai Item 4</th>
                                <th>Tumbling Suhu Daging Item 1</th>
                                <th>Tumbling Suhu Daging Item 2</th>
                                <th>Tumbling Suhu Daging Item 3</th>
                                <th>Tumbling Suhu Daging Item 4</th>
                                <th>Tumbling Rata-rata</th>
                                <th>Kondisi</th>
                                <th>Catatan Bawah</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pem_tumbling as $val) {
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $val->date; ?></td>
                                    <td><?= $val->shift; ?></td>
                                    <td><?= $val->nama_produk; ?></td>
                                    <td><?= $val->batch_no; ?></td>
                                    <td><?= $val->identifikasi_daging; ?></td>
                                    <td><?= $val->asal; ?></td>
                                    <td><?= $val->kode_item_1; ?></td>
                                    <td><?= $val->kode_item_2; ?></td>
                                    <td><?= $val->kode_item_3; ?></td>
                                    <td><?= $val->kode_item_4; ?></td>
                                    <td><?= $val->berat_item_1; ?></td>
                                    <td><?= $val->berat_item_2; ?></td>
                                    <td><?= $val->berat_item_3; ?></td>
                                    <td><?= $val->berat_item_4; ?></td>
                                    <td><?= $val->suhu_daging_item_1; ?></td>
                                    <td><?= $val->suhu_daging_item_2; ?></td>
                                    <td><?= $val->suhu_daging_item_3; ?></td>
                                    <td><?= $val->suhu_daging_item_4; ?></td>
                                    <td><?= $val->rata_rata_item_1; ?></td>
                                    <td><?= $val->rata_rata_item_2; ?></td>
                                    <td><?= $val->rata_rata_item_3; ?></td>
                                    <td><?= $val->rata_rata_item_4; ?></td>
                                    <td><?= $val->kondisi_daging; ?></td>
                                    <td><?= $val->marinade_bahan_utama_1; ?></td>
                                    <td><?= $val->marinade_bahan_utama_2; ?></td>
                                    <td><?= $val->marinade_bahan_utama_3; ?></td>
                                    <td><?= $val->marinade_bahan_utama_4; ?></td>
                                    <td><?= $val->marinade_kode_1; ?></td>
                                    <td><?= $val->marinade_kode_2; ?></td>
                                    <td><?= $val->marinade_kode_3; ?></td>
                                    <td><?= $val->marinade_kode_4; ?></td>
                                    <td><?= $val->marinade_berat_1; ?></td>
                                    <td><?= $val->marinade_berat_2; ?></td>
                                    <td><?= $val->marinade_berat_3; ?></td>
                                    <td><?= $val->marinade_berat_4; ?></td>
                                    <td><?= $val->marinade_kode_next_1; ?></td>
                                    <td><?= $val->marinade_kode_next_2; ?></td>
                                    <td><?= $val->marinade_kode_next_3; ?></td>
                                    <td><?= $val->marinade_kode_next_4; ?></td>
                                    <td><?= $val->marinade_berat_next_1; ?></td>
                                    <td><?= $val->marinade_berat_next_2; ?></td>
                                    <td><?= $val->marinade_berat_next_3; ?></td>
                                    <td><?= $val->marinade_berat_next_4; ?></td>
                                    <td><?= $val->bahan_lain; ?></td>
                                    <td><?= $val->bahan_lain_kode_item_1; ?></td>
                                    <td><?= $val->bahan_lain_berat_item_1; ?></td>
                                    <td><?= $val->bahan_lain_sensori_item_1; ?></td>
                                    <td><?= $val->bahan_lain_kode_item_2; ?></td>
                                    <td><?= $val->bahan_lain_berat_item_2; ?></td>
                                    <td><?= $val->bahan_lain_sensori_item_2; ?></td>
                                    <td><?= $val->bahan_lain_kode_item_3; ?></td>
                                    <td><?= $val->bahan_lain_berat_item_3; ?></td>
                                    <td><?= $val->bahan_lain_sensori_item_3; ?></td>
                                    <td><?= $val->bahan_lain_kode_item_4; ?></td>
                                    <td><?= $val->bahan_lain_berat_item_4; ?></td>
                                    <td><?= $val->bahan_lain_sensori_item_4; ?></td>
                                    <td><?= $val->air; ?></td>
                                    <td><?= $val->suhu_air; ?></td>
                                    <td><?= $val->suhu_marinade; ?></td>
                                    <td><?= $val->lama_pengadukan; ?></td>
                                    <td><?= $val->brix_salinity; ?></td>
                                    <td><?= $val->drum_on; ?></td>
                                    <td><?= $val->drum_off; ?></td>
                                    <td><?= $val->drum_speed; ?></td>
                                    <td><?= $val->vacuum_time; ?></td>
                                    <td><?= $val->total_time; ?></td>
                                    <td><?= $val->mulai_item_1; ?></td>
                                    <td><?= $val->mulai_item_2; ?></td>
                                    <td><?= $val->mulai_item_3; ?></td>
                                    <td><?= $val->mulai_item_4; ?></td>
                                    <td><?= $val->selesai_item_1; ?></td>
                                    <td><?= $val->selesai_item_2; ?></td>
                                    <td><?= $val->selesai_item_3; ?></td>
                                    <td><?= $val->selesai_item_4; ?></td>
                                    <td><?= $val->tumbling_suhu_daging_item_1; ?></td>
                                    <td><?= $val->tumbling_suhu_daging_item_2; ?></td>
                                    <td><?= $val->tumbling_suhu_daging_item_3; ?></td>
                                    <td><?= $val->tumbling_suhu_daging_item_4; ?></td>
                                    <td><?= $val->tumbling_rata_rata; ?></td>
                                    <td><?= $val->kondisi; ?></td>
                                    <td><?= $val->catatan_bawah; ?></td>
                                    <td><?= $val->catatan; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('pem_tumbling/edit/' . $val->uuid); ?>"
                                            class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('pem_tumbling/export_tumbling_excel/' . $val->uuid); ?>"
                                            class="btn btn-success" target="_blank" title="Export Tumbling Report to Excel">
                                            <i class="bx bx-file"></i> Export to Excel
                                        </a>
                                        <a href="<?= base_url('pem_tumbling/hapus/' . $val->uuid); ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
    </div>
    <script>
        $(document).ready(function () {
            <?php if ($this->session->flashdata('success_msg')): ?>
                $('#successModal').modal('show');
            <?php endif ?>

            <?php if ($this->session->flashdata('error_msg')): ?>
                $('#errorModal').modal('show');
            <?php endif ?>

            $('.modal .close').on('click', function () {
                $(this).closest('.modal').modal('hide');
            });
        });
    </script>
</div>
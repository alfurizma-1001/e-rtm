<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span>Pemeriksaan Pemasakan Noodle
        </h4>
        <div class="demo-inline-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= base_url('pem_masak_noodle/tambah') ?>" class="btn btn-primary">
                    <span class="tf-icons bx bxs-plus-circle"></span>&nbsp; Tambah
                </a>
                <div class="d-flex align-items-center">
                    <label for="tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" class="form-control mr-2" id="tanggal" name="tanggal">
                </div>
                <script>
                    document.getElementById('tanggal').addEventListener('input', function () {
                        const filterDate = this.value;
                        const table = document.getElementById('pem_masak_noodleTable');
                        const rows = table.querySelectorAll('tbody tr');

                        rows.forEach(row => {
                            const dateCell = row.cells[2]; // Assuming the date is in the 3rd column
                            if (dateCell.textContent.startsWith(filterDate)) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
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
                <h5 class="card-header">Data Pemeriksaan Pemasakan Noodle</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="pem_masak_noodleTable">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>No</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Nama Produk</th>
                                <th>Kode Produksi</th>
                                <th>Mixing Bahan Utama</th>
                                <th>Mixing Kode Produksi</th>
                                <th>Mixing Berat</th>
                                <th>Bahan Lain</th>
                                <th>Bahan Lain Kode Produksi Item 1</th>
                                <th>Bahan Lain Bera Item 1t</th>
                                <th>Bahan Lain Kode Produksi Item 1</th>
                                <th>Bahan Lain Berat Item 1</th>
                                <th>Waktu Proses</th>
                                <th>Vacuum</th>
                                <th>Suhu Adonan</th>
                                <th>Aging Waktu</th>
                                <th>Aging RH</th>
                                <th>Aging Suhu Ruangan</th>
                                <th>Rolling Ukuran Tebal</th>
                                <th>Cutting Sampling Berat</th>
                                <th>Boiling Suhu Setting Water</th>
                                <th>Boiling Suhu Actual Water</th>
                                <th>Boiling Waktu</th>
                                <th>Washing Suhu Setting Water</th>
                                <th>Washing Suhu Actual Water</th>
                                <th>Washing Waktu</th>
                                <th>Cooling Suhu Setting Water</th>
                                <th>Cooling Suhu Actual Water</th>
                                <th>Cooling Waktu</th>
                                <th>Lama Proses Jam Mulai</th>
                                <th>Lama Proses Jam Selesai</th>
                                <th>Sensori Suhu Produk Akhir</th>
                                <th>Sensori Suhu Produk Setelah</th>
                                <th>Sensori Rasa</th>
                                <th>Sensori Kekenyalan</th>
                                <th>Sensori Warna</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pem_masak_noodle as $val) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="select[]" value="<?= $val->uuid; ?>"
                                            class="rowCheckbox">
                                        <!-- Checkbox for each row -->
                                    </td>
                                    <td><?= $no; ?></td>
                                    <td><?= $val->date; ?></td>
                                    <td><?= $val->shift; ?></td>
                                    <td><?= $val->nama_produk; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
                                    <td><?= $val->mixing_bahan_utama; ?></td>
                                    <td><?= $val->mixing_kode_produksi; ?></td>
                                    <td><?= $val->mixing_berat; ?></td>
                                    <td><?= $val->bahan_lain; ?></td>
                                    <td><?= $val->bahan_lain_kode_produksi; ?></td>
                                    <td><?= $val->bahan_lain_berat; ?></td>
                                    <td><?= $val->bahan_lain_kode_produksi_item2; ?></td>
                                    <td><?= $val->bahan_lain_berat_item2; ?></td>
                                    <td><?= $val->waktu_proses; ?></td>
                                    <td><?= $val->vacuum; ?></td>
                                    <td><?= $val->suhu_adonan; ?></td>
                                    <td><?= $val->aging_waktu; ?></td>
                                    <td><?= $val->aging_rh; ?></td>
                                    <td><?= $val->aging_suhu_ruangan; ?></td>
                                    <td><?= $val->rolling_ukuran_tebal; ?></td>
                                    <td><?= $val->cutting_sampling_berat; ?></td>
                                    <td><?= $val->boiling_suhu_setting_water; ?></td>
                                    <td><?= $val->boiling_suhu_actual_water; ?></td>
                                    <td><?= $val->boiling_waktu; ?></td>
                                    <td><?= $val->washing_suhu_setting_water; ?></td>
                                    <td><?= $val->washing_suhu_actual_water; ?></td>
                                    <td><?= $val->washing_waktu; ?></td>
                                    <td><?= $val->cooling_suhu_setting_water; ?></td>
                                    <td><?= $val->cooling_suhu_actual_water; ?></td>
                                    <td><?= $val->cooling_waktu; ?></td>
                                    <td><?= $val->lama_proses_jam_mulai; ?></td>
                                    <td><?= $val->lama_proses_jam_selesai; ?></td>
                                    <td><?= $val->sensori_suhu_produk_akhir; ?></td>
                                    <td><?= $val->sensori_suhu_produk_setelah; ?></td>
                                    <td><?= $val->sensori_rasa; ?></td>
                                    <td><?= $val->sensori_kekenyalan; ?></td>
                                    <td><?= $val->sensori_warna; ?></td>
                                    <td><?= $val->catatan; ?></td>
                                    <td>
                                        <a href="<?= base_url('pem_masak_noodle/edit/' . $val->uuid); ?>"
                                            class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('pem_masak_noodle/print_excel/' . $val->uuid); ?>"
                                            class="btn btn-info" target="_blank">
                                            <i class="bx bx-printer"></i> Print Excel
                                        </a>
                                        <a href="<?= base_url('pem_masak_noodle/hapus/' . $val->uuid); ?>"
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
                <!-- Select All Checkbox Below the Table -->
                

                <div class="text-right mt-2" style="padding: 0 15px;"> <!-- Added padding -->
                    <a href="javascript:void(0);" class="btn btn-info btn-lg" onclick="downloadMultipleExcel()">
                        <i class="bx bx-printer"></i> Multi Download
                    </a>
                </div>
                <br>

                <script>
                    // JavaScript for "Select All" functionality
                    document.getElementById("selectAll").addEventListener("click", function () {
                        let checkboxes = document.querySelectorAll(".rowCheckbox");
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });
                    });

                    function downloadMultipleExcel() {
                        // Collect all selected checkboxes
                        let selectedUUIDs = [];
                        document.querySelectorAll('input[name="select[]"]:checked').forEach(function (checkbox) {
                            selectedUUIDs.push(checkbox.value);
                        });

                        // Check if any checkboxes are selected
                        if (selectedUUIDs.length === 0) {
                            alert("Please select at least one item.");
                            return;
                        }

                        // Build the URL with selected UUIDs as query parameters
                        let baseUrl = '<?php echo site_url("pem_masak_noodle/print_multiple_excel"); ?>';
                        let url = baseUrl + '?uuids=' + encodeURIComponent(selectedUUIDs.join(','));

                        // Redirect to the new URL
                        window.location.href = url;
                    }
                </script>
                <style>
                    /* Custom styles for the checkbox and buttons */
                    .form-check-label {
                        font-size: 1.1rem;
                        margin-left: 5px;
                    }

                    #selectAll {
                        width: 20px;
                        /* Size of the checkbox */
                        height: 20px;
                    }

                    .btn-info {
                        background-color: #228B22;
                        border-color: #228B22;
                        font-size: 1rem;
                        /* Larger font size for better visibility */
                        padding: 10px 20px;
                        /* Increased padding for better button size */
                        border-radius: 5px;
                        /* Rounded corners */
                    }

                    .btn-info:hover {
                        background-color: #138496;
                        /* Darker shade on hover */
                        border-color: #117a8b;
                        /* Darker border on hover */
                    }
                </style>
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
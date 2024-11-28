<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Verifikasi Produk
            Institusi</h4>
        <div class="demo-inline-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= base_url('verif_institusi/tambah') ?>" class="btn btn-primary">
                    <span class="tf-icons bx bxs-plus-circle"></span>&nbsp; Tambah
                </a>
                <div class="d-flex align-items-center">
                    <label for="tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" class="form-control mr-2" id="tanggal" name="tanggal">
                </div>
                <script>
                    document.getElementById('tanggal').addEventListener('input', function () {
                        const filterDate = this.value;
                        const table = document.getElementById('verifinstitusiTable');
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
                <h5 class="card-header">Data Verifikasi Produk Institusi</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="verifinstitusiTable">
                        <thead>
                            <tr>
                                <th>Select</th> <!-- Added header for the checkbox column -->
                                <th>No</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Jenis Produk</th>
                                <th>Kode Produksi</th>
                                <th>Waktu Proses</th>
                                <th>Lokasi</th>
                                <th>Suhu Produk |Sebelum</th>
                                <th>Suhu Produk |Setelah</th>
                                <th>Sensori</th>
                                <th>Ket</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($verif_institusi as $val) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="select[]" value="<?= $val->uuid; ?>">
                                        <!-- Checkbox for each row -->
                                    </td>
                                    <td><?= $no; ?></td>
                                    <td><?= $val->date; ?></td>
                                    <td><?= $val->shift; ?></td>
                                    <td><?= $val->jenis_produk; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
                                    <td><?= $val->waktu_proses; ?></td>
                                    <td><?= $val->lokasi; ?></td>
                                    <td class="text-center"><?= $val->sebelum; ?></td>
                                    <td clas="text-center"><?= $val->sesudah; ?></td>
                                    <td><?= $val->sensori; ?></td>
                                    <td><?= $val->ket; ?></td>
                                    <td><?= $val->catatan; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('verif_institusi/edit/' . $val->uuid); ?>"
                                            class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('verif_institusi/print_excel/' . $val->uuid); ?>"
                                            class="btn btn-info" target="_blank">
                                            <i class="bx bx-printer"></i> Print Excel
                                        </a>
                                        <a href="<?= base_url('verif_institusi/hapus/' . $val->uuid); ?>"
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
                <div class="text-right mt-2">
                    <a href="javascript:void(0);" class="btn btn-info" onclick="downloadMultipleExcel()">
                        <i class="bx bx-printer"></i> Multi Download
                    </a>
                </div>
                <script>
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
                        let baseUrl = '<?php echo site_url("verif_institusi/print_multiple_excel"); ?>';
                        let url = baseUrl + '?uuids=' + encodeURIComponent(selectedUUIDs.join(','));

                        // Redirect to the new URL
                        window.location.href = url;
                    }
                </script>
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
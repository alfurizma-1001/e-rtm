<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Cooking /</span> Parameter Produk Saus
            Yoshinoya</h4>
        <div class="demo-inline-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= base_url('par_yoshinoya/tambah') ?>" class="btn btn-primary">
                    <span class="tf-icons bx bxs-plus-circle"></span>&nbsp; Tambah
                </a>
                <div class="d-flex align-items-center">
                    <label for="tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" class="form-control mr-2" id="tanggal" name="tanggal">
                </div>
                <script>
                    document.getElementById('tanggal').addEventListener('input', function () {
                        const filterDate = this.value;
                        const table = document.getElementById('yoshinoyaTable');
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
                <h5 class="card-header">Data Parameter Produk Saus Yoshinoya</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="yoshinoyaTable">
                        <thead>
                            <tr>
                                <th>Select</th> <!-- Added header for the checkbox column -->
                                <th>No</th>
                                <th>Saus</th>
                                <th>Shift</th>
                                <th>Tanggal Produksi</th>
                                <th>Kode Produksi</th>
                                <th>Suhu Pengukuran</th>
                                <th>Brix</th>
                                <th>Salt</th>
                                <th>Viscositas</th>
                                <th>Brookfield</th>
                                <th>Brookfield Setelah Frozen</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($par_yoshinoya as $val) {
                                ?>
                                <tr>
                                <td>
                                        <input type="checkbox" name="select[]" value="<?= $val->uuid; ?>"
                                            class="rowCheckbox">
                                        <!-- Checkbox for each row -->
                                    </td>
                                    <td><?= $no; ?></td>
                                    <td><?= $val->saus; ?></td>
                                    <td><?= $val->shift; ?></td>
                                    <td><?= $val->tanggal_produksi; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
                                    <td><?= $val->suhu_pengukuran; ?></td>
                                    <td><?= $val->brix; ?></td>
                                    <td><?= $val->salt; ?></td>
                                    <td><?= $val->viscositas; ?></td>
                                    <td><?= $val->brookfield; ?></td>
                                    <td><?= $val->brookfield_setelah_frozen; ?></td>
                                    <td><?= $val->catatan; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('par_yoshinoya/edit/' . $val->uuid); ?>"
                                            class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('par_yoshinoya/print_excel/' . $val->uuid); ?>"
                                            class="btn btn-info" target="_blank">
                                            <i class="bx bx-printer"></i> Print Excel
                                        </a>
                                        <a href="<?= base_url('par_yoshinoya/hapus/' . $val->uuid); ?>"
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
                        let baseUrl = '<?php echo site_url("par_yoshinoya/print_multiple_excel"); ?>';
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
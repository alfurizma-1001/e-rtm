<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span>Laboratory Sample
        </h4>
        <div class="demo-inline-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= base_url('laboratory_sample/tambah') ?>" class="btn btn-primary">
                    <span class="tf-icons bx bxs-plus-circle"></span>&nbsp; Tambah
                </a>
                <div class="d-flex align-items-center">
                    <label for="tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" class="form-control mr-2" id="tanggal" name="tanggal">
                </div>
                <script>
                    document.getElementById('tanggal').addEventListener('input', function () {
                        const filterDate = this.value;
                        const table = document.getElementById('laboratory_sampleTable');
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
                <h5 class="card-header">Data Laboratory Sample</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="laboratory_sampleTable">
                        <thead>
                            <tr>
                           
                                <th>No</th>
                                <th>Plant</th>
                                <th>Sample Type</th>
                                <th>Date</th>
                                <th>Sample Storage Frozen</th>
                                <th>Sample Storage Chilled</th>
                                <th>Sample Storage Other</th>
                                <th>Microbiological</th>
                                <th>Antibiotic Residues</th>
                                <th>Enterococcus</th>
                                <th>TPC</th>
                                <th>Salmonella</th>
                                <th>Coliform</th>
                                <th>Yeast</th>
                                <th>Coli</th>
                                <th>Clostridium</th>
                                <th>Aureus</th>
                                <th>Other (Microbiological)</th>
                                <th>Chemical</th>
                                <th>Pesticide</th>
                                <th>Peroxide</th>
                                <th>pH</th>
                                <th>Ash</th>
                                <th>Fatty</th>
                                <th>Salinity</th>
                                <th>Protein</th>
                                <th>Moisture</th>
                                <th>Other (Chemical)</th>
                                <th>Description</th>
                                <th>Production Code</th>
                                <th>Best Before</th>
                                <th>Quantity</th>
                                <th>Remarks</th>
                                <th>Sample Checking Correct</th>
                                <th>Sample Checking Incorrect</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laboratory_sample as $val) {
                                ?>
                                <tr>
                                    
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($val->plant); ?></td>
                                    <td><?= htmlspecialchars($val->sample_type); ?></td>
                                    <td><?= htmlspecialchars($val->date); ?></td>
                                    <td><?= htmlspecialchars($val->sample_storage_frozen); ?></td>
                                    <td><?= htmlspecialchars($val->sample_storage_chilled); ?></td>
                                    <td><?= htmlspecialchars($val->sample_storage_other); ?></td>
                                    <td><?= htmlspecialchars($val->microbiological); ?></td>
                                    <td><?= htmlspecialchars($val->Antibiotic_residues); ?></td>
                                    <td><?= htmlspecialchars($val->Enterococcus); ?></td>
                                    <td><?= htmlspecialchars($val->TPC); ?></td>
                                    <td><?= htmlspecialchars($val->Salmonella); ?></td>
                                    <td><?= htmlspecialchars($val->Coliform); ?></td>
                                    <td><?= htmlspecialchars($val->Yeast); ?></td>
                                    <td><?= htmlspecialchars($val->coli); ?></td>
                                    <td><?= htmlspecialchars($val->Clostridium); ?></td>
                                    <td><?= htmlspecialchars($val->aureus); ?></td>
                                    <td><?= htmlspecialchars($val->Other); ?></td>
                                    <td><?= htmlspecialchars($val->Chemical); ?></td>
                                    <td><?= htmlspecialchars($val->Pesticide); ?></td>
                                    <td><?= htmlspecialchars($val->Peroxide); ?></td>
                                    <td><?= htmlspecialchars($val->pH); ?></td>
                                    <td><?= htmlspecialchars($val->Ash); ?></td>
                                    <td><?= htmlspecialchars($val->Fatty); ?></td>
                                    <td><?= htmlspecialchars($val->Salinity); ?></td>
                                    <td><?= htmlspecialchars($val->Protein); ?></td>
                                    <td><?= htmlspecialchars($val->Moisture); ?></td>
                                    <td><?= htmlspecialchars($val->Other2); ?></td>
                                    <td><?= htmlspecialchars($val->description); ?></td>
                                    <td><?= htmlspecialchars($val->production_code); ?></td>
                                    <td><?= htmlspecialchars($val->best_before); ?></td>
                                    <td><?= htmlspecialchars($val->quantity); ?></td>
                                    <td><?= htmlspecialchars($val->remarks); ?></td>
                                    <td><?= htmlspecialchars($val->sample_checking_correct); ?></td>
                                    <td><?= htmlspecialchars($val->sample_checking_incorrect); ?></td>
                                    <td>
                                        <a href="<?= base_url('laboratory_sample/edit/' . $val->uuid); ?>"
                                            class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('laboratory_sample/print_excel/' . $val->uuid); ?>"
                                            class="btn btn-info" target="_blank">
                                            <i class="bx bx-printer"></i> Print Excel
                                        </a>
                                        <a href="<?= base_url('laboratory_sample/hapus/' . $val->uuid); ?>"
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
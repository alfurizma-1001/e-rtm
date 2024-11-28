<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span> Sample Bulanan RND
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('laboratory_sample/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plant" class="form-label">Plant</label>
                                <input type="text" class="form-control" id="plant" name="plant"
                                    placeholder="Enter Plant" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_type" class="form-label">Sample Type</label>
                                <input type="text" class="form-control" id="sample_type" name="sample_type"
                                    placeholder="Enter Sample Type" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date" placeholder="Enter Date"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_frozen" class="form-label">Sample Storage Frozen</label>
                                <input type="text" class="form-control" id="sample_storage_frozen"
                                    name="sample_storage_frozen" placeholder="Enter Sample Storage Frozen" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_chilled" class="form-label">Sample Storage
                                    Chilled</label>
                                <input type="text" class="form-control" id="sample_storage_chilled"
                                    name="sample_storage_chilled" placeholder="Enter Sample Storage Chilled" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_other" class="form-label">Sample Storage Other</label>
                                <input type="text" class="form-control" id="sample_storage_other"
                                    name="sample_storage_other" placeholder="Enter Sample Storage Other" required>
                            </div>

                            <div class="mb-3">
                                <label for="microbiological" class="form-label">Microbiological</label>
                                <input type="text" class="form-control" id="microbiological" name="microbiological"
                                    placeholder="Enter Microbiological" required>
                            </div>

                            <div class="mb-3">
                                <label for="Antibiotic_residues" class="form-label">Antibiotic Residues</label>
                                <input type="text" class="form-control" id="Antibiotic_residues"
                                    name="Antibiotic_residues" placeholder="Enter Antibiotic Residues" required>
                            </div>

                            <div class="mb-3">
                                <label for="Enterococcus" class="form-label">Enterococcus</label>
                                <input type="text" class="form-control" id="Enterococcus" name="Enterococcus"
                                    placeholder="Enter Enterococcus" required>
                            </div>

                            <div class="mb-3">
                                <label for="TPC" class="form-label">TPC</label>
                                <input type="text" class="form-control" id="TPC" name="TPC" placeholder="Enter TPC"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Salmonella" class="form-label">Salmonella</label>
                                <input type="text" class="form-control" id="Salmonella" name="Salmonella"
                                    placeholder="Enter Salmonella" required>
                            </div>

                            <div class="mb-3">
                                <label for="Coliform" class="form-label">Coliform</label>
                                <input type="text" class="form-control" id="Coliform" name="Coliform"
                                    placeholder="Enter Coliform" required>
                            </div>

                            <div class="mb-3">
                                <label for="Yeast" class="form-label">Yeast</label>
                                <input type="text" class="form-control" id="Yeast" name="Yeast"
                                    placeholder="Enter Yeast" required>
                            </div>

                            <div class="mb-3">
                                <label for="coli" class="form-label">Coli</label>
                                <input type="text" class="form-control" id="coli" name="coli" placeholder="Enter Coli"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Clostridium" class="form-label">Clostridium</label>
                                <input type="text" class="form-control" id="Clostridium" name="Clostridium"
                                    placeholder="Enter Clostridium" required>
                            </div>

                            <div class="mb-3">
                                <label for="aureus" class="form-label">Aureus</label>
                                <input type="text" class="form-control" id="aureus" name="aureus"
                                    placeholder="Enter Aureus" required>
                            </div>

                            <div class="mb-3">
                                <label for="Other" class="form-label">Other (1)</label>
                                <input type="text" class="form-control" id="Other" name="Other"
                                    placeholder="Enter Other " required>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="Chemical" class="form-label">Chemical</label>
                                <input type="text" class="form-control" id="Chemical" name="Chemical"
                                    placeholder="Enter Chemical" required>
                            </div>

                            <div class="mb-3">
                                <label for="Pesticide" class="form-label">Pesticide</label>
                                <input type="text" class="form-control" id="Pesticide" name="Pesticide"
                                    placeholder="Enter Pesticide" required>
                            </div>

                            <div class="mb-3">
                                <label for="Peroxide" class="form-label">Peroxide</label>
                                <input type="text" class="form-control" id="Peroxide" name="Peroxide"
                                    placeholder="Enter Peroxide" required>
                            </div>

                            <div class="mb-3">
                                <label for="pH" class="form-label">pH</label>
                                <input type="text" class="form-control" id="pH" name="pH" placeholder="Enter pH"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Ash" class="form-label">Ash</label>
                                <input type="text" class="form-control" id="Ash" name="Ash" placeholder="Enter Ash"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Fatty" class="form-label">Fatty</label>
                                <input type="text" class="form-control" id="Fatty" name="Fatty"
                                    placeholder="Enter Fatty" required>
                            </div>

                            <div class="mb-3">
                                <label for="Salinity" class="form-label">Salinity</label>
                                <input type="text" class="form-control" id="Salinity" name="Salinity"
                                    placeholder="Enter Salinity" required>
                            </div>

                            <div class="mb-3">
                                <label for="Protein" class="form-label">Protein</label>
                                <input type="text" class="form-control" id="Protein" name="Protein"
                                    placeholder="Enter Protein" required>
                            </div>

                            <div class="mb-3">
                                <label for="Moisture" class="form-label">Moisture</label>
                                <input type="text" class="form-control" id="Moisture" name="Moisture"
                                    placeholder="Enter Moisture" required>
                            </div>

                            <div class="mb-3">
                                <label for="Other2" class="form-label">Other (2)</label>
                                <input type="text" class="form-control" id="Other2" name="Other2"
                                    placeholder="Enter Other " required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Pakai Koma Bila Item Multiple" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="production_code" class="form-label">Production Code</label>
                                <textarea class="form-control" id="production_code" name="production_code"
                                    placeholder="Pakai Koma Bila Item Multiple" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="best_before" class="form-label">Best Before</label>
                                <textarea class="form-control" id="best_before" name="best_before"
                                    placeholder="Pakai Koma Bila Item Multiple" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <textarea class="form-control" id="quantity" name="quantity"
                                    placeholder="Pakai Koma Bila Item Multiple" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks"
                                    placeholder="Pakai Koma Bila Item Multiple" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="sample_checking_correct" class="form-label">Sample Checking
                                    Correct</label>
                                <input type="text" class="form-control" id="sample_checking_correct"
                                    name="sample_checking_correct" placeholder="Enter Sample Checking Correct" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_checking_incorrect" class="form-label">Sample Checking
                                    Incorrect</label>
                                <input type="text" class="form-control" id="sample_checking_incorrect"
                                    name="sample_checking_incorrect" placeholder="Enter Sample Checking Incorrect"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('laboratory_sample') ?>" class="btn btn-danger"><i class="bx bx-x"></i>
                            Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTimeOptions() {
        const shift = document.getElementById("shift").value;
        const pukulSelect = document.getElementById("pukul");
        pukulSelect.innerHTML = "";

        if (shift === "1") {
            addOption(pukulSelect, "7:00", "7:00");
            addOption(pukulSelect, "8:00", "8:00");
            addOption(pukulSelect, "9:00", "9:00");
            addOption(pukulSelect, "10:00", "10:00");
            addOption(pukulSelect, "11:00", "11:00");
            addOption(pukulSelect, "12:00", "12:00");
            addOption(pukulSelect, "13:00", "13:00");
            addOption(pukulSelect, "14:00", "14:00");
            addOption(pukulSelect, "15:00", "15:00");
        } else if (shift === "2") {
            addOption(pukulSelect, "15:00", "15:00");
            addOption(pukulSelect, "16:00", "16:00");
            addOption(pukulSelect, "17:00", "17:00");
            addOption(pukulSelect, "18:00", "18:00");
            addOption(pukulSelect, "19:00", "19:00");
            addOption(pukulSelect, "20:00", "20:00");
            addOption(pukulSelect, "21:00", "21:00");
            addOption(pukulSelect, "22:00", "22:00");
            addOption(pukulSelect, "23:00", "23:00");
        } else if (shift === "3") {
            addOption(pukulSelect, "23:00", "23:00");
            addOption(pukulSelect, "0:00", "0:00");
            addOption(pukulSelect, "1:00", "1:00");
            addOption(pukulSelect, "2:00", "2:00");
            addOption(pukulSelect, "3:00", "3:00");
            addOption(pukulSelect, "4:00", "4:00");
            addOption(pukulSelect, "5:00", "5:00");
            addOption(pukulSelect, "6:00", "6:00");
            addOption(pukulSelect, "7:00", "7:00");
        }
    }

    function addOption(select, text, value) {
        const option = document.createElement("option");
        option.text = text;
        option.value = value;
        select.add(option);
    }

    var inputDate = document.getElementById('date');

    var now = new Date();
    var year = now.getFullYear();
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var day = String(now.getDate()).padStart(2, '0');

    inputDate.value = year + '-' + month + '-' + day;
    inputTime.value = hours + ':' + minutes;
</script>
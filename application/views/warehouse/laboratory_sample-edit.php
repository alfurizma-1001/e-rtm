<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Laboratory Sample</h5>
            <div class="card-body">
                <form action="<?= base_url('laboratory_sample/update/' . $laboratory_sample->uuid) ?>" method="post">
                    <input type="hidden" name="uuid" value="<?= $laboratory_sample->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plant" class="form-label">Plant</label>
                                <input type="text" class="form-control" id="plant" name="plant"
                                    value="<?= $laboratory_sample->plant ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_type" class="form-label">Sample Type</label>
                                <input type="text" class="form-control" id="sample_type" name="sample_type"
                                    value="<?= $laboratory_sample->sample_type ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date"
                                    value="<?= $laboratory_sample->date ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_frozen" class="form-label">Sample Storage Frozen</label>
                                <input type="text" class="form-control" id="sample_storage_frozen"
                                    name="sample_storage_frozen"
                                    value="<?= $laboratory_sample->sample_storage_frozen ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_chilled" class="form-label">Sample Storage Chilled</label>
                                <input type="text" class="form-control" id="sample_storage_chilled"
                                    name="sample_storage_chilled"
                                    value="<?= $laboratory_sample->sample_storage_chilled ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_other" class="form-label">Sample Storage Other</label>
                                <input type="text" class="form-control" id="sample_storage_other"
                                    name="sample_storage_other" value="<?= $laboratory_sample->sample_storage_other ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="microbiological" class="form-label">Microbiological</label>
                                <input type="text" class="form-control" id="microbiological" name="microbiological"
                                    value="<?= $laboratory_sample->microbiological ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Antibiotic_residues" class="form-label">Antibiotic Residues</label>
                                <input type="text" class="form-control" id="Antibiotic_residues"
                                    name="Antibiotic_residues" value="<?= $laboratory_sample->Antibiotic_residues ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Enterococcus" class="form-label">Enterococcus</label>
                                <input type="text" class="form-control" id="Enterococcus" name="Enterococcus"
                                    value="<?= $laboratory_sample->Enterococcus ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="TPC" class="form-label">TPC</label>
                                <input type="text" class="form-control" id="TPC" name="TPC"
                                    value="<?= $laboratory_sample->TPC ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Salmonella" class="form-label">Salmonella</label>
                                <input type="text" class="form-control" id="Salmonella" name="Salmonella"
                                    value="<?= $laboratory_sample->Salmonella ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Coliform" class="form-label">Coliform</label>
                                <input type="text" class="form-control" id="Coliform" name="Coliform"
                                    value="<?= $laboratory_sample->Coliform ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Yeast" class="form-label">Yeast</label>
                                <input type="text" class="form-control" id="Yeast" name="Yeast"
                                    value="<?= $laboratory_sample->Yeast ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="coli" class="form-label">Coli</label>
                                <input type="text" class="form-control" id="coli" name="coli"
                                    value="<?= $laboratory_sample->coli ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Clostridium" class="form-label">Clostridium</label>
                                <input type="text" class="form-control" id="Clostridium" name="Clostridium"
                                    value="<?= $laboratory_sample->Clostridium ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="aureus" class="form-label">Aureus</label>
                                <input type="text" class="form-control" id="aureus" name="aureus"
                                    value="<?= $laboratory_sample->aureus ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Other" class="form-label">Other (Microbiological)</label>
                                <input type="text" class="form-control" id="Other" name="Other"
                                    value="<?= $laboratory_sample->Other ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Chemical" class="form-label">Chemical</label>
                                <input type="text" class="form-control" id="Chemical" name="Chemical"
                                    value="<?= $laboratory_sample->Chemical ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Pesticide" class="form-label">Pesticide</label>
                                <input type="text" class="form-control" id="Pesticide" name="Pesticide"
                                    value="<?= $laboratory_sample->Pesticide ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Peroxide" class="form-label">Peroxide</label>
                                <input type="text" class="form-control" id="Peroxide" name="Peroxide"
                                    value="<?= $laboratory_sample->Peroxide ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="pH" class="form-label">pH</label>
                                <input type="text" class="form-control" id="pH" name="pH"
                                    value="<?= $laboratory_sample->pH ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Ash" class="form-label">Ash</label>
                                <input type="text" class="form-control" id="Ash" name="Ash"
                                    value="<?= $laboratory_sample->Ash ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Fatty" class="form-label">Fatty</label>
                                <input type="text" class="form-control" id="Fatty" name="Fatty"
                                    value="<?= $laboratory_sample->Fatty ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Salinity" class="form-label">Salinity</label>
                                <input type="text" class="form-control" id="Salinity" name="Salinity"
                                    value="<?= $laboratory_sample->Salinity ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Protein" class="form-label">Protein</label>
                                <input type="text" class="form-control" id="Protein" name="Protein"
                                    value="<?= $laboratory_sample->Protein ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Moisture" class="form-label">Moisture</label>
                                <input type="text" class="form-control" id="Moisture" name="Moisture"
                                    value="<?= $laboratory_sample->Moisture ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Other2" class="form-label">Other (Chemical)</label>
                                <input type="text" class="form-control" id="Other2" name="Other2"
                                    value="<?= $laboratory_sample->Other2 ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="<?= $laboratory_sample->description ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="production_code" class="form-label">Production Code</label>
                                <input type="text" class="form-control" id="production_code" name="production_code"
                                    value="<?= $laboratory_sample->production_code ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="best_before" class="form-label">Best Before</label>
                                <input type="text" class="form-control" id="best_before" name="best_before"
                                    value="<?= $laboratory_sample->best_before ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="<?= $laboratory_sample->quantity ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    value="<?= $laboratory_sample->remarks ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_checking_correct" class="form-label">Sample Checking Correct</label>
                                <input type="text" class="form-control" id="sample_checking_correct"
                                    name="sample_checking_correct"
                                    value="<?= $laboratory_sample->sample_checking_correct ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_checking_incorrect" class="form-label">Sample Checking
                                    Incorrect</label>
                                <input type="text" class="form-control" id="sample_checking_incorrect"
                                    name="sample_checking_incorrect"
                                    value="<?= $laboratory_sample->sample_checking_incorrect ?>" required>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('laboratory_sample') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
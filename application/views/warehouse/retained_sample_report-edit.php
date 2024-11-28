<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Warehouse /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Retained Sample Report</h5>
            <div class="card-body">
                <form action="<?= base_url('retained_sample_report/update/' . $retained_sample_report->uuid) ?>"
                    method="post">
                    <input type="hidden" name="uuid" value="<?= $retained_sample_report->uuid ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plant" class="form-label">Plant</label>
                                <input type="text" class="form-control" id="plant" name="plant"
                                    value="<?= $retained_sample_report->plant ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sample_type" class="form-label">Sample Type</label>
                                <input type="text" class="form-control" id="sample_type" name="sample_type"
                                    value="<?= $retained_sample_report->sample_type ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Collection Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?= $retained_sample_report->date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_frozen" class="form-label">Sample Storage Frozen</label>
                                <input type="text" class="form-control" id="sample_storage_frozen"
                                    name="sample_storage_frozen"
                                    value="<?= $retained_sample_report->sample_storage_frozen ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_chilled" class="form-label">Sample Storage Chilled</label>
                                <input type="text" class="form-control" id="sample_storage_chilled"
                                    name="sample_storage_chilled"
                                    value="<?= $retained_sample_report->sample_storage_chilled ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_other" class="form-label">Sample Storage Other</label>
                                <input type="text" class="form-control" id="sample_storage_other"
                                    name="sample_storage_other"
                                    value="<?= $retained_sample_report->sample_storage_other ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="<?= $retained_sample_report->description ?>">
                            </div>

                            <div class="mb-3">
                                <label for="prod_date" class="form-label">Production Date</label>
                                <input type="date" class="form-control" id="prod_date" name="prod_date"
                                    value="<?= $retained_sample_report->prod_date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="best_before" class="form-label">Best Before</label>
                                <input type="date" class="form-control" id="best_before" name="best_before"
                                    value="<?= $retained_sample_report->best_before ?>">
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="<?= $retained_sample_report->quantity ?>">
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    value="<?= $retained_sample_report->remarks ?>">
                            </div>

                 

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?= $retained_sample_report->catatan ?>">
                            </div>



                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('retained_sample_report') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
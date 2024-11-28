<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Warehouse /</span>Retained Sample Report
        </h4>
        <div class="card">
            <h5 class="card-header">Tambah</h5>
            <div class="card-body">
                <form action="<?= base_url('retained_sample_report/tambah') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plant" class="form-label">Plant</label>
                                <input type="text" class="form-control" id="plant" name="plant"
                                    placeholder="Enter Sample Type" required>
                            </div>
                            <div class="mb-3">
                                <label for="sample_type" class="form-label">Sample Type</label>
                                <input type="text" class="form-control" id="sample_type" name="sample_type"
                                    placeholder="Enter Sample Type" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Collection Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_frozen" class="form-label">Sample Storage Frozen</label>
                                <input type="text" class="form-control" id="sample_storage_frozen"
                                    name="sample_storage_frozen" placeholder="Enter Storage Frozen Info">
                            </div>

                            <div class="mb-3">
                                <label for="sample_storage_chilled" class="form-label">Sample Storage Chilled</label>
                                <input type="text" class="form-control" id="sample_storage_chilled"
                                    name="sample_storage_chilled" placeholder="Enter Storage Chilled Info">
                            </div>
                            <div class="mb-3">
                                <label for="sample_storage_other" class="form-label">Sample Storage Other</label>
                                <input type="text" class="form-control" id="sample_storage_other"
                                    name="sample_storage_other" placeholder="Enter Storage Other Info">
                            </div>
                        </div>
                        <div class="col-md-6">



                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter Description" required>
                            </div>

                            <div class="mb-3">
                                <label for="prod_date" class="form-label">Production Date</label>
                                <input type="date" class="form-control" id="prod_date" name="prod_date" required>
                            </div>

                            <div class="mb-3">
                                <label for="best_before" class="form-label">Best Before</label>
                                <input type="date" class="form-control" id="best_before" name="best_before" required>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    placeholder="Enter Quantity" required>
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    placeholder="Enter Remarks">
                            </div>


                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Enter Notes" required>
                            </div>



                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        <a href="<?= base_url('retained_sample_report') ?>" class="btn btn-danger"><i
                                class="bx bx-x"></i>
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
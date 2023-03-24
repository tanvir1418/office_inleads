<?php
    $emp_user_id = $this->uri->segment(3);
?>
<div class="modal create_society_details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <form action="<?= base_url() ?>super_admin/create_society_details/employee_edit_details" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalform">New Training Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-dark">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="emp_user_id" value="<?= $emp_user_id ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="association" class="control-label">Association</label>
                                <input type="text" class="form-control" id="association" name="association" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="activities" class="control-label">Nature of Activities</label>
                                <input type="text" class="form-control" id="activities" name="activities" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date" class="control-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date" class="control-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-raised btn-primary ml-2">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>
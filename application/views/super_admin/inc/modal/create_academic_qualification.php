<?php
    $emp_user_id = $this->uri->segment(3);
?>
<div class="modal create_academic_qualification" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <form action="<?= base_url() ?>super_admin/create_academic_qualification/employee_edit_details" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalform">New Academic Qualification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-dark">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="emp_user_id" value="<?= $emp_user_id ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="degree" class="control-label">Degree</label>
                                <input type="text" class="form-control" id="degree" name="degree" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="institution" class="control-label">Institution</label>
                                <input type="text" class="form-control" id="institution" name="institution" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject" class="control-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="result" class="control-label">Result</label>
                                <input type="text" class="form-control" id="result" name="result" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="completion" class="control-label">Completion</label>
                                <input type="number" class="form-control" id="completion" name="completion" required>
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
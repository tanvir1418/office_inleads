<div class="modal create_new_salary_type" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>super_admin/create_new_salary_type/salary_type" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalform">New Salary Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-dark">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="slry_type_name" class="control-label">Salary Type Name</label>
                                <input type="text" class="form-control" id="slry_type_name" name="slry_type_name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-raised btn-primary">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>
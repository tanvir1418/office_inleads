<div class="row-wrapper">
    <div class="card">
        <div class="card-body text-center">
            <span class="h4 text-white bg-dark px-4 py-2 rounded"><strong>Add Salary</strong></span>
        </div>
    </div>

    <div class="card" style="margin-bottom: 90px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <h5 style="text-decoration: underline;">Pay Employee Salary</h5>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="select_emp_userid">Select Employee:</label>
                    <select class="form-control" name="emp_user_id" id="select_emp_userid" required>
                        <option value="" selected="" disabled="" hidden="">Choose here</option>
                        <?php foreach ($this->emm->get_working_employees() as $row) : ?>
                            <option value="<?= $row->emp_user_id ?>"><?= $row->employee_name ?> (<?php $this->db->where('dsgn_id', $row->dsgn_id);
                                                                                                    $designation = $this->db->get("designation_list")->row('dsgn_name');
                                                                                                    echo $designation; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mt-4" id="dynamic_employee_data">

            </div>
        </div>
    </div>

</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
<div class="row-wrapper">
    <div class="card">
        <div class="card-body text-center">
            <span class="h4 text-white bg-dark px-4 py-2 rounded"><strong>Paid Leave</strong></span>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <h5 style="text-decoration: underline;">Assign Paid Leave</h5>
                    </div>
                    <form action="<?= base_url() ?>super_admin/add_paid_leave" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="leave_emp_userid">Select Employee:</label>
                            <select class="form-control" name="emp_user_id" id="leave_emp_userid" required>
                                <option value="" selected="" disabled="" hidden="">Choose here</option>
                                <?php foreach ($this->emm->get_working_employees() as $row) : ?>
                                    <option value="<?= $row->emp_user_id ?>">
                                        <?= $row->employee_name ?> (
                                        <?php $this->db->where('dsgn_id', $row->dsgn_id);
                                        $designation = $this->db->get("designation_list")->row('dsgn_name');
                                        echo $designation; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="leave_year">Enter Year:</label>
                            <input type="number" class="form-control" name="leave_year" id="leave_year" required>
                        </div>
                        <div class="form-group">
                            <label for="casual_leave">Casual Leave (Days):</label>
                            <input type="number" class="form-control" name="casual_leave" id="casual_leave" required>
                        </div>
                        <div class="form-group">
                            <label for="sick_leave">Sick Leave (Days):</label>
                            <input type="number" class="form-control" name="sick_leave" id="sick_leave" required>
                        </div>
                        <div class="form-group">
                            <label for="maternal_leave">Maternal Leave (Days):</label>
                            <input type="number" class="form-control" name="maternal_leave" id="maternal_leave" required>
                        </div>
                        <div class='form-group form-check mt-4'>
                            <input type='checkbox' class='form-check-input' name='paid_leave_check' id='paid_leave_check' required>
                            <label class='form-check-label' for='paid_leave_check'><strong>Make sure to add</strong></label>
                        </div>
                        <div class="form-group col-12 mt-4 text-center">
                            <button type="submit" class="btn btn-dark btn-lg">Add Paid Leave</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="text-center mb-4">
                        <h5 style="text-decoration: underline;">Paid Leave Details</h5>
                    </div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Employee</th>
                                <th><strong>Year</strong></th>
                                <th>Casual Leave</th>
                                <th>Sick Leave</th>
                                <th>Maternal Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->amm->get_emp_paid_leave_details() as $row) : ?>
                                <tr>
                                    <?php
                                    $this->db->where('emp_user_id', $row->emp_user_id);
                                    $employee_name = $this->db->get("employee_info")->row('employee_name');
                                    ?>
                                    <td>
                                        <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 tooltips p-0 px-1" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                            <?= $employee_name ?>
                                        </a>
                                    </td>
                                    <td><strong><?= $row->leave_year ?></strong></td>
                                    <td><?= $row->casual_leave ?> <span>(Cons: <?= $row->casual_consumed ?>)</span></td>
                                    <td><?= $row->sick_leave ?> <span>(Cons: <?= $row->sick_consumed ?>)</span></td>
                                    <td><?= $row->maternal_leave ?> <span>(Cons: <?= $row->maternal_consumed ?>)</span></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
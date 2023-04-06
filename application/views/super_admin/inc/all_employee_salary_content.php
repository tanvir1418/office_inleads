<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">All Employee Salary (Current Month: <strong><?= date('F') ?></strong>)</h4>

                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Id Card</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Salary</th>
                                <th>Paid</th>
                                <th>Salary Type</th>
                                <th>Pay</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->emm->get_working_employees() as $row) {
                                $emp_current_month_salary_data = $this->amm->get_employee_current_month_salary_history($row->emp_user_id);

                                $emp_salary_id = "";
                                $current_month_no = date('n');
                                $current_month_name = date('F');
                                $current_year = date('Y');
                                $salary_amount = $row->monthly_salary;
                                $salary_paid = 0;
                                $salary_due = $row->monthly_salary;;
                                $salary_status = "";
                                $slry_type_id = "";

                                if (count($emp_current_month_salary_data) == 1) {
                                    foreach ($emp_current_month_salary_data as $rowData) {

                                        $emp_salary_id = $rowData->emp_salary_id;
                                        $current_month_no = $rowData->month_no;

                                        $this->db->where('month_no', $rowData->month_no);
                                        $current_month_name = $this->db->get("months")->row('month_name');

                                        $current_year = $rowData->year;

                                        $salary_amount = $rowData->salary_amount;
                                        $salary_paid = $rowData->salary_paid;
                                        $salary_due = $salary_amount - $salary_paid;

                                        $salary_status = $rowData->salary_status;
                                        $slry_type_id = $rowData->slry_type_id;
                                    }
                                }
                            ?>

                                <tr>
                                    <form action="<?= base_url() ?>super_admin/insert_single_employee_salary" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="emp_user_id" value="<?= $row->emp_user_id ?>">
                                        <input type="hidden" name="emp_salary_id" value="<?= $emp_salary_id ?>">

                                        <td><?= $i++ ?></td>

                                        <?php
                                        $this->db->where('idcard_id', $row->idcard_id);
                                        $idcard_name = $this->db->get("idcard_type_list")->row('idcard_name');
                                        $this->db->where('emp_user_id', $row->emp_user_id);
                                        $employee_id = $this->db->get("employee_info")->row('employee_id');
                                        $emp_idcard = $idcard_name . "-" . $employee_id;
                                        ?>

                                        <td>
                                            <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 p-0 px-1 tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                                <?= $row->employee_name ?>
                                            </a>
                                        </td>
                                        <td><?= $emp_idcard ?></td>
                                        <td>
                                            <input type="hidden" name="month_no" value="<?= $current_month_no ?>">
                                            <?= $current_month_name ?>
                                        </td>
                                        <td>
                                            <input type="hidden" name="year" value="<?= $current_year ?>">

                                            <?= $current_year ?>
                                        </td>
                                        <td><input type="number" class='form-control' name="salary_amount" value="<?= $salary_amount ?>" readonly></td>
                                        <td><input type="number" class="form-control" name="salary_paid" value="<?= $salary_paid ?>" readonly /></td>
                                        <td class="text-center">
                                            <?php if ($slry_type_id != "") { ?>
                                                <?php foreach ($this->cmm->get_active_salary_type_list() as $row) : ?>
                                                    <?php if ($row->slry_type_id == $slry_type_id) { ?>
                                                        <input type="hidden" name="slry_type_id" value="<?= $row->slry_type_id ?>" />
                                                        <?= $row->slry_type_name ?>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                                <!-- <select class='form-control' name='slry_type_id' id='slry_type_id' readonly>
                                                    <?php //foreach ($this->cmm->get_active_salary_type_list() as $row) : 
                                                    ?>
                                                        <?php //if ($row->slry_type_id == $slry_type_id) { 
                                                        ?>
                                                            <option value="<?php // $row->slry_type_id 
                                                                            ?>" selected><?php // $row->slry_type_name 
                                                                                                                    ?></option>;
                                                        <?php //} 
                                                        ?>
                                                    <?php //endforeach 
                                                    ?>
                                                </select> -->
                                            <?php } else { ?>
                                                <select class='form-control' name='slry_type_id' id='slry_type_id' required>
                                                    <option value='' selected='' disabled='' hidden=''>Choose here</option>
                                                    <?php foreach ($this->cmm->get_active_salary_type_list() as $row) : ?>
                                                        <option value="<?= $row->slry_type_id ?>"><?= $row->slry_type_name ?></option>;
                                                    <?php endforeach ?>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <?php if ($salary_status == "Full Paid") { ?>
                                            <td class="text-success text-center"><span><strong><?= $salary_status ?></strong></span></td>
                                            <td><strong>N/A</strong></td>
                                        <?php } else { ?>
                                            <td><input type="number" min="0" max="<?= $salary_due ?>" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter amount" required /></td>
                                            <td><button type="submit" class="btn btn-dark">Pay</button></td>
                                        <?php } ?>
                                    </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
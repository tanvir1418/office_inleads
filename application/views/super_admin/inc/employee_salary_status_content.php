<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?>super_admin/employee_salary_status" method="GET" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5>Employee Salary Status</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <select class="form-control" name="month_no" id="month_no" required>
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <?php foreach ($this->amm->get_months_list() as $row) : ?>
                                                <option value="<?= $row->month_no ?>"><?= $row->month_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-4">
                                        <input type="number" class="form-control" min="2000" max="2100" name="year" id="year" placeholder="Enter year" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="display_employee_salary_status">
                        <?php if (isset($_GET['month_no']) && isset($_GET['year'])) {
                            $month_no = $_GET['month_no'];
                            $year = $_GET['year'];

                            $this->db->where('month_no', $month_no);
                            $search_month_name = $this->db->get("months")->row('month_name');
                        ?>
                            <h4 class='mt-0 header-title'>Showing result for <strong>(<?= $search_month_name ?>, <?= $year ?>)</strong></h4>
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
                                        <th>Due</th>
                                        <th>Salary Type</th>
                                        <th>Pay</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($this->emm->get_all_employees() as $row) {
                                        $emp_current_month_salary_data = $this->amm->get_employee_custom_salary_data($row->emp_user_id, $month_no, $year);

                                        $emp_salary_id = "";
                                        $current_month_no = $month_no;
                                        
                                        $this->db->where('month_no', $month_no);
                                        $current_month_name = $this->db->get("months")->row('month_name');

                                        $current_year = $year;
                                        $salary_amount = $row->monthly_salary;
                                        $salary_paid = 0;
                                        $salary_due = $row->monthly_salary;
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
                                                <td><input type="number" class="form-control" value="<?= $salary_amount - $salary_paid ?>" readonly /></td>
                                                <td class="text-center">
                                                    <?php if ($slry_type_id != "") { ?>
                                                        <?php foreach ($this->cmm->get_active_salary_type_list() as $row) : ?>
                                                            <?php if ($row->slry_type_id == $slry_type_id) { ?>
                                                                <input type="hidden" name="slry_type_id" value="<?= $row->slry_type_id ?>" />
                                                                <?= $row->slry_type_name ?>
                                                            <?php } ?>
                                                        <?php endforeach ?>
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
                        <?php } else { ?>
                            <div class="text-center">
                                <p>
                                    <strong class="text-warning h6">Please Select Month & Date Correctly.</strong>
                                    <br>
                                    <a class="btn btn-dark mt-2" href="<?= base_url() ?>super_admin/add_employee_salary">Add Employee Salary</a>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
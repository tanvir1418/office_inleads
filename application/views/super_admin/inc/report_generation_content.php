<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?>super_admin/custom_report_generation" method="GET" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5>Salary Report:</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="report_from_date">Date From:</label>
                                        <input type="date" class="form-control" name="from_date" id="report_from_date" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="report_to_date">Date To:</label>
                                        <input type="date" class="form-control" name="to_date" id="report_to_date" required>
                                    </div>
                                    <div class="form-group col-12 text-right">
                                        <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mb-4">
                        <p class="h6"><strong>Showing Report of Current Month: </strong> From <strong class="bg-dark text-white rounded px-1"><?= date('m-01-Y') ?></strong> to <strong class="bg-dark text-white rounded px-1"><?= date('m-t-Y') ?></strong></p>
                    </div>

                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th>Employee</th>
                                <th>ID-Card</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Salary</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $report_data = $this->amm->showing_current_month_report();
                            if (count($report_data) > 0) : ?>
                                <?php
                                $total = 0;
                                foreach ($this->amm->showing_current_month_report() as $row) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= "<strong>" . implode("-", array_reverse(explode("-", explode(" ", $row->created_at)[0]))) . "</strong>" ?>
                                        </td>
                                        <?php
                                        $this->db->where('emp_user_id', $row->emp_user_id);
                                        $employee_name = $this->db->get("employee_info")->row('employee_name');
                                        $idcard_id = $this->db->get("employee_info")->row('idcard_id');
                                        $employee_id = $this->db->get("employee_info")->row('employee_id');

                                        $this->db->where('idcard_id', $idcard_id);
                                        $pre_idcard = $this->db->get("idcard_type_list")->row('idcard_name');

                                        $this->db->where('month_no', $row->month_no);
                                        $month_name = $this->db->get("months")->row('month_name');
                                        ?>
                                        <td>
                                            <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 p-0 px-1 tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                                <?= $employee_name ?>
                                            </a>
                                        </td>
                                        <td><?= $pre_idcard . "-" . $employee_id ?></td>
                                        <td><?= $month_name ?></td>
                                        <td><?= $row->year ?></td>

                                        <td><?php $total += $row->salary_amount;
                                            echo $row->salary_amount ?></td>
                                        <td><?= $row->salary_status ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="text-center">
                                    <td colspan="5" class="text-right"><strong>TOTAL EXPENSES: </strong></td>
                                    <td colspan="2" class="text-left"><strong><?= $total ?></strong></td>
                                </tr>
                            <?php else : ?>
                                <tr class="text-center">
                                    <td colspan="7"><strong class="h6">No data found</strong></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
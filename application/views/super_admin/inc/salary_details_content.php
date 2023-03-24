<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Salary Details || <a class="btn btn-dark ml-2" href="<?= base_url() ?>super_admin/add_salary">Add Salary</a></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Designation</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Pay Date</th>
                                <th>Salary Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1; 
                                foreach ($this->amm->get_salary_details() as $row) : 
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <?php
                                        $this->db->where('emp_user_id', $row->emp_user_id);
                                        $employee_name = $this->db->get("employee_info")->row('employee_name');
                                    ?>
                                    <td>
                                        <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                            <?= $employee_name ?>
                                        </a>
                                    </td>
                                    <?php
                                        $this->db->where('emp_user_id', $row->emp_user_id);
                                        $dsgn_id = $this->db->get("employee_info")->row('dsgn_id');
                                        $this->db->where('dsgn_id', $dsgn_id);
                                        $designation = $this->db->get("designation_list")->row('dsgn_name');

                                        $this->db->where('month_no', $row->month_no);
                                        $month_name = $this->db->get("months")->row('month_name');

                                        $this->db->where('slry_type_id', $row->slry_type_id);
                                        $slry_type_name = $this->db->get("salary_type_list")->row('slry_type_name');
                                    ?>
                                    <td><?= $designation ?></td>
                                    <td><?= $month_name ?></td>
                                    <td><?= $row->year ?></td>
                                    <td><?= $row->salary_amount ?></td>
                                    <td><?= $row->salary_status ?></td>
                                    <td><?= implode("-", array_reverse(explode("-", $row->pay_date))) ?></td>
                                    <td><?= $slry_type_name ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
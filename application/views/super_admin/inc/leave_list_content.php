<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Employee List || <a class="btn btn-dark ml-2" href="<?= base_url() ?>super_admin/add_employee">Add New</a></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Designation</th>
                                <th>Id-Card</th>
                                <th>Leave Type</th>
                                <th>Leave From</th>
                                <th>Leave To</th>
                                <th>Total Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($this->amm->get_leave_application_list() as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <?php
                                        $this->db->where('emp_user_id', $row->emp_user_id);
                                        $employee_name = $this->db->get("employee_info")->row('employee_name');
                                        
                                        $employee_id = $this->db->get("employee_info")->row('employee_id');
                                        $idcard_id = $this->db->get("employee_info")->row('idcard_id');
                                        $this->db->where('idcard_id', $idcard_id);
                                        $pre_idcard = $this->db->get("idcard_type_list")->row('idcard_name');

                                        $dsgn_id = $this->db->get("employee_info")->row('dsgn_id');

                                        $this->db->where('dsgn_id', $dsgn_id);
                                        $designation = $this->db->get("designation_list")->row('dsgn_name');
                                    ?>

                                    <td>
                                        <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 p-0 px-1 tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                            <?= $employee_name ?>
                                        </a>
                                    </td>
                                    <td><?= $designation ?></td>
                                    <td><?= $pre_idcard ?>-<?= $employee_id ?></td>
                                    <td><?= ucwords(preg_replace('/\_+/', ' ', $row->leave_type)); ?></td>
                                    <td><?= implode("-", array_reverse(explode("-", $row->leave_date_from))) ?></td>
                                    <td><?= implode("-", array_reverse(explode("-", $row->leave_date_to))) ?></td>
                                    <td><?= $row->leave_total_days ?></td>
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
<?php
$this->db->where('status', 'WORKING');
$this->db->from('employee_info');
$employee_count = $this->db->count_all_results();

$this->db->where('status', 'DEPARTED');
$this->db->from('employee_info');
$departed_count = $this->db->count_all_results();

$this->db->from('designation_list');
$designation_count = $this->db->count_all_results();

$this->db->where('leave_date_from <=', date('Y-m-d'));
$this->db->where('leave_date_to >=', date('Y-m-d'));
$this->db->from('emp_leave_application');
$on_leave_count = $this->db->count_all_results();
?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <!-- <div class="float-right">
                        <div class="dropdown">
                            <a href="<?= base_url() ?>super_admin/system_settings" class="btn btn-secondary btn-round" type="button" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-1"></i>Settings
                            </a>
                        </div>
                    </div> -->
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-cube-outline"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Employee</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/employee_list" title="Employee List">
                                <p class="mb-0"><strong>Total: </strong> <?= $employee_count ?> </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">On Leave (Emp.)</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/leave_list" title="Leave List">
                                <p class="mb-0"><strong>Total: </strong> <?= $on_leave_count ?> </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Designations</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/designation_list" title="Designation List">
                                <p class="mb-0"><strong>Total: </strong> <?= $designation_count ?> </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Departed Emp.</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/previous_employees" title="Previous Employee List">
                                <p class="mb-0"><strong>Total: </strong> <?= $departed_count ?> </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-data">
                        <h6 class="d-inline-block">Employee On Leave <strong>(<?= date('M d, Y'); ?>)</strong></h6>

                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                    <?php $i = 1;
                                    foreach ($this->amm->get_leave_employee_on_current_date() as $row) : ?>
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
                </div>
            </div>
        </div><!-- end row -->

    </div><!-- container -->
</div> <!-- Page content Wrapper -->

</div> <!-- content -->
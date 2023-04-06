<!-- Start of Page content Wrapper -->
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <div class="dropdown">
                            <a href="<?= base_url() ?>super_admin/employee_list" class="btn btn-dark btn-round">
                                <i class="fas fa-fast-backward"></i> Back
                            </a>
                        </div>
                    </div>
                    <h4 class="page-title">EMPLOYEE PROFILE</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="text-center">
                            <?php foreach ($this->emm->get_employee_details_by_userid() as $rowEmp) : ?>
                                <h5 class="mt-2 mb-0"><?= $rowEmp->employee_name ?></h5>
                                <?php
                                $this->db->where('dsgn_id', $rowEmp->dsgn_id);
                                $designation = $this->db->get("designation_list")->row('dsgn_name');
                                ?>
                                <small class="text-muted"><?= $designation ?></small>
                                <p class="text-muted mb-2 p-2">
                                    <a href="<?= base_url() ?>uploads/photos/<?= $rowEmp->image ?>">
                                        <img src="<?= base_url() ?>uploads/photos/<?= $rowEmp->image ?>" alt="" class="img-fluid rounded-circle w-80">
                                    </a>
                                </p>
                                <a class="btn btn-dark btn-block text-white" href="<?= base_url() ?>super_admin/employee_full_details/<?= $rowEmp->emp_user_id ?>">Full Details</a>
                                <?php if ($rowEmp->status == 'WORKING') : ?>
                                    <a class="btn btn-warning btn-block text-white" href="<?= base_url() ?>super_admin/employee_edit_details/<?= $rowEmp->emp_user_id ?>">Edit Details</a>
                                    <a class="btn btn-danger btn-block text-white" href="<?= base_url() ?>super_admin/employee_change_status/<?= $rowEmp->emp_user_id ?>">Change Status</a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card m-b-30 contact">
                            <div class="card-body">
                                <h6 class="header-title pb-3">Contact</h6>
                                <?php foreach ($this->emm->get_employee_contact_by_userid() as $rowContact) : ?>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><i class="fas fa-phone mr-2"></i><?= $rowContact->mobile ?></li>
                                        <li class="mt-2"><i class="far fa-envelope mt-2 mr-2"></i><?= $rowContact->email ?></li>
                                        <li class="mt-2"><i class="fas fa-map-marker-alt mt-2 mr-2"></i><?= $rowContact->present_address ?></li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h6 class="header-title pb-3">Emergency Contact</h6>
                                <?php
                                $rowEmerg = $this->emm->get_employee_emergency_contact_by_userid();
                                $rowEmergCount = count($rowEmerg);
                                ?>
                                <?php if ($rowEmergCount > 0) : ?>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><i class="fas fa-user mr-2"></i><?= $rowEmerg[0]->name ?> (<?= $rowEmerg[0]->relation ?>)</li>
                                        <li class="mt-2"><i class="fas fa-phone mt-2 mr-2"></i><?= $rowEmerg[0]->mobile ?></li>
                                        <li class="mt-2"><i class="fas fa-map-marker-alt mt-2 mr-2"></i><?= $rowEmerg[0]->address ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h6 class="header-title pb-1">Leave Status <strong>(<?= date('Y') ?>)</strong></h6>
                                <?php
                                $row = $this->amm->get_employee_paid_leave_details_by_segment();
                                $rowLeaveCount = count($row);
                                ?>
                                <?php if ($rowLeaveCount == 1) : ?>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><strong>Casual:</strong> <?= $row[0]->casual_leave ?> (Cons: <?= $row[0]->casual_consumed ?>)</li>
                                        <li class="mt-2"><strong>Sick:</strong> <?= $row[0]->sick_leave ?> (Cons: <?= $row[0]->sick_consumed ?>)</li>
                                        <li class="mt-2"><strong>Maternal:</strong> <?= $row[0]->maternal_leave ?> (Cons: <?= $row[0]->maternal_consumed ?>)</li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header profile-tabs pb-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#employee_details" data-toggle="tab" aria-expanded="false"><i class="ti-user mr-2"></i>Employee Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#personal_details" data-toggle="tab" aria-expanded="false"><i class="ti-image mr-2"></i>Personal Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#employee_history" data-toggle="tab" aria-expanded="false"><i class="ti-shopping-cart mr-2"></i>Employment History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#leave_details" data-toggle="tab" aria-expanded="false"><i class="ti-shopping-cart mr-2"></i>Leave Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employee_details">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12  profile-detail">
                                            <h5 class="mb-0"><i class="fa fa-graduation-cap text-dark"></i> Employee Details</h5>
                                        </div>
                                        <div class="col-12 col-12 pt-2">
                                            <?php foreach ($this->emm->get_employee_details_by_userid() as $rowEmp2) : ?>
                                                <ul>
                                                    <li><b>Name:</b> <?= $rowEmp2->employee_name ?></li>
                                                    <?php
                                                    $this->db->where('dsgn_id', $rowEmp2->dsgn_id);
                                                    $designation = $this->db->get("designation_list")->row('dsgn_name');
                                                    ?>
                                                    <li><b>Designation:</b> <?= $designation ?></li>
                                                    <?php
                                                    $this->db->where('idcard_id', $rowEmp2->idcard_id);
                                                    $pre_idcard = $this->db->get("idcard_type_list")->row('idcard_name');
                                                    ?>
                                                    <li><b>Id Card:</b> <?= $pre_idcard ?>-<?= $rowEmp2->employee_id ?></li>
                                                    <li><b>Joining Date:</b> <?= implode("-", array_reverse(explode("-", $rowEmp2->date_of_joining))) ?></li>
                                                    <?php
                                                    $this->db->where('dept_id', $rowEmp2->dept_id);
                                                    $department = $this->db->get("department_list")->row('dept_name');
                                                    ?>
                                                    <li><b>Department:</b> <?= $department ?></li>
                                                    <li><b>Location:</b> <?= $rowEmp2->location ?></li>
                                                    <?php
                                                    $this->db->where('empl_id', $rowEmp2->empl_id);
                                                    $employment_type = $this->db->get("employment_type_list")->row('empl_name');
                                                    ?>
                                                    <li><b>Employment Type:</b> <?= $employment_type ?></li>
                                                    <li><b>Monthly Salary:</b> <?= $rowEmp2->monthly_salary ?></li>
                                                    <li><b>Bank Account No:</b> <?= $rowEmp2->bank_account_no ?></li>
                                                    <?php if ($rowEmp2->status == "WORKING") : ?>
                                                        <li><b>Status:</b> <?= $rowEmp2->status ?></li>
                                                    <?php else : ?>
                                                        <li><b>Status:</b> <span class="bg-danger text-white p-1 rounded"><?= $rowEmp2->status ?></span></li>
                                                    <?php endif ?>
                                                    <li><b>Account Created:</b> <?= implode("-", array_reverse(explode("-", $rowEmp2->created_at))) ?></li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="personal_details">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12  profile-detail">
                                            <h5 class="mb-0"> <i class="fa fa-graduation-cap text-dark"></i> Personal Details</h5>
                                        </div>
                                        <?php foreach ($this->emm->get_employee_personal_details_by_userid() as $rowPersonal) : ?>
                                            <div class="col-6 pt-2">
                                                <ul>
                                                    <li><b>Father Name:</b> <?= $rowPersonal->father_name ?></li>
                                                    <li><b>Mother Name:</b> <?= $rowPersonal->mother_name ?></li>
                                                    <li><b>Date of Birth:</b> <?= implode("-", array_reverse(explode("-", $rowPersonal->date_of_birth))) ?></li>
                                                    <li><b>Place of Birth:</b> <?= $rowPersonal->place_of_birth ?></li>
                                                    <li><b>Gender:</b> <?= $rowPersonal->gender ?></li>
                                                    <li><b>Blood Group:</b> <?= $rowPersonal->blood_group ?></li>
                                                    <li><b>Mobile:</b> <?= $rowPersonal->mobile ?></li>
                                                    <li><b>Email:</b> <?= $rowPersonal->email ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 pt-2">
                                                <ul>
                                                    <li><b>Religion:</b> <?= $rowPersonal->religion ?></li>
                                                    <li><b>Nationality:</b> <?= $rowPersonal->nationality ?></li>
                                                    <li><b>Passport No:</b> <?= $rowPersonal->passport_no ?></li>
                                                    <li><b>TIN No:</b> <?= $rowPersonal->tin_no ?></li>
                                                    <li><b>NID No:</b> <?= $rowPersonal->nid_no ?></li>
                                                    <li><b>Marital Status:</b> <?= $rowPersonal->marital_status ?></li>
                                                    <li><b>Marriage Date:</b> <?= implode("-", array_reverse(explode("-", $rowPersonal->marriage_date))) ?></li>
                                                    <li><b>Spouse:</b> <?= $rowPersonal->spouse_name ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <ul>
                                                    <li><b>Present Address:</b> <?= $rowPersonal->present_address ?></li>
                                                    <li><b>Permanent Address:</b> <?= $rowPersonal->permanent_address ?></li>
                                                </ul>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="tab-pane" id="employee_history">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table id="tech-companies-1" class="table table-striped focus-on">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Organization</th>
                                                        <th>Designation</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($this->emm->get_employee_history_by_userid() as $row) : ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $row->organization ?></td>
                                                            <td><?= $row->designation ?></td>
                                                            <td><?= implode("-", array_reverse(explode("-", $row->start_date))) ?></td>
                                                            <td><?= implode("-", array_reverse(explode("-", $row->end_date))) ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="leave_details">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table id="tech-companies-1" class="table table-striped focus-on">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Leave Type</th>
                                                        <th>Leave From</th>
                                                        <th>Leave To</th>
                                                        <th>Total Days</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($this->amm->get_employee_leave_application() as $row) : ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= ucwords(preg_replace('/\_+/', ' ', $row->leave_type)); ?></td>
                                                            <td><?= implode("-", array_reverse(explode("-", $row->leave_date_from))) ?></td>
                                                            <td><?= implode("-", array_reverse(explode("-", $row->leave_date_to))) ?></td>
                                                            <td><strong><?= $row->leave_total_days ?></strong></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title pb-3">Current Year Salary</h5>
                                <!-- table purchase List -->
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped focus-on">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Salary</th>
                                                <th>Paid</th>
                                                <th>Status</th>
                                                <th>Pay Date</th>
                                                <th>Salary Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $slry_i = 1;
                                            foreach ($this->amm->get_employee_salary_info() as $row) : ?>
                                                <tr>
                                                    <td><?= $slry_i++ ?></td>
                                                    <?php
                                                    $this->db->where('month_no', $row->month_no);
                                                    $month_name = $this->db->get("months")->row('month_name');

                                                    $this->db->where('slry_type_id', $row->slry_type_id);
                                                    $slry_type_name = $this->db->get("salary_type_list")->row('slry_type_name');
                                                    ?>
                                                    <td><?= $month_name ?></td>
                                                    <td><?= $row->year ?></td>
                                                    <td><?= $row->salary_amount ?></td>
                                                    <td><?= $row->salary_paid ?></td>
                                                    <td><?= $row->salary_status ?></td>
                                                    <td><?= implode("-", array_reverse(explode("-", $row->last_pay_date))) ?></td>
                                                    <td><?= $slry_type_name ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- purchase History -->

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title pb-3">Salary History</h5>
                                <!-- table purchase List -->
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped focus-on">
                                        <thead>
                                            <tr>
                                                <th>Pay Date</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Salary</th>
                                                <th>Paid</th>
                                                <th>Pay Amount</th>
                                                <th>Salary Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($this->amm->get_employee_salary_history() as $row) : ?>
                                                <tr>
                                                    <?php
                                                        $this->db->where('month_no', $row->month_no);
                                                        $month_name = $this->db->get("months")->row('month_name');

                                                        $this->db->where('slry_type_id', $row->slry_type_id);
                                                        $slry_type_name = $this->db->get("salary_type_list")->row('slry_type_name');
                                                    ?>
                                                    <td><?= implode("-", array_reverse(explode("-", $row->pay_date))) ?></td>
                                                    <td><?= $month_name ?></td>
                                                    <td><?= $row->year ?></td>
                                                    <td><?= $row->salary_amount ?></td>
                                                    <td><?= $row->salary_paid ?></td>
                                                    <td><?= $row->paid_amount ?></td>
                                                    <td><?= $slry_type_name ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end of purchase history -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!-- container -->
</div>
<!-- End of Page content Wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
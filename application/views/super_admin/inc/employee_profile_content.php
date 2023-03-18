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
                                <small class="text-muted"><?= $rowEmp->designation ?></small>
                                <p class="text-muted mb-2 p-2">
                                    <a href="#">
                                        <img src="<?= base_url() ?>uploads/photos/<?= $rowEmp->image ?>" alt="" class="img-fluid rounded-circle w-80">
                                    </a>
                                </p>
                                <a class="btn btn-dark btn-block text-white" href="<?= base_url() ?>super_admin/employee_full_details/<?= $rowEmp->emp_user_id ?>">Full Details</a>
                                <a class="btn btn-warning btn-block text-white" href="<?= base_url() ?>super_admin/employee_edit_details/<?= $rowEmp->emp_user_id ?>">Edit Details</a>
                                <a class="btn btn-danger btn-block text-white" href="<?= base_url() ?>super_admin/employee_change_status/<?= $rowEmp->emp_user_id ?>">Change Status</a>
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
                                <?php foreach ($this->emm->get_employee_emergency_contact_by_userid() as $rowEmerg) : ?>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><i class="fas fa-user mr-2"></i><?= $rowEmerg->name ?> (<?= $rowEmerg->relation ?>)</li>
                                        <li class="mt-2"><i class="fas fa-phone mt-2 mr-2"></i><?= $rowEmerg->mobile ?></li>
                                        <li class="mt-2"><i class="fas fa-map-marker-alt mt-2 mr-2"></i><?= $rowEmerg->address ?></li>
                                    </ul>
                                <?php endforeach; ?>
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
                                                    <li><b>Designation:</b> <?= $rowEmp2->designation ?></li>
                                                    <li><b>Id Card:</b> <?= $rowEmp2->pre_emp_id ?>-<?= $rowEmp2->employee_id ?></li>
                                                    <li><b>Joining Date:</b> <?= implode("-", array_reverse(explode("-", $rowEmp2->date_of_joining))) ?></li>
                                                    <li><b>Department:</b> <?= $rowEmp2->department ?></li>
                                                    <li><b>Location:</b> <?= $rowEmp2->location ?></li>
                                                    <li><b>Employment Type:</b> <?= $rowEmp2->employment_type ?></li>
                                                    <li><b>Status:</b> <?= $rowEmp2->status ?></li>
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
                                                <th>CP-No</th>
                                                <th>Field Worker</th>
                                                <th>Product</th>
                                                <th>Purchase</th>
                                                <th>Payment</th>
                                                <th>Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php //$i = 1;
                                            //foreach ($this->urm->getonerow_purchase() as $row) : 
                                            ?>
                                            <tr>

                                            </tr>
                                            <?php //endforeach; 
                                            ?>
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
                                                <th>#</th>
                                                <th>CP-No</th>
                                                <th>Field Worker</th>
                                                <th>Product</th>
                                                <th>Purchase</th>
                                                <th>Payment</th>
                                                <th>Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php //$i = 1;
                                            //foreach ($this->urm->getonerow_cp_history() as $row) : 
                                            ?>
                                            <tr>

                                            </tr>
                                            <?php //endforeach; 
                                            ?>
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
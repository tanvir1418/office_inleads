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
                    <h4 class="page-title">EMPLOYEE FULL DETAILS</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row" id="employee-full-details">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="text-center">
                            <?php foreach ($this->emm->get_employee_details_by_userid() as $rowEmp) : ?>
                                <p class="text-muted mb-2 p-2">
                                    <a href="#">
                                        <img src="<?= base_url() ?>uploads/photos/<?= $rowEmp->image ?>" alt="" class="img-fluid rounded-circle w-80">
                                    </a>
                                </p>
                                <h5 class="mt-2 mb-0"><?= $rowEmp->employee_name ?></h5>
                                <small class="text-muted"><?= $rowEmp->designation ?></small>
                                <br>
                                <a class="btn btn-dark text-white mt-2" href="<?= base_url() ?>super_admin/employee_profile/<?= $rowEmp->emp_user_id ?>">Profile</a>
                                <a class="btn btn-warning text-white mt-2" href="<?= base_url() ?>super_admin/employee_edit_details/<?= $rowEmp->emp_user_id ?>">Edit Details</a>
                                <a class="btn btn-danger text-white mt-2" href="<?= base_url() ?>super_admin/employee_change_status/<?= $rowEmp->emp_user_id ?>">Change Status</a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="mb-0 pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Employee Details:</h5>
                            </div>
                            <?php foreach ($this->emm->get_employee_details_by_userid() as $rowEmp2) : ?>
                                <div class="col-6 pt-2">
                                    <ul>
                                        <li><b>Name:</b> <?= $rowEmp2->employee_name ?></li>
                                        <li><b>Designation:</b> <?= $rowEmp2->designation ?></li>
                                        <li><b>Department:</b> <?= $rowEmp2->department ?></li>
                                        <li><b>Joining Date:</b> <?= implode("-", array_reverse(explode("-", $rowEmp2->date_of_joining))) ?></li>
                                        <li><b>Id Card:</b> <?= $rowEmp2->pre_emp_id ?>-<?= $rowEmp2->employee_id ?></li>
                                    </ul>
                                </div>
                                <div class="col-6 pt-2">
                                    <ul>
                                        <li><b>Employment Type:</b> <?= $rowEmp2->employment_type ?></li>
                                        <li><b>Status:</b> <?= $rowEmp2->status ?></li>
                                        <li><b>Location:</b> <?= $rowEmp2->location ?></li>
                                        <li><b>Account Created:</b> <?= implode("-", array_reverse(explode("-", $rowEmp2->created_at))) ?></li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="mb-0 pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Personal Details:</h5>
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
                                        <li><b>Present Address:</b> <?= $rowPersonal->present_address ?></li>
                                        <li><b>Extra Curricular:</b> <?= $rowPersonal->extra_curricular ?></li>
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
                                        <li><b>Permanent Address:</b> <?= $rowPersonal->permanent_address ?></li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Employment History:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
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
                                        foreach ($this->emm->get_employee_history_by_userid() as $rowHis) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowHis->organization ?></td>
                                                <td><?= $rowHis->designation ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowHis->start_date))) ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowHis->end_date))) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Academic Qualification:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Degree</th>
                                            <th>Institution</th>
                                            <th>Subject</th>
                                            <th>Result</th>
                                            <th>Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_academic_qualification_by_userid() as $rowQual) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowQual->degree ?></td>
                                                <td><?= $rowQual->institution ?></td>
                                                <td><?= $rowQual->subject ?></td>
                                                <td><?= $rowQual->result ?></td>
                                                <td><?= $rowQual->completion ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Training Details:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Institution</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_training_details_by_userid() as $rowTrain) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowTrain->title ?></td>
                                                <td><?= $rowTrain->institution ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowTrain->start_date))) ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowTrain->end_date))) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Professional Certification:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Certificate</th>
                                            <th>Institution</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_prof_certification_by_userid() as $rowCert) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowCert->certificate ?></td>
                                                <td><?= $rowCert->institution ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowCert->start_date))) ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowCert->end_date))) ?></td>
                                                <td><?= $rowCert->completion ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Academic Qualification:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Degree</th>
                                            <th>Institution</th>
                                            <th>Subject</th>
                                            <th>Result</th>
                                            <th>Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_academic_qualification_by_userid() as $rowQual) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowQual->degree ?></td>
                                                <td><?= $rowQual->institution ?></td>
                                                <td><?= $rowQual->subject ?></td>
                                                <td><?= $rowQual->result ?></td>
                                                <td><?= $rowQual->completion ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Emergency Contact:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Relation</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_emergency_contact_by_userid() as $rowEmerg) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowEmerg->name ?></td>
                                                <td><?= $rowEmerg->relation ?></td>
                                                <td><?= $rowEmerg->mobile ?></td>
                                                <td><?= $rowEmerg->address ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> References:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Occupation</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_reference_by_userid() as $rowRef) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowRef->name ?></td>
                                                <td><?= $rowRef->occupation ?></td>
                                                <td><?= $rowRef->mobile ?></td>
                                                <td><?= $rowRef->email ?></td>
                                                <td><?= $rowRef->address ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Children Details:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_children_by_userid() as $rowChild) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowChild->name ?></td>
                                                <td><?= $rowChild->gender ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowChild->dob))) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 profile-detail">
                                <h5 class="pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Membership In Societies/Club/Association:</h5>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-striped focus-on">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Club/Association</th>
                                            <th>Nature of Activities</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($this->emm->get_employee_society_member_by_userid() as $rowSoc) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $rowSoc->association ?></td>
                                                <td><?= $rowSoc->activities ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowSoc->start_date))) ?></td>
                                                <td><?= implode("-", array_reverse(explode("-", $rowSoc->end_date))) ?></td>
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
        <!--end row-->
    </div>
    <!-- container -->
</div>
<!-- End of Page content Wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->
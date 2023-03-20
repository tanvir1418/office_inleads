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
                    <h4 class="page-title">EDIT EMPLOYEE DETAILS</h4>
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
                                <?php
                                $this->db->where('dsgn_id', $rowEmp->dsgn_id);
                                $designation = $this->db->get("designation_list")->row('dsgn_name');
                                ?>
                                <small class="text-muted"><?= $designation ?></small>
                                <br>
                                <a class="btn btn-dark text-white mt-2" href="<?= base_url() ?>super_admin/employee_profile/<?= $rowEmp->emp_user_id ?>">Profile</a>
                                <a class="btn btn-danger text-white mt-2" href="<?= base_url() ?>super_admin/employee_change_status/<?= $rowEmp->emp_user_id ?>">Change Status</a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h5 class="mb-0 pl-2" style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Employee Details:</h5>
                        </div>

                        <form action="<?= base_url() ?>super_admin/update_employee_details" method="post" enctype="multipart/form-data">
                            <?php foreach ($this->emm->get_employee_details_by_userid() as $rowEmp) : ?>
                                <div class="row">
                                    <input type="hidden" name="emp_user_id" value="<?= $rowEmp->emp_user_id ?>">
                                    <div class="form-group col-6">
                                        <label for="employee_name">Employee Name:</label>
                                        <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter employee name" value="<?= $rowEmp->employee_name ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="dsgn_id">Designation:</label>
                                        <select class="form-control" name="dsgn_id" id="dsgn_id">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <?php foreach ($this->emm->get_active_designation_list() as $rowDsgn) : ?>
                                                <option value="<?= $rowDsgn->dsgn_id ?>" <?= $rowDsgn->dsgn_id == $rowEmp->dsgn_id ? 'selected' : '' ?>><?= $rowDsgn->dsgn_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="employee_id">Employee ID:</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <select class="form-control input-group-text text-left" name="idcard_id">
                                                    <option value="" selected="" disabled="" hidden="">CHOOSE HERE</option>
                                                    <?php foreach ($this->emm->get_active_idcard_type_list() as $rowIdcard) : ?>
                                                        <option value="<?= $rowIdcard->idcard_id ?>" <?= $rowIdcard->idcard_id == $rowEmp->idcard_id ? 'selected' : '' ?>><?= $rowIdcard->idcard_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="employee_id" id="employee_id" placeholder="Enter employee id" value="<?= $rowEmp->employee_id ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="division">Division:</label>
                                        <input type="text" class="form-control" name="division" id="division" placeholder="Enter division" value="<?= $rowEmp->division ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="date_of_joining">Date of Joining:</label>
                                        <input type="date" class="form-control" name="date_of_joining" id="date_of_joining" value="<?= $rowEmp->date_of_joining ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="dept_id">Department:</label>
                                        <select class="form-control" name="dept_id" id="dept_id">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <?php foreach ($this->emm->get_active_department_list() as $rowDept) : ?>
                                                <option value="<?= $rowDept->dept_id ?>" <?= $rowDept->dept_id == $rowEmp->dept_id ? 'selected' : '' ?>><?= $rowDept->dept_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="location">Location:</label>
                                        <input type="text" class="form-control" name="location" id="location" placeholder="Enter location" value="<?= $rowEmp->location ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="empl_id">Employment Type:</label>
                                        <select class="form-control" name="empl_id" id="empl_id">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <?php foreach ($this->emm->get_active_employment_type_list() as $rowEmpl) : ?>
                                                <option value="<?= $rowEmpl->empl_id ?>" <?= $rowEmpl->empl_id == $rowEmp->empl_id ? 'selected' : '' ?>><?= $rowEmpl->empl_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="prev_image" value="<?= $rowEmp->image ?>">
                                    <div class="form-group col-6">
                                        <label for="employee_image">Employee Image:</label>
                                        <input type="file" class="form-control" name="image" id="employee_image">
                                    </div>
                                    <div class="form-group col-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-dark btn-lg" name="update_emp_details">Update Employee Details</button>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h5 style="text-decoration: underline;"> <i class="fa fa-graduation-cap text-dark"></i> Personal Information</h5>
                        </div>
                        <form action="<?= base_url() ?>super_admin/update_personal_details" method="post" enctype="multipart/form-data">
                            <?php foreach ($this->emm->get_employee_personal_details_by_userid() as $rowPers) : ?>
                                <div class="row">
                                    <input type="hidden" name="emp_user_id" value="<?= $rowPers->emp_user_id ?>">
                                    <div class="form-group col-12">
                                        <label for="father_name">Father Name:</label>
                                        <input type="text" class="form-control" name="father_name" id="father_name" value="<?= $rowPers->father_name ?>" placeholder="Enter father name">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="mother_name">Mother Name:</label>
                                        <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?= $rowPers->mother_name ?>" placeholder="Enter mother name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Date of Birth:</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $rowPers->date_of_birth ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Place of Birth:</label>
                                        <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= $rowPers->place_of_birth ?>" placeholder="Enter place of birth">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="gender">Gender:</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <option value="Male" <?= $rowPers->gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= $rowPers->gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $rowPers->mobile ?>" placeholder="Enter mobile">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="religion">Religion:</label>
                                        <input type="text" class="form-control" name="religion" id="religion" value="<?= $rowPers->religion ?>" placeholder="Enter religion">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tin_no">TIN:</label>
                                        <input type="text" class="form-control" name="tin_no" id="tin_no" value="<?= $rowPers->tin_no ?>" placeholder="Enter tin no">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nationality">Nationality:</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $rowPers->nationality ?>" placeholder="Enter nationality">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="blood_group">Blood Group:</label>
                                        <select class="form-control" name="blood_group" id="blood_group">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <option value="A+" <?= $rowPers->blood_group == 'A+' ? 'selected' : '' ?>>A+</option>
                                            <option value="O+" <?= $rowPers->blood_group == 'O+' ? 'selected' : '' ?>>O+</option>
                                            <option value="B+" <?= $rowPers->blood_group == 'B+' ? 'selected' : '' ?>>B+</option>
                                            <option value="AB+" <?= $rowPers->blood_group == 'AB+' ? 'selected' : '' ?>>AB+</option>
                                            <option value="A-" <?= $rowPers->blood_group == 'A-' ? 'selected' : '' ?>>A-</option>
                                            <option value="O-" <?= $rowPers->blood_group == 'O-' ? 'selected' : '' ?>>O-</option>
                                            <option value="B-" <?= $rowPers->blood_group == 'B-' ? 'selected' : '' ?>>B-</option>
                                            <option value="AB-" <?= $rowPers->blood_group == 'AB-' ? 'selected' : '' ?>>AB-</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="marital_status">Marital Status:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                                            <option value="Married" <?= $rowPers->marital_status == 'Married' ? 'selected' : '' ?>>Married</option>
                                            <option value="Unmarried" <?= $rowPers->marital_status == 'Unmarried' ? 'selected' : '' ?>>Unmarried</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="passport_no">Passport No:</label>
                                        <input type="text" class="form-control" name="passport_no" id="passport_no" value="<?= $rowPers->passport_no ?>" placeholder="Enter passport no">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="marriage_date">Marriage Date:</label>
                                        <input type="date" class="form-control" name="marriage_date" id="marriage_date" value="<?= $rowPers->marriage_date ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nid_no">NID/Smart Card:</label>
                                        <input type="text" class="form-control" name="nid_no" id="nid_no" value="<?= $rowPers->nid_no ?>" placeholder="Enter nid/smart card no">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="spouse_name">Spouse Name:</label>
                                        <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="<?= $rowPers->spouse_name ?>" placeholder="Enter spouse name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $rowPers->email ?>" placeholder="Enter email">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="present_address">Present Address:</label>
                                        <textarea rows="2" class="form-control" name="present_address" id="present_address" placeholder="Enter present address"><?= $rowPers->present_address ?></textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="permanent_address">Permanent Address:</label>
                                        <textarea rows="2" class="form-control" name="permanent_address" id="permanent_address" placeholder="Enter permanent address"><?= $rowPers->permanent_address ?></textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="extra_curricular">Extra Curricular:</label>
                                        <textarea rows="2" class="form-control" name="extra_curricular" id="extra_curricular" placeholder="Enter extra curricular address"><?= $rowPers->extra_curricular ?></textarea>
                                    </div>

                                    <div class="form-group col-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-dark btn-lg" name="update_emp_details">Update Personal Information</button>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </form>
                    </div>
                </div>

                <div class="card">
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
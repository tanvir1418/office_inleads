<div class="row-wrapper">
    <div class="card">
        <div class="card-body text-center">
            <span class="h4 text-white bg-dark px-4 py-2 rounded"><strong>Add Employee</strong></span>
        </div>
    </div>

    <form action="<?= base_url() ?>super_admin/insert_employee" method="post" enctype="multipart/form-data">

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Employment Details</h5>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="employee_name">Employee Name:</label>
                        <input type="text" class="form-control" name="employee_name" id="employee_name" aria-describedby="employee_name" placeholder="Enter employee name" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="dsgn_id">Designation:</label>
                        <select class="form-control" name="dsgn_id" id="dsgn_id" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <?php foreach ($this->cmm->get_active_designation_list() as $row): ?>
                                <option value="<?= $row->dsgn_id ?>"><?= $row->dsgn_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="employee_id">Employee ID:</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <select class="form-control input-group-text text-left" name="idcard_id" required>
                                    <option value="" selected="" disabled="" hidden="">CHOOSE HERE</option>
                                    <?php foreach ($this->cmm->get_active_idcard_type_list() as $row): ?>
                                        <option value="<?= $row->idcard_id ?>"><?= $row->idcard_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="employee_id" id="employee_id" placeholder="Enter employee id" required>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="division">Division:</label>
                        <input type="text" class="form-control" name="division" id="division" aria-describedby="division" placeholder="Enter division" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="date_of_joining">Date of Joining:</label>
                        <input type="date" class="form-control" name="date_of_joining" id="date_of_joining" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="dept_id">Department:</label>
                        <select class="form-control" name="dept_id" id="dept_id" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <?php foreach ($this->cmm->get_active_department_list() as $row): ?>
                                <option value="<?= $row->dept_id ?>"><?= $row->dept_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" name="location" id="location" aria-describedby="location" placeholder="Enter location" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="empl_id">Employment Type:</label>
                        <select class="form-control" name="empl_id" id="empl_id" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <?php foreach ($this->cmm->get_active_employment_type_list() as $row): ?>
                                <option value="<?= $row->empl_id ?>"><?= $row->empl_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="monthly_salary">Monthly Salary:</label>
                        <input type="number" class="form-control" name="monthly_salary" id="monthly_salary" placeholder="Enter monthly salary" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="bank_account_no">Account No. (DBBL):</label>
                        <input type="text" class="form-control" name="bank_account_no" id="bank_account_no" placeholder="Enter bank account no" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="employee_image">Employee Image:</label>
                        <input type="file" class="form-control" name="image" id="employee_image" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Personal Information</h5>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="father_name">Father Name:</label>
                        <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter father name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="mother_name">Mother Name:</label>
                        <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter mother name" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="place_of_birth">Place of Birth:</label>
                        <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder="Enter place of birth" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="gender">Gender:</label>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="mobile">Mobile:</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="religion">Religion:</label>
                        <input type="text" class="form-control" name="religion" id="religion" placeholder="Enter religion" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="tin_no">TIN:</label>
                        <input type="text" class="form-control" name="tin_no" id="tin_no" placeholder="Enter tin no">
                    </div>
                    <div class="form-group col-6">
                        <label for="nationality">Nationality:</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter nationality" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="blood_group">Blood Group:</label>
                        <select class="form-control" name="blood_group" id="blood_group" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <option value="A+">A+</option>
                            <option value="O+">O+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="O-">O-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" name="marital_status" id="marital_status" required>
                            <option value="" selected="" disabled="" hidden="">Choose here</option>
                            <option value="Married">Married</option>
                            <option value="Unmarried">Unmarried</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="passport_no">Passport No:</label>
                        <input type="text" class="form-control" name="passport_no" id="passport_no" placeholder="Enter passport no">
                    </div>
                    <div class="form-group col-6">
                        <label for="marriage_date">Marriage Date:</label>
                        <input type="date" class="form-control" name="marriage_date" id="marriage_date">
                    </div>
                    <div class="form-group col-6">
                        <label for="nid_no">NID/Smart Card:</label>
                        <input type="text" class="form-control" name="nid_no" id="nid_no" placeholder="Enter nid/smart card no" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="spouse_name">Spouse Name:</label>
                        <input type="text" class="form-control" name="spouse_name" id="spouse_name" placeholder="Enter spouse name">
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="present_address">Present Address:</label>
                        <textarea rows="2" class="form-control" name="present_address" id="present_address" placeholder="Enter present address" required></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="permanent_address">Permanent Address:</label>
                        <textarea rows="2" class="form-control" name="permanent_address" id="permanent_address" placeholder="Enter permanent address" required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Academic Qualification <small>(Recent Comes First)</small></h5>
                </div>
                <table class="table" id="qualification_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-2">Degree</th>
                            <th class="col-3">Institution</th>
                            <th class="col-3">Subject</th>
                            <th class="col-2">Result</th>
                            <th class="col-1">Completion</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="qual_degree[]" required></td>
                            <td><input type="text" class="form-control" name="qual_institution[]" required></td>
                            <td><input type="text" class="form-control" name="qual_subject[]" required></td>
                            <td><input type="text" class="form-control" name="qual_result[]" required></td>
                            <td><input type="number" class="form-control" name="qual_completion[]" required></td>
                            <td><button type="button" class="btn btn-primary" id="qualification_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group form-check position-absolute">
                    <input type="checkbox" class="form-check-input checkboxEnable" data-target="children_table" name="children_checkbox" id="children_checkbox">
                    <label class="form-check-label" for="children_checkbox"><strong>Have children</strong></label>
                </div>
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Children Details <small>(If Any)</small></h5>
                </div>
                <table class="table disable-entry" id="children_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-5">Name of Children</th>
                            <th class="col-3">Gender</th>
                            <th class="col-3">Date of Birth</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="children_name[]"></td>
                            <td>
                                <select class="form-control" name="children_gender[]">
                                    <option value="" selected="" disabled="" hidden="">Choose here</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                            <td><input type="date" class="form-control" name="children_dob[]"></td>
                            <td><button type="button" class="btn btn-primary" id="children_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group form-check position-absolute">
                    <input type="checkbox" class="form-check-input checkboxEnable" data-target="training_table" name="training_checkbox" id="training_checkbox">
                    <label class="form-check-label" for="training_checkbox"><strong>Have Details</strong></label>
                </div>
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Training Details <small>(Recent Comes First)</small></h5>
                </div>
                <table class="table disable-entry" id="training_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-3">Training Title</th>
                            <th class="col-4">Training Institution</th>
                            <th class="col-2">Start Date</th>
                            <th class="col-2">End Date</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="train_title[]"></td>
                            <td><input type="text" class="form-control" name="train_institution[]"></td>
                            <td><input type="date" class="form-control" name="train_start_date[]"></td>
                            <td><input type="date" class="form-control" name="train_end_date[]"></td>
                            <td><button type="button" class="btn btn-primary" id="training_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group form-check position-absolute">
                    <input type="checkbox" class="form-check-input checkboxEnable" data-target="pro_certification_table" name="certificate_checkbox" id="certificate_checkbox">
                    <label class="form-check-label" for="certificate_checkbox"><strong>Have Certificates</strong></label>
                </div>
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Professional Certification <small>(Recent Comes First)</small></h5>
                </div>
                <table class="table disable-entry" id="pro_certification_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-4">Certification</th>
                            <th class="col-4">Institution</th>
                            <th class="col-1">Start Date</th>
                            <th class="col-1">End Date</th>
                            <th class="col-1">Completion</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="pro_cerf_certificate[]"></td>
                            <td><input type="text" class="form-control" name="pro_cerf_institution[]"></td>
                            <td><input type="date" class="form-control" name="pro_cerf_start_date[]"></td>
                            <td><input type="date" class="form-control" name="pro_cerf_end_date[]"></td>
                            <td><input type="number" class="form-control" name="pro_cerf_completion[]"></td>
                            <td><button type="button" class="btn btn-primary" id="certification_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group form-check position-absolute">
                    <input type="checkbox" class="form-check-input checkboxEnable" data-target="emp_history_table" name="emp_history_checkbox" id="emp_history_checkbox">
                    <label class="form-check-label" for="emp_history_checkbox"><strong>Have History</strong></label>
                </div>
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Employment History <small>(Recent Comes First)</small></h5>
                </div>
                <table class="table disable-entry" id="emp_history_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-4">Organization</th>
                            <th class="col-3">Designation</th>
                            <th class="col-2">Start Date</th>
                            <th class="col-2">End Date</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="emp_his_organization[]"></td>
                            <td><input type="text" class="form-control" name="emp_his_designation[]"></td>
                            <td><input type="date" class="form-control" name="emp_his_start_date[]"></td>
                            <td><input type="date" class="form-control" name="emp_his_end_date[]"></td>
                            <td><button type="button" class="btn btn-primary" id="emp_history_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group form-check position-absolute">
                    <input type="checkbox" class="form-check-input checkboxEnable" data-target="mem_society_table" name="membership_checkbox" id="membership_checkbox">
                    <label class="form-check-label" for="membership_checkbox"><strong>Have Membership</strong></label>
                </div>
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Membership In Societies/Club/Association <small>(Recent Comes First)</small></h5>
                </div>
                <table class="table disable-entry" id="mem_society_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-4">Club/Association</th>
                            <th class="col-3">Nature of Activities</th>
                            <th class="col-2">Start Date</th>
                            <th class="col-2">End Date</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="mem_soc_association[]"></td>
                            <td><input type="text" class="form-control" name="mem_soc_activities[]"></td>
                            <td><input type="date" class="form-control" name="mem_soc_start_date[]"></td>
                            <td><input type="date" class="form-control" name="mem_soc_end_date[]"></td>
                            <td><button type="button" class="btn btn-primary" id="mem_society_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">References</h5>
                </div>
                <table class="table" id="reference_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-2">Name</th>
                            <th class="col-2">Occupation</th>
                            <th class="col-2">Mobile</th>
                            <th class="col-3">Email</th>
                            <th class="col-3">Address</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="ref_name[]" required></td>
                            <td><input type="text" class="form-control" name="ref_occupation[]" required></td>
                            <td><input type="text" class="form-control" name="ref_mobile[]" required></td>
                            <td><input type="text" class="form-control" name="ref_email[]" required></td>
                            <td>
                                <textarea class="form-control" rows="2" name="ref_address[]" required></textarea>
                            </td>
                            <td><button type="button" class="btn btn-primary" id="reference_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Emergency Contact</h5>
                </div>
                <table class="table" id="emergency_table">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-3">Name</th>
                            <th class="col-2">Relation</th>
                            <th class="col-3">Mobile</th>
                            <th class="col-4">Address</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="emerg_name[]" required></td>
                            <td><input type="text" class="form-control" name="emerg_relation[]" required></td>
                            <td><input type="text" class="form-control" name="emerg_mobile[]" required></td>
                            <td>
                                <textarea class="form-control" rows="2" name="emerg_address[]" required></textarea>
                            </td>
                            <td><button type="button" class="btn btn-primary" id="emergency_add"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="margin-bottom: 90px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Additional</h5>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="extra_curricular">Extra-Curricular Activities:</label>
                        <textarea class="form-control" rows="2" name="extra_curricular" id="extra_curricular"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 style="text-decoration: underline;">Declaration</h5>
                </div>

                I hereby declare that the information provided is true. I shall be deemed to have been guilty of gross default/misconduct during my employment with Inleads It Limited, if at any date it is found that my declaration as shown above is false or materially incomplete in any respect and in such case my case my services with the company will be liable for disciplinary action as per company policy.

                <div class="form-group form-check mt-4">
                    <input type="checkbox" class="form-check-input" name="permission_check" id="permission_check" required>
                    <label class="form-check-label" for="permission_check"><strong>I give permission to store these information.</strong></label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </div>
        </div>

    </form>

</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->